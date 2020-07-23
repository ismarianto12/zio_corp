<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin2 extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //print_r($_SESSION);

        /* Load :: Common */
           $this->load->model(array('m_login','m_dinas',
         'm_news','m_event',
         'm_user',
         'm_sponsor',
		 'm_fasilitas',
         'm_slide',
         'm_message',
         'm_detailmessage',
         'm_detailnews',
         'm_member',
         'm_galeri',
         'm_quiz',
         'm_gallery',
         'm_profile',
         'm_album','m_visi'));
         define('IS_TEST','FALSE');

         if($this->session->userdata('id_role') == '1')
         {
            redirect('/bupati','location');
            break;
         }

         else if($this->session->userdata('id_role') == '2')
         {
            redirect('/dinas','location');
            break;
         }

         else if($this->session->userdata('id_role') == '3')
         {
            redirect('/dinas','location');
            break;
         }    

         $this->load->library('upload');
    }

    private function portal($role)
    {
        switch($role)
        {
          // case 1:redirect('/admin','location');break;
           // case 2:redirect('/user','location');break;
        }
    }
    private function valid()
    {
       /* if ($this->session->userdata('login') == TRUE)
        {
            $this->portal($this->session->userdata('id_role'));
            return TRUE;
        }
        else
            redirect('login');
            /*/

    }

	public function index()
	{
      /* if ($this->valid() ==  FALSE)
        {
            redirect('login', 'refresh');
        }
        else
        {*/
            /* Title Page */
         
            $data['page_name'] = 'home';
            $data['page_title'] = 'Welcome';
            //$this->load->view('login');
            $data['id_user']=$this->session->userdata('id_user');
            $data['user'] = $this->session->userdata('username');
            $data['namauser'] = $this->session->userdata('nama');
            $data['rs_user'] = $this->m_user->get($data['id_user']);
            $data['rs_sponsor'] = $this->m_sponsor->get();
            $data['rs_marque'] = $this->m_slide->getMarquee('1');
            $data['rs_slide'] = $this->m_slide->get();
            $data['link'] = 'admin2';
                /* Load Template */

            $this->load->view('template/header', $data);
            $this->load->view('admin/sidebar/sidebar-2', $data);
            $this->load->view('template/rightside',$data);
            $this->load->view('admin/dashboard', $data);
            $this->load->view('template/footer', $data);
      //  }
	}

    public function akundinas()
    {
      /*  if ($this->valid() ==  FALSE)
        {
            redirect('login', 'refresh');
        }
        else
        { */
            /* Title Page */

            if(!empty($_POST))
            {
                $keyword = $this->input->post('keyword');

                 $data['rs_akundinas'] = $this->m_user->getAkunDinas($keyword);
            }
            else{
                 $data['rs_akundinas'] = $this->m_user->getAkunDinas();
            }
         
            $data['page_name'] = 'home';
            $data['page_title'] = 'Dinas';
            //$this->load->view('login');
            $data['id_user']=$this->session->userdata('id_user');
            $data['user'] = $this->session->userdata('username');
            $data['namauser'] = $this->session->userdata('nama');
            $data['rs_user'] = $this->m_user->get($data['id_user']);
            $data['rs_sponsor'] = $this->m_sponsor->get();
            $data['rs_marque'] = $this->m_slide->getMarquee('1');
            $data['rs_slide'] = $this->m_slide->get();
            $data['link'] = 'admin2';
                /* Load Template */

            $this->load->view('template/header', $data);
            $this->load->view('admin/sidebar/sidebar-2', $data);
            $this->load->view('template/rightside',$data);
            $this->load->view('admin/akundinas', $data);
            $this->load->view('template/footer', $data);
       // }
    }

    public function akundinas_add()
    {
       /* if ($this->valid() ==  FALSE)
        {
            redirect('login', 'refresh');
        }
        else
        {  */
            if(!empty($_POST))
            {
                $this->form_validation->set_rules('nama','nama','xss_clean|required');
                $this->form_validation->set_rules('email','email','trim|xss_clean|required');
                $this->form_validation->set_rules('telepon','telepon','trim|xss_clean|required');
                $this->form_validation->set_rules('kota','kota','trim|xss_clean|required');
                $this->form_validation->set_rules('kecamatan','kecamatan','trim|xss_clean|required');
                $this->form_validation->set_rules('desa','desa','trim|xss_clean|required');
                $this->form_validation->set_rules('username','username','trim|xss_clean|required');
                $this->form_validation->set_rules('password','password','trim|xss_clean|required');

                if(!empty($_FILES))
                {
                    $config['upload_path'] = './assets/images/bupati/photo_profile/';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
                    $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload

                    $this->upload->initialize($config);

                    $config['image_library'] = 'gd2';
                    $config['create_thumb'] = FALSE;
                    $config['maintain_ratio'] = FALSE;
                    $config['quality'] = '50%';
                    $config['width'] = 600;
                    $config['height'] = 400;

                    if(!empty($_FILES['foto_profile']['name']))
                    {   
                        if ($this->upload->do_upload('foto_profile'))
                        {
                            $gbr = $this->upload->data();
                            //Compress Image
                            $config['source_image'] = './assets/images/bupati/photo_profile/'.$gbr['file_name'];
                            $config['new_image'] = './assets/images/bupati/photo_profile/'.$gbr['file_name'];
                            $data['user_pic'] = $gbr['file_name'];
                        }
                    }

                    if(!empty($_FILES['foto_sampul']['name']))
                    {
                        if ($this->upload->do_upload('foto_sampul'))
                        {
                            $gbr2 = $this->upload->data();
                            //Compress Image
                            $config['source_image'] = './assets/images/bupati/photo_profile/'.$gbr2['file_name'];
                            $config['new_image'] = './assets/images/bupati/photo_profile/'.$gbr2['file_name'];

                            $data['foto_sampul'] = $gbr2['file_name'];
                        }
                    }

                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                }

                $data['nama'] = $this->input->post('nama');
                $data['email'] = $this->input->post('email');
                $data['telepon'] = $this->input->post('telepon');
                $data['kota'] = $this->input->post('kota');
                $data['kecamatan'] = $this->input->post('kecamatan');
                $data['desa'] = $this->input->post('desa');
                $data['username'] = $this->input->post('username');
                $data['password'] = md5($this->input->post('password'));
                $data['id_dinas'] = $this->input->post('dinas');
                $data['role'] = 2;

                if(IS_TEST === 'FALSE'){
                $this->m_user->add($data); 
                    $data['msg'] = 'Data sudah disimpan';
                 $this->session->set_flashdata('message', 'Data sudah disimpan');
                     $data['clear_text_box'] = 'TRUE';   
                      redirect(site_url() . '/admin2/akundinas' , 'refresh');

                }else{
                    $data['msg'] = 'WARNING: READ ONLY !';
                }
            }
            else
            {
                $data['page_name'] = 'home';
                $data['page_title'] = 'Dinas';
                //$this->load->view('login');
                $data['id_user']=$this->session->userdata('id_user');
                $data['user'] = $this->session->userdata('username');
                $data['namauser'] = $this->session->userdata('nama');
                $data['rs_user'] = $this->m_user->get($data['id_user']);
                $data['rs_sponsor'] = $this->m_sponsor->get();
                $data['rs_marque'] = $this->m_slide->getMarquee('1');
                $data['rs_slide'] = $this->m_slide->get();
                $data['rs_dinas'] = $this->m_dinas->get();
                    /* Load Template */

                $this->load->view('template/header', $data);
                $this->load->view('admin/sidebar/sidebar-2', $data);
                $this->load->view('template/rightside',$data);
                $this->load->view('admin/add_akundinas', $data);
                $this->load->view('template/footer', $data);
            }
      //  }
    }

    public function akundinas_edit()
    {
      /*  if ($this->valid() ==  FALSE)
        {
            redirect('login', 'refresh');
        }
        else
        { */
            if(!empty($_POST))
            {
                $this->form_validation->set_rules('nama','nama','xss_clean|required');
                $this->form_validation->set_rules('email','email','trim|xss_clean|required');
                $this->form_validation->set_rules('telepon','telepon','trim|xss_clean|required');
                $this->form_validation->set_rules('kota','kota','trim|xss_clean|required');
                $this->form_validation->set_rules('kecamatan','kecamatan','trim|xss_clean|required');
                $this->form_validation->set_rules('desa','desa','trim|xss_clean|required');
                $this->form_validation->set_rules('username','username','trim|xss_clean|required');
                $this->form_validation->set_rules('password','password','trim|xss_clean|required');

                if(!empty($_FILES))
                {
                    $config['upload_path'] = './assets/images/bupati/photo_profile/';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
                    $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload

                    $this->upload->initialize($config);

                    $config['image_library'] = 'gd2';
                    $config['create_thumb'] = FALSE;
                    $config['maintain_ratio'] = FALSE;
                    $config['quality'] = '50%';
                    $config['width'] = 600;
                    $config['height'] = 400;

                    if(!empty($_FILES['foto_profile']['name']))
                    {   
                        if ($this->upload->do_upload('foto_profile'))
                        {
                            $fotoprofileterdahulu = $this->input->post('fotoprofileprev');
                            unlink('./assets/images/bupati/photo_profile/'.$fotoprofileterdahulu);

                            $gbr = $this->upload->data();
                            //Compress Image
                            $config['source_image'] = './assets/images/bupati/photo_profile/'.$gbr['file_name'];
                            $config['new_image'] = './assets/images/bupati/photo_profile/'.$gbr['file_name'];
                            $data['user_pic'] = $gbr['file_name'];
                        }
                    }

                    if(!empty($_FILES['foto_sampul']['name']))
                    {
                        if ($this->upload->do_upload('foto_sampul'))
                        {
                            $fotosampulterdahulu = $this->input->post('fotosampulprev');
                            unlink('./assets/images/bupati/photo_profile/'.$fotosampulterdahulu);

                            $gbr2 = $this->upload->data();
                            //Compress Image
                            $config['source_image'] = './assets/images/bupati/photo_profile/'.$gbr2['file_name'];
                            $config['new_image'] = './assets/images/bupati/photo_profile/'.$gbr2['file_name'];

                            $data['foto_sampul'] = $gbr2['file_name'];
                        }
                    }

                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                }

                if($this->input->post('password') != '')
                {
                    $data['password'] = md5($this->input->post('password'));
                }

                $data['nama'] = $this->input->post('nama');
                $data['email'] = $this->input->post('email');
                $data['telepon'] = $this->input->post('telepon');
                $data['kota'] = $this->input->post('kota');
                $data['kecamatan'] = $this->input->post('kecamatan');
                $data['desa'] = $this->input->post('desa');
                $data['username'] = $this->input->post('username');
                $data['id_user'] = $this->input->post('id');
                $data['id_dinas'] = $this->input->post('dinas');
                $data['role'] = 2;

                if(IS_TEST === 'FALSE'){
                $this->m_user->add($data); 
                    $data['msg'] = 'Data sudah disimpan';
                 $this->session->set_flashdata('message', 'Data sudah disimpan');
                     $data['clear_text_box'] = 'TRUE';   
                      redirect(site_url() . '/admin2/akundinas' , 'refresh');

                }else{
                    $data['msg'] = 'WARNING: READ ONLY !';
                }
            }

            $id_user = (int)$this->uri->segment(3);
            $data['rs_akundinas'] = $this->m_user->get($id_user);

            $data['page_name'] = 'home';
            $data['page_title'] = 'Dinas';
            //$this->load->view('login');
            $data['id_user']=$this->session->userdata('id_user');
            $data['user'] = $this->session->userdata('username');
            $data['namauser'] = $this->session->userdata('nama');
            $data['rs_user'] = $this->m_user->get($data['id_user']);
            $data['rs_sponsor'] = $this->m_sponsor->get();
            $data['rs_marque'] = $this->m_slide->getMarquee('1');
            $data['rs_slide'] = $this->m_slide->get();
            $data['rs_dinas'] = $this->m_dinas->get();
                /* Load Template */

            $this->load->view('template/header', $data);
            $this->load->view('admin/sidebar/sidebar-2', $data);
            $this->load->view('template/rightside',$data);
            $this->load->view('admin/edit_akundinas', $data);
            $this->load->view('template/footer', $data);
      //  }
    }

    public function akundinas_del($kode)
    {
        if(IS_TEST === 'FALSE')
        {
            $this->m_user->remove($kode);
            $this->session->set_flashdata('message', 'Data telah berhasil dihapus');
        }
        else
        {
            $this->session->set_flashdata('message', 'WARNING: READ ONLY !');
        }
        
        redirect(site_url() . '/admin2/akundinas/','reload');   
    }

    public function bupati()
    {
       /* if ($this->valid() ==  FALSE)
        {
            redirect('login', 'refresh');
        }
        else
        {
            /* Title Page */

            if(!empty($_POST))
            {
                $keyword = $this->input->post('keyword');

                 $data['rs_bupati'] = $this->m_user->getBupati($keyword);
            }
            else{
                 $data['rs_bupati'] = $this->m_user->getBupati();
            }
         
            $data['page_name'] = 'home';
            $data['page_title'] = 'Bupati';
            //$this->load->view('login');
            $data['id_user']=$this->session->userdata('id_user');
            $data['user'] = $this->session->userdata('username');
            $data['namauser'] = $this->session->userdata('nama');
            $data['rs_user'] = $this->m_user->get($data['id_user']);
            $data['rs_sponsor'] = $this->m_sponsor->get();
            $data['rs_marque'] = $this->m_slide->getMarquee('1');
            $data['rs_slide'] = $this->m_slide->get();
                /* Load Template */

            $this->load->view('template/header', $data);
            $this->load->view('admin/sidebar/sidebar-2', $data);
            $this->load->view('template/rightside',$data);
            $this->load->view('admin/bupati', $data);
            $this->load->view('template/footer', $data);
       // }
    }

    public function bupati_add()
    {
       /* if ($this->valid() ==  FALSE)
        {
            redirect('login', 'refresh');
        }
        else
        {*/
            if(!empty($_POST))
            {
                $this->form_validation->set_rules('nama','nama','xss_clean|required');
                $this->form_validation->set_rules('email','email','trim|xss_clean|required');
                $this->form_validation->set_rules('telepon','telepon','trim|xss_clean|required');
                $this->form_validation->set_rules('kota','kota','trim|xss_clean|required');
                $this->form_validation->set_rules('kecamatan','kecamatan','trim|xss_clean|required');
                $this->form_validation->set_rules('desa','desa','trim|xss_clean|required');
                $this->form_validation->set_rules('username','username','trim|xss_clean|required');
                $this->form_validation->set_rules('password','password','trim|xss_clean|required');

                if(!empty($_FILES))
                {
                    $config['upload_path'] = './assets/images/bupati/photo_profile/';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
                    $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload

                    $this->upload->initialize($config);

                    $config['image_library'] = 'gd2';
                    $config['create_thumb'] = FALSE;
                    $config['maintain_ratio'] = FALSE;
                    $config['quality'] = '50%';
                    $config['width'] = 600;
                    $config['height'] = 400;

                    if(!empty($_FILES['foto_profile']['name']))
                    {   
                        if ($this->upload->do_upload('foto_profile'))
                        {
                            $gbr = $this->upload->data();
                            //Compress Image
                            $config['source_image'] = './assets/images/bupati/photo_profile/'.$gbr['file_name'];
                            $config['new_image'] = './assets/images/bupati/photo_profile/'.$gbr['file_name'];
                            $data['user_pic'] = $gbr['file_name'];
                        }
                    }

                    if(!empty($_FILES['foto_sampul']['name']))
                    {
                        if ($this->upload->do_upload('foto_sampul'))
                        {
                            $gbr2 = $this->upload->data();
                            //Compress Image
                            $config['source_image'] = './assets/images/bupati/photo_profile/'.$gbr2['file_name'];
                            $config['new_image'] = './assets/images/bupati/photo_profile/'.$gbr2['file_name'];

                            $data['foto_sampul'] = $gbr2['file_name'];
                        }
                    }

                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                }

                $data['nama'] = $this->input->post('nama');
                $data['email'] = $this->input->post('email');
                $data['telepon'] = $this->input->post('telepon');
                $data['kota'] = $this->input->post('kota');
                $data['kecamatan'] = $this->input->post('kecamatan');
                $data['desa'] = $this->input->post('desa');
                $data['username'] = $this->input->post('username');
                $data['password'] = md5($this->input->post('password'));
                $data['role'] = 1;

                if(IS_TEST === 'FALSE'){
                $this->m_user->add($data); 
                    $data['msg'] = 'Data sudah disimpan';
                 $this->session->set_flashdata('message', 'Data sudah disimpan');
                     $data['clear_text_box'] = 'TRUE';   
                      redirect(site_url() . '/admin2/bupati' , 'refresh');

                }else{
                    $data['msg'] = 'WARNING: READ ONLY !';
                }
            }
            else
            {
                $data['page_name'] = 'home';
                $data['page_title'] = 'Bupati';
                //$this->load->view('login');
                $data['id_user']=$this->session->userdata('id_user');
                $data['user'] = $this->session->userdata('username');
                $data['namauser'] = $this->session->userdata('nama');
                $data['rs_user'] = $this->m_user->get($data['id_user']);
                $data['rs_sponsor'] = $this->m_sponsor->get();
                $data['rs_marque'] = $this->m_slide->getMarquee('1');
                $data['rs_slide'] = $this->m_slide->get();
                    /* Load Template */

                $this->load->view('template/header', $data);
                $this->load->view('admin/sidebar/sidebar-2', $data);
                $this->load->view('template/rightside',$data);
                $this->load->view('admin/add_bupati', $data);
                $this->load->view('template/footer', $data);
            }
       // }
    }

    public function bupati_edit()
    {
        /*if ($this->valid() ==  FALSE)
        {
            redirect('login', 'refresh');
        }
        else
        {*/
            if(!empty($_POST))
            {
                $this->form_validation->set_rules('nama','nama','xss_clean|required');
                $this->form_validation->set_rules('email','email','trim|xss_clean|required');
                $this->form_validation->set_rules('telepon','telepon','trim|xss_clean|required');
                $this->form_validation->set_rules('kota','kota','trim|xss_clean|required');
                $this->form_validation->set_rules('kecamatan','kecamatan','trim|xss_clean|required');
                $this->form_validation->set_rules('desa','desa','trim|xss_clean|required');
                $this->form_validation->set_rules('username','username','trim|xss_clean|required');
                $this->form_validation->set_rules('password','password','trim|xss_clean|required');

                if(!empty($_FILES))
                {
                    $config['upload_path'] = './assets/images/bupati/photo_profile/';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
                    $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload

                    $this->upload->initialize($config);

                    $config['image_library'] = 'gd2';
                    $config['create_thumb'] = FALSE;
                    $config['maintain_ratio'] = FALSE;
                    $config['quality'] = '50%';
                    $config['width'] = 600;
                    $config['height'] = 400;

                    if(!empty($_FILES['foto_profile']['name']))
                    {   
                        if ($this->upload->do_upload('foto_profile'))
                        {
                            $fotoprofileterdahulu = $this->input->post('fotoprofileprev');
                            unlink('./assets/images/bupati/photo_profile/'.$fotoprofileterdahulu);

                            $gbr = $this->upload->data();
                            //Compress Image
                            $config['source_image'] = './assets/images/bupati/photo_profile/'.$gbr['file_name'];
                            $config['new_image'] = './assets/images/bupati/photo_profile/'.$gbr['file_name'];
                            $data['user_pic'] = $gbr['file_name'];
                        }
                    }

                    if(!empty($_FILES['foto_sampul']['name']))
                    {
                        if ($this->upload->do_upload('foto_sampul'))
                        {
                            $fotosampulterdahulu = $this->input->post('fotosampulprev');
                            unlink('./assets/images/bupati/photo_profile/'.$fotosampulterdahulu);

                            $gbr2 = $this->upload->data();
                            //Compress Image
                            $config['source_image'] = './assets/images/bupati/photo_profile/'.$gbr2['file_name'];
                            $config['new_image'] = './assets/images/bupati/photo_profile/'.$gbr2['file_name'];

                            $data['foto_sampul'] = $gbr2['file_name'];
                        }
                    }

                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();
                }

                if($this->input->post('password') != '')
                {
                    $data['password'] = md5($this->input->post('password'));
                }

                $data['nama'] = $this->input->post('nama');
                $data['email'] = $this->input->post('email');
                $data['telepon'] = $this->input->post('telepon');
                $data['kota'] = $this->input->post('kota');
                $data['kecamatan'] = $this->input->post('kecamatan');
                $data['id_user'] = $this->input->post('id');
                $data['desa'] = $this->input->post('desa');
                $data['username'] = $this->input->post('username');
                $data['role'] = 1;

                if(IS_TEST === 'FALSE'){
                $this->m_user->add($data); 
                    $data['msg'] = 'Data sudah disimpan';
                 $this->session->set_flashdata('message', 'Data sudah disimpan');
                     $data['clear_text_box'] = 'TRUE';   
                      redirect(site_url() . '/admin2/bupati' , 'refresh');

                }else{
                    $data['msg'] = 'WARNING: READ ONLY !';
                }
            }

            $id_user = (int)$this->uri->segment(3);
            $data['rs_bupati'] = $this->m_user->get($id_user);

            $data['page_name'] = 'home';
            $data['page_title'] = 'Bupati';
            //$this->load->view('login');
            $data['id_user']=$this->session->userdata('id_user');
            $data['user'] = $this->session->userdata('username');
            $data['namauser'] = $this->session->userdata('nama');
            $data['rs_user'] = $this->m_user->get($data['id_user']);
            $data['rs_sponsor'] = $this->m_sponsor->get();
            $data['rs_marque'] = $this->m_slide->getMarquee('1');
            $data['rs_slide'] = $this->m_slide->get();
                /* Load Template */

            $this->load->view('template/header', $data);
            $this->load->view('admin/sidebar/sidebar-2', $data);
            $this->load->view('template/rightside',$data);
            $this->load->view('admin/edit_bupati', $data);
            $this->load->view('template/footer', $data);
       // }
    }

    public function bupati_del($kode)
    {
        if(IS_TEST === 'FALSE')
        {
            $this->m_user->remove($kode);
            $this->session->set_flashdata('message', 'Data telah berhasil dihapus');
        }else{
            $this->session->set_flashdata('message', 'WARNING: READ ONLY !');
        }
           redirect(site_url() . '/admin2/bupati/','reload');   
    }

    public function message()
    {
       /* if ($this->valid() ==  FALSE)
        {
            redirect('login', 'refresh');
        }
        else
        {*/
            /* Title Page */

            $data['id_user']=$this->session->userdata('id_user');
         
            $data['page_name'] = 'Message';
            $data['page_title'] = 'Message';
            //$this->load->view('login');
            $data['id_user']=$this->session->userdata('id_user');
            $data['user'] = $this->session->userdata('username');
            $data['namauser'] = $this->session->userdata('nama');
            $data['rs_user'] = $this->m_user->get($data['id_user']);
            $data['rs_sponsor'] = $this->m_sponsor->get();
            $data['rs_marque'] = $this->m_slide->getMarquee('1');
            $data['rs_slide'] = $this->m_slide->get();
            $data['rs_message'] = $this->m_message->get();
            $data['link'] = 'admin2';


                /* Load Template */

            $this->load->view('template/header', $data);
            $this->load->view('admin/sidebar/sidebar-2', $data);
            $this->load->view('template/rightside',$data);
            $this->load->view('admin/message', $data);
            $this->load->view('template/footer', $data);
       // }
    }

    public function deletemessage()
    {
        $id_message = (int)$this->uri->segment(3);
        $this->m_message->remove($id_message);
        redirect(site_url() . '/admin2/message/', 'reload');
    }

    public function hapusdetailmessage()
    {
        $id_detail = (int)$this->uri->segment(3);
        $id_message = (int)$this->uri->segment(4);
        $this->m_detailmessage->remove($id_detail);
        redirect(site_url() . '/admin2/detailmessage/'.$id_message,'reload');
    }

    public function detailmessage()
    {
      /*  if ($this->valid() ==  FALSE)
        {
            redirect('login', 'refresh');
        }
        else
        {
            /* Title Page */

            $data['id_user']=$this->session->userdata('id_user');
            $id_message = (int)$this->uri->segment(3);

             if(!empty($_POST))
             {
                $data['balasan'] = $this->input->post('balasan');
                $data['id_message'] = $id_message;
                $data['tanggal'] = date('Y-m-d');

                $this->m_detailmessage->add($data);   
                redirect(site_url() . '/admin2/detailmessage/'.$id_message, 'refresh');
             }
         
            $data['page_name'] = 'Message';
            $data['page_title'] = 'Message';
            //$this->load->view('login');
            $data['id_user']=$this->session->userdata('id_user');
            $data['user'] = $this->session->userdata('username');
            $data['namauser'] = $this->session->userdata('nama');
            $data['rs_user'] = $this->m_user->get($data['id_user']);
            $data['rs_sponsor'] = $this->m_sponsor->get();
            $data['rs_marque'] = $this->m_slide->getMarquee('1');
            $data['rs_slide'] = $this->m_slide->get();

            $data['rs_message'] = $this->m_message->get($id_message);
            $data['rs_detailmessage'] = $this->m_detailmessage->getTest($id_message);
            $data['link'] = 'admin2';

                /* Load Template */

            $this->load->view('template/header', $data);
            $this->load->view('admin/sidebar/sidebar-2', $data);
            $this->load->view('template/rightside',$data);
            $this->load->view('admin/detailmessage', $data);
            $this->load->view('template/footer', $data);
       // }
    }

    function detailmember()
    {
       /* if ($this->valid() ==  FALSE)
        {
            redirect('login', 'refresh');
        }
        else
        {
            /* Title Page */
         
        $id_user = (int)$this->uri->segment(3);

        $data['page_name'] = 'home';
        $data['page_title'] = 'Welcome';
        //$this->load->view('login');
        $data['id_user']=$this->session->userdata('id_user');
        $data['user'] = $this->session->userdata('username');
        $data['namauser'] = $this->session->userdata('nama');
        $data['rs_user'] = $this->m_user->get($id_user);
        $data['rs_sponsor'] = $this->m_sponsor->get();
        $data['rs_marque'] = $this->m_slide->getMarquee('1');
        $data['rs_slide'] = $this->m_slide->get();
            /* Load Template */

        $this->load->view('template/header', $data);
        $this->load->view('admin/sidebar/sidebar-2', $data);
        $this->load->view('template/rightside',$data);
        $this->load->view('admin/detailmember', $data);
        $this->load->view('template/footer', $data);
     //   }   
    }

    function myprofile()
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
        $data['rs_sponsor'] = $this->m_sponsor->get();
        $data['rs_marque'] = $this->m_slide->getMarquee('1');
        $data['rs_slide'] = $this->m_slide->get();
            /* Load Template */

        $this->load->view('template/header', $data);
        $this->load->view('admin/sidebar/sidebar-2', $data);
        $this->load->view('template/rightside',$data);
        $this->load->view('admin/myprofile', $data);
        $this->load->view('template/footer', $data);
        }   
    }

    function myprofileedit()
    {
       /* if ($this->valid() ==  FALSE)
        {
            redirect('login', 'refresh');
        }
        else
        {
            /* Title Page */

            $data = array();
        
            if(!empty($_POST)){
                $this->form_validation->set_rules('nama','Nama','trim|required|xss_clean');
                $this->form_validation->set_rules('email','email','trim|required|valid_email|xss_clean');
                $this->form_validation->set_rules('no_telepon','No Telepon','trim|xss_clean');
                $this->form_validation->set_rules('kota', 'Kota', 'xss_clean|required');
                $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'xss_clean|required');
                $this->form_validation->set_rules('desa', 'Desa', 'xss_clean|required');
            
                if($this->form_validation->run() == TRUE)
                {
                    if(!empty($_FILES))
                    {
                        $config['upload_path'] = './assets/images/bupati/photo_profile/';
                        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
                        $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload

                        $this->upload->initialize($config);

                        $config['image_library'] = 'gd2';
                        $config['create_thumb'] = FALSE;
                        $config['maintain_ratio'] = FALSE;
                        $config['quality'] = '50%';
                        $config['width'] = 600;
                        $config['height'] = 400;

                        if(!empty($_FILES['foto_profile']['name']))
                        {   
                            if ($this->upload->do_upload('foto_profile'))
                            {
                                $fotoprofileterdahulu = $this->input->post('fotoprofileprev');
                                unlink('./assets/images/bupati/photo_profile/'.$fotoprofileterdahulu);

                                $gbr = $this->upload->data();
                                //Compress Image
                                $config['source_image'] = './assets/images/bupati/photo_profile/'.$gbr['file_name'];
                                $config['new_image'] = './assets/images/bupati/photo_profile/'.$gbr['file_name'];
                                $data['user_pic'] = $gbr['file_name'];
                            }
                        }

                        if(!empty($_FILES['foto_sampul']['name']))
                        {
                            if ($this->upload->do_upload('foto_sampul'))
                            {
                                $fotosampulterdahulu = $this->input->post('fotosampulprev');
                                unlink('./assets/images/bupati/photo_profile/'.$fotosampulterdahulu);

                                $gbr2 = $this->upload->data();
                                //Compress Image
                                $config['source_image'] = './assets/images/bupati/photo_profile/'.$gbr2['file_name'];
                                $config['new_image'] = './assets/images/bupati/photo_profile/'.$gbr2['file_name'];

                                $data['foto_sampul'] = $gbr2['file_name'];
                            }
                        }

                        $this->load->library('image_lib', $config);
                        $this->image_lib->resize();
                    }

                    $data['nama']   = $this->input->post('nama');
                    $data['telepon']   = $this->input->post('no_telepon');
                    $data['email'] = $this->input->post('email');
                    $data['kota'] = $this->input->post('kota');
                    $data['kota'] = $this->input->post('kota');
                    $data['kecamatan'] = $this->input->post('kecamatan');
                    $data['desa'] = $this->input->post('desa');
                    $data['id_user']=$this->session->userdata('id_user');

                    if(IS_TEST === 'FALSE')
                    {
                        $this->m_member->add($data); 
                        // $data['msg'] = 'Data sudah disimpan';
                        // $this->session->set_flashdata('message', 'Data sudah diubah');
                        $data['clear_text_box'] = 'TRUE';   
                        redirect(site_url() . '/admin2/myprofile' , 'refresh');

                    }else{
                        $data['msg'] = 'WARNING: READ ONLY !';
                    }
                }
                else
                {
                    $data['msg'] = validation_errors();
                }
            }
         

        $data['page_name'] = 'home';
        $data['page_title'] = 'Welcome';
        //$this->load->view('login');
        $data['id_user']=$this->session->userdata('id_user');
        $data['user'] = $this->session->userdata('username');
        $data['namauser'] = $this->session->userdata('nama');
        $data['rs_user'] = $this->m_user->get($data['id_user']);
        $data['rs_sponsor'] = $this->m_sponsor->get();
        $data['rs_marque'] = $this->m_slide->getMarquee('1');
        $data['rs_slide'] = $this->m_slide->get();
            /* Load Template */

        $this->load->view('template/header', $data);
        $this->load->view('admin/sidebar/sidebar-2', $data);
        $this->load->view('template/rightside',$data);
        $this->load->view('admin/myprofile', $data);
        $this->load->view('template/footer', $data);
      //  }   
    }

    public function member()
    {
       /* if ($this->valid() ==  FALSE)
        {
            redirect('login', 'refresh');
        }
        else
        {*/

            if(!empty($_POST)){
                $keyword = $this->input->post('keyword');

                 $data['rs_member'] = $this->m_member->getMember($keyword);
            }
            else{
                 $data['rs_member'] = $this->m_member->getMember();
            }
            /* Title Page */
         
            $data['page_name'] = 'home';
            $data['page_title'] = 'Welcome';
            //$this->load->view('login');
            $data['id_user']=$this->session->userdata('id_user');
            $data['user'] = $this->session->userdata('username');
            $data['namauser'] = $this->session->userdata('nama');
            $data['rs_user'] = $this->m_user->get($data['id_user']);
            $data['rs_sponsor'] = $this->m_sponsor->get();
            $data['rs_marque'] = $this->m_slide->getMarquee('1');
            $data['rs_slide'] = $this->m_slide->get();
            $data['link'] = 'admin2';
                /* Load Template */

            $this->load->view('template/header', $data);
            $this->load->view('admin/sidebar/sidebar-2', $data);
            $this->load->view('template/rightside',$data);
            $this->load->view('admin/member', $data);
            $this->load->view('template/footer', $data);
       // }
    }

     function member_del($kode){
        
        if(IS_TEST === 'FALSE'){
            $this->m_member->remove($kode);
            $this->session->set_flashdata('message', 'Data telah berhasil dihapus');
        }else{
            $this->session->set_flashdata('message', 'WARNING: READ ONLY !');
        }
           redirect(site_url() . '/admin2/member/','reload');
    }

    public function detailprofile($id)
    {
        $data = array();
        
        $data['page_title'] = 'Profile';       
        $url = site_url() . '/admin2/profile/';
       
        
        $data['id_user']=$this->session->userdata('id_user');
        $data['user'] = $this->session->userdata('username');
        $data['namauser'] = $this->session->userdata('nama');
        $data['rs_user'] = $this->m_user->get($data['id_user']);
            /* Load Template */

        $id_profile = (int)$this->uri->segment(3);
        $data['rs_profile'] = $this->m_profile->get($id);
        $this->load->view('template/header', $data);
        $this->load->view('admin/sidebar/sidebar-2', $data);
        $this->load->view('template/rightside',$data);
        $this->load->view('admin/detailprofile', $data);
        $this->load->view('template/footer', $data);   
    }

    public function profile_add()
    {
       /* if ($this->valid() ==  FALSE)
        {
            redirect('login', 'refresh');
        }
        else
        {
            /* Title Page */

            //$this->load->view('login');
            $data['id_user']=$this->session->userdata('id_user');

            if(!empty($_POST))
            {
                $this->form_validation->set_rules('judul','judul','xss_clean|required');
                $this->form_validation->set_rules('deskripsi','deskripsi','trim|xss_clean|required');

                if(!empty($_FILES['file_profile']['name']))
                {
                    $config['upload_path'] = './assets/images/profile/';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
                    $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload

                    $this->upload->initialize($config);
                    if ($this->upload->do_upload('file_profile')){
                        $gbr = $this->upload->data();
                        //Compress Image
                        $config['image_library'] = 'gd2';
                        $config['source_image'] = './assets/images/profile/'.$gbr['file_name'];
                        $config['create_thumb'] = FALSE;
                        $config['maintain_ratio'] = FALSE;
                        $config['quality'] = '50%';
                        $config['width'] = 600;
                        $config['height'] = 400;
                        $config['new_image'] = './assets/images/profile/'.$gbr['file_name'];
                        $this->load->library('image_lib', $config);
                        $this->image_lib->resize();

                        $data['foto_profile'] = $gbr['file_name'];
                    }
                }
            
                if($this->form_validation->run() == TRUE)
                {
                    $data['judul_profile'] = $this->input->post('judul');
                    $data['deskripsi'] = $this->input->post('deskripsi');
                    $data['tanggal'] = date('d-m-Y H:i:s');
     
                    if(IS_TEST === 'FALSE'){
                    $this->m_profile->add($data); 
                        $data['msg'] = 'Data sudah disimpan';
                     $this->session->set_flashdata('message', 'Data sudah disimpan');
                         $data['clear_text_box'] = 'TRUE';   
                          redirect(site_url() . '/admin2/profile' , 'refresh');

                    }else{
                        $data['msg'] = 'WARNING: READ ONLY !';
                    }

                }else{
                    $data['msg'] = validation_errors();
                }
            }
             
            /* Load Template */
            $data['page_name'] = 'Profile';
            $data['page_title'] = 'Add Profile';

            $data['user'] = $this->session->userdata('username');
            $data['namauser'] = $this->session->userdata('nama');
            $data['rs_user'] = $this->m_user->get($data['id_user']);

            $this->load->view('template/header', $data);
            $this->load->view('admin/sidebar/sidebar-2', $data);
            $this->load->view('template/rightside',$data);
            $this->load->view('admin/profile_add', $data);
            $this->load->view('template/footer', $data);
      //  }
    }

    function profile_edit($kode){
        $data = array();
        
        if(!empty($_POST)){
            $this->form_validation->set_rules('judul','judul','xss_clean|required');
            $this->form_validation->set_rules('deskripsi','deskripsi','trim|xss_clean|required');

            if(!empty($_FILES['file_profile']['name']))
            {
                $fototerdahulu = $this->input->post('foto_terdahulu');
                unlink('./assets/images/profile/'.$fototerdahulu);

                $config['upload_path'] = './assets/images/profile/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
                $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload

                $this->upload->initialize($config);
                if ($this->upload->do_upload('file_profile')){
                    $gbr = $this->upload->data();
                    //Compress Image
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './assets/images/profile/'.$gbr['file_name'];
                    $config['create_thumb'] = FALSE;
                    $config['maintain_ratio'] = FALSE;
                    $config['quality'] = '50%';
                    $config['width'] = 600;
                    $config['height'] = 400;
                    $config['new_image'] = './assets/images/profile/'.$gbr['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();

                    $data['foto_profile'] = $gbr['file_name'];
                }
            }
        
            if($this->form_validation->run() == TRUE)
            {
                $data['judul_profile'] = $this->input->post('judul');
                $data['deskripsi'] = $this->input->post('deskripsi');
                $data['id_profile'] = $this->input->post('id');
                $data['tanggal'] = date('d-m-Y H:i:s');
 
                if(IS_TEST === 'FALSE'){
                $this->m_profile->add($data); 
                    $data['msg'] = 'Data sudah disimpan';
                 $this->session->set_flashdata('message', 'Data sudah disimpan');
                     $data['clear_text_box'] = 'TRUE';   
                      redirect(site_url() . '/admin2/profile' , 'refresh');

                }else{
                    $data['msg'] = 'WARNING: READ ONLY !';
                    
                }            

            }else{
                $data['msg'] = validation_errors();
                
            }
        }
        
        $data['page_title'] = 'Profile';       
        $url = site_url() . '/admin2/profile/';
       
        
        $data['id_user']=$this->session->userdata('id_user');
        $data['user'] = $this->session->userdata('username');
        $data['namauser'] = $this->session->userdata('nama');
        $data['rs_user'] = $this->m_user->get($data['id_user']);
            /* Load Template */

        $id_profile = (int)$this->uri->segment(3);
        $data['rs_profile'] = $this->m_profile->get($kode);
        $this->load->view('template/header', $data);
        $this->load->view('admin/sidebar/sidebar-2', $data);
        $this->load->view('template/rightside',$data);
        $this->load->view('admin/profile_edit', $data);
        $this->load->view('template/footer', $data);
    }

    function profile_del($kode){
        
        if(IS_TEST === 'FALSE'){
            $this->m_profile->remove($kode);
            $this->session->set_flashdata('message', 'Data telah berhasil dihapus');
        }else{
            $this->session->set_flashdata('message', 'WARNING: READ ONLY !');
        }
           redirect(site_url() . '/admin2/profile/','reload');
    }




//     ----------------upload--------------------//
//     function do_upload($field = 'userfile', $new_name='') {

//     if ( ! isset($_FILES[$field])) {
//         $this->set_error('upload_no_file_selected');
//         return FALSE;
//     }
    
//     if ( ! $this->validate_upload_path()) {
//         return FALSE;
//     }
    
//     if ( ! is_uploaded_file($_FILES[$field]['tmp_name'])) {
//         $error = ( ! isset($_FILES[$field]['error'])) ? 4 : $_FILES[$field]['error'];
      
//         switch($error) {
//             case 1: // UPLOAD_ERR_INI_SIZE
//                 $this->set_error('upload_file_exceeds_limit');
//                 break;
//             case 2: // UPLOAD_ERR_FORM_SIZE
//                 $this->set_error('upload_file_exceeds_form_limit');
//                 break;
//             case 3: // UPLOAD_ERR_PARTIAL
//                 $this->set_error('upload_file_partial');
//                 break;
//             case 4: // UPLOAD_ERR_NO_FILE
//                 $this->set_error('upload_no_file_selected');
//                 break;
//             case 6: // UPLOAD_ERR_NO_TMP_DIR
//                 $this->set_error('upload_no_temp_directory');
//                 break;
//             case 7: // UPLOAD_ERR_CANT_WRITE
//                 $this->set_error('upload_unable_to_write_file');
//                 break;
//             case 8: // UPLOAD_ERR_EXTENSION
//                 $this->set_error('upload_stopped_by_extension');
//                 break;
//             default :
//                 $this->set_error('upload_no_file_selected');
//                 break;
//         }
      
//         return FALSE;
//     }
    
//     $this->file_temp = $_FILES[$field]['tmp_name'];
//     $this->file_size = $_FILES[$field]['size'];
//     $this->file_type = preg_replace("/^(.+?);.*$/", "\\1", $_FILES[$field]['type']);
//     $this->file_type = strtolower($this->file_type);
//     $this->file_ext  = $this->get_extension($_FILES[$field]['name']);
//     $new_name = md5(uniqid(mt_rand()));
//     // check if a name has been specified, if so set it
//     if ($new_name != '') {
//         $this->file_name = $this->_prep_filename($new_name . $this->file_ext);
//     }
//     else {
//         $this->file_name = $this->_prep_filename($_FILES[$field]['name']);
//     }
    
//     if ($this->file_size > 0) {
//       $this->file_size = round($this->file_size/1024, 2);
//     }
    
//     if ( ! $this->is_allowed_filetype()) {
//         $this->set_error('upload_invalid_filetype');
//         return FALSE;
//     }
    
//     if ( ! $this->is_allowed_filesize()) {
//         $this->set_error('upload_invalid_filesize');
//         return FALSE;
//     }
    
//     if ( ! $this->is_allowed_dimensions()) {
//         $this->set_error('upload_invalid_dimensions');
//         return FALSE;
//     }
    
//     $this->file_name = $this->clean_file_name($this->file_name);
    
//     if ($this->max_filename > 0) {
//         $this->file_name = $this->limit_filename_length($this->file_name, $this->max_filename);
//     }
    
//     if ($this->remove_spaces == TRUE) {
//         $this->file_name = preg_replace("/\s+/", "_", $this->file_name);
//     }
    
//     $this->orig_name = $this->file_name;
    
//     if ($this->overwrite == FALSE) {
//         $this->file_name = $this->set_filename($this->upload_path, $this->file_name);
      
//         if ($this->file_name === FALSE)
//         {
//             return FALSE;
//         }
//     }
    
//     if ( ! @copy($this->file_temp, $this->upload_path.$this->file_name)) {
//         if ( ! @move_uploaded_file($this->file_temp, $this->upload_path.$this->file_name))
//         {
//             $this->set_error('upload_destination_error');
//             return FALSE;
//         }
//     }
    
//     if ($this->xss_clean == TRUE) {
//         $this->do_xss_clean();
//     }
    
//     $this->set_image_properties($this->upload_path.$this->file_name);
    
//     return TRUE;

// 
public function xfasilitas()
    {
        $data = array();
        
        $data['page_title'] = 'Fasilitas';       
        $url = site_url() . '/admin2/fasilitas/';
       
        
        $data['id_fasilitas']=$this->session->userdata('id_fasilitas');
        $data['user'] = $this->session->userdata('username');
        $data['namauser'] = $this->session->userdata('nama');
        $data['rs_fasilitas'] = $this->m_fasilitas->get($data['id_fasilitas']);
            /* Load Template */

        $id_fasilitas = (int)$this->uri->segment(3);
        $data['rs_fasilitas'] = $this->m_fasilitas->get();
        $this->load->view('template/header', $data);
        $this->load->view('admin/sidebar/sidebar-2', $data);
        $this->load->view('template/rightside',$data);
        $this->load->view('admin/detailfasilitas', $data);
        $this->load->view('template/footer', $data);   
    }
 public function detailfasilitas($id)
    {
        $data = array();
        
        $data['page_title'] = 'Fasilitas';       
        $url = site_url() . '/admin2/fasilitas/';
       
        
        $data['id_fasilitas']=$this->session->userdata('id_fasilitas');
        $data['user'] = $this->session->userdata('username');
        $data['namauser'] = $this->session->userdata('nama');
        $data['rs_fasilitas'] = $this->m_fasilitas->get($data['id_fasilitas']);
            /* Load Template */

        $id_fasilitas = (int)$this->uri->segment(3);
        $data['rs_fasilitas'] = $this->m_fasilitas->get($id_fasilitas);
        $this->load->view('template/header', $data);
        $this->load->view('admin/sidebar/sidebar-2', $data);
        $this->load->view('template/rightside',$data);
        $this->load->view('admin/detailfasilitas', $data);
        $this->load->view('template/footer', $data);   
    }

    public function fasilitas_add()
    {
       /* if ($this->valid() ==  FALSE)
        {
            redirect('login', 'refresh');
        }
        else
        {
            /* Title Page */

            //$this->load->view('login');
            $data['id_user']=$this->session->userdata('id_user');

            if(!empty($_POST))
            {
                $this->form_validation->set_rules('judul','judul','xss_clean|required');
                $this->form_validation->set_rules('deskripsi','deskripsi','trim|xss_clean|required');

                if(!empty($_FILES['file_fasilitas']['name']))
                {
                    $config['upload_path'] = './assets/images/fasilitas/';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
                    $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload

                    $this->upload->initialize($config);
                    if ($this->upload->do_upload('file_fasilitas')){
                        $gbr = $this->upload->data();
                        //Compress Image
                        $config['image_library'] = 'gd2';
                        $config['source_image'] = './assets/images/fasilitas/'.$gbr['file_name'];
                        $config['create_thumb'] = FALSE;
                        $config['maintain_ratio'] = FALSE;
                        $config['quality'] = '50%';
                        $config['width'] = 600;
                        $config['height'] = 400;
                        $config['new_image'] = './assets/images/fasilitas/'.$gbr['file_name'];
                        $this->load->library('image_lib', $config);
                        $this->image_lib->resize();

                        $data['foto_fasilitas'] = $gbr['file_name'];
                    }
                }
            
                if($this->form_validation->run() == TRUE)
                {
                    $data['judul_fasilitas'] = $this->input->post('judul');
                    $data['deskripsi'] = $this->input->post('deskripsi');
                    $data['tanggal'] = date('d-m-Y H:i:s');
     
                    if(IS_TEST === 'FALSE'){
                    $this->m_fasilitas->add($data); 
                        $data['msg'] = 'Data sudah disimpan';
                     $this->session->set_flashdata('message', 'Data sudah disimpan');
                         $data['clear_text_box'] = 'TRUE';   
                          redirect(site_url() . '/admin2/fasilitas' , 'refresh');

                    }else{
                        $data['msg'] = 'WARNING: READ ONLY !';
                    }

                }else{
                    $data['msg'] = validation_errors();
                }
            }
             
            /* Load Template */
            $data['page_name'] = 'Fasilitas';
            $data['page_title'] = 'Add Fasilitas';

            $data['user'] = $this->session->userdata('username');
            $data['namauser'] = $this->session->userdata('nama');
            $data['rs_user'] = $this->m_user->get($data['id_user']);

            $this->load->view('template/header', $data);
            $this->load->view('admin/sidebar/sidebar-2', $data);
            $this->load->view('template/rightside',$data);
            $this->load->view('admin/fasilitas_add', $data);
            $this->load->view('template/footer', $data);
       // }
    }

    function fasilitas_edit($kode){
        $data = array();
        
        if(!empty($_POST)){
            $this->form_validation->set_rules('judul','judul','xss_clean|required');
            $this->form_validation->set_rules('deskripsi','deskripsi','trim|xss_clean|required');

            if(!empty($_FILES['file_fasilitas']['name']))
            {
                $fototerdahulu = $this->input->post('foto_terdahulu');
                unlink('./assets/images/fasilitas/'.$fototerdahulu);

                $config['upload_path'] = './assets/images/fasilitas/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
                $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload

                $this->upload->initialize($config);
                if ($this->upload->do_upload('file_fasilitas')){
                    $gbr = $this->upload->data();
                    //Compress Image
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './assets/images/fasilitas/'.$gbr['file_name'];
                    $config['create_thumb'] = FALSE;
                    $config['maintain_ratio'] = FALSE;
                    $config['quality'] = '50%';
                    $config['width'] = 600;
                    $config['height'] = 400;
                    $config['new_image'] = './assets/images/fasilitas/'.$gbr['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();

                    $data['foto_fasilitas'] = $gbr['file_name'];
                }
            }
        
            if($this->form_validation->run() == TRUE)
            {
                $data['judul_fasilitas'] = $this->input->post('judul');
                $data['deskripsi'] = $this->input->post('deskripsi');
                $data['id_fasilitas'] = $this->input->post('id');
                $data['tanggal'] = date('d-m-Y H:i:s');
 
                if(IS_TEST === 'FALSE'){
                $this->m_fasilitas->add($data); 
                    $data['msg'] = 'Data sudah disimpan';
                 $this->session->set_flashdata('message', 'Data sudah disimpan');
                     $data['clear_text_box'] = 'TRUE';   
                      redirect(site_url() . '/admin2/fasilitas' , 'refresh');

                }else{
                    $data['msg'] = 'WARNING: READ ONLY !';
                    
                }            

            }else{
                $data['msg'] = validation_errors();
                
            }
        }
        
        $data['page_title'] = 'Fasilitas';       
        $url = site_url() . '/admin2/fasilitas/';
       
        
        $data['id_user']=$this->session->userdata('id_user');
        $data['user'] = $this->session->userdata('username');
        $data['namauser'] = $this->session->userdata('nama');
        $data['rs_fasilitas'] = $this->m_user->get($data['id_fasilitas']);
            /* Load Template */

        $id_fasilitas = (int)$this->uri->segment(3);
        $data['rs_fasilitas'] = $this->m_fasilitas->get($id_fasilitas);
        $this->load->view('template/header', $data);
        $this->load->view('admin/sidebar/sidebar-2', $data);
        $this->load->view('template/rightside',$data);
        $this->load->view('admin/fasilitas_edit', $data);
        $this->load->view('template/footer', $data);
    }

    function fasilitas_del($kode){
        
        if(IS_TEST === 'FALSE'){
            $this->m_fasilitas->remove($kode);
            $this->session->set_flashdata('message', 'Data telah berhasil dihapus');
        }else{
            $this->session->set_flashdata('message', 'WARNING: READ ONLY !');
        }
           redirect(site_url() . '/admin2/fasilitas/','reload');
    }




//     ----------------upload--------------------//
//     function do_upload($field = 'userfile', $new_name='') {

//     if ( ! isset($_FILES[$field])) {
//         $this->set_error('upload_no_file_selected');
//         return FALSE;
//     }
    
//     if ( ! $this->validate_upload_path()) {
//         return FALSE;
//     }
    
//     if ( ! is_uploaded_file($_FILES[$field]['tmp_name'])) {
//         $error = ( ! isset($_FILES[$field]['error'])) ? 4 : $_FILES[$field]['error'];
      
//         switch($error) {
//             case 1: // UPLOAD_ERR_INI_SIZE
//                 $this->set_error('upload_file_exceeds_limit');
//                 break;
//             case 2: // UPLOAD_ERR_FORM_SIZE
//                 $this->set_error('upload_file_exceeds_form_limit');
//                 break;
//             case 3: // UPLOAD_ERR_PARTIAL
//                 $this->set_error('upload_file_partial');
//                 break;
//             case 4: // UPLOAD_ERR_NO_FILE
//                 $this->set_error('upload_no_file_selected');
//                 break;
//             case 6: // UPLOAD_ERR_NO_TMP_DIR
//                 $this->set_error('upload_no_temp_directory');
//                 break;
//             case 7: // UPLOAD_ERR_CANT_WRITE
//                 $this->set_error('upload_unable_to_write_file');
//                 break;
//             case 8: // UPLOAD_ERR_EXTENSION
//                 $this->set_error('upload_stopped_by_extension');
//                 break;
//             default :
//                 $this->set_error('upload_no_file_selected');
//                 break;
//         }
      
//         return FALSE;
//     }
    
//     $this->file_temp = $_FILES[$field]['tmp_name'];
//     $this->file_size = $_FILES[$field]['size'];
//     $this->file_type = preg_replace("/^(.+?);.*$/", "\\1", $_FILES[$field]['type']);
//     $this->file_type = strtolower($this->file_type);
//     $this->file_ext  = $this->get_extension($_FILES[$field]['name']);
//     $new_name = md5(uniqid(mt_rand()));
//     // check if a name has been specified, if so set it
//     if ($new_name != '') {
//         $this->file_name = $this->_prep_filename($new_name . $this->file_ext);
//     }
//     else {
//         $this->file_name = $this->_prep_filename($_FILES[$field]['name']);
//     }
    
//     if ($this->file_size > 0) {
//       $this->file_size = round($this->file_size/1024, 2);
//     }
    
//     if ( ! $this->is_allowed_filetype()) {
//         $this->set_error('upload_invalid_filetype');
//         return FALSE;
//     }
    
//     if ( ! $this->is_allowed_filesize()) {
//         $this->set_error('upload_invalid_filesize');
//         return FALSE;
//     }
    
//     if ( ! $this->is_allowed_dimensions()) {
//         $this->set_error('upload_invalid_dimensions');
//         return FALSE;
//     }
    
//     $this->file_name = $this->clean_file_name($this->file_name);
    
//     if ($this->max_filename > 0) {
//         $this->file_name = $this->limit_filename_length($this->file_name, $this->max_filename);
//     }
    
//     if ($this->remove_spaces == TRUE) {
//         $this->file_name = preg_replace("/\s+/", "_", $this->file_name);
//     }
    
//     $this->orig_name = $this->file_name;
    
//     if ($this->overwrite == FALSE) {
//         $this->file_name = $this->set_filename($this->upload_path, $this->file_name);
      
//         if ($this->file_name === FALSE)
//         {
//             return FALSE;
//         }
//     }
    
//     if ( ! @copy($this->file_temp, $this->upload_path.$this->file_name)) {
//         if ( ! @move_uploaded_file($this->file_temp, $this->upload_path.$this->file_name))
//         {
//             $this->set_error('upload_destination_error');
//             return FALSE;
//         }
//     }
    
//     if ($this->xss_clean == TRUE) {
//         $this->do_xss_clean();
//     }
    
//     $this->set_image_properties($this->upload_path.$this->file_name);
    
//     return TRUE;

// }

    public function news()
    {
       /* if ($this->valid() ==  FALSE)
        {
            redirect('login', 'refresh');
        }
        else
        {*/
            $data['id_user']=$this->session->userdata('id_user');

            if(!empty($_POST))
            {
                $this->form_validation->set_rules('judul','judul','xss_clean|required');
                $this->form_validation->set_rules('isi','isi','trim|xss_clean|required');

                if(!empty($_FILES['gambar']['name']))
                {
                    $config['upload_path'] = './assets/images/news/';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
                    $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload

                    $this->upload->initialize($config);
                    if ($this->upload->do_upload('gambar')){
                        $gbr = $this->upload->data();
                        //Compress Image
                        $config['image_library'] = 'gd2';
                        $config['source_image'] = './assets/images/news/'.$gbr['file_name'];
                        $config['create_thumb'] = FALSE;
                        $config['maintain_ratio'] = FALSE;
                        $config['quality'] = '50%';
                        $config['width'] = 600;
                        $config['height'] = 400;
                        $config['new_image'] = './assets/images/news/'.$gbr['file_name'];
                        $this->load->library('image_lib', $config);
                        $this->image_lib->resize();

                        $data['gambar'] = $gbr['file_name'];
                    }
                }
            
                if($this->form_validation->run() == TRUE)
                {
                    $data['judul'] = $this->input->post('judul');
                    $data['isi'] = $this->input->post('isi');
                    $data['status_kolom_respon'] = 'Aktif';
                    $data['created_at'] = date('Y-m-d');
     
                    if(IS_TEST === 'FALSE'){
                    $this->m_news->add($data); 
                        $data['msg'] = 'Data sudah disimpan';
                     $this->session->set_flashdata('message', 'Data sudah disimpan');
                         $data['clear_text_box'] = 'TRUE';   
                          redirect(site_url() . '/admin2/news' , 'refresh');

                    }else{
                        $data['msg'] = 'WARNING: READ ONLY !';
                    }

                }else{
                    $data['msg'] = validation_errors();
                }
            }
            else
            {
                $data=array();
                $data['page_title'] = 'News';
                $url = site_url(). '/admin2/news/';

                $data['rs_news'] = $this->m_news->get();
                $data['id_dinas'] = $this->session->userdata('id_dinas');
                $data['id_user']=$this->session->userdata('id_user');
                $data['user'] = $this->session->userdata('username');
                $data['namauser'] = $this->session->userdata('nama');
                $data['rs_user'] = $this->m_user->get($data['id_user']);
                $data['link'] = 'admin2';
                
                $this->load->view('template/header', $data);
                $this->load->view('admin/sidebar/sidebar-2', $data);
                $this->load->view('template/rightside',$data);
                $this->load->view('admin/news', $data);
                $this->load->view('template/footer', $data);
            }
       // }
    }

    public function deletenews()
    {
        $id_news = (int)$this->uri->segment(3);
        $this->m_news->remove($id_news);
        redirect(site_url() . '/admin2/news/', 'reload');
    }

    public function hapusdetailnews()
    {
        $id_detailnews = (int)$this->uri->segment(3);
        $id_news = (int)$this->uri->segment(4);
        $this->m_detailnews->remove($id_detailnews);
        redirect(site_url() . '/admin2/detailnews/'.$id_news,'reload');
    }

    public function detailnews()
    {
        $data = array();

        $id_news = (int)$this->uri->segment(3);
        $data['id_user']=$this->session->userdata('id_user');

        if(!empty($_POST))
         {
            $data['respon'] = $this->input->post('respon');
            $data['id_news'] = $id_news;
            $data['tanggal_respon'] = date('Y-m-d');
            $data['status_respon'] = 'Aktif';

            $this->m_detailnews->add($data);   
            redirect(site_url() . '/admin2/detailnews/'.$id_news, 'refresh');
         }
       
        $data['page_title'] = 'News';       
        $url = site_url() . '/admin2/news/'; 
        $data['user'] = $this->session->userdata('username');
        $data['namauser'] = $this->session->userdata('nama');
        $data['rs_user'] = $this->m_user->get($data['id_user']);
            /* Load Template */

        $data['rs_news'] = $this->m_news->get($id_news);
        $data['rs_detailnews'] = $this->m_detailnews->getDetailNews($id_news);
        $data['link'] = 'admin2';

        $this->load->view('template/header', $data);
        $this->load->view('admin/sidebar/sidebar-2', $data);
        $this->load->view('template/rightside',$data);
        $this->load->view('admin/detailnews', $data);
        $this->load->view('template/footer', $data);
    }

    public function news_add()
    {
        /*if ($this->valid() ==  FALSE)
        {
            redirect('login', 'refresh');
        }

        /* Title Page */

        //$this->load->view('login');
        $data['id_user']=$this->session->userdata('id_user');

        if(!empty($_POST))
        {
            $this->form_validation->set_rules('judul','judul','xss_clean|required');
            $this->form_validation->set_rules('isi','isi','trim|xss_clean|required');

            if(!empty($_FILES['gambar']['name']))
            {
                $filename = $_FILES['gambar']['name'];

                $config['upload_path']          = './assets/images/news/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['file_name'] = $filename;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('gambar')){
                    $error = array('error' => $this->upload->display_errors());
                    // print_r($error);
                }
                else{
                    $dataaa = array('upload_data' => $this->upload->data());
                    $data['gambar'] = $filename;
                }
            }
        
            if($this->form_validation->run() == TRUE)
            {
                $data['judul'] = $this->input->post('judul');
                $data['isi'] = $this->input->post('isi');
                $data['created_at'] = date('Y-m-d H:i:s');
 
                if(IS_TEST === 'FALSE'){
                $this->m_news->add($data); 
                    $data['msg'] = 'Data sudah disimpan';
                 $this->session->set_flashdata('message', 'Data sudah disimpan');
                     $data['clear_text_box'] = 'TRUE';   
                      redirect(site_url() . '/admin2/news' , 'refresh');

                }else{
                    $data['msg'] = 'WARNING: READ ONLY !';
                }

            }else{
                $data['msg'] = validation_errors();
            }
        }
         
        /* Load Template */
        $data['page_name'] = 'News';
        $data['page_title'] = 'Add News';

        $data['user'] = $this->session->userdata('username');
        $data['namauser'] = $this->session->userdata('nama');
        $data['rs_user'] = $this->m_user->get($data['id_user']);

        $this->load->view('template/header', $data);
        $this->load->view('admin/sidebar/sidebar-2', $data);
        $this->load->view('template/rightside',$data);
        $this->load->view('admin/news_add', $data);
        $this->load->view('template/footer', $data);
        
    }

    function news_edit($kode){
        $data = array();
        
        if(!empty($_POST)){
            $this->form_validation->set_rules('judul','judul','xss_clean|required');
            $this->form_validation->set_rules('isi','isi','trim|xss_clean|required');

            if(!empty($_FILES['gambar']['name']))
            {
                $filename = $_FILES['gambar']['name'];

                $config['upload_path']          = './assets/images/news/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['file_name'] = $filename;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('gambar')){
                    $error = array('error' => $this->upload->display_errors());
                    // print_r($error);
                }
                else{
                    $dataaa = array('upload_data' => $this->upload->data());
                    $data['gambar'] = $filename;
                }
            }
        
            if($this->form_validation->run() == TRUE)
            {
                $data['judul'] = $this->input->post('judul');
                $data['isi'] = $this->input->post('isi');
                $data['id_news'] = $this->input->post('id');
 
                if(IS_TEST === 'FALSE'){
                $this->m_news->add($data); 
                    $data['msg'] = 'Data sudah disimpan';
                 $this->session->set_flashdata('message', 'Data sudah disimpan');
                     $data['clear_text_box'] = 'TRUE';   
                      redirect(site_url() . '/admin2/news' , 'refresh');

                }else{
                    $data['msg'] = 'WARNING: READ ONLY !';
                }            

            }else{
                $data['msg'] = validation_errors();
            }
        }
        
        $data['page_title'] = 'News';       
        $url = site_url() . '/admin2/news/';
       
        
        $data['id_user']=$this->session->userdata('id_user');
        $data['user'] = $this->session->userdata('username');
        $data['namauser'] = $this->session->userdata('nama');
        $data['rs_user'] = $this->m_user->get($data['id_user']);
            /* Load Template */

        $id_news = (int)$this->uri->segment(3);
        $data['rs_news'] = $this->m_news->get($id_news);
        $this->load->view('template/header', $data);
        $this->load->view('admin/sidebar/sidebar-2', $data);
        $this->load->view('template/rightside',$data);
        $this->load->view('admin/news_edit', $data);
        $this->load->view('template/footer', $data);
    }

    function news_del($kode){   
        if(IS_TEST === 'FALSE'){
            $this->m_news->remove($kode);
            $this->session->set_flashdata('message', 'Data telah berhasil dihapus');
        }else{
            $this->session->set_flashdata('message', 'WARNING: READ ONLY !');
        }
           redirect(site_url() . '/admin2/news/','reload');
    }

    function viewnews(){
        $data=array();
        $data['page_title'] = 'News';
        $url = site_url(). '/admin2/viewnews/';
        $data['rs_news'] = $this->m_news->get();

        $data['id_dinas'] = $this->session->userdata('id_dinas');
        $data['id_user']=$this->session->userdata('id_user');
        $data['user'] = $this->session->userdata('username');
        $data['namauser'] = $this->session->userdata('nama');
        $data['rs_user'] = $this->m_user->get($data['id_user']);
        $data['link'] = 'admin2';
        
        $this->load->view('template/header', $data);
        $this->load->view('admin/sidebar/sidebar-2', $data);
        $this->load->view('template/rightside',$data);
        $this->load->view('admin/viewnews', $data);
        $this->load->view('template/footer', $data);
    }

    function nonaktifrespon()
    {
        $data = array();
        $id_detailnews = (int)$this->uri->segment(3);
        $id_news = (int)$this->uri->segment(4);

        if($this->uri->segment(5) == 'Aktif')
        {
            $data['status_respon'] = 'Tidak Aktif';
        }
        else
        {
            $data['status_respon'] = 'Aktif';
        }

        $data['id_detailnews'] = $id_detailnews;
       
        $this->m_detailnews->updaterespon($data);
        redirect(site_url() . '/admin2/detailnews/'.$id_news,'reload');
    }

    function matikanrespon()
    {
        $data = array();
        $id_news = (int)$this->uri->segment(3);
        $data['id_news'] = $id_news;
        
        if($this->uri->segment(4) == 'Aktif')
        {
            $data['status_kolom_respon'] = 'Tidak Aktif';
        }
        else
        {
            $data['status_kolom_respon'] = 'Aktif';
        }
       
        $this->m_news->updaterespon($data, $id_news);
        redirect(site_url() . '/admin2/news','reload');
    }

    function sayembara(){
        $data = array();
        $tgl=date('Y-m-d');
        $cek=$this->m_quiz->cekJawabanUser($this->session->userdata('id_user'),$tgl);

        $data['page_title'] = 'sayembara';       
        $url = base_url() . 'admin2/sayembara/';
        $tgl=date('Y-m-d');
        $data['id_user']=$this->session->userdata('id_user');
        $data['user'] =  $this->session->userdata('username');
        $data['namauser'] = $this->session->userdata('nama');
        $data['rs_user'] = $this->m_member->get($data['id_user']);
        $data['id_role'] = $this->session->userdata('id_role');
       $data['rs_quiz'] = $this->m_quiz->get_question_day($tgl);
        $data['rs_opsi'] = $this->m_quiz->get_option($data['rs_quiz']['qid']);
        $this->load->view('template/header', $data);
        $this->load->view('admin/sidebar/sidebar-2', $data);
        $this->load->view('template/rightside',$data);
         if($cek>0){
            $data['rs_quiz'] = $this->m_quiz->hasilJawabanUser($data['id_user'],$tgl);
            $this->load->view('admin/sayembara_hasil', $data);
            
        }else{

             $this->load->view('admin/quiz_view', $data);
        }
       
        $this->load->view('template/footer', $data);
    
        
    }

    function sayembara_add()
     {
       
        $data = array();
           if(!empty($_POST)){
            $this->form_validation->set_rules('opsi','Opsi','xss_clean|required');

            $tgl=date("Y-m-d");
            if($this->form_validation->run() == TRUE)
            {
                $qid=$this->input->post('qid');
                $rs_jwb  = $this->m_quiz->getRightAnswer($qid);
                $opsi = $this->input->post('opsi');
               
                $data['id_user']=$this->session->userdata('id_user');
                $data['qid']=$qid;
                $data['date_answer']=$tgl;
               
                if($rs_jwb['choice']==$opsi){
                    $data['correct']=1;
                }
                else{
                    $data['correct']=0;
                }

                if(IS_TEST === 'FALSE'){
                $this->m_quiz->saveAnswer($data); 
                    $data['msg'] = 'Data sudah disimpan';
                 $this->session->set_flashdata('message', 'Data sudah disimpan');
                     $data['clear_text_box'] = 'TRUE';   
                      redirect(base_url() . 'admin2/sayembara' , 'refresh');

                }else{
                    $data['msg'] = 'WARNING: READ ONLY !';
                }
            
                

            }else{
                $data['msg'] = validation_errors();
            }
        }
        $data['page_title'] = 'sayembara';       
        $url = base_url() . 'admin2/sayembara/';
        $tgl=date('Y-m-d');
        $data['id_user']=$this->session->userdata('id_user');
        $data['user'] =  $this->session->userdata('username');
        $data['namauser'] = $this->session->userdata('nama');
        $data['rs_user'] = $this->m_user->get($data['id_user']);
        $data['id_role'] = $this->session->userdata('id_role');
        $data['rs_quiz'] = $this->m_quiz->get_question_day($tgl);
       
        $this->load->view('template/header', $data);
        $this->load->view('admin/sidebar/sidebar-2', $data);
        $this->load->view('template/rightside',$data);
        $this->load->view('admin/quiz_view', $data);
        $this->load->view('template/footer', $data);
    
        
    }

    // function sayembara()
    // {
    //     $data = array();
        
    //     $tgl=date('Y-m-d');
    //     $cek=$this->m_quiz->cekJawabanUser($this->session->userdata('id_user'),$tgl);

    //     $data['page_title'] = 'sayembara';       
    //     $url = site_url() . '/admin2/sayembara/';
    //     $tgl=date('Y-m-d');
    //     $data['id_user']=$this->session->userdata('id_user');
    //     $data['user'] =  $this->session->userdata('username');
    //     $data['namauser'] = $this->session->userdata('nama');
    //     $data['rs_user'] = $this->m_user->get($data['id_user']);
    //     $data['id_role'] = $this->session->userdata('id_role');
    //     $data['rs_quiz'] = $this->m_quiz->get_question_day($tgl);
    //     $data['rs_opsi'] = $this->m_quiz->get_soal2();
    //     $this->load->view('template/header', $data);
    //     $this->load->view('admin/sidebar/sidebar-2', $data);
    //     $this->load->view('template/rightside',$data);
    //     // if($cek>0){
    //     //     $data['rs_quiz'] = $this->m_quiz->hasilJawabanUser($data['id_user'],$tgl);
    //     //     $this->load->view('admin/sayembara_hasil', $data);
            
    //     // }else{

    //     //      $this->load->view('admin/quiz_view', $data);
    //     // }

    //     // foreach($data['rs_opsi'] as $soalzzz => $ccc){
    //     //     $data['rs_choice'] = $this->m_quiz->get_choice($ccc['qid']);
    //     // }

    //     $this->load->view('admin/quiz_view', $data);
       
    //     $this->load->view('template/footer', $data);
    // }
      
    public function profile()
    {
       /* if ($this->valid() ==  FALSE)
        {
            redirect('login', 'refresh');
        }
        else
        {
            /* Title Page */
            $data['page_name'] = 'Profile';
            $data['page_title'] = 'Data Profile';

            $data['id_user']=$this->session->userdata('id_user');
            $data['user'] = $this->session->userdata('username');
            $data['namauser'] = $this->session->userdata('nama');
            $data['rs_user'] = $this->m_user->get($data['id_user']);
                /* Load Template */
            $data['rs_profile'] = $this->m_profile->get();
            $data['link'] = 'admin2';
            $this->load->view('template/header', $data);
            $this->load->view('admin/sidebar/sidebar-2', $data);
            $this->load->view('template/rightside',$data);
            $this->load->view('admin/profile', $data);
            $this->load->view('template/footer', $data);
       // }
    }

    public function sayembara_hasil()
    {
        $data = array();
            
        $data['page_title'] = 'sayembara';       
        $url = base_url() . 'admin2/sayembara_hasil/';
        $tgl=date('Y-m-d');
        $data['id_user']=$this->session->userdata('id_user');
        $data['user'] = $this->session->userdata('username');
        $data['namauser'] = $this->session->userdata('nama');
        $data['rs_user'] = $this->m_user->get($data['id_user']);
        $data['rs_quiz'] = $this->m_quiz->hasilJawabanUser($data['id_user'],$tgl);
       
        $this->load->view('template/header', $data);
        $this->load->view('admin/sidebar/sidebar-2', $data);
        $this->load->view('template/rightside',$data);
        $this->load->view('admin/sayembara_hasil', $data);
        $this->load->view('template/footer', $data);
    }

    public function sayembara_timeout()
    {
        $data = array();
           
           // $this->form_validation->set_rules('opsi','Opsi','xss_clean|required');

            $tgl=date("Y-m-d");
          //  if($this->form_validation->run() == TRUE)
           // {
               // $qid=$this->input->post('qid');
                //$rs_jwb  = $this->m_quiz->getRightAnswer($qid);
               // $opsi = $this->input->post('opsi');
               
                $data['id_user']=$this->session->userdata('id_user');
                $data['qid']=0;//$qid;
                $data['date_answer']=$tgl;
               
               // if($rs_jwb['choice']==$opsi){
                    $data['correct']=3;
               // }
               // else{
               //     $data['correct']=0;
               // }

                if(IS_TEST === 'FALSE'){
                $this->m_quiz->saveAnswer($data); 
                    $data['msg'] = 'Data sudah disimpan';
                 $this->session->set_flashdata('message', 'Data sudah disimpan');
                     $data['clear_text_box'] = 'TRUE';   
                      redirect(site_url() . '/admin2/sayembara_hasil' , 'refresh');

                }else{
                    $data['msg'] = 'WARNING: READ ONLY !';
                }
            
                

           // }else{
           //     $data['msg'] = validation_errors();
            //}
        
        $data['page_title'] = 'sayembara';       
        $url = site_url() . '/admin2/sayembara/';
        $tgl=date('Y-m-d');
        $data['id_user']=$this->session->userdata('id_user');
        $data['user'] =  $this->session->userdata('username');
        $data['namauser'] = $this->session->userdata('nama');
        $data['rs_user'] = $this->m_user->get($data['id_user']);
        $data['id_role'] = $this->session->userdata('id_role');
        $data['rs_quiz'] = $this->m_quiz->get_question_day($tgl);
       
        $this->load->view('template/header', $data);
        $this->load->view('admin/sidebar/sidebar-2', $data);
        $this->load->view('template/rightside',$data);
        $this->load->view('admin/sayembara_hasil', $data);
        $this->load->view('template/footer', $data);
    }

    public function lihat_profil()
    {
        /*if ($this->valid() ==  FALSE)
        {
            redirect('login', 'refresh');
        }
        else
        {
            /* Title Page */
            $data['page_name'] = 'Profile';
            $data['page_title'] = 'Data Profile';

            $data['id_user']=$this->session->userdata('id_user');
            $data['user'] = $this->session->userdata('username');
            $data['namauser'] = $this->session->userdata('nama');
            $data['rs_user'] = $this->m_user->get($data['id_user']);
                /* Load Template */
            $data['rs_profile'] = $this->m_profile->get();
            $data['link'] = 'admin2';
            $this->load->view('template/header', $data);
            $this->load->view('admin/sidebar/sidebar-2', $data);
            $this->load->view('template/rightside',$data);
            $this->load->view('admin/lihat_profile', $data);
            $this->load->view('template/footer', $data);
       // }
    }

   
    // ------------------DINAS---------------------//
      function dinas(){
         $data = array();
        
        $data['page_title'] = 'Dinas';       
        $url = site_url() . '/admin2/dinas/';
       // $res = $this->m_kategori->num_page();
        //$per_page = 20;
  
       
        $data['id_user']=$this->session->userdata('id_user');
        $data['user'] = $this->session->userdata('username');
        $data['namauser'] = $this->session->userdata('nama');
        $data['rs_user'] = $this->m_user->get($data['id_user']);
            /* Load Template */
        $data['rs_dinas'] = $this->m_dinas->get();
        $this->load->view('template/header', $data);
        $this->load->view('admin/sidebar/sidebar-2', $data);
        $this->load->view('template/rightside',$data);
        $this->load->view('admin/dinas', $data);
        $this->load->view('template/footer', $data);
    }

    
    function dinas_add(){
        $data = array();
        
        if(!empty($_POST)){
               $this->form_validation->set_rules('nama','Nama','xss_clean|required');
            $this->form_validation->set_rules('alamat','alamat','trim|xss_clean|required');
            $this->form_validation->set_rules('no_telepon','No Telepon','trim|xss_clean');
        
            if($this->form_validation->run() == TRUE)
            {
                $data['nama_dinas'] = $this->input->post('nama');
                $data['alamat_dinas'] = $this->input->post('alamat');
                $data['no_telepon'] = $this->input->post('no_telepon');
             
 
                if(IS_TEST === 'FALSE'){
                $this->m_dinas->add($data); 
                    $data['msg'] = 'Data sudah disimpan';
                 $this->session->set_flashdata('message', 'Data sudah disimpan');
                     $data['clear_text_box'] = 'TRUE';   
                      redirect(site_url() . '/admin2/dinas' , 'refresh');

                }else{
                    $data['msg'] = 'WARNING: READ ONLY !';
                }
            
                

            }else{
                $data['msg'] = validation_errors();
            }
        }
        $data['page_title'] = 'Dinas';       
        $url = site_url() . '/admin2/dinas/';
     
        $data['id_user']=$this->session->userdata('id_user');
        $data['user'] = $this->session->userdata('username');
        $data['namauser'] = $this->session->userdata('nama');
        $data['rs_user'] = $this->m_user->get($data['id_user']);
            /* Load Template */
        $data['rs_dinas'] = $this->m_dinas->get();
        $this->load->view('template/header', $data);
        $this->load->view('admin/sidebar/sidebar-2', $data);
        $this->load->view('template/rightside',$data);
        $this->load->view('admin/dinas_add', $data);
        $this->load->view('template/footer', $data);
    }

      function dinas_edit($kode){
        $data = array();
        
        if(!empty($_POST)){
            $this->form_validation->set_rules('nama','Nama','xss_clean|required');
            $this->form_validation->set_rules('alamat','alamat','trim|xss_clean|required');
            $this->form_validation->set_rules('no_telepon','No Telepon','trim|xss_clean');
        
            if($this->form_validation->run() == TRUE)
            {
                $data['nama_dinas']   = $this->input->post('nama');
                $data['alamat_dinas'] = $this->input->post('alamat');
                $data['no_telepon']   = $this->input->post('no_telepon');
                $data['id_dinas'] = $this->input->post('id');
 
                if(IS_TEST === 'FALSE'){
                $this->m_dinas->add($data); 
                    $data['msg'] = 'Data sudah disimpan';
                 $this->session->set_flashdata('message', 'Data sudah diubah');
                     $data['clear_text_box'] = 'TRUE';   
                      redirect(site_url() . '/admin2/dinas' , 'refresh');

                }else{
                    $data['msg'] = 'WARNING: READ ONLY !';
                }
            
                

            }else{
                $data['msg'] = validation_errors();
            }
        }
        $data['page_title'] = 'Dinas';       
        $url = site_url() . '/admin2/dinas/';
       
        
        $data['id_user']=$this->session->userdata('id_user');
        $data['user'] = $this->session->userdata('username');
        $data['namauser'] = $this->session->userdata('nama');
        $data['rs_user'] = $this->m_user->get($data['id_user']);
            /* Load Template */

        $id_dinas=(int)$this->uri->segment(3);
        $data['rs_dinas'] = $this->m_dinas->get($id_dinas);
        $this->load->view('template/header', $data);
        $this->load->view('admin/sidebar/sidebar-2', $data);
        $this->load->view('template/rightside',$data);
        $this->load->view('admin/dinas_edit', $data);
        $this->load->view('template/footer', $data);
    } 

     function dinas_del($kode){
        
        if(IS_TEST === 'FALSE'){
            $this->m_dinas->remove($kode);
            $this->session->set_flashdata('message', 'Data telah berhasil dihapus');
        }else{
            $this->session->set_flashdata('message', 'WARNING: READ ONLY !');
        }
           redirect(site_url() . '/admin2/dinas/','reload');
    }

    // --------------GELERI------------------//
  
    function galeri(){
        $data = array();

        $data['id_user'] = $this->session->userdata('id_user');

        if(!empty($_POST))
        {
            if(!empty($_FILES['video_galeri']))
            {
                $config['upload_path'] = './assets/images/galeri/video/';
                $config['allowed_types'] = 'avi|flv|wmv|mp3|mp4';
                $config['encrypt_name'] = TRUE;

                $this->upload->initialize($config);
                if ($this->upload->do_upload('video_galeri')){
                    $vdo = $this->upload->data();
                    $data['video'] = $vdo['file_name'];
                }

                $data['pilihan'] = $this->input->post('pilih');
                $data['link_embed'] = $this->input->post('link_embed');

                if(IS_TEST === 'FALSE'){
                $this->m_galeri->updateVideo($data); 
                    $data['msg'] = 'Data sudah disimpan';
                 $this->session->set_flashdata('message', 'Data sudah disimpan');
                     $data['clear_text_box'] = 'TRUE';   
                      redirect(site_url() . '/admin2/galeri' , 'refresh');

                }else{
                    $data['msg'] = 'WARNING: READ ONLY !';
                }
            }
        }

        if(!empty($_FILES['foto_galeri']))
        {
            $config['upload_path'] = './assets/images/galeri/gambar/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
            $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload

            $this->upload->initialize($config);
            if ($this->upload->do_upload('foto_galeri')){
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/images/galeri/gambar/'.$gbr['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['quality'] = '50%';
                $config['width'] = 600;
                $config['height'] = 400;
                $config['new_image'] = './assets/images/galeri/gambar/'.$gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $data['foto_galeri'] = $gbr['file_name'];
                $this->m_galeri->addGambar($data); 
            }
        }
        
        
        $data['page_title'] = 'Galeri';       
        $url = site_url() . '/admin2/galeri/';
    
        $data['user'] = $this->session->userdata('username');
        $data['namauser'] = $this->session->userdata('nama');
        $data['rs_user'] = $this->m_user->get($data['id_user']);
            /* Load Template */
        $data['rs_galerigambar'] = $this->m_galeri->getGambar();
        $data['rs_galerivideo'] = $this->m_galeri->getVideo();
        $data['link'] = 'admin2';

        $this->load->view('template/header', $data);
        $this->load->view('admin/sidebar/sidebar-2', $data);
        $this->load->view('template/rightside',$data);
        $this->load->view('admin/galeri', $data);
        $this->load->view('template/footer', $data);
        
    }

    function deletevideo($kode)
    {
        if(IS_TEST === 'FALSE'){
            $this->m_galeri->removeVideo($kode);
            $this->session->set_flashdata('message', 'Data telah berhasil dihapus');
        }else{
            $this->session->set_flashdata('message', 'WARNING: READ ONLY !');
        }
           redirect(site_url() . '/admin2/galeri/','reload');   
    }

    function galeri_gambar_del($kode)
    {
        if(IS_TEST === 'FALSE'){
            $this->m_galeri->remove($kode);
            $this->session->set_flashdata('message', 'Data telah berhasil dihapus');
        }else{
            $this->session->set_flashdata('message', 'WARNING: READ ONLY !');
        }
           redirect(site_url() . '/admin2/galeri/','reload');   
    }

    function viewgaleri()
    {
        $data = array();
        
        $data['page_title'] = 'Galeri';       
        $url = site_url() . '/admin2/galeri/';
    
        $data['id_user']=$this->session->userdata('id_user');
        $data['user'] = $this->session->userdata('username');
        $data['namauser'] = $this->session->userdata('nama');
        $data['rs_user'] = $this->m_user->get($data['id_user']);

            /* Load Template */
        $data['rs_galerigambar'] = $this->m_galeri->getGambar();
        $data['rs_galerivideo'] = $this->m_galeri->getVideo();
        
        $this->load->view('template/header', $data);
        $this->load->view('admin/sidebar/sidebar-2', $data);
        $this->load->view('template/rightside',$data);
        $this->load->view('admin/viewgaleri', $data);
        $this->load->view('template/footer', $data);   
    }

     function event(){
        $data = array();
        
        $data['page_title'] = 'Galeri';       
        $url = site_url() . '/admin2/event/';
    
        $data['id_user']=$this->session->userdata('id_user');
        $data['user'] =  $this->session->userdata('username');
        $data['namauser'] = $this->session->userdata('nama');
        $data['rs_user'] = $this->m_user->get($data['id_user']);
        $data['id_role'] = $this->session->userdata('id_role');
 
        $data['rs_event'] = $this->m_event->getBaru($data['id_user']);
        $data['link'] = 'admin2';
        $this->load->view('template/header', $data);
        $this->load->view('admin/sidebar/sidebar-2', $data);
        $this->load->view('template/rightside',$data);
        $this->load->view('admin/event', $data);
        $this->load->view('template/footer', $data);        
    }

     function event_add(){
        $data = array();
        
        if(!empty($_POST)){
            $this->form_validation->set_rules('nama','Nama Event','xss_clean|required');
            $this->form_validation->set_rules('keterangan','Keterangan','trim|xss_clean|required');
            $this->form_validation->set_rules('tgl_event','Tanggal Event','trim|xss_clean');
            $this->form_validation->set_rules('lokasi','Lokasi Event','trim|xss_clean');
 
            if($this->form_validation->run() == TRUE)
            {
                $data['event_title'] = $this->input->post('nama');
                $data['event_description'] = $this->input->post('keterangan');
                $data['date_event'] = date('Y-m-d');
                $data['start_date'] =$this->input->post('tgl_event');
                $data['event_location'] = $this->input->post('lokasi');
              //  $data['end_date'] = $this->input->post('tgl_selesai');
                $data['id_dinas'] = $this->session->userdata('id_role');
                $data['id_user'] = $this->session->userdata('id_user');
                $data['status'] = 'Belum';

                if(IS_TEST === 'FALSE'){
                    $this->m_event->add($data); 
                    $data['msg'] = 'Data sudah disimpan';
                    $this->session->set_flashdata('message', 'Data sudah disimpan');
                    $data['clear_text_box'] = 'TRUE';   
                    redirect(site_url() . '/admin2/event' , 'refresh');

                }else{
                    $data['msg'] = 'WARNING: READ ONLY !';
                }
            
                

            }else
            {
                $data['msg'] = validation_errors();
            }
        }
        $data['page_title'] = 'Dinas';       
        $url = site_url() . '/admin2/dinas/';

        
        $data['id_user']=$this->session->userdata('id_user');
        $data['user'] = $this->session->userdata('username');
        $data['namauser'] = $this->session->userdata('nama');
        $data['rs_user'] = $this->m_user->get($data['id_user']);
        $data['rs_dinas'] = $this->m_dinas->get();
              /* Load Template */
        $this->load->view('template/header', $data);
        $this->load->view('admin/sidebar/sidebar-2', $data);
        $this->load->view('template/rightside',$data);
        $this->load->view('admin/event_add', $data);
        $this->load->view('template/footer', $data);
    }

    public function event_edit()
    {
        $data = array();
        
        if(!empty($_POST)){
            $this->form_validation->set_rules('nama','Nama Event','xss_clean|required');
            $this->form_validation->set_rules('keterangan','Keterangan','trim|xss_clean|required');
            $this->form_validation->set_rules('tgl_event','Tanggal Event','trim|xss_clean');
            $this->form_validation->set_rules('lokasi','Lokasi Event','trim|xss_clean');
 
            if($this->form_validation->run() == TRUE)
            {
                $data['event_title'] = $this->input->post('nama');
                $data['event_description'] = $this->input->post('keterangan');
                $data['start_date'] =$this->input->post('tgl_event');
                $data['event_location'] = $this->input->post('lokasi');
              //  $data['end_date'] = $this->input->post('tgl_selesai');
                $data['id_dinas'] = $this->session->userdata('id_role');
                $data['id'] = $this->input->post('id');

                if(IS_TEST === 'FALSE'){
                    $this->m_event->add($data); 
                    $data['msg'] = 'Data sudah disimpan';
                    $this->session->set_flashdata('message', 'Data sudah disimpan');
                    $data['clear_text_box'] = 'TRUE';   
                    redirect(site_url() . '/admin2/event' , 'refresh');

                }else{
                    $data['msg'] = 'WARNING: READ ONLY !';
                }
            
                

            }else{
                $data['msg'] = validation_errors();
                echo $data['msg'];
            }
        }
        $data['page_title'] = 'Dinas';       
        $url = site_url() . '/admin2/dinas/';

        
        $data['id_user']=$this->session->userdata('id_user');
        $data['user'] = $this->session->userdata('username');
        $data['namauser'] = $this->session->userdata('nama');
        $data['rs_user'] = $this->m_user->get($data['id_user']);
        $data['rs_dinas'] = $this->m_dinas->get();
        $id_event = (int)$this->uri->segment(3);
        $data['rs_event'] = $this->m_event->getedit($id_event);

              /* Load Template */
        $this->load->view('template/header', $data);
        $this->load->view('admin/sidebar/sidebar-2', $data);
        $this->load->view('template/rightside',$data);
        $this->load->view('admin/event_edit', $data);
        $this->load->view('template/footer', $data);   
    }

    function selesaikanevent()
    {
        $data = array();
        
        if(!empty($_POST)){
            
             if(!empty($_FILES['gambar_event']['name']))
            {
                $config['upload_path'] = './assets/images/events/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
                $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload

                $this->upload->initialize($config);
                if ($this->upload->do_upload('gambar_event')){
                    $gbr = $this->upload->data();
                    //Compress Image
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './assets/images/events/'.$gbr['file_name'];
                    $config['create_thumb'] = FALSE;
                    $config['maintain_ratio'] = FALSE;
                    $config['quality'] = '50%';
                    $config['width'] = 600;
                    $config['height'] = 400;
                    $config['new_image'] = './assets/images/events/'.$gbr['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();

                    $data['foto'] = $gbr['file_name'];
                }
            }
 
            $data['event_title'] = $this->input->post('nama');
            $data['event_description'] = $this->input->post('keterangan');
            $data['start_date'] =$this->input->post('tgl_event');
            $data['event_location'] = $this->input->post('lokasi');
            $data['end_date'] = date('Y-m-d');
            $data['status'] = 'Selesai';
            $data['id_dinas'] = $this->session->userdata('id_role');
            $data['id'] = $this->input->post('id');

            if(IS_TEST === 'FALSE'){
                $this->m_event->add($data); 
                $data['msg'] = 'Data sudah disimpan';
                $this->session->set_flashdata('message', 'Data sudah disimpan');
                $data['clear_text_box'] = 'TRUE';   
                redirect(site_url() . '/admin2/doneevent' , 'refresh');

            }else{
                $data['msg'] = 'WARNING: READ ONLY !';
            }
        }
        $data['page_title'] = 'Event Yang Terlaksana';       
        $url = site_url() . '/admin2/event/';

        
        $data['id_user']=$this->session->userdata('id_user');
        $data['user'] = $this->session->userdata('username');
        $data['namauser'] = $this->session->userdata('nama');
        $data['rs_user'] = $this->m_user->get($data['id_user']);
        $data['rs_dinas'] = $this->m_dinas->get();
        $id_event = (int)$this->uri->segment(3);
        $data['rs_event'] = $this->m_event->getedit($id_event);

              /* Load Template */
        $this->load->view('template/header', $data);
        $this->load->view('admin/sidebar/sidebar-2', $data);
        $this->load->view('template/rightside',$data);
        $this->load->view('admin/event_selesaikan', $data);
        $this->load->view('template/footer', $data);
    }

    function event_del($kode){
        
        if(IS_TEST === 'FALSE'){
            $this->m_event->remove($kode);
            $this->session->set_flashdata('message', 'Data telah berhasil dihapus');
        }else{
            $this->session->set_flashdata('message', 'WARNING: READ ONLY !');
        }
           redirect(site_url() . '/admin2/event/','reload');
    }

    function nowevent()
    {
        $data=array();
        $data['page_title'] = 'Event';
        $tgl=date('Y-m-d');
        $warna='#fff';
        $url = site_url(). '/admin2/nowevent/';
        $data['id_role'] = $this->session->userdata('id_role');
       // $data['now_event'] = $this->m_event->getNowEvent();
       // $data['next_event'] = $this->m_event->getNextEvent();
        
        $data['id_dinas'] = $this->session->userdata('id_dinas');
        $data['id_user']=$this->session->userdata('id_user');
        $data['user'] = $this->session->userdata('username');
        $data['namauser'] = $this->session->userdata('nama');
        $data['rs_user'] = $this->m_user->get($data['id_user']);
        $data['event'] = $this->m_event->getNowEvent($data['id_user']);
        $data['link'] = 'admin2';
           
        $this->load->view('template/header', $data);
        $this->load->view('admin/sidebar/sidebar-2', $data);
        $this->load->view('template/rightside',$data);
        $this->load->view('admin/event_now', $data);
        $this->load->view('template/footer', $data);  
    }

    function nextevent()
    {
        $data=array();
        $data['page_title'] = 'Event';
        $tgl=date('Y-m-d');
        $warna='#fff';
        $url = site_url(). '/admin2/nextevent/';
        $data['id_role'] = $this->session->userdata('id_role');
       // $data['now_event'] = $this->m_event->getNowEvent();
       // $data['next_event'] = $this->m_event->getNextEvent();
        
        $data['id_dinas'] = $this->session->userdata('id_dinas');
        $data['id_user']=$this->session->userdata('id_user');
        $data['user'] = $this->session->userdata('username');
        $data['namauser'] = $this->session->userdata('nama');
        $data['rs_user'] = $this->m_user->get($data['id_user']);
        $data['next_event'] = $this->m_event->getNextEvent($data['id_user']);
        $data['selesaikan'] = 'ya';
        $data['link'] = 'admin2';
        
        $this->load->view('template/header', $data);
        $this->load->view('admin/sidebar/sidebar-2', $data);
        $this->load->view('template/rightside',$data);
        $this->load->view('admin/event_next', $data);
        $this->load->view('template/footer', $data);  
    }

    function nextevent2()
    {
        $data=array();
        $data['page_title'] = 'Event';
        $tgl=date('Y-m-d');
        $warna='#fff';
        $url = site_url(). '/admin2/nextevent/';
        $data['id_role'] = $this->session->userdata('id_role');
       // $data['now_event'] = $this->m_event->getNowEvent();
       // $data['next_event'] = $this->m_event->getNextEvent();
        $id_user = (int)$this->uri->segment(3);
        
        $data['id_dinas'] = $this->session->userdata('id_dinas');
        $data['id_user']=$this->session->userdata('id_user');
        $data['user'] = $this->session->userdata('username');
        $data['namauser'] = $this->session->userdata('nama');
        $data['rs_user'] = $this->m_user->get($data['id_user']);
        $data['next_event'] = $this->m_event->getNextEvent($id_user);
        $data['selesaikan'] = 'tidak';
        $data['link'] = 'admin2';
        
        $this->load->view('template/header', $data);
        $this->load->view('admin/sidebar/sidebar-2', $data);
        $this->load->view('template/rightside',$data);
        $this->load->view('admin/event_next', $data);
        $this->load->view('template/footer', $data);  
    }

    function prevevent()
    {
        $data=array();
        $data['page_title'] = 'Event';
        $tgl=date('Y-m-d');
        $warna='#fff';
        $url = site_url(). '/admin2/prevevent/';
        $data['id_role'] = $this->session->userdata('id_role');
       // $data['now_event'] = $this->m_event->getNowEvent();
       // $data['next_event'] = $this->m_event->getNextEvent();
        $data['prev_event'] = $this->m_event->getLastEvent();
        
        $data['id_dinas'] = $this->session->userdata('id_dinas');
        $data['id_user']=$this->session->userdata('id_user');
        $data['user'] = $this->session->userdata('username');
        $data['namauser'] = $this->session->userdata('nama');
        $data['rs_user'] = $this->m_user->get($data['id_user']);
        
        $this->load->view('template/header', $data);
        $this->load->view('admin/sidebar/sidebar-2', $data);
        $this->load->view('template/rightside',$data);
        $this->load->view('admin/event_prev', $data);
        $this->load->view('template/footer', $data);
    }

    function iconkegiatanterlaksana()
    {
       /* if ($this->valid() ==  FALSE)
        {
            redirect('login', 'refresh');
        }
        else
        {*/

            if(!empty($_POST))
            {
                $keyword = $this->input->post('keyword');

                 $data['rs_member'] = $this->m_member->getMember($keyword);
            }
            else{
                 $data['rs_member'] = $this->m_member->getMember();
            }
            /* Title Page */
         
            $data['page_name'] = 'home';
            $data['page_title'] = 'Welcome';
            //$this->load->view('login');
            $data['id_user']=$this->session->userdata('id_user');
            $data['user'] = $this->session->userdata('username');
            $data['namauser'] = $this->session->userdata('nama');
            $data['rs_user'] = $this->m_user->get($data['id_user']);
            $data['rs_sponsor'] = $this->m_sponsor->get();
            $data['rs_marque'] = $this->m_slide->getMarquee('1');
            $data['rs_slide'] = $this->m_slide->get();
            $data['link'] = 'admin2';
                /* Load Template */

            $this->load->view('template/header', $data);
            $this->load->view('admin/sidebar/sidebar-2', $data);
            $this->load->view('template/rightside',$data);
            $this->load->view('admin/icon_kegiatanterlaksana', $data);
            $this->load->view('template/footer', $data);
       // }
    }

    function icongaleri()
    {
        $data = array();
        
        $data['page_title'] = 'Galeri';       
        $url = site_url() . '/admin2/galeri/';
    
        $data['id_user']=$this->session->userdata('id_user');
        $data['user'] = $this->session->userdata('username');
        $data['namauser'] = $this->session->userdata('nama');
        $data['rs_user'] = $this->m_user->get($data['id_user']);

            /* Load Template */
        $data['rs_galerigambar'] = $this->m_galeri->getGambar();
        $data['rs_galerivideo'] = $this->m_galeri->getVideo($this->session->userdata('id_user'));
        
        $this->load->view('template/header', $data);
        $this->load->view('admin/sidebar/sidebar-2', $data);
        $this->load->view('template/rightside',$data);
        $this->load->view('admin/icon_galeri', $data);
        $this->load->view('template/footer', $data);
    }

    function iconjadwalkegiatan()
    {
       /* if ($this->valid() ==  FALSE)
        {
            redirect('login', 'refresh');
        }
        else
        {*/

            if(!empty($_POST))
            {
                $keyword = $this->input->post('keyword');

                 $data['rs_member'] = $this->m_member->getMember($keyword);
            }
            else{
                 $data['rs_member'] = $this->m_member->getMember();
            }
            /* Title Page */
         
            $data['page_name'] = 'home';
            $data['page_title'] = 'Welcome';
            //$this->load->view('login');
            $data['id_user']=$this->session->userdata('id_user');
            $data['user'] = $this->session->userdata('username');
            $data['namauser'] = $this->session->userdata('nama');
            $data['rs_user'] = $this->m_user->get($data['id_user']);
            $data['rs_sponsor'] = $this->m_sponsor->get();
            $data['rs_marque'] = $this->m_slide->getMarquee('1');
            $data['rs_slide'] = $this->m_slide->get();
            $data['link'] = 'admin2';
                /* Load Template */

            $this->load->view('template/header', $data);
            $this->load->view('admin/sidebar/sidebar-2', $data);
            $this->load->view('template/rightside',$data);
            $this->load->view('admin/icon_jadwalkegiatan', $data);
            $this->load->view('template/footer', $data);
       // }  
    }

    function doneevent()
    {
        $data=array();
        $data['page_title'] = 'Event';
        $tgl=date('Y-m-d');
        $warna='#fff';
        $url = site_url(). '/admin2/doneevent/';
        $data['id_role'] = $this->session->userdata('id_role');
       // $data['now_event'] = $this->m_event->getNowEvent();
       // $data['next_event'] = $this->m_event->getNextEvent();
        
        $data['id_dinas'] = $this->session->userdata('id_dinas');
        $data['id_user']=$this->session->userdata('id_user');
        $data['user'] = $this->session->userdata('username');
        $data['namauser'] = $this->session->userdata('nama');
        $data['rs_user'] = $this->m_user->get($data['id_user']);
        $data['done_event'] = $this->m_event->doneEvent($data['id_user']);
        
        $this->load->view('template/header', $data);
        $this->load->view('admin/sidebar/sidebar-2', $data);
        $this->load->view('template/rightside',$data);
        $this->load->view('admin/event_done', $data);
        $this->load->view('template/footer', $data);
    }

    function doneevent2()
    {
        $data=array();
        $data['page_title'] = 'Event';
        $tgl=date('Y-m-d');
        $warna='#fff';
        $url = site_url(). '/admin2/doneevent/';
        $data['id_role'] = $this->session->userdata('id_role');
       // $data['now_event'] = $this->m_event->getNowEvent();
       // $data['next_event'] = $this->m_event->getNextEvent();
        $id_user = (int)$this->uri->segment(3);
        
        $data['id_dinas'] = $this->session->userdata('id_dinas');
        $data['id_user']=$this->session->userdata('id_user');
        $data['user'] = $this->session->userdata('username');
        $data['namauser'] = $this->session->userdata('nama');
        $data['rs_user'] = $this->m_user->get($data['id_user']);
        $data['done_event'] = $this->m_event->doneEvent($id_user);
        
        $this->load->view('template/header', $data);
        $this->load->view('admin/sidebar/sidebar-2', $data);
        $this->load->view('template/rightside',$data);
        $this->load->view('admin/event_done', $data);
        $this->load->view('template/footer', $data);
    }

    function viewvisi(){
        $data = array();
        
        $data['page_title'] = 'Visi & Misi';       
        $url = site_url() . '/user/visi/';
    
        $data['id_user']=$this->session->userdata('id_user');
        $data['user'] =  $this->session->userdata('username');
        $data['namauser'] = $this->session->userdata('nama');
        $data['rs_user'] = $this->m_user->get($data['id_user']);
        $data['id_role'] = $this->session->userdata('id_role');
        $data['rs_visi'] = $this->m_visi->get();
       
        $this->load->view('template/header', $data);
        $this->load->view('admin/sidebar/sidebar-2', $data);
        $this->load->view('template/rightside',$data);
        $this->load->view('admin/viewvisi', $data);
        $this->load->view('template/footer', $data);
    }
   
     function visi()
     {
        $data = array();
        
        $data['page_title'] = 'Visi & Misi';       
        $url = site_url() . '/admin2/visi/';
    
        $data['id_user']=$this->session->userdata('id_user');
        $data['user'] =  $this->session->userdata('username');
        $data['namauser'] = $this->session->userdata('nama');
        $data['rs_user'] = $this->m_user->get($data['id_user']);
        $data['id_role'] = $this->session->userdata('id_role');
 

        $data['rs_visi'] = $this->m_visi->get();
        $data['link'] = 'admin2';
        $this->load->view('template/header', $data);
        $this->load->view('admin/sidebar/sidebar-2', $data);
        $this->load->view('template/rightside',$data);
        $this->load->view('admin/visi', $data);
        $this->load->view('template/footer', $data);
    
    }

    function visi_add(){
        $data = array();
        
        if(!empty($_POST)){
            $this->form_validation->set_rules('visi','Visi','xss_clean|required');
            $this->form_validation->set_rules('misi','Misi','trim|xss_clean|required');

            if(!empty($_FILES['gambar_misi']['name']))
            {
                $config['upload_path'] = './assets/images/misi/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
                $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload

                $this->upload->initialize($config);
                if ($this->upload->do_upload('gambar_misi')){
                    $fototerdahulu = $this->input->post('foto_terdahulu');
                    unlink('./assets/images/misi/'.$fototerdahulu);

                    $gbr = $this->upload->data();
                    //Compress Image
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = './assets/images/misi/'.$gbr['file_name'];
                    $config['create_thumb'] = FALSE;
                    $config['maintain_ratio'] = FALSE;
                    $config['quality'] = '50%';
                    $config['width'] = 600;
                    $config['height'] = 500;
                    $config['new_image'] = './assets/images/misi/'.$gbr['file_name'];
                    $this->load->library('image_lib', $config);
                    $this->image_lib->resize();

                    $data['gambar_misi'] = $gbr['file_name'];
                }
            }
            
            if($this->form_validation->run() == TRUE)
            {
                $data['visi'] = $this->input->post('visi');
                $data['misi'] = $this->input->post('misi');
                $data['created_at'] = date("Y-m-d H:i:s");
                $data['user_id'] = $this->session->userdata('id_user');

                if(IS_TEST === 'FALSE'){
                    $this->m_visi->add($data); 
                    $data['msg'] = 'Data sudah disimpan';
                    $this->session->set_flashdata('message', 'Data sudah disimpan');
                    $data['clear_text_box'] = 'TRUE';   
                    redirect(site_url() . '/admin2/visi' , 'refresh');

                }else{
                    $data['msg'] = 'WARNING: READ ONLY !';
                }

            }else{
                $data['msg'] = validation_errors();
                echo $data['msg'];
            }
        }

        $data['page_title'] = 'Visi dan Misi';       
        $url = site_url() . '/admin2/visi_add/';

        
        $data['id_user']=$this->session->userdata('id_user');
        $data['user'] = $this->session->userdata('username');
        $data['namauser'] = $this->session->userdata('nama');
        $data['rs_user'] = $this->m_user->get($data['id_user']);
        $data['rs_dinas'] = $this->m_dinas->get();
        $data['rs_visi'] = $this->m_visi->get();
              /* Load Template */
        $this->load->view('template/header', $data);
        $this->load->view('admin/sidebar/sidebar-2', $data);
        $this->load->view('template/rightside',$data);
        $this->load->view('admin/visi_edit', $data);
        $this->load->view('template/footer', $data);
    }

    function sponsor(){
        $data = array();
        
        $data['page_title'] = 'Sponsor';       
        $url = site_url() . '/admin2/sponsor/';
    
        $data['id_user']=$this->session->userdata('id_user');
        $data['user'] =  $this->session->userdata('username');
        $data['namauser'] = $this->session->userdata('nama');
        $data['rs_user'] = $this->m_user->get($data['id_user']);
        $data['id_role'] = $this->session->userdata('id_role');
 
        $data['rs_sponsor'] = $this->m_sponsor->get();
        $this->load->view('template/header', $data);
        $this->load->view('admin/sidebar/sidebar-2', $data);
        $this->load->view('template/rightside',$data);
        $this->load->view('admin/sponsor', $data);
        $this->load->view('template/footer', $data);        
    }

    function sponsor_add()
    {
      /*  if ($this->valid() ==  FALSE)
        {
            redirect('login', 'refresh');
        }
        else
        {
            /* Title Page */

            //$this->load->view('login');

            if(!empty($_POST))
            {
                $this->form_validation->set_rules('nama','nama','xss_clean|required');
                $this->form_validation->set_rules('email','email','xss_clean|required');
                $this->form_validation->set_rules('notelp','notelp','xss_clean|required');
                $this->form_validation->set_rules('alamat','alamat','xss_clean|required');
                $this->form_validation->set_rules('deskripsi','deskripsi','trim|xss_clean|required');

                if(!empty($_FILES['foto_sponsor']['name']))
                {
                    $config['upload_path'] = './assets/images/sponsor/';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
                    $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload

                    $this->upload->initialize($config);
                    if ($this->upload->do_upload('foto_sponsor')){
                        $gbr = $this->upload->data();
                        //Compress Image
                        $config['image_library'] = 'gd2';
                        $config['source_image'] = './assets/images/sponsor/'.$gbr['file_name'];
                        $config['create_thumb'] = FALSE;
                        $config['maintain_ratio'] = FALSE;
                        $config['quality'] = '50%';
                        $config['width'] = 940;
                        $config['height'] = 339;
                        $config['new_image'] = './assets/images/sponsor/'.$gbr['file_name'];
                        $this->load->library('image_lib', $config);
                        $this->image_lib->resize();

                        $data['foto_sponsor'] = $gbr['file_name'];
                    }
                }
            
                if($this->form_validation->run() == TRUE)
                {
                    $data['nama_sponsor'] = $this->input->post('nama');
                    $data['alamat_sponsor'] = $this->input->post('alamat');
                    $data['deskripsi_sponsor'] = $this->input->post('deskripsi');
                    $data['email_sponsor'] = $this->input->post('email');
                    $data['notelp_sponsor'] = $this->input->post('notelp');
                    $data['long_sponsor'] = $this->input->post('long');
                    $data['lat_sponsor'] = $this->input->post('lat');
                    
                    if(IS_TEST === 'FALSE'){
                    $this->m_sponsor->add($data); 
                        $data['msg'] = 'Data sudah disimpan';
                     $this->session->set_flashdata('message', 'Data sudah disimpan');
                         $data['clear_text_box'] = 'TRUE';   
                          redirect(site_url() . '/admin2/sponsor' , 'refresh');

                    }else{
                        $data['msg'] = 'WARNING: READ ONLY !';
                    }

                }else{
                    $data['msg'] = validation_errors();
                }
            }
             
            /* Load Template */
            $data['page_name'] = 'Sponsor';
            $data['page_title'] = 'Add Sponsor';
            $data['id_user']=$this->session->userdata('id_user');

            $data['user'] = $this->session->userdata('username');
            $data['namauser'] = $this->session->userdata('nama');
            $data['rs_user'] = $this->m_user->get($data['id_user']);

            $this->load->view('template/header', $data);
            $this->load->view('admin/sidebar/sidebar-2', $data);
            $this->load->view('template/rightside',$data);
            $this->load->view('admin/sponsor_add', $data);
            $this->load->view('template/footer', $data);
        //}   
    }

    function sponsor_edit()
    {
        /*if ($this->valid() ==  FALSE)
        {
            redirect('login', 'refresh');
        }
        else
        {
            /* Title Page */

            //$this->load->view('login');

            if(!empty($_POST))
            {
                $this->form_validation->set_rules('nama','nama','xss_clean|required');
                $this->form_validation->set_rules('email','email','xss_clean|required');
                $this->form_validation->set_rules('notelp','notelp','xss_clean|required');
                $this->form_validation->set_rules('alamat','alamat','xss_clean|required');
                $this->form_validation->set_rules('deskripsi','deskripsi','trim|xss_clean|required');

                if(!empty($_FILES['foto_sponsor']['name']))
                {
                    $config['upload_path'] = './assets/images/sponsor/';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
                    $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload

                    $this->upload->initialize($config);
                    if ($this->upload->do_upload('foto_sponsor')){
                        $fototerdahulu = $this->input->post('foto_terdahulu');
                        unlink('./assets/images/sponsor/'.$fototerdahulu);
                        $gbr = $this->upload->data();
                        //Compress Image
                        $config['image_library'] = 'gd2';
                        $config['source_image'] = './assets/images/sponsor/'.$gbr['file_name'];
                        $config['create_thumb'] = FALSE;
                        $config['maintain_ratio'] = FALSE;
                        $config['quality'] = '50%';
                        $config['width'] = 940;
                        $config['height'] = 339;
                        $config['new_image'] = './assets/images/sponsor/'.$gbr['file_name'];
                        $this->load->library('image_lib', $config);
                        $this->image_lib->resize();

                        $data['foto_sponsor'] = $gbr['file_name'];
                    }
                }
            
                if($this->form_validation->run() == TRUE)
                {
                    $data['nama_sponsor'] = $this->input->post('nama');
                    $data['alamat_sponsor'] = $this->input->post('alamat');
                    $data['deskripsi_sponsor'] = $this->input->post('deskripsi');
                    $data['email_sponsor'] = $this->input->post('email');
                    $data['notelp_sponsor'] = $this->input->post('notelp');
                    $data['long_sponsor'] = $this->input->post('long');
                    $data['lat_sponsor'] = $this->input->post('lat');
                    $data['id_sponsor'] = $this->input->post('id');
                    
                    if(IS_TEST === 'FALSE'){
                    $this->m_sponsor->add($data); 
                        $data['msg'] = 'Data sudah disimpan';
                     $this->session->set_flashdata('message', 'Data sudah disimpan');
                         $data['clear_text_box'] = 'TRUE';   
                          redirect(site_url() . '/admin2/sponsor' , 'refresh');

                    }else{
                        $data['msg'] = 'WARNING: READ ONLY !';
                    }

                }else{
                    $data['msg'] = validation_errors();
                }
            }
             
            /* Load Template */
            $data['page_name'] = 'Sponsor';
            $data['page_title'] = 'Add Sponsor';
            $data['id_user']=$this->session->userdata('id_user');

            $data['user'] = $this->session->userdata('username');
            $data['namauser'] = $this->session->userdata('nama');
            $data['rs_user'] = $this->m_user->get($data['id_user']);
            $id_sponsor = (int)$this->uri->segment(3);
            $data['rs_sponsor'] = $this->m_sponsor->get($id_sponsor);

            $this->load->view('template/header', $data);
            $this->load->view('admin/sidebar/sidebar-2', $data);
            $this->load->view('template/rightside',$data);
            $this->load->view('admin/sponsor_edit', $data);
            $this->load->view('template/footer', $data);
       // }   
    }

    function sponsor_del($kode){
        
        if(IS_TEST === 'FALSE'){
            $this->m_sponsor->remove($kode);
            $this->session->set_flashdata('message', 'Data telah berhasil dihapus');
        }else{
            $this->session->set_flashdata('message', 'WARNING: READ ONLY !');
        }
           redirect(site_url() . '/admin2/sponsor/','reload');
    }

    public function detailsponsor($id)
    {
        $data = array();
        
        $data['page_title'] = 'Sponsor';       
        $url = site_url() . '/admin2/sponsor/';
       
        
        $data['id_user']=$this->session->userdata('id_user');
        $data['user'] = $this->session->userdata('username');
        $data['namauser'] = $this->session->userdata('nama');
        $data['rs_user'] = $this->m_user->get($data['id_user']);
            /* Load Template */

        $id_sponsor = (int)$this->uri->segment(3);
        $data['rs_sponsor'] = $this->m_sponsor->get($id_sponsor);
        $this->load->view('template/header', $data);
        $this->load->view('admin/sidebar/sidebar-2', $data);
        $this->load->view('template/rightside',$data);
        $this->load->view('admin/detailsponsor', $data);
        $this->load->view('template/footer', $data);   
    }

    function slidefoto()
    {
       /* if ($this->valid() ==  FALSE)
        {
            redirect('login', 'refresh');
        }
        else
        {*/
            if(!empty($_POST))
            {
                $this->form_validation->set_rules('isi','isi','xss_clean|required');

                if(!empty($_FILES['foto']['name']))
                {
                    $config['upload_path'] = './assets/images/slidefoto/';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
                    $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload

                    $this->upload->initialize($config);
                    if ($this->upload->do_upload('foto')){
                        $gbr = $this->upload->data();
                        //Compress Image
                        $config['image_library'] = 'gd2';
                        $config['source_image'] = './assets/images/slidefoto/'.$gbr['file_name'];
                        $config['create_thumb'] = FALSE;
                        $config['maintain_ratio'] = FALSE;
                        $config['quality'] = '50%';
                        $config['width'] = 1200;
                        $config['height'] = 600;
                        $config['new_image'] = './assets/images/slidefoto/'.$gbr['file_name'];
                        $this->load->library('image_lib', $config);
                        $this->image_lib->resize();

                        $datafoto['foto'] = $gbr['file_name'];
                        $this->m_slide->add($datafoto);
                    }
                }

                if($this->form_validation->run() == TRUE)
                {
                    $data['isi'] = $this->input->post('isi');
                    $data['id_marque'] = $this->input->post('id');
                                        
                    if(IS_TEST === 'FALSE'){
                    $this->m_slide->updateMarque($data); 
                        $data['msg'] = 'Data sudah disimpan';
                     $this->session->set_flashdata('message', 'Data sudah disimpan');
                         $data['clear_text_box'] = 'TRUE';   
                          redirect(site_url() . '/admin2/slidefoto' , 'refresh');

                    }else{
                        $data['msg'] = 'WARNING: READ ONLY !';
                    }

                }else{
                    $data['msg'] = validation_errors();
                }

            }

            /* Title Page */
            $data['page_name'] = 'Slide Foto';
            $data['page_title'] = 'Data Slide Foto';

            $data['id_user']=$this->session->userdata('id_user');
            $data['user'] = $this->session->userdata('username');
            $data['namauser'] = $this->session->userdata('nama');
            $data['rs_user'] = $this->m_user->get($data['id_user']);
                /* Load Template */
            $data['rs_slide'] = $this->m_slide->get();
            $data['rs_marque'] = $this->m_slide->getMarquee('1');

            $this->load->view('template/header', $data);
            $this->load->view('admin/sidebar/sidebar-2', $data);
            $this->load->view('template/rightside',$data);
            $this->load->view('admin/slidefoto', $data);
            $this->load->view('template/footer', $data);
       // }   
    }
    
    function slide_del($kode){
        
        if(IS_TEST === 'FALSE'){
            $this->m_slide->remove($kode);
            $this->session->set_flashdata('message', 'Data telah berhasil dihapus');
        }else{
            $this->session->set_flashdata('message', 'WARNING: READ ONLY !');
        }
           redirect(site_url() . '/admin2/slidefoto/','reload');
    }

    function komentar(){
         $data = array();
        
        $data['page_title'] = 'Komentar';       
        $url = site_url() . '/admin2/komentar/';
     
        $per_page = 20;

        $data['namauser'] = $this->session->userdata('nama');
        $data['rs_komentar'] = $this->m_komentar->get_all();
        $data['page_name'] = 'komentar';
        
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar-2', $data);
        $this->load->view('admin/komentar', $data);
        $this->load->view('admin/templates/footer', $data);    
    }
     function komentar_del($kode){
        
        if(IS_TEST === 'FALSE'){
            $this->m_komentar->delete($kode);
         
            $this->session->set_flashdata('msg', 'Data telah berhasil dihapus');
        }else{
            $this->session->set_flashdata('msg', 'WARNING: READ ONLY !');
        }
        
        
        redirect(site_url() . '/admin2/komentar','reload');
    }

    

         
}        
     
