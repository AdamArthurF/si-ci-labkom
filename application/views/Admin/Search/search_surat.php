<div class="mt-4"></div>
<section class="content mt-4">
<h4>Data Pengajuan Surat Bebas Lab</h4>
      <div class="mb-3"></div>
        <table class="table">
        <tr>
            <th> ID SURAT </th>
            <th> NIM</th>
            <th> Tanggal Pengajuan</th>
        </tr>

        <?php 
          $i = 1;
         foreach ($surat as $row) :?>
             <tr>
                 <td><?php echo $row->id_surat; ?></td>
                 <td><?php echo $row->nim; ?></td>
                 <td><?php echo $row->tanggal; ?></td>

                 <td>
                     <?php echo anchor('C_Search/details3/'.$row->id_surat,'<div class="btn btn-warning btn-sm"><i class="fa fa-info-circle"></i></div>') ?>

                 </td> 

             </tr>
         <?php endforeach; ?>
        </table>

    </section>
    </div>
