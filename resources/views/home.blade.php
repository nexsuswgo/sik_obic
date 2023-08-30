<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>@yield('judul')</title>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/flatpickr.min.css') }}">
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
     <button style="margin-left:1em" class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
        <img style="margin-left:1em" src="{{asset('assets/img/WhatsApp Image 2023-08-03 at 14.54.03.png')}}" width="50px">
        <a class="navbar-brand" href="#">SIK-OBIC</a>
               <!-- Navbar-->
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0" action=""></form>
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">

                    @if (Auth::user()->role == 'Admin')
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">{{ Auth::user()->name }}</div>
                        <a class="nav-link" href="{{ route('home') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <a class="nav-link" href="{{ route('periode') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-crown"></i></div>
                            periode data bulan
                        </a>


                        <a class="nav-link" href="{{ route('debit') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-user-alt"></i></div>
                            Debitur Kreditur
                        </a>

                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Hutang Piutang
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{ route('hutang') }}">Catatan Hutang</a>
                                <a class="nav-link" href="{{ route('piutang') }}">Catatan Piutang</a>
                            </nav>
                        </div>
                        <a class="nav-link" href="{{ route('transaksi') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                            Data Transaksi
                        </a>

                        <a class="nav-link" href="{{ route('bank') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-building"></i></div>
                            Rekening Bank
                        
                        <a class="nav-link" href="{{ route('laporan') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-check-circle"></i></div>
                            Laporan
                        </a>
                        <a class="nav-link" href="{{ route('user') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                            Pengguna
                        </a>
                    </div>
                    @endif

                    @if (Auth::user()->role == 'Pemilik')
                    <div class="nav">
                        <a class="nav-link" href="{{ route('home') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <a class="nav-link" href="{{ route('laporan') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-wallet"></i></div>
                            Laporan
                        </a>
                    </div>
                    @endif

                </div>

            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                @yield('konten')
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Amplang Obic Ketapang</div>
                        <div>
                            Sistem Informasi Keuangan Obic
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="{{ asset('assets/demo/chart-bar-demo.js') }}"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/demo/datatables-demo.js') }}"></script>
    <script src="{{ asset('js/flatpickr.js') }}"></script>
</body>

</html>
