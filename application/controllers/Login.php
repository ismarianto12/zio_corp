<?php
class Login extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_login', 'mo', TRUE);
	}
	
	private function portal($role)
	{
		switch($role)
		{
			//case 0:redirect('/user','location');break;
			case 0:redirect('/admin2','location');break;
			case 1:redirect('/bupati','location');break;
			case 2:redirect('/dinas','location');break;
		 	case 3:redirect('/member','location');break;
		 
		}
	}
	
	function index()
	{
		if ($this->session->userdata('login') == TRUE)
		{
			$this->portal($this->session->userdata('idrole'));
		}
		else
		{	
			$this->load->view('login');
		}
	}
  	function cek_admin($kduser,$pass)
	{   
        return $this->mo->check_user($kduser,$pass);
	}
    function cek_member($kduser,$pass)
	{   
        return $this->mo->check_member($kduser,$pass);
	}
	function aksi_login()
	{
        $this->form_validation->set_rules('username', 'Username', 'xss_clean|required|trim');
		$this->form_validation->set_rules('password', 'Password', 'xss_clean|required|trim');
        
		if($this->form_validation->run() == TRUE)
		{	
			$kduser = $this->input->post('username');
			$pass = md5($this->input->post('password'));
			$idrole = $this->cek_admin($kduser, $pass);
			// print_r($idrole);
			if($idrole == FALSE)
			{
				
				$idmember = $this->cek_member($kduser,$pass);
				if($idmember == FALSE){
					$this->session->set_flashdata('message', '<i class="material-icons">error_outline</i> Sorry, incorrect username or password');
					redirect('/login','locate');
				}
				else{
					$data = array('id_user'=>$idmember['id_user'],
								'username' =>$kduser,
								'id_role' => $idmember['id_role'],
								'nama'=>$idmember['nama'],
								'login' => TRUE);
					$this->session->set_userdata($data);
					$this->portal(3);		 
				}
			}
			else
			{
             
    			$data = array( 'id_user'=>$idrole['id_user'],
					'username' => $kduser, 
					'id_role' => $idrole['role'], 
					'id_dinas' => $idrole['id_dinas'],
					'nama'=>$idrole['nama'], 
					'login' => TRUE);
				 $_COOKIE['key']=$kduser;
				 $_COOKIE['user_id']=$idrole['nama'];
				$this->session->set_userdata($data);
				$this->portal($idrole['role']);
			}
		}
		else
		{
			//$data['sts'] = FALSE ;				
			//if($this->session->userdata('login') == TRUE) $data['sts'] = TRUE;		
			$data['title'] = "Login";	
			//redirect('/login','location');
			$this->load->view('login',$data);	
		}
	}
		function daftar()
	{
		$this->session->sess_destroy();
		$this->load->view('sign_up');	
	}
	function process_logout()
	{
		$this->session->sess_destroy();
		redirect('', 'refresh');
	}
}
?>
