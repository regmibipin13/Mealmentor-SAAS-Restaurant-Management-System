<div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
        value="{{ isset($item) ? $item->name : old('name') }}" placeholder="Enter the name of item">
    @error('name')
        <p class="text-danger">{{ $errors->first('name') }}</p>
    @enderror
</div>
<div class="form-group">
    <label for="category">Category</label>
    <select name="item_category_id" id="category"
        class="form-control select2 @error('item_category_id') is-invalid @enderror">
        @foreach ($itemCategories as $id => $name)
            <option value="{{ $id }}"
                {{ isset($item) ? ($item->item_category_id == $id ? 'selected' : '') : '' }}>
                {{ $name }}
            </option>
        @endforeach
    </select>
    @error('item_category_id')
        <p class="text-danger">{{ $errors->first('item_category_id') }}</p>
    @enderror
</div>
<div class="form-group">
    <label for="unit">Unit</label>
    <select name="unit_id" id="unit" class="form-control select2 @error('unit_id') is-invalid @enderror">
        @foreach ($units as $id => $name)
            <option value="{{ $id }}" {{ isset($item) ? ($item->unit_id == $id ? 'selected' : '') : '' }}>
                {{ $name }}
            </option>
        @endforeach
    </select>
    @error('unit_id')
        <p class="text-danger">{{ $errors->first('unit_id') }}</p>
    @enderror
</div>
<div class="form-group">
    <label for="price">Price</label>
    <input type="number" id="price" class="form-control @error('price') is-invalid @enderror" name="price"
        value="{{ isset($item) ? $item->price : old('price') }}" placeholder="Enter the price of item">
    @error('price')
        <p class="text-danger">{{ $errors->first('price') }}</p>
    @enderror
</div>
<div class="form-group">
    <label for="unit_value_of_price">Unit Value of Price</label>
    <input type="number" id="unit_value_of_price"
        class="form-control @error('unit_value_of_price') is-invalid @enderror" name="unit_value_of_price"
        value="{{ isset($item) ? $item->unit_value_of_price : old('unit_value_of_price') }}"
        placeholder="Enter the price of item">
    @error('unit_value_of_price')
        <p class="text-danger">{{ $errors->first('unit_value_of_price') }}</p>
    @enderror
</div>
<div class="form-group">
    <label for="special_discount">Special Discount</label>
    <input type="number" id="special_discount" class="form-control @error('special_discount') is-invalid @enderror"
        name="special_discount" value="{{ isset($item) ? $item->special_discount : old('special_discount') }}"
        placeholder="Special Discount">
    @error('special_discount')
        <p class="text-danger">{{ $errors->first('special_discount') }}</p>
    @enderror
</div>
<div class="form-group">
    <label for="description">Description</label>
    <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="4"
        placeholder="Enter the description of user"> {!! isset($item) ? $item->description : old('description') !!}</textarea>
    @error('description')
        <p class="text-danger">{{ $errors->first('description') }}</p>
    @enderror
</div>
<div class="form-group">
    <label for="enabled">Enabled</label>
    <input type="checkbox" {{ isset($item) ? ($item->enabled ? 'checked' : '') : '' }} name="enabled">
    @error('enabled')
        <p class="text-danger">{{ $errors->first('enabled') }}</p>
    @enderror
</div>
<div class="form-group">
    <label for="out_of_stock">Out of stock</label>
    <input type="checkbox" {{ isset($item) ? ($item->out_of_stock ? 'checked' : '') : '' }} name="out_of_stock">
    @error('out_of_stock')
        <p class="text-danger">{{ $errors->first('out_of_stock') }}</p>
    @enderror
</div>
<div class="form-group">
    <img src="{{ isset($item) ? $item->photo : '' }}" alt="{{ isset($item) ? $item->photo : '' }}" width="70"
        height="70">
    <label for="photo">Photo</label>
    <input type="file" name="photo" value="{{ isset($item) ? $item->photo : '' }}">
    @error('photo')
        <p class="text-danger">{{ $errors->first('photo') }}</p>
    @enderror
</div>
