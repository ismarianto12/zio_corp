 <section class="content">
       <div class="container-fluid">
 <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Detail Sponsor
                                      </h2>
                           
                        </div>
                        <div class="body">
                            <div class="row">
                                <div class="thumbnail" style="border: none;">
                                        <?php if($rs_sponsor['foto_sponsor'] != '') { ?> 
                                            <img src="<?php echo base_url();?>assets/images/sponsor/<?php echo $rs_sponsor['foto_sponsor'] ?>">
                                        <?php } else { ?>
                                            <img src="<?php echo base_url();?>assets/images/noimage.jpg">
                                        <?php } ?>
                                        <div class="caption">
                                            <h3><?php echo $rs_sponsor['nama_sponsor'] ?></h3>
                                            <p>
                                                <?php echo $rs_sponsor['deskripsi_sponsor']; ?>
                                            </p>
                                            <p>
                                              
                                            </p>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>