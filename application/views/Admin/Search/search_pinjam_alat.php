<div class="mt-4"></div>
<section class="content mt-4">
<h4>Data Peminjaman Alat</h4>
        <table class="table">
        <thead>
        <tr>
            <th> ID Pinjam Alat</th>
            <th> NIM</th>
            <th> Tanggal Pinjam</th>
            <th> Alat</th>
            <th> Status</th>
            <th> </th>
        </tr>
        </thead>

        <tbody>
        <?php 
          foreach ($p_alat as $row) :?>
             <tr>
                 <td><?php echo $row->id_pinjam_alat; ?></td>
                 <td><?php echo $row->nim; ?></td>
                 <td><?php echo $row->tanggal_pinjam; ?></td>
                 <td><?php echo $row->nama_alat; ?></td>
                 <td><?php echo $row->status; ?></td>

                 <td>
                     <?php echo anchor('C_Search/details2/'.$row->id_pinjam_alat,'<div class="btn btn-warning btn-sm"><i class="fa fa-info-circle"></i></div>') ?>

                 </td> 

             </tr>
         <?php endforeach; ?>
          <tbody>
        </table>


    </section>

