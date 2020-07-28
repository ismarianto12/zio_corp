<?php

/*developed by ismarianto putra
  you can visit my site in ismarianto.com
  for more complain anda more information.  
*/

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Estimasi_iuran extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Estimasi_iuran_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'estimasi_iuran/?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'estimasi_iuran/?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'estimasi_iuran';
            $config['first_url'] = base_url() . 'estimasi_iuran';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Estimasi_iuran_model->total_rows($q);
        $estimasi_iuran = $this->Estimasi_iuran_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'estimasi_iuran_data' => $estimasi_iuran,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'page_title'=>'Data ESTIMASI_IURAN'
        );
        $this->template->load('template','estimasi_iuran/estimasi_iuran_list', $data);
    }

    public function detail($id) 
    {
        $row = $this->Estimasi_iuran_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'jenis_id' => $row->jenis_id,
		'subkategori_id' => $row->subkategori_id,
		'nilai' => $row->nilai,
		'quantity' => $row->quantity,
		'tot_bayar' => $row->tot_bayar,
		'jhitungadmin1' => $row->jhitungadmin1,
		'jhitungadmin2' => $row->jhitungadmin2,
		'jhitungadmin3' => $row->jhitungadmin3,
		'jpemadmin' => $row->jpemadmin,
		'user_id' => $row->user_id,
		'update_at' => $row->update_at,
		'creaate_at' => $row->creaate_at,
	    
'page_title'=>'Detail :  ESTIMASI_IURAN',
);
            $this->template->load('template','estimasi_iuran/estimasi_iuran_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-warniing fade-in">Data Tidak Di Temukan.</div>');
            redirect(site_url('estimasi_iuran'));
        }
    }

    public function tambah() 
    {
        $data = array(
            'page_title'=>'Tambah Estimasi iuran',
            'button' => 'Create',
            'action' => site_url('estimasi_iuran/tambah_data'),
	    'id' => set_value('id'),
	    'jenis_id' => set_value('jenis_id'),
	    'subkategori_id' => set_value('subkategori_id'),
	    'nilai' => set_value('nilai'),
	    'quantity' => set_value('quantity'),
	    'tot_bayar' => set_value('tot_bayar'),
	    'jhitungadmin1' => set_value('jhitungadmin1'),
	    'jhitungadmin2' => set_value('jhitungadmin2'),
	    'jhitungadmin3' => set_value('jhitungadmin3'),
	    'jpemadmin' => set_value('jpemadmin'),
	    'user_id' => set_value('user_id'),
	    'update_at' => set_value('update_at'),
	    'creaate_at' => set_value('creaate_at'),
	);
        $this->template->load('template','estimasi_iuran/estimasi_iuran_form', $data);
    }
    
    public function tambah_data() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->tambah();
        } else {
            $data = array(
		'jenis_id' => $this->input->post('jenis_id',TRUE),
		'subkategori_id' => $this->input->post('subkategori_id',TRUE),
		'nilai' => $this->input->post('nilai',TRUE),
		'quantity' => $this->input->post('quantity',TRUE),
		'tot_bayar' => $this->input->post('tot_bayar',TRUE),
		'jhitungadmin1' => $this->input->post('jhitungadmin1',TRUE),
		'jhitungadmin2' => $this->input->post('jhitungadmin2',TRUE),
		'jhitungadmin3' => $this->input->post('jhitungadmin3',TRUE),
		'jpemadmin' => $this->input->post('jpemadmin',TRUE),
		'user_id' => $this->input->post('user_id',TRUE),
		'update_at' => $this->input->post('update_at',TRUE),
		'creaate_at' => $this->input->post('creaate_at',TRUE),
	    );

            $this->Estimasi_iuran_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success fade-in"><i class="fa fa-check"></i>Data Berhasil Di Tambahkan.</div>');
            redirect(site_url('estimasi_iuran'));
        }
    }
    
    public function edit($id) 
    {
        $row = $this->Estimasi_iuran_model->get_by_id($id);

        if ($row) {
            $data = array(
                'page_title'=>'Data ESTIMASI_IURAN',
                'button' => 'Update',
                'action' => site_url('estimasi_iuran/edit_data'),
		'id' => set_value('id', $row->id),
		'jenis_id' => set_value('jenis_id', $row->jenis_id),
		'subkategori_id' => set_value('subkategori_id', $row->subkategori_id),
		'nilai' => set_value('nilai', $row->nilai),
		'quantity' => set_value('quantity', $row->quantity),
		'tot_bayar' => set_value('tot_bayar', $row->tot_bayar),
		'jhitungadmin1' => set_value('jhitungadmin1', $row->jhitungadmin1),
		'jhitungadmin2' => set_value('jhitungadmin2', $row->jhitungadmin2),
		'jhitungadmin3' => set_value('jhitungadmin3', $row->jhitungadmin3),
		'jpemadmin' => set_value('jpemadmin', $row->jpemadmin),
		'user_id' => set_value('user_id', $row->user_id),
		'update_at' => set_value('update_at', $row->update_at),
		'creaate_at' => set_value('creaate_at', $row->creaate_at),
	    );
             $this->template->load('template','estimasi_iuran/estimasi_iuran_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-info fade-in">Data Tidak Di Temukan.</div>');
            redirect(site_url('estimasi_iuran'));
        }
    }
    
    public function edit_data() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->edit($this->input->post('id', TRUE));
        } else {
            $data = array(
		'jenis_id' => $this->input->post('jenis_id',TRUE),
		'subkategori_id' => $this->input->post('subkategori_id',TRUE),
		'nilai' => $this->input->post('nilai',TRUE),
		'quantity' => $this->input->post('quantity',TRUE),
		'tot_bayar' => $this->input->post('tot_bayar',TRUE),
		'jhitungadmin1' => $this->input->post('jhitungadmin1',TRUE),
		'jhitungadmin2' => $this->input->post('jhitungadmin2',TRUE),
		'jhitungadmin3' => $this->input->post('jhitungadmin3',TRUE),
		'jpemadmin' => $this->input->post('jpemadmin',TRUE),
		'user_id' => $this->input->post('user_id',TRUE),
		'update_at' => $this->input->post('update_at',TRUE),
		'creaate_at' => $this->input->post('creaate_at',TRUE),
	    );

            $this->Estimasi_iuran_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success fade-in"><i class="fa fa-check"></i>Edit Data Berhasil.</div>');
            redirect(site_url('estimasi_iuran'));
        }
    }
    
    public function hapus($id) 
    {
        $row = $this->Estimasi_iuran_model->get_by_id($id);

        if ($row) {
            $this->Estimasi_iuran_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert alert-danger fade-in"><i class="fa fa-check"></i>Data Berhasil Di Hapus</div>');
            redirect(site_url('estimasi_iuran'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-warniing fade-in">Ops Something Went Wrong Please Contact Administrator.</div>');
            redirect(site_url('estimasi_iuran'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('jenis_id', 'jenis id', 'trim|required');
	$this->form_validation->set_rules('subkategori_id', 'subkategori id', 'trim|required');
	$this->form_validation->set_rules('nilai', 'nilai', 'trim|required');
	$this->form_validation->set_rules('quantity', 'quantity', 'trim|required');
	$this->form_validation->set_rules('tot_bayar', 'tot bayar', 'trim|required');
	$this->form_validation->set_rules('jhitungadmin1', 'jhitungadmin1', 'trim|required');
	$this->form_validation->set_rules('jhitungadmin2', 'jhitungadmin2', 'trim|required');
	$this->form_validation->set_rules('jhitungadmin3', 'jhitungadmin3', 'trim|required');
	$this->form_validation->set_rules('jpemadmin', 'jpemadmin', 'trim|required');
	$this->form_validation->set_rules('user_id', 'user id', 'trim|required');
	$this->form_validation->set_rules('update_at', 'update at', 'trim|required');
	$this->form_validation->set_rules('creaate_at', 'creaate at', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

