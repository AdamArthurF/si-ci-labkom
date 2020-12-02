<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
      	<div class="container-fluid">
        	<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark"> Update Data Laboratorium</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">

				</div><!-- /.col -->
        	</div><!-- /.row -->
      	</div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
		<form action="<?= base_url() .'Admin/Lab/update' ?>" method="post">
			<div class="form-group">
				<label for="id_lab"> ID Lab</label>
				<input type="hidden" id="id_lab" name="id_lab" class="form-control"
					   value="<?= /** @var object $lab */
					   $lab->id_lab ?>" readonly>
				<!-- Kalo semisal pake readonly nama inputnya jangan tabrakan!! -->
			</div>
			<div class="form-group">
				<label for="nama_lab">Nama Laboratorium</label>
				<input type="text" id="nama_lab" name="nama_lab" class="form-control"
				value="<?= $lab->nama_lab ?>" >
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
