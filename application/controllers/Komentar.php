<?php

/*developed by ismarianto putra
  you can visit my site in ismarianto.com
  for more complain anda more information.  
*/

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Komentar extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Komentar_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
        if ($this->session->userdata('user_id') == '') {
            echo '<script>alert("Silahkan login memberi komentar"); window.location.href="'.base_url().'"</script>';
            exit();
        }
    }

    public function index()
    {
        $x['page_title'] = 'Data : Komentar';
        $this->template->load('template', 'komentar/komentar_list', $x);
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->Komentar_model->json();
    }

    public function detail($id)
    {
        $row = $this->Komentar_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'komentar' => $row->komentar,
                'updated_at' => $row->updated_at,
                'created_at' => $row->created_at,
                'user_id' => $row->user_id,

                'page_title' => 'Detail :  KOMENTAR',
            );
            $this->template->load('template', 'komentar/komentar_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-warniing fade-in">Data Tidak Di Temukan.</div>');
            redirect(site_url('komentar'));
        }
    }

    public function tambah()
    {
        $data = array(
            'page_title' => 'Tambah Komentar',
            'button' => 'Create',
            'action' => site_url('komentar/tambah_data'),
            'id' => set_value('id'),
            'komentar' => set_value('komentar'),
            'updated_at' => set_value('updated_at'),
            'created_at' => set_value('created_at'),
            'user_id' => set_value('user_id'),
        );
        $this->template->load('template', 'komentar/komentar_form', $data);
    }

    public function tambah_data()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->tambah();
        } else {
            $data = array(
                'komentar' => $this->input->post('komentar', TRUE),
                'updated_at' => $this->input->post('updated_at', TRUE),
                'created_at' => $this->input->post('created_at', TRUE),
                'user_id' => $this->input->post('user_id', TRUE),
            );

            $this->Komentar_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success fade-in"><i class="fa fa-check"></i>Data Berhasil Di Tambahkan.</div>');
            redirect(site_url('komentar'));
        }
    }

    public function edit($id)
    {
        $row = $this->Komentar_model->get_by_id($id);

        if ($row) {
            $data = array(
                'page_title' => 'Data KOMENTAR',
                'button' => 'Update',
                'action' => site_url('komentar/edit_data'),
                'id' => set_value('id', $row->id),
                'komentar' => set_value('komentar', $row->komentar),
                'updated_at' => set_value('updated_at', $row->updated_at),
                'created_at' => set_value('created_at', $row->created_at),
                'user_id' => set_value('user_id', $row->user_id),
            );
            $this->template->load('template', 'komentar/komentar_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-info fade-in">Data Tidak Di Temukan.</div>');
            redirect(site_url('komentar'));
        }
    }

    public function edit_data()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->edit($this->input->post('id', TRUE));
        } else {
            $data = array(
                'komentar' => $this->input->post('komentar', TRUE),
                'updated_at' => $this->input->post('updated_at', TRUE),
                'created_at' => $this->input->post('created_at', TRUE),
                'user_id' => $this->input->post('user_id', TRUE),
            );

            $this->Komentar_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success fade-in"><i class="fa fa-check"></i>Edit Data Berhasil.</div>');
            redirect(site_url('komentar'));
        }
    }

    public function hapus($id)
    {
        $row = $this->Komentar_model->get_by_id($id);

        if ($row) {
            $this->Komentar_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert alert-danger fade-in"><i class="fa fa-check"></i>Data Berhasil Di Hapus</div>');
            redirect(site_url('komentar'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-warniing fade-in">Ops Something Went Wrong Please Contact Administrator.</div>');
            redirect(site_url('komentar'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('komentar', 'komentar', 'trim|required');
        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "komentar.xls";
        $page_title = "komentar";
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
        xlsWriteLabel($tablehead, $kolomhead++, "Komentar");
        xlsWriteLabel($tablehead, $kolomhead++, "Updated At");
        xlsWriteLabel($tablehead, $kolomhead++, "Created At");
        xlsWriteLabel($tablehead, $kolomhead++, "User Id");

        foreach ($this->Komentar_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->komentar);
            xlsWriteLabel($tablebody, $kolombody++, $data->updated_at);
            xlsWriteLabel($tablebody, $kolombody++, $data->created_at);
            xlsWriteNumber($tablebody, $kolombody++, $data->user_id);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=komentar.doc");

        $data = array(
            'komentar_data' => $this->Komentar_model->get_all(),
            'start' => 0
        );

        $this->load->view('template', 'komentar/komentar_doc', $data);
    }
}
