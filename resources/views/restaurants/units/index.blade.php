@extends('restaurants.app')
@section('content')
    <div class="container-fluid pt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('Units') }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-md-2">
                                <a href="{{ route('restaurants.units.create') }}" class="btn btn-success">Add New</a>
                            </div>
                            <div class="col-md-7">

                            </div>
                            <div class="col-md-3">
                                <form action="{{ route('restaurants.units.index') }}" method="get">
                                    <input type="search" name="name" value="{{ request()->name }}"
                                        placeholder="Unit Name" class="form-control">
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
                                @if (count($units) > 0)
                                    @foreach ($units as $unit)
                                        <tr>
                                            <td>{{ $unit->id }}</td>
                                            <td>{{ $unit->name }}</td>
                                            <td>
                                                <a href="{{ route('restaurants.units.edit', $unit->id) }}"
                                                    class="btn btn-primary btn-sm">Edit</a>
                                                &nbsp;
                                                <a href="#" class="btn btn-danger btn-sm delete-button"
                                                    onclick="document.getElementById('delete-form-{{ $unit->id }}').submit();">Delete</a>
                                                <form action="{{ route('restaurants.units.destroy', $unit->id) }}"
                                                    method="POST" id="delete-form-{{ $unit->id }}">
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
                        {{ $units->appends(Request::all())->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
