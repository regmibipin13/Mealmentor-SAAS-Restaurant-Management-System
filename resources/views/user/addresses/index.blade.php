@extends('frontend.app')
@section('content')
    <div class="container body-segment">
        <div class="row">
            <div class="col-md-12 pt-3 pb-3">
                <h3>My Addresses</h3>
                <a href="{{ route('frontend.addresses.create') }}" class="btn btn-success">Add New Address</a>
            </div>
        </div>
        <div class="row">
            @if (count($addresses) > 0)
                @foreach ($addresses as $ad)
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title d-flex align-items-center justify-content-between">
                                    <div>
                                        {{ $ad->name }}
                                    </div>
                                    <div>
                                        <a href="{{ route('frontend.addresses.edit', $ad->id) }}"
                                            class="btn btn-sm btn-primary">Edit</a>
                                        &nbsp;
                                        <a href="#" class="btn btn-danger btn-sm"
                                            onclick="document.getElementById('address-delete-{{ $ad->id }}').submit();">Delete</a>
                                        <form action="{{ route('frontend.addresses.destroy', $ad->id) }}" method="POST"
                                            id="address-delete-{{ $ad->id }}">
                                            @csrf
                                            @method('DELETE')
                                        </form>

                                    </div>
                                </h3>
                            </div>
                            <div class="card-body">
                                {{ $ad->street }}, {{ $ad->city }} <br />
                                <span>Nearby Landmark: {{ $ad->nearby_landmark }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-md-12">
                    <span class="text-secondary">No Addresses Available</span>
                </div>
            @endif
        </div>
        <div class="row">
            <div class="col-md-12">
                {{ $addresses->appends(Request::all())->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>

@endsection
