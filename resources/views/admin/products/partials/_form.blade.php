@csrf

<div class="form-group">
    <label>Nombre</label>
    <input type="text" class="form-control" name="name" value="{{ old('name', $product->name) }}">
</div>

<div class="form-group">
    <label>Precio</label>
    <input type="text" class="form-control" name="price" value="{{ old('price', $product->price) }}">
</div>

<div class="form-group">
    <label>Stock</label>
    <input type="text" class="form-control" name="stock" value="{{ old('stock', $product->stock) }}">
</div>

<div class="form-group">
    <label>Categoria</label>
    <select name="category_id" class="form-control">
        @foreach ($categories as $id => $name)
            <option value="{{ $id }}">{{ $name }}</option>
        @endforeach
    </select>
</div>

<div class="form-group btn-group">
    <a href="{{ route('admin.products.index') }}" class="btn btn-dark">Regresar</a>
    <button class="btn btn-primary">{{ $text }}</button>
</div>