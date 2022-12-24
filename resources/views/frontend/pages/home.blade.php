@extends('frontend.app')
@section('content')
    <section id="hero">
        <div class="container pt-4 pb-4">
            <div class="row align-items-center">
                <div class="col-md-6 hero-text-box d-flex flex-column">
                    <h1 class="hero-main-text">Cacao Grill Bar and Restaurant</h1>
                    <h3 class="text-secondary">So Fast, So Hot</h3>
                    <h4>Choose your favorite category and order right now !</h4>
                    <select name="category" class="form-control hero-cat-select">
                        <option value="">Select your Category</option>
                        <option value="cat1">Category 1</option>
                        <option value="cat1">Category 2</option>
                    </select>
                    <div class="pt-3 pb-3">
                        <a href="{{ route('frontend.categories') }}" class="bg-theme-button mm-button">CONTINUE ORDERING</a>
                    </div>
                </div>
                <div class="col-md-6 hero-img-box">
                    <img src="{{ asset('images/hero.jpg') }}" alt="Hero Image" class="img-fluid" height="430px">
                </div>
            </div>
        </div>
    </section>
@endsection
