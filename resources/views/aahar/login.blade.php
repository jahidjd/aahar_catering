@extends('aahar.layout.layout')
@section('body')
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="login-bg">
                    <div class="login-overlay"></div>
                    <div class="login-left">
                        {{-- <img src="{{ url('assets/images/logo-login.svg') }}" alt="Logo"> --}}
                        {{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam tellus elit.</p>
                        <a href="javascript:void(0);" class="btn btn-primary">Learn More</a> --}}
                        <h1 style="color:white">Aahar Catering <br> Service</h1>
                    </div>
                    <!--login-left-->
                </div>
                <!--login-bg-->

                <div class="login-form">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="login-form-body">
                            <div class="form-gp">
                                <label for="email">Email</label>
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus>

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
                                    autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <i class="ti-lock"></i>
                            </div>
                            <div class="row mb-4 rmber-area">
                                <div class="col-6">
                                    {{-- <div class="custom-control custom-checkbox primary-checkbox mr-sm-2">
                                        <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                                        <label class="custom-control-label" for="customControlAutosizing">Remember
                                            Me</label>
                                    </div> --}}
                                </div>
                                {{-- <div class="col-6 text-right">
                                    <a href="#" class="text-primary">Forgot Password?</a>
                                </div> --}}
                            </div>
                            <div class="submit-btn-area">
                                <button id="form_submit" type="submit" class="btn btn-primary">Submit <i
                                        class="ti-arrow-right"></i></button>
                                {{-- <div class="login-other row mt-4">
                                    <div class="col-6">
                                        <a class="fb-login" href="#"><span class="login_txt">Log in with</span> <i
                                                class="fa fa-facebook"></i></a>
                                    </div>
                                    <div class="col-6">
                                        <a class="google-login" href="#"><span class="login_txt">Log in with</span> <i
                                                class="fa fa-google"></i></a>
                                    </div>
                                </div> --}}
                            </div>
                            <div class="form-footer text-center mt-5">
                                <p class="text-muted">Don't have an account? <a href="{{ route('signUp') }}"
                                        class="text-primary">Sign up</a></p>
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
