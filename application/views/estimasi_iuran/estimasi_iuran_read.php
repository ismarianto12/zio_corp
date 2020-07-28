 
<div class='row'>
    <div class='col-sm-12'>
      <?= $this->session->userdata('message') ?>
      <div class='white-box'>
         <h3 class='box-title m-b-0'><?= ucfirst($judul) ?></h3> 
   <div class='table-responsive'>  
        
        <table class="table">
	    <tr><td>Jenis Id</td><td><?php echo $jenis_id; ?></td></tr>
	    <tr><td>Subkategori Id</td><td><?php echo $subkategori_id; ?></td></tr>
	    <tr><td>Nilai</td><td><?php echo $nilai; ?></td></tr>
	    <tr><td>Quantity</td><td><?php echo $quantity; ?></td></tr>
	    <tr><td>Tot Bayar</td><td><?php echo $tot_bayar; ?></td></tr>
	    <tr><td>User Id</td><td><?php echo $user_id; ?></td></tr>
	    <tr><td>Update At</td><td><?php echo $update_at; ?></td></tr>
	    <tr><td>Creaate At</td><td><?php echo $creaate_at; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('estimasi_iuran') ?>" class="btn btn-default"><i class='fa fa-home'></i>Back To Home</a></td></tr>
	</table>
</div>
</div>
</div>
</div>