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
                                    <h2 class="margin-clear"><a href="">{{$brand->name}}</a></h2>
                                    <p class="fs-4 mb-4">
                                        {!! $brand->description !!}
                                    </p>

                                    <a href="{{URL::to('/e-shop/?brand[]='.$brand->id)}}" class="btn btn-outline-secondary rounded-pill btn-hover-arrow">
                                        <span>See all products</span>

                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>

@endsection
