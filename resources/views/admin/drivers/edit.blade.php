@extends('layouts.admin')

@section('title', 'Editar chofer')

@section('content')
    <div class="row pt-5 mt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="text-center">Editar choferes</h5>
                </div>
                <div class="card-body">
                    @include('admin.partials.flash-error')
                    <form action="{{ route('admin.drivers.update', $driver) }}" method="POST">
                        @method('PUT')
                        @include('admin.drivers.partials._form', ['text' => 'Actualizar chofer'])
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
