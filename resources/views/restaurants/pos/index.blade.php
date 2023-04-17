@extends('restaurants.app')
@section('css')
    <style>
        .card {
            border-radius: 0;
        }

        .card-header {
            background: #fff;
        }

        .form-control {
            border-radius: 0;
        }
    </style>
@stop
@section('content_header')
@endsection
@section('content')
    <section id="pos" class="pt-3 pb-3">
        <pos :categories="{{ $categories->toJson() }}" :tables="{{ $tables->toJson() }}"
            :restaurant="{{ currentRestaurant() }}">
        </pos>
    </section>
@endsection
