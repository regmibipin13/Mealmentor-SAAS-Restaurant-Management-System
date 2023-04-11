<div class="col-md-12">
    <form action="{{ $route }}" method="get" class="d-flex align-items-baseline">
        <input type="text" name="{{ $name }}" value="{{ request()->$name }}" placeholder="{{ $placeholder }}"
            class="form-control">
        &nbsp;
        <select name="restaurant_id" id="restaurant_id" class="form-control">
            <option value="">All</option>
            @foreach (App\Models\Restaurant::pluck('name', 'id') as $key => $value)
                <option value="{{ $key }}" {{ $key == request()->restaurant_id ? 'selected' : '' }}>
                    {{ $value }}
                </option>
            @endforeach
        </select>
        &nbsp;
        <button class="btn btn-success">Search</button>
    </form>
</div>
