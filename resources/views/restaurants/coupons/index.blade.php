@extends('restaurants.app')
@section('content')
    <div class="container-fluid pt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="col-md-12">
                            <a href="{{ route('restaurants.coupons.create', [currentRestaurant()->slug ?? uniqid()]) }}"
                                class="btn btn-success">Add New</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover datatable">
                            <thead>
                                <tr>
                                    <th>#ID</th>
                                    <th>Name</th>
                                    <th>Code</th>
                                    <th>Discount</th>
                                    <th>Valid From</th>
                                    <th>Valid Till</th>
                                    <th>Enabled</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($coupons) > 0)
                                    @foreach ($coupons as $coupon)
                                        <tr>
                                            <td>{{ $coupon->id }}</td>
                                            <td>{{ $coupon->name }}</td>
                                            <td>{{ $coupon->code }}</td>
                                            <td>{{ $coupon->discount_percentage }}</td>
                                            <td>{{ $coupon->valid_from }}</td>
                                            <td>{{ $coupon->valid_till }}</td>
                                            <td>{{ $coupon->is_enabled == 1 ? 'Enabled' : 'Disabled' }}</td>
                                            <td>
                                                <a href="{{ route('restaurants.coupons.edit', [currentRestaurant()->slug ?? uniqid(), $coupon->id]) }}"
                                                    class="btn btn-primary btn-sm">Edit</a>
                                                <form
                                                    action="{{ route('restaurants.coupons.destroy', [currentRestaurant()->slug ?? uniqid(), $coupon->id]) }}"
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
                {{ $coupons->appends(Request::all())->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection
