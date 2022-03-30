@extends('layouts.guest')

@section('content')
            <div class="d-flex flex-column justify-content-center align-items-center mt-2 mb-5 navbar-light">
                <a href="index.html" class="navbar-brand flex-column mb-2 align-items-center mr-0" style="min-width: 0">
                    <span class="avatar avatar-sm navbar-brand-icon mr-0">
                        <span class="avatar-title rounded bg-primary">
                            <img src="../../public/images/illustration/student/128/white.svg" alt="logo" class="img-fluid" />
                        </span>
                    </span>
                    Luma
                </a>
                <p class="m-0">Login to access your Account </p>
            </div>

            <a href="index.html" class="btn btn-light btn-block mb-24pt">
                Click here to enroll now
            </a>

            <div class="page-separator justify-content-center">
                <div class="page-separator__text bg-white">or</div>
            </div>

            <login-component></login-component>
@endsection
