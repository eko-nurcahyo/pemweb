<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@yield('title', 'Sistem Beasiswa')</title>

	<link href="{{ asset('frontend/css/app.css') }}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="/">
					<span class="align-middle">Beasiswa</span>
				</a>
				<ul class="sidebar-nav">
					<li class="sidebar-item">
						<a class="sidebar-link" href="{{ url('/dashboard-mahasiswa') }}">
							<i class="align-middle" data-feather="sliders"></i> Dashboard
						</a>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link" href="{{ route('mahasiswa.profil') }}">
							<i class="align-middle" data-feather="user"></i> Profil
						</a>
					</li>
					<li class="sidebar-item">
						<form action="{{ route('logout') }}" method="POST" onsubmit="return confirm('Yakin ingin keluar?')">
					@csrf
						<button type="submit" class="sidebar-link" style="border: none; background: none; padding: 0; width: 100%; text-align: left;">
					<i class="align-middle" data-feather="log-out"></i> Keluar
				</button>
			</form>
		</li>

				</ul>
			</div>
		</nav>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle js-sidebar-toggle">
					<i class="hamburger align-self-center"></i>
				</a>
			</nav>

			<main class="content">
    			<div class="container-fluid p-0">
        		@yield('content')
    			</div>
			</main>


			<footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-start">
							&copy; {{ date('Y') }} Sistem Informasi Beasiswa
						</div>
						<div class="col-6 text-end">
							<a href="#" class="text-muted">Bantuan</a>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>

	<script src="{{ asset('frontend/js/app.js') }}"></script>
</body>
</html>
