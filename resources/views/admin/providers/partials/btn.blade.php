@can('providers_show')
    <a href="{{ route('admin.providers.show', $id) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
@endcan

@can('providers_edit')
    <a href="{{ route('admin.providers.edit', $id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
@endcan

@can('providers_destroy')
    <form action="{{ route('admin.providers.destroy', $id) }}" style="display:inline" method="post">
        @csrf
        @method('DELETE')
        <button type="submit" name="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Realmente desea eliminar al proveedor?')"><i
                class="fa fa-trash"></i>
        </button>
    </form>
@endcan
