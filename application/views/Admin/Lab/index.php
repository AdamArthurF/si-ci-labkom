<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark">Daftar Laboratorium</h1>
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
		<button class="btn btn-primary" data-toggle="modal" data-target="#labModal">
			<i class="fa fa-plus"></i>
			Tambah Data Lab
		</button>
		<div class="mb-3">

		</div>
		<table class="table">
			<tr>
				<th>No</th>
				<th>Nama Lab</th>
				<th></th>
			</tr>
        <?php
		$no = 1;
		/** @var array $lab */
		foreach ($lab as $row) : ?>
			<tr>
				<td><?= $no++ ?></td>
				<td><?= $row['nama_lab'] ?></td>
				<td>
					<?= anchor('Admin/Lab/delete/' . $row['id_lab'], '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>'); ?>
					<?= anchor('Admin/Lab/edit/' . $row['id_lab'], '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>'); ?>
				</td>
			</tr>
        <?php endforeach; ?>
        </table>
    </section>

	<!-- Modal -->
	<div class="modal fade" id="labModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="exampleModalLabel">Tambah  Data Lab Baru</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="post" action="<?= base_url() . 'Admin/Lab/insert_entry' ?>">
						<div class="form-group">
							<label for="nama_lab"> Nama Lab</label>
							<input type="text" id="nama_lab" name="nama_lab" class="form-control">
						</div>
						<button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
						<button type="submit" class="btn btn-primary">Tambah Data</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
