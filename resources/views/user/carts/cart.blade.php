@extends('frontend.app')
@section('content')
    <section class="pt-5 pb-4 body-segment">
        <cart :addresses="{{ App\Models\Address::where('user_id', auth()->id())->get() }}"></cart>
    </section>
@endsection
