@extends('layouts.frontend')
@section('content')

    <section class="position-relative overflow-hidden">
        <div class="container-fluid">
            <div class="py-8 py-lg-5 bg-dark text-white position-relative">
                <!--background image-->
                <img src="/assets/img/shop/banners/06.jpg" class="bg-image bg-top-center opacity-75" alt="">
                <div class="row align-items-center position-relative">
                    <div class="col-lg-10 mx-auto text-center">
                        <h1 class="mb-0 display-3">Register User
                        </h1>
                    </div>
                </div>
                <!--/.row-->
            </div>
        </div>
    </section>
    <section class="bg-white position-relative">
        <div class="bg-pattern text-light w-100 h-100 start-0 top-0 position-absolute"></div>
        <div class="bg-gradientwhite flip-y w-50 h-100 start-50 top-0 translate-middle-x position-absolute"></div>
        <div class="container pt-8 pt-lg-5 pb-8 pb-lg-9 position-relative">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{ route('frontend.index') }}" class="text-dark">
                            <i class="bx bx-home fs-5"></i>
                        </a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('frontend.register') }}" class="text-dark">Sign up</a></li>
                </ol>
            </nav>
            <div class="row align-items-center justify-content-center">
                <div class=" col-xl-4 col-lg-5 col-md-6 col-sm-8 z-index-2">

                    <h2 class="mb-1 display-6">
                        Hello!
                    </h2>
                    <p class="mb-4 text-muted">
                        To get started, Please signup with details...
                    </p>
                    <div class="position-relative">
                        <div>
                            <form class="form-horizontal" action="{{ route('register')}}" method="POST">
                                @csrf
                                <!--input-with-icon-->
                                <div class="input-icon-group mb-3">
                                            <span class="input-icon">
                                              <i class="bx bx-user"></i>
                                            </span>
                                    <input type="text"  id="firstName" class="form-control"
                                           name="firstName"
                                           required autofocus
                                           placeholder="Your first name">
                                    @if ($errors->has('firstName'))
                                        <span class="text-danger">{{ $errors->first('firstName') }}</span>
                                    @endif
                                </div>

                                <!--input-with-icon-->
                                <div class="input-icon-group mb-3">
                                            <span class="input-icon">
                                              <i class="bx bx-user"></i>
                                            </span>
                                    <input type="text"  id="lastName" class="form-control"
                                           name="lastName"
                                           required autofocus
                                           placeholder="Your last name">
                                    @if ($errors->has('lastName'))
                                        <span class="text-danger">{{ $errors->first('lastName') }}</span>
                                    @endif
                                </div>

                                <div class="form-group has-feedback" hidden>
                                    <label hidden for="role_id" class="col-sm-3 control-label">Role <span
                                            class="text-danger small">*</span></label>
                                    <div class="col-sm-8" hidden>
                                        <input type="text" placeholder="role_id" hidden id="role_id" class="form-control"
                                               name="role_id"
                                               value="2">
                                        @if ($errors->has('role_id'))
                                            <span class="text-danger">{{ $errors->first('role_id') }}</span>
                                        @endif
                                        <i class="fa fa-pencil form-control-feedback" hidden></i>
                                    </div>
                                </div>

                                <!--input-with-icon-->
                                <div class="input-icon-group mb-3">
                                            <span class="input-icon">
                                                <i class="bx bx-envelope"></i>
                                            </span>
                                    </span>
                                    <input type="email" class="form-control" id="email_address"
                                           name="email" required autofocus
                                           placeholder="Your email address">
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>

                                <!--input-with-icon-->
                                <div class="input-icon-group mb-3">
                                            <span class="input-icon">
                                                <i class="bx bx-lock-open"></i>
                                            </span>
                                    </span>
                                    <input type="password" class="form-control" id="password"
                                           name="password" required
                                           placeholder="Enter password">
                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>


                                <!--input-with-icon-->
                                <div class="input-icon-group mb-3">
                                            <span class="input-icon">
                                                <i class="bx bx-lock-open"></i>
                                            </span>
                                    </span>
                                    <input id="password-confirm" type="password" class="form-control" placeholder="Confirm Password"
                                           name="password_confirmation" required autocomplete="new-password">
                                    @if ($errors->has('password_confirmation'))
                                        <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                    @endif
                                </div>

                                <div class="d-grid">
                                    <button class="btn btn-dark" type="submit">
                                        Sign Up
                                    </button>
                                </div>
                            </form>

                            <!---->
                            <p class="pt-3 small text-muted">
                                Already have an account? <a href="{{ route('login') }}"
                                                            class="ms-2 text-dark fw-semibold link-decoration">Sign in</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- main-container start -->
@endsection
