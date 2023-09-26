@extends('layouts.frontend')
@section('content')

    <section class="position-relative overflow-hidden">
        <div class="container-fluid">
            <div class="py-8 py-lg-5 bg-dark text-white position-relative">
                <!--background image-->
                <img src="/assets/img/shop/banners/06.jpg" class="bg-image bg-top-center opacity-75" alt="">
                <div class="row align-items-center position-relative">
                    <div class="col-lg-10 mx-auto text-center">
                        <h1 class="mb-0 display-3">Zgane Pijace
                        </h1>
                    </div>
                </div>
                <!--/.row-->
            </div>
        </div>
    </section>
    <section class="position-relative bg-white">
        <div class="container pt-7 pt-lg-6 pb-7 pb-lg-6 position-relative">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{ route('frontend.index') }}" class="text-dark">
                            <i class="bx bx-home fs-5"></i>
                        </a></li>
                    <li class="breadcrumb-item active"><a href="" class="text-dark">Trgovina</a></li>
                </ol>
            </nav>
            <div class="row justify-content-between">
                <!--Products column-->
                <div class="col-md-12 mx-auto pt-5">
                    <form action="{{ route('frontend.shop') }}" method="GET" id="filter">
                        <!--Products top bar-->
                        <div class="row mb-5 align-items-center">
                            <div class="col-5 col-md-3 mb-3 mb-md-0">
                                <a href="#shop_filters" data-bs-toggle="collapse" aria-expanded="false"
                                   class="btn btn-light btn-sm">
                                    <i class="bx bx-filter fs-5"></i> Filter
                                </a>
                            </div>
                            <div class="col-sm-5 col-md-4 ms-auto">
                                <div class="d-flex align-items-center">
                                    <span class="small text-muted">Short by</span>
                                    <div class="flex-grow-1 ps-2">
                                        <?php
                                        $checked = [];
                                        if (isset($_GET['sort'])) {
                                            $checked = $_GET['sort'];
                                        }
                                        ?>
                                        <select class="form-control form-control-sm"
                                                data-choices='{"searchEnabled":false,"itemSelectText":""}'
                                                id="product-sortBy" name="sort[]">
                                            <option @if(in_array('latest', $checked)) selected @endif value="latest"> Most recent</option>
                                            <option @if(in_array('ASC', $checked)) selected @endif value="ASC"> Price - Low to High</option>
                                            <option @if(in_array('DESC', $checked)) selected @endif value="DESC">Price - High to Low</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Filter collapse-->
                        <div class="collapse" id="shop_filters">

                            <div class="row">
                                <!--:Filter column-->
                                <div class="col-sm-6 col-xl-3">
                                    <!--:Sidebar widget card-->
                                    <div class="card p-0 mb-4 card-body">
                                        <!--:Title-->
                                        <div class="d-flex p-3 border-bottom mb-3 align-items-center">
                                            <h6 class="me-3 mb-0">Akcija!!!</h6>
                                            <div class="pt-1 flex-grow-1 bg-gray-200"></div>
                                        </div>
                                        <!--:list-->
                                        <div class="p-3 pt-0">
                                            <ul class="list-unstyled mb-0">
                                                <li class="btn-group mb-2">
                                                    <div class="d-flex flex-wrap gap-1" role="group"
                                                         aria-label="Basic radio toggle button group">
                                                        <?php
                                                        $checked = [];
                                                        if (isset($_GET['discount'])) {
                                                            $checked = $_GET['discount'];
                                                        }
                                                        ?>
                                                        <input type="checkbox" class="btn-check" id="color_red"
                                                               name="discount[]"
                                                               value="checked"
                                                               @if(in_array('checked', $checked)) checked @endif />
                                                        <label
                                                            class="shop-product-color btn p-0 border-0 me-1 width-2x height-2x flex-center rounded-circle text-white product-red"
                                                            for="color_red"></label><span>Izdelke na Akcii</span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card p-0 overflow-hidden card-body mb-4">
                                        <!--:Title-->
                                        <div class="d-flex p-3 border-bottom align-items-center">
                                            <h6 class="me-3 mb-0">Categories</h6>
                                            <div class="pt-1 flex-grow-1 bg-gray-200"></div>
                                        </div>
                                        <!--:Collapse categories-->
                                        <ul class="list-unstyled px-3 pt-3 pb-2 mb-0" data-simplebar
                                            style="max-height: 13rem;">
                                            @foreach($categories as $category)
                                                    <?php
                                                    $checked = [];
                                                    if (isset($_GET['category'])) {
                                                        $checked = $_GET['category'];
                                                    }
                                                    ?>
                                                <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                               name="category[]"
                                                               value="{{ $category->id }}"
                                                               @if(in_array($category->id, $checked)) checked @endif />
                                                        <label class="form-check-label widget-filter-item-text"
                                                               for="adidas">{{ $category->name }}</label>
                                                    </div>
                                                    <span class="fs-xs text-muted"></span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <!--:Filter column-->
                                <div class="col-sm-6 col-xl-3">
                                    <!--:Sidebar widget card-->
                                    <div class="card overflow-hidden p-0 mb-4 card-body">
                                        <!--:Title-->
                                        <div class="d-flex p-3 border-bottom align-items-center">
                                            <h6 class="me-3 mb-0">Brands</h6>
                                            <div class="pt-1 flex-grow-1 bg-gray-200"></div>
                                        </div>
                                        <!--:list-->
                                        <ul class="list-unstyled px-3 pt-3 pb-2 mb-0" data-simplebar
                                            style="max-height: 13rem;">
                                            @foreach($brands as $brand)
                                                    <?php
                                                    $checked = [];
                                                    if (isset($_GET['brand'])) {
                                                        $checked = $_GET['brand'];
                                                    }
                                                    ?>
                                                <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="brand[]"
                                                               value="{{ $brand->id }}"
                                                               @if(in_array($brand->id, $checked)) checked @endif />
                                                        <label class="form-check-label widget-filter-item-text"
                                                               for="adidas">{{ $brand->name }}</label>
                                                    </div>
                                                    <span class="fs-xs text-muted"></span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <!--:Filter column-->
                                <div class="col-sm-6 col-xl-3">
                                    <!--:Sidebar widget card-->
                                    <div class="card overflow-hidden p-0 mb-4 card-body">
                                        <!--:Title-->
                                        <div class="d-flex p-3 border-bottom align-items-center">
                                            <h6 class="me-3 mb-0">Volume</h6>
                                            <div class="pt-1 flex-grow-1 bg-gray-200"></div>
                                        </div>
                                        <!--:list-->
                                        <ul class="list-unstyled mb-0 pb-2 pt-3 px-3" data-simplebar
                                            style="max-height: 13rem;">
                                            @foreach($volumes as $volume)
                                                    <?php
                                                    $checked = [];
                                                    if (isset($_GET['volume'])) {
                                                        $checked = $_GET['volume'];
                                                    }
                                                    ?>
                                                <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="volume[]"
                                                               value="{{ $volume->id }}"
                                                               @if(in_array($volume->id, $checked)) checked @endif />
                                                        <label class="form-check-label widget-filter-item-text"
                                                               for="size-xs">{{ $volume->volume }}</label>
                                                    </div>
                                                    <span class="small text-muted"></span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <!--:Filter column-->
                                <div class="col-sm-6 col-xl-3">
                                    <!--:Sidebar widget card-->
                                    <div class="card overflow-hidden p-0 mb-4 card-body">
                                        <!--:Title-->
                                        <div class="d-flex p-3 border-bottom align-items-center">
                                            <h6 class="me-3 mb-0">Country</h6>
                                            <div class="pt-1 flex-grow-1 bg-gray-200"></div>
                                        </div>
                                        <!--:list-->
                                        <ul class="list-unstyled mb-0 pb-2 pt-3 px-3" data-simplebar
                                            style="max-height: 13rem;">
                                            @foreach($countries as $country)
                                                    <?php
                                                    $checked = [];
                                                    if (isset($_GET['country'])) {
                                                        $checked = $_GET['country'];
                                                    }
                                                    ?>
                                                <li class="widget-filter-item d-flex justify-content-between align-items-center mb-1">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="country[]"
                                                               value="{{ $country->id }}"
                                                               @if(in_array($country->id, $checked)) checked @endif />
                                                        <label class="form-check-label widget-filter-item-text"
                                                               for="size-xs">{{ $country->name }}</label>
                                                    </div>
                                                    <span class="small text-muted"></span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary me-3">Apply</button>
                                <button onClick="resetCheckbox()" class="btn btn-outline-gray-200 text-body">Clear
                                    Filters
                                </button>
                            </div>

                            <hr>
                        </div>
                    </form>
                    <div class="row mb-5">
                        @foreach($products as $product)
                            <div class="col-md-6 col-lg-3 mb-4">
                                <!--:card-hover-expand-->
                                @if(isset($product->action))
                                    <div class="card overflow-hidden hover-lift card-product">
                                        <div class="card-product-header p-3 d-block overflow-hidden"
                                             style="height: 350px">
                                            <!--Product image-->
                                            <a href="{{ route('frontend.product', $product->slug) }}">
                                                <img src="/assets/img/products/thumbnails/{{ $product->image }}"
                                                     width="100%" class="img-fluid"
                                                     alt="Product">
                                            </a>
                                            <span
                                                class="badge rounded-pill bg-danger position-absolute start-0 top-0 mt-4 ms-4">-{{ $product->discount }}%</span>
                                        </div>
                                        <div class="card-product-body p-3 pt-0 text-center">
                                            <a href="{{ route('frontend.product', $product->slug) }}"
                                               class="h5 d-block position-relative mb-2 text-dark">{{ $product->title }}</a>
                                            <div class="card-product-body-overlay">
                                                <!--Price-->
                                                <span class="card-product-price">
                                            <span style="color: red">€&nbsp;{{ $product->action }}</span> <del>€&nbsp;{{ $product->price }}</del>
                                        </span>
                                                <!--Action-->
                                                <span class="card-product-view-btn">
                                            <a href="{{ route('frontend.product', $product->slug) }}"
                                               class="link-underline mb-1 fw-semibold text-dark">View
                                                Details</a>
                                        </span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--:/card product end-->
                                @else
                                    <div class="card overflow-hidden hover-lift card-product">
                                        <div class="card-product-header p-3 d-block overflow-hidden"
                                             style="height: 350px">
                                            <!--Product image-->
                                            <a href="{{ route('frontend.product', $product->slug) }}">
                                                <img src="/assets/img/products/thumbnails/{{ $product->image }}"
                                                     width="100%" class="img-fluid"
                                                     alt="Product">
                                            </a>
                                        </div>
                                        <div class="card-product-body p-3 pt-0 text-center">
                                            <a href="{{ route('frontend.product', $product->slug) }}"
                                               class="h5 d-block position-relative mb-2 text-dark">{{ $product->title }}</a>
                                            <div class="card-product-body-overlay">
                                                <!--Price-->
                                                <span class="card-product-price">
                                            <span>€&nbsp;{{ $product->price }}</span>
                                                </span>
                                                <!--Action-->
                                                <span class="card-product-view-btn">
                                            <a href="{{ route('frontend.product', $product->slug) }}"
                                               class="link-underline mb-1 fw-semibold text-dark">View
                                                Details</a>
                                        </span>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                    <div class="d-grid d-sm-flex justify-content-sm-center">
                        <div class="col-md-12 text-center">
                            {{ $products->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
