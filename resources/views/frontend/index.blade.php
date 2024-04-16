@extends('layouts.frontend')
@section('content')

    <!--begin:Hero section-->
    <section class="position-relative overflow-hidden">
        <!--:Swiper classic -->
        <div class="swiper-container swiper-classic overflow-hidden position-relative">
            <div class="swiper-wrapper">
                <!--:Slide-->
                <div class="swiper-slide" style="background-image:url('/assets/img/zgane.jpg')">
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
                                            Show your products in modern way
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
                <div class="swiper-slide" style="background-image:url('/assets/img/dogotki.jpg')">
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
                <div class="swiper-slide h-100" style="background-image:url('/assets/img/barimage.jpg')">
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


    <!--/Start:DISCOUNT PRODUCTS section-->
    @if(count($products) !== 0)
        <section class="overflow-hidden">
            <div class="container py-7 py-lg-7">
                <div class="row mb-4 align-items-center">
                    <div class="col-md-7 text-center text-md-start mb-4">
                        <div class="col-lg-7 mb-4 mb-lg-0">
                            <!--Heading-->
                            <h3 data-aos="fade-right">Производи на попуст</h3>
                        </div>
                    </div>
                    <div class="col-md-5 mb-4">
                        <div class="text-center text-md-end" data-aos="fade-right" data-aos-delay="150">
                            <a href="{{URL::to('/products/?discount[]=checked')}}"
                               class="btn btn-outline-secondary btn-hover-arrow hover-lift">
                                <span>Погледни ги сите</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="swiper-featured swiper-container position-relative overflow-visible">
                    <div class="swiper-wrapper">
                        <!--Slide product-->
                        @foreach($products as $product)
                            <div class="swiper-slide">
                                <!--Card-product-->
                                <div class="card overflow-hidden hover-lift card-product">
                                    <a href="{{ route('frontend.product', $product->slug) }}">
                                        @foreach($product->pictures as $key=>$value)
                                            @if($key === 0)
                                                <div class="card-product-header p-3 d-block overflow-hidden"
                                                     style="height: 350px;background-image: url('/images/products/{{$product->name}}/{{ $value['image']}}');background-position: center; background-size: contain; background-repeat: no-repeat">
                                                    @endif
                                                    @endforeach
                                                    <span
                                                        class="badge rounded-pill bg-danger position-absolute start-0 top-0 mt-4 ms-4">-{{ $product->discount }}%</span>
                                                </div>
                                    </a>
                                    <div class="card-product-body p-3 pt-0 text-center">
                                        <a href="{{ route('frontend.product', $product->slug) }}"
                                           class="h5 d-block position-relative mb-2 text-dark">{{ $product->name }}</a>
                                        <div class="card-product-body-overlay">
                                            <!--Price-->
                                            <span class="card-product-price">
                                            <span style="color: red">{{ $product->discounted_price }} ден.</span> <del>{{ $product->price }} ден.</del>
                                        </span>
                                            <!--Action-->
                                            <span class="card-product-view-btn">
                                            <a href="{{ route('frontend.product', $product->slug) }}"
                                               class="link-underline mb-1 fw-semibold text-dark">Погледни</a>
                                        </span>
                                        </div>
                                    </div>
                                </div>
                                <!--/Card product end-->
                            </div>
                        @endforeach
                    </div>
                    <!--Pagination-->
                    <div class="swiperFeatured-pagination swiper-pagination position-static pt-5"></div>
                </div>
            </div>
        </section>
    @endif
    <!--/End:DISCOUNT PRODUCTS section-->

    <!--begin:Partners section-->
    <section class="position-relative">
        <div class="container py-9 py-lg-11 position-relative z-index-1">
            <div class="row mb-7 align-items-end justify-content-between">
                <!--begin: Section headings-->
                <div class="col-lg-7 mb-4 mb-lg-0">
                    <!--Heading-->
                    <h3 class="mb-2 display-6" data-aos="fade-left">Our brands</h3>
                </div>
                <!--end: Section headings-->
                <div class="col-12 col-lg-3 text-lg-end" data-aos="fade-left" data-aos-delay="150">
                    <!--begin: button-->
                    <a href="{{ route('frontend.brands') }}" class="btn btn-outline-secondary btn-hover-arrow hover-lift">
                        <span>View Brands</span>
                    </a>
                    <!--end: button-->
                </div>
            </div>


            <div class="row">
                @foreach($brands as $brand)
                    <div class="col-md-6 col-lg-3 mb-4">
                        <!--begin:Project card-->
                        <a href="{{URL::to('/e-shop/?brand[]='.$brand->id)}}" class="card-hover">
                            <div class="overflow-hidden text-center position-relative mb-4 rounded-4"
                                 style="height: 250px">
                                <img src="assets/img/brands/thumbnails/{{ $brand->image }}" alt="{{ $brand->name }}"
                                     width="80%" class="img-zoom img-fluid rounded-4"/>
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

    <!--/Start:LATEST PRODUCTS section-->
    <section class="overflow-hidden">
        <div class="container py-7 py-lg-7">
            <div class="row mb-4 align-items-center">
                <div class="col-md-7 text-center text-md-start mb-4">
                    <div class="col-lg-7 mb-4 mb-lg-0">
                        <!--Heading-->
                        <h3 data-aos="fade-left">Најнови производи</h3>
                    </div>
                </div>
                <div class="col-md-5 mb-4">
                    {{--                    <div class="text-center text-md-end" data-aos="fade-left" data-aos-delay="150">--}}
                    {{--                        <a href="{{URL::to('/products/?sort[]=latest')}}"--}}
                    {{--                           class="btn btn-outline-secondary btn-hover-arrow hover-lift">--}}
                    {{--                            <span>Погледни ги сите</span>--}}
                    {{--                        </a>--}}
                    {{--                    </div>--}}
                </div>
            </div>
            <div class="row mb-5">
                @foreach($latestProducts as $product)
                    <div class="col-md-6 col-lg-3 mb-4">
                        <!--:card-hover-expand-->
                        <div class="card overflow-hidden hover-lift card-product">
                            <a href="{{ route('frontend.product', $product->slug) }}">
                                @foreach($product->pictures as $key=>$value)
                                    @if($key === 0)
                                        <div class="card-product-header p-3 d-block overflow-hidden"
                                             style="height: 350px;background-image: url('/images/products/{{$product->name}}/{{ $value['image'] }}');background-position: center; background-size: contain; background-repeat: no-repeat">
                                            @endif
                                            @endforeach
                                            @if($product->discount)
                                                <span
                                                    class="badge rounded-pill bg-danger position-absolute start-0 top-0 mt-4 ms-4">-{{ $product->discount }}%</span>
                                            @endif
                                        </div>
                            </a>
                            <div class="card-product-body p-3 pt-0 text-center">
                                <a href="{{ route('frontend.product', $product->slug) }}"
                                   class="h5 d-block position-relative mb-2 text-dark">{{ $product->name }}</a>
                                <div class="card-product-body-overlay">
                                    <!--Price-->
                                    @if($product->discounted_price)
                                        <span class="card-product-price">
                                            <span style="color: red">{{ $product->discounted_price }}&nbsp;ден.</span> <del>{{ $product->price }}&nbsp;ден.</del>
                                        </span>
                                    @else
                                        <span class="card-product-price">
                                            <span>{{ $product->price }}&nbsp;ден.</span>
                                                </span>
                                    @endif
                                    <!--Action-->
                                    <span class="card-product-view-btn">
                                            <a href="{{ route('frontend.product', $product->slug) }}"
                                               class="link-underline mb-1 fw-semibold text-dark">Погледни</a>
                                        </span>
                                </div>
                            </div>
                        </div>
                        <!--:/card product end-->
                    </div>
                @endforeach
                <div class="text-center " data-aos="fade-up" data-aos-delay="150">
                    <a href="{{URL::to('/products/?sort[]=latest')}}"
                       class="btn btn-outline-secondary btn-hover-arrow hover-lift">
                        <span>Погледни повеќе</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!--/End:LATEST PRODUCTS section-->

    <!--begin:categories section-->
    <section class="position-relative">
        <div class="container py-9 py-lg-11 position-relative z-index-1">
            <div class="row mb-7 align-items-end justify-content-between">
                <!--begin: Section headings-->
                <div class="col-lg-7 mb-4 mb-lg-0">
                    <!--Heading-->
                    <h3 class="mb-2 display-6" data-aos="fade-right">Category</h3>
                </div>
                <!--end: Section headings-->
                <div class="col-12 col-lg-3 text-lg-end" data-aos="fade-right" data-aos-delay="150">
                        <a href="{{ route('frontend.shop') }}" class="btn btn-outline-secondary btn-hover-arrow hover-lift">
                            <span>View</span>
                        </a>
                    </div>
                </div>


            <div id="projects" data-isotope='{"layoutMode": "masonry"}' class="row">
                @foreach($categories as $category)
                    <div class="col-md-6 col-lg-4 mb-4 bootstrap grid-item">
                        <!--begin:Project card-->
                        <a href="{{URL::to('/e-shop/?category[]='.$category->id)}}" class="card-hover">
                            <div class="overflow-hidden position-relative mb-4 rounded-4" style="height: 250px">
                                <img src="assets/img/categories/originals/{{ $category->image }}" alt=""
                                     class="img-zoom img-fluid rounded-4">
                            </div>
                            <h5 class="mb-1">{{ $category->name }}</h5>
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
                                                                                                class="text-dark link-decoration">conditions</a>
                                and the <a href="#"
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

@section('scripts')
    <script>
        //Swiper Featured Products USED FOR PRODUCTS
        let swiperFeatured = new Swiper(".swiper-featured", {
            slidesPerView: 1,
            spaceBetween: 16,
            breakpoints: {
                480: {
                    slidesPerView: 1,
                    spaceBetween: 16,
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 16,
                },
                1024: {
                    slidesPerView: 4,
                    spaceBetween: 16,
                },
            },
            pagination: {
                el: ".swiperFeatured-pagination",
                clickable: true
            },

        });
    </script>
@endsection
