@extends('layouts.dashboard');
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-body">
                <div class="table-responsive">
                    <div class="card-body">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-2">
                                <a href="{{route('employees.create')}}"
                                   class="nav-link d-flex align-items-center text-truncate btn btn-primary"
                                   style="color: white; width: 200px">
                                            <span class="sidebar-icon">
                                                <span class="material-symbols-rounded">
                                                 add
                                                </span>
                                            </span>
                                    <span class="sidebar-text"
                                          data-tippy-content="Додади нов продукт">Креирај вработен</span>
                                </a>
                            </div>
                        </div>
                        <br>
                        <!--Begin::table card-->
                        <div class="  table-nowrap mb-3 mb-lg-5">
                            <div class="table-responsive table-card table-nowrap">
                                <table class="table align-middle table-hover mb-0">
                                    <thead>
                                    <tr>
                                        <th class="text-center">Id</th>
                                        <th class="text-center">Име</th>
                                        <th class="text-center">Позиција</th>
                                        <th class="text-center">Опис</th>
                                        <th class="text-end">Акција</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($employees as $employee)
                                        <tr>
                                            <td class="text-center"><a class="btn btn-info" style="width: 40px"
                                                                       data-tippy-content="Прикажи/Измени коментар"
                                                                       href="{{ route('employees.edit', $employee->id) }}">{{ $employee->id }}</a>
                                            </td>
                                            @csrf
                                            <td class="text-center">
                                                <span class="text">{{ $employee->name }}</span>
                                            </td>
                                            <td class="text-center">
                                                <span class="text">{{ $employee->position }}</span>
                                            </td>
                                            <td class="text-center">
                                                <span class="text">{!! $employee->description !!}</span>
                                            </td>
                                            <td class="text-end">
                                                <div class="d-flex justify-content-end align-items-center">
                                                    <a href="{{route('employees.show', $employee->id)}}"
                                                       data-tippy-content="View employee">
                                                                <span
                                                                    class="material-symbols-rounded align-middle fs-5 text-body">visibility</span>
                                                    </a>
                                                    <!--Divider line-->
                                                    <span class="border-start mx-2 d-block height-20"></span>
                                                    <a href="{{route('employees.edit', $employee->id)}}"
                                                       data-tippy-content="Edit employee">
                                                                <span
                                                                    class="material-symbols-rounded align-middle fs-5 text-body">edit</span>
                                                    </a>
                                                    <!--Divider line-->
                                                    <span class="border-start mx-2 d-block height-20"></span>
                                                    <form method="post" style="padding-top: 18px"
                                                          action="{{ route('employees.destroy', $employee->id) }}">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button
                                                            style="outline: none; border: none; background-color: white"
                                                            type="submit" data-tippy-content="Delete employee">
                                                                    <span
                                                                        class="material-symbols-rounded align-middle fs-5 text-body">delete</span>
                                                        </button>
                                                    </form>
                                                </div>
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
        </div>
    </div>
@endsection
