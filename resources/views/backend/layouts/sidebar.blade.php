<div class="sidebar-content">
    <!-- Side Header -->
    <div class="content-header justify-content-lg-center">
        <!-- Logo -->
        <div>
            <span class="smini-visible fw-bold tracking-wide fs-lg">
                c<span class="text-primary">m</span>s
            </span>
            <a class="link-fx fw-bold tracking-wide mx-auto" href="{{ config('app.url') }}">
                <span class="smini-hidden">
                    <i class="fa fa-bowl-rice text-primary"></i>
                    <span class="fs-4 text-dual">BUMDES</span><span class="fs-4 text-primary">Sicil</span>
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

        <!-- Side Navigation -->
        <div class="content-side content-side-full">
            <ul class="nav-main">
                <li class="nav-main-item">
                    <a class="nav-main-link active" href="{{ url('admin/dashboard') }}">
                        <i class="nav-main-link-icon fa fa-house-user"></i>
                        <span class="nav-main-link-name">Dashboard</span>
                    </a>
                </li>
                @include('backend.layouts.sidebar-menu')
            </ul>
        </div>
        <!-- END Side Navigation -->
    </div>
    <!-- END Sidebar Scrolling -->
</div>