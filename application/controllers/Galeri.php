<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri extends CI_Controller
{

	function __construct(){
		parent::__construct();
		       
           $this->load->model(array('m_login','m_dinas',
         'm_news',
         'm_user',
         'm_gallery',
         'm_album'));
         define('IS_TEST','FALSE');
	}

	  private function portal($role)
    {
        switch($role)
        {
          // case 1:redirect('/admin','location');break;
           case 2:redirect('/user','location');break;
        }
    }
    private function valid()
    {
        if ($this->session->userdata('login') == TRUE)
        {
            $this->portal($this->session->userdata('idrole'));
            return TRUE;
        }
        else
            redirect('login');
    }
	public function index()
	{
        if ($this->valid() ==  FALSE)
        {
            redirect('login', 'refresh');
        }
        else
        {
            /* Title Page */
         
        $data['page_name'] = 'home';
        $data['page_title'] = 'Welcome';
        //$this->load->view('login');
        $data['id_user']=$this->session->userdata('id_user');
        $data['user'] = $this->session->userdata('username');
        $data['namauser'] = $this->session->userdata('nama');
        $data['rs_user'] = $this->m_user->get($data['id_user']);
            /* Load Template */

        $this->load->view('template/header', $data);
        $this->load->view('admin/sidebar/sidebar', $data);
        $this->load->view('template/rightside',$data);
        $this->load->view('admin/galeri_add', $data);
        $this->load->view('template/footer', $data);
        }
	}

	 


	//Untuk proses upload foto
	function proses_upload(){

        $config['upload_path']   = FCPATH.'/upload-foto/';
        $config['allowed_types'] = 'gif|jpg|png|ico';
        $this->load->library('upload',$config);

        if($this->upload->do_upload('file')){
        	$token=$this->input->post('token_foto');
        	$nama=$this->upload->data('file_name');

       		$data['gname'] = $nama;
       		$data['gimages'] = $nama;
       		$data['date'] = date('Y-m-d');
       		$data['status'] = 1;
       		$data['deskripsi'] = 'test';
       		$data['token'] = $token;

        	$this->m_gallery->add($data);
        }


	}


	//Untuk menghapus foto
	function remove_foto(){

		//Ambil token foto
		$token=$this->input->post('token');

		
		$foto=$this->db->get_where('gallery',array('token'=>$token));


		if($foto->num_rows()>0){

			$hasil=$foto->row();
			$nama_foto=$hasil->gimages;
			$gid=$hasil->gid;
			if(file_exists($file=FCPATH.'/upload-foto/'.$nama_foto)){
				unlink($file);
			}
			$this->m_gallery->remove($gid);

		}


		echo "{}";
	}

}