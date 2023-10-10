@extends('layouts.frontend')
@section('content')
    <section class="bg-dark text-white position-relative">
        <div class="container pt-6 pb-6 pb-lg-6 position-relative z-index-1">
            <div class="row  align-items-center justify-content-center text-center">
                <div class="col-lg-10 col-xl-7 z-index-2">
                    <div class="position-relative">
                        <div>
                            <nav class="d-flex justify-content-center" aria-label="breadcrumb">
                                <div class="mb-4">
                                    <ol class="breadcrumb mb-0">
                                        <li class="breadcrumb-item"><a href="{{ route('frontend.index') }}"><i
                                                    class="bx bx-home fs-5"></i></a></li>
                                        <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('frontend.albums') }}">Albums</a></li>
                                    </ol>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="position-relative bg-white border-bottom overflow-hidden" id="next">
        <div class="container pt-7 pt-lg-6 pb-7 pb-lg-6 position-relative">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{ route('frontend.index') }}" class="text-dark">
                            <i class="bx bx-home fs-5"></i>
                        </a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('frontend.albums') }}"
                                                          class="text-dark">Albums</a></li>
                </ol>
            </nav>
            <div class="container py-3 py-lg-3">
                <section class="position-relative ">
                    <div class="container ">
                        <div class="row align-items-center">
                            <div class="col-md-7 mb-4 mb-md-0">
                                <h2 class="mb-0 display-5">
                                    Albums
                                </h2>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <section class="position-relative">
                <div class="container py-3 py-lg-3">
                    <hr class="mb-9 mb-lg-11 mt-0">
                    <div class="row mb-9 mb-lg-11">
                        @foreach($albums as $album)
                            <div class="col-md-6 col-sm-8 col-xl-4">
                                <!--Card-hover-->
                                <a href="{{ route('frontend.album', $album->slug) }}"
                                   class="text-white position-relative d-block rounded-4 overflow-hidden card-hover-2">
                                    <!--Image-->
                                    <img src="/assets/img/cover_images/albums/thumbnails/{{$album->coverImg}}" alt="" class="w-100 img-zoom">
                                    <!--Overlay-->
                                    <div
                                        class="card-hover-2-overlay position-absolute start-0 top-0 w-100 h-100 d-flex px-4 py-5 flex-column justify-content-between">
                                        <!--overlay header-->
                                        <div class="card-hover-2-header w-100">
                                            <div class="card-hover-2-title">
                                                <h5 class="fs-4 mb-2" style="color:black">{{ $album->name }}</h5>
                                            </div>
                                            <p class="mb-0">
                                                <i class="bx bx-person d-inline-block align-middle me-1"></i>
                                            </p>
                                        </div>
                                        <!--Overlay footer-->
                                        <div class="card-hover-2-footer w-100 mt-auto">
                                            <span class="tags d-block flex-grow-1" style="color:black">Created {{ $album->created_at->diffForHumans() }}</span>
                                            <span class="card-hover-2-footer-link">
                                            <span style="color:black">View Pictures</span>
                                        </span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <hr class="mb-9 mb-lg-11 mt-0">
                </div>
            </section>

        </div>
    </section>

@endsection


