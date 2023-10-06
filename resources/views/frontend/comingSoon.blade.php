<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="/assets/img/favicon.ico" type="image/ico">
    <!--Box Icons-->
    <link rel="stylesheet" href="/assets/fonts/boxicons/css/boxicons.min.css">

    <!--AOS Animations-->
    <link rel="stylesheet" href="/assets/vendor/node_modules/css/aos.css">

    <!--Iconsmind Icons-->
    <link rel="stylesheet" href="/assets/fonts/iconsmind/iconsmind.css">

    <!--Google fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,400&family=Source+Serif+Pro:ital@0;1&display=swap"
        rel="stylesheet">

    <!-- Main CSS -->
    <link href="/assets/css/theme.min.css" rel="stylesheet">

    <title>Kosar E-shop</title>
</head>

<body class="bg-shade-primary text-white" style="background-image: url('/assets/img/zgane.jpg')">

<!--Particles-js-->
<div class="position-fixed start-0 top-0 bottom-0 end-0 z-index-fixed pe-none w-100 h-100 start-0 top-0"
     id="particles-js"></div>
<!--Preloader Spinner-->
<div class="spinner-loader bg-gradient-secondary text-white">
    <div class="spinner-border text-primary" role="status">
    </div>
    <span class="small d-block ms-2">Loading...</span>
</div>
<!--Header Start-->
<nav
    class="navbar navbar-search-w-icons position-sticky shadow top-0 z-index-fixed navbar-expand-lg navbar-light bg-white">
    <div class="container-fluid position-relative">
        <a class="navbar-brand" >
            <img src="/assets/img/logo-new.jpg" alt="" class="img-fluid" style="width: 50px;">
        </a>
        <div class="d-flex align-items-center navbar-no-collapse-items navbar-nav flex-row order-lg-last">
            <div class="nav-item dropdown me-4 me-lg-0">
                <a href="#" class="nav-link p-0" data-bs-auto-close="outside" data-bs-toggle="dropdown"
                   aria-expanded="false">
                    <button class="btn"><i class="bx bx-user fs-4"></i> Login</button>
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
                    </div>
                @endif
            </div>
        </div>
    </div>
</nav>

<main class="main-content d-grid" id="main-content">
    <div class="container-fluid">
        <section class="position-relative">
            <div class="container pt-3 pb-9">
                <div class="row">
                    <div class="col-lg-8 mx-auto text-center position-relative" >
                        <img src="/assets/img/logo-new.jpg"
                             class="img-fluid" style="width: 100px" alt="">

                        <h1 class="mb-5 display-1 font-serif fst-italic ls-4 lh-1">Coming
                            soon</h1>
                        <div class="mb-5 position-relative z-index-1">
                            <div class="d-flex flex-wrap justify-content-center align-items-center countdown-timer">
                            </div>
                        </div>
                        <h1 class="mb-5 display-1 font-serif ls-4 lh-1">Kosar</h1>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>
<!--Footer Start-->

<!-- scripts -->
<script src="assets/js/theme.bundle.js"></script>
<!--Countdown script-->
<script src="assets/vendor/node_modules/js/jquery.min.js"></script>
<script src="assets/vendor/node_modules/js/jquery.countdown.min.js"></script>
<script>
    function get7dayFromNow() {
        return new Date(new Date().valueOf() + 7 * 24 * 60 * 60 * 1000);
    }

    var $clock = $('.countdown-timer');

    $clock.countdown(get7dayFromNow(), function (event) {
        $(this).html(event.strftime(
            '<div class="d-flex flex-column px-2 width-7x"><h2 class="mb-0 h4">%d</h2><span class="small text-muted">Days</span></div><div class="d-flex flex-column px-2 width-7x"><h2 class="mb-0 h4">%H</h2><span class="small text-muted">Hours</span></div><div class="d-flex flex-column px-2 width-7x"><h2 class="mb-0 h4">%M</h2><span class="small text-muted">Minutes</span></div><div class="d-flex flex-column px-2 width-7x"><h2 class="mb-0 h4">%S</h2><span class="small text-muted">Seconds</span></div>'));
    });
</script>

<!--Particles script-->
<script src="assets/vendor/node_modules/js/particles.js"></script>

</body>

</html>
