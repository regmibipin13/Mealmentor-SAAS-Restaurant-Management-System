@extends('frontend.app')
@section('content')
    <section id="hero">
        <div class="container pt-4 pb-4">
            <div class="row align-items-center">
                <div class="col-md-6 hero-text-box d-flex flex-column">
                    <form action="{{ route('frontend.categories') }}" method="GET">
                        <h1 class="hero-main-text">Cacao Grill Bar and Restaurant</h1>
                        <h3 class="text-secondary">So Fast, So Hot</h3>
                        <h4>Choose your favorite category and order right now !</h4>
                        <select name="category" class="form-control hero-cat-select">
                            <option value="">Select your Category</option>
                            @foreach ($categories as $id => $name)
                                <option value="{{ $id }}">{{ $name }}</option>
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
@endsection
