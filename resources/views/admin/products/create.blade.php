@extends('layouts.admin')

@section('title', 'Registrar producto')

@section('content')
    <div class="row mt-5 pt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="text-center">Crear producto</h5>
                </div>
                <div class="card-body">
                    @include('admin.partials.flash-error')
                    <form action="{{ route('admin.products.store') }}" method="POST">
                        @include('admin.products.partials._form', ['text' => 'Crear producto'])
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
