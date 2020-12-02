<html>
<title>Edit Data Peminjaman Ruang</title>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">


<div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Update Data Peminjaman Ruang</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content"> 
        <?php foreach ($p_ruang as $row) {?>
            <form action="<?php echo base_url().'C_PinjamRuang/update' ?>" method="post">

                    <div class="form-group">
                        <label for=""> ID Peminjaman</label>
                        <input type="hidden" name="id_pinjam_ruang" class="form-control"
                        value="<?php echo $row->id_pinjam_ruang;?>">
                        <input type="text" name="......" class="form-control"
                        value="<?php echo $row->id_pinjam_ruang;?>" readonly> 
                        <!-- Kalo semisal pake readonly nama inputnya jangan tabrakan!! -->
                    </div>

                    <div class="form-group">
                        <label > Nim </label>
                        <input type="text" name="nim" class="form-control" value="<?php echo $row->nim; ?>">
                    </div>




        
        <?php } ?>
        <?php foreach ($p_ruang as $row) {?>


                    <div class="form-group">
                         <label >Tanggal </label>
                         <input type="date" name="tanggal" class="form-control" value="<?php echo $row->tanggal; ?>">
                    </div>

                    <div class="form-group">
                        <label > Ruang Laboratorium</label>
                        <?php  
                          $queryLab=$this->M_PinjamRuang->get_lab();
                          $option = array();
                          $selected = $row->id_lab;
                          foreach ($queryLab->result() as $row)
                          {
                                  $option[$row->id_lab]=$row->nama_lab;
                          }
                          echo form_dropdown('id_lab', $option, $selected, 'class="form-control"');
                        ?>
                    </div>
        <?php } ?>
        <?php foreach ($p_ruang as $row) {?>

                    <div class="form-group">
                         <label >Jam Pinjam </label>
                         <input type="time" name="jam_pinjam" class="form-control" value="<?php echo $row->jam_pinjam; ?>">
                    </div>

                    <div class="form-group">
                         <label >Jam Kembali </label>
                         <input type="time" name="jam_kembali" class="form-control" value="<?php echo $row->jam_kembali; ?>">
                    </div>

                    <div class="form-group">
                        <label > Keperluan Meminjam</label>
                        <textarea class="form-control" name="keperluan" rows="4" ><?php echo $row->keperluan; ?></textarea>      
                    </div>



        <?php } ?>



                    <button class="btn btn-primary btn " onclick="goBack()">Kembali</button>
                     <script>
                         function goBack() {
                         window.history.back();
                         }
                     </script>

                    
                    <button type="reset" class="btn btn-danger">Reset</button>
                    <button type="submit" class="btn btn-primary">Simpan Data</button>

            </form>

                  
    </section>
</div>