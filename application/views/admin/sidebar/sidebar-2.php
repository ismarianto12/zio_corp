<?php


$rs_user = (isset($rs_user)) ?  $rs_user : ['nama' => '', 'jabatn' => ''];
$v_role = (isset($v_role)) ?  $v_role : '';

$nama = isset($rs_user['nama']);
$jabatan =  isset($rs_user['jabatan']) ? '' : error_reporting(0);
//$vrole='admin';

if ($this->session->userdata('id_role') == '0') {
    $vrole = 'admin2';
} else if ($this->session->userdata('id_role') == '1') {
    $vrole = 'bupati';
} else if ($this->session->userdata('id_role') == '2') {
    $vrole = 'dinas';
} else if ($this->session->userdata('id_role') == '3') {
    $vrole = 'member';
}

?>

<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">
        <div class="image">
            <img src="<?php echo base_url(); ?>assets/images/user.png" width="48" height="48" alt="User" />
        </div>
        <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">WELCOME</div>
            <div class="email">Member</div>
        </div>
    </div>
    <div class="menu">
        <ul class="list">
            <li class="header">MAIN NAVIGATION</li>
            <li>
                <a href="<?php echo base_url() . $vrole; ?>">
                    <i class="material-icons col-light-blue">home</i>
                    <span>Home</span> </a> </li>

            <?php if ($this->session->userdata('id_role') == '0' || $this->session->userdata('id_role') == '1') { ?>
                <li>
                    <a href="<?php echo site_url('' . $vrole . '/profile'); ?>">
                        <i class="material-icons col-light-blue">face</i>
                        <span>Profile</span> </a> </li>
            <?php } ?>
            <?php if ($this->session->userdata('id_role') == '0' || $this->session->userdata('id_role') == '1') { ?>
                <li>
                    <a href="<?php echo site_url('' . $vrole . '/visi'); ?>">
                        <i class="material-icons col-light-blue">visibility</i>
                        <span>Pengumuman</span> </a> </li>
            <?php } ?>
            <?php if ($this->session->userdata('id_role') == '0' || $this->session->userdata('id_role') == '1') { ?>
                <li>
                    <a href="<?php echo site_url('' . $vrole . '/news'); ?>">
                        <i class="material-icons col-light-blue">description</i>
                        <span>Informasi</span> </a> </li>
            <?php } ?>
            <?php if ($this->session->userdata('id_role') == '0') { ?>
            <?php } ?>
            <?php if ($this->session->userdata('id_role') == '0' || $this->session->userdata('id_role') == '1') { ?>
                <li>
                    <a href="<?php echo site_url('' . $vrole . '/fasilitas'); ?>">
                        <i class="material-icons col-light-blue">description</i>
                        <span>Fasilitas</span> </a> </li>
            <?php } ?>
            <?php if ($this->session->userdata('id_role') == '0') { ?>
            <?php } ?>
            <ul class="ml-menu">
                <li><a href="<?php echo site_url('' . $vrole . '/event'); ?>">Add Mading </a></li>
                <li><a href="<?php echo site_url('' . $vrole . '/nowevent'); ?>">Mading Minggu Ini</a></li>
                <li><a href="<?php echo site_url('' . $vrole . '/doneevent'); ?>">Mading Yang Terlaksana</a></li>
            </ul>
            <li>
                <a href="<?php echo site_url('' . $vrole . '/galeri'); ?>">
                    <i class="material-icons col-light-blue">mms</i>
                    <span>Galeri</span>
                </a>
            </li>
            <?php if ($this->session->userdata('id_role') == '0') { ?>
                <!-- <li>
                            <a href="<?php echo site_url('admin/dinas'); ?>">
                                <i class="material-icons col-light-blue">next_week</i>
                                <span>Dinas</span>
                            </a>
                        </li> -->
            <?php } ?>

            <?php if ($this->session->userdata('id_role') == '0') { ?>
                <li>
                    <a href="<?php echo site_url('' . $vrole . '/sponsor'); ?>">
                        <i class="material-icons col-light-blue">description</i>
                        <span>Promo</span>
                    </a>
                </li>
                <?php //} 
                ?>

                <?php  // if($this->session->userdata('id_role') == '0') { 
                ?>
                <li>
                    <a href="<?php echo site_url('' . $vrole . '/slidefoto'); ?>">
                        <i class="material-icons col-light-blue">description</i>
                        <span>Slide Foto</span>
                    </a>
                </li>

                <li>
                    <a href="<?php echo site_url('form_inputan'); ?>">
                        <i class="material-icons col-light-blue">description</i>
                        <span>Form Inputan</span>
                    </a>
                </li>

                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">add_task</i>
                        <span>Master data form Inputan</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="<?= base_url('form_inputan') ?>">    <i class="material-icons">dns</i>
                     Form Inputan 1 </a>
                        </li>
                        <li>
                            <a href="<?= base_url('form_inputan_dua') ?>">   <i class="material-icons">eco</i>
                     Form Inputan 2</a>
                        </li>

                        <li>
                            <a href="<?= base_url('form_inputan_tiga') ?>">   <i class="material-icons">assignment</i>
                     Form Inputan 3</a>
                        </li>
                        <!-- <li>
                                <a href="pages/forms/editors.html">Editors</a>
                            </li> -->
                    </ul>
                </li>



                <li>
                    <a href="<?php echo site_url('reg_kelengkapan'); ?>">
                        <i class="material-icons col-light-blue">description</i>
                        <span>Register User</span>
                    </a>
                </li>


                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">assignment</i>
                        <span>Estimasi Iuran</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="<?= base_url('estimasi_iuran') ?>">Master Estimasi</a>
                        </li>
                        <li>
                            <a href="<?= base_url('jenis') ?>">Jenis</a>
                        </li>

                        <li>
                            <a href="<?= base_url('subkategori') ?>">Sub Kategori</a>
                        </li>
                        <!-- <li>
                                <a href="pages/forms/editors.html">Editors</a>
                            </li> -->
                    </ul>
                </li>

            <?php } ?>

            <?php if ($this->session->userdata('id_role') == '0') { ?>
                <!-- <li>
                        <a href="<?php echo site_url('admin/bupati'); ?>">
                         <i class="material-icons col-light-blue">description</i>
                            <span>Akun Bupati</span>
                        </a>
                    </li> -->
            <?php } ?>

            <?php if ($this->session->userdata('id_role') == '0' || $this->session->userdata('id_role') == '1') { ?>
                <!-- <li>
                            <a href="<?php echo site_url('' . $vrole . '/akundinas'); ?>">
                             <i class="material-icons col-light-blue">description</i>
                                <span>Akun Dinas</span>
                            </a>
                        </li> -->


            <?php  } ?>
        </ul>
    </div>