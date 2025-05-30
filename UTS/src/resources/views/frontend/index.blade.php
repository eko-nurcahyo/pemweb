<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sistem Informasi Beasiswa Mahasiswa">
    <meta name="author" content="AdminKit">

    <title>Dashboard Mahasiswa - Beasiswa</title>
    <link rel="shortcut icon" href="{{ asset('frontend/img/icons/icon-48x48.png') }}" />
    <link href="{{ asset('frontend/css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<body>
<div class="wrapper">
    <nav id="sidebar" class="sidebar js-sidebar">
        <div class="sidebar-content js-simplebar">
            <a class="sidebar-brand" href="{{ url('/dashboard-mahasiswa') }}">
                <span class="align-middle">Beasiswa</span>
            </a>
            <ul class="sidebar-nav">
                <li class="sidebar-header">Navigasi</li>
                <li class="sidebar-item active">
                    <a class="sidebar-link" href="{{ url('/dashboard-mahasiswa') }}">
                        <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="#">
                        <i class="align-middle" data-feather="user"></i> <span class="align-middle">Profil</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="#">
                        <i class="align-middle" data-feather="log-out"></i> <span class="align-middle">Keluar</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="main">
        <nav class="navbar navbar-expand navbar-light navbar-bg">
            <a class="sidebar-toggle js-sidebar-toggle">
                <i class="hamburger align-self-center"></i>
            </a>
            <div class="navbar-collapse collapse">
                <ul class="navbar-nav navbar-align">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                            <img src="{{ asset('frontend/img/avatars/avatar.jpg') }}" class="avatar img-fluid rounded me-1" alt="Mahasiswa" />
                            <span class="text-dark">Mahasiswa</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="user"></i> Profil</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="log-out"></i> Keluar</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>

        <main class="content">
            <div class="container-fluid p-0">
                <h1 class="h3 mb-3">Dashboard Mahasiswa</h1>
                <div class="row">
                    <!-- Kartu Total Beasiswa -->
                    <div class="col-12 col-md-6 col-xl">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget">
                                    <div class="stat-icon text-primary">
                                        <i class="align-middle" data-feather="book"></i>
                                    </div>
                                    <div class="stat-content">
                                        <h5 class="card-title">Total Beasiswa</h5>
                                        <h1 class="mt-1 mb-3">{{ $totalBeasiswa }}</h1>
                                        <div class="mb-0 text-muted">Beasiswa aktif tersedia</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Bisa tambah lebih banyak kartu -->
                </div>
            </div>
        </main>

        <footer class="footer">
            <div class="container-fluid">
                <div class="row text-muted">
                    <div class="col-6 text-start">
                        <p class="mb-0">&copy; {{ date('Y') }} Sistem Informasi Beasiswa</p>
                    </div>
                    <div class="col-6 text-end">
                        <a class="text-muted" href="#">Bantuan</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>

<script src="{{ asset('frontend/js/app.js') }}"></script>
</body>
</html>
