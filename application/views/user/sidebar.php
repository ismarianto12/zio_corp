   <?php  
    $nama=$rs_user['nama'];
    $jabatan=$rs_user['jabatan'];

   ?>

  <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="<?php echo base_url();?>assets/images/user/<?php echo $rs_user['user_pic'];?>" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $nama;?></div>
                    <div class="email"><?php echo $jabatan;?></div>
                    <?php /*
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">group</i>Followers</a></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">shopping_cart</i>Sales</a></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">favorite</i>Likes</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div> 
                    */ ?>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li>
                        <a href="<?php echo base_url('user');?>">
                            <i class="material-icons col-light-blue">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                     
                    <li>
                        <a href="<?php echo site_url('user/profile');?>">
                         <i class="material-icons col-light-blue">face</i>
                            <span>My Profile</span>
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?php echo site_url('user/news');?>">
                            <i class="material-icons col-light-blue">description</i>
                            <span>News</span>
                        </a>
                    </li>
                        
                    <li>
                         <a href="<?php echo site_url('user/getGaleri');?>">
                            <i class="material-icons col-light-blue">mms</i>
                            <span> Galeri </span>
                        </a>
                        
                    </li>
                     
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons col-light-blue">donut_large</i>
                            <span>Events</span>
                        </a>
                        
                     <ul class="ml-menu">
                            <li><a href="<?php echo site_url('user/event');?>">Event Hari Ini</a></li>
                            <li><a href="<?php echo site_url('user/nextevent');?>">Event Akan Datang</a></li>
                            <li><a href="<?php echo site_url('user/lastevent');?>">Event Yang Terlaksana</a></li>
                        </ul>
                    </li>
                    <li>
                         <a href="http://192.168.100.25/websocket/codes"> 
                            <i class="material-icons col-light-blue">chat</i>
                            <span>Chatting </span>
                        </a>
                        
                    </li>
                     
                </ul>
            </div>
            <!-- #Menu -->