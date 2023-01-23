@extends('frontend.app')
@section('content')
    <div class="container pt-3 body-segment">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <form action="{{ route('frontend.online-orders.index') }}" method="get">
                            <div class="row mb-2">
                                {{-- <div class="col-md-2">
                                    <a href="{{ route('admin.items.create') }}" class="btn btn-success">Add New</a>
                                </div> --}}

                                <div class="col-md-10 d-flex align-items-start justify-content-between filters-input">
                                    <input type="text" name="id" value="{{ request()->id }}" placeholder="Order Id"
                                        class="form-control">
                                    <select name="order_status" id="order_status" class="form-control select2">
                                        <option value="">Order Status</option>
                                        <option value="pending"{{ request()->order_status == 'pending' ? 'selected' : '' }}>
                                            Pending</option>
                                        <option value="shipped"{{ request()->order_status == 'shipped' ? 'selected' : '' }}>
                                            Shipped</option>
                                        <option
                                            value="delivered"{{ request()->order_status == 'delivered' ? 'selected' : '' }}>
                                            Delivered</option>
                                    </select>

                                    <button type="submit" class="btn btn-secondary">Filter</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover datatable">
                            <thead>
                                <tr>
                                    <th>#ID</th>
                                    <th>Order Total</th>
                                    <th>Customer Name</th>
                                    <th>Customer Phone</th>
                                    <th>Payment Method</th>
                                    <th>Status</th>

                                </tr>
                            </thead>
                            <tbody>
                                @if (count($orders) > 0)
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td><a
                                                    href="{{ route('frontend.online-orders.show', $order->id) }}">{{ $order->id }}</a>
                                            </td>
                                            <td>{{ $order->payable_amount }}</td>
                                            <td>{{ $order->user->name }}</td>
                                            <td>{{ $order->user->phone }}</td>
                                            <td>{{ $order->payment_method }}</td>
                                            <td>{{ $order->order_status }}</td>

                                            <td>
                                                <a href="{{ route('frontend.online-orders.show', $order->id) }}"
                                                    class="btn btn-primary btn-sm">View</a>
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
                {{ $orders->appends(Request::all())->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection
