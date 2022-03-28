@extends('admin.layouts.app')

@section('title', 'Courses')

@section('link')
    <a href="{{ route('admin.courses.create') }}" class="btn btn-sm btn-outline-dark">
        <span class="material-icons mr-1">
            add_circle_outline
        </span>
        Add New
    </a>
@endsection

@section('content')
    <div class="container page__container">
        <div class="row">
            <div class="col-md-12">
                <course-list />
            </div>
        </div>
    </div>
@endsection
