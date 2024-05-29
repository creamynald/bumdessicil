<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title>{{ config('app.name') }} - Bootstrap 5 Admin Template &amp; UI Framework</title>

    <meta name="description"
        content="Codebase - Bootstrap 5 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">

    <!-- Open Graph Meta -->
    <meta property="og:title" content="Codebase - Bootstrap 5 Admin Template &amp; UI Framework">
    <meta property="og:site_name" content="Codebase">
    <meta property="og:description"
        content="Codebase - Bootstrap 5 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="{{ asset('assets/media/favicons/favicon.png') }}">
    <link rel="icon" type="image/png" sizes="192x192"
        href="{{ asset('assets/media/favicons/favicon-192x192.png') }}">
    <link rel="apple-touch-icon" sizes="180x180"
        href="{{ asset('assets/media/favicons/apple-touch-icon-180x180.png') }}">
    <!-- END Icons -->

    <!-- Stylesheets -->
    <!-- Codebase framework -->
    <link rel="stylesheet" id="css-main" href="{{ asset('assets/css/codebase.min.css') }}">

    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
    <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/flat.min.css"> -->
    <link rel="stylesheet" id="css-theme" href="{{ asset('assets/css/themes/flat.min.css') }}">
    <!-- END Stylesheets -->
</head>

