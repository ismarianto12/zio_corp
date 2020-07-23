<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        /* Load :: Common */
           $this->load->model(array('m_login','m_dinas',
         'm_news',
         'm_member','m_event', 'm_slide', 'm_sponsor', 'm_profile', 'm_message', 'm_detailmessage', 'm_detailnews',
         'm_galeri',
         'm_album','m_visi','m_quiz'));
         define('IS_TEST','FALSE');

         if($this->session->userdata('id_role') == '1')
         {
            redirect('/member','location');
            break;
         }

         else if($this->session->userdata('id_role') == '2')
         {
            redirect('/dinas','location');
            break;
         }

         else if($this->session->userdata('id_role') == '0')
         {
            redirect('/admin','location');
            break;
         }

         $this->load->library('upload');
         
    }

    private function portal($role)
    {
        switch($role)
        {
          // case 1:redirect('/user','location');break;
           // case 1:redirect('/user','location');break;
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
            redirect('login');
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
            $data['page_name'] = 'Member';
            $data['page_title'] = 'Member';
            //$this->load->view('login');
            $data['id_user']=$this->session->userdata('id_user');
            $data['user'] = $this->session->userdata('username');
            $data['namauser'] = $this->session->userdata('nama');
            $data['rs_user'] = $this->m_member->get($data['id_user']);
            $data['rs_sponsor'] = $this->m_sponsor->get();
            $data['rs_marque'] = $this->m_slide->getMarquee('1');
            $data['rs_slide'] = $this->m_slide->get();
                /* Load Template */

            $this->load->view('member/header', $data);
            $this->load->view('member/sidebar', $data);
            $this->load->view('member/rightside',$data);
            $this->load->view('member/member', $data);
            $this->load->view('template/footer', $data);
        }
    }

    public function message()
    {
        if ($this->valid() ==  FALSE)
        {
            redirect('login', 'refresh');
        }
        else
        {
             $data['id_user']=$this->session->userdata('id_user');

             if(!empty($_POST))
             {
                if(!empty($_FILES['gambar_message']['name']))
                {
                    $config['upload_path'] = './assets/images/message/';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
                    $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload

                    $this->upload->initialize($config);
                    if ($this->upload->do_upload('gambar_message')){
                        $gbr = $this->upload->data();
                        //Compress Image
                        $config['image_library'] = 'gd2';
                        $config['source_image'] = './assets/images/message/'.$gbr['file_name'];
                        $config['create_thumb'] = FALSE;
                        $config['maintain_ratio'] = FALSE;
                        $config['quality'] = '50%';
                        $config['width'] = 600;
                        $config['height'] = 400;
                        $config['new_image'] = './assets/images/message/'.$gbr['file_name'];
                        $this->load->library('image_lib', $config);
                        $this->image_lib->resize();

                        $data['gambar_message'] = $gbr['file_name'];
                    }
                }

                $data['pesan'] = $this->input->post('pesan');
                $data['tanggal'] = date('Y-m-d');

                $this->m_message->add($data);   
                redirect(site_url() . '/member/message' , 'refresh');
             }

            /* Title Page */
            $data['page_name'] = 'Message';
            $data['page_title'] = 'Message';
            //$this->load->view('login');
           
            $data['user'] = $this->session->userdata('username');
            $data['namauser'] = $this->session->userdata('nama');
            $data['rs_user'] = $this->m_member->get($data['id_user']);
            $data['rs_sponsor'] = $this->m_sponsor->get();
            $data['rs_marque'] = $this->m_slide->getMarquee('1');
            $data['rs_slide'] = $this->m_slide->get();
            $data['rs_message'] = $this->m_message->getMsgMember($data['id_user']);
                /* Load Template */

            $this->load->view('member/header', $data);
            $this->load->view('member/sidebar', $data);
            $this->load->view('member/rightside',$data);
            $this->load->view('member/message', $data);
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
             $data['id_user']=$this->session->userdata('id_user');
             $id_message = (int)$this->uri->segment(3);

             if(!empty($_POST))
             {
                $data['balasan'] = $this->input->post('balasan');
                $data['id_message'] = $id_message;
                $data['tanggal'] = date('Y-m-d');

                $this->m_detailmessage->add($data);   
                redirect(site_url() . '/member/detailmessage/'.$id_message, 'refresh');
             }

            /* Title Page */
            $data['page_name'] = 'home';
            $data['page_title'] = 'Welcome';
            //$this->load->view('login');
           
            $data['user'] = $this->session->userdata('username');
            $data['namauser'] = $this->session->userdata('nama');
            $data['rs_user'] = $this->m_member->get($data['id_user']);
            $data['rs_sponsor'] = $this->m_sponsor->get();
            $data['rs_marque'] = $this->m_slide->getMarquee('1');
            $data['rs_slide'] = $this->m_slide->get();
            
            $data['rs_message'] = $this->m_message->get($id_message);
            $data['rs_detailmessage'] = $this->m_detailmessage->getTest($id_message);
                /* Load Template */

            $this->load->view('member/header', $data);
            $this->load->view('member/sidebar', $data);
            $this->load->view('member/rightside',$data);
            $this->load->view('member/detailmessage', $data);
            $this->load->view('template/footer', $data);
        }   
    }

    public function hapusdetailmessage()
    {
        $id_detail = (int)$this->uri->segment(3);
        $id_message = (int)$this->uri->segment(4);
        $this->m_detailmessage->remove($id_detail);
        redirect(site_url() . '/member/detailmessage/'.$id_message,'reload');
    }

    public function deletemessage()
    {
        $id_message = (int)$this->uri->segment(3);
        $this->m_message->remove($id_message);
        redirect(site_url() . '/member/message/', 'reload');
    }

    public function getCountMsg()
    {
        $id = $this->input->post('id');
        // $data['rs_countmsg'] = $this->m_message->getCountMsg($id);
        echo $id;
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
        $data['rs_user'] = $this->m_member->get($data['id_user']);
        $data['rs_sponsor'] = $this->m_sponsor->get();
        $data['rs_marque'] = $this->m_slide->getMarquee('1');
        $data['rs_slide'] = $this->m_slide->get();
            /* Load Template */

        $this->load->view('member/header', $data);
        $this->load->view('member/sidebar', $data);
        $this->load->view('member/rightside',$data);
        $this->load->view('member/dashboard', $data);
        $this->load->view('template/footer', $data);
        }
	}


   public function detailprofile($id)
    {
        $data = array();
        
        $data['page_title'] = 'Profile';       
        $url = site_url() . '/member/profile/';
        
        $data['id_user']=$this->session->userdata('id_user');
        $data['user'] = $this->session->userdata('username');
        $data['namauser'] = $this->session->userdata('nama');
        $data['rs_user'] = $this->m_member->get($data['id_user']);
            /* Load Template */

        $id_profile = (int)$this->uri->segment(3);
        $data['rs_profile'] = $this->m_profile->get($id_profile);
        $this->load->view('member/header', $data);
        $this->load->view('member/sidebar', $data);
        $this->load->view('member/rightside',$data);
        $this->load->view('member/detailprofile', $data);
        $this->load->view('template/footer', $data);
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
         $data['id_role']=$this->session->userdata('id_role');
        $data['page_title'] = 'Profile';
        //$this->load->view('login');
        $data['id_user']=$this->session->userdata('id_user');
        $data['user'] = $this->session->userdata('username');
        $data['namauser'] = $this->session->userdata('nama');
        $data['rs_user'] = $this->m_member->get($data['id_user']);
            /* Load Template */
        $data['rs_profile'] = $this->m_profile->get();
       
        // redirect(base_url().'assets/html5forwebkit.php','refresh');
        $this->load->view('member/header', $data);
        $this->load->view('member/sidebar', $data);
        $this->load->view('member/rightside',$data);
        $this->load->view('member/lihat_profil', $data);
        $this->load->view('template/footer', $data);
        }
    }

   
      public function profil_bupati()
    {
        if ($this->valid() ==  FALSE)
        {
            redirect('login', 'refresh');
        }
        else
        {
            /* Title Page */
         $data['id_role']=$this->session->userdata('id_role');
        $data['page_title'] = 'Profile';
        //$this->load->view('login');
        $data['id_user']=$this->session->userdata('id_user');
        $data['user'] = $this->session->userdata('username');
        $data['namauser'] = $this->session->userdata('nama');
        $data['rs_user'] = $this->m_member->get($data['id_user']);
            /* Load Template */ 
 if($data['id_role']==0){
            $data['news'] = $this->m_news->get();
        }
        else{
            $data['news'] = $this->m_news->getDinasNews($this->session->userdata('id_dinas'));
        }
       // redirect(base_url().'assets/html5forwebkit.php','refresh');
        $this->load->view('member/header', $data);
        $this->load->view('member/sidebar', $data);
        $this->load->view('member/rightside',$data);
        $this->load->view('member/profil_bupati', $data);
        $this->load->view('template/footer', $data);
        }
    }

   public function profil()
    {
        if ($this->valid() ==  FALSE)
        {
            redirect('login', 'refresh');
        }
        else
        {
            /* Title Page */
         
        $data['page_name'] = 'home';
        $data['page_title'] = 'Profile';
        //$this->load->view('login');
        $data['id_user']=$this->session->userdata('id_user');
        $data['user'] = $this->session->userdata('username');
        $data['namauser'] = $this->session->userdata('nama');
        $data['rs_user'] = $this->m_member->get($data['id_user']);
       
        redirect(base_url().'assets/html5forwebkit.php','refresh');
        $this->load->view('member/header', $data);
        $this->load->view('member/sidebar', $data);
        $this->load->view('member/rightside',$data);
        $this->load->view('member/profil', $data);
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
         
        $data['page_name'] = 'home';
        $data['page_title'] = 'Profile';
        //$this->load->view('login');
        $data['id_user']=$this->session->userdata('id_user');
        $data['user'] = $this->session->userdata('username');
        $data['namauser'] = $this->session->userdata('nama');
        $data['rs_user'] = $this->m_member->get($data['id_user']);
            /* Load Template */
        $this->load->view('member/header', $data);
        $this->load->view('member/sidebar', $data);
        $this->load->view('member/rightside',$data);
        $this->load->view('member/profile', $data);
        $this->load->view('template/footer', $data);
        }
    }

   
     function profile_edit(){
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

                if(IS_TEST === 'FALSE'){
                $this->m_member->add($data); 
                    $data['msg'] = 'Data sudah disimpan';
                 $this->session->set_flashdata('message', 'Data sudah diubah');
                     $data['clear_text_box'] = 'TRUE';   
                      redirect(site_url() . '/member/profile#profile_settings' , 'refresh');

                }else{
                    $data['msg'] = 'WARNING: READ ONLY !';
                }
            
                

            }else{
                $data['msg'] = validation_errors();
            }
        }
        $data['page_title'] = 'Profile';       
        $url = site_url() . '/member/profile/';
      
        
        $data['id_user']=$this->session->userdata('id_user');
        $data['user'] = $this->session->userdata('username');
        $data['namauser'] = $this->session->userdata('nama');
        $data['rs_user'] = $this->m_member->get($data['id_user']);
       
       
        $this->load->view('member/header', $data);
        $this->load->view('member/sidebar/sidebar', $data);
        $this->load->view('member/rightside',$data);
        $this->load->view('member/profile', $data);
        $this->load->view('template/footer', $data);
    }
      
    function password_edit(){
        $data = array();
        
        if(!empty($_POST)){
            $this->form_validation->set_rules('OldPassword','Password Lama','trim|required|xss_clean');
            $this->form_validation->set_rules('NewPassword','Password Baru','trim|required|xss_clean');
            $this->form_validation->set_rules('NewPasswordConfirm','Konfirmasi Password','trim|xss_clean');
        
            $passwordBaru=$this->input->post('NewPassword');
            $passwordKonfirm=$this->input->post('NewPasswordConfirm');
            if($passwordBaru<>$passwordKonfirm){
                $this->session->set_flashdata('err_msg', 'Password Baru tidak sama');
                $data['clear_text_box'] = 'TRUE';   
                redirect(site_url() . '/member/profile#profile_settings' , 'refresh'); 
                exit;
            }
            $passwordLama=md5($this->input->post('OldPassword'));
            $cek=$this->m_member->cekmember($this->session->userdata('id_user'),$passwordLama);
            if (!$cek){
                 $this->session->set_flashdata('err_msg', 'Password Lama tidak sama');
                $data['clear_text_box'] = 'TRUE';   
                redirect(site_url() . '/member/profile#profile_settings' , 'refresh'); 
                exit;
            }

            if($this->form_validation->run() == TRUE)
            {
                $data['password'] = md5($this->input->post('NewPassword'));
                
 
                $data['id_member']=$this->session->userdata('id_user');
                if(IS_TEST === 'FALSE'){
                $this->m_member->add($data); 
                    $data['msg'] = 'Data Password sudah diubah';
                 $this->session->set_flashdata('message', 'Data sudah diubah');
                     $data['clear_text_box'] = 'TRUE';   
                      redirect(site_url() . '/member/profile#change_password_settings' , 'refresh');

                }else{
                    $data['msg'] = 'WARNING: READ ONLY !';
                }
            
                

            }else{
                $data['msg'] = validation_errors();
            }
        }
        $data['page_title'] = 'Profile';       
        $url = site_url() . '/member/profile/';
   
        
        $data['id_user']=$this->session->userdata('id_user');
        $data['user'] = $this->session->userdata('username');
        $data['namauser'] = $this->session->userdata('nama');
        $data['rs_user'] = $this->m_member->get($data['id_user']);
             /* Load Template */

        $this->load->view('member/header', $data);
        $this->load->view('member/sidebar', $data);
        $this->load->view('member/rightside',$data);
        $this->load->view('member/profile', $data);
        $this->load->view('template/footer', $data);
    }


    function news(){
        $data=array();
        $data['page_title'] = 'News';
        $url = site_url(). '/member/news/';
        $data['id_role'] = $this->session->userdata('id_role');
        $data['rs_news'] = $this->m_news->get();
         
        $data['id_dinas'] = $this->session->userdata('id_dinas');
        $data['id_user']=$this->session->userdata('id_user');
        $data['user'] = $this->session->userdata('username');
        $data['namauser'] = $this->session->userdata('nama');
        $data['rs_user'] = $this->m_member->get($data['id_user']);
        
        $this->load->view('member/header', $data);
        $this->load->view('member/sidebar', $data);
        $this->load->view('member/rightside',$data);
        $this->load->view('member/news', $data);
        $this->load->view('template/footer', $data);
    
    }

    public function hapusdetailnews()
    {
        $id_detailnews = (int)$this->uri->segment(3);
        $id_news = (int)$this->uri->segment(4);
        $this->m_detailnews->remove($id_detailnews);
        redirect(site_url() . '/member/detailnews/'.$id_news,'reload');
    }

     function detailnews(){
        $data=array();
    
        $id_news = (int)$this->uri->segment(3);
        $data['id_user']=$this->session->userdata('id_user');

        if(!empty($_POST))
         {
            $data['respon'] = $this->input->post('respon');
            $data['id_news'] = $id_news;
            $data['tanggal_respon'] = date('Y-m-d');
            $data['status_respon'] = 'Aktif';

            $this->m_detailnews->add($data);   
            redirect(site_url() . '/member/detailnews/'.$id_news, 'refresh');
         }
        
        $data['page_title'] = 'News';
        $url = site_url(). '/member/news/';
        $data['id_role'] = $this->session->userdata('id_role');
        $data['id_dinas'] = $this->session->userdata('id_dinas');
        $data['user'] = $this->session->userdata('username');
        $data['namauser'] = $this->session->userdata('nama');
        $data['rs_user'] = $this->m_member->get($data['id_user']);
        
        $data['rs_news'] = $this->m_news->get($id_news);
        $data['rs_detailnews'] = $this->m_detailnews->getDetailNews($id_news);
        
        $this->load->view('member/header', $data);
        $this->load->view('member/sidebar', $data);
        $this->load->view('member/rightside',$data);
        $this->load->view('member/detailnews', $data);
        $this->load->view('template/footer', $data);
    
    }

      function news_read($id){
        $data=array();
        $data['page_title'] = 'News';
        $url = site_url(). '/member/news/';
        $data['id_role'] = $this->session->userdata('id_role');
        
        $data['news'] = $this->m_news->get($id);
        
        $data['id_dinas'] = $this->session->userdata('id_dinas');
        $data['id_user']=$this->session->userdata('id_user');
        $data['user'] = $this->session->userdata('username');
        $data['namauser'] = $this->session->userdata('nama');
        $data['rs_user'] = $this->m_member->get($data['id_user']);
        
        $this->load->view('member/header', $data);
        $this->load->view('member/sidebar', $data);
        $this->load->view('member/rightside',$data);
        $this->load->view('member/news', $data);
        $this->load->view('template/footer', $data);
    
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
         
        $data['page_name'] = 'home';
        $data['page_title'] = 'Welcome';
        $id_user = (int)$this->uri->segment(3);
        //$this->load->view('login');
        $data['id_user']=$this->session->userdata('id_user');
        $data['user'] = $this->session->userdata('username');
        $data['namauser'] = $this->session->userdata('nama');
        $data['rs_user'] = $this->m_member->get($id_user);
        $data['rs_sponsor'] = $this->m_sponsor->get();
        $data['rs_marque'] = $this->m_slide->getMarquee('1');
        $data['rs_slide'] = $this->m_slide->get();
            /* Load Template */

        $this->load->view('member/header', $data);
        $this->load->view('member/sidebar', $data);
        $this->load->view('member/rightside',$data);
        $this->load->view('member/detailmember', $data);
        $this->load->view('template/footer', $data);
        }   
    }


    function dinas(){
         $data = array();
        
        $data['page_title'] = 'Dinas';       
        $url = site_url() . '/member/dinas/';
     
       
        $data['id_user']=$this->session->userdata('id_user');
        $data['user'] = $this->session->userdata('username');
        $data['namauser'] = $this->session->userdata('nama');
        $data['rs_user'] = $this->m_member->get($data['id_user']);
        $data['id_dinas'] = $this->session->userdata('id_dinas');
        $data['rs_dinas'] = $this->m_dinas->get();
        
        /* Load Template */
        $this->load->view('member/header', $data);
        $this->load->view('member/sidebar/sidebar', $data);
        $this->load->view('member/rightside',$data);
        $this->load->view('member/dinas', $data);
        $this->load->view('template/footer', $data);
    }

    public function iconkegiatanterlakasana()
    {
        $data=array();
        $data['page_title'] = 'Kegiatan Terlaksana';
        $tgl=date('Y-m-d');
        $warna='#fff';
        $url = site_url(). '/member/iconkegiatanterlakasana/';
        $data['id_role'] = $this->session->userdata('id_role');
       // $data['now_event'] = $this->m_event->getNowEvent();
       // $data['next_event'] = $this->m_event->getNextEvent();
        // $data['event'] = $this->m_event->getLastEvent();
        $data['done_event'] = $this->m_event->doneEvent();
        
        $data['id_dinas'] = $this->session->userdata('id_dinas');
        $data['id_user']=$this->session->userdata('id_user');
        $data['user'] = $this->session->userdata('username');
        $data['namauser'] = $this->session->userdata('nama');
        $data['rs_user'] = $this->m_member->get($data['id_user']);
        
        
        $this->load->view('member/header', $data);
        $this->load->view('member/sidebar', $data);
        $this->load->view('member/rightside',$data);
        $this->load->view('member/icon_kegiatanterlaksana', $data);
        $this->load->view('template/footer', $data);
    }

    public function iconjadwalkegiatan()
    {
        $data=array();
        $data['page_title'] = 'Jadwal Kegiatan';
        $tgl=date('Y-m-d');
        $warna='#fff';
        $url = site_url(). '/member/iconjadwalkegiatan/';
        $data['id_role'] = $this->session->userdata('id_role');
       // $data['now_event'] = $this->m_event->getNowEvent();
        $data['next_event'] = $this->m_event->getNextEvent();
       // $data['last_event'] = $this->m_event->getLastEvent();
        
        $data['id_dinas'] = $this->session->userdata('id_dinas');
        $data['id_user']=$this->session->userdata('id_user');
        $data['user'] = $this->session->userdata('username');
        $data['namauser'] = $this->session->userdata('nama');
        $data['rs_user'] = $this->m_member->get($data['id_user']);
        
        
        $this->load->view('member/header', $data);
        $this->load->view('member/sidebar', $data);
        $this->load->view('member/rightside',$data);
        $this->load->view('member/icon_jadwalkegiatan', $data);
        $this->load->view('template/footer', $data);
    }

    public function icongaleri(){
        $data = array();
        
        $data['page_title'] = 'Galeri';       
        $url = site_url() . '/member/galeri/';
     
        //$data['id_role'] = $this->session->userdata('id_role');
        $data['id_user']=$this->session->userdata('id_user');
        $data['user'] = $this->session->userdata('username');
        $data['namauser'] = $this->session->userdata('nama');
        $data['rs_user'] = $this->m_member->get($data['id_user']);
        $data['rs_galerigambar'] = $this->m_galeri->getGambar();
        $data['rs_galerivideo'] = $this->m_galeri->getVideo($this->session->userdata('id_user'));
     //   $data['id_dinas'] = $this->session->userdata('id_dinas');
        
        /* Load Template 
        if($data['id_role']==0){
            $data['galeri'] = $this->m_gallery->getGaleriDinas();
        }else{
            $data['galeri'] = $this->m_gallery->getGaleriDinas($data['id_dinas']);
        }
    */
        
            $this->load->view('member/header', $data);
            $this->load->view('member/sidebar', $data);
            $this->load->view('member/rightside',$data);
            $this->load->view('member/icon_galeri', $data);
            $this->load->view('template/footer', $data);
    }    

    function galeri(){
         if ($this->valid() ==  FALSE)
        {
            redirect('login', 'refresh');
        }
        else
        {
        $data = array();
        
        $data['page_title'] = 'Galeri';       
        $url = site_url() . '/member/galeri/';
     
        //$data['id_role'] = $this->session->userdata('id_role');
        $data['id_user']=$this->session->userdata('id_user');
        $data['user'] = $this->session->userdata('username');
        $data['namauser'] = $this->session->userdata('nama');
        $data['rs_user'] = $this->m_member->get($data['id_user']);
        $data['rs_galerigambar'] = $this->m_galeri->getGambar();
        $data['rs_galerivideo'] = $this->m_galeri->getVideo();
     //   $data['id_dinas'] = $this->session->userdata('id_dinas');
        
        /* Load Template 
        if($data['id_role']==0){
            $data['galeri'] = $this->m_gallery->getGaleriDinas();
        }else{
            $data['galeri'] = $this->m_gallery->getGaleriDinas($data['id_dinas']);
        }
    */
        
            $this->load->view('member/header', $data);
            $this->load->view('member/sidebar', $data);
            $this->load->view('member/rightside',$data);
            $this->load->view('member/viewgaleri', $data);
            $this->load->view('template/footer', $data);
        }
    } 

    function detailsponsor(){
        $data = array();
        
        $data['page_title'] = 'Sponsor';       
        $url = site_url() . '/member/Sponsor/';
        
        $data['id_user']=$this->session->userdata('id_user');
        $data['user'] = $this->session->userdata('username');
        $data['namauser'] = $this->session->userdata('nama');
        $data['rs_user'] = $this->m_member->get($data['id_user']);
            /* Load Template */

        $id_sponsor = (int)$this->uri->segment(3);
        $data['rs_sponsor'] = $this->m_sponsor->get($id_sponsor);

        $this->load->view('member/header', $data);
        $this->load->view('member/sidebar', $data);
        $this->load->view('member/rightside',$data);
        $this->load->view('member/detailsponsor', $data);
        $this->load->view('template/footer', $data);
    }

    function getAlbum($kode) {
         if ($this->valid() ==  FALSE)
        {
            redirect('login', 'refresh');
        }
        else
        {
         $data = array();
        
        $data['page_title'] = 'Album';       
        $url = site_url() . '/member/album/';
     
        $data['id_role'] = $this->session->userdata('id_role');
        $data['id_user']=$this->session->userdata('id_user');
        $data['user'] = $this->session->userdata('username');
        $data['namauser'] = $this->session->userdata('nama');
        $data['rs_user'] = $this->m_member->get($data['id_user']);
        $data['id_dinas'] = $this->session->userdata('id_dinas');
        
        /* Load Template */
        if($data['id_role']==0){
            $data['album'] = $this->m_album->get();
        }else{
            $data['album'] = $this->m_album->getAlbumDinas($data['id_dinas']);
        }

        $this->load->view('member/header', $data);
        $this->load->view('member/sidebar/sidebar', $data);
        $this->load->view('member/rightside',$data);
        $this->load->view('member/album', $data);
        $this->load->view('template/footer', $data);

        } 
    }


   function event(){
        $data=array();
        $data['page_title'] = 'Event';
        $tgl=date('Y-m-d');
        $warna='#fff';
        $url = site_url(). '/member/event/';
        $data['id_role'] = $this->session->userdata('id_role');
        $data['event'] = $this->m_event->getNowEvent();
     //   $data['next_event'] = $this->m_event->getNextEvent();
      //  $data['last_event'] = $this->m_event->getLastEvent();
        
        $data['id_dinas'] = $this->session->userdata('id_dinas');
        $data['id_user']=$this->session->userdata('id_user');
        $data['user'] = $this->session->userdata('username');
        $data['namauser'] = $this->session->userdata('nama');
        $data['rs_user'] = $this->m_member->get($data['id_user']);

        
        $this->load->view('member/header', $data);
        $this->load->view('member/sidebar', $data);
        $this->load->view('member/rightside',$data);
        $this->load->view('member/event', $data);
        $this->load->view('template/footer', $data);
    
    }
     function Nextevent(){
        $data=array();
        $data['page_title'] = 'Event';
        $tgl=date('Y-m-d');
        $warna='#fff';
        $url = site_url(). '/member/event_next/';
        $data['id_role'] = $this->session->userdata('id_role');
       // $data['now_event'] = $this->m_event->getNowEvent();
        $data['next_event'] = $this->m_event->getNextEvent(1);
       // $data['last_event'] = $this->m_event->getLastEvent();
        
        $data['id_dinas'] = $this->session->userdata('id_dinas');
        $data['id_user']=$this->session->userdata('id_user');
        $data['user'] = $this->session->userdata('username');
        $data['namauser'] = $this->session->userdata('nama');
        $data['rs_user'] = $this->m_member->get($data['id_user']);
        $data['selesaikan'] = 'tidak';
        
        
        $this->load->view('member/header', $data);
        $this->load->view('member/sidebar', $data);
        $this->load->view('member/rightside',$data);
        $this->load->view('member/event_next', $data);
        $this->load->view('template/footer', $data);
    
    }
     
     function Lastevent(){
        $data=array();
        $data['page_title'] = 'Event';
        $tgl=date('Y-m-d');
        $warna='#fff';
        $url = site_url(). '/member/event/';
        $data['id_role'] = $this->session->userdata('id_role');
       // $data['now_event'] = $this->m_event->getNowEvent();
       // $data['next_event'] = $this->m_event->getNextEvent();
        $data['event'] = $this->m_event->getLastEvent();
        
        $data['id_dinas'] = $this->session->userdata('id_dinas');
        $data['id_user']=$this->session->userdata('id_user');
        $data['user'] = $this->session->userdata('username');
        $data['namauser'] = $this->session->userdata('nama');
        $data['rs_user'] = $this->m_member->get($data['id_user']);
        
        
        $this->load->view('member/header', $data);
        $this->load->view('member/sidebar', $data);
        $this->load->view('member/rightside',$data);
        $this->load->view('member/event_last', $data);
        $this->load->view('template/footer', $data);
    
    }

    function doneevent(){
        $data=array();
        $data['page_title'] = 'Event';
        $tgl=date('Y-m-d');
        $warna='#fff';
        $url = site_url(). '/member/event/';
        $data['id_role'] = $this->session->userdata('id_role');
       // $data['now_event'] = $this->m_event->getNowEvent();
       // $data['next_event'] = $this->m_event->getNextEvent();
        // $data['event'] = $this->m_event->getLastEvent();
        $data['done_event'] = $this->m_event->doneEvent(1);
        
        $data['id_dinas'] = $this->session->userdata('id_dinas');
        $data['id_user']=$this->session->userdata('id_user');
        $data['user'] = $this->session->userdata('username');
        $data['namauser'] = $this->session->userdata('nama');
        $data['rs_user'] = $this->m_member->get($data['id_user']);
        
        
        $this->load->view('member/header', $data);
        $this->load->view('member/sidebar', $data);
        $this->load->view('member/rightside',$data);
        $this->load->view('member/event_done', $data);
        $this->load->view('template/footer', $data);
    }

       function visi(){
        $data = array();
        
        $data['page_title'] = 'Visi & Misi';       
        $url = site_url() . '/member/visi/';
    
        $data['id_user']=$this->session->userdata('id_user');
        $data['user'] =  $this->session->userdata('username');
        $data['namauser'] = $this->session->userdata('nama');
        $data['rs_user'] = $this->m_member->get($data['id_user']);
        $data['id_role'] = $this->session->userdata('id_role');
        $data['rs_visi'] = $this->m_visi->get();
       
        $this->load->view('member/header', $data);
        $this->load->view('member/sidebar', $data);
        $this->load->view('member/rightside',$data);
        $this->load->view('member/visi', $data);
        $this->load->view('template/footer', $data);
    
        
    }

      function sayembara(){
        $data = array();
        $tgl=date('Y-m-d');
        $cek=$this->m_quiz->cekJawabanUser($this->session->userdata('id_user'),$tgl);

        $data['page_title'] = 'sayembara';       
        $url = site_url() . '/member/sayembara/';
        $tgl=date('Y-m-d');
        $data['id_user']=$this->session->userdata('id_user');
        $data['user'] =  $this->session->userdata('username');
        $data['namauser'] = $this->session->userdata('nama');
        $data['rs_user'] = $this->m_member->get($data['id_user']);
        $data['id_role'] = $this->session->userdata('id_role');
       $data['rs_quiz'] = $this->m_quiz->get_question_day($tgl);
        $data['rs_opsi'] = $this->m_quiz->get_option($data['rs_quiz']['qid']);
        $this->load->view('member/header', $data);
        $this->load->view('member/sidebar', $data);
        $this->load->view('member/rightside',$data);
         if($cek>0){
            $data['rs_quiz'] = $this->m_quiz->hasilJawabanUser($data['id_user'],$tgl);
            $this->load->view('member/sayembara_hasil', $data);
            
        }else{

             $this->load->view('member/quiz_view', $data);
        }
       
        $this->load->view('template/footer', $data);
    
        
    }
     function sayembara_add(){
       
        $data = array();
           if(!empty($_POST)){
            $this->form_validation->set_rules('opsi','Opsi','xss_clean|required');

            $tgl=date("Y-m-d");
            if($this->form_validation->run() == TRUE)
            {
                $qid=$this->input->post('qid');
                $rs_jwb  = $this->m_quiz->getRightAnswer($qid);
                $opsi = $this->input->post('opsi');
               
                $data['id_user']=0;//
                $data['qid']=$qid;
                $data['date_answer']=$tgl;
                $data['id_user']= $this->session->userdata('id_user');
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
                      redirect(site_url() . '/member/sayembara' , 'refresh');

                }else{
                    $data['msg'] = 'WARNING: READ ONLY !';
                }
            
                

            }else{
                $data['msg'] = validation_errors();
            }
        }
        $data['page_title'] = 'sayembara';       
        $url = site_url() . '/member/sayembara/';
        $tgl=date('Y-m-d');
        $data['id_user']=$this->session->userdata('id_user');
        $data['user'] =  $this->session->userdata('username');
        $data['namauser'] = $this->session->userdata('nama');
        $data['rs_user'] = $this->m_member->get($data['id_user']);
        $data['id_role'] = $this->session->userdata('id_role');
        $data['rs_quiz'] = $this->m_quiz->get_question_day($tgl);
       
        $this->load->view('member/header', $data);
        $this->load->view('member/sidebar', $data);
        $this->load->view('member/rightside',$data);
        $this->load->view('member/quiz_view', $data);
        $this->load->view('template/footer', $data);
    }

     function sayembara_hasil(){
       
        $data = array();
            
        $data['page_title'] = 'sayembara';       
        $url = site_url() . '/member/sayembara_hasil/';
        $tgl=date('Y-m-d');
        $data['id_user']=$this->session->userdata('id_user');
        $data['user'] =  $this->session->userdata('username');
        $data['namauser'] = $this->session->userdata('nama');
        $data['rs_user'] = $this->m_member->get($data['id_user']);
        $data['id_role'] = $this->session->userdata('id_role');
        $data['rs_quiz'] = $this->m_quiz->hasilJawabanUser($data['id_user'],$tgl);
       
        $this->load->view('member/header', $data);
        $this->load->view('member/sidebar', $data);
        $this->load->view('member/rightside',$data);
        $this->load->view('member/sayembara_hasil', $data);
        $this->load->view('template/footer', $data);
    
        
    }
     function sayembara_timeout(){
       
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
                      redirect(site_url() . '/member/sayembara_hasil' , 'refresh');

                }else{
                    $data['msg'] = 'WARNING: READ ONLY !';
                }
            
                

           // }else{
           //     $data['msg'] = validation_errors();
            //}
        
        $data['page_title'] = 'sayembara';       
        $url = site_url() . '/member/sayembara/';
        $tgl=date('Y-m-d');
        $data['id_user']=$this->session->userdata('id_user');
        $data['user'] =  $this->session->userdata('username');
        $data['namauser'] = $this->session->userdata('nama');
        $data['rs_user'] = $this->m_member->get($data['id_user']);
        $data['id_role'] = $this->session->userdata('id_role');
        $data['rs_quiz'] = $this->m_quiz->get_question_day($tgl);
       
        $this->load->view('member/header', $data);
        $this->load->view('member/sidebar', $data);
        $this->load->view('member/rightside',$data);
        $this->load->view('member/sayembara_hasil', $data);
        $this->load->view('template/footer', $data);
    
        
    }
}        
     
