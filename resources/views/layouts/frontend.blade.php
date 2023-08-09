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

    <!--:Simplebar css ()-->
    <style type="text/css">
        .simplebar-track.simplebar-vertical {
            width: 7px;
        }

        .simplebar-scrollbar:before {
            background: currentColor;
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
            <img src="/assets/img/logo.jpg" alt="" class="img-fluid" style="width: 50px;">
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
                <a href="demo-shop-wishlist.html" class="nav-link lh-1 position-relative">
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
            <div class="nav-item ms-0 me-4 d-lg-none">
                <a href="#searchCollapse" data-bs-target="#" data-bs-toggle="collapse"
                   class="nav-link search-link lh-1">
                    <i class="bx bx-search-alt-2 fs-4"></i>
                </a>
            </div>
            <div class="nav-item dropdown me-4 me-lg-0">
                <a href="#" class="nav-link p-0" data-bs-auto-close="outside" data-bs-toggle="dropdown"
                   aria-expanded="false">
                    <i class="bx bx-user fs-4"></i>
                </a>
                @if(Auth::user())
                    <div class="dropdown-menu shadow-lg dropdown-menu-end dropdown-menu-xs p-0">
                        <a href="{{ route('frontend.profile', $userDetails->user_id ) }}" class="dropdown-header border-bottom p-4">
                            <div class="d-flex align-items-center">
                                <div>
                                    <img src="/assets/img/avatar/12.jpg" alt=""
                                         class="avatar xl rounded-pill me-3">
                                </div>
                                <div>
                                    <h5 class="mb-0 text-body">{{ $userDetails->firstName }} {{ $userDetails->lastName }}</h5>
                                    <span
                                        class="text-muted d-block mb-2 text-lowercase">{{ $userDetails->email }}</span>
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
                                <a href="{{ route('login') }}" class="btn btn-primary btn-hover-arrow" style="border-radius: 30px; max-width: 200px">
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
                        <li class="nav-link dropdown">
                            {!! $categoriesTree !!}
                        </li>
                    </ul>
                </li>
                <li class="nav-item nav-item dropdown position-static ">
                    <a class="nav-link " href="{{ route('frontend.shop') }}">
                        Trgovina
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle " data-bs-auto-close="outside" href="#" role="button"
                       data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop

                    </a>
                    <div class="dropdown-menu">
                        <div class="dropend">
                            <a class="dropdown-item dropdown-toggle" data-bs-toggle="dropdown"
                               aria-expanded="false" href="#">Products</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="demo-shop-products.html">Sidebar</a>
                                <a class="dropdown-item" href="demo-shop-products-full-width.html">Full
                                    width</a>
                                <a class="dropdown-item" href="demo-shop-product-category.html">Product
                                    category</a>
                            </div>
                        </div>
                        <div class="dropend">
                            <a class="dropdown-item dropdown-toggle" href="#" data-bs-toggle="dropdown"
                               aria-expanded="false">Product</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="demo-shop-product-default.html">Product
                                    Default</a>
                                <a class="dropdown-item" href="demo-shop-single-product-option.html">Product
                                    Option</a>
                            </div>
                        </div>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="demo-shop-wishlist.html">Wishlist</a>
                        <a class="dropdown-item" href="demo-shop-cart.html">Cart</a>
                        <a class="dropdown-item" href="demo-shop-checkout.html">Checkout</a>
                    </div>
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
            </ul>
        </div>

        <div class="collapse collapse-search ms-xl-auto ms-lg-3 me-lg-1 d-lg-block" style="--navbar-search-width:280px;"
             id="searchCollapse">
            <form action="#">
                <div class="position-relative mt-3 mt-lg-0">
                            <span class="position-absolute start-0 top-50 translate-middle-y ms-3 opacity-50">
                                <i class="bx bx-search-alt-2"></i>
                            </span>
                    <input type="text" placeholder="Search Products..." class="form-control ps-6 rounded-pill">
                    <!--With Submit button-->
                    <!-- <button class="btn position-absolute end-0 top-0 flex-center p-0 width-4x h-100 rounded-pill btn-white">
                        <i class="bx bx-search-alt-2"></i>
                    </button>
                    <input type="text" placeholder="Search here..." class="form-control border-0 shadow-none ps-4 pe-6 rounded-pill">
               -->
                </div>
            </form>
        </div>
    </div>
</nav>
<!--/end:Header shop-->

<!--begin:Search bar modal-->
<div id="modal-search-bar-2" class="modal fade" tabindex="-1" aria-labelledby="modal-search-bar-2"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-top modal-md">
        <div class="modal-content position-relative border-0">
            <div class="position-relative px-4">
                <div
                    class="position-absolute end-0 width-7x top-0 d-flex me-4 align-items-center h-100 justify-content-center">
                    <button type="button" class="btn-close w-auto small" data-bs-dismiss="modal"
                            aria-label="Close">Cancel
                    </button>
                </div>
                <form class="mb-0">
                    <div class="d-flex align-items-center">
                        <div class="d-flex flex-grow-1 align-items-center">
                            <i class="bx bx-search fs-4"></i>
                            <input type="text" placeholder="Search...."
                                   class="form-control shadow-none border-0 flex-grow-1 form-control-lg">
                        </div>
                    </div>
                </form>
            </div>

            <div class="p-4 border-top">
                <div class="d-flex align-items-center mb-3">
                    <i class="bx bx-trending-up fs-4"></i>
                    <h6 class="mb-0 ms-2">
                        Top searches
                    </h6>
                </div>
                <div class="d-flex flex-wrap align-items-center">
                            <span><a href="#!"
                                     class="badge badge-pill border text-muted me-1 mb-1 px-3 py-1">Jeans</a></span>
                    <span><a href="#!"
                             class="badge badge-pill border text-muted me-1 mb-1 px-3 py-1">Shoes</a></span>
                    <span><a href="#!"
                             class="badge badge-pill border text-muted me-1 mb-1 px-3 py-1">Watches</a></span>
                    <span><a href="#!"
                             class="badge badge-pill border text-muted me-1 mb-1 px-3 py-1">Men's</a></span>
                    <span><a href="#!"
                             class="badge badge-pill border text-muted me-1 mb-1 px-3 py-1">Sneakers</a></span>
                    <span><a href="#!"
                             class="badge badge-pill border text-muted me-1 mb-1 px-3 py-1">Casual</a></span>
                    <span><a href="#!"
                             class="badge badge-pill border text-muted me-1 mb-1 px-3 py-1">Shirts</a></span>
                    <span><a href="#!"
                             class="badge badge-pill border text-muted me-1 mb-1 px-3 py-1">T-shirts</a></span>
                    <span><a href="#!"
                             class="badge badge-pill border text-muted me-1 mb-1 px-3 py-1">Lowers</a></span>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/end:Search bar modal-->

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
                    $subTotal+= $productAmount;
                    ?>
                <div class="d-block text-end">
                    <form action="{{route('delete.cart', $id )}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="text-muted small text-decoration-underline btn btn-hover-label" >
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
                <a href="#" class="btn btn-primary btn-hover-arrow"><span>Checkout</span></a>
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


<!--begin:footer-->
<footer class="position-relative bg-dark text-white overflow-hidden">
    <div class="container pt-9 pt-lg-11 pb-6 position-relative">
        <div class="row">
            <div class="col-6 col-lg-3 col-xl-2 order-lg-2 ms-lg-auto mb-6">
                <h6 class="mb-4">Account</h6>
                <!-- nav -->
                <ul class="nav flex-column mb-0">
                    <li class="nav-item"><a class="nav-link" href="#!">Placing an order</a></li>
                    <li class="nav-item"><a class="nav-link" href="#!">Shipping</a></li>
                    <li class="nav-item"><a class="nav-link" href="#!">Track order</a></li>
                    <li class="nav-item"><a class="nav-link" href="#!">Orders</a></li>
                    <li class="nav-item"><a class="nav-link" href="#!">Assan Pay</a></li>
                </ul>
                <!-- /.nav -->
            </div>

            <div class="col-6 col-lg-3 col-xl-2 order-lg-3 ms-lg-auto mb-6">
                <h6 class="mb-4">Company</h6>

                <ul class="nav flex-column mb-0">
                    <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#!">Become a seller</a></li>
                    <li class="nav-item"><a class="nav-link" href="#!">News &amp; Media</a></li>
                    <li class="nav-item"><a class="nav-link" href="#!">Contact</a></li>
                </ul>
                <!-- /.nav -->
            </div>

            <div class="col-md-6 col-lg-3 col-xl-2 ms-lg-auto order-lg-4 mb-6">
                <h6 class="mb-4">Top Brands</h6>
                <ul class="nav flex-column mb-0">
                    @foreach($brands as $brand)
                        <li class="nav-item"><a class="nav-link" href="#!">{{ $brand->name }}</a></li>
                    @endforeach
                </ul>
            </div>

            <div class="col-lg-3 col-md-6 order-lg-1 mb-6">
                <div class="d-flex align-items-md-stretch flex-column h-100">
                    <div class="flex-grow-1 d-flex flex-column">
                        <small class="d-block mb-3">
                            745K Followers
                        </small>
                        <div class="mb-4">
                            <a href="#!" class="btn btn-outline-white btn-rise">
                                <div class="btn-rise-bg bg-white"></div>
                                <div class="btn-rise-text">
                                    <i class="bx bxl-instagram me-1 align-middle fs-5"></i> Follow us on IG
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- Copyright -->
                    <p class="small text-muted mb-0">© Kosar. by MarjanS.</p>
                    <!-- End Copyright -->
                </div>
            </div>
        </div>
        <hr class="bg-transparent border-top border-white opacity-25 mb-6 mt-0">
        <div class="row align-items-md-center">
            <div class="col-md-4 mb-3 mb-md-0">
                <!--:payment options-->
                <div class="d-flex justify-content-start">
                    <div class="d-block me-2 my-1">
                        <img src="/assets/img/payment/american_express.svg" alt="">
                    </div>
                    <div class="d-block me-2 my-1">
                        <img src="/assets/img/payment/paypal.svg" alt="paypal">
                    </div>
                    <div class="d-block my-1">
                        <img src="/assets/img/payment/visa.svg" alt="visa">
                    </div>
                </div>
                <!--:/payment options-->
            </div>

            <div class="col-md-2 col-xl-4 mb-3 mb-md-0">
                <!-- Links -->
                <ul class="list-inline small mb-0">
                    <li class="list-inline-item me-3">
                        <a class="d-block" target=”_blank” href="{{ $company->facebook }}">
                            <i class="bx bxl-facebook fs-4"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a class="d-block" target=”_blank” href="{{ $company->instagram }}">
                            <i class="bx bxl-instagram fs-4"></i>
                        </a>
                    </li>
                </ul>
                <!-- End Links -->
            </div>
            <div class="col-md-6 col-xl-4 text-md-end">
                <!-- Links -->
                <ul class="list-inline small mb-0">
                    <li class="list-inline-item me-3">
                        <a class="d-block" href="#!">Privacy &amp; Policy</a>
                    </li>
                    <li class="list-inline-item me-3">
                        <a class="d-block" href="#!">Terms &amp; Conditions</a>
                    </li>
                </ul>
                <!-- End Links -->
            </div>
        </div>
    </div>
</footer>
<!--/end:footer-->

<!-- begin:Back to top -->

<!-- end:Back to top -->


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
        let val = document.getElementById("type").value;
        switch (val) {
            case "private":
                document.getElementById("companyPrivate").style.display = "block";
                document.getElementById("companyCompany").style.display = "none";
                break;
            case "company":
                document.getElementById("companyPrivate").style.display = "none";
                document.getElementById("companyCompany").style.display = "block";
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
</body>
</html>
