@extends('layouts.dashboard')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-3 mb-lg-5">
                    <div class="card-body">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-md-6">
                                <div class="text-start">
                                    <br>
                                    <h4>Слики од производот -> {{ $product->name }}</h4>
                                </div>
                            </div>
                        </div>
                        <br>
                        <table class="table table-responsive align-middle table-hover mb-0">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th class="text-center">Слика</th>
                                <th class="text-end">Акција</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($pictures as $picture)
                                @if($picture->main_image === null)
                                <tr>
                                    <td>{{$picture->id}}</td>
                                    @csrf
                                    <td class="text-center">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1">
                                                <img src="/images/products/{{$product->name}}/{{ $picture->image }}"
                                                     class="mb-0 img-responsive" style="width: 50px" alt="">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-end">
                                        <form method="post"
                                              action="{{ route('products.destroy.images', $picture->id) }}">
                                            @method('DELETE')
                                            @csrf
                                            <button
                                                style="outline: none; border: none; background-color: white"
                                                type="submit" data-tippy-content="Избриши">
                                                                    <span
                                                                        class="material-symbols-rounded align-middle fs-5 text-body">delete</span>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                        <br>
                        <div class="text-end">
                            <a href="{{ route('products.index') }}" class="btn btn-secondary"
                               data-tippy-content="Назад">
                                                <span class="material-symbols-rounded align-middle me-2">
                                                    arrow_back_ios
                                                    </span> Назад</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection


