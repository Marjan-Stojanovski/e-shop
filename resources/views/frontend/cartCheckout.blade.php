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
            @if(!(Auth::user()))
                <div class="row">
                    <div class="col-lg-5 offset-lg-1">
                        <div class="px-3 px-lg-4 py-4 py-lg-5 bg-light border">
                            <h5 class="text-muted mb-0">
                                Already a customer ?
                                <a class="fw-semibold text-dark d-inline-block ms-3 collapsed"
                                   data-bs-toggle="collapse" href="#collapseSignIn" role="button"
                                   aria-expanded="false" aria-controls="collapseSignIn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                         fill="currentColor" class="bx bx-log-in-circle me-1"
                                         viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                              d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z">
                                        </path>
                                        <path fill-rule="evenodd"
                                              d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z">
                                        </path>
                                    </svg>
                                    Sign In
                                </a>
                            </h5>
                            <div class="collapse" id="collapseSignIn">
                                <br>
                                <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="input-icon-group mb-3">
                                            <span class="input-icon">
                                          <i class="bx bx-envelope"></i>
                                        </span>
                                        <input type="text" placeholder="Email" id="email" class="form-control"
                                               name="email" required
                                               autofocus>
                                        @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                    <div class="input-icon-group mb-3">
                                        <span class="input-icon">
                                            <i class="bx bx-lock-open"></i>
                                        </span>
                                        <input input type="password" placeholder="Password" id="password"
                                               class="form-control" name="password" required>
                                        @if ($errors->has('password'))
                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                    <div class="mb-3 d-flex justify-content-between">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                   id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Remember me
                                            </label>
                                        </div>
                                        <div>
                                            <label class="text-end d-block small mb-0"><a
                                                    href="page-account-forget-password.html"
                                                    class="text-muted link-decoration">Forget Password?</a></label>
                                        </div>
                                    </div>

                                    <div class="d-grid">
                                        <button class="btn btn-primary" type="submit">
                                            Sign in
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 offset-lg-0">
                        <div class="px-3 px-lg-4 py-4 py-lg-5 bg-light border">
                            <h5 class="text-muted mb-0">
                                New customer ?
                                <a class="fw-semibold text-dark d-inline-block ms-3 collapsed"
                                   data-bs-toggle="collapse" href="#collapseSignUp" role="button"
                                   aria-expanded="false" aria-controls="collapseSignUp">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                         fill="currentColor" class="bx bx-log-in-circle me-1"
                                         viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                              d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z">
                                        </path>
                                        <path fill-rule="evenodd"
                                              d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z">
                                        </path>
                                    </svg>
                                    Sign Up
                                </a>
                            </h5>
                            <div class="collapse" id="collapseSignUp">
                                <form>
                                    <div class="pt-4 mb-3">
                                        <input type="email" class="form-control" autofocus=""
                                               placeholder="Username">
                                    </div>
                                    <div class="mb-3">
                                        <input type="password" class="form-control" placeholder="Password">
                                    </div>
                                    <div class="mb-3 d-flex justify-content-between">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                   id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Remember me
                                            </label>
                                        </div>
                                        <div>
                                            <label class="text-end d-block small mb-0"><a
                                                    href="page-account-forget-password.html"
                                                    class="text-muted link-decoration">Forget Password?</a></label>
                                        </div>
                                    </div>

                                    <div class="d-grid">
                                        <button class="btn btn-primary" type="submit">
                                            Sign Up
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <br>
            <br>

                <?php
                $user = Auth::user();
                ?>
            <!--Form billing information-->
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <form action="{{ route('frontend.processOrder') }}" class="needs-validation" method="post">
                        @csrf
                        <h4 class="mb-4">Billing information</h4>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="firstName">First Name</label>
                                <input type="text" id="firstName" class="form-control" required value="{{ $user->firstName }}" name="firstName">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="lastName">Last Name</label>
                                <input required type="text" id="lastName" class="form-control" value="{{ $user->lastName }}" name="lastName">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="companyName">Company Name (optional)</label>
                                <input required type="text" id="companyName" class="form-control" value="{{ $user->shipping->company }}" name="companyName">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="taxNumber">Company Tax Number (optional)</label>
                                <input required type="text" id="taxNumber" class="form-control" value="{{ $user->shipping->taxNumber }}" name="taxNumber">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="address">Address</label>
                                <input required type="text" id="address"
                                       class="form-control" value="{{ $user->shipping->address }}" name="address">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="city">City</label>
                                <input required type="text" id="city" class="form-control" value="{{ $user->shipping->city }}" name="city">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="zipcode">Postal code</label>
                                <input required type="text" id="zipcode" data-format="custom"
                                       data-delimiter="-" data-blocks="2 3" class="form-control"  value="{{ $user->shipping->zipcode }}" name="zipcode">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="country_id">Country</label>
                                <select name="country_id" id="country_id"
                                        class="form-control" data-choices='{"itemSelectText":""}'>
                                    @foreach($countries as $country)
                                    <option  value="{{ $country->id }}" >{{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="email">E-Mail</label>
                                <input required type="email" id="email" class="form-control"
                                       value="{{ $user->email }}" name="email">
                            </div>
                            <div class="col-md-6 mb-5">
                                <label class="form-label" for="phoneNumber">Phone Number</label>
                                <input required type="text" id="phoneNumber" data-format="phone"
                                       class="form-control" value="{{ $user->shipping->phoneNumber }}"  name="phoneNumber">
                            </div>
                            <!--Different address ollapse-->
                            <div class="col-md-12">
                                <div class="p-3 p-lg-4 border">
                                    <a href="#shipping_address_different" class="h5 mb-0 d-block"
                                       data-bs-toggle="collapse" aria-expanded="false">Ship to a different
                                        address?</a>
                                    <div class="collapse" id="shipping_address_different">
                                        <div class="row pt-3">
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label" for="shipFirstName">First
                                                    Name</label>
                                                <input type="text" id="shipFirstName"
                                                       class="form-control" name="shipFirstName">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label" for="shipLastName">Last
                                                    Name</label>
                                                <input type="text" id="shipLastName"
                                                       class="form-control" name="shipLastName">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label" for="shipAddress">Address</label>
                                                <input type="text" id="shipAddress"
                                                       class="form-control" name="shipAddress">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label" for="shipCity">City</label>
                                                <input type="text" id="shipCity"
                                                       class="form-control" name="shipCity">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label" for="shipZipcode">Postal Code</label>
                                                <input type="text" id="shipZipcode"
                                                       class="form-control" name="shipZipcode">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label"
                                                       for="shipCountry_id">Country
                                                </label>
                                                <select name="shipCountry_id"
                                                        id="shipCountry_id" class="form-control"
                                                        data-choices='{"itemSelectText":""}'>
                                                    @foreach($countries as $country)
                                                        <option  value="{{ $country->id }}" >{{ $country->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label" for="shipEmail">E-Mail</label>
                                                <input type="text" id="shipEmail"
                                                       class="form-control" name="shipEmail">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label" for="shipPhoneNumber">Phone</label>
                                                <input type="text" id="shipPhoneNumber"
                                                       class="form-control" name="shipPhoneNumber">
                                            </div>
                                            <div class="col-12 mb-3">
                                                <label class="form-label" for="shipComment">Order
                                                    Note</label>
                                                <textarea class="form-control" id="shipComment"
                                                          rows="5"
                                                          placeholder="Comments about your order, eg. : Delivery instructions" name="shipComment"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h4 class="mb-4 pt-5">Your order</h4>
                        <!--Checkout product info table-->
                        <table class="table mb-5 table-bordered">
                            <thead class="">
                            <tr>
                                <th class="product-name">Product</th>
                                <th class="product-total">Subtotal</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                $orderTotal = 0;
                            ?>
                            @foreach($carts as $cart)
                            <tr>
                                <td class="product-name">
                                    <div class="d-flex align-items-center">
                                        <h6 class="mb-0">{{ $cart['name'] }}</h6>
                                        <strong class="product-qty ms-3 text-muted">x {{ $cart['quantity'] }}</strong>
                                    </div>
                                </td>
                                <td>€&nbsp;{{ number_format($cart['productAmount'], 2) }}</td>
                            </tr>
                                <?php
                                $orderTotal += $cart['productAmount'];
                                ?>
                            @endforeach
                            </tbody>
                            <tfoot class="bg-light">
                            <tr>
                                <th>Shipping</th>

                                <td class="fw-bold fs-5 text-dark">Free Shipping</td>

                            </tr>
                            <tr>
                                <th>Order Total</th>
                                <td class="fw-bold fs-5 text-dark"><strong>€&nbsp;{{ number_format($orderTotal, 2) }}</strong></td>
                            </tr>
                            </tfoot>
                        </table>

                        <label for="paymentOption" class="form-label">Select Payment Option</label>
                        <select id="paymentOption" name="paymentOption" class="form-control" data-choices='{"searchEnabled":false, "allowHTML":true,"itemSelectText":""}' onchange='onSelectChangeHandler()'>
                            <option value="default" selected>Choose Method</option>
                            <option value="offer">Offer for payment</option>
                            <option value="creditCard">Credit Card</option>
                        </select>

                        <div class="mb-3" id="payment_methods">
                            <div id="offer" class="position-relative border border-secondary overflow-hidden mb-2">
                                <input type="radio" class="btn-check"
                                       id="payment_option_paypal" checked>
                                <label
                                    class="btn btn-outline-secondary border-0 text-start d-flex w-100 align-items-center justify-content-between rounded-0"
                                    for="payment_option_paypal" data-bs-target="#mothod_payment_paypal"
                                    aria-expanded="false" data-bs-toggle="collapse">Payment Order
                                    <div>
                                        <img src="/assets/img/payment/adobe-pdf-2.svg" class="width-35">
                                    </div>
                                </label>
                                <div class="collapse show" id="mothod_payment_paypal"
                                     data-bs-parent="#payment_methods">
                                    <div class="px-3 py-4">
                                        <p>Order must be payed before sending. After receiving of funds the order will be sent. Do you agree?</p>
                                        <div class="form-check form-switch">
                                            <input style="border-radius: 15px" class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="sendOffer">
                                            <label class="form-check-label" for="flexSwitchCheckChecked">Check if you agree</label>
                                        </div>
                                    </div>
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-lg hover-lift btn-hover-text btn-primary">
                                            <span class="btn-hover-label label-default">Place your order</span>
                                            <span class="btn-hover-label label-hover">Place your order</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div id="creditCard" class="position-relative border border-secondary overflow-hidden">
                                <input type="radio" class="btn-check"
                                       id="payment_option_card" checked>
                                <label
                                    class="btn btn-outline-secondary border-0 text-start d-flex w-100 align-items-center justify-content-between rounded-0"
                                    for="payment_option_card" data-bs-target="#method_payment_card"
                                    aria-expanded="false" data-bs-toggle="collapse">Debit Card
                                    <div>
                                        <img src="/assets/img/payment/visa.svg" class="width-35 me-2">
                                        <img src="assets/img/payment/american_express.svg"
                                             class="width-35 me-2">
                                        <img src="/assets/img/payment/mastercard-6.svg"
                                             class="width-35">
                                    </div>
                                </label>
                                <div class="collapse show" id="method_payment_card"
                                     data-bs-parent="#payment_methods">
                                    <div class="px-3 py-4">
                                        <div class="form-check form-switch">
                                            <div class="row">
                                                <div class="mb-3 col-md-7">
                                                    <label for="card_fullName" class="form-label">Card Holder Name</label>
                                                    <input type="text" id="card_fullName" data-format="card" required
                                                           placeholder="" autocomplete="off" name="card_fullName"
                                                           class="form-control">
                                                </div>
                                                <div class="mb-3 col-md-8">
                                                    <label for="card_number" class="form-label">Card Number</label>
                                                    <input type="text" id="card_number" data-format="card" required
                                                           placeholder="XXXX XXXX XXXX XXXX" autocomplete="off"
                                                           class="form-control" name="card_number">
                                                </div>
                                                <div class="mb-3 col-md-4">
                                                    <label for="card_cvc" class="form-label">CVC Number</label>
                                                    <input type="text" data-format="cvc" autocomplete="off" required
                                                           id="card_cvc" placeholder="XXX" class="form-control" name="card_cvc">
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="card_ex_month" class="form-label">Expiry
                                                        Month</label>
                                                    <input type="text" autocomplete="off" required
                                                           data-format="custom" id="card_ex_month" data-blocks="2"
                                                           placeholder="" class="form-control" name="card_ex_month">
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                    <label for="card_ex_year" class="form-label">Expiry Year</label>
                                                    <input type="text" data-format="custom" required
                                                           id="card_ex_year" data-blocks="4" placeholder=""
                                                           class="form-control" name="card_ex_year">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-lg hover-lift btn-hover-text btn-primary">
                                            <span class="btn-hover-label label-default">Place your order</span>
                                            <span class="btn-hover-label label-hover">Place your order</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
