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
                <h3 class="mb-5" align="center"> Details Pengajuan Surat Bebas Labkom</h3>
                <table class="table table-striped mx-auto" >
                    <thead>
                        <tr>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Prodi</th>
                            <th>Email</th>
                            <th>No WA</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?= /** @var object $surat */
                                $surat->nim ?></td>
                            <td><?= $surat->nama_lengkap ?></td>
                            <td><?= $surat->prodi ?></td>
                            <td><?= $surat->email ?></td>
                            <td><?= $surat->no_wa ?></td>
                            <td><?= $surat->tanggal ?></td>
                        </tr>
                    </tbody>
                </table>
                <div class="mt-5 text-center">
                    <?php echo anchor('Admin/SuratBebasLabkom','<div class="btn btn-primary btn-sm">Kembali</div>') ?>
                    <?php echo anchor('Admin/SuratBebasLabkom/edit/'.$surat->id_surat,'<div class="btn btn-info btn-sm">Edit</div>') ?>
                    <?php echo anchor('Admin/SuratBebasLabkom/word/'.$surat->id_surat,'<div class="btn btn-warning btn-sm">Download</div>') ?>
                    <?php echo anchor('Admin/SuratBebasLabkom/delete_entry/'.$surat->id_surat,'<div class="btn btn-danger btn-sm">Hapus</div>') ?>
                </div>
            </div>
        </div>
    </section>
</div>
