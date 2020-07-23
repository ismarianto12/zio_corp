 <section class="content">
       <div class="">
 <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                PROFIL
                                      </h2>
                           
                        </div>
                        <div class="body">
                            <div class="row">
                                <div class="thumbnail" style="border: none;">
                                        <?php if($rs_profile['foto_profile'] != '') { ?> 
                                            <img src="<?php echo base_url();?>assets/images/profile/<?php echo $rs_profile['foto_profile'] ?>">
                                        <?php } else { ?>
                                            <img src="<?php echo base_url();?>assets/images/noimage.jpg">
                                        <?php } ?>
                                        <div class="caption">
                                            <h3><?php echo $rs_profile['judul_profile'] ?></h3>
                                            <p>
                                                <?php echo $rs_profile['deskripsi']; ?>
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