@extends('layouts.admin')

@section('title', 'Listado de choferes')

@section('content')
    <div class="row mt-5 pt-5">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h3>Listado de Choferes</h3>
                        @can('drivers_create')
                            <a href="{{ route('admin.drivers.create') }}" class="btn btn-success btn-sm"><i
                                    class="fa fa-plus"></i> Crear nuevo</a>
                        @endcan
                    </div>
                    <table class="table" id="table-drivers">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>CI</th>
                                <th>Telefono</th>
                                <th>Placa</th>
                                <th>Movil</th>
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
    <link href="{{ asset('admin/vendor/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
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
            $('#table-drivers').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "/api/drivers",
                "columns": [{
                        data: null,
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        },
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'name'
                    },
                    {
                        data: 'ci'
                    },
                    {
                        data: 'phone'
                    },
                    {
                        data: 'placa'
                    },
                    {
                        data: 'modelo_movil'
                    },
                    {
                        data: 'btn',
                        "orderable": false,
                        "searchable": false
                    },
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
