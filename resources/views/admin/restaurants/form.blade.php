<div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
        value="{{ isset($restaurant) ? $restaurant->name : old('name') }}" placeholder="Enter the name of user">
    @error('name')
        <p class="text-danger">{{ $errors->first('name') }}</p>
    @enderror
</div>

<div class="form-group">
    <label for="address">Address</label>
    <input type="text" class="form-control @error('address') is-invalid @enderror" name="address"
        value="{{ isset($restaurant) ? $restaurant->address : old('address') }}" placeholder="Enter the address">
    @error('address')
        <p class="text-danger">{{ $errors->first('address') }}</p>
    @enderror
</div>

<div class="form-group">
    <label for="phone">Phone</label>
    <input type="number" class="form-control @error('phone') is-invalid @enderror" name="phone"
        value="{{ isset($restaurant) ? $restaurant->phone : old('phone') }}" placeholder="Enter the phone of user">
    @error('phone')
        <p class="text-danger">{{ $errors->first('phone') }}</p>
    @enderror
</div>
<div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
        value="{{ isset($restaurant) ? $restaurant->email : old('email') }}" placeholder="Enter the email of user">
    @error('email')
        <p class="text-danger">{{ $errors->first('email') }}</p>
    @enderror
</div>

<div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
        value="{{ old('password') }}" placeholder="Enter the password of user">
    @error('password')
        <p class="text-danger">{{ $errors->first('password') }}</p>
    @enderror
</div>

<div class="form-group">
    <img src="{{ isset($restaurant) ? $restaurant->getFirstMediaUrl() : '' }}"
        alt="{{ isset($restaurant) ? $restaurant->name : '' }}" width="70" height="70">
    <label for="photo">Photo</label>
    <input type="file" name="photo" value="">
    @error('photo')
        <p class="text-danger">{{ $errors->first('photo') }}</p>
    @enderror
</div>
