<div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
        value="{{ isset($user) ? $user->name : old('name') }}" placeholder="Enter the name of user">
    @error('name')
        <p class="text-danger">{{ $errors->first('name') }}</p>
    @enderror
</div>
<div class="form-group">
    <label for="phone">Phone</label>
    <input type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone"
        value="{{ isset($user) ? $user->phone : old('phone') }}" placeholder="Enter the phone of user">
    @error('phone')
        <p class="text-danger">{{ $errors->first('phone') }}</p>
    @enderror
</div>
<div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
        value="{{ isset($user) ? $user->email : old('email') }}" placeholder="Enter the email of user">
    @error('email')
        <p class="text-danger">{{ $errors->first('email') }}</p>
    @enderror
</div>
<div class="form-group">
    <label for="type">Type</label>
    <select name="type" id="type" class="form-control select2">
        <option value="admin" {{ isset($user) ? ($user->is_admin_side ? 'selected' : '') : '' }}>
            Admin Side</option>
        <option value="customer" {{ isset($user) ? (!$user->is_admin_side ? 'selected' : '') : '' }}>
            Customer</option>
    </select>
    @error('roles')
        <p class="text-danger">{{ $errors->first('roles') }}</p>
    @enderror
</div>
<div class="form-group">
    <label for="roles">Roles</label>
    <select name="roles[]" id="roles" class="form-control select2" multiple>
        @foreach ($roles as $role)
            <option value="{{ $role->id }}"
                {{ isset($user) ? ($user->hasRole($role->name) ? 'selected' : '') : '' }}>{{ $role->name }}</option>
        @endforeach
    </select>
    @error('roles')
        <p class="text-danger">{{ $errors->first('roles') }}</p>
    @enderror
</div>

<div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
        value="{{ old('password') }}" placeholder="Enter the password of user">
    @error('password')
        <p class="text-danger">{{ $errors->first('password') }}</p>
    @enderror
</div>
