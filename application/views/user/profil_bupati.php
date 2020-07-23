
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
            <div class="block-header">
                <h2>NEWS</h2>
            </div>
            <!-- Basic Card -->
            <div class="row clearfix">
                <?php foreach ($news as $row ) {
                    # code...
             ?>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               <?php echo $row['judul'];?> <small><?php echo $row['created_at'];?> </small>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                           <?php echo word_limiter($row['isi'],25);?>
                        </div>
                    </div>
                </div>
            <?php } ?>
                 
                
            </div>
            <!-- #END# Basic Card -->
            <!-- Basic Card - With Loading -->
           
        </div>
            
    </section>