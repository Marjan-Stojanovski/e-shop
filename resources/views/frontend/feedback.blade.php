@extends('layouts.frontend')
@section('content')

    <section class="position-relative">
        <div class="container pt-7 pt-lg-6 pb-7 pb-lg-6 position-relative">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{ route('frontend.index') }}" class="text-dark">
                            <i class="bx bx-home fs-5"></i>
                        </a></li>
                    <li class="breadcrumb-item active"><a href="" class="text-dark">Contact Us</a></li>
                </ol>
            </nav>
            <div class="container py-9 py-lg-11">
                <div class="row">
                    <div class="col-md-8 col-lg-7 mb-7 mb-md-0 me-auto">
                        <div class="position-relative">
                            <h1>
                                Kontaktirajte nas
                            </h1>
                            <p class="mb-3 w-lg-75">
                                Use the contact form if you have questions about our products. Our sales team will
                                be happy to help you:
                            </p>
                            <div class="width-7x pt-1 bg-primary mb-5"></div>
                            <!-- Contacts Form -->
                            <form action="{{route('messages.store')}}" method="post" class="margin-clear">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-12 mb-3 has-feedback">
                                        <div class="text-center">
                                            @if(Session::has('flash_message'))
                                                <p class="alert alert-success">Пораката е испратена</p>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- Input -->
                                    <div class="col-sm-6 mb-3 has-feedback">
                                        <label class="form-label" for="fullName">Your name</label>
                                        <input type="text" class="form-control @error('fullName') is-invalid @enderror"
                                               id="fullName" name="fullName" placeholder="Your Name">
                                        @error('fullName')
                                        <span style="color: red" class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                        @enderror
                                    </div>
                                    <!-- End Input -->
                                    <!-- Input -->
                                    <div class="col-sm-6 mb-3 has-feedback">
                                        <label class="form-label" for="email">Your email address</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                               id="email" name="email" placeholder="email@yahoo.com">
                                        @error('email')
                                        <span style="color: red" class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                        @enderror
                                    </div>
                                    <div class="w-100"></div>
                                    <!-- Input -->
                                    <!-- Services -->
                                    <div class="col-sm-6 mb-3 has-feedback">
                                        <label class="form-label" for="phone">Phone No.</label>
                                        <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                               id="phone" name="phone" placeholder="+123 45 678">
                                        @error('phone')
                                        <span style="color: red" class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                        @enderror
                                    </div>

                                    <div class="col-sm-6 mb-3 has-feedback">
                                        <label class="form-label" for="subject">Subject</label>
                                        <input type="text" class="form-control @error('subject') is-invalid @enderror"
                                               id="subject" name="subject" placeholder="Your Text">
                                        @error('subject')
                                        <span style="color: red" class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                        @enderror
                                    </div>
                                    <!-- End Input -->
                                </div>

                                <!-- Message -->
                                <div class="mb-3 has-feedback">
                                    <label for="message" class="form-label">Message</label>
                                    <textarea class="form-control @error('message') is-invalid @enderror" rows="6"
                                              id="message" name="message"
                                              placeholder="Your Message"></textarea>
                                    @error('message')
                                    <span style="color: red" class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                    @enderror
                                </div>

                                <div class="d-md-flex justify-content-between align-items-center">
                                    <p class="small mb-4 text-muted mb-md-0">We'll get back to you in 1-2 business
                                        days.</p>
                                    <input type="submit" name="submit" value="Submit message" id="sendBtn"
                                           class="btn btn-lg btn-primary">
                                </div>
                            </form>
                            <!-- End Contacts Form -->
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="pb-0" data-aos="fade-up" data-aos-delay="150">
                            <h5>Kosar Beverages</h5>
                            <br>
                            <div class="position-relative">
                                <img src="/assets/img/logo.jpg" style="width: 420px"/>
                            </div>
                        </div>
                        <br>
                        <br>
                        <div data-aos="fade-up">
                            <h4 class="mb-0">Offices</h4>
                            <div class="border-top border-2 border-secondary mb-4 mt-2" data-aos="fade-up"></div>
                        </div>
                        <div data-aos="fade-up">
                            <h5></h5>
                            <div class="position-relative">
                                <p>{{ $company->address }}<br></p>
                                <p>Phone:&nbsp;{{ $company->phone }}<br>Email: <a rel="noopener"
                                                                                  href="">{{ $company->mail }}</a>
                                </p>
                            </div>
                        </div>
                        <div class="border-top border-2 border-secondary my-4 my-lg-5" data-aos="fade-up"></div>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
