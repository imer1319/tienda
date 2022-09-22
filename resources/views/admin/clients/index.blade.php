@extends('layouts.admin')

@section('title', 'Listado de clientes')

@section('content')
<div class="row mt-5 pt-5">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3>Listado de clientes</h3>
                    @can('clients_create')
                    <a href="{{ route('admin.clients.create') }}" class="btn btn-success btn-sm">
                        <i class="fa fa-plus"></i> Crear nuevo
                    </a>
                    @endcan
                </div>
                <table class="table" id="table-clients">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Tipo de documento</th>
                            <th>Documento</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<!-- Datatables -->
<link href="{{ asset('admin/vendor/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('admin/vendor/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('admin/vendor/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}"
rel="stylesheet">
@endsection

@section('scripts')
<script src="{{ asset('admin/vendor/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/vendor/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('admin/vendor/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('admin/vendor/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}"></script>
<script src="{{ asset('admin/vendor/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
<script src="{{ asset('admin/vendor/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#table-clients').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "/api/clients",
            "columns": [{
                data: 'id'
            },
            {
                data: 'name'
            },
            {
                data: 'document_type'
            },
            {
                data: 'document'
            },
            {
                data: 'btn',
                "orderable": false,
                "searchable": false
            },
            ]
        });
    });
</script>
@endsection
