@extends('admin.app')
@section('content_header')
@endsection
@section('content')
    <section id="pos" class="pt-3 pb-3">
        <pos-admin :categories="{{ $categories->toJson() }}" :tables="{{ $tables->toJson() }}"></pos-admin>
    </section>
@endsection
