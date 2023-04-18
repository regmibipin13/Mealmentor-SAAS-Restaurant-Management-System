@extends('frontend.app')

@section('styles')
    <style>
        .payment {
            border: 1px solid #f2f2f2;
            height: 300px;
            border-radius: 20px;
            background: #fff;
        }

        .payment_header {
            background: rgba(255, 102, 0, 1);
            padding: 20px;
            border-radius: 20px 20px 0px 0px;

        }

        .check {
            margin: 0px auto;
            width: 50px;
            height: 50px;
            border-radius: 100%;
            background: #fff;
            text-align: center;
        }

        .check i {
            vertical-align: middle;
            line-height: 50px;
            font-size: 30px;
        }

        .content {
            text-align: center;
        }

        .content h1 {
            font-size: 25px;
            padding-top: 25px;
        }

        .content a {
            width: 200px;
            height: 35px;
            color: #fff;
            border-radius: 30px;
            padding: 5px 10px;
            background: rgba(255, 102, 0, 1);
            transition: all ease-in-out 0.3s;
        }

        .content a:hover {
            text-decoration: none;
            background: #000;
        }
    </style>
@endsection

@section('content')
    <section id="checkout" class="body-segment">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mx-auto mt-5">
                    <div class="payment">
                        <div class="payment_header">
                            <div class="check"><i class="fa fa-check" aria-hidden="true"></i></div>
                        </div>
                        <div class="content">
                            <h1>Order Success !</h1>
                            <p>Your Order has been created successfully with the order id ORD#{{ $order->id }}</p>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis praesentium nulla ipsam
                                unde laudantium doloremque alias quos sint aspernatur, labore illum laborum? Sapiente
                                aliquam aliquid expedita odio tempore architecto reiciendis!</p>
                            <a href="{{ route('frontend.home') }}">Go to Home</a>&nbsp;
                            <a href="{{ route('frontend.online-orders.show', $order->id) }}">Order Detail</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
