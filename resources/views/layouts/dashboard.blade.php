<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Košar CMS</title>
    <link rel="icon" href="/assets/img/logo.jpg" type="image/ico">
    <!--Bootstrap icons-->
    <link href="/assets/dashboard/fonts/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <!--Google web fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Figtree:wght@300..900&family=IBM+Plex+Mono:ital@0;1&display=swap"
        rel="stylesheet">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0"/>
    <!--Simplebar css-->
    <link rel="stylesheet" href="/assets/dashboard/vendor/css/simplebar.min.css">
    <!--Choices css-->
    <link rel="stylesheet" href="/assets/dashboard/vendor/css/choices.min.css">
    <link href="/assets/dashboard/vendor/css/quill.snow.css" rel="stylesheet">
    <!--Main style-->
    <link rel="stylesheet" href="/assets/dashboard/css/style.min.css">
</head>
<body>
{{--<!--////////////////// PreLoader Start//////////////////////-->--}}
{{--<div class="loader bg-gradient-primary text-white">--}}
{{--    <div class="content flex-column p-4 pb-0 d-flex justify-content-center align-items-center flex-column-fluid position-relative">--}}
{{--        <div class="w-100 h-100 position-relative d-flex align-items-center justify-content-center">--}}
{{--            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"--}}
{{--                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"--}}
{{--                 class="feather feather-loader spinner-grow  me-2">--}}
{{--                <line x1="12" y1="2" x2="12" y2="6"/>--}}
{{--                <line x1="12" y1="18" x2="12" y2="22"/>--}}
{{--                <line x1="4.93" y1="4.93" x2="7.76" y2="7.76"/>--}}
{{--                <line x1="16.24" y1="16.24" x2="19.07" y2="19.07"/>--}}
{{--                <line x1="2" y1="12" x2="6" y2="12"/>--}}
{{--                <line x1="18" y1="12" x2="22" y2="12"/>--}}
{{--                <line x1="4.93" y1="19.07" x2="7.76" y2="16.24"/>--}}
{{--                <line x1="16.24" y1="7.76" x2="19.07" y2="4.93"/>--}}
{{--            </svg>--}}
{{--            <div>--}}
{{--                <span>Loading...</span>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
<!--App Start-->
<div class="d-flex flex-column flex-root">
    <div class="page d-flex flex-row flex-column-fluid">
        <!--///////////Page sidebar begin///////////////-->
        <aside class="page-sidebar">
            <div class="h-100 flex-column d-flex justify-content-start">
                <!--Aside-logo-->
                <div class="aside-logo d-flex align-items-center flex-shrink-0 justify-content-start px-5 position-relative">
                    <a href="{{route('company_info.index')}}" class="d-block">
                        <div class="d-flex align-items-center flex-no-wrap text-truncate">
                            <span class="sidebar-icon size-40 d-flex align-items-center justify-content-center fs-4 lh-1 text-white rounded-3 bg-gradient-primary fw-bolder"> K </span>
                            <span class="sidebar-text">
                    <span class="sidebar-text text-truncate fs-3 fw-bold">
                      KosarCMS
                    </span>
                  </span>
                        </div>
                    </a>
                </div>
                <div class="aside-logo d-flex align-items-center flex-shrink-0 justify-content-start px-5 position-relative">
                    <a href="{{route('frontend.index')}}" class="d-block">
                        <div class="d-flex align-items-center flex-no-wrap text-truncate">
                            <span class="sidebar-text">
                    <span class="sidebar-text text-center btn btn-primary text-truncate fs-3">
                      To main page
                    </span>
                  </span>
                        </div>
                    </a>
                </div>
                <!--Sidebar-Menu-->
                <div class="aside-menu px-3 my-auto" data-simplebar>
                    <nav class="flex-grow-1 h-100" id="page-navbar">
                        <!--:Sidebar nav-->
                        <ul class="nav flex-column collapse-group collapse d-flex">
                            <li class="nav-item sidebar-title text-truncate opacity-50 small">
                                <i class="bi bi-three-dots"></i>
                                <span>Главно мени</span>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('users.index')}}"
                                   class="nav-link d-flex align-items-center text-truncate ">
                              <span class="sidebar-icon">
                                <i class="fs-2 text-primary d-block mb-2 bi bi-person-check"></i>
                              </span>
                                    <!--Sidebar nav text-->
                                    <span class="sidebar-text" style="padding-bottom: 9px;">Корисници</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('company_info.index')}}"
                                   class="nav-link d-flex align-items-center text-truncate ">
                              <span class="sidebar-icon">
                                <i class="fs-2 text-primary d-block mb-2 bi bi-info-square"></i>
                              </span>
                                    <!--Sidebar nav text-->
                                    <span class="sidebar-text" style="padding-bottom: 9px;">Инфо за компанијата</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('employees.index')}}"
                                   class="nav-link d-flex align-items-center text-truncate ">
                              <span class="sidebar-icon">
                                <i class="fs-2 text-primary d-block mb-2 bi bi-people"></i>
                              </span>
                                    <!--Sidebar nav text-->
                                    <span class="sidebar-text" style="padding-bottom: 9px;">Вработени</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('policies.index') }}"
                                   class="nav-link d-flex align-items-center text-truncate ">
                              <span class="sidebar-icon">
                                <i class="fs-2 text-primary d-block mb-2 bi bi-gear"></i>
                              </span>
                                    <!--Sidebar nav text-->
                                    <span class="sidebar-text" style="padding-bottom: 9px;">Politika zasebnosti</span>
                                </a>
                            </li>
                            <li class="nav-item sidebar-title text-truncate opacity-50 small">
                                <i class="bi bi-three-dots"></i>
                                <span>Уредување на веб страна</span>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('sliders.index')}}"
                                   class="nav-link d-flex align-items-center text-truncate ">
                              <span class="sidebar-icon">
                                <i class="fs-2 text-primary d-block mb-2 bi bi-card-image"></i>
                              </span>
                                    <!--Sidebar nav text-->
                                    <span class="sidebar-text" style="padding-bottom: 9px;">Слајдер</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('categories.index')}}"
                                   class="nav-link d-flex align-items-center text-truncate ">
                              <span class="sidebar-icon">
                                  <i class="fs-2 text-primary d-block mb-2 bi bi-list-task"></i>
                              </span>
                                    <span class="sidebar-text" style="padding-bottom: 9px;">Категории</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('products.index')}}"
                                   class="nav-link d-flex align-items-center text-truncate ">
                              <span class="sidebar-icon">
                                <i class="fs-2 text-primary d-block mb-2 bi bi-patch-plus"></i>
                              </span>
                                    <span class="sidebar-text" style="padding-bottom: 9px;">Продукти</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('comments.index')}}"
                                   class="nav-link d-flex align-items-center text-truncate ">
                              <span class="sidebar-icon">
                                <i class="fs-2 text-primary d-block mb-2 bi bi-chat-right-text"></i>
                              </span>
                                    <span class="sidebar-text" style="padding-bottom: 9px;">Коментари за продукти</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('brands.index')}}"
                                   class="nav-link d-flex align-items-center text-truncate ">
                              <span class="sidebar-icon">
                                <i class="fs-2 text-primary d-block mb-2 bi bi-bookmark-check"></i>
                              </span>
                                    <span class="sidebar-text" style="padding-bottom: 9px;">Брендови</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('events.index') }}"
                                   class="nav-link d-flex align-items-center text-truncate ">
                              <span class="sidebar-icon">
                                <i class="fs-2 text-primary d-block mb-2 bi bi-calendar-event"></i>
                              </span>
                                    <!--Sidebar nav text-->
                                    <span class="sidebar-text" style="padding-bottom: 9px;">Евенти</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('albums.index') }}"
                                   class="nav-link d-flex align-items-center text-truncate ">
                              <span class="sidebar-icon">
                                <i class="fs-2 text-primary d-block mb-2 bi bi-journal-album"></i>
                              </span>
                                    <!--Sidebar nav text-->
                                    <span class="sidebar-text" style="padding-bottom: 9px;">Албуми</span>
                                </a>
                            </li>
                            <li class="nav-item sidebar-title text-truncate opacity-50 small">
                                <i class="bi bi-three-dots"></i>
                                <span>Општи уредувања</span>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('messages.index')}}"
                                   class="nav-link d-flex align-items-center text-truncate ">
                              <span class="sidebar-icon">
                                <i class="fs-2 text-primary d-block mb-2 bi bi-messenger"></i>
                              </span>
                                    <span class="sidebar-text" style="padding-bottom: 9px;">Пораки</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('orders.list')}}"
                                   class="nav-link d-flex align-items-center text-truncate ">
                              <span class="sidebar-icon">
                                <i class="fs-2 text-primary d-block mb-2 bi bi-cart-check"></i>
                              </span>
                                    <span class="sidebar-text" style="padding-bottom: 9px;">Порачки</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </aside>
        <!--///////////Page Sidebar End///////////////-->
        <div
            class="sidebar-close d-lg-none">
            <a href="#"></a>
        </div>
        <!--///////////Page content wrapper///////////////-->
        <main class="page-content d-flex flex-column flex-row-fluid">
            <header class="navbar mb-3 px-3 px-lg-6 px-3 px-lg-6 align-items-center page-header navbar-expand navbar-light">
                <ul class="navbar-nav d-flex align-items-center h-100">
                    <li class="nav-item d-none d-lg-flex flex-column h-100 me-2 align-items-center justify-content-center"
                        data-tippy-placement="bottom-start" data-tippy-content="Toggle Sidebar">
                        <a href="javascript:void(0)"
                           class="sidebar-trigger nav-link size-40 d-flex align-items-center justify-content-center p-0">
                  <span class="material-symbols-rounded">
                    menu_open
                    </span>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto d-flex align-items-center h-100">
                    <li class="nav-item d-flex align-items-center justify-content-center flex-column h-100 me-2">
                        <label
                            class="dark-mode-checkbox size-40 d-flex align-items-center justify-content-center nav-link p-0"
                            for="ChangeTheme">
                            <input type="checkbox"  id="ChangeTheme"><span class="slide"></span>
                        </label>
                    </li>
                    <li class="nav-item dropdown d-flex align-items-center justify-content-center flex-column h-100">
                        <a href="#"
                           class="nav-link dropdown-toggle height-40 px-2 d-flex align-items-center justify-content-center"
                           aria-expanded="false" data-bs-toggle="dropdown" data-bs-auto-close="outside">
                            <div class="d-flex align-items-center">
                                <div class="avatar-status status-online me-sm-2 avatar xs">
                                    <img src="/assets/dashboard/media/avatars/01.jpg" class="rounded-circle img-fluid" alt="">
                                </div>
                                <span class="d-none d-md-inline-block">{{Auth::user()->name}}</span>
                            </div>
                        </a>
                        <div class="dropdown-menu mt-0 p-0 dropdown-menu-end overflow-hidden">
                            <div class="position-relative overflow-hidden px-3 pt-4 pb-7 bg-gradient-primary text-white">
                                <svg style="transform: rotate(-180deg)" preserveAspectRatio="none"
                                     class="position-absolute start-0 bottom-0 w-100 dropdown-wave" fill="currentColor"
                                     height="24" viewBox="0 0 1200 120"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M0 0v46.29c47.79 22.2 103.59 32.17 158 28 70.36-5.37 136.33-33.31 206.8-37.5 73.84-4.36 147.54 16.88 218.2 35.26 69.27 18 138.3 24.88 209.4 13.08 36.15-6 69.85-17.84 104.45-29.34C989.49 25 1113-14.29 1200 52.47V0z"
                                        opacity=".25"/>
                                    <path
                                        d="M0 0v15.81c13 21.11 27.64 41.05 47.69 56.24C99.41 111.27 165 111 224.58 91.58c31.15-10.15 60.09-26.07 89.67-39.8 40.92-19 84.73-46 130.83-49.67 36.26-2.85 70.9 9.42 98.6 31.56 31.77 25.39 62.32 62 103.63 73 40.44 10.79 81.35-6.69 119.13-24.28s75.16-39 116.92-43.05c59.73-5.85 113.28 22.88 168.9 38.84 30.2 8.66 59 6.17 87.09-7.5 22.43-10.89 48-26.93 60.65-49.24V0z"
                                        opacity=".5"/>
                                    <path
                                        d="M0 0v5.63C149.93 59 314.09 71.32 475.83 42.57c43-7.64 84.23-20.12 127.61-26.46 59-8.63 112.48 12.24 165.56 35.4C827.93 77.22 886 95.24 951.2 90c86.53-7 172.46-45.71 248.8-84.81V0z"/>
                                </svg>
                                <div class="position-relative">
                                    <h5 class="mb-1">{{Auth::user()->firstName }} {{Auth::user()->lastName}}</h5>
                                </div>
                            </div>
                            <div class="pt-2">
                                <hr class="my-2">
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                                   class="dropdown-item d-flex align-items-center">
                      <span
                          class="material-symbols-rounded align-middle me-2 size-30 fs-5 d-flex align-items-center justify-content-center bg-warning text-white rounded-2">
                      logout
                      </span>
                                    <span class="flex-grow-1">{{ __('Logout') }}</span>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </a>
                            </div>
                        </div>
                    </li>
                    <li
                        class="nav-item dropdown ms-2 d-flex d-lg-none align-items-center justify-content-center flex-column h-100">
                        <a href="javascript:void(0)"
                           class="nav-link sidebar-trigger-lg-down size-40 p-0 d-flex align-items-center justify-content-center">
                            <span class="material-symbols-rounded align-middle">menu</span>
                        </a>
                    </li>
                </ul>
            </header>
            <!--Main Header End-->
            <!--Main Search Modal-->

            <div class="content pt-3 px-3 px-lg-6 d-flex flex-column-fluid">
                <div class="container-fluid px-0">
                    @yield('content')
                </div>
            </div>
            <footer class="pb-3 pb-lg-5 px-3 px-lg-6">
                <div class="container-fluid px-0">
                <span class="d-block lh-sm small text-muted text-end">&copy;
                  <script>
                    document.write(new Date().getFullYear())
                  </script>. Copyright
                </span>
                </div>
            </footer>
        </main>
    </div>
