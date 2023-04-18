@extends('admin.app')
@section('content')
    <div class="container-fluid pt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('Suscriptions') }}</h3>
                    </div>

                    <div class="card-header">
                        @include('admin.includes.filterable', [
                            'name' => 'package_name',
                            'placeholder' => 'Enter Package Name',
                            'route' => route('admin.suscriptions.index'),
                        ])
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#ID</th>
                                    <th>Restaurant</th>
                                    <th>Package</th>
                                    <th>Valid Till</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($suscriptions) > 0)
                                    @foreach ($suscriptions as $suscription)
                                        <tr>
                                            <td>{{ $suscription->id }}</td>
                                            <td>{{ $suscription->restaurant->name }}</td>
                                            <td>
                                                {{ $suscription->package_name }}
                                            </td>
                                            <td>
                                                {{ $suscription->valid_till }}
                                            </td>
                                            <td>
                                                {{ $suscription->verified ? 'Verified' : 'Not Active' }}
                                            </td>
                                            <td>
                                                <div>
                                                    <a href="#" class="btn btn-danger btn-sm delete-button"
                                                        onclick="document.getElementById('delete-form-{{ $suscription->id }}').submit();">Delete</a>
                                                    <form
                                                        action="{{ route('admin.suscriptions.destroy', $suscription->id) }}"
                                                        method="POST" id="delete-form-{{ $suscription->id }}">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </div>
                                                <div>
                                                    <a href="#" class="btn btn-success btn-sm"
                                                        onclick="document.getElementById('renew-form-{{ $suscription->id }}').submit();">Renew</a>
                                                    <form
                                                        action="{{ route('admin.suscriptions.renew', $suscription->id) }}"
                                                        method="POST" id="renew-form-{{ $suscription->id }}">
                                                        @csrf
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="4" class="text-center">No Data available</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>

                    <div class="card-footer">
                        {{ $suscriptions->appends(Request::all())->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
