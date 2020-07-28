<section class="content">
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header"> 
             <h2><?= ucfirst($page_title) ?></h2> 
             </div>
            <div class="body" style="overflow: auto;"> 
                <div class='row'>
                    <div class='col-sm-12'>  
                    <?= $this->session->flashdata('message') ?>
                        <div class=\'white-box\'>
                            <h3 class=\'box-title m-b-0\'></h3>
                        <form action="<?php echo $action; ?>" method="post" class='form-horizontal form-bordered'>
    <div class='form-body'> 
     ** ) Harap Isikan data yang di butuhkan pada form.
     <br /><br /><br /><br /> 
	 <div class="form-group">
            <label for="int" class='control-label col-md-3'><b>Jenis Id<?php echo form_error('jenis_id') ?></b></label>
            <div class='col-md-9'>
            <input type="text" class="form-control" name="jenis_id" id="jenis_id" placeholder="Jenis Id" value="<?php echo $jenis_id; ?>" />
        </div>
    </div>
	 <div class="form-group">
            <label for="int" class='control-label col-md-3'><b>Subkategori Id<?php echo form_error('subkategori_id') ?></b></label>
            <div class='col-md-9'>
            <input type="text" class="form-control" name="subkategori_id" id="subkategori_id" placeholder="Subkategori Id" value="<?php echo $subkategori_id; ?>" />
        </div>
    </div>
	 <div class="form-group">
            <label for="varchar" class='control-label col-md-3'><b>Nilai<?php echo form_error('nilai') ?></b></label>
            <div class='col-md-9'>
            <input type="text" class="form-control" name="nilai" id="nilai" placeholder="Nilai" value="<?php echo $nilai; ?>" />
        </div>
    </div>
	 <div class="form-group">
            <label for="varchar" class='control-label col-md-3'><b>Quantity<?php echo form_error('quantity') ?></b></label>
            <div class='col-md-9'>
            <input type="text" class="form-control" name="quantity" id="quantity" placeholder="Quantity" value="<?php echo $quantity; ?>" />
        </div>
    </div>
	 <div class="form-group">
            <label for="varchar" class='control-label col-md-3'><b>Tot Bayar<?php echo form_error('tot_bayar') ?></b></label>
            <div class='col-md-9'>
            <input type="text" class="form-control" name="tot_bayar" id="tot_bayar" placeholder="Tot Bayar" value="<?php echo $tot_bayar; ?>" />
        </div>
    </div>
	 <div class="form-group">
            <label for="int" class='control-label col-md-3'><b>User Id<?php echo form_error('user_id') ?></b></label>
            <div class='col-md-9'>
            <input type="text" class="form-control" name="user_id" id="user_id" placeholder="User Id" value="<?php echo $user_id; ?>" />
        </div>
    </div>
	 <div class="form-group">
            <label for="datetime" class='control-label col-md-3'><b>Update At<?php echo form_error('update_at') ?></b></label>
            <div class='col-md-9'>
            <input type="text" class="form-control" name="update_at" id="update_at" placeholder="Update At" value="<?php echo $update_at; ?>" />
        </div>
    </div>
	 <div class="form-group">
            <label for="datetime" class='control-label col-md-3'><b>Creaate At<?php echo form_error('creaate_at') ?></b></label>
            <div class='col-md-9'>
            <input type="text" class="form-control" name="creaate_at" id="creaate_at" placeholder="Creaate At" value="<?php echo $creaate_at; ?>" />
        </div>
    </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	   

<div class='form-actions'>
    <div class='row'>
        <div class='col-md-12'>
            <div class='row'>
                <div class='col-md-offset-3 col-md-9'>
 <button type="submit" class="btn btn-info"><i class='fa fa-check'></i><?php echo $button ?></button> 
	    <a href="<?php echo site_url('estimasi_iuran') ?>" class="btn btn-default"><i class='fa fa-share'></i>Cancel</a>
	

       </div>
    </div>
   </div>
 </div>
 </div>
</form>
</div>
</div>
</div>
</div>
</div>
