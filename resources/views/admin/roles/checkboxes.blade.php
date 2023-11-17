@foreach ($roles as $role)
    <div class="form-check">
        <input class="form-check-input" type="radio" name="roles[]" id="{{ $role->name }}" value="{{ $role->name }}"
               {{ $user->roles->contains($role->id) ? 'checked' : '' }}>
        <label class="form-check-label" for="{{ $role->name }}">
            {{ $role->display_name }}
        </label>
    </div>
@endforeach
