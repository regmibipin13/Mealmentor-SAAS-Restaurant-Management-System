@extends('frontend.app')
@section('content')
    <div class="container body-segment">
        <div class="row">
            <div class="col-md-12 pt-3 pb-3">
                <h3>My Addresses</h3>
            </div>
        </div>
        <div class="row">
            <div class="card">
                <div class="card-header">
                    @if (isset($address))
                        Edit Address
                    @else
                        Create Address
                    @endif
                </div>

                <div class="card-body">
                    <form
                        action="{{ isset($address) ? route('frontend.addresses.update', $address->id) : route('frontend.addresses.store') }}"
                        method="POST">
                        @csrf

                        @if (isset($address))
                            @method('PATCH')
                        @endif

                        <div class="form-group">
                            <label for="name">Address Name (Ex. Home Address, Office Address)</label>
                            <input type="text" class="form-control" placeholder="Enter Address Name" name="name"
                                value="{{ isset($address) ? $address->name : old('name') }}">
                            @error('name')
                                <p class="text-danger">{{ $errors->first('name') }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="name">City</label>
                            <input type="text" class="form-control" placeholder="Enter City" name="city"
                                value="{{ isset($address) ? $address->city : old('city') }}">
                            @error('city')
                                <p class="text-danger">{{ $errors->first('city') }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="street">Street Address</label>
                            <input type="text" class="form-control" placeholder="Enter Street Address" name="street"
                                value="{{ isset($address) ? $address->street : old('street') }}">
                            @error('street')
                                <p class="text-danger">{{ $errors->first('street') }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="nearby_landmark">Nearby Landmark</label>
                            <input type="text" class="form-control" placeholder="Enter Nearby Landmark"
                                name="nearby_landmark"
                                value="{{ isset($address) ? $address->nearby_landmark : old('nearby_landmark') }}">
                            @error('nearby_landmark')
                                <p class="text-danger">{{ $errors->first('nearby_landmark') }}</p>
                            @enderror
                        </div>

                        <button class="btn btn-success" type="submit">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
