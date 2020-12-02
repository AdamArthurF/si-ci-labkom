<html>
<title>Edit Data Peminjaman Alat</title>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">


<div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Update Data Peminjaman Alat</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content"> 
        <?php foreach ($p_alat as $row) {?>
            <form action="<?php echo base_url().'C_PinjamAlat/update' ?>" method="post">

                    <div class="form-group">
                        <!-- <label for=""> ID Siswa</label> -->
                        <input type="hidden" name="id_pinjam_alat" class="form-control"
                        value="<?php echo $row->id_pinjam_alat;?>">
                        <input type="text" name="......" class="form-control"
                        value="<?php echo $row->id_pinjam_alat;?>" readonly> 
                        <!-- Kalo semisal pake readonly nama inputnya jangan tabrakan!! -->
                    </div>

                      <div class="form-group">
                        <label for=""> NIM</label>
                        <input type="text" name="nim" class="form-control"
                        value="<?php echo $row->nim;?>" >
                    </div>

                    <div class="form-group">
                        <label for=""> Tanggal Pinjam</label>
                        <input type="date" name="tanggal_pinjam" class="form-control"
                        value="<?php echo $row->tanggal_pinjam;?>" >
                    </div>

                    <div class="form-group">
                        <label for=""> Tanggal Kembali</label>
                        <input type="date" name="tanggal_kembali" class="form-control"
                        value="<?php echo $row->tanggal_kembali;?>" >
                    </div>

                    <div class="form-group">
                        <label for=""> Waktu</label>
                        <input type="time" name="jam" class="form-control"
                        value="<?php echo $row->jam;?>" >
                    </div>

                    <div class="form-group">
                        <label for=""> Tempat</label>
                        <input type="text" name="tempat" class="form-control"
                        value="<?php echo $row->tempat;?>" >
                    </div>



                    <div class="form-group">
                        <label for=""> Jumlah Alat</label>
                        <input type="text" name="jumlah_alat" class="form-control"
                        value="<?php echo $row->jumlah_alat;?>" >
                    </div>

                    <div class="form-group">
                        <label > Keperluan Meminjam</label>
                        <textarea class="form-control" name="keperluan" rows="4" placeholder="Contoh : 'Untuk Seminar TA di Gd.A FMIPA UNS'"><?php echo $row->keperluan;?></textarea>      
                    </div>


                    <div class="form-group">
                        <label > Alat </label>
                        <?php  
                          $queryAlat=$this->M_PinjamAlat->get_alat();
                          $option = array();
                          $selected = $row->id_alat;
                          foreach ($queryAlat->result() as $row)
                          {
                                  $option[$row->id_alat]=$row->nama_alat;
                          }
                          echo form_dropdown('id_alat', $option, $selected, 'class="form-control"');
                        ?>
                    </div>
                  <?php } ?>

                  <?php foreach ($p_alat as $row) {?>
                    <div class="form-group">
                         <label > Status </label>
                         <?php
                         $options = array(
                           'belum lunas'           => 'Belum lunas',
                           'lunas'                 => 'Lunas'
                         );
                         $selected = $row->status;
                         echo form_dropdown('status', $options, $selected, 'class="form-control"');

                         ?>
                     </div>
                    
                     <button class="btn btn-primary btn" onclick="goBack()">Kembali</button>
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