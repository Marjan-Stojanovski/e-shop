@extends('layouts.dashboard');
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <form method="post" action="{{route('company_info.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="col-lg-12">
                        <!--Card-->
                        <div class="card mb-3 mb-lg-5">
                            <div class="card-body">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-12">
                                        <h3>Информации за компанијата</h3>
                                    </div>
                                </div>
                                <hr class="my-4">
                                <div class="row">
                                    <div class="col-12 col-md-6 mb-3 d-inline-block">
                                        <!-- First name -->
                                        <div class="form-group">
                                            <!-- Label -->
                                            <label class="form-label" for="name">Име на компанијата</label>
                                            <!-- Input -->
                                            <input type="text" placeholder="Внесете име на компанијата"
                                                   class="form-control @error('name') is-invalid @enderror"
                                                   id="name" name="name">
                                            @error('name')
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
                                            <label class="form-label" for="info">Инфо за компанијата</label>
                                            <!-- Input -->
                                            <input type="text" placeholder="Инфо за компанијата"
                                                   class="form-control @error('info') is-invalid @enderror"
                                                   id="info" name="info">
                                            @error('info')
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
                                            <label class="form-label" for="mail">Email</label>
                                            <!-- Input -->
                                            <input type="email" placeholder="Внеси Email"
                                                   class="form-control @error('mail') is-invalid @enderror"
                                                   id="mail" name="mail">
                                            @error('mail')
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
                                            <label class="form-label" for="address">Адреса</label>
                                            <!-- Input -->
                                            <input type="text" placeholder="Внеси адреса"
                                                   class="form-control @error('address') is-invalid @enderror"
                                                   id="address" name="address">
                                            @error('address')
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
                                            <label class="form-label" for="phone">Телефон</label>
                                            <!-- Input -->
                                            <input type="text" placeholder="Внеси телефон"
                                                   class="form-control @error('phone') is-invalid @enderror"
                                                   id="phone" name="phone">
                                            @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mb-3 d-inline-block">
                                        <div class="form-group">
                                            <!-- Label -->
                                            <label for="city_id" class="form-label">Град</label>
                                            <!--select-->
                                            <select name="city_id" id="city_id"
                                                    class="form-control @error('city_id') is-invalid @enderror">
                                                @foreach($cities as $city)
                                                    <option value="{{ $city->id }}">{{ $city->admin_name }}</option>
                                                @endforeach
                                                @error('city_id')
                                                <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-6 mb-3 d-inline-block">
                                        <!-- First name -->
                                        <div class="form-group">
                                            <!-- Label -->
                                            <label class="form-label" for="trr">TRR</label>
                                            <!-- Input -->
                                            <input type="text" placeholder="Внеси TRR"
                                                   class="form-control @error('trr') is-invalid @enderror"
                                                   id="trr" name="trr">
                                            @error('trr')
                                            <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <div class="col-md-12">
                                            <br>
                                            <label for="image" data-tippy-placement="bottom"
                                                   data-tippy-content="Изберете Лого" class="btn btn-primary me-3">
                                                <span class="material-symbols-rounded align-middle me-2">
                                                    image
                                                    </span>
                                                Изберете Лого
                                            </label>
                                            <input type="file"
                                                   class="form-control d-none w-0 h-0 position-absolute @error('image') is-invalid @enderror"
                                                   id="image" name="image">
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
                                            <label class="form-label" for="description">Опис</label>
                                            <!-- Input -->
                                            <textarea
                                                class="form-control quill-editor @error('description') is-invalid @enderror"
                                                id="description" name="description"></textarea>
                                            @error('description')
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
                                            <label class="form-label" for="facebook">Facebook</label>
                                            <!-- Input -->
                                            <input type="text" placeholder="Линк до профилот"
                                                   class="form-control @error('facebook') is-invalid @enderror"
                                                   id="facebook" name="facebook">
                                            @error('facebook')
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
                                            <label class="form-label" for="instagram">Instagram</label>
                                            <!-- Input -->
                                            <input type="text" placeholder="Линк до профилот"
                                                   class="form-control @error('instagram') is-invalid @enderror"
                                                   id="instagram" name="instagram">
                                            @error('instagram')
                                            <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-6 mb-3">
                                        <div class="form-group">
                                            <!-- Label -->
                                            <label for="user_id" class="form-label">Улога</label>
                                            <!--select-->
                                            <select name="user_id" id="user_id"
                                                    class="form-control @error('user_id') is-invalid @enderror">
                                                @foreach($users as $user)
                                                    <option
                                                        value="{{ $user->id }}">{{ $user->firstName }} {{ $user->lastName }}</option>
                                                @endforeach
                                                @error('user_id')
                                                <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="text-end">
                                                <button type="submit" id="profile_save" class="btn btn-primary"
                                                        data-tippy-content="Сочувај">
                                        <span class="material-symbols-rounded align-middle me-2">
                                                    save
                                                    </span>Сочувај
                                                </button>
                                                <a href="{{route('company_info.index')}}" class="btn btn-secondary"
                                                   data-tippy-content="Назад кон продукти">
                                                <span class="material-symbols-rounded align-middle me-2">
                                                    arrow_back_ios
                                                    </span> Назад</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection




