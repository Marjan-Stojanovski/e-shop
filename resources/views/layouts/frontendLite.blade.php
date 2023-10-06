<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="/assets/img/logo.jpg" type="image/ico">

    <link rel="stylesheet" href="/assets/vendor/node_modules/css/choices.min.css">
    <link rel="stylesheet" href="/assets/vendor/node_modules/css/simplebar.min.css">
    <!--swiper-->
    <link rel="stylesheet" href="/assets/vendor/node_modules/css/swiper-bundle.min.css">

    <!--Icons-->
    <link href="/assets/fonts/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/vendor/node_modules/css/aos.css">
    <link rel="stylesheet" href="/assets/fonts/iconsmind/iconsmind.css">
    <!--Google fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Space+Grotesk:wght@300..700&display=swap"
          rel="stylesheet">
    <!-- Main CSS -->
    <link href="/assets/css/theme-shop.min.css" rel="stylesheet">
    <link href="/assets/css/theme.min.css" rel="stylesheet">

    <!--:Simplebar css ()-->
    <style type="text/css">
        .simplebar-track.simplebar-vertical {
            width: 7px;
        }

        .simplebar-scrollbar:before {
            background: currentColor;
        }

        #offer {
            display: none;
        }

        #creditCard {
            display: none;
        }
    </style>
    <title>Kosar E-shop</title>
</head>

<body>
<!--:Preloader Spinner-->
<div class="spinner-loader bg-gradient-secondary text-white">
    <div class="spinner-border text-primary" role="status">
    </div>
    <span class="small d-block ms-2">Loading...</span>
</div>

<nav
    class="navbar navbar-search-w-icons position-sticky shadow top-0 z-index-fixed navbar-expand-lg navbar-light bg-white">
    <div class="container-fluid position-relative">
        <a class="navbar-brand" >
            <img src="/assets/img/company_info/thumbnails/{{ $company->image }}" alt="" class="img-fluid" style="width: 50px;">
        </a>
        <div class="d-flex align-items-center navbar-no-collapse-items navbar-nav flex-row order-lg-last">
            <button class="navbar-toggler order-last" type="button" data-bs-toggle="collapse"
                    data-bs-target="#mainNavbarTheme" aria-controls="mainNavbarTheme" aria-expanded="false"
                    aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon">
                            <i></i>
                        </span>
            </button>
            <!--Search collapse trigger(hidden in desktop laptop)-->
            <div class="nav-item dropdown me-4 me-lg-0">
                <a href="#" class="nav-link p-0" data-bs-auto-close="outside" data-bs-toggle="dropdown"
                   aria-expanded="false">
                    <i class="bx bx-user fs-4"></i>
                </a>
                @if(Auth::user())
                    <div class="dropdown-menu shadow-lg dropdown-menu-end dropdown-menu-xs p-0">
                        <a href="{{ route('frontend.profile', Auth::user()->id ) }}"
                           class="dropdown-header border-bottom p-4">
                            <div class="d-flex align-items-center">
                                <div>
                                    <h5 class="mb-0 text-body">{{ Auth::user()->firstName }} {{ Auth::user()->lastName }}</h5>
                                    <span
                                        class="text-muted d-block mb-2 text-lowercase">{{ Auth::user()->email }}</span>
                                    <div class="small d-inline-block link-underline fw-semibold text-muted">View
                                        account
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="{{ route('logout') }}" class="dropdown-item rounded-top-0 p-3"
                           onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                    <span class="d-block text-end">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                             fill="currentColor" class="bx bx-box-arrow-right me-2" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                  d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                                            <path fill-rule="evenodd"
                                                  d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                                        </svg>
                                        Sign Out
                                    </span>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </a>
                    </div>
                @else
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-xs position-absolute p-4">
                        <!--Login form-->
                        <h5 class="mb-0 text-center">
                            Are you a customer?
                        </h5>
                        <br>
                        <div class=" text-center">
                            <a href="{{ route('login') }}" class="btn btn-primary btn-hover-arrow"
                               style="border-radius: 30px; max-width: 200px">
                                <span>Sign in</span>
                            </a>
                        </div>
                        <p class="pt-4 mb-0 text-muted">
                            Don’t have an account yet? <a href="{{ route('frontend.register') }}"
                                                          class="ms-2 pb-0 text-dark fw-semibold link-underline">Sign
                                Up</a>
                        </p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</nav>

