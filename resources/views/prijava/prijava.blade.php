@extends('prijava.home')

@section('content')
<div class="main" id="prijava">
    <!-- Sing in  Form -->
    <section class="sign-in">
        <div class="container">
            <div class="row home-prijava">
                <a href="{{ route('home') }}">Back to home page</a>
            </div>
            <div class="signin-content">

                <div class="signin-image">
                    <figure class="signin-figure"><img class="prijava-logo" src="img/logo1.png" alt="sing up image"></figure>
                    <a href="{{ route('registracija') }}" class="signup-image-link">Create an account</a>
                </div>

                <div class="signin-form">
                    <h2 class="form-title">Sign up</h2>
                    <form method="POST" class="register-form" id="login-form" action="{{ route('admin') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="your_name" id="your_name" placeholder="Your Name" />
                        </div>
                        <div class="form-group">
                            <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                            <input type="password" name="your_pass" id="your_pass" placeholder="Password" />
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                            <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="signin" id="signin" class="form-submit" value="Log in" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection