@extends('admin.app')
@section('content')
    <div class="container-fluid pt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Coupons Create Form</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.coupons.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            @include('admin.coupons.form')
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
