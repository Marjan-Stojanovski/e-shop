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
                    <li class="breadcrumb-item active"><a href=""
                                                          class="text-dark">Messages</a></li>
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
                                    <a href="{{ route('frontend.profile', Auth::user()->id) }}" class="nav-link "> <i
                                            class="bx bx-user-circle me-2"></i>My profile</a>
                                    <a href="{{ route('frontend.showProfileOrders', Auth::user()->id) }}" class="nav-link"><i
                                            class="bx bx-layer me-2"></i>Orders</a>
                                    <a href="{{ route('frontend.userMessages', Auth::user()->id) }}" class="nav-link active"><i
                                            class="bx bx-message-rounded-detail me-2"></i>Messages</a>
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
                                                    <th class="align-middle" scope="col"></th>
                                                    <th class="text-center align-middle" scope="col">Full Name</th>
                                                    <th class="text-center align-middle" scope="col">E-Mail</th>
                                                    <th class="text-center align-middle" scope="col">Subject</th>
                                                    <th class="text-end align-middle" scope="col">Send</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($messages as $message)
                                                    <tr>
                                                        <th class="align-middle"><a href="{{ route('frontend.viewUserMessage', $message->id ) }}">View</a></th>
                                                        <td class="text-center align-middle">{{ $message->fullName }}</td>
                                                        <td class="text-center align-middle">{{ $message->email }}</td>
                                                        <td class="text-center align-middle">{{ $message->subject }}</td>
                                                        <td class="text-end align-middle">{{ $message->created_at->diffForHumans() }}</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>


                                    </div>
                                    <div class="d-grid d-sm-flex justify-content-sm-center">
                                        <div class="col-md-12 text-center">
                                            {{ $messages->links() }}
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
