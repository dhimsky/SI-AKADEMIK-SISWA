<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>SIAKAD | Login</title>
    <!-- GLOBAL MAINLY STYLES-->
    <link href="{{ asset('/') }}assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="{{ asset('/') }}assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="{{ asset('/') }}assets/vendors/themify-icons/css/themify-icons.css" rel="stylesheet" />
    <!-- THEME STYLES-->
    <link href="{{ asset('/') }}assets/css/main.css" rel="stylesheet" />
    <!-- PAGE LEVEL STYLES-->
    <link href="{{ asset('/') }}assets/css/pages/auth-light.css" rel="stylesheet" />
</head>

<body class="bg-silver-300">
    <div class="content">
        <div class="text-center">
            <img class="mt-5" src="{{ asset('/') }}assets/images/logo.png" style="width: 100px; height: 100px;" >
        </div>
        <div class="brand">
            <h3 class="text-dark" href="index.html">SIAKAD</h3>
        </div>
        @if (session('failed'))
            <div class="alert alert-danger">
                {{ session('failed') }}
            </div>
        @endif
        <form id="login-form" action="/loginsession" method="post">
            @csrf
            <h2 class="login-title">Log in</h2>
            <div class="form-group">
                <div class="input-group-icon right">
                    <div class="input-icon"><i class="fa fa-id-badge"></i></div>
                    <input value="{{ old('kode_identitas') }}" class="form-control" type="number" name="kode_identitas" placeholder="Kode Identitas" autocomplete="off">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group-icon right">
                    <div class="input-icon"><i class="fa fa-lock font-16"></i></div>
                    <input class="form-control" type="password" name="password" placeholder="Password">
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-info btn-block" type="submit">Login</button>
            </div>
        </form>
    </div>
    <!-- BEGIN PAGA BACKDROPS-->
    <div class="sidenav-backdrop backdrop"></div>
    <div class="preloader-backdrop">
        <div class="page-preloader">Loading</div>
    </div>
    <!-- END PAGA BACKDROPS-->
    <!-- CORE PLUGINS -->
    <script src="{{ asset('/') }}assets/vendors/jquery/dist/jquery.min.js" type="text/javascript"></script>
    <script src="{{ asset('/') }}assets/vendors/popper.js/dist/umd/popper.min.js" type="text/javascript"></script>
    <script src="{{ asset('/') }}assets/vendors/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- PAGE LEVEL PLUGINS -->
    <script src="{{ asset('/') }}assets/vendors/jquery-validation/dist/jquery.validate.min.js" type="text/javascript">
    </script>
    <!-- CORE SCRIPTS-->
    <script src="{{ asset('/') }}assets/js/app.js" type="text/javascript"></script>
    {{-- SWEATALERT --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('error'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'danger',
                title: 'Gagal',
                text: '{{ session('error') }}',
            });
        });
    </script>
@endif  
    <!-- PAGE LEVEL SCRIPTS-->
    <script type="text/javascript">
        $(function() {
            $('#login-form').validate({
                errorClass: "help-block",
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true
                    }
                },
                messages: {
                    email: {
                        required: "Email tidak boleh kosong!",
                        email: "Gunakan Email yang benar!"
                    },
                    password: {
                        required: "Password tidak boleh kosong!"
                    }
                },
                highlight: function(e) {
                    $(e).closest(".form-group").addClass("has-error")
                },
                unhighlight: function(e) {
                    $(e).closest(".form-group").removeClass("has-error")
                },
            });
        });
    </script>
</body>

</html>
