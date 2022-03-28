@extends('admin.layouts.app')

@section('title', "Edit Course Category")

@section('link')
    <a href="{{ route('admin.categories.index') }}" class="btn btn-sm btn-outline-dark">
        <span class="material-icons mr-1">
            arrow_back
        </span>
        Return
    </a>
@endsection

@section('content')
<div class="container-fluid page__container p-5">
    <div class="row">
        <div class="col-md-12">
            <edit-category data="{{ $category }}" />
        </div>
    </div>
</div>
@endsection
