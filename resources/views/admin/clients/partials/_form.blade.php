@csrf
<div class="row">
    <div class="form-group col-md-6">
        <label>Nombre</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
            value="{{ old('name', $client->name) }}">
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group col-md-6">
        <label>Username</label>
        <input type="text" class="form-control @error('username') is-invalid @enderror" name="username"
            value="{{ old('username', $client->username) }}">
        @error('username')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group col-md-6">
        <label>Apellido Paterno</label>
        <input type="text" class="form-control @error('apellido_paterno') is-invalid @enderror"
            name="apellido_paterno" value="{{ old('apellido_paterno', optional($client->profile)->apellido_paterno) }}">
        @error('apellido_paterno')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group col-md-6">
        <label>Apellido Materno</label>
        <input type="text" class="form-control @error('apellido_materno') is-invalid @enderror"
            name="apellido_materno" value="{{ old('apellido_materno', optional($client->profile)->apellido_materno) }}">
        @error('apellido_materno')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group col-md-6">
        <label>Celular</label>
        <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone"
            value="{{ old('phone', optional($client->profile)->phone) }}">
        @error('phone')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group col-md-6">
        <label>Dirección</label>
        <input type="text" class="form-control @error('direccion') is-invalid @enderror" name="direccion"
            value="{{ old('direccion', optional($client->profile)->direccion) }}">
        @error('direccion')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group col-md-6">
        <label>Ciudad</label>
        <input type="text" class="form-control @error('ciudad') is-invalid @enderror" name="ciudad"
            value="{{ old('ciudad', optional($client->profile)->ciudad) }}">
        @error('ciudad')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group col-md-6">
        <label>Número de Identificación (CI)</label>
        <input type="text" class="form-control @error('ci') is-invalid @enderror" name="ci"
            value="{{ old('ci', optional($client->profile)->ci) }}">
        @error('ci')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>


    <div class="form-group col-md-6">
        <label>Fecha de Nacimiento</label>
        <input type="date" class="form-control @error('fecha_nacimiento') is-invalid @enderror"
            name="fecha_nacimiento" value="{{ old('fecha_nacimiento', optional($client->profile)->fecha_nacimiento) }}">
        @error('fecha_nacimiento')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group col-md-6">
        <label>Género</label>
        <select class="form-control @error('genero') is-invalid @enderror" name="genero">
            <option value="MASCULINO" {{ old('genero', $client->genero) === 'MASCULINO' ? 'selected' : '' }}>
                Masculino</option>
            <option value="FEMENINO" {{ old('genero', $client->genero) === 'FEMENINO' ? 'selected' : '' }}>Femenino
            </option>
            <option value="OTROS" {{ old('genero', $client->genero) === 'OTROS' ? 'selected' : '' }}>Otros</option>
        </select>
        @error('genero')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group col-md-6">
        <label>Email</label>
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
            value="{{ old('email', $client->email) }}" placeholder="Correo electrónico" autocomplete="email">

        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group col-md-6">
        <label>Contraseña</label>
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
            name="password" placeholder="Contraseña" autocomplete="new-password">

        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group col-md-6">
        <label>Repita la contraseña</label>
        <input id="password-confirm" placeholder="Repita la contraseña" type="password" class="form-control"
            name="password_confirmation" autocomplete="new-password">
    </div>
</div>

<div class="form-group btn-group">
    <a href="{{ route('admin.clients.index') }}" class="btn btn-dark">Regresar</a>
    <button class="btn btn-primary">{{ $text }}</button>
</div>
