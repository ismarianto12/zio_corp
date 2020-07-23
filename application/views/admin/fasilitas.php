 <section class="content">
       <div class="">
 <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            Fasilitas

                            <div class="right">
                                <a href="<?php echo site_url();?>/<?php echo $link; ?>/fasilitas_add" class="btn btn-sm btn-primary">Buat fasilitas</a>
                            </div>
                           
                        </div>
                        <div class="body">
                            <div class="row">
                                <?php foreach($rs_fasilitas as $row) : ?>

                                <div class="col-sm-6 col-md-3">
                                    <div class="thumbnail">
                                        <?php if($row['foto_fasilitas'] != '') { ?> 
                                            <img src="<?php echo base_url();?>assets/images/fasilitas/<?php echo $row['foto_fasilitas'] ?>">
                                        <?php } else { ?>
                                            <img src="<?php echo base_url();?>assets/images/noimage.jpg">
                                        <?php } ?>
                                        <div class="caption">
                                            <h3><?php echo $row['judul_fasilitas'] ?></h3>
                                            <p>
                                                <?php 
                                                    $content = substr($row['deskripsi'], 0, 100);
                                                    $content = substr($content,0,strrpos($content,' '));
                                                    $content = $content." <a href='".site_url()."/".$link."/detailfasilitas/".$row['id_fasilitas']."'>Read More...</a>";

                                                    echo $content;
                                                ?>
                                            </p>
                                            <p>
                                              <a href="<?php echo site_url(); ?>/<?php echo $link; ?>/fasilitas_edit/<?php echo $row['id_fasilitas'];?>"><label class="label label-warning">Edit</label></a> | <a href="<?php echo site_url(); ?>/<?php echo $link; ?>/fasilitas_del/<?php echo $row['id_fasilitas'];?>"><label class="label label-danger">Delete</label></a>
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