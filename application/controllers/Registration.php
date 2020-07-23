<?php
class Registration extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_login', 'mo', TRUE);
		$this->load->model('m_member','me', TRUE);
		$this->load->library('upload');
	}
	
	private function portal($role)
	{
		switch($role)
		{
			//case 0:redirect('/user','location');break;
			case 0:redirect('/admin','location');break;
			case 1:redirect('/admin','location');break;
			case 2:redirect('/user','location');break;
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
			$this->load->view('sign_up');
		}
	}
  	 
   //generate a username from Full name
function generate_username($string_name="Mike Tyson", $rand_no = 200){
		$username_parts = array_filter(explode(" ", strtolower($string_name))); //explode and lowercase name
		$username_parts = array_slice($username_parts, 0, 2); //return only first two arry part
	
		$part1 = (!empty($username_parts[0]))?substr($username_parts[0], 0,8):""; //cut first name to 8 letters
		$part2 = (!empty($username_parts[1]))?substr($username_parts[1], 0,5):""; //cut second name to 5 letters
		$part3 = ($rand_no)?rand(0, $rand_no):"";
		
		$username = $part1. str_shuffle($part2). $part3; //str_shuffle to randomly shuffle all characters 
		return $username;
}
 
	function save()
	{
        $this->form_validation->set_rules('nama', 'Nama', 'xss_clean|required|trim');
		$this->form_validation->set_rules('password', 'Password', 'xss_clean|required');
        $this->form_validation->set_rules('confirm', 'Konfirmasi Password', 'xss_clean|required');
     	$this->form_validation->set_rules('phone', 'No Handpone', 'xss_clean|required');
     	//$this->form_validation->set_rules('kota', 'Kota', 'xss_clean|required');
     	//$this->form_validation->set_rules('kecamatan', 'Kecamatan', 'xss_clean|required');
     	//$this->form_validation->set_rules('desa', 'Desa', 'xss_clean|required');
     	
		if($this->form_validation->run() == TRUE)
		{	
			$nama = $this->input->post('nama');
			$password = $this->input->post('password');
			$konfirmasi = $this->input->post('confirm');
			$phone = $this->input->post('phone');
			//$kota = $this->input->post('kota');
			//$kecamatan = $this->input->post('kecamatan');
			//$desa = $this->input->post('desa');

			if($password<>$konfirmasi){
				$this->session->set_flashdata('message', '<i class="material-icons">error_outline</i> Maaf,Password tidak sama');
				redirect('/registration','locate');
			}

			if(!empty($_FILES['user_pic']['name']))
            {
            	$config['upload_path'] = './assets/images/bupati/photo_profile/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
                $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload

                $this->upload->initialize($config);
                if ($this->upload->do_upload('user_pic')){
                    $gbr = $this->upload->data();
                    //Compress Image
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './assets/images/bupati/photo_profile/'.$gbr['file_name'];
                    $config['create_thumb'] = FALSE;
                    $config['maintain_ratio'] = FALSE;
                    $config['quality'] = '50%';
                    $config['width'] = 600;
                    $config['height'] = 400;
                    $config['new_image'] = './assets/images/bupati/photo_profile/'.$gbr['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();

                    $data['user_pic'] = $gbr['file_name'];
                }
            }
			
			$data['nama'] = $nama;
			$username = $this->generate_username($nama);
			$data['username'] = $username;
			$data['password'] = md5($password);
			$data['telepon'] = $phone;
			$data['role'] = '3';
			//$data['kota'] = $kota;
			//$data['kecamatan'] = $kecamatan;
			//$data['desa'] = $desa;

			$idrole=$this->me->add($data);
			
			// print_r($idrole);
			if($idrole == FALSE)
			{
				$this->session->set_flashdata('message', '<i class="material-icons">error_outline</i> Sorry, incorrect username or password');
				redirect('/registration','locate');
			}
			else
			{
				// $data = array('id_user' => $idrole,
				// 	'username' => $username, 
					 
				// 	'nama'=> $nama, 
				// 	'login' => TRUE);
				 
				// $this->session->set_userdata($data);
				// $this->portal($idrole['role']);
				redirect('/login');
				 
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
	 
	function process_logout()
	{
		$this->session->sess_destroy();
		redirect('', 'refresh');
	}
}
?>
