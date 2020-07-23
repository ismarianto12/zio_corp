<style type="text/css">
    .post-content p{
        margin-top: 10px; margin-left: 10px; margin-right: 10px;
    }
</style>
<section class="content">
    <div class="">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        Data News
                    </div>
                    <div class="body">
                        <div class="row">
                            <?php foreach($rs_news as $news => $nws) { ?>
                                <div class="panel panel-default panel-post">
                                    <div class="panel-heading">
                                        <div class="media">
                                            <div class="media-left">
                                                <?php if($nws['user_pic'] != ""){ 
                                                    if($this->session->userdata('id_user') == '0') { ?>
                                                        <img src="<?php echo base_url(); ?>assets/images/profile/<?php echo $nws['user_pic']; ?>" width="40px" height="40px" />
                                                    <?php } else { ?>
                                                        <img src="<?php echo base_url(); ?>assets/images/bupati/photo_profile/<?php echo $nws['user_pic']; ?>" width="40px" height="40px" />
                                                    <?php } ?>

                                                <?php } else { ?>
                                                    <a href="#">
                                                        <img src="<?php echo base_url(); ?>assets/images/user-lg.jpg" />
                                                    </a>
                                                <?php } ?>
                                            </div>
                                            <div class="media-body">
                                                <h4 class="media-heading">
                                                    <a href="#"><?php echo $nws['nama']; ?></a>
                                                </h4>
                                                Admin - <?php echo $nws['created_at']; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <div class="post">
                                            <div class="post-heading">
                                                <p><b><?php echo $nws['judul']; ?></b></p>
                                            </div>
                                            <div class="post-content">
                                                <?php if($nws['gambar'] != ""){ ?>
                                                    <img src="<?php echo base_url();?>assets/images/news/<?php echo $nws['gambar'] ?>" class="img-responsive" />
                                                <?php } ?>
                                                <p>
                                                    <?php
                                                        $content = substr($nws['isi'], 0, 100);
                                                        $content = substr($content,0,strrpos($content,' '));
                                                        $content = $content." <a href='".site_url()."/member/detailnews/".$nws['id_news']."'>Lihat Selengkapnya...</a>";

                                                        echo $content;
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-footer">
                                        <ul>
                                            <li>
                                                <a href="<?php echo site_url(); ?>/member/detailnews/<?php echo $nws['id_news']; ?>">
                                                    <i class="material-icons">comment</i>
                                                    <span>5 respon</span>
                                                </a>
                                            </li>
                                            <li></li>
                                        </ul>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>