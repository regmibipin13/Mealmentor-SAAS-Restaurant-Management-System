@extends('admin.app')
@section('content')
    <div class="container-fluid pt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Permissions Form</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.permissions.update', $permission->id) }}" method="POST">
                            @csrf
                            @method('PATCH')

                            @include('admin.permissions.form')

                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
