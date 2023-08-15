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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,400&family=Source+Serif+Pro:ital@0;1&display=swap" rel="stylesheet">

    <!-- Main CSS -->
    <link href="/assets/css/theme.min.css" rel="stylesheet">

    <title>Assan 4</title>
</head>

<body class="bg-shade-primary text-white" style="background-image: url('/assets/img/zgane.jpg')">

<!--Particles-js-->
<div class="position-fixed start-0 top-0 bottom-0 end-0 z-index-fixed pe-none w-100 h-100 start-0 top-0" id="particles-js"></div>
<!--Preloader Spinner-->
<div class="spinner-loader bg-gradient-secondary text-white">
    <div class="spinner-border text-primary" role="status">
    </div>
    <span class="small d-block ms-2">Loading...</span>
</div>
<!--Header Start-->

<main class="main-content d-grid" id="main-content">
    <section class="position-relative">
        <div class="container pt-3 pb-9">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center position-relative">
                    <img src=""
                         class="img-fluid d-block mx-auto w-lg-50 w-md-75" alt="">
                    <h5 class="mb-4 text-uppercase">
                        We are
                    </h5>
                    <h1 class="mb-5 display-1 font-serif fst-italic ls-4 lh-1">Coming
                        soon</h1>
                    <div class="mb-5 position-relative z-index-1">
                        <div class="d-flex flex-wrap justify-content-center align-items-center countdown-timer">
                        </div>
                    </div>
                    <form class="w-lg-75 mx-auto needs-validation" novalidate>
                        <div class="d-md-flex w-100 align-items-stretch rounded-3">
                            <div class="flex-shrink-0 flex-grow-1">
                                <input type="email" placeholder="Enter your email" id="soon-newsletter-email"
                                       required
                                       class="form-control text-white form-control-lg shadow-none bg-transparent mb-3 mb-md-0">
                                <div id="soon-newsletter-email"
                                     class="invalid-feedback ps-3 mb-3 text-start mb-md-0">
                                    Invalid email
                                </div>
                            </div>
                            <div class="d-grid d-md-block ms-md-2">
                                <button class="btn btn-white btn-lg" type="submit">
                                    Notify me
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
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
