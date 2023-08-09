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
                                    <a href="{{ route('frontend.profile') }}" class="nav-link active"> <i
                                            class="bx bx-user-circle me-2"></i>My profile</a>
                                    <a href="{{ route('frontend.showProfileDetails', $userDetails->id ) }}" class="nav-link"><i
                                            class="bx bx-cog me-2"></i>Settings</a>
                                    <a href="{{ route('frontend.showProfileOrders', $userDetails->firstName ) }}" class="nav-link"><i
                                            class="bx bx-layer me-2"></i>Orders</a>
                                    <a href="#" class="nav-link disabled"><i
                                            class="bx bx-credit-card me-2"></i>Billing</a>
                                    <a href="#" class="nav-link disabled"><i
                                            class="bx bx-group me-2"></i>Followers</a>
                                </nav>

                                <div class="h-100">
                                    <h5 class="mb-4">Profile Details</h5>

                                    <div class="row align-items-center">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">First Name</label>
                                            <div class="form-control">{{ $userDetails->firstName }}
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Last Name</label>
                                            <div class="form-control">{{ $userDetails->lastName }}
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Email address</label>
                                            <div class="form-control">{{ $userDetails->email }}
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Phone</label>
                                            <div class="form-control">{{ $userDetails->phoneNumber }}
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">TAX Number</label>
                                            <div class="form-control">{{ $userDetails->taxNumber }}
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Company</label>
                                            <div class="form-control">{{ $userDetails->company }}
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Address</label>
                                            <div class="form-control">{{ $userDetails->address }}
                                            </div>
                                        </div>
                                         <div class="col-md-6 mb-3">
                                            <label class="form-label">City</label>
                                            <div class="form-control">{{ $userDetails->city }}
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">ZIP Code</label>
                                            <div class="form-control">{{ $userDetails->zipcode }}
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Country</label>
                                            <div class="form-control">{{ $userDetails->country->name }}
                                            </div>
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
