    <section class="content">
        <div class="">
            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            Pengumuman
                            <div class="right">
                                <a href="<?php echo site_url();?>/<?php echo $link; ?>/visi_add" class="btn btn-sm btn-primary">Edit Pengumuman</a>
                            </div>
                        </div>
                          <?php foreach ($rs_visi as $row) {
            # code...
         ?>
                        <div class="body">
                            
                                <div class="form-group form-float">
                                   
                                    <div class="form-line">
                                        <?php echo $row['visi'];?> 
                                      
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <?php echo $row['misi'];?>
                                       
                                    </div>
                                </div>
                          
                        </div>
                         <?php } ?>
                    </div>
                </div>
            </div>
          
         
           
        </div>
    </section>