<body>
    <!-- Page Container -->
    <div id="page-container" class="sidebar-dark side-scroll page-header-fixed page-header-glass main-content-boxed">

        <!-- Sidebar -->
        <nav id="sidebar">
            <!-- Sidebar Content -->
            <div class="sidebar-content">
                <!-- Side Header -->
                <div class="content-header justify-content-lg-center bg-black-10">
                    <!-- Logo -->
                    <div>
                        <span class="smini-visible fw-bold tracking-wide fs-lg">
                            c<span class="text-primary">b</span>
                        </span>
                        <a class="link-fx fw-bold tracking-wide mx-auto" href="index.html">
                            <span class="smini-hidden">
                                <i class="fa fa-fire text-primary"></i>
                                <span class="fs-4 text-dual">code</span><span class="fs-4 text-primary">base</span>
                            </span>
                        </a>
                    </div>
                    <!-- END Logo -->

                    <!-- Options -->
                    <div>
                        <!-- Close Sidebar, Visible only on mobile screens -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <button type="button" class="btn btn-sm btn-alt-danger d-lg-none" data-toggle="layout"
                            data-action="sidebar_close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                        <!-- END Close Sidebar -->
                    </div>
                    <!-- END Options -->
                </div>
                <!-- END Side Header -->

                <!-- Sidebar Scrolling -->
                <div class="js-sidebar-scroll">
                    <!-- Side Main Navigation -->
                    <div class="content-side content-side-full">
                        <!--
              Mobile navigation, desktop navigation can be found in #page-header

              If you would like to use the same navigation in both mobiles and desktops, you can use exactly the same markup inside sidebar and header navigation ul lists
              -->
                        <ul class="nav-main">
                            <li class="nav-main-item">
                                <a class="nav-main-link active" href="gs_landing.html">
                                    <i class="nav-main-link-icon fa fa-home"></i>
                                    <span class="nav-main-link-name">Home</span>
                                </a>
                            </li>
                            <li class="nav-main-heading">Heading</li>
                            <li class="nav-main-item">
                                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu"
                                    aria-haspopup="true" aria-expanded="false" href="#">
                                    <i class="nav-main-link-icon fa fa-puzzle-piece"></i>
                                    <span class="nav-main-link-name">Dropdown</span>
                                </a>
                                <ul class="nav-main-submenu">
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="javascript:void(0)">
                                            <span class="nav-main-link-name">Link #1</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link" href="javascript:void(0)">
                                            <span class="nav-main-link-name">Link #2</span>
                                        </a>
                                    </li>
                                    <li class="nav-main-item">
                                        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu"
                                            aria-haspopup="true" aria-expanded="false" href="#">
                                            <span class="nav-main-link-name">Dropdown</span>
                                        </a>
                                        <ul class="nav-main-submenu">
                                            <li class="nav-main-item">
                                                <a class="nav-main-link" href="javascript:void(0)">
                                                    <span class="nav-main-link-name">Link #1</span>
                                                </a>
                                            </li>
                                            <li class="nav-main-item">
                                                <a class="nav-main-link" href="javascript:void(0)">
                                                    <span class="nav-main-link-name">Link #2</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-main-heading">Vital</li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="javascript:void(0)">
                                    <i class="nav-main-link-icon fa fa-wrench"></i>
                                    <span class="nav-main-link-name">Page</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="javascript:void(0)">
                                    <i class="nav-main-link-icon fa fa-wrench"></i>
                                    <span class="nav-main-link-name">Page</span>
                                </a>
                            </li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="javascript:void(0)">
                                    <i class="nav-main-link-icon fa fa-wrench"></i>
                                    <span class="nav-main-link-name">Page</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- END Side Main Navigation -->
                </div>
                <!-- END Sidebar Scrolling -->
            </div>
            <!-- Sidebar Content -->
        </nav>
        <!-- END Sidebar -->

        <!-- Header -->
        <header id="page-header">
            <!-- Header Content -->
            <div class="content-header">
                <!-- Left Section -->
                <div class="space-x-1">
                    <!-- Logo -->
                    <a class="link-fx fw-bold" href="index.html">
                        <i class="fa fa-fire text-primary"></i>
                        <span class="fs-4 text-dual">code</span><span class="fs-4 text-primary">base</span>
                    </a>
                    <!-- END Logo -->
                </div>
                <!-- END Left Section -->

                <!-- Right Section -->
                <div class="d-flex align-items-center space-x-2">
                    <!-- Header Navigation -->
                    <!-- Desktop Navigation, mobile navigation can be found in #sidebar -->
                    <ul class="nav-main nav-main-horizontal nav-main-hover d-none d-lg-block">
                        <li class="nav-main-item">
                            <a class="nav-main-link active" href="gs_landing.html">
                                <i class="nav-main-link-icon fa fa-home"></i>
                                <span class="nav-main-link-name">Home</span>
                            </a>
                        </li>
                        <li class="nav-main-heading">Heading</li>
                        <li class="nav-main-item">
                            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                                aria-expanded="false" href="#">
                                <i class="nav-main-link-icon fa fa-puzzle-piece"></i>
                                <span class="nav-main-link-name">Dropdown</span>
                            </a>
                            <ul class="nav-main-submenu">
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="javascript:void(0)">
                                        <span class="nav-main-link-name">Link #1</span>
                                    </a>
                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="javascript:void(0)">
                                        <span class="nav-main-link-name">Link #2</span>
                                    </a>
                                </li>
                                <li class="nav-main-item">
                                    <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu"
                                        aria-haspopup="true" aria-expanded="false" href="#">
                                        <span class="nav-main-link-name">Dropdown</span>
                                    </a>
                                    <ul class="nav-main-submenu">
                                        <li class="nav-main-item">
                                            <a class="nav-main-link" href="javascript:void(0)">
                                                <span class="nav-main-link-name">Link #1</span>
                                            </a>
                                        </li>
                                        <li class="nav-main-item">
                                            <a class="nav-main-link" href="javascript:void(0)">
                                                <span class="nav-main-link-name">Link #2</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-main-heading">Vital</li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="javascript:void(0)">
                                <i class="nav-main-link-icon fa fa-wrench"></i>
                                <span class="nav-main-link-name">Page</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="javascript:void(0)">
                                <i class="nav-main-link-icon fa fa-wrench"></i>
                                <span class="nav-main-link-name">Page</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="javascript:void(0)">
                                <i class="nav-main-link-icon fa fa-wrench"></i>
                                <span class="nav-main-link-name">Page</span>
                            </a>
                        </li>
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="{{ route('login') }}">
                                <i class="nav-main-link-icon fa fa-sign-in"></i>
                                <span class="nav-main-link-name">Login</span>
                            </a>
                        </li>
                    </ul>
                    <!-- END Header Navigation -->

                    <!-- Color Themes (used just for demonstration) -->
                    <!-- Themes functionality initialized in Codebase() -> uiHandleTheme() -->
                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn btn-sm btn-alt-secondary" id="page-header-themes-dropdown"
                            data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true"
                            aria-expanded="false">
                            <i class="fa fa-paint-brush"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="page-header-themes-dropdown">
                            <h6 class="dropdown-header text-center">Color Themes</h6>
                            <div class="row g-0 text-center">
                                <div class="col-4 mb-1">
                                    <a class="text-default" data-toggle="theme" data-theme="default"
                                        href="javascript:void(0)">
                                        <i class="fa fa-2x fa-circle"></i>
                                    </a>
                                </div>
                                <div class="col-4 mb-1">
                                    <a class="text-elegance" data-toggle="theme"
                                        data-theme="assets/css/themes/elegance.min.css" href="javascript:void(0)">
                                        <i class="fa fa-2x fa-circle"></i>
                                    </a>
                                </div>
                                <div class="col-4 mb-1">
                                    <a class="text-pulse" data-toggle="theme"
                                        data-theme="assets/css/themes/pulse.min.css" href="javascript:void(0)">
                                        <i class="fa fa-2x fa-circle"></i>
                                    </a>
                                </div>
                                <div class="col-4 mb-1">
                                    <a class="text-flat" data-toggle="theme"
                                        data-theme="assets/css/themes/flat.min.css" href="javascript:void(0)">
                                        <i class="fa fa-2x fa-circle"></i>
                                    </a>
                                </div>
                                <div class="col-4 mb-1">
                                    <a class="text-corporate" data-toggle="theme"
                                        data-theme="assets/css/themes/corporate.min.css" href="javascript:void(0)">
                                        <i class="fa fa-2x fa-circle"></i>
                                    </a>
                                </div>
                                <div class="col-4 mb-1">
                                    <a class="text-earth" data-toggle="theme"
                                        data-theme="assets/css/themes/earth.min.css" href="javascript:void(0)">
                                        <i class="fa fa-2x fa-circle"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END Color Themes -->

                    <!-- Open Search Section -->
                    <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
                    <button type="button" class="btn btn-sm btn-alt-secondary" data-toggle="layout"
                        data-action="header_search_on">
                        <i class="fa fa-fw fa-search"></i>
                    </button>
                    <!-- END Open Search Section -->

                    <!-- Toggle Sidebar -->
                    <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
                    <button type="button" class="btn btn-sm btn-alt-secondary d-lg-none" data-toggle="layout"
                        data-action="sidebar_toggle">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>
                    <!-- END Toggle Sidebar -->
                </div>
                <!-- END Right Section -->
            </div>
            <!-- END Header Content -->

            <!-- Header Search -->
            <div id="page-header-search" class="overlay-header bg-body-extra-light">
                <div class="content-header">
                    <form class="w-100" action="be_pages_generic_search.html" method="POST">
                        <div class="input-group">
                            <!-- Close Search Section -->
                            <!-- Layout API, functionality initialized in Codebase() -> uiApiLayout() -->
                            <button type="button" class="btn btn-secondary" data-toggle="layout"
                                data-action="header_search_off">
                                <i class="fa fa-fw fa-times"></i>
                            </button>
                            <!-- END Close Search Section -->
                            <input type="text" class="form-control" placeholder="Search or hit ESC.."
                                id="page-header-search-input" name="page-header-search-input">
                            <button type="submit" class="btn btn-secondary">
                                <i class="fa fa-fw fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END Header Search -->

            <!-- Header Loader -->
            <div id="page-header-loader" class="overlay-header bg-primary">
                <div class="content-header">
                    <div class="w-100 text-center">
                        <i class="far fa-sun fa-spin text-white"></i>
                    </div>
                </div>
            </div>
            <!-- END Header Loader -->
        </header>
        <!-- END Header -->

        <!-- Main Container -->
        <main id="main-container">

            <!-- Hero -->
            <div class="bg-body-extra-light overflow-hidden">
                <div class="hero">
                    <div class="hero-inner">
                        <div class="content content-full text-center">
                            <h1 class="display-3 fw-bold mb-2">
                                Hero Title
                            </h1>
                            <h2 class="fw-medium text-muted mb-5">
                                Hero Subtitle
                            </h2>
                            <a class="btn btn-lg btn-primary fw-semibold me-1 mb-2" href="javascript:void(0)">
                                <i class="fa fa-rocket opacity-50 me-1"></i> Call to Action
                            </a>
                            <a class="btn btn-lg btn-alt-primary fw-semibold mb-2" href="javascript:void(0)">
                                <i class="fa fa-rocket opacity-50 me-1"></i> Call to Action
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Hero -->

            <!-- Content #1 -->
            @include('frontend.beras')
            <!-- END Content #1 -->

            <!-- Content #2 -->
            <div class="bg-body-extra-light">
                <div class="content content-full">
                    <div class="py-5 text-center">
                        <h3 class="fw-bold mb-2">Heading 2</h3>
                        <h4 class="fw-normal text-muted mb-0">Content..</h4>
                    </div>
                </div>
            </div>
            <!-- END Content #2 -->

            <!-- Content #3 -->
            <div class="bg-body-light">
                <div class="content content-full">
                    <div class="py-5 text-center">
                        <h3 class="fw-bold mb-2">Heading 3</h3>
                        <h4 class="fw-normal text-muted mb-0">Content..</h4>
                    </div>
                </div>
            </div>
            <!-- END Content #3 -->
        </main>
        <!-- END Main Container -->

        <!-- Footer -->
        <footer id="page-footer" class="bg-body-extra-light">
            <div class="content content-full">
                <!-- Footer Navigation -->
                <div class="row items-push-2x mt-4">
                    <div class="col-6 col-md-4">
                        <h3 class="h5 fw-bold">Heading</h3>
                        <ul class="list list-simple-mini fs-sm">
                            <li>
                                <a class="link-fx fw-semibold" href="javascript:void(0)">Link #1</a>
                            </li>
                            <li>
                                <a class="link-fx fw-semibold" href="javascript:void(0)">Link #2</a>
                            </li>
                            <li>
                                <a class="link-fx fw-semibold" href="javascript:void(0)">Link #3</a>
                            </li>
                            <li>
                                <a class="link-fx fw-semibold" href="javascript:void(0)">Link #4</a>
                            </li>
                            <li>
                                <a class="link-fx fw-semibold" href="javascript:void(0)">Link #5</a>
                            </li>
                            <li>
                                <a class="link-fx fw-semibold" href="javascript:void(0)">Link #6</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-6 col-md-4">
                        <h3 class="h5 fw-bold">Heading</h3>
                        <ul class="list list-simple-mini fs-sm">
                            <li>
                                <a class="link-fx fw-semibold" href="javascript:void(0)">Link #1</a>
                            </li>
                            <li>
                                <a class="link-fx fw-semibold" href="javascript:void(0)">Link #2</a>
                            </li>
                            <li>
                                <a class="link-fx fw-semibold" href="javascript:void(0)">Link #3</a>
                            </li>
                            <li>
                                <a class="link-fx fw-semibold" href="javascript:void(0)">Link #4</a>
                            </li>
                            <li>
                                <a class="link-fx fw-semibold" href="javascript:void(0)">Link #5</a>
                            </li>
                            <li>
                                <a class="link-fx fw-semibold" href="javascript:void(0)">Link #6</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <h3 class="h5 fw-bold">Company LTD</h3>
                        <div class="fs-sm mb-4">
                            1080 Sunshine Valley, Suite 2563<br>
                            San Francisco, CA 85214<br>
                            <abbr title="Phone">P:</abbr> (123) 456-7890
                        </div>
                        <h3 class="h5 fw-bold">Our Newsletter</h3>
                        <form>
                            <div class="input-group">
                                <input type="email" class="form-control" id="ld-subscribe-email"
                                    name="ld-subscribe-email" placeholder="Your email..">
                                <button type="submit" class="btn btn-secondary">
                                    Subscribe
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- END Footer Navigation -->

                <!-- Copyright Info -->
                <div class="row g-0 fs-sm border-top pt-3">
                    <div class="col-sm-6 order-sm-2 py-1 text-center text-sm-end">
                        Crafted with <i class="fa fa-heart text-danger"></i> by <a class="fw-semibold"
                            href="https://1.envato.market/ydb" target="_blank">pixelcave</a>
                    </div>
                    <div class="col-sm-6 order-sm-1 py-1 text-center text-sm-start">
                        <a class="fw-semibold" href="https://1.envato.market/95j" target="_blank">Codebase 5.5</a>
                        &copy; <span data-toggle="year-copy"></span>
                    </div>
                </div>
                <!-- END Copyright Info -->
            </div>
        </footer>
        <!-- END Footer -->
    </div>
    <!-- END Page Container -->

    <!--
        Codebase JS

        Core libraries and functionality
        webpack is putting everything together at assets/_js/main/app.js
    -->
    <script src="assets/js/codebase.app.min.js"></script>
</body>

</html>
