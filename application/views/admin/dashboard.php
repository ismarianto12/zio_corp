<style type="text/css">
  <!--
  .style2 {
    font-size: 24px;
    font-weight: bold;
    color: #0066CC;
  }

  .style4 {
    font-size: 12px
  }

  .style7 {
    font-size: 10px;
    font-weight: bold;
  }

  .style8 {
    font-size: 14px
  }

  .style9 {
    font-size: 12px;
    font-weight: bold;
    color: #0066CC;
    font-style: italic;
  }

  .style10 {
    font-style: italic
  }

  .style11 {
    color: #FF0000
  }

  .style12 {
    color: #000000
  }
  -->
</style>
<div></div>
<div></div>
<div class="topaleart">
  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <?php
      $banner_first = TRUE;
      foreach ($rs_slide as $slide) {
        ?>
        <div class="item <?php if ($banner_first) echo 'active'; ?>">
          <img src="<?php echo base_url(); ?>assets/images/slidefoto/<?php echo $slide['foto']; ?>" alt="" />
        </div>
      <?php
        $banner_first = FALSE;
      }
      ?>

      <a href="<?php echo site_url(); ?>/<?php echo $link; ?>/lihat_profil"></a></div>
    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
      <span class="fa fa-angle-left"></span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
      <span class="fa fa-angle-right"></span>
    </a>

  </div>
