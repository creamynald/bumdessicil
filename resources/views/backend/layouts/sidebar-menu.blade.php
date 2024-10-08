@can('bumdes.index')
    <li class="nav-main-heading">
        Menu Toko</li>
    <li class="nav-main-item @if (request()->segment(2) == 'toko') open @endif">
        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false"
            href="#">
            <i class="nav-main-link-icon fa fa-bowl-rice"></i>
            <span class="nav-main-link-name">BUMDes</span>
        </a>
        <ul class="nav-main-submenu">
            <li class="nav-main-item ">
                <a class="nav-main-link @if (request()->segment(3) == 'jenis-beras') active @endif "
                    href="{{ route('jenis-beras.index') }}">
                    <span class="nav-main-link-name">Jenis Beras</span>
                </a>
            </li>
            <li class="nav-main-item ">
                <a class="nav-main-link @if (request()->segment(3) == 'beras') active @elseif (request()->segment(3) == 'orders') '' @endif " href="{{ route('beras.index') }}">
                    <span class="nav-main-link-name">Beras</span>
                </a>
            </li>
        </ul>
    </li>
    <li class="nav-main-item">
        <a class="nav-main-link nav-main-link-menu" href="{{ route('orders.index') }}">
            <i class="nav-main-link-icon fas fa-tasks"></i>
            <span class="nav-main-link-name">Rekap Penjualan</span>
        </a>
    </li>
@endcan

@can('order.index')
    <li class="nav-main-heading">Menu Customer</li>
    <li class="nav-main-item">
        <a class="nav-main-link nav-main-link-menu" href="{{ route('cari-beras') }}">
            <i class="nav-main-link-icon fas fa-bowl-rice"></i>
            <span class="nav-main-link-name">Cari Beras</span>
        </a>
    </li>
    <li class="nav-main-item">
        <a class="nav-main-link nav-main-link-menu" href="{{ route('customer.orders') }}">
            <i class="nav-main-link-icon fas fa-tasks"></i>
            <span class="nav-main-link-name">Rekap Pembelian</span>
        </a>
    </li>
@endcan

@can('permission')
    <li class="nav-main-heading">Administrator</li>
    <li class="nav-main-item">
        <a class="nav-main-link nav-main-link-menu" href="{{ route('list-bumdes.index') }}">
            <i class="nav-main-link-icon fas fa-home"></i>
            <span class="nav-main-link-name">Rekap Bumdes</span>
        </a>
    </li>
    <li class="nav-main-item">
        <a class="nav-main-link nav-main-link-menu" href="{{ route('list-customer.index') }}">
            <i class="nav-main-link-icon fas fa-users"></i>
            <span class="nav-main-link-name">Rekap Customer</span>
        </a>
    </li>
    <li class="nav-main-item {{ request()->segment(2) == 'role-and-permission' ? 'open' : '' }}">
        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false"
            href="#">
            <i class="nav-main-link-icon fa fa-road-lock"></i>
            <span class="nav-main-link-name">Role & Permission</span>
        </a>
        <ul class="nav-main-submenu">
            <li class="nav-main-item">
                <a class="nav-main-link {{ request()->segment(3) == 'roles' ? 'active' : '' }}"
                    href="{{ route('roles.index') }}">
                    <span class="nav-main-link-name">Roles</span>
                </a>
            </li>
            <li class="nav-main-item">
                <a class="nav-main-link {{ request()->segment(3) == 'permissions' ? 'active' : '' }}"
                    href="{{ route('permissions.index') }}">
                    <span class="nav-main-link-name">Permissions</span>
                </a>
            </li>
            <li class="nav-main-item">
                <a class="nav-main-link {{ request()->segment(3) == 'assignable' ? 'active' : '' }}"
                    href="{{ route('assignable.index') }}">
                    <span class="nav-main-link-name">Assign Permission</span>
                </a>
            </li>
            <li class="nav-main-item">
                <a class="nav-main-link {{ request()->segment(3) == 'assign' ? 'active' : '' }}"
                    href="{{ route('user.index') }}">
                    <span class="nav-main-link-name">Permission to Users</span>
                </a>
            </li>
        </ul>
    </li>
@endcan
