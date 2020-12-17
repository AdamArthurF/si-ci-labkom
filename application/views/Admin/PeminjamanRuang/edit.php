<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Data Peminjaman Ruang</h1>
                </div><!-- /.col -->
              <div class="col-sm-6">
              </div><!-- /.col -->
            </div><!-- /.row -->
            </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content"> 
        <?= form_open(base_url() . 'Admin/PeminjamanRuang/update') ?>
            <div class="form-group">
                <label for="id_pinjam_ruang">ID Peminjaman Ruang</label>
                <input type="text" id="id_pinjam_ruang" name="id_pinjam_ruang" class="form-control"
                       value="<?= /** @var object $p_ruang */
                       $p_ruang->id_pinjam_ruang ?>" readonly>
            </div>
            <div class="form-group">
                <label for="nim">NIM</label>
                <?= form_input('nim', $p_ruang->nim, 'id="id_pinjam_ruang" class="form-control"')?>
            </div>
            <div class="form-group">
                 <label for="tanggal">Tanggal</label>
                 <input type="date" id="tanggal" name="tanggal" class="form-control" value="<?= $p_ruang->tanggal ?>">
            </div>
            <div class="form-group">
                <label for="id_lab"> Ruang Laboratorium</label>
                <?php
                  $option = [];
                  $selected = $p_ruang->id_lab;
                  foreach ($this->PeminjamanRuang->get_lab()->result() as $row) {
                      $option[$row->id_lab] = $row->nama_lab;
                  }
                  echo form_dropdown('id_lab', $option, $selected, 'id="id_lab" class="form-control"');
                ?>
            </div>
            <div class="form-group">
                 <label for="jam_pinjam">Jam Pinjam</label>
                 <input type="time" id="jam_pinjam" name="jam_pinjam" class="form-control" value="<?= $p_ruang->jam_pinjam ?>">
            </div>
            <div class="form-group">
                 <label for="jam_kembali">Jam Kembali </label>
                 <input type="time" id="jam_kembali" name="jam_kembali" class="form-control" value="<?= $p_ruang->jam_kembali ?>">
            </div>
            <div class="form-group">
                <label for="keperluan"> Keperluan Meminjam</label>
                <textarea class="form-control" id="keperluan" name="keperluan" rows="4"><?= $p_ruang->keperluan ?></textarea>
            </div>
            <button class="btn btn-primary btn " onclick="goBack()">Kembali</button>
            <script>
                function goBack() {
                    window.history.back();
                }
            </script>
            <button type="reset" class="btn btn-danger">Reset</button>
            <button type="submit" class="btn btn-primary">Simpan Data</button>
        <?= form_close() ?>
    </section>
</div>
