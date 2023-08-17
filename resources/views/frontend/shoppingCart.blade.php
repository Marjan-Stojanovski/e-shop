@extends('layouts.frontend')
@section('content')

    <section class="position-relative overflow-hidden">
        <div class="container-fluid">
            <div class="py-8 py-lg-5 bg-dark text-white position-relative">
                <!--background image-->
                <img src="/assets/img/shop/banners/06.jpg" class="bg-image bg-top-center opacity-75" alt="">
                <div class="row align-items-center position-relative">
                    <div class="col-lg-10 mx-auto text-center">
                        <h2 class="mb-0">Shopping Cart
                        </h2>
                    </div>
                </div>
                <!--/.row-->
            </div>
        </div>
    </section>
    <section class="position-relative bg-white">
        <div class="container pt-6 pt-lg-6 pb-6 pb-lg-6 position-relative">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{ route('frontend.index') }}" class="text-dark">
                            <i class="bx bx-home fs-5"></i>
                        </a></li>
                    <li class="breadcrumb-item active"><a href="" class="text-dark">Shopping Cart</a></li>
                </ol>
            </nav>
        </div>
    </section>

    <section class="position-relative">
        <div class="container position-relative">
            <div class="">
                <!--Profile info header-->
                <div class="position-relative pt-7 pb-9 pb-lg-11">
                    <div class="row">
                            <!--Cart table start-->
                            <div class="table-responsive">
                                <table class="table table-striped align-middle">
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th class="small text-muted">
                                            <div style="min-width:180px">Product</div>
                                        </th>
                                        <th class="small text-center text-muted">Unit Price</th>
                                        <th class="small text-center text-muted">Quantity</th>
                                        <th class="small text-center text-muted">Subtotal</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $subTotal = 0;
                                    ?>
                                    @foreach($carts as $cart)
                                        <tr>
                                            <td>
                                                <img src="/assets/img/products/thumbnails/{{$cart['image']}}"
                                                     class="img-fluid width-5x h-auto" alt="">
                                            </td>
                                            <td class="text-start">
                                                <a href="{{ route('frontend.product', $cart['slug'])}}"
                                                   class="text-inherit">
                                                    {{$cart['name']}}
                                                </a>
                                            </td>
                                            <td class="text-center">€ {{$cart['unitPrice']}}</td>
                                            <td class="text-center">
                                                {{$cart['quantity']}} pcs
                                            </td>
                                            <td class="text-center">
                                                € {{ number_format($cart['productAmount'], 2) }}</td>
                                            <td class="text-center">
                                                <form action="{{route('delete.cart', $cart['product_id'])}}"
                                                      method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn-close text-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" height="16"
                                                             viewBox="0 0 24 24" width="20" fill="currentColor">
                                                            <path
                                                                d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12 19 6.41z"/>
                                                        </svg>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                            <?php
                                            $productAmount = $cart['productAmount'];
                                            $subTotal += $productAmount;
                                            ?>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <!--Update cart button-->
                            <div class="text-center d-md-flex align-items-center border-bottom pb-4 mb-4">
                                <div class="col-md-7 mb-4 mb-md-0">
                                    <div class="d-grid d-sm-flex flex-grow-1 align-items-center">
                                        <input type="text" class="form-control mb-2 mb-sm-0 me-sm-2"
                                               placeholder="Coupon code" name="">
                                        <button type="button" class="btn btn-secondary flex-shrink-0">
                                            <i class="bx bx-tag align-middle"></i> Apply Coupon
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-5 text-end">
                                    <div class="d-flex flex-column h-100 justify-content-end">
                                        <strong class="text-muted d-block mb-2 fs-6">Cart total</strong>
                                        <h5 class="mb-0 ms-3 h2">€ {{ number_format($subTotal, 2) }}</h5>
                                    </div>
                                </div>
                            </div>
                            <!--Cart checkout-->
                            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-center">
                                <div class="mb-3 mb-sm-0">
                                    <a href="{{ route('frontend.shop') }}" class="link-hover-underline text-body"><i
                                            class="bx bx-left-arrow-alt fs-6 align-middle me-1"></i>Continue shopping
                                    </a>
                                </div>
                                <div>
                                    <a href="{{ route('frontend.checkout') }}" class="btn btn-primary">proceed to
                                        Checkout
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
