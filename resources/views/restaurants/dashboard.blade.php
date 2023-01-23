@extends('restaurants.app')
@section('content')
    <div class="container-fluid py-1">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Dashboard
                    </div>
                    <div class="card-body">
                        Welcome to the Dashboard {{ auth()->user()->name }}
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            {{-- <div class="col-md-12">
                <form action="{{ url('/restaurants/dashboard') }}"
                    class="row d-flex align-items-center justify-content-between" method="GET">
                    <div class="form-group col-md-3">
                        <label for="from">From Date</label>
                        <input type="date" class="form-control" name="from_date" id="from"
                            value="{{ request()->from_date }}">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="to">To Date</label>
                        <input type="date" class="form-control" name="to_date"
                            id="to"value="{{ request()->to_date }}">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="order_status">Order Status</label>
                        <select name="order_status" class="form-control">
                            @foreach (App\Models\OnlineOrder::STATUS as $key => $value)
                                <option value="{{ $key }}" {{ request()->order_status == $key ? 'selected' : '' }}>
                                    {{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                    @if (auth()->user()->type == App\Models\User::USER_TYPE['admin'])
                        <div class="form-group col-md-3">
                            <label for="restaurant_id">Restaurant</label>
                            <select name="restaurant_id" class="form-control">
                                @foreach (App\Models\Restaurant::pluck('name', 'id') as $key => $value)
                                    <option value="{{ $key }}"
                                        {{ request()->restaurant_id == $key ? 'selected' : '' }}>
                                        {{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                    @else
                        <div class="form-group col-md-3">
                            <label for="payment_method">Payment Method</label>
                            <select name="payment_method" class="form-control">
                                <option value="all">All</option>
                                <option value="cash">Cash On Delivery</option>
                                <option value="esewa">Esewa</option>
                            </select>
                        </div>
                    @endif
                    <div class="form-group col-md-3">
                        <button class="btn btn-success">Filter</button>
                        <button class="btn btn-primary">Excel</button>
                    </div>
                </form>
            </div> --}}
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-info"><i class="fab fa-first-order"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Orders</span>
                        <span class="info-box-number">{{ $orders_count }}</span>
                    </div>

                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-info"><i class="fab fa-product-hunt"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Items</span>
                        <span class="info-box-number">{{ $orders_count }}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-info"><i class="fas fa-user"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Customers</span>
                        <span class="info-box-number">{{ $orders_count }}</span>
                    </div>

                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-info"><i class="fab fa-first-order"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Categories</span>
                        <span class="info-box-number">{{ $orders_count }}</span>
                    </div>

                </div>
            </div>
        </div>

        {{-- <div class="row">
            <div class="col-md-6 card">
                <div class="card-header">
                    Daily Order Orders Reports
                </div>
                <div class="card-body">
                    {!! $chart1->renderHtml() !!}
                </div>
            </div>
        </div> --}}
    </div>
@endsection

@section('js')
    {!! $chart1->renderChartJsLibrary() !!}

    {!! $chart1->renderJs() !!}
@endsection
