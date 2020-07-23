<script type="text/javascript">
  $(document).ready(function(){
    $("#myModal").modal('show');
  });
</script>
<style type="text/css">
<!--
.style2 {
	font-size: 24px;
	font-weight: bold;
	color: #0066CC;
}
.style4 {font-size: 12px}
.style7 {font-size: 10px; font-weight: bold; }
-->
</style>

<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">PEMBERITAHUAN : </h4>
				<h4 class="modal-title">&nbsp;</h4>
				<h3 class="modal-title">Kepada Yth seluruh member, agar selalu mengingat Username(No telepon) dan Password setelah melakukan registrasi di e-Jenius, dan melengkapi foto serta identitas yang benar sebelum konfirmasi Registrasi dan Login.</h3>
				<h4 class="modal-title">&nbsp;</h4>
				<h3 class="modal-title">Have a nice day, terima kasih</h3>
				<h4 class="modal-title">&nbsp;</h4>
				<h4 class="modal-title">Maintenance System setiap hari Sabtu</h4>
				<h4 class="modal-title">Admin :)</h4>
            </div>
            <div class="modal-body">
              
              <im src="<?php echo base_url(); ?>assets/images/popup.png" class="img-responsive">
            </div>
            <div class="modal-footer">
                <a hre="<?php echo site_url(); ?>/member/sayembara" class="btn btn-link waves-effect"></a>
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>
<style type="text/css">
<!--
.style2 {
	font-size: 24px;
	font-weight: bold;
	color: #0066CC;
}

