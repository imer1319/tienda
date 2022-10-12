@can('clients_show')
    <a href="{{ route('admin.clients.show', $id) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
@endcan

@can('clients_edit')
    <a href="{{ route('admin.clients.edit', $id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
@endcan

@can('clients_destroy')
    <form action="{{ route('admin.clients.destroy', $id) }}" style="display:inline" method="post">
        @csrf
        @method('DELETE')
        <button type="submit" name="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Realmente desea eliminar al cliente?')"><i
                class="fa fa-trash"></i>
        </button>
    </form>
@endcan
