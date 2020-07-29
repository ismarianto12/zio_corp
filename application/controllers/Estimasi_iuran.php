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
        $this->load->library('datatables');
    }

    public function index()
    {
        $x['page_title'] = 'Data : Estimasi iuran';
        $this->template->load('template', 'estimasi_iuran/estimasi_iuran_list', $x);
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->Estimasi_iuran_model->json();
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

                'page_title' => 'Detail :  ESTIMASI_IURAN',
            );
            $this->template->load('template', 'estimasi_iuran/estimasi_iuran_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-warniing fade-in">Data Tidak Di Temukan.</div>');
            redirect(site_url('estimasi_iuran'));
        }
    }

    public function tambah()
    {
        $data = array(
            'page_title' => 'Tambah Estimasi iuran',
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
        $this->template->load('template', 'estimasi_iuran/estimasi_iuran_form', $data);
    }

    public function tambah_data()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->tambah();
        } else {
            $data = array(
                'jenis_id' => $this->input->post('type_id', TRUE),
                'subkategori_id' => $this->input->post('subkategori_id', TRUE),
                'nilai' => $this->input->post('nilai', TRUE),
                'quantity' => $this->input->post('quantity', TRUE),
                'tot_bayar' => $this->input->post('tot_bayar', TRUE),
                'jhitungadmin1' => $this->input->post('jhitungadmin1', TRUE),
                'jhitungadmin2' => $this->input->post('jhitungadmin2', TRUE),
                'jhitungadmin3' => $this->input->post('jhitungadmin3', TRUE),
                'jpemadmin' => $this->input->post('jpemadmin', TRUE),
                'user_id' => $this->session->user_id,
                'update_at' => date('Y-m-d H:i:s'),
                'creaate_at' => date('Y-m-d H:i:s'),
            ); 
            $this->Estimasi_iuran_model->insert($data);
            $id_user = $this->session->id_user;
            if ($id_user != '') {
                $this->session->set_flashdata('message', '<div class="alert alert-success fade-in"><i class="fa fa-check"></i>Data Berhasil Di Tambahkan.</div>');
                $redirect = redirect(site_url('estimasi_iuran'));
            } else {
                $data        = $this->db->select_max('id')->from('estimasi_iuran')->get()->row_array(); 
                $id_estimasi = $data['id']; 
                $this->session->set_flashdata('message', '<div class="alert alert-success fade-in"><i class="fa fa-check"></i>Data Berhasil Di Simpan.</div>');
                $redirect    = redirect(site_url('estimasi_iuran/detail/'.$id_estimasi));
            }
        }
    }

    public function edit($id)
    {
        $row = $this->Estimasi_iuran_model->get_by_id($id);

        if ($row) {
            $data = array(
                'page_title' => 'Data ESTIMASI_IURAN',
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
            $this->template->load('template', 'estimasi_iuran/estimasi_iuran_form', $data);
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
                'jenis_id' => $this->input->post('type_id', TRUE),
                'subkategori_id' => $this->input->post('subkategori_id', TRUE),
                'nilai' => $this->input->post('nilai', TRUE),
                'quantity' => $this->input->post('quantity', TRUE),
                'tot_bayar' => $this->input->post('tot_bayar', TRUE),
                'jhitungadmin1' => $this->input->post('jhitungadmin1', TRUE),
                'jhitungadmin2' => $this->input->post('jhitungadmin2', TRUE),
                'jhitungadmin3' => $this->input->post('jhitungadmin3', TRUE),
                'jpemadmin' => $this->input->post('jpemadmin', TRUE),
                'user_id' => $this->session->user_id,
                'update_at' => date('Y-m-d H:i:s'),
                'creaate_at' => date('Y-m-d H:i:s'),
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

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "estimasi_iuran.xls";
        $page_title = "estimasi_iuran";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
        xlsWriteLabel($tablehead, $kolomhead++, "Jenis Id");
        xlsWriteLabel($tablehead, $kolomhead++, "Subkategori Id");
        xlsWriteLabel($tablehead, $kolomhead++, "Nilai");
        xlsWriteLabel($tablehead, $kolomhead++, "Quantity");
        xlsWriteLabel($tablehead, $kolomhead++, "Tot Bayar");
        xlsWriteLabel($tablehead, $kolomhead++, "Jumlah Hitung Admin 1");
        xlsWriteLabel($tablehead, $kolomhead++, "Jumlah Hitung Admin 2");
        xlsWriteLabel($tablehead, $kolomhead++, "Jumlah Hitung Admin 3");
        xlsWriteLabel($tablehead, $kolomhead++, "Total Jumlah Hitung Admin");
        xlsWriteLabel($tablehead, $kolomhead++, "User Id");
        xlsWriteLabel($tablehead, $kolomhead++, "Update At");
        xlsWriteLabel($tablehead, $kolomhead++, "Creaate At");

        foreach ($this->Estimasi_iuran_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteNumber($tablebody, $kolombody++, $data->jenis_id);
            xlsWriteNumber($tablebody, $kolombody++, $data->subkategori_id);
            xlsWriteLabel($tablebody, $kolombody++, $data->nilai);
            xlsWriteLabel($tablebody, $kolombody++, $data->quantity);
            xlsWriteLabel($tablebody, $kolombody++, $data->tot_bayar);
            xlsWriteLabel($tablebody, $kolombody++, $data->jhitungadmin1);
            xlsWriteLabel($tablebody, $kolombody++, $data->jhitungadmin2);
            xlsWriteLabel($tablebody, $kolombody++, $data->jhitungadmin3);
            xlsWriteLabel($tablebody, $kolombody++, $data->jpemadmin);
            xlsWriteNumber($tablebody, $kolombody++, $data->user_id);
            xlsWriteLabel($tablebody, $kolombody++, $data->update_at);
            xlsWriteLabel($tablebody, $kolombody++, $data->creaate_at);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=estimasi_iuran.doc");

        $data = array(
            'estimasi_iuran_data' => $this->Estimasi_iuran_model->get_all(),
            'start' => 0
        );

        $this->load->view('template', 'estimasi_iuran/estimasi_iuran_doc', $data);
    }
}
