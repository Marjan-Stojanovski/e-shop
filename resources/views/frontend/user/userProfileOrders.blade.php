@extends('layouts.frontend')
@section('content')

    <section class="position-relative overflow-hidden">
        <div class="container-fluid">
            <div class="py-8 py-lg-5 bg-dark text-white position-relative">
                <!--background image-->
                <img src="/assets/img/shop/banners/06.jpg" class="bg-image bg-top-center opacity-75" alt="">
                <div class="row align-items-center position-relative">
                    <div class="col-lg-10 mx-auto text-center">
                        <h1 class="mb-0 display-5">{{ Auth::user()->firstName }} {{ Auth::user()->lastName }} <span class="text-muted">Profile</span>
                        </h1>
                    </div>
                </div>
                <!--/.row-->
            </div>
        </div>
    </section>
    <section class="position-relative bg-white border-bottom">
        <div class="container pt-8 pt-lg-6 pb-8 pb-lg-6 position-relative">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{ route('frontend.index') }}" class="text-dark">
                            <i class="bx bx-home fs-5"></i>
                        </a></li>
                    <li class="breadcrumb-item active"><a href="" class="text-dark">{{ Auth::user()->firstName }} {{ Auth::user()->lastName }} Profile</a></li>
                </ol>
            </nav>
        </div>
    </section>
    <section class="position-relative">
        <div class="container position-relative">
            <div class="">
                <!--Profile info header-->
                <div class="position-relative pt-9 pb-9 pb-lg-11">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="d-flex flex-column">
                                <nav class="nav mb-5 nav-pills">
                                    <a href="{{ route('frontend.profile') }}" class="nav-link"> <i
                                            class="bx bx-user-circle me-2"></i>My profile</a>
                                    <a href="{{ route('frontend.showProfileDetails', $userDetails->id ) }}" class="nav-link"><i
                                            class="bx bx-cog me-2"></i>Settings</a>
                                    <a href="{{ route('frontend.showProfileOrders', $userDetails->firstName ) }}" class="nav-link active"><i
                                            class="bx bx-layer me-2"></i>Orders</a>
                                    <a href="#" class="nav-link disabled"><i
                                            class="bx bx-credit-card me-2"></i>Billing</a>
                                    <a href="#" class="nav-link disabled"><i
                                            class="bx bx-group me-2"></i>Followers</a>
                                </nav>

                                <div class="h-100">
                                    <div class="row align-items-center">
                                        <div class="d-flex mb-4 align-items-center">
                                            <h5 class="mb-0 me-3">User Orders</h5>
                                            <div class="pt-1 border-bottom flex-grow-1"></div>
                                        </div>

                                        <div class="table-responsive mb-9">
                                            <table class="table table-striped">
                                                <thead>
                                                <tr>
                                                    <th class="align-middle" scope="col">Order No.</th>
                                                    <th class="text-center align-middle" scope="col">Full Name</th>
                                                    <th class="text-center align-middle" scope="col">E-Mail</th>
                                                    <th class="text-center align-middle" scope="col">Total Price</th>
                                                    <th class="text-end align-middle" scope="col">Payment type</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($orders as $order)
                                                <tr>
                                                    <th class="align-middle">{{ $order->id }}</th>
                                                    <td class="text-center align-middle" >{{ $order->firstName }} {{ $order->lastName }}</td>
                                                    <td class="text-center align-middle">{{ $order->email }}</td>
                                                    <td class="text-center align-middle">€ {{ number_format($order->total, 2) }}</td>
                                                    <td class="text-end align-middle">{{ $order->payment_info }}</td>
                                                </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>


                                    </div>
                                    <div class="d-grid d-sm-flex justify-content-sm-center">
                                        <div class="col-md-12 text-center">
                                            {{ $orders->links() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
