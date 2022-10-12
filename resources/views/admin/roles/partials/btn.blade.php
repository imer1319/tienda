@can('roles_show')
    <a href="{{ route('admin.roles.show', $id) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
@endcan

@can('roles_edit')
    <a href="{{ route('admin.roles.edit', $id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
@endcan

@can('roles_destroy')
    @if ($id !== 1)
        <form action="{{ route('admin.roles.destroy', $id) }}" method="POST" style="display:inline">
            @csrf
            @method('DELETE')
            <button type="submit" name="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Realmente desea eliminar el rol?')">
                <i class="fa fa-trash"></i>
            </button>
        </form>
    @endif
@endcan
