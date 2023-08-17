@extends('layouts.frontend')
@section('content')
    <section class="position-relative overflow-hidden">
        <div class="container-fluid">
            <div class="py-8 py-lg-5 bg-dark text-white position-relative">
                <!--background image-->
                <img src="/assets/img/shop/banners/06.jpg" class="bg-image bg-top-center opacity-75" alt="">
                <div class="row align-items-center position-relative">
                    <div class="col-lg-10 mx-auto text-center">
                        <h1 class="mb-0 display-5">{{ Auth::user()->firstName }} {{ Auth::user()->lastName }} <span
                                class="text-muted">Profile</span>
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
                    <li class="breadcrumb-item active"><a href="" class="text-dark">Edit Profile</a></li>
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
                                    <a href="{{ route('frontend.profile', Auth::user()->id) }}" class="nav-link active"> <i
                                            class="bx bx-user-circle me-2"></i>My profile</a>
                                </nav>

                                <div class="h-100">
                                    <h5 class="mb-4">Edit Profile Details</h5>
                                    <form class="form-horizontal"
                                          action="{{route('frontend.updateProfileDetails', Auth::user()->id )}}"
                                          method="POST">
                                        @csrf
                                        @method('put')
                                        <div class="row align-items-center">
                                            <div class="col-md-6 mb-3">
                                                <label for="firstName" class="form-label">First Name</label>
                                                <input type="text" placeholder="First Name" id="firstName"
                                                       class="form-control"
                                                       name="firstName"
                                                       autofocus value="{{$userDetails->firstName}}">
                                                @if ($errors->has('firstName'))
                                                    <span class="text-danger">{{ $errors->first('firstName') }}</span>
                                                @endif
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="lastName" class="form-label">Last Name</label>
                                                <input type="text" placeholder="Last Name" id="lastName"
                                                       class="form-control"
                                                       name="lastName"
                                                       required autofocus value="{{$userDetails->lastName}}">
                                                @if ($errors->has('lastName'))
                                                    <span class="text-danger">{{ $errors->first('lastName') }}</span>
                                                @endif
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="email" class="form-label">Email address</label>
                                                <input type="email" placeholder="Email" id="email" class="form-control"
                                                       name="email" required autofocus value="{{$userDetails->email}}">
                                                @if ($errors->has('email'))
                                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                                @endif
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="phoneNumber" class="form-label">Phone</label>
                                                <input type="text" placeholder="Phone Number" id="phoneNumber"
                                                       class="form-control"
                                                       name="phoneNumber"
                                                       required autofocus value="{{$userDetails->phoneNumber}}">
                                                @if ($errors->has('phoneNumber'))
                                                    <span class="text-danger">{{ $errors->first('phoneNumber') }}</span>
                                                @endif
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
                                                <label for="address" class="form-label">Address</label>
                                                <input type="text" placeholder="Address" id="address"
                                                       class="form-control"
                                                       name="address" required autofocus
                                                       value="{{$userDetails->address}}">
                                                @if ($errors->has('address'))
                                                    <span class="text-danger">{{ $errors->first('address') }}</span>
                                                @endif
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="city" class="form-label">City</label>
                                                <input type="text" placeholder="City" id="city" class="form-control"
                                                       name="city" required autofocus value="{{$userDetails->city}}">
                                                @if ($errors->has('city'))
                                                    <span class="text-danger">{{ $errors->first('city') }}</span>
                                                @endif
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="zipcode" class="form-label">Zip Code</label>
                                                <input type="number" placeholder="ZIP" id="zipcode" class="form-control"
                                                       name="zipcode" required autofocus
                                                       value="{{$userDetails->zipcode}}">
                                                @if ($errors->has('zipcode'))
                                                    <span class="text-danger">{{ $errors->first('zipcode') }}</span>
                                                @endif
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="country_id" class="form-label">Country</label>
                                                <select name="country_id" id="country_id"
                                                        class="form-control @error('country_id') is-invalid @enderror">
                                                    @foreach($countries as $country)
                                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                                    @endforeach
                                                    @error('country_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </select>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="text-end">
                                            <button type="submit" class="btn btn-primary" id="profileSaveBtn">Save
                                                changes
                                            </button>
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
