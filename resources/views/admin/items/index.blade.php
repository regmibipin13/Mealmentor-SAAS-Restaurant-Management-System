@extends('admin.app')
@section('content')
    <div class="container-fluid pt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Items
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{ route('admin.items.create') }}" class="btn btn-success">Add New</a>
                            </div>
                            <div class="col-md-12">
                                @include('admin.includes.filterable', [
                                    'name' => 'name',
                                    'route' => route('admin.items.index'),
                                    'placeholder' => 'Item Name',
                                ])
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#ID</th>
                                                <th>Photo</th>
                                                <th>Name</th>
                                                <th>Restaurant Name</th>
                                                <th>Category</th>
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
                                                                    src="{{ $item->photo }}" alt="{{ $item->name }}"
                                                                    width="70" height="70"></a></td>
                                                        <td>{{ $item->name }}</td>
                                                        <td>{{ $item->restaurant->name }}</td>
                                                        <td>{{ $item->item_category->name }}</td>
                                                        <td>Rs.{{ $item->price }}</td>
                                                        <td>{{ $item->out_of_stock == 1 ? 'Not Available' : 'Available' }}
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('admin.items.edit', $item->id) }}"
                                                                class="btn btn-primary btn-sm">Edit</a>
                                                            <form action="{{ route('admin.items.destroy', $item->id) }}"
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
                    </div>
                </div>
            </div>
            <div class="card-footer">
                {{ $items->appends(Request::all())->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection
