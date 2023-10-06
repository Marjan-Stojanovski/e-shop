@extends('layouts.frontend')
@section('content')

    <section class="position-relative bg-white border-bottom overflow-hidden" id="next">
        <div class="container pt-7 pt-lg-6 pb-7 pb-lg-6 position-relative">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{ route('frontend.index') }}" class="text-dark">
                            <i class="bx bx-home fs-5"></i>
                        </a></li>
                    <li class="breadcrumb-item active"><a href="" class="text-dark">Politika zasebnosti</a></li>
                </ol>
            </nav>
            <div class="container py-9 py-lg-11">
                <div class="row align-items-center">
                    <div class="col-lg-12 col-md-6 mb-5 mb-lg-0">
                        <h2 class="display-4 mb-4" data-aos="fade-left" data-aos-delay="100"
                            data-aos-duration="700">
                            {{ $policy->name }}
                        </h2>
                        <br>
                        <br>
                        <p class="mb-5 w-lg-75" data-aos="fade-right" data-aos-delay="150" data-aos-duration="700">
                            {!! $policy->description !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
