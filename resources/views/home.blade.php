@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="row mt-5 pt-5">
    <div class="col-xl-3 col-md-6">
        <div class="card card-stats">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Total usuarios</h5>
                        <span class="h2 font-weight-bold mb-0">{{ $users }}</span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                            <i class="ni ni-circle-08"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card card-stats">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Total proveedores</h5>
                        <span class="h2 font-weight-bold mb-0">{{ $providers }}</span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                            <i class="ni ni-single-02"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card card-stats">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Ventas al contado</h5>
                        <span class="h2 font-weight-bold mb-0">{{ $sales }}</span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                            <i class="ni ni-money-coins"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card card-stats">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title text-uppercase text-muted mb-0">Ventas a deuda</h5>
                        <span class="h2 font-weight-bold mb-0">{{ $debts }}</span>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                            <i class="ni ni-chart-bar-32"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-7">
        <div class="card">
            <div class="card-body">
                <canvas id="salesMonth" height="200px"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="card">
            <div class="card-body">
                <h5>Productos con bajo stock</h5>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Stock</th>
                                <th>Editar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->stock }}</td>
                                <td>
                                    @can('products_edit')
                                    <a href="{{ route('admin.products.edit', $product->slug) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                    @endcan
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5>Ganancias en los ultimos años</h5>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Año</th>
                                <th>Ganancia</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($year as $years)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $years }}</td>
                                <td>{{ $gananciasYear[$loop->index] }} Bs</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <canvas id="debtsMonth" height="180px"></canvas>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    console.log(@json($gananciasYear))
    console.log(@json($year))
    let salesMonth = {
        labels:  @json($meses),
        datasets: [{
            label: 'Ventas',
            data: @json($sales_month),
            backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgb(227, 34, 205, 0.2)',
            'rgba(255, 205, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgb(0, 113, 206, 0.2)',
            'rgba(240, 208, 225, 0.2)',
            'rgba(145, 116, 201, 0.2)',
            'rgba(80, 146, 169, 0.2)',
            'rgba(0, 0, 246, 0.2)',
            'rgba(247, 139, 5, 0.2)',
            'rgba(145, 0, 247, 0.2)',
            ],
            borderColor: [
            'rgb(255, 99, 132)',
            'rgb(227, 34, 205)',
            'rgb(255, 205, 86)',
            'rgb(75, 192, 192)',
            'rgb(54, 162, 235)',
            'rgb(0, 113, 206)',
            'rgb(240, 208, 225)',
            'rgb(145, 116, 201)',
            'rgb(80, 146, 169)',
            'rgb(0, 0, 246)',
            'rgb(247, 139, 5)',
            'rgb(145, 0, 247)',
            ],
            borderWidth: 1
        }]
    };
    
    window.onload = function() {
        let ctx = document.getElementById("salesMonth").getContext("2d");
        window.myBar = new Chart(ctx, {
            type: 'bar',
            data: salesMonth,
            options: {
                elements: {
                    rectangle: {
                        borderWidth: 2,
                        borderColor: '#c1c1c1',
                        borderSkipped: 'bottom'
                    }
                },
                responsive: true,
                title: {
                    display: true,
                    text: 'Ventas al contado por mes'
                }
            }
        });

        let debtMonth = document.getElementById("debtsMonth").getContext("2d");
        window.myBar = new Chart(debtMonth, {
            type: 'bar',
            data: debtsMonth,
            options: {
                elements: {
                    rectangle: {
                        borderWidth: 2,
                        borderColor: '#c1c1c1',
                        borderSkipped: 'bottom'
                    }
                },
                responsive: true,
                title: {
                    display: true,
                    text: 'Ventas a deuda por mes'
                }
            }
        });
    }

    let debtsMonth = {
        labels:  @json($meses),
        datasets: [{
            label: 'Ventas',
            data: @json($debts_month),
            backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgb(227, 34, 205, 0.2)',
            'rgba(255, 205, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgb(0, 113, 206, 0.2)',
            'rgba(240, 208, 225, 0.2)',
            'rgba(145, 116, 201, 0.2)',
            'rgba(80, 146, 169, 0.2)',
            'rgba(0, 0, 246, 0.2)',
            'rgba(247, 139, 5, 0.2)',
            'rgba(145, 0, 247, 0.2)',
            ],
            borderColor: [
            'rgb(255, 99, 132)',
            'rgb(227, 34, 205)',
            'rgb(255, 205, 86)',
            'rgb(75, 192, 192)',
            'rgb(54, 162, 235)',
            'rgb(0, 113, 206)',
            'rgb(240, 208, 225)',
            'rgb(145, 116, 201)',
            'rgb(80, 146, 169)',
            'rgb(0, 0, 246)',
            'rgb(247, 139, 5)',
            'rgb(145, 0, 247)',
            ],
            borderWidth: 1
        }]
    };

</script>
@endsection