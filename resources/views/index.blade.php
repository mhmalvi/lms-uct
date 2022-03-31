@extends('layouts.guest')

@section('content')
            <div class="d-flex flex-column justify-content-center align-items-center mt-2 mb-5 m-2 navbar-light">
                <a href="#" class="navbar-brand flex-column mb-2 align-items-center mr-0 text-center" style="min-width: 0">
                    Learning Management <br> System
                </a>
                <p class="m-0">Login to access your Account </p>
            </div>

            <a href="{{route('enrolment')}}" class="btn btn-light btn-block mb-24pt">
                Click here to enroll now
            </a>

            <div class="page-separator justify-content-center">
                <div class="page-separator__text bg-white">or</div>
            </div>

            <login-component></login-component>
@endsection
