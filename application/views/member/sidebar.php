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
	else if($this->session->userdata('id_role') == '3')
    {
        $vrole = 'member';
    }
   ?>

  <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="<?php echo base_url();?>assets/images/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">WELCOME</div>
                    <div class="email">Member</div>
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
           
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li>
                        <a href="<?php echo site_url();?>/member">
                            <i class="material-icons col-light-blue">home</i>
                            <span>Home</span>
                        </a>
                    </li>
					
                     
                </ul>
            </div>
            