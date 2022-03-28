@extends('admin.layouts.app')

@section('title', 'Create Course')

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
                <create-courses />
            </div>
        </div>
    </div>
@endsection
