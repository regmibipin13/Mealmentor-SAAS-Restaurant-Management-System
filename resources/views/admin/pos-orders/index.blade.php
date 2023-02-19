@extends('admin.app')
@section('content')
    <div class="container-fluid pt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    {{-- <div class="card-header">
                        <form action="{{ route('admin.pos-orders.index') }}" method="get">
                            <div class="row mb-2">

                                <div class="col-md-10 d-flex align-items-start justify-content-between filters-input">
                                    <input type="text" name="id" value="{{ request()->id }}" placeholder="Order Id"
                                        class="form-control">
                                    &nbsp;
                                    <input type="date" name="order_date" value="{{ request()->date }}"
                                        placeholder="Order Date" class="form-control">
                                    &nbsp;
                                    <select name="order_status" id="order_status" class="form-control select2">
                                        <option value="">Order Status</option>
                                        @foreach (App\Models\PosOrder::STATUS as $key => $value)
                                            <option
                                                value="{{ $value }}"{{ request()->order_status == $value ? 'selected' : '' }}>
                                                {{ $value }}</option>
                                        @endforeach

                                    </select>
                                    &nbsp;
                                    <button type="submit" class="btn btn-secondary">Filter</button>
                                </div>
                        </form>
                    </div> --}}
                    <div class="card-body">
                        {{ $dataTable->table() }}
                        {{-- <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#ID</th>
                                    <th>Order Total</th>
                                    <th>Table</th>
                                    <th>Status</th>
                                    <th>Order Completion</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($orders) > 0)
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td><a
                                                    href="{{ route('admin.pos-orders.show', $order->id) }}">{{ $order->id }}</a>
                                            </td>
                                            <td>{{ $order->total_amount }}</td>
                                            <td>{{ $order->table->name }}</td>
                                            <td>{{ $order->order_status }}</td>
                                            <td>{{ $order->is_order_ended ? 'Completed' : 'Running' }}</td>

                                            <td>
                                                <a href="{{ route('admin.pos-orders.show', $order->id) }}"
                                                    class="btn btn-primary btn-sm">View</a>
                                                <form action="{{ route('admin.pos-orders.destroy', $order->id) }}"
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
