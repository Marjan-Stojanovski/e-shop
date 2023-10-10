@extends('layouts.dashboard');
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card card-body">
                <div class="table-responsive">
                    <div class="card-body">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-2">
                                <button class="btn btn-outline-info">Евент</button>
                            </div>
                        </div>
                        <br>
                        <br>
                        <br>

                        <div class="  table-nowrap mb-3 mb-lg-5">
                            <div class="row">
                                <div class="col-md-6">
                                    <h2>{{ $event->name }}</h2>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <p>{!! $event->description !!} </p>
                                </div>
                            </div>
                            <br>
                            <div class="text-end">
                                <a href="{{route('events.index')}}" class="btn btn-secondary mb-2 me-2"
                                   data-tippy-content="Назад кон услуги">
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

@endsection
