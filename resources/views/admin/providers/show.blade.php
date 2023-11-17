@extends('layouts.admin')

@section('title', 'Detalle del proveedor')

@section('content')
<div class="row mt-5 pt-5">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Datos del proveedor</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>Nombre</th>
                                    <td>{{ $provider->full_name }}</td>
                                </tr>
                                <tr>
                                    <th>Cédula de Identidad</th>
                                    <td>{{ $provider->ci }}</td>
                                </tr>
                                <tr>
                                    <th>Teléfono</th>
                                    <td>{{ $provider->phone }}</td>
                                </tr>
                                <tr>
                                    <th>Dirección</th>
                                    <td>{{ $provider->direccion }}</td>
                                </tr>
                                <tr>
                                    <th>Fecha de Nacimiento</th>
                                    <td>{{ $provider->fecha_nacimiento }}</td>
                                </tr>
                                <tr>
                                    <th>Género</th>
                                    <td>{{ $provider->genero }}</td>
                                </tr>
                                <tr>
                                    <th>Productos</th>
                                    <td>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Nombre del Producto</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($provider->products as $product)
                                                <tr>
                                                    <td>{{ $product->id }}</td>
                                                    <td>{{ $product->name }}</td>
                                                </tr>
                                                @empty
                                                <tr>
                                                    <td colspan="2">No hay productos</td>
                                                </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="mt-3">
                    <a href="{{ route('admin.providers.index') }}" class="btn btn-dark">Regresar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
