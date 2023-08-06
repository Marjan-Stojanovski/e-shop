@extends('layouts.frontend')
@section('content')

    <section class="position-relative bg-white border-bottom overflow-hidden" id="next">
        <div class="container pt-7 pt-lg-6 pb-7 pb-lg-6 position-relative">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{ route('frontend.index') }}" class="text-dark">
                            <i class="bx bx-home fs-5"></i>
                        </a></li>
                    <li class="breadcrumb-item active"><a href="" class="text-dark">About Us</a></li>
                </ol>
            </nav>
        <div class="container py-9 py-lg-11">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <h6 class="fst-italic font-serif mb-3" data-aos="fade-right" data-aos-duration="700">
                        Realise your potential </h6>
                    <h1 class="display-4 mb-4" data-aos="fade-left" data-aos-delay="100"
                        data-aos-duration="700">
                        We create digital design experiences
                    </h1>
                    <p class="mb-5 w-lg-75" data-aos="fade-right" data-aos-delay="150" data-aos-duration="700">
                        We are a professional digital studio based in California, Usa. We make good
                        designs for small to large businesses, Building good designs is our passion. Drop us a
                        line and say hello to us without any hesitation. We would love to discuss about your
                        next project.
                    </p>
                    <div data-aos="fade-up" data-aos-duration="700" data-aos-delay="200">
                        <a href="#" class="btn btn-primary btn-hover-arrow hover-lift"><span>What we
                                        offer</span></a>
                    </div>
                </div>
                <div class="col-lg-6 ms-auto position-relative">
                    <div class="rellax position-absolute top-0 mt-n3 end-0 width-16x h-auto" data-rellax-speed="-1"
                         data-rellax-percentage=".9">
                        <img src="assets/img/vectors/pattern-dots3.svg" data-inject-svg
                             class=" fill-success w-100 h-auto" alt="">
                    </div>
                    <div class="position-relative ps-9 ps-lg-12 pb-9 pb-lg-12 pe-5 pt-5" data-aos="fade-right"
                         data-aos-delay="200" data-aos-duration="700">
                        <img src="/assets/img/logo.jpg" alt=""
                             class="img-fluid rounded-4 shadow-lg position-relative">

                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="position-relative bg-white">
        <div class="container py-9 py-lg-11">
            <div class="row mb-7 mb-lg-9">
                <div class="col-lg-10 col-xl-8 mx-auto text-center" data-aos="fade-up" data-aos-duration="700">
                    <h2 class="display-4">Meet our dedicated highly skilled super team</h2>
                </div>
            </div>
            <div class="row">
                @foreach($employees as $employee)
                <div class="col-lg-4 mb-7 mt-auto text-center" data-aos="fade-up" data-aos-delay="100"
                     data-aos-duration="700">
                    <div class="position-relative mb-4 overflow-hidden width-18x height-18x mx-auto rounded-circle">
                        <img src="assets/img/team/1.jpg" alt="" class="img-fluid">
                    </div>
                    <div>
                        <h5 class="mb-1">
                            {{ $employee->name }}
                        </h5>
                        <p class="d-block text-muted small mb-3">{{ $employee->position }}</p>
                        <p class="w-lg-75 mx-auto mb-2">
                            {!! $employee->description !!}
                        </p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
