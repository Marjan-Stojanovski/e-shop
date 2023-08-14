@extends('layouts.frontend')
@section('content')

    <section class="position-relative overflow-hidden">
        <div class="container-fluid">
            <div class="py-8 py-lg-5 bg-dark text-white position-relative">
                <!--background image-->
                <img src="/assets/img/shop/banners/06.jpg" class="bg-image bg-top-center opacity-75" alt="">
                <div class="row align-items-center position-relative">
                    <div class="col-lg-10 mx-auto text-center">
                        <h1 class="mb-0 display-5">{{ Auth::user()->firstName }} {{ Auth::user()->lastName }} <span
                                class="text-muted">Profile</span>
                        </h1>
                    </div>
                </div>
                <!--/.row-->
            </div>
        </div>
    </section>
    <section class="position-relative bg-white">
        <div class="container pt-6 pt-lg-6 pb-6 pb-lg-6 position-relative">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{ route('frontend.index') }}" class="text-dark">
                            <i class="bx bx-home fs-5"></i>
                        </a></li>
                    <li class="breadcrumb-item active"><a href=""
                                                          class="text-dark">View Message</a></li>
                </ol>
            </nav>
        </div>
    </section>
    <section class="position-relative">
        <div class="container position-relative">
            <div class="">
                <!--Profile info header-->
                <div class="position-relative pt-7 pb-9 pb-lg-11">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="d-flex flex-column">
                                <nav class="nav mb-5 nav-pills">
                                    <a href="{{ route('frontend.profile', Auth::user()->id) }}" class="nav-link "> <i
                                            class="bx bx-user-circle me-2"></i>My profile</a>
                                    <a href="{{ route('frontend.showProfileOrders', Auth::user()->id) }}" class="nav-link"><i
                                            class="bx bx-layer me-2"></i>Orders</a>
                                    <a href="{{ route('frontend.userMessages', Auth::user()->id) }}" class="nav-link active"><i
                                            class="bx bx-message-rounded-detail me-2"></i>Messages</a>
                                </nav>

                                <div class="h-100">
                                    <div class="row align-items-center">
                                        <div class="d-flex mb-4 align-items-center">
                                            <h5 class="mb-0 me-3">Message</h5>
                                            <div class="pt-1 border-bottom flex-grow-1"></div>
                                        </div>
                                        <div class="row">
                                            <!-- Input -->
                                            <div class="col-sm-6 mb-3 has-feedback">
                                                <label class="form-label" for="fullName">Your name</label>
                                                <p type="text" class="form-control"
                                                   id="fullName" name="fullName">{{ $message->fullName }}</p>
                                            </div>
                                            <!-- End Input -->
                                            <!-- Input -->
                                            <div class="col-sm-6 mb-3 has-feedback">
                                                <label class="form-label" for="email">Your email address</label>
                                                <p type="email" class="form-control"
                                                   id="email" name="email">{{ $message->email }}</p>
                                            </div>
                                            <div class="w-100"></div>
                                            <!-- Input -->
                                            <!-- Services -->
                                            <div class="col-sm-6 mb-3 has-feedback">
                                                <label class="form-label" for="phone">Phone No.</label>
                                                <p type="text" class="form-control"
                                                   id="phone" name="phone" >{{ $message->phone }}</p>
                                            </div>

                                            <div class="col-sm-6 mb-3 has-feedback">
                                                <label class="form-label" for="subject">Subject</label>
                                                <p type="text" class="form-control"
                                                   id="subject" name="subject">{{ $message->subject }}</p>
                                            </div>
                                            <!-- End Input -->
                                        </div>

                                        <!-- Message -->
                                        <div class="mb-3 has-feedback">
                                            <label for="message" class="form-label">Message</label>
                                            <p class="form-control" rows="6"
                                                      id="message" name="message"
                                                      placeholder="Your Message">{{ $message->message }}</p>
                                        </div>

                                        <div class="d-md-flex justify-content-between align-items-center">

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
