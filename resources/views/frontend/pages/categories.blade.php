@extends('frontend.app')
@section('content')

    <section id="categories" class="pt-3 pb-5 body-segment">
        <div class="container">
            <div class="row my-3">
                <div class="col-md-9">

                </div>
                <div class="col-md-3" style="text-align: right;">
                    <button onclick="prev();" class="btn btn-sm btn-primary"><i class="fa-solid fa-arrow-left"></i></button>
                    &nbsp;
                    <button onclick="next();" class="btn btn-sm btn-primary"><i
                            class="fa-solid fa-arrow-right"></i></button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div style="overflow: auto; white-space:nowrap;overflow-x:hidden;overflow-y:hidden;"
                        id="categories-slider">
                        <a class="@if (request()->category == null) mm-button bg-theme-button @else btn btn-secondary @endif"
                            href="{{ route('frontend.categories') }}?restaurant_id={{ request()->restaurant_id }}">{{ __('All') }}</a>
                        &nbsp;
                        @foreach ($categories as $id => $name)
                            <a class="@if (request()->category == $id) mm-button bg-theme-button @else btn btn-secondary @endif"
                                href="{{ route('frontend.categories') }}?restaurant_id={{ request()->restaurant_id }}&category={{ $id }}">{{ $name }}</a>
                            &nbsp;
                        @endforeach
                    </div>
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
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        function prev() {
            $('#categories-slider').animate({
                scrollLeft: "-=100px"
            }, "slow")
        }

        function next() {
            $('#categories-slider').animate({
                scrollLeft: "+=100px"
            }, "slow")
        }
    </script>
@endsection
