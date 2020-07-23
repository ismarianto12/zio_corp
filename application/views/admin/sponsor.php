
    <section class="content">
        <div class="">
            
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            Promo
                            <div class="right">
                                <a class="btn btn-sm btn-primary" href="<?php echo site_url();?>/admin2/sponsor_add">Buat Promo</a>
                            </div>
                        </div>
                        <div class="body">

                            <?php foreach($rs_sponsor as $sponsor) { ?>
                                <div class="">
                                  <div class="thumbnail">
                                      <?php if($sponsor['foto_sponsor'] != '') { ?> 
                                          <img src="<?php echo base_url();?>assets/images/sponsor/<?php echo $sponsor['foto_sponsor'] ?>">
                                      <?php } else { ?>
                                          <img src="<?php echo base_url();?>assets/images/noimage.jpg">
                                      <?php } ?>
                                      <div class="caption">
                                          <h3>
                                              <?php
                                                  $content2 = substr($sponsor['nama_sponsor'], 0, 45);
                                                  $content2 = substr($content2,0,strrpos($content2,' '));
                                                  $content2 = $content2." .....";

                                                  echo $content2;
                                              ?>
                                            </h3>
                                          <p>
                                              <?php 
                                                  $content = substr($sponsor['deskripsi_sponsor'], 0, 50);
                                                  $content = substr($content,0,strrpos($content,' '));
                                                  $content = $content." <a href='".site_url()."/admin/detailsponsor/".$sponsor['id_sponsor']."'>Read More...</a>";

                                                  echo $content;
                                              ?>
                                          </p>
                                          <a href="http://google.com/maps/?q=<?php echo $sponsor['lat_sponsor']?>,<?php echo $sponsor['long_sponsor']; ?>" target="_blank" class="btn btn-info btn-sm">Alamat</a>
                                          <a class="btn btn-info btn-sm" href="https://api.whatsapp.com/send?phone=<?php echo $sponsor['notelp_sponsor'] ?>&text=Masuk%20Ke%20WA" target="_blank">Telepon</a>
                                          <a class="btn btn-warning btn-sm" href="<?php echo site_url('admin2/sponsor_edit');echo "/".$sponsor['id_sponsor'];?>">Edit</a>
                                          <a class="btn btn-danger btn-sm" href="<?php echo site_url('admin2/sponsor_del');echo "/".$sponsor['id_sponsor'];?>">Delete</a>
                                      </div>
                                  </div>
                              </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>
    </section>