@can('rice.index')
    <li class="nav-main-heading">Menu Toko</li>
    <li class="nav-main-item">
        <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false"
            href="#">
            <i class="nav-main-link-icon far fa-note-sticky"></i>
            <span class="nav-main-link-name">Post</span>
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
@endcan
@can('bumdes.index')
    <li class="nav-main-heading">Menu Toko</li>
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
                <a class="nav-main-link @if (request()->segment(3) == 'beras') active @endif " href="{{ route('beras.index') }}">
                    <span class="nav-main-link-name">Beras</span>
                </a>
            </li>
            <li class="nav-main-item">
                <a class="nav-main-link" href="javascript:void(0)">
                    <span class="nav-main-link-name">Pesanan</span>
                </a>
            </li>
        </ul>
    </li>
@endcan
@can('permission')
    <li class="nav-main-heading">Administrator</li>
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
