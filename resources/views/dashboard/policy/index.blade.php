@extends('layouts.dashboard');
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-between align-items-center">
            <div class="col-2">
                <a href="{{route('policies.create')}}"
                   class="nav-link d-flex align-items-center text-truncate btn btn-primary"
                   style="color: white; width: 230px">
                                            <span class="sidebar-icon">
                                                <span class="material-symbols-rounded">
                                                 add
                                                </span>
                                            </span>
                    <span class="sidebar-text" data-tippy-content="Додади информации">Додади текст</span>
                </a>
                <br>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 mb-3 col-lg-12">
                <div class="card overflow-hidden">
                    <div class="card-header">
                        <h5 class="mb-0">{{ $policy->name }}</h5>
                    </div>
                    <div class="card-body" style="min-height: 5rem;">
                        {!! $policy->description !!}
                    </div>
                    <div class="card-footer">
                        <div class="text-end">
                            <a href="{{ route('policies.edit', $policy->id) }}" class="btn btn-warning">Измени</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


