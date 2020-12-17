<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
      	<div class="container-fluid">
        	<div class="row mb-2">
          		<div class="col-sm-6">
            		<h1 class="m-0 text-dark">Daftar Peminjam Alat</h1>
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
      	<button class="btn btn-primary" data-toggle="modal" data-target="#peminjamanAlatModal">
        	<i class="fa fa-plus"></i>
        	Tambah Data Peminjaman Alat
      	</button>
      	<button class="btn btn-success" onclick="window.location.href='Admin/PeminjamanAlat/export_excel';">
			<i class="fa fa-file-excel"></i>
      		Export Laporan Ms.Excel
      	</button>
        <table class="table mt-3">
			<thead>
				<tr>
					<th>No </th>
					<th>ID </th>
					<th>NIM</th>
					<th>Nama</th>
					<th>Tanggal Pinjam</th>
					<th>Tanggal Kembali</th>
					<th>Alat</th>
					<th>Status</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php
				$i = $this->uri->segment(3)+1;
				/** @var mixed $data */
				foreach ($data->result() as $row): ?>
					<tr>
						<td><?= $i++ ?></td>
						<td><?= $row->id_pinjam_alat ?></td>
						<td><?= $row->nim ?></td>
						<td><?= $row->nama_lengkap ?></td>
						<td><?= $row->tanggal_pinjam ?></td>
						<td><?= $row->tanggal_kembali ?></td>
						<td><?= $row->nama_alat ?></td>
						<td><?= $row->status ?></td>
						<td>
							<?= anchor('Admin/PeminjamanAlat/delete_entry/'.$row->id_pinjam_alat,'<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?>
							<?= anchor('Admin/PeminjamanAlat/details/'.$row->id_pinjam_alat,'<div class="btn btn-warning btn-sm"><i class="fa fa-info-circle"></i></div>') ?>
						</td>
					</tr>
				<?php endforeach ?>
          	<tbody>
        </table>
        <div class="row">
			<div class="col">
			  	<!-- Tampilkan pagination -->
			  	<?= /** @var mixed $pagination */
			  	$pagination ?>
			</div>
	  	</div>
    </section>
	<!-- Modal -->
	<div class="modal fade" id="peminjamanAlatModal" tabindex="-1" role="dialog" aria-labelledby="peminjamanAlatModalLabel" aria-hidden="true">
	  	<div class="modal-dialog">
			<div class="modal-content">
		  		<div class="modal-header">
					<h4 class="modal-title" id="peminjamanAlatModalLabel">Tambah Data Peminjaman Alat</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					  	<span aria-hidden="true">&times;</span>
					</button>
		  		</div>
		  		<div class="modal-body">
					<?= form_open(base_url() . 'Admin/PeminjamanAlat/insert') ?>
						<div class="form-group">
							<label for="nim"> Nim </label>
							<?= form_input('nim', '', 'id="nim" class="form-control"')?>
						</div>
						<div class="form-group">
							<label for="tanggal_pinjam">Tanggal Pinjam</label>
							<input type="date" id="tanggal_pinjam" name="tanggal_pinjam" class="form-control">
						</div>
						<div class="form-group">
							<label for="tanggal_kembali">Tanggal Kembali</label>
							<input type="date" id="tanggal_kembali" name="tanggal_kembali" class="form-control">
						</div>
						<div class="form-group">
							<label for="jam">Waktu Mulai</label>
							<input type="time" id="jam" name="jam" class="form-control">
						</div>
						<div class="form-group">
							<label for="tempat">Tempat</label>
							<?= form_input('tempat', '', 'id="tempat" class="form-control"')?>
						</div>
						<div class="form-group">
							<label for="alat">Alat</label>
							<?php
							$option = [];
						  	foreach ($this->PeminjamanAlat->get_alat()->result() as $row) {
							  	$option[$row->id_alat] = $row->nama_alat;
						 	}
						  	echo form_dropdown('id_alat', $option, '', 'id="alat" class="form-control custom-select"'); ?>
						</div>
						<div class="form-group">
							<label for="jumlah_alat"> Jumlah Alat </label>
							<input type="number" min="0" id="jumlah_alat" name="jumlah_alat" class="form-control">
						</div>
						<div class="form-group">
							<label for="keperluan">Keperluan</label>
							<textarea class="form-control" id="keperluan" name="keperluan" rows="4" placeholder="Contoh : 'Untuk Seminar TA di Gd.A FMIPA UNS'"></textarea>
						</div>
						<div class="form-group">
							<label for="status"> Status </label>
							<?php
							$option = [
							  'Belum lunas' => 'Belum lunas',
							  'Lunas' => 'Lunas'
							];
							echo form_dropdown('status', $option, '', 'class="form-control custom-select"');
							?>
						</div>
						<button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
						<button type="submit" class="btn btn-primary">Tambah Data</button>
					<?= form_close() ?>
				</div>
	  		</div>
		</div>
	</div>
</div>

