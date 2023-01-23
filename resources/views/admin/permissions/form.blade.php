<div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ isset($permission) ? $permission->name : old('name') }}" placeholder="Enter the name of permission">
    @error('name')
        <p class="text-danger">{{ $errors->first('name') }}</p>
    @enderror
</div>