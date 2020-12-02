<html>
<title>List Pengajuan Surat Bebas Lab  </title>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

<div class="content-wrapper">

     <!-- Content Header (Page header) -->
     <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">List Surat Bebas Lab </h1>
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
        Tambah Pengajuan Surat Bebas
      </button>
      <div class="mb-3"></div>
        <table class="table">
        <tr>
            <th> No </th>
            <th> ID SURAT </th>
            <th> NIM</th>
            <th> Nama</th>
            <th> Email</th>
            <th> Nomor WhatsApp</th>
            <th> Tanggal</th>
            <th >  </th>
        </tr>

        <?php 
          $i = $this->uri->segment(3)+1;
         foreach ($data->result() as $row) :?>
             <tr>
                 <td><?php echo $i++; ?></td>
                 <td><?php echo $row->id_surat; ?></td>
                 <td><?php echo $row->nim; ?></td>
                 <td><?php echo $row->nama_lengkap; ?></td>
                 <td><?php echo $row->email; ?></td>
                 <td><?php echo $row->no_wa; ?></td>
                 <td><?php echo $row->tanggal; ?></td>

                 <td>
                    <?php echo anchor('C_SuratBebas/delete_entry/'.$row->id_surat,'<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?>
                     <?php echo anchor('C_SuratBebas/details/'.$row->id_surat,'<div class="btn btn-warning btn-sm"><i class="fa fa-info-circle"></i></div>') ?>

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
        <h4 class="modal-title" id="exampleModalLabel">Tambah  Pengajuan Surat Bebas Lab</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" action="<?php echo base_url().'C_SuratBebas/insert_entry'; ?>">
        

        
        <div class="form-group">
            <label > Nim </label>
            <input type="text" name="nim" class="form-control">
        </div>



        <div class="form-group">
            <?php
              setlocale (LC_ALL, 'id_ID.UTF8', 'id_ID.UTF-8', 'id_ID.8859-1', 'id_ID', 'IND.UTF8', 'IND.UTF-8', 'IND.8859-1', 'IND', 'Indonesian.UTF8', 'Indonesian.UTF-8', 'Indonesian.8859-1', 'Indonesian', 'Indonesia', 'id', 'ID');
              $date = strftime( "%d %B %Y" , time());
            ?>
            <!-- <label >Tanggal </label> -->
            <input type="hidden" name="tanggal" class="form-control" value="<?php echo $date ?>">
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