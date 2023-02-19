<div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
        value="{{ isset($itemCategory) ? $itemCategory->name : old('name') }}" placeholder="Enter the name of category">
    @error('name')
        <p class="text-danger">{{ $errors->first('name') }}</p>
    @enderror
</div>

@include('admin.includes.restaurant_form', [
    'data' => isset($itemCategory) ? $itemCategory : null,
])
