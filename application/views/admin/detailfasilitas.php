 <section class="content">
       <div class="">
 <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Fasilitas
                                      </h2>
                           
                        </div>
                        <div class="body">
                            <div class="row">
                                <div class="thumbnail" style="border: none;">
                                        <?php if($rs_fasilitas['foto_fasilitas'] != '') { ?> 
                                            <img src="<?php echo base_url();?>assets/images/fasilitas/<?php echo $rs_fasilitas['foto_fasilitas'] ?>">
                                        <?php } else { ?>
                                            <img src="<?php echo base_url();?>assets/images/noimage.jpg">
                                        <?php } ?>
                                        <div class="caption">
                                            <h3><?php echo $rs_fasilitas['judul_fasilitas'] ?></h3>
                                            <p>
                                                <?php echo $rs_fasilitas['deskripsi']; ?>
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