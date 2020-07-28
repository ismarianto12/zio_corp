 <div class='col-lg-12'>
     <div class='box'>
         <div class='box-title'>

             <br />
             <?php echo anchor(site_url('estimasi_iuran/tambah'), 'Tambah Data', 'class="btn bg-maroon btn-flat margin"'); ?>
         </div>
         <div class='ibox-content'>
             <?= $this->session->flashdata('message') ?>
             <table class="table table-bordered" style="margin-bottom: 10px">
                 <tr>
                     <th>No</th>
                     <th>Jenis Id</th>
                     <th>Subkategori Id</th>
                     <th>Nilai</th>
                     <th>Quantity</th>
                     <th>Tot Bayar</th>
                     <th>Jhitungadmin1</th>
                     <th>Jhitungadmin2</th>
                     <th>Jhitungadmin3</th>
                     <th>Jpemadmin</th>
                     <th>User Id</th>
                     <th>Update At</th>
                     <th>Creaate At</th>
                     <th>Action</th>
                  </tr><?php
                        foreach ($estimasi_iuran_data as $estimasi_iuran) {
                            ?>
                     <tr>
                         <td width="80px"><?php echo ++$start ?></td>
                         <td><?php echo $estimasi_iuran->jenis_id ?></td>
                         <td><?php echo $estimasi_iuran->subkategori_id ?></td>
                         <td><?php echo $estimasi_iuran->nilai ?></td>
                         <td><?php echo $estimasi_iuran->quantity ?></td>
                         <td><?php echo $estimasi_iuran->tot_bayar ?></td>
                         <td><?php echo $estimasi_iuran->jhitungadmin1 ?></td>
                         <td><?php echo $estimasi_iuran->jhitungadmin2 ?></td>
                         <td><?php echo $estimasi_iuran->jhitungadmin3 ?></td>
                         <td><?php echo $estimasi_iuran->jpemadmin ?></td>
                         <td><?php echo $estimasi_iuran->user_id ?></td>
                         <td><?php echo $estimasi_iuran->update_at ?></td>
                         <td><?php echo $estimasi_iuran->creaate_at ?></td>
                         <td style="text-align:center" width="200px">
                             <div class='btn-group'>
                                 <?php
                                        echo anchor(site_url('estimasi_iuran/detail/' . $estimasi_iuran->id), 'Detail', 'class="btn bg-maroon btn-flat margin"');
                                        echo '  ';
                                        echo anchor(site_url('estimasi_iuran/edit/' . $estimasi_iuran->id), 'Edit', 'class="btn bg-green btn-flat margin"');
                                        echo '  ';
                                        echo anchor(site_url('estimasi_iuran/hapus/' . $estimasi_iuran->id), 'Hapus', 'class="btn bg-red btn-flat margin"', 'onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
                                        ?>
                             </div>
                         </td>
                     </tr>
                 <?php
                    }
                    ?>
             </table>
             <div class="row">
                 <div class="col-md-6">
                     <a href="#" class="btn btn-info">Total Data Yang Tersedia : <?php echo $total_rows ?></a>
                 </div>
                 <div class="col-md-6 text-right">
                     <?php echo $pagination ?>
                 </div>
             </div>
         </div>
     </div>
 </div>