<?php

/*developed by ismarianto putra
  you can visit my site in ismarianto.com
  for more complain anda more information.  
*/

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Reg_kelengkapan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(['Reg_kelengkapan_model', 'm_user']);
        $this->load->library('form_validation');
        $this->load->library('datatables');
    }

    public function index()
    {
        $id_user         = $this->session->id_user;
        $login           = $this->session->login;
        $x['rs_user']    = $this->m_user->get($id_user);
        $x['page_title'] = 'Data : Data list kelengkapan.';
        if ($id_user != '' || $login != '') {
            $x['page_title'] = 'Data : Reg kelengkapan';
            $this->template->load('template', 'reg_kelengkapan/reg_kelengkapan_list', $x);
        } else {
            show_404();
            die();
        }
    }

    public function json()
    {
        header('Content-Type: application/json');
        echo $this->Reg_kelengkapan_model->json();
    }

    public function detail($id)
    {

        $id_user         = $this->session->id_user;
        $login           = $this->session->login;
        $x['rs_user']    = $this->m_user->get($id_user);
        $x['page_title'] = 'Data : Data list kelengkapan.';
        if ($id_user != '' || $login != '') {
            $x['page_title'] = 'Data : Reg kelengkapan';

            $row = $this->Reg_kelengkapan_model->get_by_id($id);
            if ($row) {
                $data = array(
                    'id' => $row->id,
                    'page_title' => 'Detail data',
                    'no_registrasi' => $row->no_registrasi,
                    'form_pendaftar' => $row->form_pendaftar,
                    'ktp' => $row->ktp,
                    'npwp' => $row->npwp,
                    'pas_foto' => $row->pas_foto,
                    'data_orang_tua' => $row->data_orang_tua,
                    'data_ujian' => $row->data_ujian,
                    'data_ijazah' => $row->data_ijazah,
                    'data_nilai' => $row->data_nilai,
                    'data_sertifikat' => $row->data_sertifikat,
                    'create_at' => $row->create_at,
                    'upatated_at' => $row->upatated_at,
                    'created_by' => $row->created_by,

                    'page_title' => 'Detail :  REG_KELENGKAPAN',
                );
                $this->template->load('template', 'reg_kelengkapan/reg_kelengkapan_read', array_merge($x, $data));
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-warniing fade-in">Data Tidak Di Temukan.</div>');
                redirect(site_url('reg_kelengkapan'));
            }
        } else {
            show_404();
        }
    }

    public function tambah()
    {
        // error_reporting(0);

        $id_user         = $this->session->id_user;
        $login           = $this->session->login;
        $x['rs_user']    = $this->m_user->get($id_user);
        $x['page_title'] = 'Data : Data list kelengkapan.';
        if ($id_user != '' || $login != '') {
            $x['page_title'] = 'Data : Reg kelengkapan';

            $data = array(
                'rs_user' => '',
                'page_title' => 'Tambah Reg kelengkapan',
                'button' => 'Create',
                'action' => site_url('reg_kelengkapan/tambah_data'),
                'id' => set_value('id'),
                'no_registrasi' => set_value('no_registrasi'),
                'form_pendaftar' => set_value('form_pendaftar'),
                'ktp' => set_value('ktp'),
                'npwp' => set_value('npwp'),
                'pas_foto' => set_value('pas_foto'),
                'data_orang_tua' => set_value('data_orang_tua'),
                'data_ujian' => set_value('data_ujian'),
                'data_ijazah' => set_value('data_ijazah'),
                'data_nilai' => set_value('data_nilai'),
                'data_sertifikat' => set_value('data_sertifikat'),
                'create_at' => set_value('create_at'),
                'upatated_at' => set_value('upatated_at'),
                'created_by' => set_value('created_by'),
            );
            $this->template->load('template', 'reg_kelengkapan/reg_kelengkapan_form', array_merge($x, $data));
        } else {
            show_404();
        }
    }
    public function tambah_data()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->tambah();
        } else {
            $data = array(
                'no_registrasi' => $this->input->post('no_registrasi', TRUE),
                'form_pendaftar' => $this->input->post('form_pendaftar', TRUE),
                'ktp' => $this->input->post('ktp', TRUE),
                'npwp' => $this->input->post('npwp', TRUE),
                'pas_foto' => $this->input->post('pas_foto', TRUE),
                'data_orang_tua' => $this->input->post('data_orang_tua', TRUE),
                'data_ujian' => $this->input->post('data_ujian', TRUE),
                'data_ijazah' => $this->input->post('data_ijazah', TRUE),
                'data_nilai' => $this->input->post('data_nilai', TRUE),
                'data_sertifikat' => $this->input->post('data_sertifikat', TRUE),
                'create_at' => $this->input->post('create_at', TRUE),
                'upatated_at' => $this->input->post('upatated_at', TRUE),
                'created_by' => $this->session->user_id,

            );

            $this->Reg_kelengkapan_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success fade-in"><i class="fa fa-check"></i>Data Berhasil Di Tambahkan.</div>');
            redirect(site_url('reg_kelengkapan'));
        }
    }

    public function edit($id)
    {
        $row = $this->Reg_kelengkapan_model->get_by_id($id);
        $id_user         = $this->session->id_user;
        $login           = $this->session->login;
        $x['rs_user']    = $this->m_user->get($id_user);
        $x['page_title'] = 'Data : Data list kelengkapan.';
        if ($id_user != '' || $login != '') {
            if ($row) {
                $data = array(
                    'page_title' => 'DATA REGISTRASI KELENGKAPAN',
                    'button' => 'Update',
                    'action' => site_url('reg_kelengkapan/edit_data'),
                    'id' => set_value('id', $row->id),
                    'no_registrasi' => set_value('no_registrasi', $row->no_registrasi),
                    'form_pendaftar' => set_value('form_pendaftar', $row->form_pendaftar),
                    'ktp' => set_value('ktp', $row->ktp),
                    'npwp' => set_value('npwp', $row->npwp),
                    'pas_foto' => set_value('pas_foto', $row->pas_foto),
                    'data_orang_tua' => set_value('data_orang_tua', $row->data_orang_tua),
                    'data_ujian' => set_value('data_ujian', $row->data_ujian),
                    'data_ijazah' => set_value('data_ijazah', $row->data_ijazah),
                    'data_nilai' => set_value('data_nilai', $row->data_nilai),
                    'data_sertifikat' => set_value('data_sertifikat', $row->data_sertifikat),
                    'create_at' => set_value('create_at', $row->create_at),
                    'upatated_at' => set_value('upatated_at', $row->upatated_at),
                    'created_by' => set_value('created_by', $row->created_by),
                );
                $this->template->load('template', 'reg_kelengkapan/reg_kelengkapan_form', array_merge($data, $x));
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-info fade-in">Data Tidak Di Temukan.</div>');
                redirect(site_url('reg_kelengkapan'));
            }
        } else {
            show_404();
        }
    }

    public function edit_data()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->edit($this->input->post('id', TRUE));
        } else {
            $data = array(
                'no_registrasi' => $this->input->post('no_registrasi', TRUE),
                'form_pendaftar' => $this->input->post('form_pendaftar', TRUE),
                'ktp' => $this->input->post('ktp', TRUE),
                'npwp' => $this->input->post('npwp', TRUE),
                'pas_foto' => $this->input->post('pas_foto', TRUE),
                'data_orang_tua' => $this->input->post('data_orang_tua', TRUE),
                'data_ujian' => $this->input->post('data_ujian', TRUE),
                'data_ijazah' => $this->input->post('data_ijazah', TRUE),
                'data_nilai' => $this->input->post('data_nilai', TRUE),
                'data_sertifikat' => $this->input->post('data_sertifikat', TRUE),
                'create_at' => $this->input->post('create_at', TRUE),
                'upatated_at' => $this->input->post('upatated_at', TRUE),
                'created_by' => $this->session->user_id,
            );

            $this->Reg_kelengkapan_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success fade-in"><i class="fa fa-check"></i>Edit Data Berhasil.</div>');
            redirect(site_url('reg_kelengkapan'));
        }
    }

    public function hapus($id)
    {
        $row = $this->Reg_kelengkapan_model->get_by_id($id);

        if ($row) {
            $this->Reg_kelengkapan_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert alert-danger fade-in"><i class="fa fa-check"></i>Data Berhasil Di Hapus</div>');
            redirect(site_url('reg_kelengkapan'));
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-warniing fade-in">Ops Something Went Wrong Please Contact Administrator.</div>');
            redirect(site_url('reg_kelengkapan'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('no_registrasi', 'no registrasi', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
    function check()
    {
        error_reporting(0);
        if (isset($_POST['kirim'])) {
            $no_registrasi = $this->input->post('no_registrasi');
            $row           = $this->check_reg($no_registrasi);

            $x = array(
                'id' => $row->id,
                'no_registrasi' => $row->no_registrasi,
                'form_pendaftar' => $row->form_pendaftar,
                'ktp' => $row->ktp,
                'npwp' => $row->npwp,
                'pas_foto' => $row->pas_foto,
                'data_orang_tua' => $row->data_orang_tua,
                'data_ujian' => $row->data_ujian,
                'data_ijazah' => $row->data_ijazah,
                'data_nilai' => $row->data_nilai,
                'data_sertifikat' => $row->data_sertifikat,
                'create_at' => $row->create_at,
                'upatated_at' => $row->upatated_at,
                'created_by' => $row->created_by,

                'page_title' => 'Detail :  REG_KELENGKAPAN',
            );

            $this->template->load('template', 'r_check', array_merge(['data', 'no_registrasi'], $x));
        } else {
            $this->template->load('template', 'r_check', ['row', 'no_registrasi']);
        }
    }

    function check_reg($no_registrasi)
    {
        return $this->db->where('no_registrasi', $no_registrasi)
            ->from('reg_kelengkapan')
            ->get()->row();
    }
}
