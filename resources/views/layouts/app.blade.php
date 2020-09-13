<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet" type="text/css">
    <link href="/bower_components/select2/dist/css/select2.min.css" rel="stylesheet">
    <link href="/bower_components/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <link href="/bower_components/dropzone/dist/dropzone.css" rel="stylesheet">
    <link href="/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="/bower_components/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
    <link href="/bower_components/perfect-scrollbar/css/perfect-scrollbar.min.css" rel="stylesheet">
    <link href="/bower_components/slick-carousel/slick/slick.css" rel="stylesheet">
    <link href="/css/main.css?version=4.5.0" rel="stylesheet">

    @livewireStyles

    <script src="https://cdn.jsdelivr.net/npm/turbolinks@5.2.0/dist/turbolinks.min.js" defer></script>
</head>
{{-- full-screen with-content-panel --}}
<body class="menu-position-side menu-side-left full-screen">
    <div class="all-wrapper solid-bg-all">
        <div class="layout-w">
            <!--------------------
          START - Mobile Menu
          -------------------->
            <div class="menu-mobile menu-activated-on-click color-scheme-dark">
                <div class="mm-logo-buttons-w">
                    <a class="mm-logo" href="/">
                        <img src="img/logo.png">
                        <span>Work Mate</span>
                    </a>
                    <div class="mm-buttons">
                        <div class="content-panel-open">
                            <div class="os-icon os-icon-grid-circles"></div>
                        </div>
                        <div class="mobile-menu-trigger">
                            <div class="os-icon os-icon-hamburger-menu-1"></div>
                        </div>
                    </div>
                </div>
                <div class="menu-and-user">
                    <div class="logged-user-w">
                        <div class="avatar-w" style="border: unset;">
                            <img alt="" src="{{ auth()->user()->company()->brand->logo_url }}">
                        </div>
                    </div>
                    <!--------------------
              START - Mobile Menu List
              -------------------->
                    <ul class="main-menu">
                        <li class="">
                            <a href="/dashboard">
                                <div class="icon-w">
                                    <div class="os-icon os-icon-layout"></div>
                                </div>
                                <span>Dashboard</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!--------------------
          END - Mobile Menu
          -------------------->
            <!--------------------
          START - Main Menu
          -------------------->
            <div
                class="menu-w color-scheme-light color-style-transparent menu-position-side menu-side-left menu-layout-compact sub-menu-style-over sub-menu-color-bright selected-menu-color-light menu-activated-on-hover menu-has-selected-link">
                <div class="logo-w">
                    <a class="logo" href="index.html">
                        <div class="logo-element"></div>
                        <div class="logo-label">
                            Work Mate
                        </div>
                    </a>
                </div>
                <div class="logged-user-w avatar-inline">
                    <div class="logged-user-i">
                        <div class="avatar-w" style="border: unset;">
                            <img alt="" src="{{ auth()->user()->company()->brand->logo_url }}">
                        </div>
                        <div class="logged-user-info-w">
                            <div class="logged-user-name">
                                {{ auth()->user()->company()->name }}
                            </div>
                            <div class="logged-user-role">
                                {{ auth()->user()->company()->industry }}
                            </div>
                        </div>
                        <div class="logged-user-toggler-arrow">
                            <div class="os-icon os-icon-chevron-down"></div>
                        </div>
                        <div class="logged-user-menu color-style-bright">
                            <ul>
                                <li>
                                    <a href="/company/invite">
                                        <i class="os-icon os-icon-user"></i><span>Invite</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="/company/settings">
                                        <i class="os-icon os-icon-settings"></i><span>Settings</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <h1 class="menu-page-header">
                    Page Header
                </h1>
                <ul class="main-menu">
                    <li class="sub-header">
                        <span>Manage</span>
                    </li>
                    <li class="">
                        <a href="/dashboard">
                            <div class="icon-w">
                                <div class="os-icon os-icon-layout"></div>
                            </div>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="selected has-sub-menu">
                        <a href="/bounties">
                            <div class="icon-w">
                                <div class="os-icon os-icon-layout"></div>
                            </div>
                            <span>Bounties</span>
                        </a>
                        <div class="sub-menu-w">
                            <div class="sub-menu-header">
                                Bounties
                            </div>
                            <div class="sub-menu-icon">
                                <i class="os-icon os-icon-layout"></i>
                            </div>
                            <div class="sub-menu-i">
                                <ul class="sub-menu">
                                    <li>
                                        <a href="/bounties/create">Create</a>
                                    </li>
                                    <li>
                                        <a href="/bounties/active">Active</a>
                                    </li>
                                    <li>
                                        <a href="/bounties/all">All</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        </a>
                    </li>
                </ul>
            </div>
            <!--------------------
          END - Main Menu
          -------------------->
            <div class="content-w">
                <!--------------------
            START - Top Bar
            -------------------->
                <div class="top-bar color-scheme-transparent">
                    <!--------------------
              START - Top Menu Controls
              -------------------->
                    <div class="top-menu-controls">
                        <div class="element-search autosuggest-search-activator">
                            <input placeholder="Start typing to search..." type="text">
                        </div>

                        <!--------------------
                END - Settings Link in secondary top menu
                -------------------->
                        <!--------------------
                START - User avatar and menu in secondary top menu
                -------------------->
                        <div class="logged-user-w">
                            <div class="logged-user-i">
                                <div class="avatar-w">
                                    <img alt="" src="{{ auth()->user()->gravatar }}">
                                </div>
                                <div class="logged-user-menu color-style-bright">
                                    <div class="logged-user-avatar-info">
                                        <div class="avatar-w">
                                            <img alt="" src="{{ auth()->user()->gravatar }}">
                                        </div>
                                        <div class="logged-user-info-w">
                                            <div class="logged-user-name">
                                                {{ auth()->user()->email }}
                                            </div>
                                            <div class="logged-user-role">
                                                {{ auth()->user()->companyOwner()
                                                    ? 'Admin'
                                                    : 'Company Staff' }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bg-icon">
                                        <i class="os-icon os-icon-wallet-loaded"></i>
                                    </div>
                                    <ul>
                                        <li>
                                            <a href="#"><i class="os-icon os-icon-signs-11"></i><span>Logout</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--------------------
                END - User avatar and menu in secondary top menu
                -------------------->
                    </div>
                    <!--------------------
              END - Top Menu Controls
              -------------------->
                </div>
                <!--------------------
            END - Top Bar
            -------------------->
                @yield('content')
                <!--------------------
            START - Breadcrumbs
            -------------------->
            </div>
        </div>
        <div class="display-type"></div>
    </div>
    <script src="/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="/bower_components/popper.js/dist/umd/popper.min.js"></script>
    <script src="/bower_components/moment/moment.js"></script>
    <script src="/bower_components/chart.js/dist/Chart.min.js"></script>
    <script src="/bower_components/select2/dist/js/select2.full.min.js"></script>
    <script src="/bower_components/jquery-bar-rating/dist/jquery.barrating.min.js"></script>
    <script src="/bower_components/ckeditor/ckeditor.js"></script>
    <script src="/bower_components/bootstrap-validator/dist/validator.min.js"></script>
    <script src="/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="/bower_components/ion.rangeSlider/js/ion.rangeSlider.min.js"></script>
    <script src="/bower_components/dropzone/dist/dropzone.js"></script>
    <script src="/bower_components/editable-table/mindmup-editabletable.js"></script>
    <script src="/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="/bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
    <script src="/bower_components/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js"></script>
    <script src="/bower_components/tether/dist/js/tether.min.js"></script>
    <script src="/bower_components/slick-carousel/slick/slick.min.js"></script>
    <script src="/bower_components/bootstrap/js/dist/util.js"></script>
    <script src="/bower_components/bootstrap/js/dist/alert.js"></script>
    <script src="/bower_components/bootstrap/js/dist/button.js"></script>
    <script src="/bower_components/bootstrap/js/dist/carousel.js"></script>
    <script src="/bower_components/bootstrap/js/dist/collapse.js"></script>
    <script src="/bower_components/bootstrap/js/dist/dropdown.js"></script>
    <script src="/bower_components/bootstrap/js/dist/modal.js"></script>
    <script src="/bower_components/bootstrap/js/dist/tab.js"></script>
    <script src="/bower_components/bootstrap/js/dist/tooltip.js"></script>
    <script src="/bower_components/bootstrap/js/dist/popover.js"></script>
    <script src="/js/demo_customizer.js?version=4.5.0"></script>
    <script src="/js/main.js?version=4.5.0"></script>

    @livewireScripts
</body>

</html>
