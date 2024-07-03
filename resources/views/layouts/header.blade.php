<header class="header">
    <div class="page-brand">
        <a class="link" href="index.html">
            <span class="brand">SIAKAD
            </span>
            <span class="brand-mini">AC</span>
        </a>
    </div>
    <div class="flexbox flex-1">
        <!-- START TOP-LEFT TOOLBAR-->
        <ul class="nav navbar-toolbar">
            <li>
                <a class="nav-link sidebar-toggler js-sidebar-toggler"><i class="ti-menu"></i></a>
            </li>
        </ul>
        <!-- END TOP-LEFT TOOLBAR-->
        <!-- START TOP-RIGHT TOOLBAR-->
        <ul class="nav navbar-toolbar">
            <li class="dropdown dropdown-user">
                <a class="nav-link dropdown-toggle link" data-toggle="dropdown">
                    @if (Auth::check())
                        
                    <span></span>{{ Auth::user()->nama_lengkap }}<i class="fa fa-angle-down m-l-5"></i></a>
                    @endif
                <ul class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="{{ route('profile') }}"><i class="fa fa-user"></i>Profile</a>
                    <li class="dropdown-divider"></li>
                    <button type="submit" class="dropdown-item" data-toggle="modal" data-target="#modalLogout"><i class="fa fa-power-off"></i>Logout</button>
                </ul>
            </li>
        </ul>
    </div>
</header>
<div class="modal fade" id="modalLogout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Keluar Akun</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form action="{{ route('actionlogout') }}" method="POST">
            @csrf
            @method('DELETE')
            <div class="modal-body">
                <p>Yakin ingin keluar akun?</p>
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Keluar</button>
                </div>
            </form>
        </div>
    </div>
</div>