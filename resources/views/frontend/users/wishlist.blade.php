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
                                    <th>Picture</th>
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
                                            @foreach($wishlist->product->pictures as $key=>$value)
                                                @if($key === 0)
                                                    <img src="/images/products/{{$wishlist->product->name}}/{{ $value['image'] }}"
                                                         class="mb-0 img-responsive" style="width: 50px" alt="">
                                                @endif
                                            @endforeach
                                        </td>
                                        <td class="align-middle">
                                            <div>
                                                <h5 class="fs-6 mb-0"><a href="#"
                                                                         class="text-inherit">{{ $wishlist->product->name }}</a>
                                                </h5>
                                                <small>
                                                    @if(isset($wishlist->product->discounted_price))
                                                        €&nbsp;{{ $wishlist->product->discounted_price }}
                                                    @else
                                                        €&nbsp;{{ $wishlist->product->price }}
                                                    @endif
                                                </small>
                                            </div>
                                        </td>
                                        <td class="text-center align-middle">
                                            @if(isset($wishlist->product->discounted_price))
                                                €&nbsp;{{ $wishlist->product->discounted_price }}
                                            @else
                                                €&nbsp;{{ $wishlist->product->price }}
                                            @endif
                                        </td>
                                        <td class="text-center align-middle">
                                            <form action="{{ route('addToCart.wishlistDelete', $wishlist->id)}}"  method="POST" class="clearfix"
                                                  enctype="multipart/form-data">
                                                @csrf
                                                @method('delete')
                                                <input type="hidden" value="{{ $wishlist->product->id }}" name="product_id">
                                                <input type="hidden" value="{{ $wishlist->product->name }}"
                                                       name="name">
                                                <input type="hidden" value="1" name="quantity">
                                                @if(isset($wishlist->product->discounted_price))
                                                    <input type="hidden" value="{{ $wishlist->product->discounted_price }}"
                                                           name="price">
                                                @else
                                                    <input type="hidden" value="{{ $wishlist->product->price }}"
                                                           name="price">
                                                @endif
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
