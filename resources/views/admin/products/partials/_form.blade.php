@csrf
<div class="row">
    <div class="form-group col">
        <label>Nombre</label>
        <input type="text" class="form-control" name="name" value="{{ old('name', $product->name) }}">
    </div>

    <div class="form-group col">
        <label>Precio</label>
        <input type="number" class="form-control" name="price" value="{{ old('price', $product->price) }}">
    </div>
</div>
<div class="row">
    <div class="form-group col">
        <label>Stock</label>
        <input type="number" class="form-control" name="stock" value="{{ old('stock', $product->stock) }}">
    </div>

    <div class="form-group col">
        <label>Categoría</label>
        <select name="category_id" class="form-control">
            @foreach ($categories as $id => $name)
                <option value="{{ $id }}"
                    {{ old('category_id', $product->category_id) == $id ? 'selected' : '' }}>
                    {{ $name }}
                </option>
            @endforeach
        </select>
    </div>
</div>
<div class="row">
    <div class="form-group col">
        <label>Imagen</label>
        <div class="custom-file">
            <input type="file" name="image" class="custom-file-input" id="customFileLang" lang="es"
                accept="image/*">
            <label class="custom-file-label" for="customFileLang">Seleccionar archivo</label>
        </div>
    </div>

    <div class="form-group col">
        <label>Proveedores</label>
        <select name="provider_id" class="form-control" {{ isset($product->id) ? 'disabled' : '' }}>
            @foreach ($providers as $id => $name)
                <option value="{{ $id }}"
                    {{ old('provider_id', $product->provider_id) == $id ? 'selected' : '' }}>
                    {{ $name }}
                </option>
            @endforeach
        </select>
    </div>
</div>
<div class="row">
    <div class="col form-group">
        @if ($product->image)
            <div class="text-muted"><i>Dejar en blanco para mantener la imagen</i></div>
            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" width="140px" height="140px"
                style="padding:15px ;border:3px solid #F6F7FC;border-radius:7%">
        @endif
    </div>
</div>

<div class="form-group btn-group">
    <a href="{{ route('admin.products.index') }}" class="btn btn-dark">Regresar</a>
    <button class="btn btn-primary">{{ $text }}</button>
</div>