.style6 {font-size: 10px}
.style7 {font-size: 10px; font-weight: bold; }
.style3 {
	color: #0066CC;
	font-weight: bold;
	font-size: 24px;
}
.style4 {font-size: 10px}
.style5 {font-size: 9px}
-->
</style>
<div class="topaleart">
  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
             
                <div class="carousel-inner">
                <?php
                   $banner_first = TRUE;
                    foreach($rs_slide as $slide) {
                          ?>
                          <div class="item <?php if ($banner_first) echo 'active'; ?>">
                              <img src="<?php echo base_url(); ?>assets/images/slidefoto/<?php echo $slide['foto'];?>" alt="" />
                          </div>
                          <?php
                          $banner_first = FALSE;
                      }
                      ?>
                </div>
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
		     <p align="center" class="style2 style3">Menu</p>
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
                    <div align="left"><a href="<?php echo site_url('member/lihat_profil');?>/lihat_profil"><strong><img src="<?php echo base_url(); ?>assets/images/icon/profile.png" width="30px"; height="30px;"><span class="style7 style1"> Profile</span> </strong></a></div>
                  </div> 
              </div>
                 <div class="col-md-4 col-sm-4 col-xs-4">
                
                <div class="info-box hover-expand-effect" style="background-color: transparent" align="center"> 
                  <div align="left"><a href="<?php echo site_url('member/visi');?>/viewvisi"><img src="<?php echo base_url(); ?>assets/images/icon/live.png" width="30px"; height="30px;"><span class="style7 style1"> Informasi</span></a></div>
                </div>
             </div>

               <div class="col-md-4 col-xs-4">
                
                 <div class="info-box hover-expand-effect" style="background-color: transparent" align="center">
                   <div align="left"><a href="<?php echo site_url('member/news');?>/viewnews"><img src="<?php echo base_url(); ?>assets/images/icon/newspaper.png" width="30px"; height="30px;"><span class="style7 style1"> Berita</span> </a></div>
                 </div>
             </div>



           <div class="col-md-4 col-xs-4">


        <div class="info-box hover-expand-effect" style="background-color: transparent" align="center">
                  <div align="left"><a href="<?php echo site_url('member/galeri'); ?>/viewgaleri"><img src="<?php echo base_url(); ?>assets/images/icon/clapperboard.png" width="30px"; height="30px;"><span class="style7 style1"> Galeri</span> </a>          </div>
        </div>
           

           </div>


        <div class="col-md-4 col-xs-4">

          <!-- small box -->
            
              <div class="info-box hover-expand-effect" style="background-color: transparent" align="center">                
                <div align="left"><a href="<?php echo site_url('member/doneevent'); ?>/doneevent"><img src="<?php echo base_url(); ?>assets/images/icon/agendaa.png" width="30px"; height="30px;"><span class="style7 style1"> Sejarah</span> </a> </div>
              </div>

        </div>

             
                 
               <div class="col-md-4 col-xs-4">
          
       
            <!-- small box -->
           <div class="info-box hover-expand-effect" style="background-color: transparent" align="center">
              <div align="left"> <a href="/assets/documentation/final.pdf"><img src="<?php echo base_url(); ?>assets/images/icon/logon.png" width="30px"; height="30px;" /><span class="style1 style7"> Tutorial</span></a>                 </div>
          </div>

        </div>





            <div class="col-md-4 col-xs-4">
 <div align="center"><a href="<?php echo site_url(); ?>/member/galeri">              </a>
 </div>
 <div class="info-box hover-expand-effect" style="background-color: transparent" align="center">

             
                      
                      <div align="left"><a href="../ukk/index.php"><img src="<?php echo base_url(); ?>assets/images/icon/contract.png" width="30px" height="30px" ><span class="style5 style1 style7"> Ujian</span> </a> </div>
 </div>
 <div align="center"><a href="<?php echo site_url(); ?>/member/galeri"></a> </div>
            </div>



          <div class="col-md-4 col-xs-4">
            <div align="center"><a href="<?php echo site_url('member/member');?>">            </a>
            </div>
           <div class="info-box hover-expand-effect" style="background-color: transparent" align="center">
               
                  
                 <div align="left"><a href="<?php echo site_url('member/member');?>"><img src="<?php echo base_url(); ?>assets/images/icon/profil3.png" width="30px" height="30px"><span class="style5 style1 style7"> Member </span></a></div>
            </div>
            <div align="center"><a href="<?php echo site_url('member/message');?>"></a> </div>
          </div>

 <div class="col-md-4 col-xs-4">

          <div align="center">
            <!-- small box -->
            <a href="../sims/index.php">           </a>
          </div>
          <div class="info-box hover-expand-effect" style="background-color: transparent" align="center">

               
                   
               <div align="left"><a href="../sims/index.php"><img src="<?php echo base_url(); ?>assets/images/icon/info.png" width="30px" height="30px" ><span class="style5 style1 style7"> Akademik </span></a></div>
               <a href="../sims/index.php"><span class="style4"></span></a></div>
            <a href="<?php echo site_url('member/member');?>"></a>        </div>
			
			<div class="col-md-4 col-xs-4">

          <div align="center">
            <!-- small box -->
            <a href="../list.php">           </a>
          </div>
          <div class="info-box hover-expand-effect" style="background-color: transparent" align="center">       
                   
               <div align="center"><a href="../list.php"><img src="<?php echo base_url(); ?>assets/images/icon/login.png" width="40px" height="40px" ><span class="style5 style1 style7">e-Jenius Sekolahmu</span></a><span class="style1 style7"></a></span></div>
               <a href="../list.php"><span class="style4"></span></a></div>
             </div>
			</div>

          <p align="center"><span class="style2" style="default: 20px;">Iklan Promosi</span><br />
          <br />
          
          <?php foreach($rs_sponsor as $sponsor) { ?>
		  </p>
           <div class="col-sm-6 col-md-6">
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
                              $content = $content." <a href='".site_url()."/member/detailsponsor/".$sponsor['id_sponsor']."'>Read More...</a>";

                              echo $content;
                          ?>
                      </p>
                      <a href="http://google.com/maps/?q=<?php echo $sponsor['lat_sponsor']?>,<?php echo $sponsor['long_sponsor']; ?>" class="btn btn-info btn-sm" target="_blank">Alamat</a>
                      <a class="btn btn-info btn-sm" href="https://api.whatsapp.com/send?phone=<?php echo $sponsor['notelp_sponsor'] ?>&text=Haloo%20apa%20kabar?" target="_blank">WA/Telepon</a>
                  </div>
              </div>
          </div>
        

           <?php } ?>

  
         </div>
        </div>
        <div class="row" style="background-color: #fff; padding-top: 15px; bottom: 0;">
            <p style="margin-bottom: 10px; font-size: 20px;"><marquee><?php echo $rs_marque['isi']; ?></marquee></p>
        </div>
    </section>