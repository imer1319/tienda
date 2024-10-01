@can('drivers_edit')
    <a href="{{ route('admin.drivers.edit', $id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
@endcan

@can('drivers_destroy')
    <form action="{{ route('admin.drivers.destroy', $id) }}" style="display:inline" method="post">
        @csrf
        @method('DELETE')
        <button type="submit" name="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Realmente desea eliminar la categoria?')"><i
                class="fa fa-trash"></i>
        </button>
    </form>
@endcan
