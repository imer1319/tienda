@extends('layouts.admin')

@section('title', 'Editar producto')

@section('content')
    <div class="row mt-5 pt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="text-center">Editar producto</h5>
                </div>
                <div class="card-body">
                    @include('admin.partials.flash-error')
                    <form action="{{ route('admin.products.update', $product) }}" enctype="multipart/form-data" method="POST">
                        @method('PUT')
                        @include('admin.products.partials._form', ['text' => 'Actualizar producto'])
                    </form>
                </div>
            </div>
            {{-- <image-component :product="{{ json_encode($product) }}"></image-component> --}}
        </div>
    </div>
@endsection
