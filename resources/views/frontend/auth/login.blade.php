@extends('layouts.frontendLite')
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
            <div class="container pt-8 pt-lg-5 pb-8 pb-lg-9 position-relative">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="{{ route('frontend.index') }}" class="text-dark">
                                <i class="bx bx-home fs-5"></i>
                            </a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('login') }}" class="text-dark">Log in</a></li>
                    </ol>
                </nav>
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
                                            <label class="text-end d-block small mb-0"><a href="{{ route('frontend.reset') }}" class="text-muted link-decoration">Forget Password?</a></label>
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
                                    Don’t have an account yet? <a href="{{ route('frontend.register') }}" class="ms-2 text-dark fw-semibold link-underline">Sign Up</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

@endsection
