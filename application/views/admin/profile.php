 <section class="content">
       <div class="">
 <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            Profile

                            <div class="right">
                                <a href="<?php echo site_url();?>/<?php echo $link; ?>/profile_add" class="btn btn-sm btn-primary">Buat Profile</a>
                            </div>
                           
                        </div>
                        <div class="body">
                            <div class="row">
                                <?php foreach($rs_profile as $row) : ?>

                                <div class="col-sm-6 col-md-3">
                                    <div class="thumbnail">
                                        <?php if($row['foto_profile'] != '') { ?> 
                                            <img src="<?php echo base_url();?>assets/images/profile/<?php echo $row['foto_profile'] ?>">
                                        <?php } else { ?>
                                            <img src="<?php echo base_url();?>assets/images/noimage.jpg">
                                        <?php } ?>
                                        <div class="caption">
                                            <h3><?php echo $row['judul_profile'] ?></h3>
                                            <p>
                                                <?php 
                                                    $content = substr($row['deskripsi'], 0, 100);
                                                    $content = substr($content,0,strrpos($content,' '));
                                                    $content = $content." <a href='".site_url()."/".$link."/detailprofile/".$row['id_profile']."'>Read More...</a>";

                                                    echo $content;
                                                ?>
                                            </p>
                                            <p>
                                              <a href="<?php echo site_url(); ?>/<?php echo $link; ?>/profile_edit/<?php echo $row['id_profile'];?>"><label class="label label-warning">Edit</label></a> | <a href="<?php echo site_url(); ?>/<?php echo $link; ?>/profile_del/<?php echo $row['id_profile'];?>"><label class="label label-danger">Delete</label></a>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <?php endforeach;?>

                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>