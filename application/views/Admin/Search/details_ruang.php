<html>
<title>Details Peminjaman Ruang </title>
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
                            <td>Nomor Telepon(WA)</td>
                            <?php foreach ($p_ruang as $row) { ?>
                            <td> : <?php echo $row->no_wa ?></td>
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
                            <?php 
                            setlocale (LC_ALL, 'id_ID.UTF8', 'id_ID.UTF-8', 'id_ID.8859-1', 'id_ID', 'IND.UTF8', 'IND.UTF-8', 'IND.8859-1', 'IND', 'Indonesian.UTF8', 'Indonesian.UTF-8', 'Indonesian.8859-1', 'Indonesian', 'Indonesia', 'id', 'ID');

                            foreach ($p_ruang as $row) { ?>
                            <td> : <?php echo strftime( " %A %d %B %Y " , strtotime($row->tanggal));?></td>
                            <?php } ?>
                    </tr>

                    <tr>
                            <td>Jam Pinjam </td>
                            <?php foreach ($p_ruang as $row) { ?>
                                <td> : <?php echo date("H.i", strtotime($row->jam_pinjam))?></td>
                            <?php } ?>
                    </tr>

                    <tr>
                            <td>Jam Kembali </td>
                            <?php foreach ($p_ruang as $row) { ?>
                                <td> : <?php echo date("H.i", strtotime($row->jam_kembali))?></td>
                            <?php } ?>
                    </tr>

                    <tr>
                            <td>Keperluan </td>
                            <?php foreach ($p_ruang as $row) { ?>
                            <td> : <?php echo $row->keperluan ?></td>
                            <?php } ?>
                    </tr>
                    
              </table>
                            <div align="center" class="mt-5 ">     
                                                            
                              <button class="btn btn-primary btn-sm " onclick="goBack()">KEMBALI</button>
                              <script>
                                function goBack() {
                                window.history.back();
                                }
                                </script>
                              <?php echo anchor('C_PinjamRuang/word/'.$row->id_pinjam_ruang,'<div class="btn btn-warning btn-sm">DOWNLOAD</div>') ?>
                            </div>
                    
              </div>
            </div>

        </section>

    



</div>
</div>
</html>