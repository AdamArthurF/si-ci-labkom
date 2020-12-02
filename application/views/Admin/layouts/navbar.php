<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed sidebar-collapse ">
	<!-- Site wrapper -->
	<div class="wrapper">
	  <!-- Navbar -->
		<nav class="main-header navbar navbar-expand navbar-white navbar-light">
			<!-- Left navbar links -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
				</li>
				<li class="nav-item d-none d-sm-inline-block">
					<a href="<?= base_url()?>Dashboard" class="nav-link">Home</a>
				</li>

				<ul class="navbar-nav ml-auto">
					<!-- SEARCH FORM -->
					<form method="get" action="<?= base_url() ?>C_Search/search/nim" class="form-inline ml-3">
						<div class="input-group input-group-sm">
							<input class="form-control form-control-navbar" type="text" name="nim" placeholder="Cari Nomer Induk Mahasiswa" aria-label="Search">
							<div class="input-group-append">
								<button class="btn btn-navbar" type="submit">
									<i class="fas fa-search"></i>
								</button>
							</div>
						</div>
					</form>
				</ul>
			</ul>
		</nav>
	  <!-- /.navbar -->
