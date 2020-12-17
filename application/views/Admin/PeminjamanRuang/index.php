<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Daftar Peminjam Ruang</h1>
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
        <button class="btn btn-primary" data-toggle="modal" data-target="#pinjamRuangModal">
            <i class="fa fa-plus"></i>
            Tambah Data Peminjaman Ruang
        </button>
        <button class="btn btn-success" onclick="window.location.href='Admin/PeminjamanRuang/export_excel';">
            <i class="fa fa-file-excel"></i>
            Export Laporan Ms.Excel
        </button>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>No </th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Tanggal</th>
                    <th>Ruangan</th>
                    <th> </th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = $this->uri->segment(3) + 1;
                /** @var mixed $data */
                foreach ($data->result() as $row) : ?>
                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $row->nim ?></td>
                        <td><?= $row->nama_lengkap ?></td>
                        <td><?= $row->tanggal ?></td>
                        <td><?= $row->nama_lab ?></td>
                        <td>
                            <?= anchor('Admin/PeminjamanRuang/delete/' . $row->id_pinjam_ruang,'<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?>
                            <?= anchor('Admin/PeminjamanRuang/details/' . $row->id_pinjam_ruang,'<div class="btn btn-warning btn-sm"><i class="fa fa-info-circle"></i></div>') ?>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        <div class="row">
            <div class="col">
                <!-- Tampilkan pagination -->
                <?= /** @var mixed $pagination */
                $pagination ?>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="pinjamRuangModal" tabindex="-1" role="dialog" aria-labelledby="pinjamRuangModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="pinjamRuangModalLabel">Tambah  Data Peminjaman Ruang</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      < span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?= form_open(base_url() . 'Admin/PeminjamanRuang/insert') ?>
                        <div class="form-group">
                            <label for="nim">NIM</label>
                            <?= form_input('nim', '', 'id="nim" class"form-control"')?>
                        </div>
                        <div class="form-group">
                            <label for="tanggal"> Tanggal Pinjam </label>
                            <input type="date" id="tanggal" name="tanggal" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="id_lab">Laboratorium</label>
                            <?php
                            $option = [];
                            foreach ($this->PeminjamanLab->get_lab()->result() as $row) {
                                $option[$row->id_lab] = $row->nama_lab;
                            }
                            echo form_dropdown('id_lab', $option, '', 'id="id_lab" class="form-control"');
                            ?>
                        </div>
                        <div class="form-group">
                            <label for="jam_pinjam">Jam Pinjam</label>
                            <input type="time" id="jam_pinjam" name="jam_pinjam" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="jam_kembali">Jam Kembali</label>
                            <input type="time" id="jam_kembali" name="jam_kembali" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="keperluan">Keperluan Meminjam</label>
                            <textarea class="form-control" id="keperluan" name="keperluan" rows="4"></textarea>
                        </div>
                        <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
</div>
