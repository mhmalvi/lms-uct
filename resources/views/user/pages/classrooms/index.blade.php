@extends('layouts.app')

@section('title', 'My Classrooms')

@section('content')
    <student-classroom-list />
@endsection

@push('js')
    <!-- Moment.js -->
    <script src="{{asset('assets/vendor/moment.min.js')}}"></script>
    <script src="{{asset('assets/vendor/moment-range.js')}}"></script>

    <!-- Flatpickr -->
    <script src="{{asset('assets/vendor/flatpickr/flatpickr.min.js')}}"></script>
    <script src="{{asset('assets/js/flatpickr.js')}}"></script>



    <!-- List.js -->
    <script src="{{asset('assets/vendor/list.min.js')}}"></script>
    <script src="{{asset('assets/js/list.js')}}"></script>

    <!-- Tables -->
    <script src="{{asset('assets/js/toggle-check-all.js')}}"></script>
    <script src="{{asset('assets/js/check-selected-row.js')}}"></script>
@endpush

