<div class="table-responsive">
    <table class="table" id="table-ventas">
        <thead>
            <tr>
                <th>#</th>
                <th>Cliente</th>
                <th>Chofer</th>
                <th>Estado</th>
                <th>Tipo de pedido</th>
                <th>Items</th>
                <th>Fecha</th>
                <th>Total</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($ventas as $venta)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $venta->client->name }}</td>
                    <td>{{ $venta->driver->name }}</td>
                    <td>
                        <span class="badge badge-success">{{ $venta->status }}</span>
                    </td>
                    <td>
                        <span class="badge badge-{{ $venta->sale_type == 'CONTADO' ? 'primary' :'warning' }}">{{ $venta->sale_type }}</span>
                    </td>
                    <td>{{ $venta->detalles->count() }}</td>
                    <td>{{ $venta->created_at->format('d-m-Y') }}</td>
                    <td>{{ $venta->total }}</td>
                    <td>
                        <div class="d-flex">
                            <a href="{{ route('admin.ventas.download.pdf', $venta->id) }}" target="_blank"
                                class="btn btn-danger btn-sm"><i class="fa fa-file-pdf"></i>
                            </a>
                            <a href="{{ route('admin.ventas.show', $venta->id) }}" class="btn btn-info btn-sm"><i
                                    class="fa fa-eye"></i>
                            </a>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" align="center">No hay ventas realizadas</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
<div class="mt-3 d-flex justify-content-end">
    {{ $ventas->links() }}
</div>