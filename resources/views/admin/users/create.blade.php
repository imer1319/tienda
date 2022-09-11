@extends('layouts.admin')

@section('title', 'Registrar usuario')

@section('content')
    <div class="row  pt-5 mt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="text-center">Crear usuario</h5>
                </div>
                <div class="card-body">
                    @include('admin.partials.flash-error')
                    <form action="{{ route('admin.users.store') }}" method="POST">
                        @include('admin.users.partials._form', ['text' => 'Crear usuario'])
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
