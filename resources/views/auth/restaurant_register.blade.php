@extends('frontend.app')

@section('content')
    <section class="authentication">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Restaurant Registration') }}</div>

                        <div class="card-body">
                            <form method="POST" action="{{ url('/restaurant/register') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="row mb-3">
                                    <label for="name"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Restaurant Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                            <p class="text-danger">
                                                <strong>{{ $message }}</strong>
                                            </p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="email"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Restaurant Email Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                            <p class="text-danger">
                                                <strong>{{ $message }}</strong>
                                            </p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="phone" class="col-md-4 col-form-label text-md-end">Restaurant Phone
                                        Number</label>
                                    <div class="col-md-6 d-flex align-items-center">
                                        <input type="text" class="form-control" value="+977" disabled
                                            style="width: 30%">
                                        <input type="number" maxlength="10" minlength="10" class="form-control"
                                            placeholder="Enter 10 Digit Phone number" name="phone">
                                        @error('phone')
                                            <p class="text-danger">
                                                <strong>{{ $message }}</strong>
                                            </p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="name"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Restaurant Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text"
                                            class="form-control @error('address') is-invalid @enderror" name="address"
                                            value="{{ old('address') }}" required autocomplete="address" autofocus>

                                        @error('address')
                                            <p class="text-danger">
                                                <strong>{{ $message }}</strong>
                                            </p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <label for="name"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Restaurant Display Image') }}</label>

                                    <div class="col-md-6">
                                        <input type="file" name="photo" value="">
                                        @error('photo')
                                            <p class="text-danger">{{ $errors->first('photo') }}</p>
                                        @enderror
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <label for="password"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="new-password">

                                        @error('password')
                                            <p class="text-danger">
                                                <strong>{{ $message }}</strong>
                                            </p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password-confirm"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="plan-confirm"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Suscription Plan') }}</label>

                                    <div class="col-md-6">
                                        <select name="plan_id" id="plan_id" class="form-control">
                                            @foreach (App\Models\SuscriptionPackages::$packages as $key => $value)
                                                <option value="{{ $key }}">{{ $value['name'] }}
                                                    ({{ $value['price'] }} / {{ $value['time'] }})
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="mm-button bg-theme-button">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
