@extends('layouts.admin')

@section('title', 'Listado de roles')

@section('content')
<div class="row pt-5 mt-5">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3>Listado de roles</h3>
                </div>
                <table class="table" id="table-roles">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Descripcion</th>
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
        $('#table-roles').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "/api/roles",
            "columns": [
            {data: 'id'},
            {data: 'name'},
            {data: 'display_name'},
            {data: 'btn',"orderable": false,"searchable": false},
            ],
            language: {
                "decimal": "",
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Entradas",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": ">>",
                    "previous": "<<"
                }
            },
        });
    });
</script>
@endsection