<main>
    <!--begin:Main Content-->
    @yield('content')
    <!--/end:Main Content-->
</main>

<!--Footer Start-->
<!--begin:Footer-->
<footer id="footer" class="position-relative footer overflow-hidden bg-dark text-white">
    <div class="container pt-9 pt-lg-11 pb-5">
        <div class="row">
            <div class="col-md-4 col-sm-6 mb-5">
                <h5 class="mb-4">{{ $company->name }}, {{ $company->info }}</h5>
                <div class="footer-info-details">
                    <p>
                        <a href="mailus@domain.com" class="link-hover-underline"><i
                                class="bx bx-mail-send"></i> {{ $company->mail }}</a>
                    </p>
                    <p class="mb-0"><a class="link-hover-underline" href="tel:+1123456789"><i
                                class="bx bx-phone-call"></i> {{ $company->phone }}</a>
                    </p>
                </div>

                <hr class="my-4">
                <h6 class="mb-4">Follow us</h6>
                <div class="d-flex align-items-center">
                    <!-- Social button -->
                    <a target=”_blank” href="{{ $company->facebook }}" class="d-inline-block mb-1 me-2 si rounded-pill si-hover-facebook">
                        <i class="bx bxl-facebook fs-5"></i>
                        <i class="bx bxl-facebook fs-5"></i>
                    </a>
                    <!-- Social button -->
                    <a target=”_blank” href="{{ $company->instagram }}" class="d-inline-block mb-1 si rounded-pill si-hover-instagram">
                        <i class="bx bxl-instagram fs-5"></i>
                        <i class="bx bxl-instagram fs-5"></i>
                    </a>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 mb-5">
            </div>

            <div class="col-md-5 mb-5">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d581.5696712468791!2d14.531543512757764!3d46.102394609794175!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x476532eaadf80047%3A0x22da06c9ba2f5b40!2sKo%C5%A1ar%2C%20gostinske%20storitve%2C%20Darko%20Stojanovski%20s.p.!5e0!3m2!1sen!2smk!4v1696079350236!5m2!1sen!2smk"
                        width="500" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
        <hr class="mb-5 mt-0">
        <div class="row align-items-center">
            <div class="col-sm-7 mb-4 mb-sm-0">
                <div class="d-flex small align-items-center">
                    <a class="d-block" href="#">Privacy &amp; Policy</a>
                    <a class="d-block ms-3" href="#">Terms &amp; Conditions</a>
                </div>
            </div>
            <div class="col-sm-5 text-sm-end">
                <ul class="list-inline small mb-0">
                    <li class="list-inline-item me-3">
                        <p class="small text-muted mb-0"><span class="d-block lh-sm small text-muted">&copy; Copyright
                             <script>
                                 document.write(new Date().getFullYear())
                             </script>. by MarjanS.
                         </span> </p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!--end:Footer-->

<!-- begin Back to Top button -->
<a href="#" class="toTop">
    <i class="bx bxs-up-arrow"></i>
</a>

