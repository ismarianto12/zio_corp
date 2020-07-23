  <div class="topaleart">
  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
             
                <div class="carousel-inner">
                <?php
             $banner_first = TRUE;
          for($i=1;$i<=5;$i++) {
                ?>
                <div class="item <?php if ($banner_first) echo 'active'; ?>">
                    <img src="<?php echo base_url(); ?>assets/images/banner/<?php echo $i.'.jpg';?>" alt="" />
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
  
       
            <!-- Widgets -->
         
                 <div class="col-md-4 col-sm-4 col-xs-4">
                    <a href="<?php echo base_url();?>user/lihat_profil">
                        <div class="info-box hover-expand-effect" align="center">     
                          <img src="<?php echo base_url(); ?>assets/images/icon/caleg.svg" swidth="55px" height="55px";>
                       </div>
                    </a> 
                </div>

       

        <!-- ./col -->

             <div class="col-md-4 col-sm-4 col-xs-4">

          <!-- small box -->
    <a href="<?php echo site_url('user/visi');?>">

                 <div class="info-box hover-expand-effect" align="center">

                
                    <img src="<?php echo base_url(); ?>assets/images/icon/visi.svg" width="55px" height="55px"; >
              
                </div>
</a> 
             </div>

        <!-- ./col -->

           <div class="col-md-4 col-xs-4">
  <a href="<?php echo site_url('user/news');?>"> 
                 <div class="info-box hover-expand-effect" align="center">

                    <img src="<?php echo base_url(); ?>assets/images/icon/info.svg" width="55px" height="55px"> 
    
                </div>
</a> 

           </div>



            <div class="col-md-4 col-xs-4">

       
 <a href="<?php echo site_url('user/sayembara');?>">
                <div class="info-box hover-expand-effect" align="center">

                   <center>

                   

                     <img src="<?php echo base_url(); ?>assets/images/icon/sayembara.svg"width="55px" height="55px">

                     </center>  
                </div>

            </a>

            </div>



          <div class="col-md-4 col-xs-4">

          <!-- small box -->  <a href="<?php echo site_url('user/lastevent');?>">
                 <div class="info-box hover-expand-effect" align="center">
                  
            <center> <img src="<?php echo base_url(); ?>assets/images/icon/kegiatan.svg" width="55px" height="55px"  > </center> 
            </div>
</a>

        </div>

 <div class="col-md-4 col-xs-4">

          <!-- small box --> <a href="<?php echo site_url('user/nextevent');?>">
         <div class="info-box hover-expand-effect" align="center">

               <center> <img src="<?php echo base_url(); ?>assets/images/icon/jadwal.svg" width="55px" height="55px"> </center> 

            </div>
        </a>
        </div>





            <div class="col-md-4 col-xs-4">
 <a href="<?php echo site_url('user/galeri');?>">
                <div class="info-box hover-expand-effect" align="center">

                    <center> <img src="<?php echo base_url(); ?>assets/images/icon/galeri.svg" width="55px" height="55px" > </center>  
           </div>
       </a>
           

            </div>



          <div class="col-md-4 col-xs-4">

          <!-- small box -->

                 <div class="info-box hover-expand-effect" align="center">

              <center>

              <a href="#" width="60px" > <img src="<?php echo base_url(); ?>assets/images/icon/team.svg" width="55px" height="55px"></a> </center>  


            </div>

        </div>

 <div class="col-md-4 col-xs-4">

          <!-- small box -->

            <div class="info-box hover-zoom-effect"" align="center">

               <center>  <img src="<?php echo base_url(); ?>assets/images/icon/relawan.svg" width="55px" height="55px" > </center> 

            </div>

        </div>

  
            </div>
        </div>
    </section>

<div class="running-text pull-down">
<marquee>Coblos No. 3 Siti Sundari</marquee>
</div>