<?php

/*developed by ismarianto putra
  you can visit my site in ismarianto.com
  for more complain anda more information.  
*/

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Subkategori extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Subkategori_model');
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $x['page_title'] = 'Data : Subkategori';
        $this->template->load('template', 'subkategori/subkategori_list', $x);
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->Subkategori_model->json();
    }

    public function detail($id)
    {
        $row = $this->Subkategori_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'kategorinm' => $row->kategorinm,
                'user_id' => $row->user_id,
                'create_at' => $row->create_at,
                'update_at' => $row->update_at,

                'page_title' => 'Detail :  SUBKATEGORI',
            );
            $this->template->load('template', 'subkategori/subkategori_read', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-warniing fade-in">Data Tidak Di Temukan.</div>');
            redirect(site_url('subkategori'));
        }
    }

    public function tambah()
    {
        $data = array(
            'page_title' => 'Tambah Subkategori',
            'button' => 'Create',
            'action' => site_url('subkategori/tambah_data'),
            'id' => set_value('id'),
            'kategorinm' => set_value('kategorinm'),
            'user_id' => set_value('user_id'),
            'create_at' => set_value('create_at'),
            'update_at' => set_value('update_at'),
        );
        $this->template->load('template', 'subkategori/subkategori_form', $data);
    }

    public function tambah_data()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->tambah();
        } else {
            $data = array(
                'kategorinm' => $this->input->post('kategorinm', TRUE),
                'user_id' => $this->input->post('user_id', TRUE),
                'create_at' => $this->input->post('create_at', TRUE),
                'update_at' => $this->input->post('update_at', TRUE),
            );

            $this->Subkategori_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success fade-in"><i class="fa fa-check"></i>Data Berhasil Di Tambahkan.</div>');
            redirect(site_url('subkategori'));
        }
    }

    public function edit($id)
    {
        $row = $this->Subkategori_model->get_by_id($id);

        if ($row) {
            $data = array(
                'page_title' => 'Data SUBKATEGORI',
                'button' => 'Update',
                'action' => site_url('subkategori/edit_data'),
                'id' => set_value('id', $row->id),
                'kategorinm' => set_value('kategorinm', $row->kategorinm),
                'user_id' => set_value('user_id', $row->user_id),
                'create_at' => set_value('create_at', $row->create_at),
                'update_at' => set_value('update_at', $row->update_at),
            );
            $this->template->load('template', 'subkategori/subkategori_form', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-info fade-in">Data Tidak Di Temukan.</div>');
            redirect(site_url('subkategori'));
        }
    }

    public function edit_data()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->edit($this->input->post('id', TRUE));
        } else {
            $data = array(
                'kategorinm' => $this->input->post('kategorinm', TRUE),
                'user_id' => $this->input->post('user_id', TRUE),
                'create_at' => $this->input->post('create_at', TRUE),
                'update_at' => $this->input->post('update_at', TRUE),
            );

            $this->Subkategori_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success fade-in"><i class="fa fa-check"></i>Edit Data Berhasil.</div>');
            redirect(site_url('subkategori'));
        }
    }

    public function hapus($id)
    {
        $row = $this->Subkategori_model->get_by_id($id);

        if ($row) {
            $this->Subkategori_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert alert-danger fade-in"><i class="fa fa-check"></i>Data Berhasil Di Hapus</div>');
            redirect(site_url('subkategori'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-warniing fade-in">Ops Something Went Wrong Please Contact Administrator.</div>');
            redirect(site_url('subkategori'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('kategorinm', 'kategorinm', 'trim|required');
        $this->form_validation->set_rules('user_id', 'user id', 'trim|required');
        $this->form_validation->set_rules('create_at', 'create at', 'trim|required');
        $this->form_validation->set_rules('update_at', 'update at', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    function get_id()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $id   = $this->input->post('subkategori_id');
            $data = $this->db->get_where('subkategori', ['id' => $id]);
            if ($data->num_rows() > 0) {
                $sql = $data->row_array();
                http_response_code(200);
                echo json_encode(['nilai' => $sql['nilai']]);
            } else {
                http_response_code(200);
                echo json_encode(['nilai' =>  null]);
            }
        }
    }
}
