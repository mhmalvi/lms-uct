@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container page__container">
        <div class="page-section">

            <div class="page-separator">
                <div class="page-separator__text">Overview</div>
            </div>

            <div class="col-md-12">
                <event-calendar-component :editable="false" />
            </div>
        </div>
    </div>
@endsection
