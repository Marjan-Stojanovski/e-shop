@extends('layouts.frontend')
@section('content')


        <div class="breadcrumb-container">
            <div class="container">
                <ol class="breadcrumb">
                    <li><i class="fa fa-home pr-10"></i><a href="{{ route('frontend.index') }}">Home</a></li>
                    <li>&nbsp;/&nbsp;</li>
                    <li class="active">Login</li>
                </ol>
            </div>
        </div>
        <!-- breadcrumb end -->

        <section class="bg-white position-relative">
            <div class="bg-pattern text-light w-100 h-100 start-0 top-0 position-absolute"></div>
            <div class="container pt-11 pt-lg-14 pb-9 pb-lg-11 position-relative z-index-1">
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
                                <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="input-icon-group mb-3">
                                            <span class="input-icon">
                                          <i class="bx bx-envelope"></i>
                                        </span>
                                        <input type="text" placeholder="Email" id="email" class="form-control" name="email" required
                                               autofocus>
                                        @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                    <div class="input-icon-group mb-3">
                                        <span class="input-icon">
                                            <i class="bx bx-lock-open"></i>
                                        </span>
                                        <input input type="password" placeholder="Password" id="password" class="form-control" name="password" required>
                                        @if ($errors->has('password'))
                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                    <div class="mb-3 d-flex justify-content-between">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Remember me
                                            </label>
                                        </div>
                                        <div>
                                            <label class="text-end d-block small mb-0"><a href="page-account-forget-password.html" class="text-muted link-decoration">Forget Password?</a></label>
                                        </div>
                                    </div>

                                    <div class="d-grid">
                                        <button class="btn btn-primary" type="submit">
                                            Sign in
                                        </button>
                                    </div>
                                </form>

                                <!---->
                                <p class="pt-4 small text-muted">
                                    Don’t have an account yet? <a href="page-account-signup.html" class="ms-2 text-dark fw-semibold link-underline">Sign Up</a>
                                </p>
                                <!--Divider-->
                                <div class="d-flex align-items-center py-3">
                                    <span class="flex-grow-1 border-bottom pt-1"></span>
                                    <span class="d-inline-flex flex-center lh-1 width-2x height-2x rounded-circle bg-white text-mono">or</span>
                                    <span class="flex-grow-1 border-bottom pt-1"></span>
                                </div>
                                <div class="d-grid">
                                    <a href="#!" class="d-flex hover-lift btn-outline-secondary mb-2 btn position-relative flex-center">
                                        <!--Main Icon-->
                                        <div class="position-relative d-flex align-items-center">
                                            <img src="assets/img/brands/google.svg" alt="" class="width-2x me-2">
                                            <span>sign in with google</span>
                                        </div>
                                    </a>
                                    <a href="#!" class="d-flex hover-lift btn-outline-secondary btn position-relative flex-center">
                                        <!--Main Icon-->
                                        <div class="position-relative d-flex align-items-center">
                                            <img src="assets/img/brands/Facebook.svg" alt="" class="width-2x me-2">
                                            <span>sign in with facebook</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- main-container start -->
        <!-- ================ -->
        <div class="main-container dark-translucent-bg" style="background-image:url('/assets/img/zgane.jpg');">
            <div class="container">
                <div class="row">
                    <!-- main start -->
                    <!-- ================ -->
                    <div class="main object-non-visible" data-animation-effect="fadeInUpSmall" data-effect-delay="100">
                        <div class="form-block center-block p-30 light-gray-bg border-clear">
                            <h2 class="title">Login</h2>
                                <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                    @csrf
                                <div class="form-group has-feedback">
                                    <label for="inputUserName" class="col-sm-3 control-label">User Name</label>
                                    <div class="col-sm-8">
                                        <input type="text" placeholder="Email" id="email" class="form-control" name="email" required
                                               autofocus>
                                        @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                        <i class="fa fa-user form-control-feedback"></i>
                                    </div>
                                </div>
                                <div class="form-group has-feedback">
                                    <label for="inputPassword" class="col-sm-3 control-label">Password</label>
                                    <div class="col-sm-8">
                                        <input type="password" placeholder="Password" id="password" class="form-control" name="password" required>
                                        @if ($errors->has('password'))
                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-8">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox"> Remember me.
                                            </label>
                                        </div>
                                        <button type="submit" class="btn btn-group btn-default btn-animated">Log In <i class="fa fa-user"></i></button>
                                        <span> or </span>
                                        <a class="btn btn-group btn-default btn-animated" href="{{ route('frontend.register') }}" style="color: white">Register <i class="fa fa-user"></i></a>
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