</div>
<!--////////////Theme Core scripts Start/////////////////-->
<script src="/assets/dashboard/js/theme.bundle.js"></script>
<!--////////////Theme Core scripts End/////////////////-->
<!--Datatables-->
<script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.0/js/dataTables.bootstrap5.min.js"></script>
<script src="/assets/dashboard/vendor/quill.min.js"></script>
<script src="/assets/ckeditor/ckeditor.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Datatables Responsive
        $("#datatable").DataTable({
            "filter": false,
            "length": false
        });
    });
    var toolbarOptions = [
        ["bold", "underline"],
        ["link", "blockquote", "code", "image"],
        [{list: "ordered"}, {list: "bullet"}]
    ];
    $('.quill-editor').each(function (i, el) {
        var el = $(this), id = 'quilleditor-' + i, val = el.val(), editor_height = 200;
        var div = $('<div/>').attr('id', id).css('height', editor_height + 'px').html(val);
        el.addClass('d-none');
        el.parent().append(div);
        var quill = new Quill('#' + id, {
            modules: {toolbar: toolbarOptions},
            theme: 'snow'
        });
        quill.on('text-change', function () {
            console.log(quill.container.firstChild.innerHTML);
            el.html();
            $("#description").val(quill.container.firstChild.innerHTML);
        });
    });
</script>
@yield('scripts')
</body>
</html>
