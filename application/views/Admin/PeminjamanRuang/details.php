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
        <div class="card mx-auto">
            <div class="card-body">
                <h3 class="mb-5 text-center">Detail Peminjaman Ruang</h3>
                <table class="table table-striped mx-auto" >
                    <thead>
                        <tr>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>No HP</th>
                            <th>Laboratorium</th>
                            <th>Tanggal Pinjam</th>
                            <th>Jam Pinjam</th>
                            <th>Jam Kembali</th>
                            <th>Keperluan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php setlocale (LC_ALL, 'id_ID.UTF8', 'id_ID.UTF-8', 'id_ID.8859-1', 'id_ID', 'IND.UTF8', 'IND.UTF-8', 'IND.8859-1', 'IND', 'Indonesian.UTF8', 'Indonesian.UTF-8', 'Indonesian.8859-1', 'Indonesian', 'Indonesia', 'id', 'ID') ?>
                        <tr>
                            <td><?= /** @var object $p_ruang */
                                $p_ruang->nim ?></td>
                            <td><?= $p_ruang->nama_lengkap ?></td>
                            <td><?= $p_ruang->prodi ?></td>
                            <td><?= $p_ruang->no_wa ?></td>
                            <td><?= $p_ruang->nama_lab ?></td>
                            <td><?= strftime( " %A %d %B %Y " , strtotime($p_ruang->tanggal)) ?></td>
                            <td><?= date("H.i", strtotime($p_ruang->jam_pinjam)) ?></td>
                            <td><?= date("H.i", strtotime($p_ruang->jam_kembali)) ?></td>
                            <td><?= $p_ruang->keperluan ?></td>
                        </tr>
                    </tbody>
                </table>
                <div class="mt-5 text-center">
                  <?= anchor('Admin/PeminjamanRuang','<div class="btn btn-primary btn-sm">Kembali</div>') ?>
                  <?= anchor('Admin/PeminjamanRuang/edit/' . $p_ruang->id_pinjam_ruang,'<div class="btn btn-info btn-sm">Edit</div>') ?>
                  <?= anchor('Admin/PeminjamanRuang/word/' . $p_ruang->id_pinjam_ruang,'<div class="btn btn-warning btn-sm">Download</div>') ?>
                  <?= anchor('Admin/PeminjamanRuang/delete/' . $p_ruang->id_pinjam_ruang,'<div class="btn btn-danger btn-sm">Hapus</div>') ?>
                </div>
            </div>
        </div>
    </section>
</div>
