<html>
<title>Edit Data Surat Pengajuan Bebas Lab</title>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">


<div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Update Data Surat Pengajuan Bebas Lab</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content"> 
        <?php foreach ($surat as $row) {?>
            <form action="<?php echo base_url().'C_SuratBebas/update' ?>" method="post">

                    <div class="form-group">
                        <label for=""> ID Surat</label>
                        <input type="hidden" name="id_surat" class="form-control"
                        value="<?php echo $row->id_surat;?>">
                        <input type="text" name="......" class="form-control"
                        value="<?php echo $row->id_surat;?>" readonly> 
                        <!-- Kalo semisal pake readonly nama inputnya jangan tabrakan!! -->
                    </div>

                    <div class="form-group">
                        <label for=""> NIM</label>
                        <input type="Text" name="nim" class="form-control"
                        value="<?php echo $row->nim;?>">
                    </div>



                    <div class="form-group">
                        <?php
                          setlocale (LC_ALL, 'id_ID.UTF8', 'id_ID.UTF-8', 'id_ID.8859-1', 'id_ID', 'IND.UTF8', 'IND.UTF-8', 'IND.8859-1', 'IND', 'Indonesian.UTF8', 'Indonesian.UTF-8', 'Indonesian.8859-1', 'Indonesian', 'Indonesia', 'id', 'ID');
                          $date = strftime( "%d %B %Y" , time());
                        ?>
                        <!-- <label >Tanggal </label> -->
                        <input type="hidden" name="tanggal" class="form-control" value="<?php echo 'Surakarta, '.$date ?>">
                    </div>



                    <button class="btn btn-primary btn " onclick="goBack()">Kembali</button>
                     <script>
                         function goBack() {
                         window.history.back();
                         }
                     </script>

                    <button type="reset" class="btn btn-danger">Reset</button>
                    <button type="submit" class="btn btn-primary">Simpan Data</button>

            </form>

                  <?php } ?>
    </section>
</div>