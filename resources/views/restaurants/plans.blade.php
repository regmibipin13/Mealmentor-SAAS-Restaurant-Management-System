@extends('restaurants.app')
@section('content_header')
@endsection
@section('content')
    <div class="container-fluid py-1 mt-2">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Suscribe
                    </div>
                    <div class="card-body">
                        Hi {{ auth()->user()->name }}, Seems like your suscription plan has expired. Please choose any of
                        the suscription plan you like to continue your regular system operation
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-6 col-12">
                <form action="{{ route('restaurants.resuscribe') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="plans">Choose a plan</label>
                        <select name="plan_id" id="plan_id" class="form-control">
                            @foreach (App\Models\SuscriptionPackages::$packages as $key => $value)
                                <option value="{{ $key }}">{{ $value['name'] }}
                                    ({{ $value['price'] }} / {{ $value['time'] }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <button class="btn btn-success">Pay with Esewa</button>
                </form>
            </div>

        </div>
    </div>
@endsection
