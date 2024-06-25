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
                    <form action="{{ route('actionlogout') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="dropdown-item"><i class="fa fa-power-off"></i>Logout</button>
                    </form>
                </ul>
            </li>
        </ul>
        <!-- END TOP-RIGHT TOOLBAR-->
    </div>
</header>