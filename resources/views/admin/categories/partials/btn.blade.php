@can('categories_edit')
    <a href="{{ route('admin.categories.edit', $slug) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
@endcan

@can('categories_destroy')
    <form action="{{ route('admin.categories.destroy', $slug) }}" style="display:inline" method="post">
        @csrf
        @method('DELETE')
        <button type="submit" name="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')"><i
                class="fa fa-trash"></i>
        </button>
    </form>
@endcan
