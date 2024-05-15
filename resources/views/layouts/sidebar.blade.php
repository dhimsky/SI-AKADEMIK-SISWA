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
                <a class="active" href="{{ route('admin.dashboard') }}"><i class="sidebar-item-icon fa fa-th-large"></i>
                    <span class="nav-label">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-users"></i>
                    <span class="nav-label">Pengguna</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{ route('admin.role') }}">Role</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.akun') }}">Akun</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-users"></i>
                    <span class="nav-label">Akademik</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{ route('admin.jurusan') }}">Jurusan</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.rombel') }}">Rombel</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.kelas') }}">Kelas</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.angkatan') }}">Angkatan</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.mapel') }}">Mapel</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.walikelas') }}">Wali Kelas</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-graduation-cap"></i>
                    <span class="nav-label">Siswa</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{ route('admin.jurusan') }}">Siswa Aktif</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.rombel') }}">Siswa Lulus</a>
                    </li>
                </ul>
            </li>
            @endif

            @if (Auth::user()->role_id == '2')
            <li>
                <a class="active" href="{{ route('walikelas.rombel') }}"><i class="sidebar-item-icon fa fa-th-large"></i>
                    <span class="nav-label">Dashboard</span>
                </a>
            </li>
            @endif

            @if (Auth::user()->role_id == '3')
            <li>
                <a class="active" href="{{ route('siswa.rombel') }}"><i class="sidebar-item-icon fa fa-th-large"></i>
                    <span class="nav-label">Dashboard</span>
                </a>
            </li>
            @endif
        </ul>
    </div>
</nav>