@csrf

<div class="row">
    <div class="form-group col-md-6">
        <label>Nombre</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
            value="{{ old('name', $provider->name) }}">
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group col-md-6">
        <label>Apellido Paterno</label>
        <input type="text" class="form-control @error('apellido_paterno') is-invalid @enderror" name="apellido_paterno"
            value="{{ old('apellido_paterno', $provider->apellido_paterno) }}">
        @error('apellido_paterno')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group col-md-6">
        <label>Apellido Materno</label>
        <input type="text" class="form-control @error('apellido_materno') is-invalid @enderror"
            name="apellido_materno" value="{{ old('apellido_materno', $provider->apellido_materno) }}">
        @error('apellido_materno')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group col-md-6">
        <label>Celular</label>
        <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone"
            value="{{ old('phone', $provider->phone) }}">
        @error('phone')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group col-md-6">
        <label>Dirección</label>
        <input type="text" class="form-control @error('direccion') is-invalid @enderror" name="direccion"
            value="{{ old('direccion', $provider->direccion) }}">
        @error('direccion')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group col-md-6">
        <label>Número de Identificación (CI)</label>
        <input type="text" class="form-control @error('ci') is-invalid @enderror" name="ci"
            value="{{ old('ci', $provider->ci) }}">
        @error('ci')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>


    <div class="form-group col-md-6">
        <label>Fecha de Nacimiento</label>
        <input type="date" class="form-control @error('fecha_nacimiento') is-invalid @enderror"
            name="fecha_nacimiento" value="{{ old('fecha_nacimiento', $provider->fecha_nacimiento) }}">
        @error('fecha_nacimiento')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group col-md-6">
        <label>Género</label>
        <select class="form-control @error('genero') is-invalid @enderror" name="genero">
            <option value="MASCULINO" {{ old('genero', $provider->genero) === 'MASCULINO' ? 'selected' : '' }}>
                Masculino</option>
            <option value="FEMENINO" {{ old('genero', $provider->genero) === 'FEMENINO' ? 'selected' : '' }}>Femenino
            </option>
            <option value="OTROS" {{ old('genero', $provider->genero) === 'OTROS' ? 'selected' : '' }}>Otros</option>
        </select>
        @error('genero')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

</div>

<div class="form-group btn-group">
    <a href="{{ route('admin.providers.index') }}" class="btn btn-dark">Regresar</a>
    <button class="btn btn-primary">{{ $text }}</button>
</div>
