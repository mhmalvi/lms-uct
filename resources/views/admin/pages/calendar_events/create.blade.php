@extends('admin.layouts.app')

@section('title', "Create new Calendar Event")

@section('content')
    <div class="container-fluid page__container p-5">
        <div class="col-md-6 mx-auto">
            <create-calendar-event-component />
        </div>
    </div>
@endsection
