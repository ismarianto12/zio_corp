<?php

/*developed by ismarianto putra
  you can visit my site in ismarianto.com
  for more complain anda more information.  
*/

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jenis extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Jenis_model');
        $this->load->library('form_validation');   
	$this->load->library('datatables');
    }

    public function index()
    {
         $x['page_title'] = 'Data : Jenis';
         $this->template->load('template','jenis/jenis_list',$x);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Jenis_model->json();
    }

    public function detail($id) 
    {
        $row = $this->Jenis_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'jenisnm' => $row->jenisnm,
		'user_id' => $row->user_id,
		'create_at' => $row->create_at,
		'update_at' => $row->update_at,
	    
'page_title'=>'Detail :  JENIS',
);
            $this->template->load('template','jenis/jenis_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-warniing fade-in">Data Tidak Di Temukan.</div>');
            redirect(site_url('jenis'));
        }
    }

    public function tambah() 
    {
        $data = array(
            'page_title'=>'Tambah Jenis',
            'button' => 'Create',
            'action' => site_url('jenis/tambah_data'),
	    'id' => set_value('id'),
	    'jenisnm' => set_value('jenisnm'),
	    'user_id' => set_value('user_id'),
	    'create_at' => set_value('create_at'),
	    'update_at' => set_value('update_at'),
	);
        $this->template->load('template','jenis/jenis_form', $data);
    }
    
    public function tambah_data() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->tambah();
        } else {
            $data = array(
		'jenisnm' => $this->input->post('jenisnm',TRUE),
		'user_id' => $this->input->post('user_id',TRUE),
		'create_at' => $this->input->post('create_at',TRUE),
		'update_at' => $this->input->post('update_at',TRUE),
	    );

            $this->Jenis_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success fade-in"><i class="fa fa-check"></i>Data Berhasil Di Tambahkan.</div>');
            redirect(site_url('jenis'));
        }
    }
    
    public function edit($id) 
    {
        $row = $this->Jenis_model->get_by_id($id);

        if ($row) {
            $data = array(
                'page_title'=>'Data JENIS',
                'button' => 'Update',
                'action' => site_url('jenis/edit_data'),
		'id' => set_value('id', $row->id),
		'jenisnm' => set_value('jenisnm', $row->jenisnm),
		'user_id' => set_value('user_id', $row->user_id),
		'create_at' => set_value('create_at', $row->create_at),
		'update_at' => set_value('update_at', $row->update_at),
	    );
             $this->template->load('template','jenis/jenis_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-info fade-in">Data Tidak Di Temukan.</div>');
            redirect(site_url('jenis'));
        }
    }
    
    public function edit_data() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->edit($this->input->post('id', TRUE));
        } else {
            $data = array(
		'jenisnm' => $this->input->post('jenisnm',TRUE),
		'user_id' => $this->input->post('user_id',TRUE),
		'create_at' => $this->input->post('create_at',TRUE),
		'update_at' => $this->input->post('update_at',TRUE),
	    );

            $this->Jenis_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success fade-in"><i class="fa fa-check"></i>Edit Data Berhasil.</div>');
            redirect(site_url('jenis'));
        }
    }
    
    public function hapus($id) 
    {
        $row = $this->Jenis_model->get_by_id($id);

        if ($row) {
            $this->Jenis_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert alert-danger fade-in"><i class="fa fa-check"></i>Data Berhasil Di Hapus</div>');
            redirect(site_url('jenis'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-warniing fade-in">Ops Something Went Wrong Please Contact Administrator.</div>');
            redirect(site_url('jenis'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('jenisnm', 'jenisnm', 'trim|required');
	$this->form_validation->set_rules('user_id', 'user id', 'trim|required');
	$this->form_validation->set_rules('create_at', 'create at', 'trim|required');
	$this->form_validation->set_rules('update_at', 'update at', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

