@extends('admin.app')
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
                            <div class="col-md-12">
                                <a href="{{ route('admin.units.create') }}" class="btn btn-success">Add New</a>
                            </div>
                            {{-- Filterable Section --}}
                            @include('admin.includes.filterable', [
                                'route' => route('admin.units.index'),
                                'name' => 'name',
                                'placeholder' => 'Unit Name',
                            ])
                            {{-- Filterable Section end  --}}
                        </div>
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#ID</th>
                                    <th>Name</th>
                                    @include('admin.includes.restaurant_th')
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($units) > 0)
                                    @foreach ($units as $unit)
                                        <tr>
                                            <td>{{ $unit->id }}</td>
                                            <td>{{ $unit->name }}</td>
                                            <td>{{ $unit->restaurant->name }}</td>
                                            <td>
                                                <a href="{{ route('admin.units.edit', $unit->id) }}"
                                                    class="btn btn-primary btn-sm">Edit</a>
                                                &nbsp;
                                                <a href="#" class="btn btn-danger btn-sm delete-button"
                                                    onclick="document.getElementById('delete-form-{{ $unit->id }}').submit();">Delete</a>
                                                &nbsp;
                                                <form action="{{ route('admin.units.destroy', $unit->id) }}" method="POST"
                                                    id="delete-form-{{ $unit->id }}">
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
