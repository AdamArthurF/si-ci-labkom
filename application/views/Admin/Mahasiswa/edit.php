<html>
<title>Edit Data Mahasiswa</title>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">


<div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Update Data Mahasiswa</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content"> 
        <?php foreach ($mhs as $row) {?>
            <form action="<?php echo base_url().'C_Mhs/update' ?>" method="post">

                    <div class="form-group">
                        <label for=""> NIM</label>
                        <input type="hidden" name="nim" class="form-control"
                        value="<?php echo $row->nim;?>">
                        <input type="text" name="......" class="form-control"
                        value="<?php echo $row->nim;?>" readonly> 
                        <!-- Kalo semisal pake readonly nama inputnya jangan tabrakan!! -->
                    </div>

                    <div class="form-group">
                        <label for=""> Nama Lengkap</label>
                        <input type="Text" name="nama_lengkap" class="form-control"
                        value="<?php echo $row->nama_lengkap;?>">
                    </div>

                    <div class="form-group">
                        <label for=""> Angkatan </label>
                        <input type="Text" name="angkatan" class="form-control"
                        value="<?php echo $row->angkatan;?>">
                    </div>



                    <div class="form-group">
                        <label for=""> Program Studi</label>
                        <input type="Text" name="prodi" class="form-control"
                        value="<?php echo $row->prodi;?>">
                    </div>

                    <div class="form-group">
                        <label for=""> Nomor WA</label>
                        <input type="Text" name="no_wa" class="form-control"
                        value="<?php echo $row->no_wa;?>">
                    </div>

                    <div class="form-group">
                        <label for=""> Email</label>
                        <input type="Text" name="email" class="form-control"
                        value="<?php echo $row->email;?>">
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