<!-- scripts -->
<script src="/assets/js/theme.bundle.js"></script>
<!--Page Countdown + Swiper Slider scripts-->
<script src="/assets/vendor/node_modules/js/jquery.min.js"></script>
<script src="/assets/vendor/node_modules/js/jquery.countdown.min.js"></script>
<script src="/assets/vendor/node_modules/js/swiper-bundle.min.js"></script>
<script src="/assets/vendor/node_modules/js/simplebar.min.js"></script>
<script src="/assets/vendor/node_modules/js/choices.min.js"></script>
<script>
    //Swiper Classic
    var swiperClassic = new Swiper(".swiper-classic", {
        slidesPerView: 1,
        spaceBetween: 0,
        loop: true,
        autoplay: {
            delay: 2500
        },
        pagination: {
            el: ".swiperClassic-pagination",
            clickable: true
        }
    });

    function get1dayFromNow() {
        return new Date(new Date().valueOf() + 1 * 24 * 60 * 60 * 1000);
    }

    var $clock = $('.countdown-timer');

    $clock.countdown(get1dayFromNow(), function (event) {
        $(this).html(event.strftime(
            '<div class="d-flex flex-column px-2 width-7x"><h2 class="mb-0 h4">%H</h2><span class="small text-muted">Hours</span></div><div class="d-flex flex-column px-2 width-7x"><h2 class="mb-0 h4">%M</h2><span class="small text-muted">Minutes</span></div><div class="d-flex flex-column px-2 width-7x"><h2 class="mb-0 h4">%S</h2><span class="small text-muted">Seconds</span></div>'
        ));
    });
    //Swiper testimonials
    var swiper = new Swiper(".swiper-testimonials", {
        loop: true,
        autoHeight: true,
        slidesPerView: 1,
        spaceBetween: 16,
        pagination: {
            el: ".swiperT-pagination", clickable: true
        },
    });

    function onSelectChangeHandler() {
        let val = document.getElementById("paymentOption").value;
        console.log(val);
        switch (val) {
            case "offer":
                document.getElementById("offer").style.display = "block";
                document.getElementById("creditCard").style.display = "none";
                break;
            case "creditCard":
                document.getElementById("offer").style.display = "none";
                document.getElementById("creditCard").style.display = "block";
                break;
        }
    }
</script>
<script>
    //Swiper thumbnail demo
    var swiperThumbnails = new Swiper(".swiper-thumbnails", {
        spaceBetween: 8,
        slidesPerView: 4,
        freeMode: true,
        watchSlidesProgress: true,
    });
    var swiperThumbnailsMain = new Swiper(".swiper-thumbnails-main", {
        spaceBetween: 0,
        navigation: {
            nextEl: ".swiperThumb-next",
            prevEl: ".swiperThumb-prev"
        },
        thumbs: {
            swiper: swiperThumbnails
        }
    });
    var el = document.querySelectorAll("[data-choices]");
    el.forEach(e => {
        const t = {
            ...e.dataset.choices ? JSON.parse(e.dataset.choices) : {},
            ...{
                classNames: {
                    containerInner: e.className,
                    input: "form-control",
                    inputCloned: "form-control-xs",
                    listDropdown: "dropdown-menu",
                    itemChoice: "dropdown-item",
                    activeState: "show",
                    selectedState: "active"
                }
            }
        }
        new Choices(e, t)
    });
</script>
<script>
    function resetCheckbox() {
        $('input[type=checkbox]').each(function () {
            this.checked = false;
        });
    }
</script>
<script>
    //Main Hero Slider
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
    var swiperClassic = new Swiper(".swiper-classic", {
        slidesPerView: 1,
        spaceBetween: 0,
        loop: true,
        grabCursor: true,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        effect: "creative",
        creativeEffect: {
            prev: {
                shadow: true,
                translate: ["-20%", 0, -1],
            },
            next: {
                translate: ["100%", 0, 0],
            },
        },
        thumbs: {
            swiper: sliderThumbs
        },
    });

    //swiper partners
    var swiperPartners5 = new Swiper(".swiper-partners", {
        slidesPerView: 2,
        loop: true,
        spaceBetween: 16,
        autoplay: true,
        breakpoints: {
            768: {
                slidesPerView: 4
            },
            1024: {
                slidesPerView: 5
            }
        },
        pagination: {
            el: ".swiper-partners-pagination",
            clickable: true
        },
        navigation: {
            nextEl: ".swiper-partners-button-next",
            prevEl: ".swiper-partners-button-prev"
        }
    });


    //swiper Testimonials
    var swiperTestimonails = new Swiper(".swiper-testimonials", {
        autoHeight: true,
        spaceBetween: 16,
        breakpoints: {
            640: {
                slidesPerView: 1,
                spaceBetween: 16
            },
            768: {
                slidesPerView: 2,
                spaceBetween: 16
            },
            1024: {
                slidesPerView: 3,
                spaceBetween: 30
            }
        },
        pagination: {
            el: ".swiper-testimonials-pagination",
            clickable: true
        },
        navigation: {
            nextEl: ".swiper-testimonials-button-next",
            prevEl: ".swiper-testimonials-button-prev"
        }
    });

</script>
<script type="text/javascript">

    jQuery(function () {
        jQuery('#product-sortBy').change(function () {
            this.form.submit();
        });
    });
</script>
</body>
</html>
