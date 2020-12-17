<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark"> Edit Data Peminjaman Alat</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->
	<section class="content">
		<?= form_open(base_url() . 'Admin/PeminjamanAlat/update') ?>
			<div class="form-group">
				<label for="nim"> NIM</label>
				<?= /** @var object $p_alat */
				form_input('nim', $p_alat->nim, 'id="nim" class="form-control"') ?>
			</div>
			<div class="form-group">
				<label for="tanggal_pinjam">Tanggal Pinjam</label>
				<input type="date" id="tanggal_pinjam" name="tanggal_pinjam" class="form-control"
				value="<?= $p_alat->tanggal_pinjam ?>" >
			</div>
			<div class="form-group">
				<label for="tanggal_kembali">Tanggal Kembali</label>
				<input type="date" id="tanggal_kembali" name="tanggal_kembali" class="form-control"
				value="<?= $p_alat->tanggal_kembali ?>" >
			</div>
			<div class="form-group">
				<label for="jam">Waktu</label>
				<input type="time" id="jam" name="jam" class="form-control"
				value="<?= $p_alat->jam ?>" >
			</div>
			<div class="form-group">
				<label for="tempat">Tempat</label>
				<?= form_input('tempat', $p_alat->tempat, 'id="tempat" class="form-control"') ?>
			</div>
			<div class="form-group">
				<label for="jumlah_alat">Jumlah Alat</label>
				<?= form_input('jumlah_alat', $p_alat->jumlah_alat, 'id="jumlah_alat" class="form-control"') ?>
			</div>
			<div class="form-group">
				<label for="keperluan">Keperluan</label>
				<textarea class="form-control" id="keperluan" name="keperluan" rows="4" placeholder="Contoh : 'Untuk Seminar TA di Gd.A FMIPA UNS'"><?= $p_alat->keperluan ?></textarea>
			</div>
			<div class="form-group">
				<label for="alat">Alat</label>
				<?php
				  	$option = [];
				  	$selected = $p_alat->id_alat;
				  	foreach ($this->PeminjamanAlat->get_alat()->result() as $row) {
				  		$option[$row->id_alat] = $row->nama_alat;
				  	}
				  	echo form_dropdown('id_alat', $option, $selected, 'id="alat" class="form-control"');
				?>
			</div>
			<div class="form-group">
				 <label for="status"> Status </label>
				 <?php
				 $options = [
				   'belum lunas' => 'Belum lunas',
				   'lunas' => 'Lunas'
				 ];
				 $selected = $p_alat->status;
				 echo form_dropdown('status', $options, $selected, 'id="status" class="form-control"');
				 ?>
			</div>
			<button type="button" class="btn btn-primary btn" onclick="goBack()">Kembali</button>
			<button type="reset" class="btn btn-danger">Reset</button>
			<button type="submit" class="btn btn-primary">Update</button>
		<?= form_close() ?>
		<script>
			function goBack() {
				window.history.back();
			}
		</script>
	</section>
</div>
