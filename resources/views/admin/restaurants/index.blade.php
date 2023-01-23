@extends('admin.app')
@section('content')
    <div class="container-fluid pt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('Restaurants') }}</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.restaurants.index') }}" method="get">
                            <div class="row mb-2">
                                <div class="col-md-2">
                                    <a href="{{ route('admin.restaurants.create') }}" class="btn btn-success">Add New</a>
                                </div>

                                <div class="col-md-10 d-flex align-items-start justify-content-between filters-input">
                                    <input type="text" name="name" value="{{ request()->name }}"
                                        placeholder="Restaurant Name" class="form-control">
                                    <input type="text" name="id" value="{{ request()->id }}"
                                        placeholder="Restaurant Id" class="form-control">
                                    <input type="text" name="phone" value="{{ request()->phone }}"
                                        placeholder="Restaurant Phone" class="form-control">
                                    <button type="submit" class="btn btn-secondary">Search</button>
                                </div>
                        </form>
                    </div>
                </div>
                </form>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>#ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($restaurants) > 0)
                            @foreach ($restaurants as $restaurant)
                                <tr>
                                    <td>{{ $restaurant->id }}</td>
                                    <td>{{ $restaurant->name }}</td>
                                    <td>{{ $restaurant->email }}</td>
                                    <td>{{ $restaurant->phone }}</td>
                                    <td>{{ $restaurant->address }}</td>

                                    <td>
                                        <a href="{{ route('admin.restaurants.edit', $restaurant->id) }}"
                                            class="btn btn-primary btn-sm">Edit</a>
                                        <form action="{{ route('admin.restaurants.destroy', $restaurant->id) }}"
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
                                <td colspan="4" class="text-center">No Data available</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                <div class="card-footer">
                    {{ $restaurants->appends(Request::all())->links('pagination::bootstrap-4') }}
                </div>
            </div>

        </div>
    </div>
@endsection
