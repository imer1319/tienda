@csrf

<div class="form-group">
    <label>Nombre</label>
    <input type="text" class="form-control" name="name" value="{{ old('name', $category->name) }}">
</div>

<div class="form-group btn-group">
    <a href="{{ route('admin.categories.index') }}" class="btn btn-dark">Regresar</a>
    <button class="btn btn-primary">{{ $text }}</button>
</div>
