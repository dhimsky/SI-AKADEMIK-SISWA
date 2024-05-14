<nav class="page-sidebar" id="sidebar">
    <div id="sidebar-collapse">
        <div class="admin-block d-flex">
            <div>
                <img src="{{ asset('/') }}assets/images/profile.jpeg" width="45px"/>
            </div>
            <div class="admin-info">
                <div class="font-strong">Nama User</div><small>Level User</small></div>
        </div>
        <ul class="side-menu metismenu">
            @if (Auth::user()->role_id == '1')
            <li>
                <a class="active" href="/dashboardstafftu"><i class="sidebar-item-icon fa fa-th-large"></i>
                    <span class="nav-label">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-users"></i>
                    <span class="nav-label">Pengguna</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="/role">Role</a>
                    </li>
                    <li>
                        <a href="/akun">Akun</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-users"></i>
                    <span class="nav-label">Akademik</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="/jurusan">Jurusan</a>
                    </li>
                    <li>
                        <a href="/rombel">Rombel</a>
                    </li>
                </ul>
            </li>
            @endif

            @if (Auth::user()->role_id == '2')
                
            @endif

            @if (Auth::user()->role_id == '3')
                
            @endif
        </ul>
    </div>
</nav>