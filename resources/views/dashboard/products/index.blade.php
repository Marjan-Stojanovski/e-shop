@extends('layouts.dashboard')
@section('content')

    <div class="card table-card table-nowrap mb-3 mb-lg-5">
        <div class="table-responsive table-card">
            <div class="container-fluid">
                <div class="row justify-content-between align-items-center">
                    <div class="col-md-6">
                        <div class="text-start">
                            <br>
                            <a href="{{route('products.create')}}"
                               class="btn btn-primary">Креирај производ</a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="text-end">
                            <br>
                            <p class="btn btn-success mb-2 me-2" data-tippy-content="Број на продукти">
                                Број на продукти: {{count($products)}}
                            </p>
                        </div>
                    </div>
                </div>
                @if(count($products) === 0)
                    <br>
                    <br>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="text-center">
                                <h3>Нема внесено производи!!!</h3>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                @else
                    <br>
                    <table class="table table-responsive align-middle table-hover mb-0">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th class="text-center">Главна слика</th>
                            <th class="text-center">Име</th>
                            <th class="text-center">Slug</th>
                            <th class="text-center">Категорија</th>
                            <th class="text-center">Слики</th>
                            <th class="text-center">Цена</th>
                            <th class="text-center">Цена со попуст</th>
                            <th class="text-center">Попуст %</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td><a class="btn btn-info" style="width: 40px"
                                       data-tippy-content="Прикажи/Измени продукт"
                                       href="{{route('products.edit', $product->id)}}">{{$product->id}}</a></td>
                                @csrf
                                <td class="text-center">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            @foreach($product->pictures as $picture)
                                                @if($picture->main_image === 'yes')
                                                    <img src="/images/products/{{$product->name}}/{{ $picture->image }}"
                                                         class="mb-0 img-responsive" style="width: 50px" alt="">
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <span class="text">{{$product->name}}</span>
                                </td>
                                <td class="text-center">
                                    <span class="text">{{ $product->slug }}</span>
                                </td>
                                <td class="text-center">
                                    <span class="text">{{$product->category->name}}</span>
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('products.images', $product->id) }}" class="btn btn-info btn-sm">Види
                                        слики</a>
                                </td>
                                <td class="text-center">
                                    <span class="text">{{$product->price}}&nbsp;€</span>
                                </td>
                                @if($product->discounted_price)
                                    <td class="text-center">
                                        <span class="text">{{$product->discounted_price}}&nbsp;€</span>
                                    </td>
                                @else
                                    <td class="text-center">
                                        <span class="text">-</span>
                                    </td>
                                @endif
                                @if($product->discount)
                                    <td class="text-center">
                                        <span class="text">{{$product->discount}} %</span>
                                    </td>
                                @else
                                    <td class="text-center">
                                        <span class="text">-</span>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <br>
                    <div class="d-grid d-sm-flex justify-content-sm-center">
                        <div class="col-md-12 text-center">
                            {{ $products->links() }}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
