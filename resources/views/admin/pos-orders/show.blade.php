@extends('admin.app')
@section('content')
    <div class="container-fluid pt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered table-hover datatable">
                            <tr>
                                <th>POS Order Id</th>
                                <td>{{ $order->id }}</td>
                            </tr>
                            <tr>
                                <th>Order Status</th>
                                <td>
                                    <form action="{{ route('admin.pos-orders.update', $order->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <select name="order_status" id="order_status" class="form-control select2">
                                            <option value="">Order Status</option>
                                            @foreach (App\Models\PosOrder::STATUS as $key => $value)
                                                <option
                                                    value="{{ $value }}"{{ $order->order_status == $value ? 'selected' : '' }}>
                                                    {{ $value }}</option>
                                            @endforeach

                                        </select>

                                        <button type="submit" class="btn btn-sm btn-success">Update Status</button>
                                    </form>
                                </td>
                            </tr>
                            <tr>
                                <th>Order Date</th>
                                <td>{{ $order->order_date }}</td>
                            </tr>
                            <tr>
                                <th>Order Total</th>
                                <td>{{ $order->total_amount }}</td>
                            </tr>
                            <tr>
                                <th>POS Order Id</th>
                                <td>{{ $order->id }}</td>
                            </tr>

                            <tr>
                                <th>Order Items</th>
                                <td>
                                    <table class="table-bordered table table-responsive">
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Qty</th>
                                            <th>Price</th>
                                            @if (!$order->is_order_ended)
                                                <th>Action</th>
                                            @endif
                                        </tr>
                                        @foreach ($order->orderable_items as $item)
                                            <tr>
                                                <td>{{ $item->item_id }}</td>
                                                <td>{{ App\Models\Item::find($item->item_id)->name }}</td>
                                                <td>{{ $item->quantity }}</td>
                                                <td>{{ $item->price }}</td>
                                                @if (!$order->is_order_ended)
                                                    <td>
                                                        <form
                                                            action="{{ route('admin.pos-orders.remove_item', $order->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            <input type="hidden" name="item_id"
                                                                value="{{ $item->id }}">
                                                            <button class="btn btn-sm btn-danger">Remove Item</button>
                                                        </form>
                                                    </td>
                                                @endif
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <th colspan="3">Cart Total</th>
                                            <td>{{ $order->orderable_items->sum('price') }}</td>
                                        </tr>

                                        <tr>
                                            <th colspan="3">Payable Total</th>
                                            <td>{{ $order->total_amount }}</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
