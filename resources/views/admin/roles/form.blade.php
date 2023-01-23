<div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
        value="{{ isset($role) ? $role->name : old('name') }}" placeholder="Enter the name of role">
    @error('name')
        <p class="text-danger">{{ $errors->first('name') }}</p>
    @enderror
</div>
<div class="form-group">
    <label for="permissions">Permissions</label>
    <select name="permissions[]" id="permissions" class="form-control select2" multiple>
        @foreach ($permissions as $permission)
            <option value="{{ $permission->id }}"
                {{ isset($role) ? ($role->permissions->contains($permission->id) ? 'selected' : '') : '' }}>
                {{ $permission->name }}</option>
        @endforeach
    </select>
    @error('permissions')
        <p class="text-danger">{{ $errors->first('permissions') }}</p>
    @enderror
</div>
