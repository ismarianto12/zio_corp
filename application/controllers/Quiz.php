<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quiz extends CI_Controller
{

	function __construct(){
		parent::__construct();
		       
           $this->load->model(array('m_login','m_dinas',
         'm_news',
         'm_user',
         'm_gallery',
         'm_album','m_quiz'));
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
         
        $data['page_name'] = 'quiz';
        $data['page_title'] = 'Quiz';
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

  function quiz_tmb()
  {
     // $choices = array();
     // $dataquestion = array();

     $data['waktu_qinti'] = $this->input->post('timer');
     $data['tanggal_qinti'] = $this->input->post('tanggal');

     $dataquestion = $this->input->post('item_soal');
     $correct = $this->input->post('item_correct');
     $choice1 = $this->input->post('item_choice1');
     $choice2 = $this->input->post('item_choice2');
     $choice3 = $this->input->post('item_choice3');
     $choice4 = $this->input->post('item_choice4');

     // foreach($dataquestion as $dq => $vdq){
     //    $data['question'] = $vdq;
     //    $qid = $this->m_quiz->add($data);
     // }

     $loopchicoe = 0;
     $qid = $this->m_quiz->addQInti($data);

     for($count = 0; $count<count($dataquestion); $count++)
     {
           $row['id_qinti'] = $qid;
           $row['question'] = $dataquestion[$count];
           $row['option_1'] = $choice1[$count];
           $row['option_2'] = $choice2[$count];
           $row['option_3'] = $choice3[$count];
           $row['option_4'] = $choice4[$count];
           $row['jawaban'] = $correct[$count];

           $this->m_quiz->addOptionQInti($row);

           // for($count2 = 0; $count2<4; $count2++)
           // {
                
           //     if($correct[$count] == ($count2+1)){
           //          $is_correct = 1;
           //       } else {
           //         $is_correct = 0;
           //       }
           //        $row['qid']=$qid;
           //        $row['is_correct']=$is_correct;
           //        $row['choice']=$choice[$loopchicoe];
                  
           //        $this->m_quiz->addOpsi($row); 

           //      $loopchicoe++;
           // }    
     }
  }

  function quiz_add(){
        if ($this->valid() ==  FALSE)
        {
            redirect('login', 'refresh');
        }
        else
        {
          $choices = array();
         if(!empty($_POST)){
            $this->form_validation->set_rules('soal','Soal','xss_clean|required|trim');
            $this->form_validation->set_rules('correct_choice','Jawaban yg benar','xss_clean|trim');
            $this->form_validation->set_rules('choice','Opsi ','xss_clean|trim');
            $this->form_validation->set_rules('timer','Timer','xss_clean|trim');  
            $this->form_validation->set_rules('tanggal','Tanggal','xss_clean|trim');
        
            if($this->form_validation->run() == TRUE)
            {
                $data['question'] = $this->input->post('soal');
                $data['timer'] = $this->input->post('timer');
                $data['tgl'] = $this->input->post('tanggal');
                
                $correct_choice = $this->input->post('correct_choices');
                $choices=$this->input->post('choice');

               

                if(IS_TEST === 'FALSE'){
                    $qid=$this->m_quiz->add($data);

                       foreach($choices as $choice =>$value){
                     
                        if ($value != ''){
                             if(($correct_choice-1) == $choice){
                                $is_correct = 1;
                             } else {
                               $is_correct = 0;
                             }
                        $row['qid']=$qid;
                        $row['is_correct']=$is_correct;
                        $row['choice']=$value;
                        
                        $this->m_quiz->addOpsi($row);
                       
                     }   

                }

                    
                    $data['msg'] = 'Data sudah disimpan';
                    $this->session->set_flashdata('message', 'Data sudah disimpan');
                     $data['clear_text_box'] = 'TRUE';   
                     redirect(base_url() . 'quiz/quiz_add' , 'refresh');
              }else{
                    $data['msg'] = 'WARNING: READ ONLY !';
                }
            
                

            }else{
                $data['msg'] = validation_errors();
            }
        }
        $data['page_title'] = 'Quiz';       
        $url = base_url() . 'admin/quiz/';
     
        $data['id_user']=$this->session->userdata('id_user');
        $data['user'] = $this->session->userdata('username');
        $data['namauser'] = $this->session->userdata('nama');
        $data['rs_user'] = $this->m_user->get($data['id_user']);
            /* Load Template */
        $data['rs_dinas'] = $this->m_dinas->get();
        $this->load->view('template/header', $data);
        $this->load->view('admin/sidebar/sidebar', $data);
        $this->load->view('template/rightside',$data);
        $this->load->view('admin/quiz_add', $data);
        $this->load->view('template/footer', $data);
    }
    }
	 
    // function quiz_add()
    // {
    //      if ($this->valid() ==  FALSE)
    //     {
    //         redirect('login', 'refresh');
    //     }
    //     else
    //     {
    //       $choices = array();
    //       $question = array();
    //      if(!empty($_POST)){
    //         $this->form_validation->set_rules('item_soal','Soal','xss_clean|required|trim');
    //         // $this->form_validation->set_rules('correct_choice','Jawaban yg benar','xss_clean|trim');
    //         // $this->form_validation->set_rules('choice','Opsi ','xss_clean|trim');
    //         // $this->form_validation->set_rules('timer','Timer','xss_clean|trim');  
    //         // $this->form_validation->set_rules('tanggal','Tanggal','xss_clean|trim');
        
    //         if($this->form_validation->run() == TRUE)
    //         {
    //             $question = $this->input->post('item_soal');
    //             // $data['timer'] = $this->input->post('timer');
    //             // $data['tgl'] = $this->input->post('tanggal');

    //             echo $question;
    //             echo "masuk sini";
                
    //             $correct_choice = $this->input->post('correct_choices');
    //             $choices=$this->input->post('choice');          

    //             if(IS_TEST === 'FALSE'){

    //                 for($count = 0; $count<count($question); $count++)
    //                 {
    //                    echo $question[$count];
    //                 }
    //                 // $qid=$this->m_quiz->add($data);

    //                 //    foreach($choices as $choice =>$value){
                     
    //                 //     if ($value != ''){
    //                 //      if(($correct_choice-1) == $choice){
    //                 //         $is_correct = 1;
    //                 //      } else {
    //                 //        $is_correct = 0;
    //                 //      }
    //                 //       $row['qid']=$qid;
    //                 //       $row['is_correct']=$is_correct;
    //                 //       $row['choice']=$value;
                          
    //                 //       $this->m_quiz->addOpsi($row);
                       
    //                 //  }   

    //             }

                    
    //                 $data['msg'] = 'Data sudah disimpan';
    //                 $this->session->set_flashdata('message', 'Data sudah disimpan');
    //                  $data['clear_text_box'] = 'TRUE';   
    //                  redirect(base_url() . 'quiz/quiz_add' , 'refresh');
    //           }else{
    //                 $data['msg'] = 'WARNING: READ ONLY !';

    //                 echo "masuk else 1";
    //             }
            
                

    //         }else{
    //             $data['msg'] = validation_errors();
    //             $data['page_title'] = 'Quiz';       
    //       $url = base_url() . 'admin/quiz/';
       
    //       $data['id_user']=$this->session->userdata('id_user');
    //       $data['user'] = $this->session->userdata('username');
    //       $data['namauser'] = $this->session->userdata('nama');
    //       $data['rs_user'] = $this->m_user->get($data['id_user']);
    //           /* Load Template */
    //       $data['rs_dinas'] = $this->m_dinas->get();
    //       $this->load->view('template/header', $data);
    //       $this->load->view('admin/sidebar/sidebar', $data);
    //       $this->load->view('template/rightside',$data);
    //       $this->load->view('admin/quiz_add', $data);
    //       $this->load->view('template/footer', $data);
    //         }
    //     }
    // }

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