<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sign In | e-Jenius</title>
    <!-- Favicon-->
    <link rel="icon" href="<?php echo base_url();?>assets/favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url();?>assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo base_url();?>assets/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo base_url();?>assets/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">
    <style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
    </style>
</head>

<body class="login-page">
    <p align="center"><a href="javascript:void(0);"><img src="/sahabat/assets/images/icon/logon.png" width="76" height="84" border="0"; /></a></p>
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);"></a><small><a href="javascript:void(0);">Login</a></small>        </div>
        <div class="card">
            <div class="body">
            <?php
            $message = $this->session->flashdata('message');
            echo $message == '' ? '' : '<div class="alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                '.$message.'</div>';?>
                <form id="sign_in" method="POST" action="<?php echo site_url()?>/login/aksi_login">
                    <div class="msg">Login untuk Jelajahi </div>
                    <div class="msg">Cukup tekan Login untuk masuk </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input name="username" type="text" class="form-control" value="admin" placeholder="admin" autocomplete="on" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input name="password" type="password" class="form-control" value="admin" autocomplete="on" placeholder="admin" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                            <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                            <label for="rememberme">Remember Me</label>
                        </div>
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-pink waves-effect" type="submit">SIGN IN</button>
                        </div>
                    </div>
                  <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6">
                            <a href="<?php echo site_url();?>/login/daftar">Pendaftaran</a>
                        </div>
                  </div>
                </form>
            </div>
        </div>
    </div>

    <div align="center">
      <p>
      <!-- Jquery Core Js -->
      <script src="<?php echo base_url();?>assets/plugins/jquery/jquery.min.js"></script>
      
      <!-- Bootstrap Core Js -->
      <script src="<?php echo base_url();?>assets/plugins/bootstrap/js/bootstrap.js"></script>
      
      <!-- Waves Effect Plugin Js -->
      <script src="<?php echo base_url();?>assets/plugins/node-waves/waves.js"></script>
      
      <!-- Validation Plugin Js -->
      <script src="<?php echo base_url();?>assets/plugins/jquery-validation/jquery.validate.js"></script>
      
      <!-- Custom Js -->
      <script src="<?php echo base_url();?>assets/js/admin.js"></script>
      <script src="<?php echo base_url();?>assets/js/pages/examples/sign-in.js"></script> 
      <span class="style1">e-Jenius</span></p>
      <p class="style1">Powered by : Keban Digital 2019 </p>
</div>
</body>

</html>