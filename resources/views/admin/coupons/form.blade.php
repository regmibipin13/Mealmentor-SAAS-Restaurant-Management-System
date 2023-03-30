@include('admin.includes.restaurant_form', [
    'data' => isset($coupon) ? $coupon : null,
])
<div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
        value="{{ isset($coupon) ? $coupon->name : old('name') }}" placeholder="Enter the name of coupon">
    @error('name')
        <p class="text-danger">{{ $errors->first('name') }}</p>
    @enderror
</div>

<div class="form-group">
    <label for="code">Code</label>
    <input type="text" class="form-control @error('code') is-invalid @enderror" name="code"
        value="{{ isset($coupon) ? $coupon->code : old('code') }}" placeholder="Enter the code of coupon">
    @error('code')
        <p class="text-danger">{{ $errors->first('code') }}</p>
    @enderror
</div>

<div class="form-group">
    <label for="discount_percentage">Discount Percentage</label>
    <input type="number" class="form-control @error('discount_percentage') is-invalid @enderror"
        name="discount_percentage"
        value="{{ isset($coupon) ? $coupon->discount_percentage : old('discount_percentage') }}"
        placeholder="Enter the discount_percentage of coupon">
    @error('discount_percentage')
        <p class="text-danger">{{ $errors->first('discount_percentage') }}</p>
    @enderror
</div>
<div class="form-group">
    <label for="min_order_amount">Min Order Amount</label>
    <input type="number" class="form-control @error('min_order_amount') is-invalid @enderror" name="min_order_amount"
        value="{{ isset($coupon) ? $coupon->min_order_amount : old('min_order_amount') }}"
        placeholder="Enter the min order amount of coupon">
    @error('min_order_amount')
        <p class="text-danger">{{ $errors->first('min_order_amount') }}</p>
    @enderror
</div>
<div class="form-group">
    <label for="valid_from">Valid From</label>
    <input type="datetime-local" class="form-control @error('valid_from') is-invalid @enderror" name="valid_from"
        value="{{ isset($coupon) ? $coupon->valid_from : old('valid_from') }}">
    @error('valid_from')
        <p class="text-danger">{{ $errors->first('valid_from') }}</p>
    @enderror
</div>

<div class="form-group">
    <label for="valid_till">Valid From</label>
    <input type="datetime-local" class="form-control @error('valid_till') is-invalid @enderror" name="valid_till"
        value="{{ isset($coupon) ? $coupon->valid_till : old('valid_till') }}">
    @error('valid_till')
        <p class="text-danger">{{ $errors->first('valid_till') }}</p>
    @enderror
</div>

<div class="form-group">
    <label for="enabled">Enabled</label>
    <input type="checkbox" {{ isset($coupon) ? ($coupon->is_enabled ? 'checked' : '') : '' }} name="enabled">
    @error('enabled')
        <p class="text-danger">{{ $errors->first('enabled') }}</p>
    @enderror
</div>
