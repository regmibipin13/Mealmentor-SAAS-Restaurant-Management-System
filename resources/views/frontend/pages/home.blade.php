@extends('frontend.app')
@section('content')
    <section id="hero">
        <div class="container pt-4 pb-4">
            <div class="row align-items-center">
                <div class="col-md-6 hero-text-box d-flex flex-column">
                    <form action="{{ route('frontend.categories') }}" method="GET">
                        <h1 class="hero-main-text">Order your Favorite Food with Mealmentor</h1>
                        <h3 class="text-secondary">So Fast, So Hot</h3>
                        <h4>Choose your favorite restaurant and order right now !</h4>
                        <select name="restaurant_id" class="form-control hero-cat-select select2">
                            <option value="">Select your Favorite Restaurant</option>
                            @foreach ($restaurants as $r)
                                <option value="{{ $r->id }}">{{ $r->name }}</option>
                            @endforeach
                        </select>
                        <div class="pt-3 pb-3">
                            <button type="submit" class="bg-theme-button mm-button">CONTINUE
                                ORDERING</a>
                        </div>
                    </form>
                </div>
                <div class="col-md-6 hero-img-box">
                    <img src="{{ asset('images/hero.jpg') }}" alt="Hero Image" class="img-fluid" height="430px">
                </div>
            </div>
        </div>
    </section>
    <hr>
    <section id="restaurants" class="bg-white">
        <div class="container pt-4 pb-4">
            <div class="row mb-3">
                <div class="col-md-12">
                    <h3>
                        Explore By Restaurants
                    </h3>
                </div>
            </div>
            <div class="row">
                @foreach ($restaurants as $item)
                    <div class="col-md-3 mb-3">
                        <div class="card">
                            <img class="card-img-top" src="{{ $item->getFirstMediaUrl() }}" alt="{{ $item->name }}"
                                height="200">
                            <div class="card-body ">
                                <div class="d-flex align-items-center justify-content-between">
                                    <span class="mm-color-text mm-text-17 mm-text-bold">{{ $item->name }}</span>
                                </div>
                                <div class="description text-secondary pt-2 pb-2">
                                    {!! Str::words($item->address, '40', '...') !!}
                                </div>
                                <div class="add-to-cart d-flex align-items-center justify-content-between">
                                    <a href="{{ route('frontend.categories') }}?restaurant_id={{ $item->id }}"
                                        class="mm-button mm-theme-button">Explore</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
