<nav class="page-sidebar" id="sidebar">
    <div id="sidebar-collapse">
        <div class="admin-block d-flex">
            <div>
                <img src="{{ asset('/') }}assets/images/profile.jpeg" width="45px"/>
            </div>
            @if (Auth::check())
            <div class="admin-info">
                <div class="font-strong">{{ Auth::user()->nama_lengkap }}</div><small>{{ Auth::user()->role->level }}</small>
            </div>
            @endif
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
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-building"></i>
                    <span class="nav-label">Master</span><i class="fa fa-angle-left arrow"></i></a>
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
                        <a href="{{ route('admin.tahunpelajaran') }}">Tahun Pelajaran</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.mapel') }}">Mapel</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.guru') }}">Guru</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-graduation-cap"></i>
                    <span class="nav-label">Siswa</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{ route('admin.siswa') }}">Daftar Siswa</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.nilai') }}">Nilai Siswa</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.absensi') }}">Absensi Siswa</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.transkipnilai') }}">Transkip Nilai</a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="active" href="{{ route('profile') }}"><i class="sidebar-item-icon fa fa-gear"></i>
                    <span class="nav-label">Profile</span>
                </a>
            </li>
            @endif

            @if (Auth::user()->role_id == '2')
            <li>
                <a class="active" href="{{ route('guru.dashboard') }}"><i class="sidebar-item-icon fa fa-th-large"></i>
                    <span class="nav-label">Dashboard</span>
                </a>
            </li>
            <li>
                <a class="active" href="{{ route('guru.nilai') }}"><i class="sidebar-item-icon fa fa-pencil"></i>
                    <span class="nav-label">Nilai</span>
                </a>
            </li>
            <li>
                <a class="active" href="{{ route('guru.absensi') }}"><i class="sidebar-item-icon fa fa-calendar-check-o"></i>
                    <span class="nav-label">Absensi</span>
                </a>
            </li>
            <li>
                <a class="active" href="{{ route('profile') }}"><i class="sidebar-item-icon fa fa-gear"></i>
                    <span class="nav-label">Profile</span>
                </a>
            </li>
            @endif

            @if (Auth::user()->role_id == '3')
            <li>
                    <a class="active" href=""><i class="sidebar-item-icon fa fa-th-large"></i>
                    <span class="nav-label">Dashboard</span>
                </a>
            </li>
            <li>
                    <a class="active" href="{{ route('siswa.nilai-akhir') }}"><i class="sidebar-item-icon fa fa-star"></i>
                    <span class="nav-label">Nilai Akhir</span>
                </a>
            </li>
            <li>
                    <a class="active" href="{{ route('siswa.transkip-nilai') }}"><i class="sidebar-item-icon fa fa-certificate"></i>
                    <span class="nav-label">Transkip Nilai</span>
                </a>
            </li>
            <li>
                    <a class="active" href="{{ route('siswa.absensi') }}"><i class="sidebar-item-icon fa fa-check"></i>
                    <span class="nav-label">Absensi</span>
                </a>
            </li>
            <li>
                <a class="active" href="{{ route('profile') }}"><i class="sidebar-item-icon fa fa-gear"></i>
                    <span class="nav-label">Profile</span>
                </a>
            </li>
            @endif

            @if (Auth::user()->role_id == '4')
            <li>
                <a class="active" href="{{ route('kepsek.dashboard') }}"><i class="sidebar-item-icon fa fa-th-large"></i>
                <span class="nav-label">Dashboard</span>
                </a>
            </li>
            <li>
                <a class="active" href="{{ route('kepsek.siswa') }}"><i class="sidebar-item-icon fa fa-user"></i>
                <span class="nav-label">Siswa</span>
                </a>
            </li>
            <li>
                <a class="active" href="{{ route('kepsek.guru') }}"><i class="sidebar-item-icon fa fa-user-circle"></i>
                <span class="nav-label">Guru</span>
                </a>
            </li>
            <li>
                <a class="active" href="{{ route('kepsek.nilai') }}"><i class="sidebar-item-icon fa fa-star"></i>
                <span class="nav-label">Nilai</span>
                </a>
            </li>
            <li>
                <a class="active" href="{{ route('profile') }}"><i class="sidebar-item-icon fa fa-gear"></i>
                    <span class="nav-label">Profile</span>
                </a>
            </li>
            @endif
        </ul>
    </div>
</nav>