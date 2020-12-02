
    <section class="content mt-4">
    <h4>Data Peminjaman Ruang</h4>
      <div class="mb-3"></div>
        <table class="table">
        <tr>
            <th> ID Pinjam Ruang </th>
            <th> NIM</th>
            <th> Tanggal</th>
            <th> Ruangan</th>
            <th> </th>
        </tr>

        <?php 
          $i = 1;
         foreach ($p_ruang as $row) :?>
             <tr>
                 <td><?php echo $row->id_pinjam_ruang; ?></td>
                 <td><?php echo $row->nim; ?></td>
                 <td><?php echo $row->tanggal; ?></td>
                 <td><?php echo $row->nama_lab; ?></td>
                 <td>
                     <?php echo anchor('C_Search/details1/'.$row->id_pinjam_ruang,'<div class="btn btn-warning btn-sm"><i class="fa fa-info-circle"></i></div>') ?>
                 </td> 

             </tr>
         <?php endforeach; ?>
        </table>

    </section>
    
