@extends('layouts.admin')

@section('title', 'Detalle del cliente')

@section('content')
<div class="row mt-5 pt-5">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Datos del cliente</h3>
            </div>
            <div class="card-body">
                <table class="table">
                    <tbody>
                        <tr>
                            <th>Nombre</th>
                            <td>{{ $client->name }}</td>
                        </tr>
                        <tr>
                            <th>Telefono</th>
                            <td>{{ $client->phone }}</td>
                        </tr>
                        <tr>
                            <th>Tipo de documento</th>
                            <td>{{ $client->document_type }}</td>
                        </tr>
                        <tr>
                            <th>Documento</th>
                            <td>{{ $client->document }}</td>
                        </tr>
                        <tr>
                            <th>Comentarios</th>
                            <td>{{ $client->comment }}</td>
                        </tr>
                    </tbody>
                </table>
                <div class="mt-3">
                    <a href="{{ route('admin.clients.index') }}" class="btn btn-dark">Regresar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
