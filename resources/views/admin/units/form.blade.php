<div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
        value="{{ isset($unit) ? $unit->name : old('name') }}" placeholder="Enter the name of unit">
    @error('name')
        <p class="text-danger">{{ $errors->first('name') }}</p>
    @enderror
</div>
@include('admin.includes.restaurant_form', [
    'data' => isset($unit) ? $unit : null,
])
