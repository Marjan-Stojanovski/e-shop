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
        <a class="navbar-brand" href="index.html">
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
            <div class="nav-item ms-0 me-4 me-lg-2">
                <a href="{{ route('frontend.wishlist') }}" class="nav-link lh-1 position-relative">
                    <i class="bx bx-heart fs-4"></i>
                </a>
            </div>
            <div class="nav-item me-4 me-lg-2 ms-0">
                <a href="#offcanvasCart" data-bs-toggle="offcanvas" class="nav-link lh-1 position-relative">
                    <i class="bx bx-shopping-bag fs-4"></i>
                    <!--card badge-->
                    <span
                        class="badge d-none d-lg-flex p-0 position-absolute end-0 top-0 me-n2 mt-n1 lh-1 fw-semibold width-1x height-1x bg-white shadow-sm rounded-circle flex-center text-dark">{{ count((array) session('cart')) }}</span>
                </a>
            </div>
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
        <div class="collapse navbar-collapse" id="mainNavbarTheme">
            <ul class="navbar-nav me-lg-auto ms-xl-5 ms-lg-2">
                <li class="nav-item ">
                    <a class="nav-link" href="{{ route('frontend.index') }}">
                        Domov
                    </a>
                </li>

                <li class="nav-item nav-item dropdown position-static ">
                    <a class="nav-link dropdown-toggle"
                       data-toggle="dropdown">Zgane Pijace</a>
                    <ul class="dropdown-menu">
                        <li class="nav-item dropdown">
                            {!! $categoriesTree !!}
                        </li>
                    </ul>
                </li>
                <li class="nav-item nav-item dropdown position-static ">
                    <a class="nav-link " href="{{ route('frontend.shop') }}">
                        Trgovina
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('frontend.about') }}">
                        O&nbsp;nas
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('frontend.feedback') }}">
                        Kontakt
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-danger"  href="{{ route('users.index') }}">
                        <strong>ADMIN&nbsp;PANEL</strong>
                    </a>
                </li>
            </ul>
        </div>

        <!--begin:Search bar -->
        <div class="collapse collapse-search ms-xl-auto ms-lg-3 me-lg-1 d-lg-block" style="--navbar-search-width:280px;"
             id="searchCollapse">
            <form action="{{ route('frontend.search') }}" method="GET" role="search">
                <div class="position-relative mt-3 mt-lg-0">
                            <span class="position-absolute start-0 top-50 translate-middle-y ms-3 opacity-50">
                                <i class="bx bx-search-alt-2"></i>
                            </span>
                    <input type="text" placeholder="Search Products..."
                           value="{{ Request::get('search') }}"
                           class="form-control ps-6 rounded-pill" name="search">
                </div>
                <button type="submit" hidden></button>
            </form>
        </div>
        <!--/end:Search bar -->
    </div>
</nav>
<!--/end:Header shop-->


<!--begin:Shopping Cart offcanvas-->
<?php
$carts = session()->get('cart', []);
?>
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasCart" aria-labelledby="offcanvasCart">
    <div class="border-bottom offcanvas-header align-items-center justify-content-between">
        <h5 class="mb-0">Your Cart ({{ count((array) session('cart')) }})</h5>
        <button type="button" class="btn-close text-reset p-0 m-0 width-3x height-3x flex-center ms-auto"
                data-bs-dismiss="offcanvas" aria-label="Close">
            <button type="button"
                    class="btn-close shadow-none text-reset p-0 m-0 width-3x height-3x flex-center ms-auto"
                    data-bs-dismiss="offcanvas" aria-label="Close">
                <i class="bx bx-x fs-4"></i>
            </button>
        </button>
    </div>
    <div class="offcanvas-body p-4">
        <ul class="list-unstyled no-animation mb-0">
            <?php
            $subTotal = 0;
            ?>
            @if(session('cart'))
                @foreach(session('cart') as $id => $details)
                    <li class="d-flex py-3 border-bottom">
                        <div class="me-1">
                            <a href="#!"><img src="/assets/img/products/thumbnails/{{ $details['image'] }}"
                                              class="height-10x hover-lift hover-shadow w-auto" alt=""></a>
                        </div>
                        <div class="flex-grow-1 px-4 mb-3">
                            <a href="#!" class="text-dark d-block lh-sm fw-semibold mb-2">{{ $details['name'] }}</a>
                            <p class="mb-0 small"><strong>€ {{ $details['unitPrice'] }}</strong> x
                                <strong>{{ $details['quantity'] }}</strong>
                            </p>
                        </div>
                            <?php
                            $productAmount = $details['productAmount'];
                            $subTotal += $productAmount;
                            ?>
                        <div class="d-block text-end">
                            <form action="{{route('delete.cart', $id )}}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit"
                                        class="text-muted small text-decoration-underline btn btn-hover-label">
                                    Remove
                                </button>
                            </form>

                        </div>
                    </li>
                @endforeach
            @endif
            <li class="d-flex p-3 mb-3 border-top justify-content-between align-items-center">
                <span class="fw-normal">Subtotal</span>
                <span class="text-dark fw-bold">€ {{ number_format($subTotal, 2) }}</span>
            </li>
        </ul>
    </div>
    <div class="offcanvas-footer p-4 border-top">
        <ul class="list-unstyled mb-0">
            <li class="pb-2 d-grid">
                <a href="{{ route('frontend.shoppingCart') }}" class="btn btn-secondary btn-hover-arrow"><span>View
                                shopping cart</span></a>
            </li>
            <li class="d-grid">
                <a href="{{ route('frontend.checkout')}}" class="btn btn-primary btn-hover-arrow"><span>Checkout</span></a>
            </li>
        </ul>
    </div>
</div>
<!--/end:Shopping Cart offcanvas-->


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
            <div class="col-md-3 col-sm-6 mb-5">
                <h5 class="mb-4">Company</h5>
                <ul class="nav flex-column mb-0">
                    <li class="nav-item"><a class="nav-link" href="{{ route('frontend.index') }}"><i
                                class="bx bx-home"></i> Domov</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('frontend.shop') }}"><i
                                class="bx bx-shopping-bag"></i> Trgovina</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('frontend.about') }}"><i
                                class="bx bx-credit-card-front"></i> O nas</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('frontend.feedback') }}"><i
                                class="bx bx-phone-call"></i> Kontakt</a></li>
                </ul>
            </div>
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
