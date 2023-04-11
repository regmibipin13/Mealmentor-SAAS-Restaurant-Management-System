@extends('restaurants.app')
@section('content')
    <section id="profile-update-page" class="py-3">
        @if ($message = Session::get('success'))
            <div class="container py-3">
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-success">
                            {{ $message }}
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @if ($message = Session::get('error'))
            <div class="container py-3">
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            Restaurant Profile Update
                        </div>
                        <div class="card-body">
                            <form action="{{ route('restaurants.profile-update', currentRestaurant()->slug) }}"
                                method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ isset($restaurant) ? $restaurant->name : old('name') }}"
                                        placeholder="Enter the name of user">
                                    @error('name')
                                        <p class="text-danger">{{ $errors->first('name') }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control @error('address') is-invalid @enderror"
                                        name="address"
                                        value="{{ isset($restaurant) ? $restaurant->address : old('address') }}"
                                        placeholder="Enter the address">
                                    @error('address')
                                        <p class="text-danger">{{ $errors->first('address') }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="number" class="form-control @error('phone') is-invalid @enderror"
                                        name="phone" value="{{ isset($restaurant) ? $restaurant->phone : old('phone') }}"
                                        placeholder="Enter the phone of user">
                                    @error('phone')
                                        <p class="text-danger">{{ $errors->first('phone') }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ isset($restaurant) ? $restaurant->email : old('email') }}"
                                        placeholder="Enter the email of user">
                                    @error('email')
                                        <p class="text-danger">{{ $errors->first('email') }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="min_order_value">Minimum Order Value</label>
                                    <input type="number"
                                        class="form-control @error('min_order_value') is-invalid @enderror"
                                        name="min_order_value"
                                        value="{{ isset($restaurant) ? $restaurant->min_order_value : old('min_order_value') }}"
                                        placeholder="Enter the min order value">
                                    @error('min_order_value')
                                        <p class="text-danger">{{ $errors->first('min_order_value') }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="delivery_per_km">Delivery Price Per Km</label>
                                    <input type="number"
                                        class="form-control @error('delivery_price_per_km') is-invalid @enderror"
                                        name="delivery_price_per_km"
                                        value="{{ isset($restaurant) ? $restaurant->delivery_price_per_km : old('delivery_price_per_km') }}"
                                        placeholder="Enter the delivery charge per km (in Rs)">
                                    @error('delivery_price_per_km')
                                        <p class="text-danger">{{ $errors->first('delivery_price_per_km') }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <img src="{{ isset($restaurant) ? $restaurant->getFirstMediaUrl() : '' }}"
                                        alt="{{ isset($restaurant) ? $restaurant->name : '' }}" width="70"
                                        height="70"><br />
                                    <label for="photo">Photo</label><br />
                                    <input type="file" name="photo" value="">
                                    @error('photo')
                                        <p class="text-danger">{{ $errors->first('photo') }}</p>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-success">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            Change Password
                        </div>
                        <div class="card-body">
                            <form action="{{ route('restaurants.change-password', currentRestaurant()->slug) }}"
                                method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="old_password">Old Password</label>
                                    <input type="password" class="form-control" placeholder="Enter your old Password"
                                        name="old_password">
                                    @if ($errors->has('old_password'))
                                        <p class="text-danger">{{ $errors->first('old_password') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="password">New Password</label>
                                    <input type="password" class="form-control" placeholder="Enter your New Password"
                                        name="password">
                                    @if ($errors->has('password'))
                                        <p class="text-danger">{{ $errors->first('password') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="password_confirmation">Old Password</label>
                                    <input type="password" class="form-control"
                                        placeholder="Enter your New Password again" name="password_confirmation">
                                    @if ($errors->has('password_confirmation'))
                                        <p class="text-danger">{{ $errors->first('password_confirmation') }}</p>
                                    @endif
                                </div>

                                <button type="submit" class="btn btn-success">Change Password</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
