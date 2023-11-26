@extends('layouts.admin')

@section('title', 'Vender')

@section('content')
    <div class="row pt-5 mt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="text-center">Vender</h5>
                </div>
                <div class="card-body">
                    @include('admin.partials.flash-error')
                    <form action="{{ route('admin.ventas.update', $venta) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="form-group col-6">
                                <b>Conductor</b>
                                <select name="driver_id" class="form-control">
                                    @foreach ($drivers as $driver)
                                        <option value="{{ $driver->id }}">{{ $driver->full_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12">
                                <div><b>Tipo de venta:</b> {{ $venta->sale_type }}</div>
                                
                                <br>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre</th>
                                            <th>Cantidad</th>
                                            <th>precio</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($venta->detalles as $detalle)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $detalle->product->name }}</td>
                                                <td>{{ $detalle->cantidad }}</td>
                                                <td>{{ $detalle->product->price }}</td>
                                                <td>{{ $detalle->product->price * $detalle->cantidad }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="3"></td>
                                            <td>Total:</td>
                                            <td>{{ $venta->total }}</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Vender</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
