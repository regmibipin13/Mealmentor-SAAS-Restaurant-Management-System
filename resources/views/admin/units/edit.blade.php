@extends('admin.app')
@section('content')
    <div class="container-fluid pt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Units Edit Form</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.units.update', $unit->id) }}" method="POST">
                            @csrf
                            @method('PATCH')

                            @include('admin.units.form')

                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
