@can('products_show')
    <a href="{{ route('admin.products.show', $product->slug) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
@endcan

@can('products_edit')
    <a href="{{ route('admin.products.edit', $product->slug) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
@endcan

@can('products_destroy')
    <form action="{{ route('admin.products.destroy', $product->slug) }}" method="post" style="display:inline-block">
        @csrf
        @method('DELETE')
        <button type="submit" name="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Realmente desea eliminar el producto?')"><i
                class="fa fa-trash"></i>
        </button>
    </form>
@endcan
