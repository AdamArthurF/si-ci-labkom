<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary elevation-4 bg-blue">
    <!-- Brand Logo -->
    <a href="<?= base_url()?>Home" class="brand-link bg-blue">
		<img src="<?= base_url() ?>assets/dist/img/LogoLab.png" alt="Logo Labkom" class="brand-image img-circle elevation-3"
           style="opacity: .8">
		<span class="brand-text font-weight-bold ">LABKOM FMIPA UNS</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar bg-blue">
		<!-- Sidebar Menu -->
		<nav class="mt-4 ">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
			<!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

			<li class="nav-item bg-blue">
				<a href="<?= base_url()?>Admin/Lab" class="nav-link" >
				<i class="nav-icon fa fa-list-alt"></i>
				   <p>Daftar Laboratorium</p>
				</a>
			</li>
			<li class="nav-item bg-blue">
				<a href="<?= base_url()?>Admin/Alat" class="nav-link" >
					<i class="nav-icon fa fa-briefcase"></i>
					<p>Daftar Alat</p>
			 	</a>
			</li>
			<li class="nav-item bg-blue">
				<a href="<?= base_url()?>Admin/Mhs" class="nav-link" >
					<i class="nav-icon fa fa-users"></i>
					<p>Daftar Mahasiswa</p>
				</a>
			</li>
			<li class="nav-item bg-blue">
				<a href="<?= base_url()?>Admin/PinjamRuang" class="nav-link" >
					<i class="nav-icon fa fa-tasks"></i>
					<p>Peminjaman Ruang</p>
				</a>
			</li>
			<li class="nav-item bg-blue">
				<a href="<?= base_url()?>Admin/PinjamAlat" class="nav-link" >
					<i class="nav-icon fa fa-tasks"></i>
					<p>Peminjaman Alat</p>
			 	</a>
			</li>
			<li class="nav-item bg-blue">
			 	<a href="<?= base_url()?>Admin/SuratBebas" class="nav-link" >
                    <i class="nav-icon fa fa-file"></i>
                    <p>Surat Bebas Labkom</p>
			 	</a>
			</li>
			<li class="nav-item bg-blue">
			 	<a href="<?= base_url()?>Admin/Login/logout" class="nav-link" >
                    <i class="nav-icon fas fa-sign-out-alt"></i>
                    <p>Log Out</p>
			 	</a>
			</li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
