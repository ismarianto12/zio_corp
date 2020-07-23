 <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-6">
                    <div class="card profile-card">
                        <div class="profile-header">&nbsp;</div>
                        <div class="profile-body">
                            <div class="image-area">
                                <?php if($rs_user['user_pic'] != ''){ ?>
                                <img src="<?php echo base_url();?>assets/images/user/<?php echo $rs_user['user_pic']; ?>" alt="<?php echo $rs_user['nama'];?>" width="40%" /> 
                                <?php } else { ?>
                                    <img src="<?php echo base_url();?>assets/images/user/user.png" alt="<?php echo $rs_user['nama'];?>" /> 
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
                                <li>
                                    <div class="title">
                                        <i class="material-icons">person</i>
                                      Kota
                                    </div>
                                    <div class="content">
                                         <?php echo $rs_user['kota'];?>
                                     
                                    </div>
                                </li>
                                <li>
                                    <div class="title">
                                        <i class="material-icons">person</i>
                                      Kecamatan
                                    </div>
                                    <div class="content">
                                         <?php echo $rs_user['kecamatan'];?>
                                     
                                    </div>
                                </li>
                                <li>
                                    <div class="title">
                                        <i class="material-icons">person</i>
                                      Desa / Kelurahan
                                    </div>
                                    <div class="content">
                                         <?php echo $rs_user['desa'];?>
                                     
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>