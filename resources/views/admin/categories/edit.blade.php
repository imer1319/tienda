@extends('layouts.admin')

@section('title', 'Editar categoria')

@section('content')
    <div class="row pt-5 mt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="text-center">Editar categorias</h5>
                </div>
                <div class="card-body">
                    @include('admin.partials.flash-error')
                    <form action="{{ route('admin.categories.update', $category) }}" method="POST">
                        @method('PUT')
                        @include('admin.categories.partials._form', ['text' => 'Actualizar categoria'])
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
