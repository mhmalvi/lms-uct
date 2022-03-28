@extends('admin.layouts.app')

@section('title', 'Edit Course')

@section('link')
    <a href="{{ route('admin.courses.index') }}" class="btn btn-sm btn-outline-dark">
        <span class="material-icons mr-1">
            arrow_back
        </span>
        Return
    </a>
@endsection

@section('content')
    <div class="container page__container p-5">
        <div class="row">
            <div class="col-md-12">
                <update-course data="{{ json_encode($course) }}" />
            </div>
        </div>
    </div>
@endsection
