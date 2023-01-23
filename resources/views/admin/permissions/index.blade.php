@extends('admin.app')
@section('content')
    <div class="container-fluid pt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('Permissions') }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-md-2">
                                <a href="{{ route('admin.permissions.create') }}" class="btn btn-success">Add New</a>
                            </div>
                            <div class="col-md-7">

                            </div>
                            <div class="col-md-3">
                                <form action="{{ route('admin.permissions.index') }}" method="get">
                                    <input type="search" name="name" value="{{ request()->name }}" placeholder="Search"
                                        class="form-control">
                                </form>
                            </div>
                        </div>
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#ID</th>
                                    <th>Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($permissions) > 0)
                                    @foreach ($permissions as $permission)
                                        <tr>
                                            <td>{{ $permission->id }}</td>
                                            <td>{{ $permission->name }}</td>
                                            <td>
                                                <a href="{{ route('admin.permissions.edit', $permission->id) }}"
                                                    class="btn btn-primary btn-sm">Edit</a>
                                                <a href="#" class="btn btn-danger btn-sm delete-button"
                                                    onclick="document.getElementById('delete-form-{{ $permission->id }}').submit();">Delete</a>
                                                <form action="{{ route('admin.permissions.destroy', $permission->id) }}"
                                                    method="POST" id="delete-form-{{ $permission->id }}">
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
                        {{ $permissions->appends(Request::all())->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
