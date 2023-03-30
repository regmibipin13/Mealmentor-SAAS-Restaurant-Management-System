@extends('restaurants.app')
@section('content')
    <div class="container-fluid pt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Items Create Form</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('restaurants.items.store', [currentRestaurant()->slug ?? uniqid()]) }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf

                            @include('restaurants.items.form')
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
