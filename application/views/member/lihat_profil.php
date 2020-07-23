 <style type="text/css">
     .fa {
      padding: 10px;
      font-size: 30px;
      width: 50px;
      text-align: center;
      text-decoration: none;
      margin: 5px 2px;
      margin-left: 10px;
    }

    .fa:hover {
        opacity: 0.7;
    }

    .fa-facebook {
      background: #3B5998;
      color: white;
    }

    .fa-twitter {
      background: #55ACEE;
      color: white;
    }

    .fa-linkedin {
      background: #007bb5;
      color: white;
    }

    .fa-youtube {
      background: #bb0000;
      color: white;
    }

    .fa-instagram {
      background: #125688;
      color: white;
    }


 </style>
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
                                                    $content = $content." <a href='".site_url()."/member/detailprofile/".$row['id_profile']."'>Read More...</a>";

                                                    echo $content;
                                                ?>
                                            </p>
                                            <p>
                                              
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <?php endforeach;?>

                                
                            </div>
                        </div>
                    </div>
                    <a href="https://web.facebook.com/" target="_blank" class="fa fa-facebook"></a>
                    <a href="https://twitter.com" target="_blank" class="fa fa-twitter"></a>
                    <a href="https://www.linkedin.com/" target="_blank" class="fa fa-linkedin"></a>
                    <a href="https://www.youtube.com/" target="_blank" class="fa fa-youtube"></a>
                    <a href="https://www.instagram.com/" target="_blank" class="fa fa-instagram"></a>
                </div>
            </div>
        </div>
    </section>