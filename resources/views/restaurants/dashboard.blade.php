@extends('restaurants.app')
@section('content_header')
@endsection
@section('content')
    <div class="container-fluid py-1 mt-2">
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
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-info"><i class="fab fa-first-order"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total Online Orders</span>
                        <span class="info-box-number">{{ $orders_count }}</span>
                    </div>

                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-info"><i class="fab fa-first-order"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Total POS Orders</span>
                        <span class="info-box-number">{{ $pos_orders_count }}</span>
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

        </div>
    </div>


    <div class="container-fluid py-1 mt-2">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ url('/restaurants/dashboard') }}"
                    class="row d-flex align-items-center justify-content-between" method="GET">
                    <div class="form-group col-md-4">
                        <label for="from">From Date</label>
                        <input type="date" class="form-control" name="from_date" id="from"
                            value="{{ request()->from_date }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="to">To Date</label>
                        <input type="date" class="form-control" name="to_date"
                            id="to"value="{{ request()->to_date }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="report_type">Report Type</label>
                        <select name="report_type" class="form-control">
                            <option value="day"{{ request()->report_type == 'day' ? 'selected' : '' }}>Day</option>
                            <option value="week"{{ request()->report_type == 'week' ? 'selected' : '' }}>Week</option>
                            <option value="month"{{ request()->report_type == 'month' ? 'selected' : '' }}>Month</option>
                            <option value="year"{{ request()->report_type == 'year' ? 'selected' : '' }}>Year</option>
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <button class="btn btn-success">Filter</button>
                        {{-- <button class="btn btn-primary">Excel</button> --}}
                    </div>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Orders Reports
                    </div>
                    <div class="card-body">
                        {!! $chart1->renderHtml() !!}
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        POS Orders Reports
                    </div>
                    <div class="card-body">
                        {!! $chart5->renderHtml() !!}
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Sales Reports
                    </div>
                    <div class="card-body">
                        {!! $chart2->renderHtml() !!}
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Orders By Payment Method
                    </div>
                    <div class="card-body">
                        {!! $chart3->renderHtml() !!}
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Orders By Status
                    </div>
                    <div class="card-body">
                        {!! $chart4->renderHtml() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    {!! $chart1->renderChartJsLibrary() !!}

    {!! $chart1->renderJs() !!}
    {!! $chart2->renderJs() !!}
    {!! $chart3->renderJs() !!}
    {!! $chart4->renderJs() !!}
    {!! $chart5->renderJs() !!}
@endsection
