@csrf
<div class="row">
    <div class="form-group col-md-6">
        <label>Nombre</label>
        <input type="text" class="form-control" name="name" value="{{ old('name', $driver->name) }}">
    </div>
    <div class="form-group col-md-6">
        <label>Apellido paterno</label>
        <input type="text" class="form-control" name="apellido_paterno"
            value="{{ old('apellido_paterno', $driver->apellido_paterno) }}">
    </div>
    <div class="form-group col-md-6">
        <label>Apellido materno</label>
        <input type="text" class="form-control" name="apellido_materno"
            value="{{ old('apellido_materno', $driver->apellido_materno) }}">
    </div>
    <div class="form-group col-md-6">
        <label>CI</label>
        <input type="text" class="form-control" name="ci" value="{{ old('ci', $driver->ci) }}">
    </div>
    <div class="form-group col-md-6">
        <label>Telefono</label>
        <input type="text" class="form-control" name="phone" value="{{ old('phone', $driver->phone) }}">
    </div>
    <div class="form-group col-md-6">
        <label>Direccion</label>
        <input type="text" class="form-control" name="direccion" value="{{ old('direccion', $driver->direccion) }}">
    </div>
    <div class="form-group col-md-6">
        <label>Fecha de nacimiento</label>
        <input type="date" class="form-control" name="fecha_nacimiento"
            value="{{ old('fecha_nacimiento', $driver->fecha_nacimiento) }}">
    </div>
    <div class="form-group col-md-6">
        <label>Placa</label>
        <input type="text" class="form-control" name="placa" value="{{ old('placa', $driver->placa) }}">
    </div>
    <div class="form-group col-md-6">
        <label>Modelo del movil</label>
        <input type="text" class="form-control" name="modelo_movil"
            value="{{ old('modelo_movil', $driver->modelo_movil) }}">
    </div>
    <div class="form-group col-md-6">
        <label>Categoria de licencia</label>
        <input type="text" class="form-control" name="categoria_licencia"
            value="{{ old('categoria_licencia', $driver->categoria_licencia) }}">
    </div>
    <div class="form-group col-md-6">
        <label>Genero</label>
        <select id="genero" name="genero" class="form-control @error('genero') is-invalid @enderror">
            <option value="MASCULINO" {{ old('genero') == 'MASCULINO' ? 'selected' : '' }}>
                Masculino</option>
            <option value="FEMENINO" {{ old('genero') == 'FEMENINO' ? 'selected' : '' }}>
                Femenino</option>
            <option value="OTROS" {{ old('genero') == 'OTROS' ? 'selected' : '' }}>Otros
            </option>
        </select>
    </div>
</div>

<div class="form-group btn-group">
    <a href="{{ route('admin.drivers.index') }}" class="btn btn-dark">Regresar</a>
    <button class="btn btn-primary">{{ $text }}</button>
</div>
