@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-3 mb-lg-5">
                    <div class="card-body">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-md-6">
                                <div class="text-start">
                                    <h3>Измени продукт</h3>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="text-end">
                                    <form action="{{ route('products.destroy', $product->id )}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger mb-2 me-2" data-tippy-content="Избриши">
                                            <span class="material-symbols-rounded align-middle me-2">
                                                delete
                                            </span> Избриши
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @if(Session::has('flash_message'))
                            <p class="alert alert-info">{{ Session::get('flash_message') }}</p>
                        @endif
                        <hr class="my-4">
                        <div class="row">
                            <div class="col-md-12">
                                @foreach($product->pictures as $key=>$value)
                                    <img src="/images/products/{{$product->name}}/{{ $value['image'] }}"
                                         class="mb-0 img-responsive" style="width: 150px" alt="">
                                @endforeach
                            </div>
                        </div>
                        <br>
                        <form method="post" action="{{ route('products.update', $product->id) }}"
                              enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-12 col-md-4 mb-3 d-inline-block">
                                    <!-- First name -->
                                    <div class="form-group">
                                        <!-- Label -->
                                        <label class="form-label" for="sifra">Шифра</label>
                                        <!-- Input -->
                                        <input type="text" placeholder="Шифра на продуктот"
                                               class="form-control @error('sifra') is-invalid @enderror"
                                               id="sifra" name="sifra" value="{{$product->sifra}}">
                                        @error('sifra')
                                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-4 mb-3 d-inline-block">
                                    <!-- First name -->
                                    <div class="form-group">
                                        <!-- Label -->
                                        <label class="form-label" for="name">Име</label>
                                        <!-- Input -->
                                        <input type="text" placeholder="Име на производот"
                                               class="form-control @error('name') is-invalid @enderror"
                                               id="name" name="name" value="{{$product->name}}">
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-4 mb-3 d-inline-block">
                                    <div class="form-group">
                                        <!-- Label -->
                                        <div class="col-md-12">
                                            <label for="category_id" class="form-label">Под категорија</label>
                                            <select id="category_id" class="form-select" name="category_id">
                                                <option
                                                    value="{{$product->category->id}}">{{$product->category->name}}</option>
                                                {!! $categories !!}
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="col-md-12">
                                        <br>
                                        <label for="main_image" data-tippy-placement="bottom"
                                               data-tippy-content="Изберете слика" class="btn btn-primary me-3">
                                                <span class="material-symbols-rounded align-middle me-2">
                                                    image
                                                    </span>
                                            Избери главна слика
                                        </label>
                                        <input type="file"
                                               class="form-control d-none w-0 h-0 position-absolute @error('main_image') is-invalid @enderror"
                                               id="main_image" name="main_image">
                                        @error('main_image')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="col-md-12">
                                        <br>
                                        <label for="image" data-tippy-placement="bottom"
                                               data-tippy-content="Изберете слика" class="btn btn-primary me-3">
                                                <span class="material-symbols-rounded align-middle me-2">
                                                    image
                                                    </span>
                                            Изберете слики
                                        </label>
                                        <input type="file" multiple
                                               class="form-control d-none w-0 h-0 position-absolute @error('image') is-invalid @enderror"
                                               id="image" name="image[]">
                                        @error('image')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-md-6 mb-3">
                                    <div class="form-group">
                                        <!-- Label -->
                                        <label class="form-label" for="short_info">Кратко Инфо</label>
                                        <!-- Input -->
                                        <textarea
                                            class="form-control ckeditor @error('short_info') is-invalid @enderror"
                                            id="short_info" name="short_info">{!! $product->short_info !!}</textarea>
                                        @error('short_info')
                                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-md-6 mb-3">
                                    <div class="form-group">
                                        <!-- Label -->
                                        <label class="form-label" for="description">Опис на производот</label>
                                        <!-- Input -->
                                        <textarea
                                            class="form-control ckeditor @error('description') is-invalid @enderror"
                                            id="description" name="description">{!! $product->description !!}</textarea>
                                        @error('description')
                                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 col-md-3 mb-3">
                                    <div class="form-group">
                                        <!-- Label -->
                                        <label for="brand_id" class="form-label">Бренд</label>
                                        <!--select-->
                                        <select name="brand_id" id="brand_id"
                                                class="form-control @error('brand_id') is-invalid @enderror">
                                            @foreach($brands as $brand)
                                                <option @if($product->brand_id === $brand->id) selected
                                                        @endif value="{{ $brand->id }}">{{ $brand->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('brand_id')
                                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6 col-md-3 mb-3">
                                    <div class="form-group">
                                        <!-- Label -->
                                        <label for="country_id" class="form-label">Држава</label>
                                        <!--select-->
                                        <select name="country_id" id="country_id"
                                                class="form-control @error('country_id') is-invalid @enderror">
                                            @foreach($countries as $country)
                                                <option @if($product->country_id === $country->id) selected
                                                        @endif value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('country_id')
                                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6 col-md-3 mb-3">
                                    <div class="form-group">
                                        <!-- Label -->
                                        <label for="volume_id" class="form-label">Волумен</label>
                                        <!--select-->
                                        <select name="volume_id" id="volume_id"
                                                class="form-control @error('volume_id') is-invalid @enderror">
                                            @foreach($volumes as $volume)
                                                <option @if($product->volume_id === $volume->id) selected
                                                        @endif value="{{ $volume->id }}">{{ $volume->volume }}</option>
                                            @endforeach
                                        </select>
                                        @error('volume_id')
                                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6 col-md-3 mb-3">
                                    <div class="form-group">
                                        <!-- Label -->
                                        <label class="form-label" for="alcohol">Алкохол %</label>
                                        <!-- Input -->
                                        <input type="number" step="0.1" min="0" max="99999.9"
                                               placeholder="Процент на алкохол"
                                               class="form-control @error('alcohol') is-invalid @enderror"
                                               id="alcohol" name="alcohol" value="{{ $product->alcohol }}">
                                        @error('alcohol')
                                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6 mb-3 d-inline-block">
                                    <!-- First name -->
                                    <div class="form-group">
                                        <!-- Label -->
                                        <label class="form-label" for="price">Цена</label>
                                        <!-- Input -->
                                        <input type="number" step="0.1" min="0" max="99999.9" placeholder="0.00"
                                               class="form-control @error('price') is-invalid @enderror"
                                               id="price" name="price" value="{{ $product->price }}">
                                        @error('price')
                                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <hr class="my-4">
                            <div class="row">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-12">
                                        <h6>(опционално)</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6 mb-3 d-inline-block">
                                    <!-- First name -->
                                    <div class="form-group">
                                        <!-- Label -->
                                        <label class="form-label" for="discount">Попуст во %</label>
                                        <!-- Input -->
                                        <input type="text" placeholder="0.00"
                                               class="form-control @error('discount') is-invalid @enderror"
                                               id="discount" name="discount" value="{{ $product->discount }}">
                                        @error('discount')
                                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 mb-3 d-inline-block">
                                    <!-- First name -->
                                    <div class="form-group">
                                        <!-- Label -->
                                        <label class="form-label" for="discounted_price">Цена со попуст</label>
                                        <!-- Input -->
                                        <input type="number" step="0.1" min="0" max="99999.9" placeholder="0.00"
                                               class="form-control @error('discounted_price') is-invalid @enderror"
                                               id="discounted_price" name="discounted_price"
                                               value="{{ $product->discounted_price }}">
                                        @error('discounted_price')
                                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="text-end">
                                <div class="col-12 col-md-12 mb-4">
                                    <button class="btn btn-primary mb-2 me-2" data-tippy-content="Сочувај">
                                                <span class="material-symbols-rounded align-middle me-2">
                                                    save
                                                    </span> Сочувај
                                    </button>
                                    <a href="{{route('products.index')}}" class="btn btn-secondary mb-2 me-2"
                                       data-tippy-content="Назад кон продукти">
                                                <span class="material-symbols-rounded align-middle me-2">
                                                    arrow_back_ios
                                                    </span> Назад</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            $('#discount').change(() => {
                let discountTemp = $('#discount').val();
                let discountTemp2 = discountTemp / 100;
                let discount = 1 - discountTemp2;
                let price = $('#price').val();
                let discountedPrice = price * discount;

                $('#discounted_price').val(discountedPrice);
            })

            $('#price').change(() => {
                let discountTemp = $('#discount').val();
                if (discountTemp !== '') {
                    let discountTemp2 = discountTemp / 100;
                    let discount = 1 - discountTemp2;
                    let price = $('#price').val();
                    let discountedPrice = price * discount;

                    $('#discounted_price').val(discountedPrice);
                }
            })
        });
    </script>
@endsection
