<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Surat Bebas Labkom</h1>
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
        <button class="btn btn-primary" data-toggle="modal" data-target="#suratBebasModal">
            <i class="fa fa-plus"></i>
            Tambah Pengajuan Surat Bebas
        </button>
        <table class="table mt-2">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Nomor WA</th>
                    <th>Tanggal</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = $this->uri->segment(3) + 1;
                /** @var array $data */
                foreach ($data->result() as $row) :?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $row->id_surat ?></td>
                        <td><?= $row->nim ?></td>
                        <td><?= $row->nama_lengkap ?></td>
                        <td><?= $row->email ?></td>
                        <td><?= $row->no_wa ?></td>
                        <td><?= $row->tanggal ?></td>
                        <td>
                            <?= anchor('Admin/SuratBebasLabkom/delete/' . $row->id_surat,'<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?>
                            <?= anchor('Admin/SuratBebasLabkom/details/' . $row->id_surat,'<div class="btn btn-warning btn-sm"><i class="fa fa-info-circle"></i></div>') ?>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        <div class="row">
            <div class="col">
                <!--Tampilkan pagination-->
                <?= /** @var mixed $pagination */
                $pagination ?>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="suratBebasModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Tambah  Pengajuan Surat Bebas Lab</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <?= form_open(base_url() . 'Admin/SuratBebasLabkom/index') ?>
                    <div class="form-group">
                        <label>NIM</label>
                        <?= form_input('nim', '', 'id="nim" class="form-control"') ?>
                    </div>
                    <div class="form-group">
                        <?php setlocale (LC_ALL, 'id_ID.UTF8', 'id_ID.UTF-8', 'id_ID.8859-1', 'id_ID', 'IND.UTF8', 'IND.UTF-8', 'IND.8859-1', 'IND', 'Indonesian.UTF8', 'Indonesian.UTF-8', 'Indonesian.8859-1', 'Indonesian', 'Indonesia', 'id', 'ID');
                        $date = strftime( "%d %B %Y" , time()) ?>
                        <input type="hidden" name="tanggal" class="form-control" value="<?= $date ?>">
                    </div>
                    <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
</div>
