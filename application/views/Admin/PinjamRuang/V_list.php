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
            <h1 class="m-0 text-dark">List Peminjaman Ruang  </h1>
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
        Tambah Data Peminjaman Ruang
      </button>

      <button class="btn btn-success" onclick="window.location.href='C_PinjamRuang/export_excel';">
      <i class="fa fa-file-excel"></i>
      Export Laporan Ms.Excel
      </button>

      <div class="mb-3"></div>
        <table class="table">
        <tr>
            <th> No </th>
            <th> ID </th>
            <th> NIM</th>
            <th> Nama</th>
            <th> Tanggal</th>
            <th> Ruangan</th>
            <th> </th>
        </tr>

        <?php 
          $i = $this->uri->segment(3)+1;
         foreach ($data->result() as $row) :?>
             <tr>
                 <td><?php echo $i++; ?></td>
                 <td><?php echo $row->id_pinjam_ruang; ?></td>
                 <td><?php echo $row->nim; ?></td>
                 <td><?php echo $row->nama_lengkap; ?></td>
                 <td><?php echo $row->tanggal; ?></td>
                 <td><?php echo $row->nama_lab; ?></td>
                 <td>
                    <?php echo anchor('C_PinjamRuang/delete_entry/'.$row->id_pinjam_ruang,'<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?>
                     <?php echo anchor('C_PinjamRuang/details/'.$row->id_pinjam_ruang,'<div class="btn btn-warning btn-sm"><i class="fa fa-info-circle"></i></div>') ?>
                 </td> 

             </tr>
         <?php endforeach; ?>
        </table>

        <div class="row">
                  <div class="col">
                      <!--Tampilkan pagination-->
                      <?php echo $pagination; ?>
                  </div>
              </div>
    </section>

    


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Tambah  Data Peminjaman Ruang</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="<?php echo base_url().'C_PinjamRuang/insert_entry'; ?>">
        

        
        <div class="form-group">
            <label > Nim </label>
            <input type="text" name="nim" class="form-control">
        </div>



        <div class="form-group">
            <label > Tanggal Pinjam </label>
            <input type="date" name="tanggal" class="form-control">
        </div>

        <div class="form-group">
            <label > Ruangan Laboratorium </label>
            <?php  
              $queryLab=$this->M_PinjamRuang->get_lab();
              $option = array();
              foreach ($queryLab->result() as $row)
              {
                      $option[$row->id_lab]=$row->nama_lab;
              }
              echo form_dropdown('id_lab', $option, '', 'class="form-control"');
            ?>
        </div>

        <div class="form-group">
            <label > Jam Mulai </label>
            <input type="time" name="jam_pinjam" class="form-control">
        </div>

        <div class="form-group">
            <label > Jam Kembali </label>
            <input type="time" name="jam_kembali" class="form-control">
        </div>

        
        <div class="form-group">
            <label > Keperluan Meminjam</label>
            <textarea class="form-control" name="keperluan" rows="4" s></textarea>      
        </div>

        <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
        <button type="submit" class="btn btn-primary">Tambah Data</button>

      </form>
    </div>
  </div>
</div>

</div>
</div>
</html>