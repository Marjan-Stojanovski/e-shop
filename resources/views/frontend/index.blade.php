@extends('layouts.frontend')
@section('content')

        <!--begin:Hero section-->
        <section class="position-relative overflow-hidden">
            <!--:Swiper classic -->
            <div class="swiper-container swiper-classic overflow-hidden position-relative">
                <div class="swiper-wrapper">
                    <!--:Slide-->
                    <div class="swiper-slide" style="background-image:url('assets/img/shop/banners/03.jpg')">
                        <div class="bg-dark position-absolute start-0 top-0 w-100 h-100 opacity-25"></div>
                        <!--:container-->
                        <div class="container h-100 text-white position-relative z-index-1">
                            <div class="row d-flex align-items-center h-100">
                                <div class="col-xl-10 mx-auto text-center">
                                    <!--:slider layers-->
                                    <ul class="list-unstyled mb-0">
                                        <li>
                                            <h2 class="display-1 mb-3">
                                                Mens Collection
                                            </h2>
                                        </li>
                                        <li>
                                            <p class="lead mb-4 mb-lg-5">
                                                Show your prducts in modern way
                                            </p>
                                        </li>
                                        <li>
                                            <a href="#" class="btn btn-white btn-lg btn-hover-text mb-2 me-2">
                                                <span class="btn-hover-label label-default">View Collection</span>
                                                <span class="btn-hover-label label-hover">View Collection</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--:Slide-->
                    <div class="swiper-slide" style="background-image:url('assets/img/shop/banners/06.jpg')">
                        <div class="bg-dark position-absolute start-0 top-0 w-100 h-100 opacity-25"></div>
                        <!--:container-->
                        <div class="container h-100 text-white position-relative z-index-1">
                            <div class="row d-flex align-items-center h-100">
                                <div class="col-xl-10 mx-auto text-center">
                                    <!--:slider layers-->
                                    <ul class="list-unstyled mb-0">
                                        <li>
                                            <h2 class="display-1 mb-3">
                                                Womens Shop
                                            </h2>
                                        </li>
                                        <li>
                                            <p class="lead mb-4 mb-lg-5">
                                                Show your prducts in modern way
                                            </p>
                                        </li>
                                        <li>
                                            <a href="#" class="btn btn-white btn-lg btn-hover-text mb-2 me-2">
                                                <span class="btn-hover-label label-default">Shop now</span>
                                                <span class="btn-hover-label label-hover">shop now</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--:Slide-->
                    <div class="swiper-slide h-100" style="background-image:url('assets/img/shop/banners/07.jpg')">
                        <div class="bg-dark position-absolute start-0 top-0 w-100 h-100 opacity-25"></div>
                        <!--:container-->
                        <div class="container h-100 text-white position-relative z-index-1">
                            <div class="row d-flex align-items-center h-100">
                                <div class="col-xl-10 mx-auto text-center">
                                    <!--:slider layers-->
                                    <ul class="list-unstyled mb-0">
                                        <li>
                                            <h2 class="display-1 mb-3">
                                                Urban Outfit
                                            </h2>
                                        </li>
                                        <li>
                                            <p class="lead mb-4 mb-lg-5">
                                                Show your prducts in modern way
                                            </p>
                                        </li>
                                        <li>
                                            <a href="#" class="btn btn-white btn-lg btn-hover-text mb-2 me-2">
                                                <span class="btn-hover-label label-default">Shop now</span>
                                                <span class="btn-hover-label label-hover">shop now</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--:Add Pagination -->
                <div class="swiper-pagination swiperClassic-pagination mb-2 mb-lg-7 z-index-1 text-white"></div>

            </div>
        </section>
        <!--/end:Hero section-->


        <!--begin:featured products-->
        <section class="overflow-hidden">
            <div class="container py-9 py-lg-11">
                <div class="row mb-2 align-items-center">
                    <div class="col-md-7 mb-4">
                        <h2 class="mb-0 display-5">
                            Discounted Products
                        </h2>
                    </div>
                    <div class="col-md-5 mb-4">
                        <div class="text-center text-md-end">
                            <a href="#" class="btn btn-dark btn-lg btn-hover-text mb-2 me-2">
                                <span class="btn-hover-label label-default">View all products</span>
                                <span class="btn-hover-label label-hover">View all products</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach($products as $product)
                    <div class="col-md-6 col-lg-3 mb-4">
                        <!--Card-product-->
                        <div class="card overflow-hidden hover-lift card-product">
                            <div class="card-product-header p-3 d-block overflow-hidden" style="height: 350px">
                                <!--Product image-->
                                <a href="{{ route('frontend.productView', $product->slug) }}">
                                    <img src="assets/img/products/thumbnails/{{ $product->image }}" width="100%" class="img-fluid"
                                         alt="Product">
                                </a>
                                <span class="badge rounded-pill bg-danger position-absolute start-0 top-0 mt-4 ms-4">-{{ $product->discount }}%</span>
                            </div>
                            <div class="card-product-body p-3 pt-0 text-center">
                                <a href="{{ route('frontend.productView', $product->slug) }}" class="h5 d-block position-relative mb-2 text-dark">{{ $product->title }}</a>
                                <div class="card-product-body-overlay">
                                    <!--Price-->
                                    <span class="card-product-price">
                                            <span style="color: red">${{ $product->action }}</span> <del>${{ $product->price }}</del>
                                        </span>
                                    <!--Action-->
                                    <span class="card-product-view-btn">
                                            <a href="{{ route('frontend.productView', $product->slug) }}" class="link-underline mb-1 fw-semibold text-dark">View
                                                Details</a>
                                        </span>
                                </div>
                            </div>
                        </div>
                        <!--/Card product end-->
                    </div>
                    @endforeach
                </div>

            </div>
        </section>
        <!--/end:featured products-->


        <!--begin:Partners section-->

        <section class="position-relative">
            <div class="container py-9 py-lg-11 position-relative z-index-1">
                <div class="row mb-2 align-items-center">
                    <div class="col-md-7 mb-4">
                        <h2 class="mb-0 display-5">
                            <span class="text-gradient">Brands</span>
                        </h2>
                    </div>
                    <div class="col-md-5 mb-4">
                        <div class="text-center text-md-end">
                            <a href="#" class="btn btn-dark btn-lg btn-hover-text mb-2 me-2">
                                <span class="btn-hover-label label-default">View all brands</span>
                                <span class="btn-hover-label label-hover">View all brands</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="row">
                    @foreach($brands as $brand)
                        <div class="col-md-6 col-lg-3 mb-4"  >
                            <!--begin:Project card-->
                            <a href="#!" class="card-hover">
                                <div class="overflow-hidden text-center position-relative mb-4 rounded-4" style="height: 250px">
                                    <img src="assets/img/brands/thumbnails/{{ $brand->image }}" alt="{{ $brand->name }}" width="100%" class="img-zoom img-fluid rounded-4" />
                                </div>
                                <h5 class="mb-1 text-center">{{ $brand->name }}</h5>
                                <p class="text-center">
                                <span class="text-muted text-center">{{ $brand->country->name }}</span>
                                    </p>
                            </a>
                            <!--end:Project card-->
                        </div>
                    @endforeach
                </div>

            </div>
        </section>

        <!--/end:Partners section-->


        <!--begin:categories section-->
        <section class="position-relative">
            <div class="container py-9 py-lg-11 position-relative z-index-1">
                <div class="row mb-2 align-items-center">
                    <div class="col-md-7 mb-4">
                        <h2 class="mb-0 display-5">
                            Vrsta <span class="text-gradient">Pijace</span>
                        </h2>
                    </div>
                    <div class="col-md-5 mb-4">
                        <div class="text-center text-md-end">
                            <a href="#" class="btn btn-dark btn-lg btn-hover-text mb-2 me-2">
                                <span class="btn-hover-label label-default">Explore</span>
                                <span class="btn-hover-label label-hover">Explore</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div id="projects" data-isotope='{"layoutMode": "masonry"}' class="row">
                    @foreach($categories as $category)
                    <div class="col-md-6 col-lg-4 mb-4 bootstrap grid-item">
                        <!--begin:Project card-->
                        <a href="#!" class="card-hover">
                            <div class="overflow-hidden position-relative mb-4 rounded-4">
                                <img src="assets/img/categories/originals/{{ $category->image }}" alt="" class="img-zoom img-fluid rounded-4">
                            </div>
                            <h5 class="mb-1">{{ $category->name }}</h5>
                            <span class="text-muted">UI / UX</span>
                        </a>
                        <!--end:Project card-->
                    </div>
                    @endforeach
                </div>

            </div>
        </section>
        <!--end:categories section-->




        <!--begin:Newsletter-->
        <section class="position-relative">
            <div class="container py-9 py-lg-11">
                <div class="row justify-content-between">

                    <!--Nesletter col-->
                    <div class="col-lg-10 col-xl-9 mx-auto">
                        <h2 class="mb-5 display-6 text-center">
                            Don't Miss Any News!
                        </h2>
                        <form class="needs-validation w-lg-75 mx-auto" novalidate>
                            <div class="row g-md-1 mb-4">
                                <div class="col-md mb-2 mb-md-0">
                                    <input type="email" class="form-control form-control-lg" required
                                           placeholder="Your email address">
                                    <div class="invalid-feedback">
                                        Please enter a valid email address.
                                    </div>
                                </div>
                                <div class="col-md-auto col-12">
                                    <button type="submit" class="btn btn-lg btn-hover-text btn-secondary w-100">
                                        <span class="btn-hover-label label-default"> Subscribe</span>
                                        <span class="btn-hover-label label-hover"> Subscribe</span>
                                    </button>
                                </div>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" required id="newsletterCheck">
                                <label class="form-label small text-secondary" for="newsletterCheck">I accept the <a
                                        href="#" class="text-dark link-decoration">Terms</a> and <a href="#"
                                                                                                    class="text-dark link-decoration">conditions</a> and the <a href="#"
                                                                                                                                                                class="text-dark link-decoration">data protection guidelines.</a></label>

                                <div class="invalid-feedback">
                                    You must agree before subscribe.
                                </div>
                            </div>
                        </form>
                    </div>
                    <!--End col-->
                </div>
            </div>
        </section>
        <!--/end:Newsletter-->

        <!--begin:Features section-->
        <section class="bg-white position-relative overflow-hidden">
            <div class="container pt-2 pt-lg-6 pb-2 pb-lg-6 position-relative">
                <div class="row align-items-baseline">
                    <div class="col-md-4 border-end-md border-light text-center mb-7 mb-md-0">
                        <div class="mb-3">
                            <i class="bx bx-store fs-1"></i>
                        </div>
                        <h6 class="mb-0">30 Day Returns</h6>
                    </div>
                    <div class="col-md-4 border-end-md border-light text-center mb-7 mb-md-0">
                        <div class="mb-3">
                            <i class="bx bx-purchase-tag fs-1"></i>
                        </div>
                        <h6 class="mb-0">100% Handpicked</h6>
                    </div>
                    <div class="col-md-4 text-center">
                        <div class="mb-3">
                            <i class="bx bx-package fs-1"></i>
                        </div>
                        <h6 class="mb-0">Assured Quality</h6>
                    </div>
                </div>
            </div>
        </section>
        <!--/end:Features section-->


@endsection
