@extends('layouts.admin')

@section('title', 'Editar proveedor')

@section('content')
    <div class="row pt-5 mt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="text-center">Editar proveedores</h5>
                </div>
                <div class="card-body">
                    @include('admin.partials.flash-error')
                    <form action="{{ route('admin.providers.update', $provider) }}" method="POST">
                        @method('PUT')
                        @include('admin.providers.partials._form', ['text' => 'Actualizar proveedor'])
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
