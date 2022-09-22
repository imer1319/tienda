@extends('layouts.admin')

@section('title', 'Registrar clientes')

@section('content')
    <div class="row pt-5 mt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="text-center">Crear clientes</h5>
                </div>
                <div class="card-body">
                    @include('admin.partials.flash-error')
                    <form action="{{ route('admin.clients.store') }}" method="POST">
                        @include('admin.clients.partials._form', ['text' => 'Crear clientes'])
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
