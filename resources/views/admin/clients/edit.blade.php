@extends('layouts.admin')

@section('title', 'Editar clientes')

@section('content')
    <div class="row pt-5 mt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="text-center">Editar clientes</h5>
                </div>
                <div class="card-body">
                    @include('admin.partials.flash-error')
                    <form action="{{ route('admin.clients.update', $client) }}" method="POST">
                        @method('PUT')
                        @include('admin.clients.partials._form', ['text' => 'Actualizar proveedor'])
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
