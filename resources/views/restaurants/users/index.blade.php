@extends('restaurants.app')
@section('content')
    <div class="container-fluid pt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('Users') }}</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('restaurants.users.index', currentRestaurant()->slug ?? uniqid()) }}"
                            method="get">
                            <div class="row mb-2">
                                <div class="col-md-2">
                                    <a href="{{ route('restaurants.users.create', currentRestaurant()->slug ?? uniqid()) }}"
                                        class="btn btn-success">Add New</a>
                                </div>

                                <div class="col-md-10 d-flex align-items-start justify-content-between filters-input">
                                    <input type="text" name="name" value="{{ request()->name }}"
                                        placeholder="User Name" class="form-control">
                                    <input type="text" name="id" value="{{ request()->id }}" placeholder="User Id"
                                        class="form-control">
                                    <input type="text" name="phone" value="{{ request()->phone }}"
                                        placeholder="User Phone" class="form-control">
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
                            <th>Roles</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($users) > 0)
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>
                                        @foreach ($user->roles as $role)
                                            <span
                                                style="background: green; color:#fff; padding:5px; border-radius:20px;">{{ $role->name }}</span>
                                        @endforeach
                                    </td>
                                    <td>
                                        <a href="{{ route('restaurants.users.edit', [currentRestaurant()->slug ?? uniqid(), $user->id]) }}"
                                            class="btn btn-primary btn-sm">Edit</a>
                                        <form
                                            action="{{ route('restaurants.users.destroy', [currentRestaurant()->slug ?? uniqid(), $user->id]) }}"
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
                    {{ $users->appends(Request::all())->links('pagination::bootstrap-4') }}
                </div>
            </div>

        </div>
    </div>
@endsection
