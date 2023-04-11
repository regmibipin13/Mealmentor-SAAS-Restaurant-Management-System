@extends('frontend.app')
@section('content')
    <section class="pt-5 pb-4 body-segment" id="cart">
        <cart :addresses="{{ App\Models\Address::where('user_id', auth()->id())->get() }}" :url="{{ env('APP_URL') }}">
        </cart>
    </section>
@endsection
