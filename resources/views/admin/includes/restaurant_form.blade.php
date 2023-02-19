<div class="form-group">
    <label for="restaurant_id">Restaurant</label>
    <select name="restaurant_id" id="restaurant_id"
        class="form-control select2 @error('restaurant_id') is-invalid @enderror">
        @foreach (App\Models\Restaurant::pluck('name', 'id') as $key => $value)
            <option value="{{ $key }}"
                {{ $data ? ($data->restaurant_id == $key ? 'selected' : '') : (old('restaurant_id') == $key ? 'selected' : '') }}>
                {{ $value }}</option>
        @endforeach
    </select>
</div>
