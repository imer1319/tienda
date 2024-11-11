<?php

namespace App\Http\Controllers\Admin;

use App\Exports\VentaExport;
use App\Http\Controllers\Controller;
use App\Models\Driver;
use App\Models\Pedido;
use App\Models\User;
use App\Traits\NumeroALetra;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;

class VentaController extends Controller
{
    use NumeroALetra;

    public function index()
    {
        $ventas = Pedido::query()
            ->with(['client', 'detalles', 'driver'])
            ->where('status', 'COMPLETADO')
            ->latest()
            ->paginate();

        return view('admin.ventas.index', [
            'ventas' => $ventas,
            'choferes' => Driver::all(),
            'clientes' => User::with(['profile', 'roles'])
                ->whereHas('roles', function ($query) {
                    $query->where('name', 'Cliente');
                })->get()
        ]);
    }

    public function search(Request $request)
    {
        $ventas = Pedido::query()
            ->byChoferId($request->input('chofer_id'))
            ->byClienteId($request->input('cliente_id'))
            ->byTipoPedido($request->input('tipo_pedido'))
            ->byDesde($request->input('desde'))
            ->byHasta($request->input('hasta'))
            ->where('status', 'COMPLETADO')
            ->with(['client', 'detalles', 'driver'])
            ->latest()
            ->paginate();

        return view('admin.ventas.index', [
            'ventas' => $ventas,
            'choferes' => Driver::all(),
            'clientes' => User::with(['profile', 'roles'])
                ->whereHas('roles', function ($query) {
                    $query->where('name', 'Cliente');
                })->get()
        ]);
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


    public function downloadExcel(Request $request)
    {
        return Excel::download(new VentaExport($request->all()), 'ventas.xlsx');
    }

    public function print(Request $request)
    {
        $ventas = Pedido::query()
            ->byChoferId($request->input('chofer_id'))
            ->byClienteId($request->input('cliente_id'))
            ->byTipoPedido($request->input('tipo_pedido'))
            ->byDesde($request->input('desde'))
            ->byHasta($request->input('hasta'))
            ->where('status', 'COMPLETADO')
            ->with(['client', 'detalles', 'driver'])
            ->latest()
            ->get();
        $totales = [
            'total' => $ventas->sum('total')
        ];
        $pdf = Pdf::loadView('admin.reportes.ventas', compact('ventas', 'totales'));

        $pdf->setPaper('A4', 'landscape');

        $pdf->set_option('isHtml5ParserEnabled', true);

        return $pdf->stream();
    }
}
