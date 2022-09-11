@foreach ($permissions as $permission)
    <div class="checkbox">
        <label>
            <input name="permissions[]" type="checkbox" value="{{ $permission->name }}"
                {{ $model->permissions->contains($permission->id)
                    || collect(old('permissions'))->contains($permission->name)
                    ? 'checked' : '' }}>
            {{ $permission->display_name }}
        </label>
    </div>
@endforeach
