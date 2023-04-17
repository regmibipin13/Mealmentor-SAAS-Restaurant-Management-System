@extends('frontend.app')
@section('styles')
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

        .cancel {
            text-decoration: none
        }

        .bg-pay {
            background-color: #eee;
            border-radius: 2px
        }

        .com-color {
            color: #8f37aa !important
        }

        .radio {
            cursor: pointer
        }

        label.radio input {
            position: absolute;
            top: 0;
            left: 0;
            visibility: hidden;
            pointer-events: none
        }

        label.radio div {
            padding: 7px 14px;
            border: 1px solid #E93F33;
            display: inline-block;
            color: #E93F33;
            border-radius: 3px;
            text-transform: uppercase;
            width: 100%;
            margin-bottom: 10px
        }

        label.radio input:checked+div {
            border-color: #E93F33;
            background-color: #E93F33;
            color: #fff
        }

        .fw-500 {
            font-weight: 400
        }

        .lh-16 {
            line-height: 16px
        }
    </style>
@endsection
@section('content')
    <section class="pt-5 pb-4 body-segment" id="cart">
        <cart :addresses="{{ App\Models\Address::where('user_id', auth()->id())->get() }}" :url="'{{ env('APP_URL') }}'">
        </cart>
    </section>
@endsection
