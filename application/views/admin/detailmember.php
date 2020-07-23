 <section class="content">
        <div class="">
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-6">
                    <div class="card profile-card">
                        <div class="profile-header" style="background-color: transparent; padding: 0px 0;">
                            <?php if($rs_user['foto_sampul'] != '') { ?>
                                 <img src="<?php echo base_url(); ?>assets/images/bupati/photo_profile/<?php echo $rs_user['foto_sampul']; ?>" alt="AdminBSB - Profile Image" width="100%" height="150px;" />
                            <?php } else { ?>
                                <img src="<?php echo base_url(); ?>assets/images/bupati/photo_profile/noimage.jpg" alt="AdminBSB - Profile Image" width="100%" height="150px;" />
                            <?php } ?>
                        </div>
                        <div class="profile-body">
                            <div class="image-area">
                                <?php if($rs_user['user_pic'] != ''){ ?>
                                <img src="<?php echo base_url();?>assets/images/bupati/photo_profile/<?php echo $rs_user['user_pic']; ?>" alt="<?php echo $rs_user['nama'];?>" width="40%" style="border-radius: 0%; border: 1px solid #ad145" /> 
                                <?php } else { ?>
                                    <img src="<?php echo base_url();?>assets/images/bupati/photo_profile/noimage.jpg" alt="<?php echo $rs_user['nama'];?>" style="border-radius: 0%; border: 1px solid #ad145" /> 
                                <?php } ?>
                            </div>
                            <div class="content-area">
                                <h3><?php echo $rs_user['nama'];?></h3>
                                
                            </div>
                        </div>
                        
                    </div>

                    <div class="card card-about-me">
                        <div class="header">
                            <h2>ABOUT ME</h2>
                        </div>
                        <div class="body">
                            <ul>
                                <li>
                                    <div class="title">
                                        <i class="material-icons">person</i>
                                      Nama
                                    </div>
                                    <div class="content">
                                         <?php echo $rs_user['nama'];?>
                                     
                                    </div>
                                </li>
                                <li>
                                    <div class="title">
                                        <i class="material-icons">phone</i>
                                      No Telepon
                                    </div>
                                    <div class="content">
                                         <?php echo $rs_user['telepon'];?>
                                     
                                    </div>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>