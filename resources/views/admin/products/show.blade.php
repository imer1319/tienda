@extends('layouts.admin')

@section('title', 'Detalle del producto')

@section('content')
    <div class="row mt-5 pt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="text-center">Vista producto</h5>
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
                                <th>Imagenes</th>
                                <td>
                                    {{-- <div class="row">
                                        @forelse ($product->images as $image)
                                            <div class="col-md-4">
                                                <img src="{{ Storage::url($image->image) }}" class="img-fluid"
                                                    alt="imagen-{{ $loop->iteration }}">
                                            </div>
                                        @empty
                                            <span>No hay imagenes</span>
                                        @endforelse
                                    </div> --}}
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
