@extends('layouts.frontend')
@section('content')
    <section class="bg-dark text-white position-relative">
        <div class="container pt-6 pb-6 pb-lg-6 position-relative z-index-1">
            <div class="row  align-items-center justify-content-center text-center">
                <div class="col-lg-10 col-xl-7 z-index-2">
                    <div class="position-relative">
                        <div>
                            <nav class="d-flex justify-content-center" aria-label="breadcrumb">
                                <div class="mb-4">
                                    <ol class="breadcrumb mb-0">
                                        <li class="breadcrumb-item"><a href="#"><i class="bx bx-home fs-5"></i></a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Storitve</li>
                                    </ol>
                                </div>
                            </nav>
                            <h1 class="mb-0 display-4">
                                Storitve
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="position-relative bg-white border-bottom overflow-hidden" id="next">
        <div class="container pt-7 pt-lg-6 pb-7 pb-lg-6 position-relative">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{ route('frontend.index') }}" class="text-dark">
                            <i class="bx bx-home fs-5"></i>
                        </a></li>
                    <li class="breadcrumb-item active"><a href="" class="text-dark">Storitve</a></li>
                </ol>
            </nav>
            <div class="container py-9 py-lg-11">
                <section class="position-relative overflow-hidden" id="next">
                    <div class="container pb-9 pb-lg-11">
                        <div class="row justify-content-lg-around mb-7 mb-lg-9 align-items-center">
                            <div class="col-lg-6 col-xl-5 mb-5 mb-lg-0" data-aos="fade-left" data-aos-delay="100">
                                <!--imask image-->
                                <div class="bg-mask flip-x">
                                    <img src="assets/img/960x1140/1.jpg" class="mask-blob mask-image" alt="">
                                </div>
                            </div>
                            <div class="col-lg-5" data-aos="fade-right">
                                <div class="d-flex align-items-center mb-4">
                                    <h1 class="mb-0 display-6">
                                        Design
                                    </h1>
                                </div>
                                <p class="mb-4 lead">
                                    Quis nostrud ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                                    irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                                    pariatur.
                                </p>
                                <ul class="list-unstyled text-dark">
                                    <li class="d-flex align-items-center mb-3">
                                        <i class="bx bx-check-circle fs-4 opacity-50 me-2"></i>
                                        <span>Brand identity</span>
                                    </li>
                                    <li class="d-flex align-items-center mb-3">
                                        <i class="bx bx-check-circle fs-4 opacity-50 me-2"></i>
                                        <span>Illustration</span>
                                    </li>
                                    <li class="d-flex align-items-center mb-3">
                                        <i class="bx bx-check-circle fs-4 opacity-50 me-2"></i>
                                        <span>Packaging and labelling</span>
                                    </li>
                                    <li class="d-flex align-items-center mb-3">
                                        <i class="bx bx-check-circle fs-4 opacity-50 me-2"></i>
                                        <span>Editorial design</span>
                                    </li>
                                    <li class="d-flex align-items-center">
                                        <i class="bx bx-check-circle fs-4 opacity-50 me-2"></i>
                                        <span>Promotional marketing</span>
                                    </li>
                                </ul>
                            </div>
                            <!--/.End Col-->
                        </div>
                        @foreach($events as $event)
                            <div class="row justify-content-lg-around mb-7 mb-lg-9 align-items-center">

                                <div class="col-lg-6 col-xl-5 mb-5 mb-lg-0 order-lg-last" data-aos="fade-left"
                                     data-aos-delay="100">
                                    <!--imask image-->
                                    <div class="bg-mask">
                                        <img src="assets/img/events/originals/{{ $event->image }}"
                                             class="mask-blob mask-image" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-5 order-md-1" data-aos="fade-right" data-aos-delay="100">
                                    <div class="d-flex align-items-center mb-4">
                                        <h1 class="mb-0 display-6">
                                            {{ $event->name }}
                                        </h1>
                                    </div>
                                    <br>
                                    <p class="mb-4 lead">
                                        {!! $event->description !!}
                                    </p>

                                </div>
                                <!--/.End Col-->
                            </div>
                        @endforeach
                    </div>
                </section>
                <section class="position-relative">
                    <div class="container py-9 py-lg-11 position-relative z-index-1">
                        <div class="row mb-7 align-items-end justify-content-between">
                            <!--begin: Section headings-->
                            <div class="col-lg-7 mb-4 mb-lg-0">
                                <!--Heading-->
                                <h3 class="mb-2 display-6" data-aos="fade-left">Events Gallery</h3>
                            </div>
                            <!--end: Section headings-->
                            <div class="col-12 col-lg-3 text-lg-end" data-aos="fade-left" data-aos-delay="150">
                                <!--begin: button-->
                                <a href="{{ route('frontend.albums') }}" class="btn btn-outline-secondary btn-hover-arrow hover-lift">
                                    <span>View all albums</span>
                                </a>
                                <!--end: button-->
                            </div>
                        </div>
                    </div>
                </section>
                <section class="position-relative">
                    <div class="container py-9 py-lg-11">
                        <div class="row mb-9 mb-lg-11">
                            @foreach($albums as $album)
                                <div class="col-md-6 col-sm-8 col-xl-4">
                                    <div
                                        class="card card-hover hover-lift hover-shadow-lg text-white rounded-4 border-0 overflow-hidden">
                                        <img src="/assets/img/cover_images/albums/thumbnails/{{$album->coverImg}}" class="img-fluid img-zoom" alt="...">
                                        <div class="bg-gradient-dark position-absolute start-0 top-0 w-100 h-100"></div>
                                        <div
                                            class="card-body z-index-1 d-flex flex-column position-absolute start-0 top-0 w-100 h-100 justify-content-end p-4">
                                            <div class="position-relative">
                                                <h5 class="h3 mb-3"><span>{{ $album->name }}</span>
                                                </h5>
                                                <div class="text-end">
                                                    <p class="small mb-1"><span>Date:{{ $album->created_at->diffForHumans()  }}</span></p>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="{{ route('frontend.album', $album->slug) }}" class="stretched-link"></a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>

@endsection
