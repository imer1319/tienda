<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use App\Models\Pedido;
use App\Traits\NumeroALetra;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class VentaController extends Controller
{
    use NumeroALetra;

    public function datatables()
    {
        $data = Pedido::with(['client', 'detalles'])
            ->select('id', 'total', 'cliente_id', 'status', 'sale_type', 'created_at')
            ->where('status', 'COMPLETADO');
        return DataTables::of($data)
            ->addColumn('client', function (Pedido $pedido) {
                return $pedido->client->name;
            })
            ->addColumn('created_at', function (Pedido $pedido) {
                return $pedido->created_at->format('M d Y H:i');
            })
            ->addColumn('items', function (Pedido $pedido) {
                return count($pedido->detalles);
            })
            ->addColumn('btn', 'admin.ventas.partials.btn')
            ->rawColumns(['btn'])
            ->toJson();
    }

    public function index()
    {
        return view('admin.ventas.index');
    }

    public function show($pedido)
    {
        return view('admin.ventas.show', [
            'pedido' => Pedido::find($pedido),
        ]);
    }

    public function edit(Pedido $venta)
    {
        return view('admin.ventas.edit', [
            'venta' => $venta,
            'drivers' => Driver::all(),
        ]);
    }

    public function update(Request $request, $pedido)
    {
        DB::beginTransaction();
        try {
            $venta = Pedido::findOrFail($pedido);
            $driverId = $request->input('driver_id');
            $status = $venta->sale_type == 'DEUDA' ? 'EN PROCESO' : 'COMPLETADO';
            $venta->update([
                'status' => $status,
                'driver_id' => $driverId,
            ]);

            foreach ($venta->detalles as $detalle) {
                $producto = $detalle->product;
                if ($producto->stock >= $detalle->cantidad) {
                    $producto->decrement('stock', $detalle->cantidad);
                } else {
                    throw new \Exception('Stock insuficiente para el producto');
                }
            }

            DB::commit();
            if ($status == 'EN PROCESO') {
                return redirect()->route('admin.procesos.index')->with('flash', 'Pedido guardado correctamente');
            }
            return redirect()->route('admin.ventas.index')->with('flash', 'Pedido guardado correctamente');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function downloadPdf(Pedido $venta)
    {
        $numero_letra = $this->convertirNumeroALetras($venta->total);
        $pdf = Pdf::loadView('admin.reportes.venta', compact('venta', 'numero_letra'));
        $pdf->setPaper('A4', 'landscape');
        return $pdf->stream();
    }
}
