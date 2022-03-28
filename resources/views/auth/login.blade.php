@if ($errors->any())
    <div class="bg-red-50 border-l-4 border-red-500 text-danger mb-4" role="alert">
        <p class="font-bold">{{ __('Whoops! Something went wrong.') }}</p>
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

<form action="{{route('login')}}" method="POST">
    @csrf
    <div class="form-group">
        <label class="text-label" for="email_2">Email Address:</label>
        <div class="input-group input-group-merge">
            <input id="email_2" type="email" name="email" required="" class="form-control form-control-prepended" placeholder="john@doe.com">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <span class="far fa-envelope"></span>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label class="text-label" for="password_2">Password:</label>
        <div class="input-group input-group-merge">
            <input id="password_2" type="password" name="password" required="" class="form-control form-control-prepended" placeholder="Enter your password">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <span class="fa fa-key"></span>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <button class="btn btn-block btn-primary" type="submit">Login</button>
    </div>
    <div class="form-group text-center">
        <a href="">Forgot password?</a> <br>
    </div>
</form>