@extends('layouts.frontend')
@section('content')
    <section class="position-relative">
        <div class="container-fluid position-relative z-index-1">
            <div class="position-relative rounded-4 overflow-hidden bg-dark">
                <!-- Slider main container -->
                <div
                    class="swiper-main rounded-4 overflow-hidden opacity-50 position-absolute start-0 top-0 w-100 h-100 mb-0">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper rounded-5">
                        <!-- Slides -->
                        <div class="swiper-slide bg-cover bg-center bg-no-repeat"
                             style="background-image: url(/images/cover_images/bar-cover.webp);"></div>
                    </div>
                </div>
                <div
                    class="position-relative text-white w-md-75 px-4 w-lg-60 mx-auto text-center z-index-1 py-12 py-lg-15">
                    <!--Hero title-->
                    <h1 class="display-1 mb-3 mb-md-4 position-relative">Производи
                    </h1>
                </div>
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
                        </div>
                        <div class="row">
                            <div class="col-sm-5 col-md-4">
                                <div class="d-flex align-items-center">
                                    <span class="small text-muted">Подреди</span>
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
                                            <option @if(in_array('normal', $checked)) selected
                                                    @endif value="normal"> Одбери
                                            </option>
                                            <option @if(in_array('latest', $checked)) selected
                                                    @endif value="latest"> Најнови
                                            </option>
                                            <option @if(in_array('asc', $checked)) selected @endif value="asc">Цена
                                                - ниска кон висока
                                            </option>
                                            <option @if(in_array('desc', $checked)) selected @endif value="desc">
                                                Цена - висока кон ниска
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-5 col-md-2 ms-auto">
                                <div class="d-flex align-items-center pb-2">
                                    <span class="small text-muted">Прикажи</span>
                                    <div class="flex-grow-0 ps-2">
                                        <?php
                                        $checked = [];
                                        if (isset($_GET['per_page'])) {
                                            $checked = $_GET['per_page'];
                                        }
                                        ?>
                                        <select class="form-control form-control-sm"
                                                data-choices='{"searchEnabled":false,"itemSelectText":""}'
                                                id="product-sortBy" name="per_page[]">
                                            <option @if(in_array('12', $checked)) selected
                                                    @endif value="12"> 12
                                            </option>
                                            <option @if(in_array('24', $checked)) selected
                                                    @endif value="24"> 24
                                            </option>
                                            <option @if(in_array('36', $checked)) selected @endif value="36">36
                                            </option>
                                            <option @if(in_array('50', $checked)) selected @endif value="50">50
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <!--Filter collapse-->
                        <div class="collapse" id="shop_filters">
                            <br>
                            <div class="row">
                                <!--:Filter column-->
                                <div class="col-sm-6 col-xl-2">
                                    <!--:Sidebar widget card-->
                                    <div class="card p-0 mb-4 card-body">
                                        <!--:Title-->
                                        <div class="d-flex p-3 border-bottom mb-3 align-items-center">
                                            <h6 class="me-3 mb-0">Акција</h6>
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
                                                        <input type="checkbox" class="btn-check" id="discount"
                                                               name="discount[]"
                                                               value="checked"
                                                               @if(in_array('checked', $checked)) checked @endif />
                                                        <label
                                                            class="shop-product-color btn p-0 border-0 me-1 width-2x height-2x flex-center rounded-circle text-white product-brown"
                                                            for="discount"></label><span> Попуст</span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xl-2">
                                    <div class="card p-0 overflow-hidden card-body mb-4">
                                        <!--:Title-->
                                        <div class="d-flex p-3 border-bottom align-items-center">
                                            <h6 class="me-3 mb-0">Категорија</h6>
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
                                <div class="col-sm-6 col-xl-2">
                                    <!--:Sidebar widget card-->
                                    <div class="card overflow-hidden p-0 mb-4 card-body">
                                        <!--:Title-->
                                        <div class="d-flex p-3 border-bottom align-items-center">
                                            <h6 class="me-3 mb-0">Бренд</h6>
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
                                                        <input class="form-check-input" type="checkbox"
                                                               name="brand[]"
                                                               value="{{ $brand->id }}"
                                                               @if(in_array($brand->id, $checked)) checked @endif />
                                                        <label class="form-check-label widget-filter-item-text"
                                                               for="subcategory">{{ $brand->name }}</label>
                                                    </div>
                                                    <span class="fs-xs text-muted"></span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <!--:Filter column-->
                                <div class="col-sm-6 col-xl-2">
                                    <!--:Sidebar widget card-->
                                    <div class="card overflow-hidden p-0 mb-4 card-body">
                                        <!--:Title-->
                                        <div class="d-flex p-3 border-bottom align-items-center">
                                            <h6 class="me-3 mb-0">Држава</h6>
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
                                <div class="col-sm-6 col-xl-2">
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
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-spiller btn-sm me-3">Примени</button>
                                <button onClick="resetCheckbox()" class="btn btn-outline-gray-200 btn-sm text-body">
                                    Избриши ги
                                    филтрите
                                </button>
                            </div>
                            <hr>
                        </div>
                    </form>
                    <div class="row mb-5">
                        @foreach($products as $product)
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
