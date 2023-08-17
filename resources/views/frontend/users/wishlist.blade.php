@extends('layouts.frontend')
@section('content')

    <section class="position-relative overflow-hidden">
        <div class="container-fluid">
            <div class="py-8 py-lg-5 bg-dark text-white position-relative">
                <!--background image-->
                <img src="/assets/img/shop/banners/06.jpg" class="bg-image bg-top-center opacity-75" alt="">
                <div class="row align-items-center position-relative">
                    <div class="col-lg-10 mx-auto text-center">
                        <h2 class="mb-0">{{ Auth::user()->firstName }} {{ Auth::user()->lastName }} <span
                                class="text-muted">Wishlist</span>
                        </h2>
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
                                                          class="text-dark">{{ Auth::user()->firstName }} {{ Auth::user()->lastName }}
                            Wishlist</a></li>
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
                        <div class="col-lg-10 offset-lg-1">
                            <!--:Wishlist table-->
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>Product</th>
                                    <th class="text-center">Amount</th>
                                    <th class="text-center">Actions</th>
                                    <th class="text-center">Remove</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($wishlists as $wishlist)
                                    <tr>
                                        <td class="align-middle">
                                            <a href="#"><img
                                                    src="assets/img/products/thumbnails/{{ $wishlist->product->image }}"
                                                    class="img-fluid width-5x h-auto" alt=""></a>

                                        </td>
                                        <td class="align-middle">
                                            <div>
                                                <h5 class="fs-6 mb-0"><a href="#"
                                                                         class="text-inherit">{{ $wishlist->product->title }}</a>
                                                </h5>
                                                <small>
                                                    @if(isset($wishlist->product->action))
                                                        €&nbsp;{{ $wishlist->product->action }}
                                                    @else
                                                        €&nbsp;{{ $wishlist->product->price }}
                                                    @endif
                                                </small>
                                            </div>
                                        </td>
                                        <td class="text-center align-middle">
                                            @if(isset($wishlist->product->action))
                                                €&nbsp;{{ $wishlist->product->action }}
                                            @else
                                                €&nbsp;{{ $wishlist->product->price }}
                                            @endif
                                        </td>
                                        <td class="text-center align-middle">

                                                <form action="{{ route('addToCart.wishlistDelete', $wishlist->id)}}"  method="POST" class="clearfix"
                                                      enctype="multipart/form-data">
                                                    @csrf
                                                    @method('delete')
                                                    <input type="hidden" value="{{ $wishlist->product->id }}" name="id">
                                                    <input type="hidden" value="{{ $wishlist->product->title }}"
                                                           name="title">
                                                    <input type="hidden" value="{{ $wishlist->product->brand->name }}"
                                                           name="brand">
                                                    <input type="hidden" value="1" name="quantity">
                                                    @if(isset($wishlist->product->action))
                                                        <input type="hidden" value="{{ $wishlist->product->action }}"
                                                               name="price">
                                                    @else
                                                        <input type="hidden" value="{{ $wishlist->product->price }}"
                                                               name="price">
                                                    @endif
                                                    <input type="hidden" value="{{ $wishlist->product->image }}"
                                                           name="image">
                                                    <button type="submit" class="btn btn-primary btn-sm">Move to Cart</button>
                                                </form>
                                        </td>
                                        <td class="align-middle text-center">
                                            <form action="{{route('frontend.wishlistDelete', $wishlist->id )}}"
                                                  method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit"
                                                        style="border: none; background-color: transparent;"
                                                        class="text-muted" title="Remove from wishlist"
                                                        data-bs-toggle="tooltip" data-bs-placement="top">
                                                    <i class="bx bx-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
