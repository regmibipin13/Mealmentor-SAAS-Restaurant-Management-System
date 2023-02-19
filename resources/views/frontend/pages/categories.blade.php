@extends('frontend.app')
@section('content')
    <section id="categories" class="pt-5 pb-5 body-segment">
        <div class="container">
            <div class="row">
                <div class="col-md-12 d-flex align-items-center justify-content-between">
                    <a class="@if (request()->category == null) mm-button bg-theme-button @else btn btn-secondary @endif"
                        href="{{ route('frontend.categories') }}?restaurant_id={{ request()->restaurant_id }}">{{ __('All') }}</a>
                    @foreach ($categories as $id => $name)
                        <a class="@if (request()->category == $id) mm-button bg-theme-button @else btn btn-secondary @endif"
                            href="{{ route('frontend.categories') }}?restaurant_id={{ request()->restaurant_id }}&category={{ $id }}">{{ $name }}</a>
                    @endforeach
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-12">
                    <h3>{{ request()->has('category') && request()->category !== null ? App\Models\ItemCategory::find(request()->category)->name : 'All' }}
                    </h3>
                    <hr class="hr-theme">
                </div>
            </div>

            <div class="row item-card-row mt-4">
                @if (count($items) > 0)
                    @foreach ($items as $item)
                        <div class="col-md-3 mb-4">
                            <div class="card">
                                <img class="card-img-top" src="{{ $item->photo }}" alt="Card image cap">
                                <div class="card-body ">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <span class="mm-color-text mm-text-17 mm-text-bold">{{ $item->name }}</span>
                                        <span class="mm-color-text">Rs. {{ $item->price }}</span>
                                    </div>
                                    <div class="description text-secondary pt-2 pb-2">
                                        {!! Str::words($item->description, '16') !!} ...
                                    </div>
                                    <div class="add-to-cart d-flex align-items-center justify-content-between">
                                        @if (auth()->check())
                                            <add-to-cart :item="{{ $item }}"></add-to-cart>
                                        @else
                                            <a class="mm-button bg-theme-button d-flex align-items-center"
                                                href="{{ route('login') }}">
                                                <span style="text-transform: uppercase;" class="mm-text-15">Add to
                                                    Cart</span>
                                                &nbsp;
                                                &nbsp;
                                                &nbsp;
                                                <i class="fa-solid fa-cart-plus" style="font-size: 16px;"></i>
                                            </a>
                                        @endif
                                        &nbsp;&nbsp;
                                        {{-- <button class="mm-button bg-none-button">
                                            <i class="fa-solid fa-heart" class="mm-color-text"></i>
                                        </button> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-md-12">
                        <h6 class="text-secondary">No Items Available in this category</h6>
                    </div>
                @endif
                {{-- <div class="col-md-3 mb-4">
                    <div class="card">
                        <img class="card-img-top"
                            src="https://images.unsplash.com/photo-1555939594-58d7cb561ad1?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=774&q=80"
                            alt="Card image cap">
                        <div class="card-body ">
                            <div class="d-flex align-items-center justify-content-between">
                                <span class="mm-color-text mm-text-17 mm-text-bold">Sushi</span>
                                <span class="mm-color-text">Rs. 100 / plate</span>
                            </div>
                            <div class="description text-secondary pt-2 pb-2">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod ut, dolores fugiat culpa
                                dolorem aut facilis..
                            </div>
                            <div class="add-to-cart d-flex align-items-center justify-content-between">
                                <button class="mm-button bg-theme-button d-flex align-items-center">
                                    <span style="text-transform: uppercase;" class="mm-text-15">Add to Cart</span>
                                    &nbsp;
                                    &nbsp;
                                    &nbsp;
                                    <i class="fa-solid fa-cart-plus" style="font-size: 16px;"></i>
                                </button>
                                &nbsp;&nbsp;
                                <button class="mm-button bg-none-button">
                                    <i class="fa-solid fa-heart" class="mm-color-text"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card">
                        <img class="card-img-top"
                            src="https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=962&q=80"
                            alt="Card image cap">
                        <div class="card-body ">
                            <div class="d-flex align-items-center justify-content-between">
                                <span class="mm-color-text mm-text-17 mm-text-bold">Sushi</span>
                                <span class="mm-color-text">Rs. 100 / plate</span>
                            </div>
                            <div class="description text-secondary pt-2 pb-2">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod ut, dolores fugiat culpa
                                dolorem aut facilis..
                            </div>
                            <div class="add-to-cart d-flex align-items-center justify-content-between">
                                <button class="mm-button bg-theme-button d-flex align-items-center">
                                    <span style="text-transform: uppercase;" class="mm-text-15">Add to Cart</span>
                                    &nbsp;
                                    &nbsp;
                                    &nbsp;
                                    <i class="fa-solid fa-cart-plus" style="font-size: 16px;"></i>
                                </button>
                                &nbsp;&nbsp;
                                <button class="mm-button bg-none-button">
                                    <i class="fa-solid fa-heart" class="mm-color-text"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card">
                        <img class="card-img-top"
                            src="https://images.unsplash.com/photo-1484723091739-30a097e8f929?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTZ8fGZvb2R8ZW58MHx8MHx8&auto=format&fit=crop&w=900&q=60"
                            alt="Card image cap">
                        <div class="card-body ">
                            <div class="d-flex align-items-center justify-content-between">
                                <span class="mm-color-text mm-text-17 mm-text-bold">Sushi</span>
                                <span class="mm-color-text">Rs. 100 / plate</span>
                            </div>
                            <div class="description text-secondary pt-2 pb-2">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod ut, dolores fugiat culpa
                                dolorem aut facilis..
                            </div>
                            <div class="add-to-cart d-flex align-items-center justify-content-between">
                                <button class="mm-button bg-theme-button d-flex align-items-center">
                                    <span style="text-transform: uppercase;" class="mm-text-15">Add to Cart</span>
                                    &nbsp;
                                    &nbsp;
                                    &nbsp;
                                    <i class="fa-solid fa-cart-plus" style="font-size: 16px;"></i>
                                </button>
                                &nbsp;&nbsp;
                                <button class="mm-button bg-none-button">
                                    <i class="fa-solid fa-heart" class="mm-color-text"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>
@endsection
