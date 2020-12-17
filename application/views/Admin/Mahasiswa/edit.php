<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Update Data Mahasiswa</h1>
                </div><!-- /.col -->
            <div class="col-sm-6">
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content"> 
        <?= form_open(base_url() . 'Admin/Mahasiswa/update') ?>
            <div class="form-group">
                <label for="nim"> NIM</label>
                <?= /** @var object $mhs */
                form_input('nim', $mhs->nim, 'id="nim" class="form-control"') ?>
            </div>
            <div class="form-group">
                <label for="nama_lengkap"> Nama Lengkap</label>
                <?= form_input('nama_lengkap', $mhs->nama_lengkap, 'id="nama_lengkap" class="form-control"') ?>
            </div>
            <div class="form-group">
                <label for="angkatan">Angkatan</label>
                <?= form_input('angkatan', $mhs->angkatan, 'id="angkatan" class="form-control"') ?>
            </div>
            <div class="form-group">
                <label for="prodi"> Program Studi</label>>
                <?= form_input('prodi', $mhs->prodi, 'id="prodi" class="form-control"') ?>
            </div>
            <div class="form-group">
                <label for="no_wa"> Nomor WA</label>
                <?= form_input('no_wa', $mhs->no_wa, 'id="no_wa" class="form-control"') ?>
            </div>
            <div class="form-group">
                <label for="email"> Email</label>
                <?= form_input('email', $mhs->email, 'id="email" class="form-control"') ?>
            </div>
            <button class="btn btn-primary btn" onclick="goBack()">Kembali</button>
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
