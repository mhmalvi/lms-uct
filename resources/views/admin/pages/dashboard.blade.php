@extends('admin.layouts.app')

@section('title', "Dashboard")

@section('content')
    <div class="container-fluid page__container p-5">
        <div class="col-md-12">
            <event-calendar-component :editable="true" />
        </div>
    </div>
@endsection
