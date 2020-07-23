<?php 
$this->load->view('template/header');
$this->load->view('admin/sidebar/sidebar-2');
$this->load->view('template/rightside'); 

echo $contents;

$this->load->view('template/footer');