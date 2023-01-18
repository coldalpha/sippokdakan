<aside class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('/assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h5 class="logo-text">POKDAKAN</h5>
        </div>
        <div class="toggle-icon ms-auto"> <i class="bi bi-list"></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{ url('/dashboard') }}" class=" {{ $title === 'dashboard' ? 'active' : '' }} ">
                <div class="parent-icon"><i class="bi bi-house-fill"></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>
        <li class="menu-label">DATA</li>
        <li>
            <a href="{{ url('/pokdakan') }}" class=" {{ $title === 'DATA KELOMPOK' ? 'active' : '' }} ">
                <div class="parent-icon"><i class="fadeIn animated bx bx-hive"></i>
                </div>
                <div class="menu-title">Data Kelompok</div>
            </a>
        </li>
        @can('admin')
            <li>
                <a href="{{ url('/category') }}" class=" {{ $title === 'DATA KATEGORI' ? 'active' : '' }} ">
                    <div class="parent-icon"><i class="fadeIn animated bx bx-merge"></i>
                    </div>
                    <div class="menu-title">Data Kategori</div>
                </a>
            </li>
            <li>
                <a href="{{ url('/ikan') }}" class=" {{ $title === 'DATA IKAN' ? 'active' : '' }} ">
                    <div class="parent-icon"><i class="fadeIn animated bx bx-water"></i>
                    </div>
                    <div class="menu-title">Data Ikan</div>
                </a>
            </li>
        @endcan
        <li class="menu-label">User Profile</li>
        <li>
            <a href="{{ url('/user') }}" class=" {{ $title === 'My Account' ? 'active' : '' }} ">
                <div class="parent-icon "><i class="bi bi-person-lines-fill "></i>
                </div>
                <div class="menu-title ">Detail User</div>
            </a>
        </li>
        @can('admin')
            <li>
                <a href="{{ url('/petugas') }}" class=" {{ $title === 'USER' ? 'active' : '' }} ">
                    <div class="parent-icon "><i class="lni lni-users "></i>
                    </div>
                    <div class="menu-title ">Petugas</div>
                </a>
            </li>
        @endcan

    </ul>
    <!--end navigation-->
</aside>
