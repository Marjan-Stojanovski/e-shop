@extends('layouts.frontend')
@section('content')

    <section class="position-relative overflow-hidden">
        <div class="container-fluid">
            <div class="py-8 py-lg-5 bg-dark text-white position-relative">
                <!--background image-->
                <img src="/assets/img/shop/banners/06.jpg" class="bg-image bg-top-center opacity-75" alt="">
                <div class="row align-items-center position-relative">
                    <div class="col-lg-10 mx-auto text-center">
                        <h1 class="mb-0 display-3">Reset Password
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
                    <li class="breadcrumb-item active"><a href="{{ route('frontend.reset') }}" class="text-dark">Reset Password</a></li>
                </ol>
            </nav>
            <div class="row align-items-center justify-content-center">
                <div class=" col-xl-4 col-lg-5 col-md-6 col-sm-8 z-index-2">
                    <h2 class="mb-1 display-6">
                        Enter Details
                    </h2>
                    <p class="mb-4 text-muted">
                        Please enter new details...
                    </p>
                    <div class="position-relative">
                        <div>
                            <form class="form-horizontal" method="POST" action="{{ route('password.update') }}">
                                @csrf
                                <input type="hidden" name="token" value="{{ $token }}">
                                <div class="input-icon-group mb-3">
                                            <span class="input-icon">
                                          <i class="bx bx-envelope"></i>
                                        </span>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                           name="email" value="{{ $email ?? old('email') }}" required autocomplete="email"
                                           autofocus placeholder="Enter your email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="input-icon-group mb-3">
                                        <span class="input-icon">
                                            <i class="bx bx-lock-open"></i>
                                        </span>
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           required autocomplete="new-password" placeholder="Your new password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="input-icon-group mb-3">
                                        <span class="input-icon">
                                            <i class="bx bx-lock-open"></i>
                                        </span>
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" required autocomplete="new-password"
                                    placeholder="Confirm your new password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="d-grid">
                                    <button class="btn btn-primary" type="submit">
                                        {{ __('Reset Password') }}
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
