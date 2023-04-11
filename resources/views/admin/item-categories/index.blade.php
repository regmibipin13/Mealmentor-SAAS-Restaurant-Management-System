@extends('admin.app')
@section('content')
    <div class="container-fluid pt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('Item Categories') }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-md-12">
                                <a href="{{ route('admin.item-categories.create') }}" class="btn btn-success">Add
                                    New</a>
                            </div>
                            <div class="col-md-12">
                                @include('admin.includes.filterable', [
                                    'route' => route('admin.item-categories.index'),
                                    'name' => 'name',
                                    'placeholder' => 'Item Category Name',
                                ])
                            </div>
                        </div>
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#ID</th>
                                    <th>Name</th>
                                    <th>Restaurant</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($item_categories) > 0)
                                    @foreach ($item_categories as $item_category)
                                        <tr>
                                            <td>{{ $item_category->id }}</td>
                                            <td>{{ $item_category->name }}</td>
                                            <td>{{ $item_category->restaurant->name }}</td>
                                            <td>
                                                <a href="{{ route('admin.item-categories.edit', $item_category->id) }}"
                                                    class="btn btn-primary btn-sm">Edit</a>
                                                &nbsp;
                                                <a href="#" class="btn btn-danger btn-sm delete-button"
                                                    onclick="document.getElementById('delete-form-{{ $item_category->id }}').submit();">Delete</a>
                                                &nbsp;
                                                <form
                                                    action="{{ route('admin.item-categories.destroy', $item_category->id) }}"
                                                    method="POST" id="delete-form-{{ $item_category->id }}">
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
                        {{ $item_categories->appends(Request::all())->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
