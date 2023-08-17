@extends('layouts.frontend')
@section('content')

    <section class="position-relative bg-white">
        <div class="container pt-8 pt-lg-5 pb-8 pb-lg-9 position-relative">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{ route('frontend.index') }}" class="text-dark">
                            <i class="bx bx-home fs-5"></i>
                        </a></li>
                    <li class="breadcrumb-item"><a href="" class="text-dark">Products</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $product->title }}</li>
                </ol>
            </nav>
            <div class="row justify-content-between">
                <div class="col-xl-6 col-lg-7 col-md-8 mx-auto mx-lg-0 mb-5 mb-lg-0">
                    <div class="row g-1 justify-content-center">
                        <div class="col-2">
                            <!--Thumbnails for main slider(just above)-->
                            <div class="swiper-container swiper-thumbnails overflow-hidden">
                                <!-- Additional required wrapper -->
                                <div class="swiper-wrapper d-flex flex-column">
                                    <!-- Slides -->
                                    <div class="swiper-slide w-100">
                                        <img src="/assets/img/products/thumbnails/{{ $product->image }}" alt=""
                                             class="w-100 rounded-0 h-auto">
                                    </div>
                                    <!-- Slides -->
                                </div>
                            </div>
                        </div>
                        <div class="col-10">
                            <!--Thumbnails main slider-->
                            <div class="swiper-container overflow-hidden position-relative swiper-thumbnails-main">
                                <!-- Additional required wrapper -->
                                <div class="swiper-wrapper">
                                    <!-- Slides -->
                                    <div class="swiper-slide">
                                        <img src="/assets/img/products/originals/{{ $product->image }}" alt=""
                                             class="img-fluid">
                                    </div>
                                    <!-- Slides -->
                                </div>
                                <!-- Swiper Navigation buttons (Remove it if you have to) -->
                                <div class="swiper-button-prev swiperThumb-prev text-white bg-dark">
                                </div>
                                <div class="swiper-button-next  swiperThumb-next text-white bg-dark">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!--/.col-->
                <div class="col-md-8 mx-auto col-lg-5 ms-xl-auto">
                    <form action="{{ route('add.to.cart')}}" method="POST" class="clearfix"
                          enctype="multipart/form-data">
                        @csrf
                        <!-- Product Description -->
                        <div class="mb-3 pb-3 border-bottom">
                            <div class="mb-3">
                                <h2 class="mb-4 display-4">{{ $product->title }}</h2>
                                <h5 class="mb-4 text-muted display-9">{{ $product->brand->name }}
                                    /{{ $product->category->name }}</h5>
                                <div class="d-flex justify-content-between align-items-center">
                                    @if(isset($product->action))
                                        <div>
                                            <p class="fs-5 mb-0"
                                               style="color: red">€&nbsp;{{ number_format($product->action, 2) }}
                                                <del class="text-muted">€&nbsp;{{ number_format($product->price, 2) }}
                                                    &nbsp;€
                                                </del>
                                            </p>
                                        </div>
                                    @else
                                        <div>
                                            <p class="fs-5 mb-0">€&nbsp;{{ number_format($product->price, 2) }} </p>
                                        </div>
                                    @endif
                                    <div>
                                        <a href="{{ route('frontend.addToWishlist', $product->id ) }}"
                                           class="fw-semibold small"><i
                                                class="bx bx-heart align-middle me-2"></i>Add
                                            to Wishlist</a>
                                    </div>
                                </div>
                            </div>
                            <p class="mb-4">
                                {!! $product->description !!}
                            </p>
                        </div>
                        <div class="mb-3 pb-3 border-bottom">
                            <h6 class="mb-3">Quantity</h6>
                            <div class="width-5x position-relative">
                                <select class="form-control form-control-sm" name="quantity"
                                        data-choices='{"searchEnabled":false,"itemSelectText":""}'>
                                    <option value="1" selected>1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 pb-3 border-bottom">
                            <strong class="text-muted d-flex align-items-center small">
                                <svg class="me-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg" width="12"
                                     height="12"
                                     viewBox="0 0 8 8">
                                    <path
                                        d="M2 0v1h1v.03c-1.7.24-3 1.71-3 3.47 0 1.93 1.57 3.5 3.5 3.5s3.5-1.57 3.5-3.5c0-.45-.1-.87-.25-1.25l-.91.38c.11.29.16.57.16.88 0 1.39-1.11 2.5-2.5 2.5s-2.5-1.11-2.5-2.5 1.11-2.5 2.5-2.5c.3 0 .59.05.88.16l.34-.94c-.23-.08-.47-.12-.72-.16v-.06h1v-1h-3zm5 1.16s-3.65 2.81-3.84 3c-.19.2-.19.49 0 .69.19.2.49.2.69 0 .2-.2 3.16-3.69 3.16-3.69z">
                                    </path>
                                </svg>
                                In Stock &amp; ready to ship</strong>
                        </div>
                        <div class="mb-3 pb-3 border-bottom d-flex align-items-center">
                            <i class="bx bxs-truck fs-5 me-1 text-success"></i>
                            <h6 class="mb-0 ms-3">This item ships free *</h6>
                        </div>
                        <div class="d-grid">
                            <input type="hidden" value="{{ $product->id }}" name="id">
                            <input type="hidden" value="{{ $product->title }}" name="title">
                            <input type="hidden" value="{{ $product->brand->name }}" name="brand">
                            @if(isset($product->action))
                                <input type="hidden" value="{{ $product->action }}" name="price">
                            @else
                                <input type="hidden" value="{{ $product->price }}" name="price">
                            @endif
                            <input type="hidden" value="{{ $product->image }}" name="image">
                            <button type="submit" class="btn btn-primary hover-lift">
                                <i class="bx bx-shopping-bag fs-5 me-2"></i>
                                Add to Cart
                            </button>
                        </div>
                        <!--/.cart-action-->
                    </form>
                </div>
                <!--/.col-->
            </div>
        </div>
    </section>
    <section class="bg-light">
        <div class="container py-9 py-lg-11">
            <div class="row justify-content-center">
                <div class="col-lg-9 mb-5">
                    <nav class="nav nav-tabs">
                        <a href="#description" class="nav-link active" data-bs-toggle="tab" aria-haspopup="false"
                           aria-expanded="true">
                            Description
                        </a>
                        <!--
                        <a href="#information" class="nav-link" data-bs-toggle="tab" aria-haspopup="false"
                           aria-expanded="false">
                            Information
                        </a>
                        -->
                        <a href="#reviews" class="nav-link" data-bs-toggle="tab" aria-haspopup="false"
                           aria-expanded="false">
                            Reviews
                        </a>
                    </nav>
                </div>
                <!--/.col-->
                <div class="col-lg-9 col-md-8">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="description">
                            <h5>{{ $product->title }}</h5>
                            <h6 class="text-muted">{{ $product->brand->name }}</h6>
                            <p class="mb-5">
                                {!! $product->description !!}
                            </p>
                        </div>
                        <div class="tab-pane fade" id="reviews">
                            <div
                                class="bg-gradient-secondary text-white d-flex justify-content-between align-items-center p-3 mb-5">
                                <div>
                                    <h5 class="mb-4 mb-lg-5">Latest Reviews</h5>
                                    <small class="text-muted">( {{ $comments->count() }} - Reviews)</small>
                                </div>
                                <div>
                                    <a href="#" data-bs-target="#review-collapse" data-bs-toggle="collapse"
                                       aria-expanded="false"
                                       aria-haspopup="false" class="h6 collapse-link mb-0 link-underline">
                                        <i class="bx bx-plus-fill align-middle me-1"></i>Add Review</a>
                                </div>
                            </div>
                            <!--Review-item-->
                            <div class="pt-3">
                                <div class="d-flex justify-content-end mb-3">
                                </div>
                                <div class="collapse" id="review-collapse">
                                    <div class="card card-body p-4">
                                        <form class="needs-validation" method="post" action="{{route('comment.save')}}">
                                            @csrf
                                            <div class="row">
                                                <div class="col-12 col-sm-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="name">Name</label>
                                                        <input type="text" required id="name"
                                                               class="form-control" name="name"
                                                               required>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6" hidden>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="subject">Subject
                                                        </label>
                                                        <input type="text" required class="form-control"
                                                               id="rating-mail" value="{{ $product->id }}"
                                                               name="subject">
                                                    </div>
                                                </div>
                                                <div class="form-group" hidden>
                                                    <label for="product_id" class="form-label"></label>
                                                    <select name="product_id" id="product_id"
                                                            class="form-control">
                                                        <option value="{{ $product->id }}"></option>
                                                    </select>
                                                </div>
                                                <div class="w-100"></div>
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Select your Rating</label>
                                                        <div>
                                                            <div class="btn-group" role="group"
                                                                 aria-label="Basic radio toggle button group">
                                                                <input type="radio" class="btn-check" value="1"
                                                                       name="rating" id="btnrating1">
                                                                <label class="btn btn-outline-warning btn-sm"
                                                                       for="btnrating1">
                                                                    <i class="bx bx-star"></i></label>

                                                                <input type="radio" class="btn-check" value="2"
                                                                       name="rating" id="btnrating2">
                                                                <label class="btn btn-outline-warning btn-sm"
                                                                       for="btnrating2">
                                                                    <i class="bx bx-star"></i>
                                                                    <i class="bx bx-star"></i></label>

                                                                <input type="radio" class="btn-check" value="3"
                                                                       name="rating" id="btnrating3">
                                                                <label class="btn btn-outline-warning btn-sm"
                                                                       for="btnrating3">
                                                                    <i class="bx bx-star"></i>
                                                                    <i class="bx bx-star"></i>
                                                                    <i class="bx bx-star"></i></label>
                                                                <input type="radio" class="btn-check" value="4"
                                                                       name="rating" id="btnrating4">
                                                                <label class="btn btn-outline-warning btn-sm"
                                                                       for="btnrating4">
                                                                    <i class="bx bx-star"></i>
                                                                    <i class="bx bx-star"></i>
                                                                    <i class="bx bx-star"></i>
                                                                    <i class="bx bx-star"></i></label>
                                                                <input type="radio" class="btn-check" value="5"
                                                                       name="rating" id="btnrating5" checked>
                                                                <label class="btn btn-outline-warning btn-sm"
                                                                       for="btnrating5">
                                                                    <i class="bx bx-star"></i>
                                                                    <i class="bx bx-star"></i>
                                                                    <i class="bx bx-star"></i>
                                                                    <i class="bx bx-star"></i>
                                                                    <i class="bx bx-star"></i></label>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="w-100"></div>
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="rating-message">Review
                                                            Message <small>(Optional)</small></label>
                                                        <textarea class="form-control" id="rating-message" rows="8"
                                                                  name="message" required></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-end">
                                                <button type="submit" class="btn btn-primary hover-translate-3d">
                                                    Submit review
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <br>
                            @foreach($comments as $comment)
                                <!--Review-item-->
                                <div class="d-flex mb-4">
                                    <div class="media-body">
                      <span class="text-warning small d-block mb-2">
                          @if($comment->rating === 1)
                              <i class="bx bx-star"></i>
                          @elseif($comment->rating === 2)
                              <i class="bx bx-star"></i><i class="bx bx-star"></i>
                          @elseif($comment->rating === 3)
                              <i class="bx bx-star"></i><i class="bx bx-star"></i><i class="bx bx-star"></i>
                          @elseif($comment->rating === 4)
                              <i class="bx bx-star"></i><i class="bx bx-star"></i><i class="bx bx-star"></i><i
                                  class="bx bx-star"></i>
                          @elseif($comment->rating === 5)
                              <i class="bx bx-star"></i><i class="bx bx-star"></i><i class="bx bx-star"></i><i
                                  class="bx bx-star"></i><i class="bx bx-star"></i>
                          @endif
                      </span>
                                        <p class="mb-2">
                                            {{ $comment->message }}
                                        </p>
                                        <div
                                            class="d-flex border-bottom pb-4 justify-content-between align-items-center">
                                            <h6 class="mb-0">{{ $comment->name }}</h6>
                                            <small
                                                class="text-muted">&nbsp;&nbsp;&nbsp;{{ $comment->created_at->diffForHumans() }}</small>
                                        </div>
                                    </div>
                                </div>
                                <!--End Review-item-->
                            @endforeach
                            <div class="d-grid d-sm-flex justify-content-sm-center">
                                <div class="col-md-12 text-center">
                                    {{ $comments->links() }}
                                </div>
                            </div>

                        </div>
                        <!--Tab-pane-->
                    </div>
                    <!--Tab-pane-->
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white position-relative overflow-hidden">
        <div class="container py-9 py-lg-11 position-relative">
            <div class="row align-items-center">
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
@endsection
