@extends('aahar.layout.layout')
@section('body')
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="register-bg">
                    <div class="login-overlay"></div>
                    <div class="login-left">
                        {{-- <img src="images/logo-login.svg" alt="Logo">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam tellus elit.</p>
                        <a href="javascript:void(0);" class="btn btn-primary">Learn More</a> --}}
                        <h1 style="color:white">Aahar Catering <br> Service</h1>
                    </div>
                    <!--login-left-->
                </div>
                <!--login-bg-->

                <div class="login-form">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="login-form-body">
                            <div class="form-gp">
                                <label for="exampleInputName1">Full Name</label>
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <i class="ti-user"></i>
                            </div>
                            <div class="form-gp">
                                <label for="exampleInputEmail1">Email address</label>
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <i class="ti-email"></i>
                            </div>
                            <div class="form-gp">
                                <label for="exampleInputPassword1">Password</label>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password" required
                                    autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <i class="ti-lock"></i>
                            </div>
                            <div class="form-gp">
                                <label for="exampleInputPassword2">Confirm Password</label>
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                                <i class="ti-lock"></i>
                            </div>
                            <div class="submit-btn-area">
                                <button id="form_submit" class="btn btn-primary" type="submit">Submit <i
                                        class="ti-arrow-right"></i></button>
                                <div class="login-other row mt-4">
                                    {{-- <div class="col-6">
                                        <a class="fb-login" href="#"><span class="login_txt">Sign up with</span> <i
                                                class="fa fa-facebook"></i></a>
                                    </div>
                                    <div class="col-6">
                                        <a class="google-login" href="#"><span class="login_txt">Sign up with</span>
                                            <i class="fa fa-google"></i></a>
                                    </div> --}}
                                </div>

                            </div>
                            <div class="form-footer text-center mt-5">
                                <p class="text-muted">Already have an account? <a href="{{ route('login') }}">Sign in</a>
                                </p>
                            </div>
                        </div>
                    </form>
                </div>
                <!--login-form-->

            </div>
            <!--row-->
        </div>
        <!--container-fluid-->
    </div>
    <!--wrapper-->
@endsection
