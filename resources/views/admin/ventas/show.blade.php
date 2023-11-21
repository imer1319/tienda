@extends('layouts.admin')

@section('title', 'Listado de pedidos')

@section('content')
    <div class="row mt-5 pt-5">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">Detalle del pedido</h3>
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
                                <th>Items</th>
                                <td>{{ count($pedido->detalles) }}</td>
                            </tr>
                            <tr>
                                <th>Detalle de productos</th>
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
                    <div class="mt-3">
                        <a href="{{ route('admin.pedidos.index') }}" class="btn btn-dark">Regresar</a>
                        <a href="#" class="btn btn-primary">Generar venta</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
