@extends('layouts.frontend')
@section('content')
    <!--Page header start-->
    <section class="position-relative overflow-hidden">
        <div class="container-fluid">
            <div class="py-8 py-lg-5 bg-dark text-white position-relative">
                <!--background image-->
                <img src="/assets/img/shop/banners/06.jpg" class="bg-image bg-top-center opacity-75" alt="">
                <div class="row align-items-center position-relative">
                    <div class="col-lg-10 mx-auto text-center">
                        <h1 class="mb-0 display-5">Order No. {{ $order->id }} Info</span>
                        </h1>
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
                    <li class="breadcrumb-item active"><a href=""
                                                          class="text-dark">Order Details</a></li>
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
                        <div class="col-lg-12">
                            <div class="d-flex flex-column">
                                <nav class="nav mb-5 nav-pills">
                                    <a href="{{ route('frontend.profile', Auth::user()->id) }}" class="nav-link"> <i
                                            class="bx bx-user-circle me-2"></i>My profile</a>
                                    <a href="{{ route('frontend.showProfileOrders', Auth::user()->id) }}" class="nav-link active"><i
                                            class="bx bx-layer me-2"></i>Orders</a>
                                    <a href="{{ route('frontend.userMessages', Auth::user()->id) }}" class="nav-link"><i
                                            class="bx bx-message-rounded-detail me-2"></i>Messages</a>
                                </nav>
                                <div class="col-lg-10 mx-auto">
                                    <h4 class="mb-4 pt-5">Your order</h4>
                                    <!--Checkout product info table-->
                                    <table class="table mb-5 table-bordered">
                                        <thead class="">
                                        <tr>
                                            <th class="product-name">Product</th>
                                            <th class="product-total"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($products as $product)
                                            <tr>
                                                <td class="product-name">
                                                    <div class="d-flex align-items-center">
                                                        <h6 class="mb-0">{{ $product->product->title }}</h6>
                                                        <strong
                                                            class="product-qty ms-3 text-muted">x {{ $product->quantity }}</strong>
                                                    </div>
                                                </td>
                                                <td>€ {{ number_format($product->price, 2) }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot class="bg-light">
                                        @if($order->shippingCharges == 0)
                                            <tr>
                                                <th>Shipping Charges</th>
                                                <td class="fw-bold fs-5 text-dark">Free Shipping</td>
                                            </tr>
                                        @else
                                            <tr>
                                                <th>Shipping Charges</th>
                                                <td class="fw-bold fs-5 text-dark">
                                                    € {{ number_format($order->shippingCharges, 2) }}</td>
                                            </tr>
                                        @endif
                                        <tr>
                                            <th>Discount</th>
                                            <td class="fw-bold fs-5 text-dark">
                                                € {{ number_format($order->discount, 2) }}</td>
                                        </tr>
                                        <tr>
                                            <th>Order Total</th>
                                            <td class="fw-bold fs-5 text-dark">
                                                <strong>€ {{ number_format($order->total, 2) }}</strong></td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                    <br>
                                    <br>
                                    <table class="table table-bordered">
                                        <tbody>
                                        <tr>
                                            <th class="text-center">Payment Status</th>
                                            @if($order->payment_status == 0)
                                                <td class="text-center"><strong>Order Not Payed</strong></td>
                                            @else
                                                <td class="text-center"><strong>Payment Successful</strong></td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <th class="text-center">Shippment Status</th>
                                            <td class="text-center"><strong>{{ $order->order_status }}</strong></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
