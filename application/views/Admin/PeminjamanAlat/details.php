<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
      	<div class="container-fluid">
        	<div class="row mb-2">
          		<div class="col-sm-6">
          		</div><!-- /.col -->
				<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
				</ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
		<div class="card mx-auto">
	  		<div class="card-body">
		  		<h3 class="mb-5">Detail Peminjaman Alat</h3>
				<table class="table table-striped mx-auto" >
					<thead>
						<tr>
							<th>NIM</th>
							<th>Nama Lengkap</th>
							<th>Prodi</th>
							<th>Tanggal Pinjam</th>
							<th>Tanggal Kembali</th>
							<th>Waktu</th>
							<th>Tempat</th>
							<th>Nama Alat</th>
							<th>Harga Sewa Alat</th>
							<th>Jumlah Alat</th>
							<th>Keperluan Alat</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<?php setlocale (LC_ALL, 'id_ID.UTF8', 'id_ID.UTF-8', 'id_ID.8859-1', 'id_ID', 'IND.UTF8', 'IND.UTF-8', 'IND.8859-1', 'IND', 'Indonesian.UTF8', 'Indonesian.UTF-8', 'Indonesian.8859-1', 'Indonesian', 'Indonesia', 'id', 'ID') ?>
							<td><?= /** @var object $p_alat */
                                $p_alat->nim ?></td>
							<td><?= $p_alat->nama_lengkap ?></td>
							<td><?= $p_alat->prodi ?></td>
							<td><?= strftime( " %A %d %B %Y " , strtotime($p_alat->tanggal_pinjam)) ?></td>
							<td><?= strftime( " %A %d %B %Y " , strtotime($p_alat->tanggal_pinjam)) ?></td>
							<td><?= date("H.i", strtotime($p_alat->jam)) ?></td>
							<td><?= $p_alat->tempat ?></td>
							<td><?= $p_alat->nama_alat ?></td>
							<td><?= $p_alat->harga ?></td>
							<td><?= $p_alat->jumlah_alat ?></td>
							<td><?= $p_alat->keperluan ?></td>
							<td><?= $p_alat->status ?></td>
						</tr>
					</tbody>
				</table>
				<div class="mt-5">
				  	<?= anchor('Admin/PeminjamanAlat', '<div class="btn btn-primary btn-sm">Kembali</div>') ?>
				  	<?= anchor('Admin/PeminjamanAlat/edit/' . $p_alat->id_pinjam_alat,'<div class="btn btn-info btn-sm">Edit</div>') ?>
				  	<?= anchor('Admin/PeminjamanAlat/word/' . $p_alat->id_pinjam_alat,'<div class="btn btn-warning btn-sm">Download</div>') ?>
				  	<?= anchor('Admin/PeminjamanAlat/delete/' . $p_alat->id_pinjam_alat,'<div class="btn btn-danger btn-sm">Hapus</div>') ?>
				</div>
			</div>
		</div>
	</section>
</div>