</div>
<section class="content">
  <div class="container-fluid">
    <div class="row clearfix">
      <p align="center" class="style2">Menu</p>
      <span class="style8">
        <marquee>
        </marquee>
      </span> <span class="style10">
        <marquee>
        </marquee>
      </span>
      <marquee>
        <p align="center" class="style9"><span class="style11">Notice</span> : <span class="style12">Beberapa Fitur lagi dilakukan maintenance update, trims. </span></p>
      </marquee>
      <!-- Widgets -->
      <div class="col-md-4 col-sm-4 col-xs-4">

        <div align="center" class="info-box hover-expand-effect style4" style="background-color: transparent">
          <div align="left"><a href="<?php echo site_url(); ?>/<?php echo $link; ?>/lihat_profil"><strong><img src="<?php echo base_url(); ?>assets/images/icon/profile.png" width="30px" ; height="30px;"><span class="style7"> Profile</span> </strong></a></div>
        </div>
      </div>
      <div class="col-md-4 col-sm-4 col-xs-4">

        <div class="info-box hover-expand-effect" style="background-color: transparent" align="center">
          <div align="left"><a href="<?php echo site_url(); ?>/<?php echo $link; ?>/viewvisi"><img src="<?php echo base_url(); ?>assets/images/icon/live.png" width="30px" ; height="30px;"><span class="style7"> Pengumuman</span></a></div>
        </div>
      </div>
      <div class="col-md-4 col-xs-4">

        <div class="info-box hover-expand-effect" style="background-color: transparent" align="center">
          <div align="left"><a href="<?php echo site_url(); ?>/<?php echo $link; ?>/viewnews"><img src="<?php echo base_url(); ?>assets/images/icon/newspaper.png" width="30px" ; height="30px;"><span class="style7"> Informasi</span> </a></div>
        </div>
      </div>

      <div class="col-md-4 col-xs-4">


        <div class="info-box hover-expand-effect" style="background-color: transparent" align="center">
          <div align="left"><a href="<?php echo site_url(); ?>/admin/viewgaleri"><img src="<?php echo base_url(); ?>assets/images/icon/clapperboard.png" width="30px" ; height="30px;"><span class="style7"> Galeri</span> </a> </div>
        </div>


      </div>


      <div class="col-md-4 col-xs-4">

        <!-- small box -->

        <div class="info-box hover-zoom-effect" style="background-color: transparent" align="center">
          <div align="left"><a href="<?php echo site_url('admin/member'); ?>"><img src="<?php echo base_url(); ?>assets/images/icon/profile2.png" width="30px" ; height="30px;"> <span class="style7">Member</span> </a> </div>
        </div>
      </div>

      <div class="col-md-4 col-xs-4">
        <div class="info-box hover-expand-effect" style="background-color: transparent" align="center">
          <div align="left"><a href="#"><img src="<?php echo base_url(); ?>assets/images/icon/info.png" width="30px" height="30px;" border="0" ; /> <span class="style7">Refresh</span></a></div>
        </div>
      </div>

      <div class="col-md-4 col-xs-4">

        <!-- small box -->

        <div class="info-box hover-zoom-effect" style="background-color: transparent" align="center">
          <div align="left"><a href="<?php echo site_url('/form1'); ?>"><img src="<?php echo base_url(); ?>assets/images/icon/profil3.png" width="30px" ; height="30px;"> <span class="style7">form 1</span> </a> </div>
        </div>
      </div>

      <div class="col-md-4 col-xs-4">

        <!-- small box -->

        <div class="info-box hover-zoom-effect" style="background-color: transparent" align="center">
          <div align="left"><a href="<?php echo site_url('/form2'); ?>"><img src="<?php echo base_url(); ?>assets/images/icon/profil3.png" width="30px" ; height="30px;"> <span class="style7">Form 2</span> </a> </div>
        </div>
      </div>

      <div class="col-md-4 col-xs-4">

        <!-- small box -->

        <div class="info-box hover-zoom-effect" style="background-color: transparent" align="center">
          <div align="left"><a href="<?php echo site_url('/form3'); ?>"><img src="<?php echo base_url(); ?>assets/images/icon/profil3.png" width="30px" ; height="30px;"> <span class="style7">Form 3</span> </a> </div>
        </div>
      </div>


      <div class="col-md-4 col-xs-4">

        <!-- small box -->

        <div class="info-box hover-zoom-effect" style="background-color: transparent" align="center">
          <div align="left"><a href="<?php echo site_url('reg_kelengkapan/check'); ?>"><img src="<?php echo base_url(); ?>assets/images/icon/profil3.png" width="30px" ; height="30px;"> <span class="style7">form 1</span> </a> </div>
        </div>
      </div>


      <div class="col-md-4 col-xs-4">
        <div class="info-box hover-expand-effect" style="background-color: transparent" align="center">
          <div align="center">
            <p><a href="../list.php"></a></p>
            <div class="row clearfix">

              <span class="style8">
                <marquee>
                </marquee>
              </span> <span class="style10">
                <marquee>
                </marquee>
              </span>
              <marquee>

              </marquee>
              <!-- Widgets -->
              <div class="col-md-4 col-sm-4 col-xs-4">
                <div align="center" class="info-box hover-expand-effect style4" style="background-color: transparent">
                  <div align="left"><a href="<?php echo site_url(); ?>/<?php echo $link; ?>/lihat_profil"><strong><img src="<?php echo base_url(); ?>assets/images/icon/profile.png" width="30px" ; height="30px;" /><span class="style7"> Modul Belajar </span> </strong></a></div>
                </div>
              </div>
              <div class="col-md-4 col-sm-4 col-xs-4">
                <div class="info-box hover-expand-effect" style="background-color: transparent" align="center">
                  <div align="left"><a href="<?php echo site_url(); ?>/<?php echo $link; ?>/viewvisi"><img src="<?php echo base_url(); ?>assets/images/icon/live.png" width="30px" ; height="30px;" /><span class="style7"> e-Jenius Kampus </span></a></div>
                </div>
              </div>
              <div class="col-md-4 col-xs-4">
                <div class="info-box hover-expand-effect" style="background-color: transparent" align="center">
                  <div align="left"><a href="<?php echo site_url(); ?>/<?php echo $link; ?>/viewnews"><img src="<?php echo base_url(); ?>assets/images/icon/newspaper.png" width="30px" ; height="30px;" /><span class="style7"> Kopdar (Koperasi Daring) </span> </a></div>
                </div>
              </div>
              <div class="col-md-4 col-xs-4">
                <div class="info-box hover-expand-effect" style="background-color: transparent" align="center">
                  <div align="left"><a href="../sims/index.php"></a></div>
                </div>
              </div>
              <div class="col-md-4 col-xs-4">
                <div class="info-box hover-expand-effect" style="background-color: transparent" align="center">
                  <div align="center"><a href="../list.php"></a></div>
                </div>
              </div>
            </div>
            <p>&nbsp;</p>
          </div>
        </div>
      </div>
    </div>

    <p align="center"><span class="style2" style="default: 20px;">Alamat B-KIPM</span><br />
      <br />

      <?php foreach ($rs_sponsor as $sponsor) { ?>
    </p>
    <div class="col-sm-6 col-md-6">
      <div class="thumbnail">
        <?php if ($sponsor['foto_sponsor'] != '') { ?>
          <img src="<?php echo base_url(); ?>assets/images/sponsor/<?php echo $sponsor['foto_sponsor'] ?>">
        <?php } else { ?>
          <img src="<?php echo base_url(); ?>assets/images/noimage.jpg">
        <?php } ?>
        <div class="caption">
          <h3>
            <?php
              $content2 = substr($sponsor['nama_sponsor'], 0, 45);
              $content2 = substr($content2, 0, strrpos($content2, ' '));
              $content2 = $content2 . " .....";

              echo $content2;
              ?>
          </h3>
          <p>
            <?php
              $content = substr($sponsor['deskripsi_sponsor'], 0, 50);
              $content = substr($content, 0, strrpos($content, ' '));
              $content = $content . " <a href='" . site_url() . "/" . $link . "/detailsponsor/" . $sponsor['id_sponsor'] . "'>Read More...</a>";

              echo $content;
              ?>
          </p>
          <a href="http://google.com/maps/?q=<?php echo $sponsor['lat_sponsor'] ?>,<?php echo $sponsor['long_sponsor']; ?>" class="btn btn-info btn-sm" target="_blank">Alamat</a>
          <a class="btn btn-info btn-sm" href="https://api.whatsapp.com/send?phone=<?php echo $sponsor['notelp_sponsor'] ?>&text=Haloo%20apa%20kabar?" target="_blank">WA/Telepon</a>
        </div>
      </div>
    </div>


  <?php } ?>

  </div>
  </div>

  <div class="row" style="background-color: #fff; padding-top: 15px;">
    <p style="margin-bottom: 10px; font-size: 20px;">
      <marquee><?php echo $rs_marque['isi']; ?></marquee>
    </p>
  </div>
</section>