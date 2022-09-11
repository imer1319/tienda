@can('users_show')
    <a href="{{ route('admin.users.show', $id) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
@endcan

@can('users_edit')
    <a href="{{ route('admin.users.edit', $id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
@endcan

@can('users_destroy')
    <form action="{{ route('admin.users.destroy', $id) }}" method="POST" style="display: inline">
        @csrf
        @method('DELETE')

        <button type="submit" name="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
            <i class="fa fa-trash"></i>
        </button>
    </form>
@endcan
