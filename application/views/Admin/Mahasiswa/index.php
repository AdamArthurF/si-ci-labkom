<div class="content-wrapper">
 	<!-- Content Header (Page header) -->
 	<div class="content-header">
      	<div class="container-fluid">
        	<div class="row mb-2">
          		<div class="col-sm-6">
            		<h1 class="m-0 text-dark">Daftar Mahasiswa</h1>
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
      	<button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        	<i class="fa fa-plus"></i>
        	Tambah Data Mahasiswa
		</button>
      	<div class="mb-3"></div>
	  		<table class="table" >
			  	<thead>
				  	<tr>
					  	<th>No</th>
					  	<th>NIM</th>
					  	<th>Nama Lengkap</th>
					  	<th>Angkatan</th>
				  		<th>Prodi</th>
					  	<th>No WA</th>
					  	<th>Email</th>
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
						  	<td><?= $row->nim ?></td>
						  	<td><?= $row->nama_lengkap ?></td>
						  	<td><?= $row->angkatan ?></td>
						  	<td><?= $row->prodi ?></td>
							<td><?= $row->no_wa ?></td>
						  	<td><?= $row->email ?></td>
						  	<td>
							  	<?= anchor('Admin/Mahasiswa/delete/'. $row->nim,'<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?>
							  	<?= anchor('Admin/Mahasiswa/edit/'. $row->nim,'<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>') ?>
						  	</td>
					  	</tr>
					<?php endforeach ?>
                  </tbody>
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
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  	<div class="modal-dialog">
			<div class="modal-content">
		  		<div class="modal-header">
					<h4 class="modal-title" id="exampleModalLabel">Tambah Data Mahasiswa</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  			<span aria-hidden="true">&times;</span>
					</button>
		  		</div>
				<div class="modal-body">
					<h3>Upload File Excel</h3>
					<a href="<?= base_url() . 'Admin/Mahasiswa/download' ?>">Download Template File Excel</a>
					<?= form_open_multipart('Admin/Mahasiswa/upload') ?>
						<div class="form-group">
							<input type='file' name='file' size='20'>
							<input type='submit' name='submit' value='upload' class='btn btn-primary'>
						</div>
					<?= form_close() ?>
					<h4 class="bg-warning text-center mt-3 mb-3">Atau</h4>
					<h3>Input Manual</h3>
					<?= form_open(base_url() . 'Admin/Mahasiswa/insert') ?>
						<div class="form-group">
							<label for="nim"> NIM</label>
							<?= form_input('nim', '', 'id="nim" class="form-control"') ?>
						</div>
						<div class="form-group">
							<label for="nama_lengkap"> Nama Lengkap</label>
							<?= form_input('nama_lengkap', '', 'id="nama_lengkap" class="form-control"') ?>
						</div>
						<div class="form-group">
							<label for="angkatan"> Angkatan</label>
							<?= form_input('angkatan', '', 'id="angkatan" class="form-control"') ?>
						</div>
						<div class="form-group">
							<label for="prodi">Program Studi</label>
							<?php
							$option = [
								'D3-Farmasi' => 'D3-Farmasi',
								'D3-Teknik Informatika' => 'D3-Teknik Informatika',
								'S1-Matematika' => 'S1-Matematika',
								'S1-Fisika' => 'S1-Fisika',
								'S1-Informatika' => 'S1-Informatika',
								'S1-Statistika' => 'S1-Statistika',
								'S1-Biologi' => 'S1-Biologi',
								'S1-Farmasi' => 'S1-Farmasi',
								'S1-Kimia' => 'S1-Kimia',
								'S1-Ilmu Lingkungan' => 'S1-Ilmu Lingkungan',
								'S2-Fisika' => 'S2-Fisika',
								'S2-Biosains' => 'S2-Biosains',
								'S2-Kimia' => 'S2-Kimia'
							];
							echo form_dropdown('prodi', $option, '', 'id="prodi" class="form-control custom-select"') ?>
						</div>
						<div class="form-group">
							<label for="no_wa">Nomor WA</label>
							<?= form_input('no_wa', '' , 'id="no_wa" class="form-control"') ?>
						</div>
						<div class="form-group">
							<label for="email"> Email</label>
							<?= form_input('email', '', 'id="email" class="form-control"') ?>
						</div>
						<?= form_reset('', 'Reset', 'class="btn btn-danger" data-dismiss="modal"') ?>
						<?= form_submit('', 'Tambah', 'class="btn btn-primary"') ?>
					<?= form_close() ?>
				</div>
	  		</div>
		</div>
	</div>
</div>
