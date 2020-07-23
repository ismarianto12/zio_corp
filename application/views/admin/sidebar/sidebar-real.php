   <?php  
    $nama = $rs_user['nama'];
    $jabatan = $rs_user['jabatan'];

    if($this->session->userdata('id_role') == '0')
    {
        $vrole = 'admin';
    }

    else if($this->session->userdata('id_role') == '1')
    {
        $vrole = 'bupati';
    }

    else if($this->session->userdata('id_role') == '2')
    {
        $vrole = 'dinas';
    }

   ?>

  <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="<?php echo base_url();?>assets/images/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $nama;?></div>
                    <div class="email"><?php echo $jabatan;?></div>
                </div>
            </div>
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li>
                        <a href="<?php echo base_url();?>">
                            <i class="material-icons col-light-blue">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    <?php if($this->session->userdata('id_role') == '0' || $this->session->userdata('id_role') == '1'){ ?>
                        <li>
                            <a href="<?php echo site_url(''.$vrole.'/profile');?>">
                             <i class="material-icons col-light-blue">face</i>
                                <span>Profile</span>
                            </a>
                        </li>
                    <?php } ?>
                    <?php if($this->session->userdata('id_role') == '0' || $this->session->userdata('id_role') == '1') { ?>
                        <li>
                            <a href="<?php echo site_url(''.$vrole.'/visi');?>">
                             <i class="material-icons col-light-blue">visibility</i>
                                <span>Visi dan misi</span>
                            </a>
                        </li>
                    <?php } ?>
                    <?php if($this->session->userdata('id_role') == '0' || $this->session->userdata('id_role') == '1') { ?>
                        <li>
                            <a href="<?php echo site_url(''.$vrole.'/news'); ?>">
                                <i class="material-icons col-light-blue">description</i>
                                <span>News</span>
                            </a>
                        </li>
                    <?php } ?>
                    <?php if($this->session->userdata('id_role') == '0') { ?>
                        <li>
                            <a href="<?php echo site_url('quiz/quiz_add'); ?>">
                                <i class="material-icons col-light-blue">description</i>
                                <span>Sayembara</span>
                            </a>
                        </li>
                    <?php } ?>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons col-light-blue">donut_large</i>
                            <span>Events</span>
                        </a>
                        
                        <ul class="ml-menu">
                            <li><a href="<?php echo site_url(''.$vrole.'/event');?>">Add Event</a></li>
                            <li><a href="<?php echo site_url(''.$vrole.'/nowevent');?>">Event Hari Ini</a></li>
                            <li><a href="<?php echo site_url(''.$vrole.'/nextevent');?>">Event Akan Datang</a></li>
                            <li><a href="<?php echo site_url(''.$vrole.'/doneevent');?>">Event Yang Terlaksana</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo site_url(''.$vrole.'/galeri'); ?>">
                            <i class="material-icons col-light-blue">mms</i>
                            <span>Galeri</span>
                        </a>
                    </li>
                    <?php if($this->session->userdata('id_role') == '0') { ?>
                        <!-- <li>
                            <a href="<?php echo site_url('admin/dinas');?>">
                                <i class="material-icons col-light-blue">next_week</i>
                                <span>Dinas</span>
                            </a>
                        </li> -->
                    <?php } ?>
                    
                    <?php if($this->session->userdata('id_role') == '0') { ?>
                        <li>
                            <a href="<?php echo site_url('admin/sponsor');?>">
                             <i class="material-icons col-light-blue">description</i>
                                <span>Sponsor</span>
                            </a>
                        </li>
                    <?php } ?>

                    <?php if($this->session->userdata('id_role') == '0') { ?>
                        <li>
                            <a href="<?php echo site_url('admin/slidefoto');?>">
                             <i class="material-icons col-light-blue">description</i>
                                <span>Slide Foto</span>
                            </a>
                        </li>
                    <?php } ?>

                    <?php if($this->session->userdata('id_role') == '0') { ?>
                    <!-- <li>
                        <a href="<?php echo site_url('admin/bupati');?>">
                         <i class="material-icons col-light-blue">description</i>
                            <span>Akun Bupati</span>
                        </a>
                    </li> -->
                    <?php } ?>
                    
                    <?php if($this->session->userdata('id_role') == '0' || $this->session->userdata('id_role') == '1') { ?>
                        <!-- <li>
                            <a href="<?php echo site_url(''.$vrole.'/akundinas');?>">
                             <i class="material-icons col-light-blue">description</i>
                                <span>Akun Dinas</span>
                            </a>
                        </li> -->
                    <?php } ?>
                </ul>
            </div>