<div class="wrapper">
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<div class="content-header">
      		<div class="container-fluid">
        		<div class="row mb-2">
					<div class="col-sm-6">
						<h1 class="m-0 text-dark"> Update Data Alat</h1>
					</div><!-- /.col -->
				  	<div class="col-sm-6">

				  	</div><!-- /.col -->
        		</div><!-- /.row -->
      		</div><!-- /.container-fluid -->
    	</div>
    	<!-- /.content-header -->
    	<section class="content">
			<form action="<?= base_url() .'Admin/Alat/update' ?>" method="post">
				<div class="form-group">
					<label for="id_alat"> ID Alat</label>
					<input type="hidden" id="id_alat" name="id_alat" class="form-control"
						   value="<?= /** @var object $alat */
						   $alat->id_alat ?>" readonly>
					<!-- Kalo semisal pake readonly nama inputnya jangan tabrakan!! -->
				</div>
				<div class="form-group">
					<label for="nama_alat"> Nama Alat</label>
					<input type="text" id="nama_alat" name="nama_alat" class="form-control"
					value="<?= $alat->nama_alat ?>">
				</div>
				<div class="form-group">
					<label for="harga"> Harga</label>
					<input type="text" id="harga" name="harga" class="form-control"
					value="<?= $alat->harga ?>">
				</div>
				<button class="btn btn-primary btn" onclick="goBack()">Kembali</button>
				<button type="reset" class="btn btn-danger">Reset</button>
				<button type="submit" class="btn btn-primary">Simpan Data</button>
			</form>
    </section>
  	<script>
	 function goBack() {
	 	window.history.back();
	 }
 	</script>
</div>
