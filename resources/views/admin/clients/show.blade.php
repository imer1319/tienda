@extends('layouts.admin')

@section('title', 'Detalle del cliente')

@section('content')
    <div class="row mt-5 pt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">Datos del cliente</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>Nombre</th>
                                        <td>
                                            {{ $client->name }} {{ optional($client->profile)->apellido_paterno }}
                                            {{ optional($client->profile)->apellido_materno }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Telefono</th>
                                        <td>{{ optional($client->profile)->phone }}</td>
                                    </tr>
                                    <tr>
                                        <th>Documento</th>
                                        <td>{{ optional($client->profile)->ci }}</td>
                                    </tr>
                                    <tr>
                                        <th>Ciudad</th>
                                        <td>{{ optional($client->profile)->ciudad }}</td>
                                    </tr>
                                    <tr>
                                        <th>direccion</th>
                                        <td>{{ optional($client->profile)->direccion }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        {{-- <div class="col-md-7">
                            <h4 class="text-center">Detalle de la venta</h4>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Estado</th>
                                        <th>Tipo de pedido</th>
                                        <th>Items</th>
                                        <th>Fecha</th>
                                        <th>Total</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($client->ventas as $venta)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $venta->status }}</td>
                                            <td>{{ $venta->sale_type }}</td>
                                            <td>{{ $venta->detalles->count() }}</td>
                                            <td>{{ $venta->created_at->format('d-m-Y') }}</td>
                                            <td>{{ $venta->total }}</td>
                                            <td>
                                                <a href="{{ route('admin.ventas.show', $venta->id) }}" class="btn bg-success btn-sm text-white">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="5">Total:</th>
                                        <td colspan="2">{{ $client->ventas->sum('total') }} Bs</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div> --}}
                    </div>

                    <div class="mt-3">
                        <a href="{{ route('admin.clients.index') }}" class="btn btn-dark">Regresar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
