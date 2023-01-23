@extends('restaurants.app')
@section('content')
    <div class="container-fluid pt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Item Categories Form</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('restaurants.item-categories.store') }}" method="POST">
                            @csrf

                            @include('restaurants.item-categories.form')
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
