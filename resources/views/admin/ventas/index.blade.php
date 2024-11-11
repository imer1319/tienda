@extends('layouts.admin')

@section('title', 'Listado de ventas')

@section('content')
    <div class="row mt-5 pt-5">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h3>Listado de ventas</h3>
                    </div>
                    @include('admin.ventas.search')
                    @include('admin.ventas.table')
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        function search() {
            var url = "{{ route('admin.ventas.search') }}";
            $("#form").attr('action', url);
            $(".btn").hide();
            $(".btn-importar").hide();
            $(".spinner-btn").show();
            $("#form").submit();
        }

        function limpiar() {
            $(".btn").hide();
            $(".btn-importar").hide();
            $(".spinner-btn").show();
            window.location.href = "{{ route('admin.ventas.index') }}";
        }
    </script>
@endsection

