@extends('restaurants.app')
@section('content')
    <div class="container-fluid py-1">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ url('/restaurants/reports') }}" class="row d-flex align-items-center justify-content-between"
                    method="GET">
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
