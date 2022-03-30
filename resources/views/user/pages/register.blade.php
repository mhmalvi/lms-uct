@extends('layouts.guest')

@section('content')
    <div class="page-section border-bottom-2">
        <div class="container page__container">
            <div class="row">
                <div class="col-6 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <form action="/register" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label class="form-label">
                                        <div class="label">Name</div>
                                    </label>
                                    <input type="text" class="form-control" name="name" placeholder="Name">
                                    @if ($errors->has('name'))
                                        {{ $errors->first('name') }}
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label class="form-label">
                                        <div class="label">Email</div>
                                    </label>
                                    <input type="email" class="form-control" name="email" placeholder="Email">
                                    @if ($errors->has('email'))
                                        {{ $errors->first('email') }}
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label class="form-label">
                                        <div class="label">Password</div>
                                    </label>
                                    <input type="password" class="form-control" name="password" placeholder="Password">
                                    @if ($errors->has('password'))
                                        {{ $errors->first('password') }}
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label class="form-label">
                                        <div class="label">Confirm Password</div>
                                    </label>
                                    <input type="password" class="form-control" name="password_confirmation"
                                        placeholder="Confirm password">
                                    @if ($errors->has('password_confirmation'))
                                        {{ $errors->first('password_confirmation') }}
                                    @endif
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-primary">Register</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
