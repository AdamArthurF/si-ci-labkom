<html>
<title>Hasil Pencarian</title>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

<div class="content-wrapper">

     <!-- Content Header (Page header) -->
     <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            
            <h1 class="m-0 text-dark">Hasil Pencarian <?php foreach ($mhs as $row) :   echo $row->nim; endforeach;?> </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content mt-4">
    <h4>Data Mahasiswa</h4>
      <div class="mb-3"></div>
              <table class="table" >
                  <thead>
                      <tr>
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
                      foreach ($mhs as $row) :?>
                          <tr>
                              <td><?php echo $row->nim; ?></td>
                              <td><?php echo $row->nama_lengkap; ?></td>
                              <td><?php echo $row->angkatan; ?></td>
                              <td><?php echo $row->prodi; ?></td>
                              <td><?php echo $row->no_wa; ?></td>
                              <td><?php echo $row->email; ?></td>

                          </tr>
                      <?php endforeach; ?>
                  </tbody>
              </table>
    </section>


