@extends('layouts.frontend')
@section('content')





    <section class="position-relative bg-primary bg-opacity-10">
        <!--divider-->
        <svg class="position-absolute start-0 bottom-0 text-white flip-y" width="100%" height="64" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 152" fill="none" preserveAspectRatio="none">
            <path d="M126.597 138.74C99.8867 127.36 76.6479 109.164 59.2161 85.9798L0 3.05176e-05L1440 0C1440 0 1419.98 25.8404 1380.15 32.9584L211.382 150.811C182.549 154.283 153.308 150.12 126.597 138.74Z" fill="currentColor"/>
        </svg>
        <div class="container position-relative pt-12 pb-9">
            <div class="row align-items-center pb-8 pt-lg-9">
                <div class="col-md-10 col-lg-8">
                    <h1 class="display-2 mb-3">
                        Get in touch with us
                    </h1>
                    <p class="mb-0 lead pe-lg-8">Do you have questions about our products or need a quote? Use
                        the
                        contact form below and we will get back to you.</p>
                </div>
            </div>
            <!--/.row-->
        </div>
        <!--/.content-->
    </section>

    <section class="position-relative">
        <div class="container py-9 py-lg-11">
            <div class="row">
                <div class="col-md-8 col-lg-7 mb-7 mb-md-0 me-auto">
                    <div class="position-relative">
                        <h1>
                            Contact form
                        </h1>
                        <p class="mb-3 w-lg-75">
                            Use the contact form if you have questions about our products. Our sales team will
                            be happy to help you:
                        </p>
                        <div class="width-7x pt-1 bg-primary mb-5"></div>
                        <!-- Contacts Form -->
                        <form action="#" method="post" role="form" class="needs-validation mb-5 mb-lg-7"
                              novalidate>
                            <div class="row">
                                <!-- Input -->
                                <div class="col-sm-6 mb-3">
                                    <label class="form-label" for="name">Your name</label>
                                    <input type="text" name="name" class="form-control" id="name"
                                           placeholder="John Doe" required>
                                </div>
                                <!-- End Input -->

                                <!-- Input -->
                                <div class="col-sm-6 mb-3">
                                    <label class="form-label" for="email">Your email address</label>
                                    <input type="email" class="form-control" name="email" id="email"
                                           placeholder="john@gmail.com" id="email"
                                           aria-label="jackwayley@gmail.com" required>
                                    <div class="invalid-feedback">
                                        Please enter a valid email address
                                    </div>
                                </div>

                                <div class="w-100"></div>

                                <!-- Input -->

                                <!-- Services -->
                                <div class="col-sm-12 mb-3">
                                    <label class="form-label" for="subject">Subject</label>
                                    <input type="text" class="form-control" name="subject" id="subject"
                                           placeholder="Web Design" required>
                                </div>
                                <!-- End Input -->
                            </div>

                            <!-- Message -->
                            <div class="mb-3">
                                <label for="message" class="form-label">Message</label>
                                <textarea class="form-control" name="message" placeholder="Hi there...."
                                          required></textarea>
                                <div class="invalid-feedback">
                                    Please enter a message in the textarea.
                                </div>
                            </div>

                            <div class="d-md-flex justify-content-between align-items-center">
                                <p class="small mb-4 text-muted mb-md-0">We'll get back to you in 1-2 business days.</p>
                                <input type="submit" name="submit" value="Submit message" id="sendBtn"
                                       class="btn btn-lg btn-primary">
                            </div>
                        </form>
                        <!-- End Contacts Form -->

                        <!--Card-->
                        <div class="px-4 py-7 px-lg-5 py-lg-7 border border-2 rounded-3 position-relative"
                             data-aos="fade-up">
                            <div class="position-relative">

                                <h3 class="mb-4">Need customer support?</h3>
                                <p class="w-lg-90 mb-5 lead">
                                    If you are already a customer with us, we will be happy to help you in our
                                    Customer Support.
                                </p>
                                <div class="width-6x pt-1 bg-success mb-5"></div>
                                <a href="#" class="btn btn-outline-primary btn-rise">
                                    <div class="btn-rise-bg bg-primary"></div>
                                    <div class="btn-rise-text">
                                        Customer support
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div data-aos="fade-up">
                        <h4 class="mb-0">Global Offices</h4>
                        <div class="border-top border-2 border-secondary mb-4 mt-2" data-aos="fade-up"></div>
                    </div>
                    <div data-aos="fade-up">
                        <h5>USA</h5>
                        <div class="position-relative">
                            <p><strong>Brooklyn </strong><br>Street name 21, Ipsum,<br> 12345,&nbsp;New York
                                City</p>
                            <p>Phone:&nbsp;+01 1234 456 678<br>Fax: +01 1234 567 890<br>Website: <a
                                    rel="noopener" href="#!">www.site.se</a><br>Email: <a rel="noopener"
                                                                                          href="#!">info@yourmail.com</a>
                            </p>
                        </div>
                    </div>
                    <div class="border-top border-2 border-secondary my-4 my-lg-5" data-aos="fade-up"></div>
                    <div data-aos="fade-up" data-aos-delay="100">
                        <h5>Sweden</h5>
                        <div class="position-relative">
                            <p><strong>Stockholm </strong><br>Street name 21, Danderyd,<br>
                                SE-12345,&nbsp;Sweden</p>
                            <p>Phone:&nbsp;+46 1234 56789<br>Fax: +46 123 123456<br>Website: <a rel="noopener"
                                                                                                href="#">www.site.se</a><br>Email: <a rel="noopener"
                                                                                                                                      href="#!">info@yourmail.com</a>
                            </p>
                        </div>
                    </div>
                    <div class="border-top border-2 border-secondary my-4 my-lg-5" data-aos="fade-up"></div>
                    <div class="pb-0" data-aos="fade-up" data-aos-delay="150">
                        <h5>South Korea</h5>
                        <div class="position-relative">
                            <p>373 Gangnam-daero<br> Seocho-gu, Seoul, 06621,<br> South Korea</p>
                            <p>Phone:&nbsp;+82 1234 56789<br>Fax: +82 123 123456<br>Website: <a rel="noopener"
                                                                                                href="#">www.site.se</a><br>Email: <a rel="noopener"
                                                                                                                                      href="#!">info@yourmail.com</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--divider-->
    <svg class="position-relative start-0 bottom-0 text-gray-800 flip-y" width="100%" height="64" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 152" fill="none" preserveAspectRatio="none">
        <path d="M126.597 138.74C99.8867 127.36 76.6479 109.164 59.2161 85.9798L0 3.05176e-05L1440 0C1440 0 1419.98 25.8404 1380.15 32.9584L211.382 150.811C182.549 154.283 153.308 150.12 126.597 138.74Z" fill="currentColor"/>
    </svg>
    <section class="bg-gray-800 text-white overflow-hidden position-relative">
        <div class="container py-9 py-lg-11">
            <div class="row align-items-end position-relative">
                <div class="col-lg-7 text-center text-lg-start">
                    <h5 class="mb-3">Let's start building</h5>
                    <h1 class="mb-5 mb-lg-0 display-4">Stunning websites ease</h1>
                </div>
                <div class="col-lg-5 text-lg-end text-center">
                    <a href="#!" class="btn btn-outline-white btn-lg me-2 mb-2 mb-lg-0 rounded-4">Contact sales</a>
                    <a href="#!" class="btn btn-gray-200 btn-lg rounded-4">Purchase Now</a>
                </div>
            </div>
        </div>
    </section>



    <div class="breadcrumb-container">
        <div class="container">
            <ol class="breadcrumb">
                <li><i class="fa fa-home pr-10"></i><a href="{{route('frontend.index')}}" style="color: black">Domov</a>
                </li>
                <li class="active" style="color: black">Kontakt</li>
            </ol>
        </div>
    </div>
    <div class="banner dark-translucent-bg" style="background-image: url(/assets/img/zgane.jpg); background-size: cover; background-repeat: no-repeat; background-position: center;background-position: 50% 30%;">
        <!-- breadcrumb start -->
        <!-- breadcrumb end -->
        <div class="container">
            <div class="row">
                <div class="col-md-8 text-center col-md-offset-2 pv-20">
                    <h2 class="title">Kontaktirajte nas</h2>
                    <div class="separator mt-10"></div>
                    <p class="text-center">Nekateri tekst tukaj</p>
                </div>
            </div>
        </div>
    </div>
    <!-- banner end -->
    <!-- main-container start -->
    <section class="main-container">
        <div class="container">
            <div class="row">
                <!-- main start -->
                <div class="main col-md-12 space-bottom">
                    <!--
                    <p class="lead">It would be great to hear from you! Just drop us a line and ask for anything with
                        which you think we could be helpful. We are looking forward to hearing from you!</p>
                    <div class="alert alert-success hidden" id="MessageSent">
                        We have received your message, we will contact you very soon.
                    </div>
                    <div class="alert alert-danger hidden" id="MessageNotSent">
                        Oops! Something went wrong, please verify that you are not a robot or refresh the page and try
                        again.
                    </div>
                    -->
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="text-center">
                        @if(Session::has('flash_message'))
                            <p class="alert alert-success">Пораката е испратена</p>
                        @endif
                        </div>
                    <div class="contact-form">
                        <form action="{{route('messages.store')}}" method="post" class="margin-clear">
                            @csrf
                            <div class="form-group has-feedback">
                                <label for="fullName">Full Name*</label>
                                <input type="text" class="form-control @error('fullName') is-invalid @enderror" id="fullName" name="fullName" placeholder="">
                                @error('fullName')
                                <span style="color: red" class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                @enderror
                                <i class="fa fa-user form-control-feedback"></i>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="email">Email*</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="">
                                @error('email')
                                <span style="color: red" class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                @enderror
                                <i class="fa fa-envelope form-control-feedback"></i>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="phone">Phone*</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="">
                                @error('phone')
                                <span style="color: red" class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                @enderror
                                <i class="fa fa-phone form-control-feedback"></i>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="subject">Subject*</label>
                                <input type="text" class="form-control @error('subject') is-invalid @enderror" id="subject" name="subject" placeholder="">
                                @error('subject')
                                <span style="color: red" class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                @enderror
                                <i class="fa fa-navicon form-control-feedback"></i>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="message">Message*</label>
                                <textarea class="form-control @error('message') is-invalid @enderror" rows="6" id="message" name="message"
                                          placeholder=""></textarea>
                                @error('message')
                                <span style="color: red" class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                @enderror
                                <i class="fa fa-pencil form-control-feedback"></i>
                            </div>
                            <button type="submit" class="submit-button btn btn-default pull-right">Submit</button>
                        </form>
                    </div>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- main-container end -->
@endsection
