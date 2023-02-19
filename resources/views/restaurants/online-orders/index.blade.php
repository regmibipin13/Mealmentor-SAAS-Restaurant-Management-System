@extends('restaurants.app')
@section('content')
    <div class="container-fluid pt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    {{-- <div class="card-header">
                        <form action="{{ route('restaurants.online-orders.index') }}" method="get">
                            <div class="row mb-2">

                                <div class="col-md-10 d-flex align-items-start justify-content-between filters-input">
                                    <input type="text" name="id" value="{{ request()->id }}" placeholder="Order Id"
                                        class="form-control">
                                    &nbsp;
                                    <input type="date" name="date" value="{{ request()->date }}"
                                        placeholder="Order Date" class="form-control">
                                    &nbsp;
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
                                    &nbsp;
                                    <select name="payment_method" id="payment_method" class="form-control select2">
                                        <option value="">Payment Method</option>
                                        <option value="cash"{{ request()->payment_method == 'cash' ? 'selected' : '' }}>
                                            Cash</option>
                                        <option value="esewa"{{ request()->payment_method == 'esewa' ? 'selected' : '' }}>
                                            Esewa</option>

                                    </select>
                                    &nbsp;
                                    <button type="submit" class="btn btn-secondary">Filter</button>
                                </div>
                        </form>
                    </div> --}}
                    <div class="card-body">
                        {{-- <table class="table table-bordered table-hover datatable">
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
                                                    href="{{ route('restaurants.online-orders.show', $order->id) }}">{{ $order->id }}</a>
                                            </td>
                                            <td>{{ $order->payable_amount }}</td>
                                            <td>{{ $order->user->name }}</td>
                                            <td>{{ $order->user->phone }}</td>
                                            <td>{{ $order->payment_method }}</td>
                                            <td>{{ $order->order_status }}</td>

                                            <td>
                                                <a href="{{ route('restaurants.online-orders.show', $order->id) }}"
                                                    class="btn btn-primary btn-sm">View</a>
                                                <form action="{{ route('restaurants.online-orders.destroy', $order->id) }}"
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
                        </table> --}}

                        {{ $dataTable->table() }}
                    </div>
                </div>
            </div>
            {{-- <div class="card-footer">
                {{ $orders->appends(Request::all())->links('pagination::bootstrap-4') }}
            </div> --}}
        </div>
    </div>
@endsection
@section('js')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endsection
