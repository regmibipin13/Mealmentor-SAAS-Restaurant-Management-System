@extends('admin.app')
@section('content')
    <section id="profile-update-page" class="py-3">
        <div class="container">
            <div class="row">
                @if (Session::get('success') || Session::get('error'))
                    <div class="col-md-12 my-2">
                        <div class="card">
                            <div class="card-body">
                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success">
                                        {{ $message }}
                                    </div>
                                @endif
                                @if ($message = Session::get('error'))
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endif
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            Profile Update

                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.profile-update') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ isset($restaurant) ? $restaurant->name : old('name') }}"
                                        placeholder="Enter the name of user">
                                    @error('name')
                                        <p class="text-danger">{{ $errors->first('name') }}</p>
                                    @enderror

                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="number" class="form-control @error('phone') is-invalid @enderror"
                                            name="phone"
                                            value="{{ isset($restaurant) ? $restaurant->phone : old('phone') }}"
                                            placeholder="Enter the phone of user">
                                        @error('phone')
                                            <p class="text-danger">{{ $errors->first('phone') }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            name="email"
                                            value="{{ isset($restaurant) ? $restaurant->email : old('email') }}"
                                            placeholder="Enter the email of user">
                                        @error('email')
                                            <p class="text-danger">{{ $errors->first('email') }}</p>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-success">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="card-header">
                            Change Password
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.change-password') }}" method="POST">
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
                                    <input type="password" class="form-control" placeholder="Enter your New Password again"
                                        name="password_confirmation">
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
