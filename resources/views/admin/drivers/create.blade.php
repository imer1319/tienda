@extends('layouts.admin')

@section('title', 'Registrar chofer')

@section('content')
    <div class="row pt-5 mt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="text-center">Crear choferes</h5>
                </div>
                <div class="card-body">
                    @include('admin.partials.flash-error')
                    <form action="{{ route('admin.drivers.store') }}" method="POST">
                        @include('admin.drivers.partials._form', ['text' => 'Crear chofer'])
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
