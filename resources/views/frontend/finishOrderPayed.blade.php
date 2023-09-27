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
                        <h1 class="mb-0 display-3">Checkout
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="position-relative bg-white">
        <div class="container pb-7 pb-lg-12 pt-5 position-relative">
            <br>
            <div class="row">
                <div class="col-lg-10 mx-auto text-center">
                    <h3>Thank's for your order.</h3><br>
                    <h5>Once the product's will be shipped, you well receive e-mail. </h5>
                </div>
            </div>
            <br>
            <br>
            <br>
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="text-start">
                        <a href="{{ route('frontend.shop') }}" class="link-hover-underline text-body"><i
                                class="bx bx-left-arrow-alt fs-6 align-middle me-1"></i>Continue shopping</a>
                    </div>
                    <div class="text-end">
                        <a href="{{ route('frontend.showProfileOrders', Auth::user()->id ) }}" class="link-hover-underline text-body">View your orders<i
                                class="bx bx-right-arrow-alt fs-6 align-middle me-1"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
