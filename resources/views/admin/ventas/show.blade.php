@extends('layouts.admin')

@section('title', 'Detalle de la venta')

@section('content')
    <div class="row mt-5 pt-5">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">Detalle de la venta</h3>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>Nombre</th>
                                <td>{{ $pedido->client->name }} {{ $pedido->client->profile->apellido_paterno }}
                                    {{ $pedido->client->profile->apellido_materno }}</td>
                            </tr>
                            <tr>
                                <th>Fecha</th>
                                <td>{{ $pedido->created_at->format('M d Y H:i') }}</td>
                            </tr>
                            <tr>
                                <th>Estado</th>
                                <td>{{ $pedido->status }}</td>
                            </tr>
                            <tr>
                                <th>Conductor encargado</th>
                                <td>{{ $pedido->driver->full_name }}</td>
                            </tr>
                            <tr>
                                <th>Items</th>
                                <td>{{ count($pedido->detalles) }}</td>
                            </tr>
                            <tr>
                                <th>Detalle de la venta</th>
                                <td>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nombre</th>
                                                <th>Cantidad</th>
                                                <th>precio</th>
                                                <th>Subtotal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pedido->detalles as $detalle)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $detalle->product->name }}</td>
                                                    <td>{{ $detalle->cantidad }}</td>
                                                    <td>{{ $detalle->product->price }}</td>
                                                    <td>{{ $detalle->product->price * $detalle->cantidad }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="3"></td>
                                                <td>Total:</td>
                                                <td>{{ $pedido->total }}</td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="modal fade" id="deudas" tabindex="-1" role="dialog"
                        aria-labelledby="deudasLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deudasLabel">Deudas pagadas</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Monto pagado</th>
                                                <th>Fecha</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pedido->deudas as $deuda)
                                                <tr>
                                                    <td>{{ $deuda->id }}</td>
                                                    <td>{{ $deuda->amount }} Bs</td>
                                                    <td>{{ $deuda->created_at->format('M d Y H:i'), }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td>Total pedido: {{ $pedido->total }} Bs</td>
                                                <td></td>
                                                <td>Total deuda: {{ $pedido->pago_faltante }} Bs</td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <a href="{{ route('admin.ventas.index') }}" class="btn btn-dark">Regresar</a>
                        @if ($pedido->sale_type == 'DEUDA')
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#deudas">
                            Ver pago de deudas
                        </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
