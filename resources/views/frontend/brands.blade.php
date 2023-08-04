@extends('layouts.frontend')
@section('content')

    <section class="position-relative bg-white" id="stories">
        <div class="container pt-7 pt-lg-6 pb-9 pb-lg-11 position-relative">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{ route('frontend.index') }}" class="text-dark">
                            <i class="bx bx-home fs-5"></i>
                        </a></li>
                    <li class="breadcrumb-item active"><a href="" class="text-dark">Partnerji</a></li>
                </ol>
            </nav>
            <div data-aos="fade-up" class="row mb-7">
                <div class="col-lg-10 col-xl-7 mx-auto text-center">
                    <h1 class="display-5 mb-4">Partnerji</h1>
                    <p></p>
                </div>
            </div>
            @foreach($brands as $brand)
            <div data-aos="fade-up" class="row mb-5">
                <div class="col-lg-12">
                    <div
                        class="card flex-md-row flex-column overflow-hidden rounded-4 shadow-sm hover-shadow-lg hover-lift bg-white">
                        <div class="col-md-4">
                            <div
                                class="d-flex flex-column border-end-md pt-5 pb-md-5 px-5 align-items-md-center justify-content-center h-100 bg-white">
                                <img src="/assets/img/brands/thumbnails/{{$brand->image}}"
                                     alt="{{$brand->name}}"
                                     class="width-12x w-lg-50 h-auto">
                            </div>
                        </div>
                        <div class="card-body h-100 p-4 py-5 py-md-7 px-md-5 flex-grow-1">
                            <div class="d-md-flex align-items-md-center">
                                <div class="ms-md-n9">

                                </div>
                                <div class="ps-md-9 pe-md-5">
                                    <h2 class="margin-clear"><a href="{{route('frontend.brandView', $brand->name)}}">{{$brand->name}}</a></h2>
                                    <p class="fs-4 mb-4">
                                        {!! $brand->description !!}
                                    </p>

                                    <a href="#" class="btn btn-outline-secondary rounded-pill btn-hover-arrow">
                                        <span>See all products</span>

                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            <!-- Archived Stories
            <div class="text-center" data-aos="fade-up">
                <a href="#!" class="btn btn-lg btn-outline-gray-200 text-muted">Archived stories
                    <i class="bx bx-history fs-4 ms-1 small"></i>
                </a>
            </div>
             Archived Stories -->
        </div>
    </section>
    <!-- Old Page
    <div class="breadcrumb-container">
        <div class="container">
            <ol class="breadcrumb">
                <li><i class="fa fa-home pr-10"></i><a href="{{route('frontend.index')}}"
                                                       style="color: black">Domov</a></li>
                <li class="active" style="color: black"><a href="{{route('frontend.brands')}}"
                                                           style="color: black">Brands</a></li>
            </ol>
            <br>
        </div>
    </div>
    <section class="section clearfix">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-title text-center">Brands</h1>
                    <div class="separator"></div>
                    <br>
                    <br>
                </div>

                <div class="col-md-12">
                    <div class="tab-content clear-style">
                        @foreach($brands as $brand)
                        <div class="listing-item mb-20">
                            <div class="row grid-space-0">
                                <div class="col-sm-6 col-md-4 col-lg-3">
                                    <br>
                                    <div class="overlay-container" style="padding: 20px">
                                        <img style="width: auto; height: 100%; margin: 0 auto; background-size: auto;"
                                            src="/assets/img/brands/thumbnails/{{$brand->image}}"
                                             alt="{{$brand->name}}">
                                        <a class="overlay-link" href="{{route('frontend.brandView', $brand->name)}}"></a>

                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-8 col-lg-9" style="padding: 20px">
                                    <div class="body">
                                        <h2 class="margin-clear"><a href="{{route('frontend.brandView', $brand->name)}}">{{$brand->name}}</a></h2>
                                        <p>{!! $brand->description !!}</p>
                                    </div>
                                    <div class="pull-right">
                                        <a class="text-center btn btn-gray-transparent btn-animated"  href="{{URL::to('/e-shop/?brand[]='.$brand->id)}}">{{$brand->name}} Products<i class="fa fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div class="separator"></div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
OLD PAGE -->

@endsection
