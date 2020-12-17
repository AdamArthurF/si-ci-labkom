<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Data Surat Bebas Lab</h1>
                </div><!-- /.col -->
              <div class="col-sm-6">
              </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content"> 
        <?= form_open(base_url() . 'Admin/SuratBebasLabkom/update') ?>
            <div class="form-group">
                <label for="id_surat">ID Surat</label>
                <input type="text" id="id_surat" name="id_surat" class="form-control"
                       value="<?= /** @var object $surat */ $surat->id_surat ?>" readonly>
            </div>
            <div class="form-group">
                <label for="nim">NIM</label>
                <?= form_input('nim', $surat->nim, 'id="nim" class="form-control"') ?>
            </div>
            <div class="form-group">
                <?php
                    setlocale (LC_ALL, 'id_ID.UTF8', 'id_ID.UTF-8', 'id_ID.8859-1', 'id_ID', 'IND.UTF8', 'IND.UTF-8', 'IND.8859-1', 'IND', 'Indonesian.UTF8', 'Indonesian.UTF-8', 'Indonesian.8859-1', 'Indonesian', 'Indonesia', 'id', 'ID');
                    $date = strftime( "%d %B %Y" , time())
                ?>
                <input type="hidden" name="tanggal" class="form-control" value="<?= 'Surakarta, '. $date ?>">
            </div>
            <button class="btn btn-primary btn" onclick="goBack()">Kembali</button>
            <button type="reset" class="btn btn-danger">Reset</button>
            <button type="submit" class="btn btn-primary">Update Data</button>
            <script>
                function goBack() {
                    window.history.back();
                }
            </script>
        <?= form_close() ?>
    </section>
</div>
