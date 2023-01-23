@extends('admin.app')
@section('content')
    <div class="container-fluid pt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('Roles') }}</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.roles.index') }}" method="get">
                            <div class="row mb-2">
                                <div class="col-md-2">
                                    <a href="{{ route('admin.roles.create') }}" class="btn btn-success">Add New</a>
                                </div>
                                <div class="col-md-7">

                                </div>
                                <div class="col-md-3">
                                    <input type="search" name="name" value="{{ request()->name }}" placeholder="Search"
                                        class="form-control">
                        </form>
                    </div>
                </div>
                </form>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>#ID</th>
                            <th>Name</th>
                            <th>Permissions</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($roles) > 0)
                            @foreach ($roles as $role)
                                <tr>
                                    <td>{{ $role->id }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td class="d-flex align-items-center flex-wrap">
                                        @foreach ($role->permissions as $permission)
                                            <span
                                                style="background: green; color:#fff; padding:5px; border-radius:20px; font-size:13px;">{{ $permission->name }}</span>
                                        @endforeach
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.roles.edit', $role->id) }}"
                                            class="btn btn-primary btn-sm">Edit</a>
                                        <a href="#" class="btn btn-danger btn-sm delete-button"
                                            onclick="document.getElementById('delete-form-{{ $role->id }}').submit();">Delete</a>
                                        <form action="{{ route('admin.roles.destroy', $role->id) }}" method="POST"
                                            id="delete-form-{{ $role->id }}">
                                            @csrf
                                            @method('DELETE')
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
            </div>
            <div class="card-footer">
                {{ $roles->appends(Request::all())->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
