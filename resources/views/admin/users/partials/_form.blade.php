<form method="POST" action="{{ route('admin.users.store') }}">
    @csrf
    <div class="form-group">
        <label for="name">Nombre:</label>
        <input name="name" value="{{ old('name') }}" type="text" class="form-control">
    </div>

    <div class="form-group">
        <label for="username">Username:</label>
        <input name="username" value="{{ old('username') }}" type="text" class="form-control">
    </div>

    <div class="form-group">
        <label for="email">Email:</label>
        <input name="email" value="{{ old('email') }}" type="email" class="form-control">
    </div>
    
    <div class="form-group">
        <label for="password">Contraseña</label>
        <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password">
    </div>

    <div class="form-group">
        <label for="password-confirm">Confirmar contraseña</label>
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
    </div>

    <div class="row">
        <div class="form-group col-md-6">
            <label>Roles</label>
            @include('admin.roles.checkboxes')
        </div>
        <div class="form-group col-md-6">
            <label>Permisos</label>
            @include('admin.permissions.checkboxes', ['model' => $user])
        </div>
    </div>
    <br>

    <div class="form-group btn-group">
        <a href="{{ route('admin.users.index') }}" class="btn btn-dark">Regresar</a>
        <button class="btn btn-primary">Crear usuario</button>
    </div>
</form>
