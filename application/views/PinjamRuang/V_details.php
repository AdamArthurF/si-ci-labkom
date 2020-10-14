<html>
<title>List Peminjaman Ruang </title>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

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
            <div class="card mx-auto" style="width: 50rem;">
              <div class="card-body">
              <h3 class="mb-5" align="center"> Details Peminjaman Ruang</h3>
              <table class="table table-striped mx-auto" >     

                    <tr>
                            <td>ID Pinjam Ruang </td>
                            <?php foreach ($p_ruang as $row) { ?>
                            <td> : <?php echo $row->id_pinjam_ruang ?></td>
                            <?php } ?>
                    </tr>

                    <tr>
                            <td>NIM </td>
                            <?php foreach ($p_ruang as $row) { ?>
                            <td> : <?php echo $row->nim ?></td>
                            <?php } ?>
                    </tr>

                    <tr>
                            <td>Nama </td>
                            <?php foreach ($p_ruang as $row) { ?>
                            <td> : <?php echo $row->nama_lengkap ?></td>
                            <?php } ?>
                    </tr>

                    <tr>
                            <td>Program Studi</td>
                            <?php foreach ($p_ruang as $row) { ?>
                            <td> : <?php echo $row->prodi ?></td>
                            <?php } ?>
                    </tr>


                    
                    <tr>
                            <td>ID Laboratorium </td>
                            <?php foreach ($p_ruang as $row) { ?>
                            <td> : <?php echo $row->id_lab ?></td>
                            <?php } ?>
                    </tr>


                    <tr>
                            <td>Laboratorium </td>
                            <?php foreach ($p_ruang as $row) { ?>
                            <td> : <?php echo $row->nama_lab ?></td>
                            <?php } ?>
                    </tr>


                    <tr>
                            <td>Tanggal Pinjam </td>
                            <?php foreach ($p_ruang as $row) { ?>
                            <td> : <?php echo $row->tanggal ?></td>
                            <?php } ?>
                    </tr>

                    <tr>
                            <td>Jam Pinjam </td>
                            <?php foreach ($p_ruang as $row) { ?>
                            <td> : <?php echo $row->jam_pinjam ?></td>
                            <?php } ?>
                    </tr>

                    <tr>
                            <td>Jam Kembali </td>
                            <?php foreach ($p_ruang as $row) { ?>
                            <td> : <?php echo $row->jam_kembali ?></td>
                            <?php } ?>
                    </tr>

                    <tr>
                            <td>Keperluan </td>
                            <?php foreach ($p_ruang as $row) { ?>
                            <td> : <?php echo $row->keperluan ?></td>
                            <?php } ?>
                    </tr>

                    
                    <!-- <tr >
                              <td></td>
                              <td>
                              <?php foreach ($p_ruang as $row) { ?>
                              
                              <ul>

                              
                              </ul>
                              <?php } ?>
                              </td>
                              <td></td>
                    </tr> -->
              </table>
                            <div align="center" class="mt-5 ">     
                              <?php echo anchor('C_PinjamRuang','<div class="btn btn-primary btn-sm">KEMBALI</div>') ?>
                              <?php echo anchor('C_PinjamRuang/edit/'.$row->id_pinjam_ruang,'<div class="btn btn-info btn-sm">EDIT</div>') ?>
                              <?php echo anchor('C_PinjamRuang/delete_entry/'.$row->id_pinjam_ruang,'<div class="btn btn-danger btn-sm">HAPUS</div>') ?>
                            </div>
                    
              </div>
            </div>

        </section>

    



</div>
</div>
</html>