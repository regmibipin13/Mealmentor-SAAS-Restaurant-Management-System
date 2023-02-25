@extends('frontend.app')
@section('content')
    <section class="body-segment">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <pos-customer :categories="{{ $categories->toJson() }}" :tables="{{ $tables->toJson() }}"
                        :request="{{ json_encode(request()->all()) }}">
                    </pos-customer>
                </div>
            </div>
        </div>
    </section>
@endsection
