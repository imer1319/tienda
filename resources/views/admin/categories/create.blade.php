@extends('layouts.admin')

@section('title', 'Registrar categoria')

@section('content')
    <div class="row pt-5 mt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="text-center">Crear categorias</h5>
                </div>
                <div class="card-body">
                    @include('admin.partials.flash-error')
                    <form action="{{ route('admin.categories.store') }}" method="POST">
                        @include('admin.categories.partials._form', ['text' => 'Crear categoria'])
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
