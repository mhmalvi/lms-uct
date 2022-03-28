@extends('admin.layouts.app')

@section('title', 'Classrooms')

@section('link')
    <a href="{{ route('admin.classroom.create') }}" class="btn btn-sm btn-outline-dark">
        <span class="material-icons mr-1">
            add_circle_outline
        </span>
        Add New
    </a>
@endsection

@section('content')
    <div class="container-fluid page__container p-5">
        <classroom-items-grid-list />
    </div>
@endsection
