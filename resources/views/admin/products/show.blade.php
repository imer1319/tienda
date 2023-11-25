@extends('layouts.admin')

@section('title', 'Detalle del producto')

@section('content')
    <div class="row mt-5 pt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">Datos del producto</h3>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>Nombre</th>
                                <td>{{ $product->name }}</td>
                            </tr>
                            <tr>
                                <th>Cantidad</th>
                                <td>{{ $product->stock }}</td>
                            </tr>
                            <tr>
                                <th>Precio</th>
                                <td>{{ $product->price }}</td>
                            </tr>
                            <tr>
                                <th>Categoria</th>
                                <td>{{ $product->category->name }}</td>
                            </tr>
                            <tr>
                                <th>Proveedor</th>
                                <td>{{ $product->provider->name }}</td>
                            </tr>
                            <tr>
                                <th>Imagen</th>
                                <td>
                                    <img src="{{ asset($product->image) }}" width="220px" alt="{{ $product->name }}">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="mt-3">
                        <a href="{{ route('admin.products.index') }}" class="btn btn-dark">Regresar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
