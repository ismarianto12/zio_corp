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
                <div class="col-xs-12 col-sm-6">
                    <div class="card">
                        <div class="body">
                            <div>
                                <ul class="nav nav-tabs" role="tablist">
                                    
                                    <li role="presentation"><a href="#profile_settings" aria-controls="settings" role="tab" data-toggle="tab">Profile Settings</a></li>
                                    <li role="presentation"><a href="#change_password_settings" aria-controls="settings" role="tab" data-toggle="tab">Change Password</a></li>
                                </ul>

                                <div class="tab-content">
                                    
                                  
                                    <div role="tabpanel" class="tab-pane fade in" id="profile_settings">
                                         <?php
            $message = $this->session->flashdata('message');
            echo $message == '' ? '' : '<div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                '.$message.'</div>';?>
                                        <form class="form-horizontal" method="POST" name="profile_edit" action="<?php echo site_url();?>/member/profile_edit" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="NameSurname" class="col-sm-2 control-label">Nama</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="hidden" name="fotoprofileprev" value="<?php echo $rs_user['user_pic']; ?>">
                                                        <input type="hidden" name="fotosampulprev" value="<?php echo $rs_user['foto_sampul']; ?>">
                                                        <input type="text" class="form-control" id="NameSurname" name="nama" placeholder="Nama Lengkap" value="<?php echo $rs_user['nama'];?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                             <div class="form-group">
                                                <label for="Email" class="col-sm-2 control-label">No Telepon</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="Telepon" name="no_telepon" placeholder="No Telepon" value="<?php echo $rs_user['telepon'];?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="Email" class="col-sm-2 control-label">Email</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="email" class="form-control" id="Email" name="email" placeholder="Email" autocomplete="off" value="<?php echo $rs_user['email'];?>" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="Email" class="col-sm-2 control-label">Kota</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <select class="form-control show-tick" name="kota">
                                                            <option value="Palembang" <?php if($rs_user['kota'] == 'Palembang'){ echo 'selected'; } ?>>Palembang</option>
                                                            <option value="Banyuasin" <?php if($rs_user['kota'] == 'Banyuasin'){ echo 'selected'; } ?>>Banyuasin</option>
                                                            <option value="Musi Rawas" <?php if($rs_user['kota'] == 'Musi Rawas'){ echo 'selected'; } ?>>Musi Rawas</option>
                                                            <option value="Musi Rawas Utara" <?php if($rs_user['kota'] == 'Musi Rawas Utara'){ echo 'selected'; } ?>>Musi Rawas Utara</option>
                                                            <option value="Musi Banyuasin" <?php if($rs_user['kota'] == 'Musi Banyuasin'){ echo 'selected'; } ?>>Musi Banyuasin</option>
                                                            <option value="Lubuk Linggau" <?php if($rs_user['kota'] == 'Lubuk Linggau'){ echo 'selected'; } ?>>Lubuk Linggau</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="Email" class="col-sm-2 control-label">Kecamatan</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="kecamatan" name="kecamatan" placeholder="kecamatan" value="<?php echo $rs_user['kecamatan'];?>" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="Email" class="col-sm-2 control-label">Desa</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="desa" name="desa" placeholder="desa" value="<?php echo $rs_user['desa'];?>" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="Email" class="col-sm-2 control-label">Foto Profile</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="file" class="form-control" name="foto_profile">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="Email" class="col-sm-2 control-label">Foto Sampul</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="file" class="form-control" name="foto_sampul">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="submit" class="btn btn-danger">SUBMIT</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade in" id="change_password_settings">

                                           <?php
            $err_msg = $this->session->flashdata('err_msg');
            echo $err_msg == '' ? '' : '<div class="alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                '.$err_msg.'</div>';?>

                                   <?php
            $message = $this->session->flashdata('message');
            echo $message == '' ? '' : '<div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                '.$message.'</div>';?>
                                        <form id="change_password" class="form-horizontal" action="<?php echo site_url();?>/member/password_edit" method="post">
                                            <div class="form-group">
                                                <label for="OldPassword" class="col-sm-3 control-label">Old Password</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="password" class="form-control" id="OldPassword" name="OldPassword" placeholder="Old Password" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">New Password</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="password" class="form-control" id="NewPassword" name="NewPassword" placeholder="New Password" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="NewPasswordConfirm" class="col-sm-3 control-label">New Password (Confirm)</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="password" class="form-control" id="NewPasswordConfirm" name="NewPasswordConfirm" placeholder="New Password (Confirm)" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-offset-3 col-sm-9">
                                                    <button type="submit" class="btn btn-danger">SUBMIT</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>