<html>
<title>Details Pengajuan Surat Bebas Labkom </title>
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
              <h3 class="mb-5" align="center"> Details Pengajuan Surat Bebas Labkom</h3>
              <table class="table table-striped mx-auto" >     

                    <tr>
                            <td>ID Surat  </td>
                            <?php foreach ($surat as $row) { ?>
                            <td> : <?php echo $row->id_surat ?></td>
                            <?php } ?>
                    </tr>

                    <tr>
                            <td>NIM </td>
                            <?php foreach ($surat as $row) { ?>
                            <td> : <?php echo $row->nim ?></td>
                            <?php } ?>
                    </tr>

                    <tr>
                            <td>Nama </td>
                            <?php foreach ($surat as $row) { ?>
                            <td> : <?php echo $row->nama_lengkap ?></td>
                            <?php } ?>
                    </tr>

                    <tr>
                            <td>Program Studi</td>
                            <?php foreach ($surat as $row) { ?>
                            <td> : <?php echo $row->prodi ?></td>
                            <?php } ?>
                    </tr>


                    <tr>
                            <td>E-Mail </td>
                            <?php foreach ($surat as $row) { ?>
                            <td> : <?php echo $row->email ?></td>
                            <?php } ?>
                    </tr>


                    <tr>
                            <td>Nomor WhatsApp</td>
                            <?php foreach ($surat as $row) { ?>
                            <td> : <?php echo $row->no_wa ?></td>
                            <?php } ?>
                    </tr>

                    <tr>
                            <td>Tanggal Pembuatan Surat </td>
                            <?php foreach ($surat as $row) { ?>
                            <td> : <?php echo $row->tanggal ?></td>
                            <?php } ?>
                    </tr>


                    
                    <!-- <tr >
                              <td></td>
                              <td>
                              <?php foreach ($surat as $row) { ?>
                              
                              <ul>

                              
                              </ul>
                              <?php } ?>
                              </td>
                              <td></td>
                    </tr> -->
              </table>
                            <div align="center" class="mt-5 ">     
                              <?php echo anchor('C_SuratBebas','<div class="btn btn-primary btn-sm">KEMBALI</div>') ?>
                              <?php echo anchor('C_SuratBebas/edit/'.$row->id_surat,'<div class="btn btn-info btn-sm">EDIT</div>') ?>
                              <?php echo anchor('C_SuratBebas/word/'.$row->id_surat,'<div class="btn btn-warning btn-sm">DOWNLOAD</div>') ?>
                              <?php echo anchor('C_SuratBebas/delete_entry/'.$row->id_surat,'<div class="btn btn-danger btn-sm">HAPUS</div>') ?>
                            </div>
                    
              </div>
            </div>

        </section>

    



</div>
</div>
</html>