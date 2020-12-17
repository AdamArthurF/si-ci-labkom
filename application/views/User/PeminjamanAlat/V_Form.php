        <section class="page-section" >
            <div class="container mt-4">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Formulir Peminjaman Alat  </h2>
                    <h3 class="section-subheading text-muted">Laboratorium  FMIPA UNS</h3>
                </div>
                
                        <form method="post"   action="<?php echo base_url().'User/C_PinjamAlat/insert_entry'; ?>" >

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                    <label>NIM</label>
                                    <input type="text" name="nim" class="form-control"  placeholder="contoh M311xxxx">
                                    </div>
                                    <div class="form-group col-md-6">
                                    <label >Nama Lengkap</label>
                                    <input type="text" name="nama_lengkap" class="form-control"  placeholder="Masukan Nama Lengkap">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                    <label >Angkatan</label>
                                    <input type="text" class="form-control" name="angkatan"  placeholder="Contoh : 2018 ">
                                    </div>
                                    <div class="form-group col-md-6">
                                    <label>Program  Studi</label>
                                    <?php  
                                                $option = array(

                                                        'D3-Farmasi' => 'D3-Farmasi',
                                                        'D3-Teknik Informatika' => 'D3-Teknik Informatika',
                                                        'S1-Matematika' => 'S1-Matematika',
                                                        'S1-Fisika' => 'S1-Fisika',
                                                        'S1-Informatika' => 'S1-Informatika',
                                                        'S1-Statistika' => 'S1-Statistika',
                                                        'S1-Informatika' => 'S1-Informatika',
                                                        'S1-Biologi' => 'S1-Biologi',
                                                        'S1-Farmasi' => 'S1-Farmasi',
                                                        'S1-Kimia' => 'S1-Kimia',
                                                        'S1-Ilmu Lingkungan' => 'S1-Ilmu Lingkungan',
                                                        'S2-Fisika' => 'S2-Fisika',
                                                        'S2-Biosains' => 'S2-Biosains',
                                                        'S2-Kimia' => 'S2-Kimia'

                                                );
                                                echo form_dropdown('prodi', $option, '', 'class="form-control "');
                                                ?>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label >Alamat Email</label>
                                    <input type="text" class="form-control" name="email" placeholder="youremailexambple@.com">
                                </div>

                                <div class="form-group">
                                    <label>Nomor WhatsApp </label>
                                    <input type="text" class="form-control" name="no_wa"  placeholder="Masukan Nomor WhatsApp ">
                                </div>
                                
                                <div class="form-row">
                                    <div class="form-group col-md-8">
                                        <label > Alat  </label>
                                        <?php  
                                        $queryAlat=$this->M_PinjamAlat->get_alat();
                                        $option = array();
                                        foreach ($queryAlat->result() as $row)
                                        {
                                                $option[$row->id_alat]=$row->nama_alat;
                                        }
                                        echo form_dropdown('id_alat', $option, '', 'class="form-control"');
                                    ?>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label >Jumlah Alat </label>
                                        <input type="text" name="jumlah_alat" class="form-control">
                                    </div>

                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                    <label>Tanggal Pinjam</label>
                                    <input type="date" name="tanggal_pinjam" class="form-control">
                                    </div>

                                    <div class="form-group col-md-4">
                                    <label >Tanggal Kembali</label>
                                    <input type="date" name="tanggal_kembali" class="form-control">
                                    </div>

                                    <div class="form-group col-md-4">
                                    <label> Waktu Mulai </label>
                                    <input type="time" name="jam" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label > Tempat  </label>
                                    <input type="text" name="tempat" class="form-control">
                                </div>

                                <div class="form-group ">
                                    <label>Keperluan</label>
                                    <textarea class="form-control" name="keperluan" rows="4" placeholder="Contoh : 'Untuk Seminar TA di Gd.A FMIPA UNS'"></textarea>      
                                </div>

                                <input type="hidden" name="status" class="form-control" value="Belum Lunas">

                                <button type="submit" class="btn btn-primary">Selanjutnya</button>
                                <button type="reset" class="btn btn-danger" >Reset</button>
                        </form>

                </div>
        </section> 
