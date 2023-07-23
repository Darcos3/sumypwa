<!doctype html>
<html lang="en" class="semi-dark color-header headercolor2">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	{{-- <link rel="icon" href="{{ asset('backend/assets/images/favicon-32x32.png" type="image/png" /> --}}
    <link rel="icon" href="{{ asset('backend/assets/images/favicon.png') }}" type="image/png" />

	<!--plugins-->
	<link href="{{ asset('backend/assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
	<link href="{{ asset('backend/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
	<link href="{{ asset('backend/assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('backend/assets/plugins/notifications/css/lobibox.min.css') }}" />
	<!-- loader-->
	<link href="{{ asset('backend/assets/css/pace.min.css') }}" rel="stylesheet" />
	<script src="{{ asset('backend/assets/js/pace.min.js') }}"></script>
	<!-- Bootstrap CSS -->
	<link href="{{ asset('backend/assets/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="{{ asset('backend/assets/css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('backend/assets/css/icons.css') }}" rel="stylesheet">
	<!-- Theme Style CSS -->
	{{-- <link rel="stylesheet" href="{{ asset('backend/assets/css/dark-theme.css') }}" /> --}}
	<link rel="stylesheet" href="{{ asset('backend/assets/css/semi-dark.css') }}" />
	<link rel="stylesheet" href="{{ asset('backend/assets/css/header-colors.css') }}" />
	<link rel="stylesheet" href="{{ asset('backend/assets/css/personal.css') }}" />
	{{-- Sweet Alert --}}
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	
    @yield('styles')
	<title>@yield('titulo') - Ferretería</title>
</head>

<body>
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
		<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					<img src="{{ asset('backend/assets/images/logo.png') }}" class="logo-icon" alt="logo icon">
				</div>
				<div>
					<h4 class="logo-text">Ferretería</h4>
				</div>
				<div class="toggle-icon ms-auto"><i class='bx bx-first-page'></i>
				</div>
			</div>
			<!--navigation-->
			<ul class="metismenu" id="menu">
				<li>
					<a href="{{ route('dashboard.index') }}">
						<div class="parent-icon"><i class='bx bx-home'></i>
						</div>
						<div class="menu-title">Dashboard</div>
					</a>
				</li>
				<li class="menu-label">Tienda</li>
				<li>
					<a href="{{ route('productos.index') }}">
						<div class="parent-icon"><i class='bx bx-package'></i>
						</div>
						<div class="menu-title">Productos</div>
					</a>
				</li>
				<li>
					<a href="{{ route('pedidos.index') }}">
						<div class="parent-icon"><i class='bx bx-cabinet'></i>
						</div>
						<div class="menu-title">Pedidos</div>
					</a>
				</li>
				<li>
					<a href="{{ route('pedidos.ordenesencurso') }}">
						<div class="parent-icon"><i class='bx bx-book-content'></i>
						</div>
						<div class="menu-title">Órdenes en Curso</div>
					</a>
				</li>
				<li>
					<a href="{{ route('combos.index') }}">
						<div class="parent-icon"><i class='bx bx-box' type=""></i>
						</div>
						<div class="menu-title">Combos</div>
					</a>
				</li>
				<li>
					<a href="{{ route('categorias.index') }}">
						<div class="parent-icon"><i class='bx bx-category'></i>
						</div>
						<div class="menu-title">Categorías</div>
					</a>
				</li>
				<li>
					<a href="{{ route('etiquetas.index') }}">
						<div class="parent-icon"><i class='bx bx-purchase-tag'></i>
						</div>
						<div class="menu-title">Etiquetas</div>
					</a>
				</li>
				<li>
					<a href="{{ route('atributos.index') }}">
						<div class="parent-icon"><i class='bx bx-tag-alt'></i>
						</div>
						<div class="menu-title">Atributos</div>
					</a>
				</li>
                <li>
                    <a href="{{ route('clientes.index') }}">
                        <div class="parent-icon"><i class='bx bx-group'></i>
                        </div>
                        <div class="menu-title">Clientes</div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('ferreteros.index') }}">
                        <div class="parent-icon"><i class='bx bx-group'></i>
                        </div>
                        <div class="menu-title">Ferreteros</div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('transportadores.index') }}">
                        <div class="parent-icon"><i class='bx bx-car'></i>
                        </div>
                        <div class="menu-title">Transportadores</div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('cupones.index')}}">
                        <div class="parent-icon"><i class='bx bx-rocket'></i>
                        </div>
                        <div class="menu-title">Cupones</div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('transportes.index')}}">
                        <div class="parent-icon"><i class='bx bx-rocket'></i>
                        </div>
                        <div class="menu-title">Transportes</div>
                    </a>
                </li>
                <li class="menu-label">Sistema</li>
				<li>
					<a href="{{ route('sliders.index')}}">
						<div class="parent-icon"><i class='bx bx-images'></i>
						</div>
						<div class="menu-title">Sliders</div>
					</a>
					<a href="#">
						<div class="parent-icon"><i class='bx bx-cog'></i>
						</div>
						<div class="menu-title">Configuraciones Generales</div>
					</a>
					<a href="#">
						<div class="parent-icon"><i class='bx bx-user'></i>
						</div>
						<div class="menu-title">Usuarios</div>
					</a>
				</li>
			</ul>
			<!--end navigation-->
		</div>
		<!--end sidebar wrapper -->
		<!--start header -->
		<header>
			<div class="topbar d-flex align-items-center">
				<nav class="navbar navbar-expand">
					<div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
					</div>
					<div class="top-menu ms-auto">
						{{-- <ul class="navbar-nav align-items-center">
							<li class="nav-item dropdown dropdown-large">
								<a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span class="alert-count">7</span>
									<i class='bx bx-bell'></i>
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									<a href="javascript:;">
										<div class="msg-header">
											<p class="msg-header-title">Notifications</p>
											<p class="msg-header-clear ms-auto">Marks all as read</p>
										</div>
									</a>
									<div class="header-notifications-list">
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-primary text-primary"><i class="bx bx-group"></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">New Customers<span class="msg-time float-end">14 Sec
												ago</span></h6>
													<p class="msg-info">5 new user registered</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-danger text-danger"><i class="bx bx-cart-alt"></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">New Orders <span class="msg-time float-end">2 min
												ago</span></h6>
													<p class="msg-info">You have recived new orders</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-success text-success"><i class="bx bx-file"></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">24 PDF File<span class="msg-time float-end">19 min
												ago</span></h6>
													<p class="msg-info">The pdf files generated</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-warning text-warning"><i class="bx bx-send"></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Time Response <span class="msg-time float-end">28 min
												ago</span></h6>
													<p class="msg-info">5.1 min avarage time response</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-info text-info"><i class="bx bx-home-circle"></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">New Product Approved <span
												class="msg-time float-end">2 hrs ago</span></h6>
													<p class="msg-info">Your new product has approved</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-danger text-danger"><i class="bx bx-message-detail"></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">New Comments <span class="msg-time float-end">4 hrs
												ago</span></h6>
													<p class="msg-info">New customer comments recived</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-success text-success"><i class='bx bx-check-square'></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Your item is shipped <span class="msg-time float-end">5 hrs
												ago</span></h6>
													<p class="msg-info">Successfully shipped your item</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-primary text-primary"><i class='bx bx-user-pin'></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">New 24 authors<span class="msg-time float-end">1 day
												ago</span></h6>
													<p class="msg-info">24 new authors joined last week</p>
												</div>
											</div>
										</a>
										<a class="dropdown-item" href="javascript:;">
											<div class="d-flex align-items-center">
												<div class="notify bg-light-warning text-warning"><i class='bx bx-door-open'></i>
												</div>
												<div class="flex-grow-1">
													<h6 class="msg-name">Defense Alerts <span class="msg-time float-end">2 weeks
												ago</span></h6>
													<p class="msg-info">45% less alerts last 4 weeks</p>
												</div>
											</div>
										</a>
									</div>
									<a href="javascript:;">
										<div class="text-center msg-footer">View All Notifications</div>
									</a>
								</div>
							</li>
						</ul> --}}
					</div>
					<div class="user-box dropdown">
						<a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							<img src="{{ asset('backend/assets/images/avatars/user-no-image.png') }}" class="user-img" alt="user avatar">
							<div class="user-info ps-3">
								<p class="user-name mb-0">Altosentido</p>
								<p class="designattion mb-0">Administrador</p>
							</div>
						</a>
						<ul class="dropdown-menu dropdown-menu-end">
							{{-- <li><a class="dropdown-item" href="javascript:;"><i class="bx bx-user"></i><span>Perfil</span></a>
							</li>
							<li><a class="dropdown-item" href="javascript:;"><i class="bx bx-cog"></i><span>Configuración</span></a>
							</li>
							<li>
								<div class="dropdown-divider mb-0"></div>
							</li> --}}
							<li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class='bx bx-log-out-circle'></i><span>Logout</span></a>
								<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
									@csrf
								</form>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</header>
		<!--end header -->
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				@yield('content')
			</div>
		</div>
		<!--end page wrapper -->
		<!--start overlay-->
		<div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		<footer class="page-footer">
			<p class="mb-0"><a href="https://altosentido.net">Altosentido.net</a></p>
		</footer>
	</div>
	<!--end wrapper-->
	<!-- Bootstrap JS -->
	<script src="{{ asset('backend/assets/js/bootstrap.bundle.min.js') }}"></script>
	<!--plugins-->
	<script src="{{ asset('backend/assets/js/jquery.min.js') }}"></script>
	<script src="{{ asset('backend/assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
	<script src="{{ asset('backend/assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
	<script src="{{ asset('backend/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
	<script src="{{ asset('backend/assets/plugins/notifications/js/lobibox.min.js') }}"></script>
	<script src="{{ asset('backend/assets/plugins/highcharts/js/highcharts.js') }}"></script>
	<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
	<!--app JS-->
	<script src="{{ asset('backend/assets/js/app.js') }}"></script>
    @yield('scripts')

    @if (session('status'))
        <script>
            Lobibox.notify('{{ session('status')[0] }}', {
                pauseDelayOnHover: true,
                size: 'mini',
                rounded: true,
                continueDelayOnInactiveTab: false,
                position: 'top right',
                icon: '{{ session('status')[1] }}',
                {{-- msg: '{{ session('status')[2] }}' --}}
            });
        </script>
    @endif
</body>

</html>
