@extends('layouts.admin')

@section('title', 'Registrar rol')

@section('content')
    <div class="row pt-5 mt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="text-center">Crear roles</h5>
                </div>
                <div class="card-body">
                    @include('admin.partials.flash-error')
                    <form action="{{ route('admin.roles.store') }}" method="POST">
                        @include('admin.roles.partials._form', ['text' => 'Crear rol'])
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
