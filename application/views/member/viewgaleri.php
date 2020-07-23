<section class="content">
        <div class="">
            <!-- Image Gallery -->
      
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                GALLERY
                            </h2>
                        </div>

                        <div class="body">
                            <ul class="nav nav-tabs" role="tablist" width="100%">
                                <li role="presentation" class="active">
                                    <a href="#home_with_icon_title" data-toggle="tab">
                                        <i class="material-icons">insert_photo</i> Foto
                                    </a>
                                </li>
                                <li role="presentation">
                                    <a href="#profile_with_icon_title" data-toggle="tab">
                                        <i class="material-icons">video_library</i> Video
                                    </a>
                                </li>
                            </ul>
                            <br />
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="home_with_icon_title">
                                    <div id="aniimated-thumbnials" class="list-unstyled row clearfix">
                                        <?php  foreach($rs_galerigambar as $gambar): ?>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                <a href="<?php echo base_url();?>assets/images/galeri/gambar/<?php echo $gambar['foto_galeri']; ?>" data-sub-html="Demo Description">
                                                    <img class="img-responsive thumbnail" style="margin-bottom: 0px;" src="<?php echo base_url();?>assets/images/galeri/gambar/<?php echo $gambar['foto_galeri']; ?>" width="200px;" height="200px;">
                                                </a>
                                            </div>

                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="profile_with_icon_title">
                                    <?php 
                                        foreach($rs_galerivideo as $video) { 
                                            if($video['pilihan'] == 'embed') { 
                                                echo $video['link_embed'] . "<br /> <br />";
                                            }else{
                                                ?>
                                                <video width="100%" height="240" controls>
                                                    <source src="<?php echo base_url();?>assets/images/galeri/video/<?php echo $video['video']; ?>" type="video/mp4">
                                                </video>
                                                <br /><br />
                                                <?php
                                            } 
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>