@extends('restaurants.app')
@section('content')
    <div class="container-fluid pt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <form action="{{ route('restaurants.items.index') }}" method="get">
                            <div class="row mb-2">
                                <div class="col-md-2">
                                    <a href="{{ route('restaurants.items.create') }}" class="btn btn-success">Add New</a>
                                </div>

                                <div class="col-md-10 d-flex align-items-start justify-content-between filters-input">
                                    <input type="text" name="name" value="{{ request()->name }}"
                                        placeholder="Item Name" class="form-control">
                                    <select name="item_category_id" id="item_category_id" class="form-control select2">
                                        <option value="">Category</option>
                                        @foreach ($itemCategories as $id => $name)
                                            <option value="{{ $id }}"
                                                {{ request()->item_category_id == $id ? 'selected' : '' }}>
                                                {{ $name }}</option>
                                        @endforeach
                                    </select>
                                    <select name="unit_id" id="unit_id" class="form-control select2">
                                        <option value="">Unit</option>
                                        @foreach ($units as $id => $name)
                                            <option value="{{ $id }}"
                                                {{ request()->unit_id == $id ? 'selected' : '' }}>
                                                {{ $name }}</option>
                                        @endforeach
                                    </select>
                                    <select name="out_of_stock" id="out_of_stock" class="form-control select2">
                                        <option value="">Stock Status</option>
                                        <option value="1"{{ request()->out_of_stock == '1' ? 'selected' : '' }}>Out of
                                            Stock</option>
                                        <option value="0"{{ request()->out_of_stock == '0' ? 'selected' : '' }}>
                                            Available</option>
                                    </select>
                                    {{-- <select name="sort" id="sort" class="form-control select2">
                                        <option value="">Sort</option>
                                        <option value="low"{{ request()->sort == 'low' ? 'selected' : '' }}>Low Price to
                                            High</option>
                                        <option value="high"{{ request()->sort == 'high' ? 'selected' : '' }}>High Price
                                            to
                                            Low</option>
                                    </select> --}}
                                    <button type="submit" class="btn btn-secondary">Filter</button>
                                </div>
                        </form>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover datatable">
                            <thead>
                                <tr>
                                    <th>#ID</th>
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Unit</th>
                                    <th>Price</th>
                                    <th>Stock</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($items) > 0)
                                    @foreach ($items as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td><a href="{{ $item->photo }}" target="_blank"><img
                                                        src="{{ $item->photo }}" alt="{{ $item->name }}" width="70"
                                                        height="70"></a></td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->item_category->name }}</td>
                                            <td>{{ $item->unit->name }}</td>
                                            <td>{{ $item->price }}</td>
                                            <td>{{ $item->out_of_stock == 1 ? 'Not Available' : 'Available' }}</td>
                                            <td>
                                                <a href="{{ route('restaurants.items.edit', $item->id) }}"
                                                    class="btn btn-primary btn-sm">Edit</a>
                                                <form action="{{ route('restaurants.items.destroy', $item->id) }}"
                                                    method="POST" id="delete-form">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="btn btn-danger btn-sm delete-button">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="8" class="text-center">No Data available</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                {{ $items->appends(Request::all())->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection
