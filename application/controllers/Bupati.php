<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bupati extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

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

         if($this->session->userdata('id_role') == '0')
         {
            redirect('/admin','location');
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
           // case 2:redirect('/user','location');break;
        }
    }

    private function valid()
    {
        if ($this->session->userdata('login') == TRUE)
        {
            $this->portal($this->session->userdata('id_role'));
            return TRUE;
        }
        else
        {
            redirect('login');
        }
    }

    public function index()
    {   
        if ($this->valid() ==  FALSE)
        {
            redirect('login', 'refresh');
        }
        else
        {
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
            $data['link'] = 'bupati';
                /* Load Template */

            $this->load->view('template/header', $data);
            $this->load->view('admin/sidebar/sidebar', $data);
            $this->load->view('template/rightside',$data);
            $this->load->view('admin/dashboard', $data);
            $this->load->view('template/footer', $data);
        }
    }

    public function profile()
    {
        if ($this->valid() ==  FALSE)
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
            $data['link'] = 'bupati';
            
            $this->load->view('template/header', $data);
            $this->load->view('admin/sidebar/sidebar', $data);
            $this->load->view('template/rightside',$data);
            $this->load->view('admin/profile', $data);
            $this->load->view('template/footer', $data);
        }
    }

    public function profile_add()
    {
        if ($this->valid() ==  FALSE)
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
                          redirect(site_url() . '/bupati/profile' , 'refresh');

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
            $this->load->view('admin/sidebar/sidebar', $data);
            $this->load->view('template/rightside',$data);
            $this->load->view('admin/profile_add', $data);
            $this->load->view('template/footer', $data);
        }
    }

    public function detailprofile($id)
    {
        $data = array();
        
        $data['page_title'] = 'Profile';       
        $url = site_url() . '/bupati/profile/';
       
        
        $data['id_user']=$this->session->userdata('id_user');
        $data['user'] = $this->session->userdata('username');
        $data['namauser'] = $this->session->userdata('nama');
        $data['rs_user'] = $this->m_user->get($data['id_user']);
            /* Load Template */

        $id_profile = (int)$this->uri->segment(3);
        $data['rs_profile'] = $this->m_profile->get($id_profile);
        $this->load->view('template/header', $data);
        $this->load->view('admin/sidebar/sidebar', $data);
        $this->load->view('template/rightside',$data);
        $this->load->view('admin/detailprofile', $data);
        $this->load->view('template/footer', $data);   
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
                      redirect(site_url() . '/bupati/profile' , 'refresh');

                }else{
                    $data['msg'] = 'WARNING: READ ONLY !';
                    
                }            

            }else{
                $data['msg'] = validation_errors();
                
            }
        }
        
        $data['page_title'] = 'Profile';       
        $url = site_url() . '/bupati/profile/';
       
        
        $data['id_user']=$this->session->userdata('id_user');
        $data['user'] = $this->session->userdata('username');
        $data['namauser'] = $this->session->userdata('nama');
        $data['rs_user'] = $this->m_user->get($data['id_user']);
            /* Load Template */

        $id_profile = (int)$this->uri->segment(3);
        $data['rs_profile'] = $this->m_profile->get($id_profile);
        $this->load->view('template/header', $data);
        $this->load->view('admin/sidebar/sidebar', $data);
        $this->load->view('template/rightside',$data);
        $this->load->view('admin/profile_edit', $data);
        $this->load->view('template/footer', $data);
    }

    function profile_del($kode)
    {    
        if(IS_TEST === 'FALSE')
        {
            $this->m_profile->remove($kode);
            $this->session->set_flashdata('message', 'Data telah berhasil dihapus');
        }
        else
        {
            $this->session->set_flashdata('message', 'WARNING: READ ONLY !');
        }
        
        redirect(site_url() . '/bupati/profile/','reload');
    }

    function visi()
     {
        $data = array();
        
        $data['page_title'] = 'Visi & Misi';       
        $url = site_url() . '/bupati/visi/';
    
        $data['id_user']=$this->session->userdata('id_user');
        $data['user'] =  $this->session->userdata('username');
        $data['namauser'] = $this->session->userdata('nama');
        $data['rs_user'] = $this->m_user->get($data['id_user']);
        $data['id_role'] = $this->session->userdata('id_role');
 

        $data['rs_visi'] = $this->m_visi->get();
        $data['link'] = 'bupati';
        $this->load->view('template/header', $data);
        $this->load->view('admin/sidebar/sidebar', $data);
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
                    redirect(site_url() . '/bupati/visi' , 'refresh');

                }else{
                    $data['msg'] = 'WARNING: READ ONLY !';
                }

            }else{
                $data['msg'] = validation_errors();
                echo $data['msg'];
            }
        }

        $data['page_title'] = 'Visi dan Misi';       
        $url = site_url() . '/bupati/visi_add/';

        
        $data['id_user']=$this->session->userdata('id_user');
        $data['user'] = $this->session->userdata('username');
        $data['namauser'] = $this->session->userdata('nama');
        $data['rs_user'] = $this->m_user->get($data['id_user']);
        $data['rs_dinas'] = $this->m_dinas->get();
        $data['rs_visi'] = $this->m_visi->get();
              /* Load Template */
        $this->load->view('template/header', $data);
        $this->load->view('admin/sidebar/sidebar', $data);
        $this->load->view('template/rightside',$data);
        $this->load->view('admin/visi_edit', $data);
        $this->load->view('template/footer', $data);
    }

    public function news()
    {
        if ($this->valid() ==  FALSE)
        {
            redirect('login', 'refresh');
        }
        else
        {
            $data['id_user'] = $this->session->userdata('id_user');

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
                        $config['height'] = 500;
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
                    $data['created_at'] = date('Y-m-d H:i:s');
     
                    if(IS_TEST === 'FALSE'){
                    $this->m_news->add($data); 
                        $data['msg'] = 'Data sudah disimpan';
                     $this->session->set_flashdata('message', 'Data sudah disimpan');
                         $data['clear_text_box'] = 'TRUE';   
                          redirect(site_url() . '/bupati/news' , 'refresh');

                    }else{
                        $data['msg'] = 'WARNING: READ ONLY !';
                    }

                }else{
                    $data['msg'] = validation_errors();
                }
            }

            $data=array();
            $data['page_title'] = 'News';
            $url = site_url(). '/bupati/news/';

            $data['id_dinas'] = $this->session->userdata('id_dinas');
            $data['id_user']=$this->session->userdata('id_user');
            $data['user'] = $this->session->userdata('username');
            $data['namauser'] = $this->session->userdata('nama');
            $data['rs_user'] = $this->m_user->get($data['id_user']);
            $data['rs_news'] = $this->m_news->get();
            $data['link'] = 'bupati';
            
            $this->load->view('template/header', $data);
            $this->load->view('admin/sidebar/sidebar', $data);
            $this->load->view('template/rightside',$data);
            $this->load->view('admin/news', $data);
            $this->load->view('template/footer', $data);
        }
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
       
        $this->m_news->updaterespon($data);
        redirect(site_url() . '/bupati/news','reload');
    }

    public function detailnews()
    {
        $data = array();

        $id_news = (int)$this->uri->segment(3);
        $data['id_user'] = $this->session->userdata('id_user');

        if(!empty($_POST))
         {
            $data['respon'] = $this->input->post('respon');
            $data['id_news'] = $id_news;
            $data['tanggal_respon'] = date('Y-m-d');
            $data['status_respon'] = 'Aktif';

            $this->m_detailnews->add($data);   
            redirect(site_url() . '/bupati/detailnews/'.$id_news, 'refresh');
         }
       
        $data['page_title'] = 'News';       
        $url = site_url() . '/bupati/news/'; 
        $data['user'] = $this->session->userdata('username');
        $data['namauser'] = $this->session->userdata('nama');
        $data['rs_user'] = $this->m_user->get($data['id_user']);
        $data['link'] = 'bupati';
            /* Load Template */

        $data['rs_news'] = $this->m_news->get($id_news);
        $data['rs_detailnews'] = $this->m_detailnews->getDetailNews($id_news);

        $this->load->view('template/header', $data);
        $this->load->view('admin/sidebar/sidebar', $data);
        $this->load->view('template/rightside',$data);
        $this->load->view('admin/detailnews', $data);
        $this->load->view('template/footer', $data);
    }

    public function hapusdetailnews()
    {
        $id_detailnews = (int)$this->uri->segment(3);
        $id_news = (int)$this->uri->segment(4);
        $this->m_detailnews->remove($id_detailnews);
        redirect(site_url() . '/bupati/detailnews/'.$id_news,'reload');
    }

    public function deletenews()
    {
        $id_news = (int)$this->uri->segment(3);
        $this->m_news->remove($id_news);
        redirect(site_url() . '/bupati/news/', 'reload');
    }

    function event()
    {
        $data = array();
        
        $data['page_title'] = 'Galeri';       
        $url = site_url() . '/bupati/event/';
    
        $data['id_user']=$this->session->userdata('id_user');
        $data['user'] =  $this->session->userdata('username');
        $data['namauser'] = $this->session->userdata('nama');
        $data['rs_user'] = $this->m_user->get($data['id_user']);
        $data['id_role'] = $this->session->userdata('id_role');
 
        $data['rs_event'] = $this->m_event->getBaru($data['id_user']);
        $data['link'] = 'bupati';
        $this->load->view('template/header', $data);
        $this->load->view('admin/sidebar/sidebar', $data);
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
                    redirect(site_url() . '/bupati/event' , 'refresh');

                }else{
                    $data['msg'] = 'WARNING: READ ONLY !';
                }
            
                

            }else{
                $data['msg'] = validation_errors();
            }
        }
        $data['page_title'] = 'Event';       
        $url = site_url() . '/bupati/event/';

        
        $data['id_user']=$this->session->userdata('id_user');
        $data['user'] = $this->session->userdata('username');
        $data['namauser'] = $this->session->userdata('nama');
        $data['rs_user'] = $this->m_user->get($data['id_user']);
        $data['rs_dinas'] = $this->m_dinas->get();
              /* Load Template */
        $this->load->view('template/header', $data);
        $this->load->view('admin/sidebar/sidebar', $data);
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
                    redirect(site_url() . '/bupati/event' , 'refresh');

                }else{
                    $data['msg'] = 'WARNING: READ ONLY !';
                }
            
                

            }else{
                $data['msg'] = validation_errors();
            }
        }
        $data['page_title'] = 'Event';       
        $url = site_url() . '/bupati/event/';

        
        $data['id_user']=$this->session->userdata('id_user');
        $data['user'] = $this->session->userdata('username');
        $data['namauser'] = $this->session->userdata('nama');
        $data['rs_user'] = $this->m_user->get($data['id_user']);
        $data['rs_dinas'] = $this->m_dinas->get();
        $id_event = (int)$this->uri->segment(3);
        $data['rs_event'] = $this->m_event->getedit($id_event);

              /* Load Template */
        $this->load->view('template/header', $data);
        $this->load->view('admin/sidebar/sidebar', $data);
        $this->load->view('template/rightside',$data);
        $this->load->view('admin/event_edit', $data);
        $this->load->view('template/footer', $data);   
    }

     function event_del($kode)
     {
        
        if(IS_TEST === 'FALSE'){
            $this->m_event->remove($kode);
            $this->session->set_flashdata('message', 'Data telah berhasil dihapus');
        }else{
            $this->session->set_flashdata('message', 'WARNING: READ ONLY !');
        }
           redirect(site_url() . '/bupati/event/','reload');
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
                redirect(site_url() . '/bupati/doneevent' , 'refresh');

            }else{
                $data['msg'] = 'WARNING: READ ONLY !';
            }
        }
        $data['page_title'] = 'Event Yang Terlaksana';       
        $url = site_url() . '/bupati/event/';

        
        $data['id_user']=$this->session->userdata('id_user');
        $data['user'] = $this->session->userdata('username');
        $data['namauser'] = $this->session->userdata('nama');
        $data['rs_user'] = $this->m_user->get($data['id_user']);
        $data['rs_dinas'] = $this->m_dinas->get();
        $id_event = (int)$this->uri->segment(3);
        $data['rs_event'] = $this->m_event->getedit($id_event);

              /* Load Template */
        $this->load->view('template/header', $data);
        $this->load->view('admin/sidebar/sidebar', $data);
        $this->load->view('template/rightside',$data);
        $this->load->view('admin/event_selesaikan', $data);
        $this->load->view('template/footer', $data);
    }

    function doneevent()
    {
        $data=array();
        $data['page_title'] = 'Event';
        $tgl=date('Y-m-d');
        $warna='#fff';
        $url = site_url(). '/bupati/doneevent/';
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
        $this->load->view('admin/sidebar/sidebar', $data);
        $this->load->view('template/rightside',$data);
        $this->load->view('admin/event_done', $data);
        $this->load->view('template/footer', $data);
    }

    function nowevent()
    {
        $data=array();
        $data['page_title'] = 'Event';
        $tgl=date('Y-m-d');
        $warna='#fff';
        $url = site_url(). '/bupati/nowevent/';
        $data['id_role'] = $this->session->userdata('id_role');
       // $data['now_event'] = $this->m_event->getNowEvent();
       // $data['next_event'] = $this->m_event->getNextEvent();
        
        $data['id_dinas'] = $this->session->userdata('id_dinas');
        $data['id_user']=$this->session->userdata('id_user');
        $data['user'] = $this->session->userdata('username');
        $data['namauser'] = $this->session->userdata('nama');
        $data['rs_user'] = $this->m_user->get($data['id_user']);
        $data['event'] = $this->m_event->getNowEvent($data['id_user']);
        $data['link'] = 'bupati';
           
        $this->load->view('template/header', $data);
        $this->load->view('admin/sidebar/sidebar', $data);
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
        $url = site_url(). '/bupati/nextevent/';
        $data['id_role'] = $this->session->userdata('id_role');
       // $data['now_event'] = $this->m_event->getNowEvent();
       // $data['next_event'] = $this->m_event->getNextEvent();
        
        $data['id_dinas'] = $this->session->userdata('id_dinas');
        $data['id_user']=$this->session->userdata('id_user');
        $data['user'] = $this->session->userdata('username');
        $data['namauser'] = $this->session->userdata('nama');
        $data['rs_user'] = $this->m_user->get($data['id_user']);
        $data['next_event'] = $this->m_event->getNextEvent($data['id_user']);
        $data['link'] = 'bupati';
        $data['selesaikan'] = 'ya';
        
        $this->load->view('template/header', $data);
        $this->load->view('admin/sidebar/sidebar', $data);
        $this->load->view('template/rightside',$data);
        $this->load->view('admin/event_next', $data);
        $this->load->view('template/footer', $data);  
    }

    public function akundinas()
    {
        if ($this->valid() ==  FALSE)
        {
            redirect('login', 'refresh');
        }
        else
        {
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
            $data['link'] = 'bupati';
                /* Load Template */

            $this->load->view('template/header', $data);
            $this->load->view('admin/sidebar/sidebar', $data);
            $this->load->view('template/rightside',$data);
            $this->load->view('admin/akundinas', $data);
            $this->load->view('template/footer', $data);
        }
    }

    public function akundinas_add()
    {
        if ($this->valid() ==  FALSE)
        {
            redirect('login', 'refresh');
        }
        else
        {
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
                      redirect(site_url() . '/bupati/akundinas' , 'refresh');

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
                $this->load->view('admin/sidebar/sidebar', $data);
                $this->load->view('template/rightside',$data);
                $this->load->view('admin/add_akundinas', $data);
                $this->load->view('template/footer', $data);
            }
        }
    }

    public function akundinas_edit()
    {
        if ($this->valid() ==  FALSE)
        {
            redirect('login', 'refresh');
        }
        else
        {
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
                      redirect(site_url() . '/bupati/akundinas' , 'refresh');

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
            $this->load->view('admin/sidebar/sidebar', $data);
            $this->load->view('template/rightside',$data);
            $this->load->view('admin/edit_akundinas', $data);
            $this->load->view('template/footer', $data);
        }
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
        
        redirect(site_url() . '/bupati/akundinas/','reload');   
    }

    public function lihat_profil()
    {
        if ($this->valid() ==  FALSE)
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
            $data['link'] = 'bupati';
            $this->load->view('template/header', $data);
            $this->load->view('admin/sidebar/sidebar', $data);
            $this->load->view('template/rightside',$data);
            $this->load->view('admin/lihat_profile', $data);
            $this->load->view('template/footer', $data);
        }
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
        $this->load->view('admin/sidebar/sidebar', $data);
        $this->load->view('template/rightside',$data);
        $this->load->view('admin/viewvisi', $data);
        $this->load->view('template/footer', $data);
    }

    function viewnews()
    {
        $data=array();
        $data['page_title'] = 'News';
        $url = site_url(). '/bupati/viewnews/';
        $data['rs_news'] = $this->m_news->get();

        $data['id_dinas'] = $this->session->userdata('id_dinas');
        $data['id_user']= $this->session->userdata('id_user');
        $data['user'] = $this->session->userdata('username');
        $data['namauser'] = $this->session->userdata('nama');
        $data['rs_user'] = $this->m_user->get($data['id_user']);
        $data['link'] = 'bupati';
        
        $this->load->view('template/header', $data);
        $this->load->view('admin/sidebar/sidebar', $data);
        $this->load->view('template/rightside',$data);
        $this->load->view('admin/viewnews', $data);
        $this->load->view('template/footer', $data);
    }

    function sayembara()
    {
        $data = array();
        
        $tgl=date('Y-m-d');
        $cek=$this->m_quiz->cekJawabanUser($this->session->userdata('id_user'),$tgl);

        $data['page_title'] = 'sayembara';       
        $url = site_url() . '/bupati/sayembara/';
        $tgl=date('Y-m-d');
        $data['id_user']=$this->session->userdata('id_user');
        $data['user'] =  $this->session->userdata('username');
        $data['namauser'] = $this->session->userdata('nama');
        $data['rs_user'] = $this->m_user->get($data['id_user']);
        $data['id_role'] = $this->session->userdata('id_role');
        $data['rs_quiz'] = $this->m_quiz->get_question_day($tgl);
        $data['rs_opsi'] = $this->m_quiz->get_soal();
        $soal = $data['rs_opsi'];
        $this->load->view('template/header', $data);
        $this->load->view('admin/sidebar/sidebar', $data);
        $this->load->view('template/rightside',$data);
        // if($cek>0){
        //     $data['rs_quiz'] = $this->m_quiz->hasilJawabanUser($data['id_user'],$tgl);
        //     $this->load->view('admin/sayembara_hasil', $data);
            
        // }else{

        //      $this->load->view('admin/quiz_view', $data);
        // }

        foreach($data['rs_opsi'] as $soalzzz => $ccc){
            $data['rs_choice'] = $this->m_quiz->get_choice($ccc['qid']);
        }

        $this->load->view('admin/quiz_view', $data);
       
        $this->load->view('template/footer', $data);
    }

    public function message()
    {
        if ($this->valid() ==  FALSE)
        {
            redirect('login', 'refresh');
        }
        else
        {
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
            $data['link'] = 'bupati';

                /* Load Template */

            $this->load->view('template/header', $data);
            $this->load->view('admin/sidebar/sidebar', $data);
            $this->load->view('template/rightside',$data);
            $this->load->view('admin/message', $data);
            $this->load->view('template/footer', $data);
        }
    }

    public function detailmessage()
    {
        if ($this->valid() ==  FALSE)
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
                redirect(site_url() . '/bupati/detailmessage/'.$id_message, 'refresh');
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
            $data['link'] = 'bupati';

                /* Load Template */

            $this->load->view('template/header', $data);
            $this->load->view('admin/sidebar/sidebar', $data);
            $this->load->view('template/rightside',$data);
            $this->load->view('admin/detailmessage', $data);
            $this->load->view('template/footer', $data);
        }
    }

    public function hapusdetailmessage()
    {
        $id_detail = (int)$this->uri->segment(3);
        $id_message = (int)$this->uri->segment(4);
        $this->m_detailmessage->remove($id_detail);
        redirect(site_url() . '/bupati/detailmessage/'.$id_message,'reload');
    }

    public function deletemessage()
    {
        $id_message = (int)$this->uri->segment(3);
        $this->m_message->remove($id_message);
        redirect(site_url() . '/bupati/message/', 'reload');
    }

    public function member()
    {
        if ($this->valid() ==  FALSE)
        {
            redirect('login', 'refresh');
        }
        else
        {

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
            $data['link'] = 'bupati';
                /* Load Template */

            $this->load->view('template/header', $data);
            $this->load->view('admin/sidebar/sidebar', $data);
            $this->load->view('template/rightside',$data);
            $this->load->view('admin/member', $data);
            $this->load->view('template/footer', $data);
        }
    }

    function detailmember()
    {
        if ($this->valid() ==  FALSE)
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
        $this->load->view('admin/sidebar/sidebar', $data);
        $this->load->view('template/rightside',$data);
        $this->load->view('admin/detailmember', $data);
        $this->load->view('template/footer', $data);
        }   
    }

    function iconkegiatanterlaksana()
    {
        if ($this->valid() ==  FALSE)
        {
            redirect('login', 'refresh');
        }
        else
        {

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
            $data['link'] = 'bupati';
                /* Load Template */

            $this->load->view('template/header', $data);
            $this->load->view('admin/sidebar/sidebar', $data);
            $this->load->view('template/rightside',$data);
            $this->load->view('admin/icon_kegiatanterlaksana', $data);
            $this->load->view('template/footer', $data);
        }
    }

    function doneevent2()
    {
        $data=array();
        $data['page_title'] = 'Event';
        $tgl=date('Y-m-d');
        $warna='#fff';
        $url = site_url(). '/bupati/doneevent/';
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
        $this->load->view('admin/sidebar/sidebar', $data);
        $this->load->view('template/rightside',$data);
        $this->load->view('admin/event_done', $data);
        $this->load->view('template/footer', $data);
    }

    function iconjadwalkegiatan()
    {
        if ($this->valid() ==  FALSE)
        {
            redirect('login', 'refresh');
        }
        else
        {

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
            $data['link'] = 'bupati';
                /* Load Template */

            $this->load->view('template/header', $data);
            $this->load->view('admin/sidebar/sidebar', $data);
            $this->load->view('template/rightside',$data);
            $this->load->view('admin/icon_jadwalkegiatan', $data);
            $this->load->view('template/footer', $data);
        }  
    }

    function nextevent2()
    {
        $data=array();
        $data['page_title'] = 'Event';
        $tgl=date('Y-m-d');
        $warna='#fff';
        $url = site_url(). '/bupati/nextevent/';
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
        $data['link'] = 'bupati';
        
        $this->load->view('template/header', $data);
        $this->load->view('admin/sidebar/sidebar', $data);
        $this->load->view('template/rightside',$data);
        $this->load->view('admin/event_next', $data);
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
        redirect(site_url() . '/bupati/detailnews/'.$id_news,'reload');
    }
}