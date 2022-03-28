@extends('admin.layouts.app')

@section('title', "Course Categories")

@section('content')
<div class="container-fluid page__container p-5">
    <div class="row">
        <div class="col-md-4">
            <create-categories />
        </div>
        <div class="col-md-7 offset-md-1">
            <list-categories />
        </div>
    </div>
</div>
@endsection
