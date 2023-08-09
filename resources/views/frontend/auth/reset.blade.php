@extends('layouts.frontend')
@section('content')

    <section class="position-relative overflow-hidden">
        <div class="container-fluid">
            <div class="py-8 py-lg-5 bg-dark text-white position-relative">
                <!--background image-->
                <img src="/assets/img/shop/banners/06.jpg" class="bg-image bg-top-center opacity-75" alt="">
                <div class="row align-items-center position-relative">
                    <div class="col-lg-10 mx-auto text-center">
                        <h1 class="mb-0 display-3">Login Details
                        </h1>
                    </div>
                </div>
                <!--/.row-->
            </div>
        </div>
    </section>
    <section class="bg-white position-relative">
        <div class="bg-pattern text-light w-100 h-100 start-0 top-0 position-absolute"></div>
        <div class="container pt-9 pt-lg-11 pb-9 pb-lg-11 position-relative z-index-1">
            <div class="row align-items-center justify-content-center">
                <div class=" col-xl-4 col-lg-5 col-md-6 col-sm-8 z-index-2">
                    <h2 class="mb-1 display-6">
                        Welcome back!
                    </h2>
                    <p class="mb-4 text-muted">
                        Please Sign In with details...
                    </p>
                    <div class="position-relative">
                        <div>
                            @if (session('status'))
                                <div class="text-center">
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                </div>
                            @endif
                            <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <div class="input-icon-group mb-3">
                                            <span class="input-icon">
                                          <i class="bx bx-envelope"></i>
                                        </span>
                                    <input id="email" type="email" placeholder="{{ __('Email Address') }}"
                                           class="form-control @error('email') is-invalid @enderror"
                                           name="email" value="{{ old('email') }}" required autocomplete="email"
                                           autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="d-grid">
                                    <button class="btn btn-primary" type="submit">
                                        {{ __('Send Password Reset Link') }}
                                    </button>
                                </div>
                            </form>
                            <!---->
                            <p class="pt-4 small text-muted">
                                Don’t have an account yet? <a href="{{ route('frontend.register') }}" class="ms-2 text-dark fw-semibold link-underline">Sign Up</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- main-container start -->
    <!-- ================ -->
    <div class="main-container dark-translucent-bg" style="background-image: url(/assets/img/zgane.jpg); background-size: cover; background-repeat: no-repeat; background-position: center;background-position: 50% 30%;">
        <div class="container">
            <div class="row">
                <!-- main start -->
                <!-- ================ -->
                <div class="main object-non-visible" data-animation-effect="fadeInUpSmall" data-effect-delay="100">
                    <div class="form-block center-block p-30 light-gray-bg border-clear">
                        <h4 class="text-center" style="color: black">Reset Password</h4>
                        <p class="mb-4 text-muted text-center">
                            Your e-mail address...
                        </p>

                        <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="form-group has-feedback">
                                <label for="email" class="col-sm-3 control-label"></label>
                                <div class="col-sm-8">


                                    <i class="fa fa-user form-control-feedback"></i>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
                <!-- main end -->
            </div>
        </div>
    </div>
    <!-- main-container end -->
@endsection
