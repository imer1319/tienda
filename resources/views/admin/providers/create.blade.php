@extends('layouts.admin')

@section('title', 'Registrar proveedor')

@section('content')
    <div class="row pt-5 mt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="text-center">Crear proveedores</h5>
                </div>
                <div class="card-body">
                    @include('admin.partials.flash-error')
                    <form action="{{ route('admin.providers.store') }}" method="POST">
                        @include('admin.providers.partials._form', ['text' => 'Crear proveedor'])
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
