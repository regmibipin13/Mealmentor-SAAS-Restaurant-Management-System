@extends('admin.app')
@section('content')
    <div class="container-fluid pt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('Users') }}</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.users.index') }}" method="get">
                            <div class="row mb-2">
                                <div class="col-md-2">
                                    <a href="{{ route('admin.users.create') }}" class="btn btn-success">Add New</a>
                                </div>

                                <div class="col-md-10 d-flex align-items-start justify-content-between filters-input">
                                    <input type="text" name="name" value="{{ request()->name }}"
                                        placeholder="User Name" class="form-control">
                                    <input type="text" name="id" value="{{ request()->id }}" placeholder="User Id"
                                        class="form-control">
                                    <input type="text" name="phone" value="{{ request()->phone }}"
                                        placeholder="User Phone" class="form-control">
                                    <select name="is_admin_side" id="type" class="form-control">
                                        <option value=""{{ request()->is_admin_side == '' ? 'selected' : '' }}>All
                                        </option>
                                        <option value="0" {{ request()->is_admin_side == '0' ? 'selected' : '' }}>
                                            Customer</option>
                                        <option value="1"{{ request()->is_admin_side == '1' ? 'selected' : '' }}>Admin
                                        </option>
                                    </select>
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
                            <th>Type</th>
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
                                    <td>{{ array_search($user->user_type, App\Models\User::USER_TYPE, true) }}</td>
                                    <td>
                                        @foreach ($user->roles as $role)
                                            <span
                                                style="background: green; color:#fff; padding:5px; border-radius:20px;">{{ $role->name }}</span>
                                        @endforeach
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.users.edit', $user->id) }}"
                                            class="btn btn-primary btn-sm">Edit</a>
                                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
                                            id="delete-form">
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
