@extends('frontend.app')
@section('content')
    <div class="container pt-3 body-segment">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered table-hover datatable">
                            <tr>
                                <th>Order Id</th>
                                <td>{{ $order->id }}</td>
                            </tr>
                            <tr>
                                <th>Order Status</th>
                                <td>
                                    {{ $order->order_status }}
                                </td>
                            </tr>
                            <tr>
                                <th>Order Date</th>
                                <td>{{ $order->date }}</td>
                            </tr>
                            <tr>
                                <th>Order Total</th>
                                <td>{{ $order->payable_amount }}</td>
                            </tr>
                            <tr>
                                <th>Order Id</th>
                                <td>{{ $order->id }}</td>
                            </tr>
                            <tr>
                                <th>Customer Id</th>
                                <td>{{ $order->user_id }}</td>
                            </tr>
                            <tr>
                                <th>Customer Name</th>
                                <td>{{ $order->user->name }}</td>
                            </tr>
                            <tr>
                                <th>Customer Phone</th>
                                <td>{{ $order->user->phone }}</td>
                            </tr>
                            <tr>
                                <th>Delivery Address</th>
                                <td>{{ $order->address->city }} , {{ $order->address->street }} <br /> Landmark:
                                    {{ $order->address->nearby_landmark }}</td>
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
                                        </tr>
                                        @foreach ($order->orderable_items as $item)
                                            <tr>
                                                <td>{{ $item->item_id }}</td>
                                                <td>{{ App\Models\Item::find($item->item_id)->name }}</td>
                                                <td>{{ $item->quantity }}</td>
                                                <td>{{ $item->price }}</td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <th colspan="3">Cart Total</th>
                                            <td>{{ $order->orderable_items->sum('price') }}</td>
                                        </tr>
                                        <tr>
                                            <th colspan="3">Discount</th>
                                            <td>0</td>
                                        </tr>
                                        <tr>
                                            <th colspan="3">Payable Total</th>
                                            <td>{{ $order->payable_amount }}</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <th>Payment Details</th>
                                <td>
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>Payment Id</th>
                                            <th>Payment Method</th>
                                            <th>Payment Status</th>
                                            <th>Payment Amount</th>
                                            <th>Payment Response</th>
                                        </tr>
                                        <tr>
                                            <td>{{ $order->payment->id }}</td>
                                            <td>{{ $order->payment->payment_method }}</td>
                                            <td>{{ $order->payment->payment_status }}</td>
                                            <td>{{ $order->payment->amount }}</td>
                                            <td>{{ $order->payment->response }}</td>
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
