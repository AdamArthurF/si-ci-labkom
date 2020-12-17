<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
      	<div class="container-fluid">
        	<div class="row mb-2">
          		<div class="col-sm-6">
            		<h1 class="m-0 text-dark">Daftar Alat</h1>
          		</div>
				<!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">

					</ol>
				</div>
				<!-- /.col -->
        	</div><!-- /.row -->
      	</div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
      	<button class="btn btn-primary" data-toggle="modal" data-target="#alatModal">
        	<i class="fa fa-plus"></i>Tambah Data Alat
      	</button>
      	<table class="table mt-3" >
		  	<thead>
			  	<tr>
				  	<th>No</th>
				  	<th>Nama Alat</th>
				  	<th>Harga Sewa</th>
				  	<th></th>
			  	</tr>
		  	</thead>
		  	<tbody>
		  	<!--Fetch data dari database-->
		  	<?php
		   		$i = $this->uri->segment(3)+1;
				/** @var array $data */
			foreach ($data->result() as $row): ?>
				<tr>
					<td><?= $i++ ?></td>
					<td><?= $row->nama_alat ?></td>
					<td><?= $row->harga ?></td>
					<td>
						<?= anchor('Admin/Alat/delete/' . $row->id_alat, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>'); ?>
						<?= anchor('Admin/Alat/edit/' . $row->id_alat, '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>'); ?>
					</td>
			  	</tr>
		  	<?php endforeach ?>
		  	</tbody>
	  	</table>
		  	<div class="row">
			  	<div class="col">
				  	<!--Tampilkan pagination-->
				  	<?= /** @var mixed $pagination */
				  	$pagination ?>
			  	</div>
		  	</div>
    </section>

	<!-- Modal -->
	<div class="modal fade" id="alatModal" tabindex="-1" role="dialog" aria-labelledby="alatModalLabel" aria-hidden="true">
	  	<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="alatModalLabel">Tambah  Data Alat Baru</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times</span>
					</button>
				</div>
				<div class="modal-body">
					<?= form_open(base_url() . 'Admin/Alat/insert') ?>
						<div class="form-group">
							<label for="nama_alat">Nama Alat</label>
							<?= form_input('nama_alat', '', 'id="nama_alat" class="form-control"') ?>
						</div>
						<div class="form-group">
							<label for="harga">Harga</label>
							<?= form_input('harga', '', 'id="harga" class="form-control"') ?>
						</div>
						<button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
						<?= form_submit('', 'Tambah', 'class="btn btn-primary"') ?>
					<?= form_close() ?>
				</div>
  			</div>
		</div>
	</div>
</div>
