@can('products_show')
    <a href="{{ route('admin.products.show', $slug) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
@endcan

@can('products_edit')
    <a href="{{ route('admin.products.edit', $slug) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
@endcan

@can('products_destroy')
    <form action="{{ route('admin.products.destroy', $slug) }}" method="post" style="display:inline-block">
        @csrf
        @method('DELETE')
        <button type="submit" name="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')"><i
                class="fa fa-trash"></i>
        </button>
    </form>
@endcan
