@csrf

<div class="row">
    <div class="form-group col-md-6">
        <label>Nombre</label>
        <input type="text" class="form-control" name="name" value="{{ old('name', $provider->name) }}">
    </div>

    <div class="form-group col-md-6">
        <label>Telefono</label>
        <input type="text" class="form-control" name="phone" value="{{ old('phone', $provider->phone) }}">
    </div>
</div>

<div class="row">
    <div class="form-group col-md-6">
        <label>Tipo de documento</label>
        <select name="document_type" class="form-control">
            <option value="CI" {{ $provider->document_type === 'CI' ? 'selected' : '' }}>CI</option>
            <option value="NIT" {{ $provider->document_type === 'NIT' ? 'selected' : '' }}>NIT</option>
            <option value="OTRO" {{ $provider->document_type === 'OTRO' ? 'selected' : '' }}>OTRO</option>
        </select>

    </div>

    <div class="form-group col-md-6">
        <label>Documento</label>
        <input type="text" class="form-control" name="document" value="{{ old('document', $provider->document) }}">
    </div>
</div>

<div class="form-group">
    <label>Comentarios</label>
    <textarea name="comment" rows="3" class="form-control">{{ old('comment', $provider->comment) }}</textarea>
</div>

<div class="form-group btn-group">
    <a href="{{ route('admin.providers.index') }}" class="btn btn-dark">Regresar</a>
    <button class="btn btn-primary">{{ $text }}</button>
</div>
