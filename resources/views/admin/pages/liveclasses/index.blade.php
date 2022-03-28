@extends('admin.layouts.app')

@section("title", "Live Classes")

@section('link')
    <a href="{{ route('admin.liveclass.create') }}" class="btn btn-sm btn-outline-dark">
        <span class="material-icons mr-1">
            add_circle_outline
        </span>
        Add New
    </a>
@endsection


@section('content')
    <div class="container-fluid page__container p-5">
        <live-class-list-component />
    </div>
@endsection
