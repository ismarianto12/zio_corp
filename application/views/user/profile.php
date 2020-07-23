 <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-6">
                    <div class="card profile-card">
                        <div class="profile-header">&nbsp;</div>
                        <div class="profile-body">
                            <div class="image-area">
                                <?php $gambar=$rs_user['user_pic']; ?>
                                <img src="<?php echo base_url();?>assets/images/user/<?php echo $gambar;?>" alt="<?php echo $rs_user['nama'];?>" /><span class="glyphicon glyphicon-camera"></span>
                            </div>
                            <div class="content-area">
                                <h3><?php echo $rs_user['nama'];?></h3>
                                <p><?php echo $rs_user['jabatan'];?></p>
                                <p><?php echo $rs_user_dinas['nama_dinas'];?></p>
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
                                        <i class="material-icons">email</i>
                                       Email
                                    </div>
                                    <div class="content">
                                         <?php echo $rs_user['email'];?>
                                    </div>
                                </li>
                                <li>
                                    <div class="title">
                                        <i class="material-icons">edit</i>
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
                <div class="col-xs-12 col-sm-6">
                    <div class="card">
                        <div class="body">
                            <div>
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Dinas</a></li>
                                    <li role="presentation"><a href="#profile_settings" aria-controls="settings" role="tab" data-toggle="tab">Profile Settings</a></li>
                                    <li role="presentation"><a href="#change_password_settings" aria-controls="settings" role="tab" data-toggle="tab">Change Password</a></li>
                                </ul>

                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active" id="home">
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <div class="media">
                                                    
                                                    <div class="media-body">
                                                        <h4 class="media-heading">
                                                            <a href="#"><?php echo $rs_user_dinas['nama_dinas'];?></a>
                                                        </h4>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel-body">
                                                <div class="post">
                                                    <div class="post-heading">
                                                        <p><?php echo $rs_user_dinas['alamat_dinas'];?></p>
                                                        <p><?php echo $rs_user_dinas['no_telepon'];?></p>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                          
                                        </div>

                                         </div>
                                  
                                    <div role="tabpanel" class="tab-pane fade in" id="profile_settings">
                                         <?php
            $message = $this->session->flashdata('message');
            echo $message == '' ? '' : '<div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                '.$message.'</div>';?>
                                        <form class="form-horizontal" method="POST" name="profile_edit" action="<?php echo base_url();?>user/profile_edit">
                                            <div class="form-group">
                                                <label for="NameSurname" class="col-sm-2 control-label">Nama</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
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
                                                        <input type="email" class="form-control" id="Email" name="email" placeholder="Email" value="<?php echo $rs_user['email'];?>" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="pp" class="col-sm-2 control-label">Foto Profile</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="file" class="form-control" name="fotoprofile">
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
                                        <form id="change_password" class="form-horizontal" action="<?php echo base_url();?>user/password_edit" method="post">
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