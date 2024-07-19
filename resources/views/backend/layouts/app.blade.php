<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title>BUMDESSICIL - Badan Usaha Milik Desa Siak Kecil</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="description" content="BUMDESSICIL - Badan Usaha Milik Desa Siak Kecil">
    <meta name="author" content="bumdessicil">
    <meta name="robots" content="noindex, nofollow">

    <!-- Open Graph Meta -->
    <meta property="og:title" content="BUMDESSICIL - Badan Usaha Milik Desa Siak Kecil">
    <meta property="og:site_name" content="BUMDESSICIL">
    <meta property="og:description" content="BUMDESSICIL - Badan Usaha Milik Desa Siak Kecil">
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
    @stack('css')
    <!-- Codebase framework -->
    <link rel="stylesheet" id="css-main" href="{{ asset('assets/css/codebase.min.css') }}">

    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
    <link rel="stylesheet" id="css-theme" href="{{ asset('assets/css/themes/flat.min.css') }}">
    <!-- END Stylesheets -->
</head>

<body>
    <!-- SweetAlert2 -->
    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])
    <!-- Page Container -->
    <div id="page-container" class="sidebar-o enable-page-overlay side-scroll page-header-modern main-content-boxed">

        <!-- Sidebar -->
        <nav id="sidebar">
            <!-- Sidebar Content -->
            @include('backend.layouts.sidebar')

            <!-- Sidebar Content -->
        </nav>
        <!-- END Sidebar -->

        <!-- Header -->
        <header id="page-header">
            <!-- Header Content -->
            @include('backend.layouts.navbar')
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
            <!-- Page Content -->
            @yield('content')
            <!-- END Page Content -->
        </main>
        <!-- END Main Container -->

        <!-- Footer -->
        <footer id="page-footer">
            <div class="content py-3">
                <div class="row fs-sm">
                    <div class="col-sm-6 order-sm-2 py-1 text-center text-sm-end">
                        {{-- Crafted with <i class="fa fa-heart text-danger"></i> by <a class="fw-semibold" href="{{ config('app.url') }}" target="_blank">rere</a> --}}
                    </div>
                    <div class="col-sm-6 order-sm-1 py-1 text-center text-sm-start">
                        <a class="fw-semibold" href="{{ config('app.url') }}" target="_blank">BUMDESSICIL</a> &copy;
                        <span data-toggle="year-copy"></span>
                    </div>
                </div>
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
    <script src="{{ asset('assets/js/codebase.app.min.js') }}"></script>

    <script>
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session('success') }}',
            });
        @endif

        @if (session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '{{ session('error') }}',
            });
        @endif
    </script>

    @stack('js')
</body>

</html>
