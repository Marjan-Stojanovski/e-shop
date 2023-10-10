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
                                        <li class="breadcrumb-item" aria-current="page"><a href="{{ route('frontend.albums') }}">Albums</a></li>
                                    </ol>
                                </div>
                            </nav>
                            <h1 class="mb-0 display-4">
                                {{ $album->name }}
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
                    <li class="breadcrumb-item"><a href="{{ route('frontend.albums') }}" class="text-dark">Albums</a></li>
                    <li class="breadcrumb-item active"><a href="" class="text-dark">{{ $album->name }}</a></li>
                </ol>
            </nav>
            <div class="container py-9 py-lg-11">
                <section class="position-relative ">
                    <div class="container ">
                        <div class="row align-items-center">
                            <div class="col-md-7 mb-4 mb-md-0">
                                <h2 class="mb-0 display-5">
                                    {{ $album->name }} - Pictures
                                </h2>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="position-relative overflow-hidden">
                    <div class="container py-9 py-lg-11">
                        <!-- Swiper -->
                        <div class="swiper swiper-1 position-relative">
                            <div class="swiper-wrapper">
                                @foreach($pictures as $picture)
                                    <!--Slide item-->
                                    <div class="swiper-slide">
                                        <div
                                            class="vh-75 d-flex w-100  text-white align-items-center justify-content-center">
                                            <img src="/assets/img/gallery/albums/{{$picture->image}}"
                                                 class="img-fluid img-zoom" alt="">
                                        </div>
                                    </div>
                                @endforeach
                                <!--Slide item-->

                            </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>

@endsection

@section('scripts')
    <script>
        var swiper = new Swiper(".swiper-1", {
            slidesPerView: 1,
            spaceBetween: 16,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });

        var swiper2 = new Swiper(".swiper-2", {
            slidesPerView: 2,
            spaceBetween: 8,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
        var swiper2 = new Swiper(".swiper-3", {
            slidesPerView: 1,
            spaceBetween: 8,
            centerSlides: true,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 40,
                }
            },
        });
        var swiperFlow = new Swiper('.swiper-flow', {
            effect: 'coverflow',
            coverflowEffect: {
                rotate: 60,
                slideShadows: false,
            },
        });
        var swiperFade = new Swiper('.swiper-fade', {
            effect: 'fade',
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            fadeEffect: {
                crossFade: true
            },
        });
        var swiperFade = new Swiper('.swiper-cards', {
            effect: "cards",
            grabCursor: true,
            cardsEffect: {
                slideShadows: false,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            }
        });

        //Thumbnails Demo
        var swiperThumb = new Swiper(".swiper-thumbs-thumbnails", {
            freeMode: true,
            watchSlidesVisibility: true,
            watchSlidesProgress: true,
            history: false,
            spaceBetween: 8,
            breakpoints: {
                480: {
                    slidesPerView: 4,
                    spaceBetween: 8,
                },
                768: {
                    slidesPerView: 6,
                    spaceBetween: 8,
                },
                1024: {
                    slidesPerView: 8,
                    spaceBetween: 8,
                },
            }
        });
        var swiperThumbsMain = new Swiper(".swiper-thumbs-main", {
            spaceBetween: 16,
            loop: true,
            autoHeight: true,
            thumbs: {
                swiper: swiperThumb,
            },
        });

        //Timeline progressbar
        var sliderThumbs = new Swiper('.progress-swiper-thumbs', {
            watchSlidesVisibility: true,
            watchSlidesProgress: true,
            history: false,
            breakpoints: {
                480: {
                    slidesPerView: 2,
                    spaceBetween: 16,
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 16,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 16,
                },
            },
            on: {
                'afterInit': function (swiper) {
                    swiper.el.querySelectorAll('.swiper-pagination-progress-inner')
                        .forEach($progress => $progress.style.transitionDuration =
                            `${swiper.params.autoplay.delay}ms`)
                }
            }
        });

        var sliderMain = new Swiper('.swiper-progress-main', {
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            thumbs: {
                swiper: sliderThumbs
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        })

    </script>
@endsection
