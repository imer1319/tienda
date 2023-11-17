@extends('layouts.admin')

@section('title', 'Detalle del rol')

@section('content')
    <div class="row pt-5 mt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="text-center">Informacion del rol</h5>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>Nombre</th>
                                <td>{{ $role->name }}</td>
                            </tr>
                            <tr>
                                <th>Descripcion</th>
                                <td>{{ $role->display_name }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="mt-3">
                        <a href="{{ route('admin.roles.index') }}" class="btn btn-dark">Regresar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
