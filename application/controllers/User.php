<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        /* Load :: Common */
           $this->load->model(array('m_login','m_dinas',
         'm_news',
         'm_user','m_event',
         'm_gallery',
         'm_album','m_visi','m_quiz'));
         define('IS_TEST','FALSE');
         
    }

    private function portal($role)
    {
        switch($role)
        {
          // case 1:redirect('/user','location');break;
           case 1:redirect('/user','location');break;
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
        $this->load->view('user/sidebar', $data);
        $this->load->view('template/rightside',$data);
        $this->load->view('user/dashboard', $data);
        $this->load->view('template/footer', $data);
        }
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
        $data['rs_user'] = $this->m_user->get($data['id_user']);
            /* Load Template */
        $data['rs_user_dinas'] = $this->m_user->getDinas($data['id_user']);
 
        // redirect(base_url().'assets/html5forwebkit.php','refresh');
        $this->load->view('template/header', $data);
        $this->load->view('user/sidebar', $data);
        $this->load->view('template/rightside',$data);
        $this->load->view('user/lihat_profil', $data);
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
        $data['rs_user'] = $this->m_user->get($data['id_user']);
            /* Load Template */
        $data['rs_user_dinas'] = $this->m_user->getDinas($data['id_user']);
// if($data['id_role']==0){
            $data['news'] = $this->m_news->get();
      //  }
     //   else{
      //      $data['news'] = $this->m_news->getDinasNews($this->session->userdata('id_dinas'));
      //  }
       // redirect(base_url().'assets/html5forwebkit.php','refresh');
        $this->load->view('template/header', $data);
        $this->load->view('user/sidebar', $data);
        $this->load->view('template/rightside',$data);
        $this->load->view('user/profil_bupati', $data);
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
        $data['rs_user'] = $this->m_user->get($data['id_user']);
            /* Load Template */
        $data['rs_user_dinas'] = $this->m_user->getDinas($data['id_user']);

        redirect(base_url().'assets/html5forwebkit.php','refresh');
        $this->load->view('template/header', $data);
        $this->load->view('user/sidebar', $data);
        $this->load->view('template/rightside',$data);
        $this->load->view('user/profil', $data);
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
        $data['rs_user'] = $this->m_user->get($data['id_user']);
            /* Load Template */
        $data['rs_user_dinas'] = $this->m_user->getDinas($data['id_user']);
        $this->load->view('template/header', $data);
        $this->load->view('user/sidebar', $data);
        $this->load->view('template/rightside',$data);
        $this->load->view('user/profile', $data);
        $this->load->view('template/footer', $data);
        }
    }

   
     function profile_edit(){
        $data = array();
        
        if(!empty($_POST)){
            $this->form_validation->set_rules('nama','Nama','trim|required|xss_clean');
            $this->form_validation->set_rules('email','email','trim|required|valid_email|xss_clean');
            $this->form_validation->set_rules('no_telepon','No Telepon','trim|xss_clean');
        
            if($this->form_validation->run() == TRUE)
            {
                $data['nama']   = $this->input->post('nama');
                $data['telepon']   = $this->input->post('no_telepon');
                $data['email'] = $this->input->post('email');
                $data['id_user']=$this->session->userdata('id_user');
                if(IS_TEST === 'FALSE'){
                $this->m_user->add($data); 
                    $data['msg'] = 'Data sudah disimpan';
                 $this->session->set_flashdata('message', 'Data sudah diubah');
                     $data['clear_text_box'] = 'TRUE';   
                      redirect(base_url() . 'user/profile#profile_settings' , 'refresh');

                }else{
                    $data['msg'] = 'WARNING: READ ONLY !';
                }
            
                

            }else{
                $data['msg'] = validation_errors();
            }
        }
        $data['page_title'] = 'Profile';       
        $url = base_url() . 'user/profile/';
      
        
        $data['id_user']=$this->session->userdata('id_user');
        $data['user'] = $this->session->userdata('username');
        $data['namauser'] = $this->session->userdata('nama');
        $data['rs_user'] = $this->m_user->get($data['id_user']);
        $data['rs_user_dinas'] = $this->m_user->getDinas($data['id_user']); 
            /* Load Template */

       
        $this->load->view('template/header', $data);
        $this->load->view('user/sidebar/sidebar', $data);
        $this->load->view('template/rightside',$data);
        $this->load->view('user/profile', $data);
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
                redirect(base_url() . 'user/profile#profile_settings' , 'refresh'); 
                exit;
            }
            $passwordLama=md5($this->input->post('OldPassword'));
            $cek=$this->m_user->cekUser($this->session->userdata('id_user'),$passwordLama);
            if (!$cek){
                 $this->session->set_flashdata('err_msg', 'Password Lama tidak sama');
                $data['clear_text_box'] = 'TRUE';   
                redirect(base_url() . 'user/profile#profile_settings' , 'refresh'); 
                exit;
            }

            if($this->form_validation->run() == TRUE)
            {
                $data['password'] = md5($this->input->post('NewPassword'));
                
 
                $data['id_user']=$this->session->userdata('id_user');
                if(IS_TEST === 'FALSE'){
                $this->m_user->add($data); 
                    $data['msg'] = 'Data Password sudah diubah';
                 $this->session->set_flashdata('message', 'Data sudah diubah');
                     $data['clear_text_box'] = 'TRUE';   
                      redirect(base_url() . 'user/profile#change_password_settings' , 'refresh');

                }else{
                    $data['msg'] = 'WARNING: READ ONLY !';
                }
            
                

            }else{
                $data['msg'] = validation_errors();
            }
        }
        $data['page_title'] = 'Profile';       
        $url = base_url() . 'user/profile/';
   
        
        $data['id_user']=$this->session->userdata('id_user');
        $data['user'] = $this->session->userdata('username');
        $data['namauser'] = $this->session->userdata('nama');
        $data['rs_user'] = $this->m_user->get($data['id_user']);
        $data['rs_user_dinas'] = $this->m_user->getDinas($data['id_user']); 
            /* Load Template */

        $this->load->view('template/header', $data);
        $this->load->view('user/sidebar', $data);
        $this->load->view('template/rightside',$data);
        $this->load->view('user/profile', $data);
        $this->load->view('template/footer', $data);
    }


    function news(){
        $data=array();
        $data['page_title'] = 'News';
        $url = base_url(). 'user/news/';
        $data['id_role'] = $this->session->userdata('id_role');
        if($data['id_role']==0){
            $data['news'] = $this->m_news->get();
        }
        else{
            $data['news'] = $this->m_news->getDinasNews($this->session->userdata('id_dinas'));
        }
        $data['id_dinas'] = $this->session->userdata('id_dinas');
        $data['id_user']=$this->session->userdata('id_user');
        $data['user'] = $this->session->userdata('username');
        $data['namauser'] = $this->session->userdata('nama');
        $data['rs_user'] = $this->m_user->get($data['id_user']);
        
        $this->load->view('template/header', $data);
        $this->load->view('user/sidebar', $data);
        $this->load->view('template/rightside',$data);
        $this->load->view('user/news', $data);
        $this->load->view('template/footer', $data);
    
    }

      function news_read($id){
        $data=array();
        $data['page_title'] = 'News';
        $url = base_url(). 'user/news/';
        $data['id_role'] = $this->session->userdata('id_role');
        
        $data['news'] = $this->m_news->get($id);
        
        $data['id_dinas'] = $this->session->userdata('id_dinas');
        $data['id_user']=$this->session->userdata('id_user');
        $data['user'] = $this->session->userdata('username');
        $data['namauser'] = $this->session->userdata('nama');
        $data['rs_user'] = $this->m_user->get($data['id_user']);
        
        $this->load->view('template/header', $data);
        $this->load->view('user/sidebar', $data);
        $this->load->view('template/rightside',$data);
        $this->load->view('user/news', $data);
        $this->load->view('template/footer', $data);
    
    }


    function dinas(){
         $data = array();
        
        $data['page_title'] = 'Dinas';       
        $url = base_url() . 'user/dinas/';
     
       
        $data['id_user']=$this->session->userdata('id_user');
        $data['user'] = $this->session->userdata('username');
        $data['namauser'] = $this->session->userdata('nama');
        $data['rs_user'] = $this->m_user->get($data['id_user']);
        $data['id_dinas'] = $this->session->userdata('id_dinas');
        $data['rs_dinas'] = $this->m_dinas->get();
        
        /* Load Template */
        $this->load->view('template/header', $data);
        $this->load->view('user/sidebar/sidebar', $data);
        $this->load->view('template/rightside',$data);
        $this->load->view('user/dinas', $data);
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
        
        $data['page_title'] = 'Geleri';       
        $url = base_url() . 'user/galeri/';
     
        //$data['id_role'] = $this->session->userdata('id_role');
        $data['id_user']=$this->session->userdata('id_user');
        $data['user'] = $this->session->userdata('username');
        $data['namauser'] = $this->session->userdata('nama');
        $data['rs_user'] = $this->m_user->get($data['id_user']);
     //   $data['id_dinas'] = $this->session->userdata('id_dinas');
        
        /* Load Template 
        if($data['id_role']==0){
            $data['galeri'] = $this->m_gallery->getGaleriDinas();
        }else{
            $data['galeri'] = $this->m_gallery->getGaleriDinas($data['id_dinas']);
        }
    */
        
        $this->load->view('user/galeri_sampel', $data);
        }
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
        $url = base_url() . 'user/album/';
     
        $data['id_role'] = $this->session->userdata('id_role');
        $data['id_user']=$this->session->userdata('id_user');
        $data['user'] = $this->session->userdata('username');
        $data['namauser'] = $this->session->userdata('nama');
        $data['rs_user'] = $this->m_user->get($data['id_user']);
        $data['id_dinas'] = $this->session->userdata('id_dinas');
        
        /* Load Template */
        if($data['id_role']==0){
            $data['album'] = $this->m_album->get();
        }else{
            $data['album'] = $this->m_album->getAlbumDinas($data['id_dinas']);
        }

        $this->load->view('template/header', $data);
        $this->load->view('user/sidebar/sidebar', $data);
        $this->load->view('template/rightside',$data);
        $this->load->view('user/album', $data);
        $this->load->view('template/footer', $data);

        } 
    }


   function event(){
        $data=array();
        $data['page_title'] = 'Event';
        $tgl=date('Y-m-d');
        $warna='#fff';
        $url = base_url(). 'user/event/';
        $data['id_role'] = $this->session->userdata('id_role');
        $data['event'] = $this->m_event->getNowEvent();
     //   $data['next_event'] = $this->m_event->getNextEvent();
      //  $data['last_event'] = $this->m_event->getLastEvent();
        
        $data['id_dinas'] = $this->session->userdata('id_dinas');
        $data['id_user']=$this->session->userdata('id_user');
        $data['user'] = $this->session->userdata('username');
        $data['namauser'] = $this->session->userdata('nama');
        $data['rs_user'] = $this->m_user->get($data['id_user']);
        
        $this->load->view('template/header', $data);
        $this->load->view('user/sidebar', $data);
        $this->load->view('template/rightside',$data);
        $this->load->view('user/event', $data);
        $this->load->view('template/footer', $data);
    
    }
     function Nextevent(){
        $data=array();
        $data['page_title'] = 'Event';
        $tgl=date('Y-m-d');
        $warna='#fff';
        $url = base_url(). 'user/event_next/';
        $data['id_role'] = $this->session->userdata('id_role');
       // $data['now_event'] = $this->m_event->getNowEvent();
        $data['event'] = $this->m_event->getNextEvent();
       // $data['last_event'] = $this->m_event->getLastEvent();
        
        $data['id_dinas'] = $this->session->userdata('id_dinas');
        $data['id_user']=$this->session->userdata('id_user');
        $data['user'] = $this->session->userdata('username');
        $data['namauser'] = $this->session->userdata('nama');
        $data['rs_user'] = $this->m_user->get($data['id_user']);
        
        
        $this->load->view('template/header', $data);
        $this->load->view('user/sidebar', $data);
        $this->load->view('template/rightside',$data);
        $this->load->view('user/event', $data);
        $this->load->view('template/footer', $data);
    
    }
     
     function Lastevent(){
        $data=array();
        $data['page_title'] = 'Event';
        $tgl=date('Y-m-d');
        $warna='#fff';
        $url = base_url(). 'user/event/';
        $data['id_role'] = $this->session->userdata('id_role');
       // $data['now_event'] = $this->m_event->getNowEvent();
       // $data['next_event'] = $this->m_event->getNextEvent();
        $data['event'] = $this->m_event->getLastEvent();
        
        $data['id_dinas'] = $this->session->userdata('id_dinas');
        $data['id_user']=$this->session->userdata('id_user');
        $data['user'] = $this->session->userdata('username');
        $data['namauser'] = $this->session->userdata('nama');
        $data['rs_user'] = $this->m_user->get($data['id_user']);
        
        
        $this->load->view('template/header', $data);
        $this->load->view('user/sidebar', $data);
        $this->load->view('template/rightside',$data);
        $this->load->view('user/event_last', $data);
        $this->load->view('template/footer', $data);
    
    }
       function visi(){
        $data = array();
        
        $data['page_title'] = 'Visi & Misi';       
        $url = base_url() . 'user/visi/';
    
        $data['id_user']=$this->session->userdata('id_user');
        $data['user'] =  $this->session->userdata('username');
        $data['namauser'] = $this->session->userdata('nama');
        $data['rs_user'] = $this->m_user->get($data['id_user']);
        $data['id_role'] = $this->session->userdata('id_role');
        $data['rs_visi'] = $this->m_visi->get();
       
        $this->load->view('template/header', $data);
        $this->load->view('user/sidebar', $data);
        $this->load->view('template/rightside',$data);
        $this->load->view('user/visi', $data);
        $this->load->view('template/footer', $data);
    
        
    }

      function sayembara(){
        $data = array();
        $tgl=date('Y-m-d');
        $cek=$this->m_quiz->cekJawabanUser($this->session->userdata('id_user'),$tgl);

        $data['page_title'] = 'sayembara';       
        $url = base_url() . 'user/sayembara/';
        $tgl=date('Y-m-d');
        $data['id_user']=$this->session->userdata('id_user');
        $data['user'] =  $this->session->userdata('username');
        $data['namauser'] = $this->session->userdata('nama');
        $data['rs_user'] = $this->m_user->get($data['id_user']);
        $data['id_role'] = $this->session->userdata('id_role');
       $data['rs_quiz'] = $this->m_quiz->get_question_day($tgl);
        $data['rs_opsi'] = $this->m_quiz->get_option($data['rs_quiz']['qid']);
        $this->load->view('template/header', $data);
        $this->load->view('user/sidebar', $data);
        $this->load->view('template/rightside',$data);
         if($cek>0){
            $data['rs_quiz'] = $this->m_quiz->hasilJawabanUser($data['id_user'],$tgl);
            $this->load->view('user/sayembara_hasil', $data);
            
        }else{

             $this->load->view('user/quiz_view', $data);
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
                      redirect(base_url() . 'user/sayembara' , 'refresh');

                }else{
                    $data['msg'] = 'WARNING: READ ONLY !';
                }
            
                

            }else{
                $data['msg'] = validation_errors();
            }
        }
        $data['page_title'] = 'sayembara';       
        $url = base_url() . 'user/sayembara/';
        $tgl=date('Y-m-d');
        $data['id_user']=$this->session->userdata('id_user');
        $data['user'] =  $this->session->userdata('username');
        $data['namauser'] = $this->session->userdata('nama');
        $data['rs_user'] = $this->m_user->get($data['id_user']);
        $data['id_role'] = $this->session->userdata('id_role');
        $data['rs_quiz'] = $this->m_quiz->get_question_day($tgl);
       
        $this->load->view('template/header', $data);
        $this->load->view('user/sidebar', $data);
        $this->load->view('template/rightside',$data);
        $this->load->view('user/quiz_view', $data);
        $this->load->view('template/footer', $data);
    
        
    }
     function sayembara_hasil(){
       
        $data = array();
            
        $data['page_title'] = 'sayembara';       
        $url = base_url() . 'user/sayembara_hasil/';
        $tgl=date('Y-m-d');
        $data['id_user']=$this->session->userdata('id_user');
        $data['user'] =  $this->session->userdata('username');
        $data['namauser'] = $this->session->userdata('nama');
        $data['rs_user'] = $this->m_user->get($data['id_user']);
        $data['id_role'] = $this->session->userdata('id_role');
        $data['rs_quiz'] = $this->m_quiz->hasilJawabanUser($data['id_user'],$tgl);
       
        $this->load->view('template/header', $data);
        $this->load->view('user/sidebar', $data);
        $this->load->view('template/rightside',$data);
        $this->load->view('user/sayembara_hasil', $data);
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
                      redirect(base_url() . 'user/sayembara_hasil' , 'refresh');

                }else{
                    $data['msg'] = 'WARNING: READ ONLY !';
                }
            
                

           // }else{
           //     $data['msg'] = validation_errors();
            //}
        
        $data['page_title'] = 'sayembara';       
        $url = base_url() . 'user/sayembara/';
        $tgl=date('Y-m-d');
        $data['id_user']=$this->session->userdata('id_user');
        $data['user'] =  $this->session->userdata('username');
        $data['namauser'] = $this->session->userdata('nama');
        $data['rs_user'] = $this->m_user->get($data['id_user']);
        $data['id_role'] = $this->session->userdata('id_role');
        $data['rs_quiz'] = $this->m_quiz->get_question_day($tgl);
       
        $this->load->view('template/header', $data);
        $this->load->view('user/sidebar', $data);
        $this->load->view('template/rightside',$data);
        $this->load->view('user/sayembara_hasil', $data);
        $this->load->view('template/footer', $data);
    
        
    }
}        
     
