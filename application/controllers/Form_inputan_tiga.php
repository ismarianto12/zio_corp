<?php

/*developed by ismarianto putra
  you can visit my site in ismarianto.com
  for more complain anda more information.  
*/

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Form_inputan_tiga extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model(['Form_inputan_tiga_model', 'm_user']);
		$this->load->library('form_validation');
		$this->load->library('datatables');
	}

	public function index()
	{
		$id_user         = $this->session->id_user;
		$login           = $this->session->login;
		$x['rs_user']    = $this->m_user->get($id_user);
		$x['page_title'] = 'Data : Form inputan Tiga';
		if ($id_user != '' || $login != '') {
			$this->template->load('template', 'form_inputan_tiga/form_inputan_tiga_list', $x);
		} else {
			redirect(base_url('/'));
			die();
		}
	}

	public function json()
	{

		$id_user = $this->session->id_user;
		$login   = $this->session->login;

		if ($id_user != '' || $login != '') {
			header('Content-Type: application/json');
			echo $this->Form_inputan_tiga_model->json();
		} else {
			show_404();
			die();
		}
	}

	public function detail($id)
	{
		$row   = $this->Form_inputan_tiga_model->get_by_id($id);
		$print = isset($_GET['print']) ? $_GET['print'] : '';
		if ($row) {
			$data = array(
				'get'=>$print,
				'id' => $row->id,
				'nama' => $row->nama,
				'email' => $row->email,
				'alamat' => $row->alamat,
				'nomor_pendaftaran' => $row->nomor_pendaftaran,
				'area' => $row->area,
				'penerima' => $row->penerima,
				'alamatpen' => $row->alamatpen,
				'tanggal' => $row->tanggal,
				'transportasi_angkutan' => $row->transportasi_angkutan,
				'keterangan' => $row->keterangan,
				'nilai' => $row->nilai,
				'jenis1' => $row->jenis1,
				'ukuran1' => $row->ukuran1,
				'jumlah1' => $row->jumlah1,
				'satuan1' => $row->satuan1,
				'keterangan1' => $row->keterangan1,
				'jenis2' => $row->jenis2,
				'ukuran2' => $row->ukuran2,
				'jumlah2' => $row->jumlah2,
				'satuan2' => $row->satuan2,
				'keterangan2' => $row->keterangan2,
				'jenis3' => $row->jenis3,
				'ukuran3' => $row->ukuran3,
				'jumlah3' => $row->jumlah3,
				'satuan3' => $row->satuan3,
				'keterangan3' => $row->keterangan3,
				'jenis4' => $row->jenis4,
				'ukuran4' => $row->ukuran4,
				'jumlah4' => $row->jumlah4,
				'satuan4' => $row->satuan4,
				'keterangan4' => $row->keterangan4,
				'jenis5' => $row->jenis5,
				'ukuran5' => $row->ukuran5,
				'jumlah5' => $row->jumlah5,
				'satuan5' => $row->satuan5,
				'keterangan5' => $row->keterangan5,
				'user_id' => $row->user_id,
				'date_created' => $row->date_created,
				'date_updated' => $row->date_updated,
				'page_title' => 'Detail :  FORM_INPUTAN_TIGA',
			);

			if ($print == 'yes') {
				$this->load->view('form_inputan_tiga/form_inputan_tiga_read', $data);
			} else {
				$this->template->load('template', 'form_inputan_tiga/form_inputan_tiga_read', $data);
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-warniing fade-in">Data Tidak Di Temukan.</div>');
			redirect(site_url('form_inputan_tiga'));
		}
	}

	public function tambah()
	{
		$data = array(
			'page_title' => 'Tambah Form inputan tiga',
			'button' => 'Create',
			'action' => site_url('form_inputan_tiga/tambah_data'),
			'id' => set_value('id'),
			'nama' => set_value('nama'),
			'email' => set_value('email'),
			'alamat' => set_value('alamat'),
			'nomor_pendaftaran' => set_value('nomor_pendaftaran'),
			'area' => set_value('area'),
			'penerima' => set_value('penerima'),
			'alamatpen' => set_value('alamatpen'),
			'tanggal' => set_value('tanggal'),
			'transportasi_angkutan' => set_value('transportasi_angkutan'),
			'keterangan' => set_value('keterangan'),
			'nilai' => set_value('nilai'),
			'jenis1' => set_value('jenis1'),
			'ukuran1' => set_value('ukuran1'),
			'jumlah1' => set_value('jumlah1'),
			'satuan1' => set_value('satuan1'),
			'keterangan1' => set_value('keterangan1'),
			'jenis2' => set_value('jenis2'),
			'ukuran2' => set_value('ukuran2'),
			'jumlah2' => set_value('jumlah2'),
			'satuan2' => set_value('satuan2'),
			'keterangan2' => set_value('keterangan2'),
			'jenis3' => set_value('jenis3'),
			'ukuran3' => set_value('ukuran3'),
			'jumlah3' => set_value('jumlah3'),
			'satuan3' => set_value('satuan3'),
			'keterangan3' => set_value('keterangan3'),
			'jenis4' => set_value('jenis4'),
			'ukuran4' => set_value('ukuran4'),
			'jumlah4' => set_value('jumlah4'),
			'satuan4' => set_value('satuan4'),
			'keterangan4' => set_value('keterangan4'),
			'jenis5' => set_value('jenis5'),
			'ukuran5' => set_value('ukuran5'),
			'jumlah5' => set_value('jumlah5'),
			'satuan5' => set_value('satuan5'),
			'keterangan5' => set_value('keterangan5'),
			'user_id' => set_value('user_id'),
			'date_created' => set_value('date_created'),
			'date_updated' => set_value('date_updated'),
		);
		$this->template->load('template', 'form_inputan_tiga/form_inputan_tiga_form', $data);
	}

	public function tambah_data()
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->tambah();
		} else {
			$data = array(
				'nama' => $this->input->post('nama', TRUE),
				'email' => $this->input->post('email', TRUE),
				'alamat' => $this->input->post('alamat', TRUE),
				'nomor_pendaftaran' => $this->input->post('nomor_pendaftaran', TRUE),
				'area' => $this->input->post('area', TRUE),
				'penerima' => $this->input->post('penerima', TRUE),
				'alamatpen' => $this->input->post('alamatpen', TRUE),
				'tanggal' => $this->input->post('tanggal', TRUE),
				'transportasi_angkutan' => $this->input->post('transportasi_angkutan', TRUE),
				'keterangan' => $this->input->post('keterangan', TRUE),
				'nilai' => $this->input->post('nilai', TRUE),
				'jenis1' => $this->input->post('jenis1', TRUE),
				'ukuran1' => $this->input->post('ukuran1', TRUE),
				'jumlah1' => $this->input->post('jumlah1', TRUE),
				'satuan1' => $this->input->post('satuan1', TRUE),
				'keterangan1' => $this->input->post('keterangan1', TRUE),
				'jenis2' => $this->input->post('jenis2', TRUE),
				'ukuran2' => $this->input->post('ukuran2', TRUE),
				'jumlah2' => $this->input->post('jumlah2', TRUE),
				'satuan2' => $this->input->post('satuan2', TRUE),
				'keterangan2' => $this->input->post('keterangan2', TRUE),
				'jenis3' => $this->input->post('jenis3', TRUE),
				'ukuran3' => $this->input->post('ukuran3', TRUE),
				'jumlah3' => $this->input->post('jumlah3', TRUE),
				'satuan3' => $this->input->post('satuan3', TRUE),
				'keterangan3' => $this->input->post('keterangan3', TRUE),
				'jenis4' => $this->input->post('jenis4', TRUE),
				'ukuran4' => $this->input->post('ukuran4', TRUE),
				'jumlah4' => $this->input->post('jumlah4', TRUE),
				'satuan4' => $this->input->post('satuan4', TRUE),
				'keterangan4' => $this->input->post('keterangan4', TRUE),
				'jenis5' => $this->input->post('jenis5', TRUE),
				'ukuran5' => $this->input->post('ukuran5', TRUE),
				'jumlah5' => $this->input->post('jumlah5', TRUE),
				'satuan5' => $this->input->post('satuan5', TRUE),
				'keterangan5' => $this->input->post('keterangan5', TRUE),
				'user_id' => $this->input->post('user_id', TRUE),
				'date_created' => $this->input->post('date_created', TRUE),
				'date_updated' => $this->input->post('date_updated', TRUE),
			);

			$this->Form_inputan_tiga_model->insert($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success fade-in"><i class="fa fa-check"></i>Data Berhasil Di Tambahkan.</div>');
			$id = $this->selectmax_forminputan();
			redirect(base_url() . '/form_inputan_tiga/detail/' . $id);
		}
	}

	private function selectmax_forminputan()
	{
		$data = $this->db->select_max('id')
			->from('form_inputan_tiga')
			->get();
		return $data->row()->id;
	}

	public function edit($id)
	{
		$id_user            = $this->session->id_user;
		$login              = $this->session->login;
		$x['rs_user']       = $this->m_user->get($id_user);
		$x['page_title']    = 'Data : Form inputan';

		if ($id_user != '' || $login != '') {

			$row = $this->Form_inputan_tiga_model->get_by_id($id);

			if ($row) {
				$data = array(
					'page_title' => 'Data FORM_INPUTAN_TIGA',
					'button' => 'Update',
					'action' => site_url('form_inputan_tiga/edit_data'),
					'id' => set_value('id', $row->id),
					'nama' => set_value('nama', $row->nama),
					'email' => set_value('email', $row->email),
					'alamat' => set_value('alamat', $row->alamat),
					'nomor_pendaftaran' => set_value('nomor_pendaftaran', $row->nomor_pendaftaran),
					'area' => set_value('area', $row->area),
					'penerima' => set_value('penerima', $row->penerima),
					'alamatpen' => set_value('alamatpen', $row->alamatpen),
					'tanggal' => set_value('tanggal', $row->tanggal),
					'transportasi_angkutan' => set_value('transportasi_angkutan', $row->transportasi_angkutan),
					'keterangan' => set_value('keterangan', $row->keterangan),
					'nilai' => set_value('nilai', $row->nilai),
					'jenis1' => set_value('jenis1', $row->jenis1),
					'ukuran1' => set_value('ukuran1', $row->ukuran1),
					'jumlah1' => set_value('jumlah1', $row->jumlah1),
					'satuan1' => set_value('satuan1', $row->satuan1),
					'keterangan1' => set_value('keterangan1', $row->keterangan1),
					'jenis2' => set_value('jenis2', $row->jenis2),
					'ukuran2' => set_value('ukuran2', $row->ukuran2),
					'jumlah2' => set_value('jumlah2', $row->jumlah2),
					'satuan2' => set_value('satuan2', $row->satuan2),
					'keterangan2' => set_value('keterangan2', $row->keterangan2),
					'jenis3' => set_value('jenis3', $row->jenis3),
					'ukuran3' => set_value('ukuran3', $row->ukuran3),
					'jumlah3' => set_value('jumlah3', $row->jumlah3),
					'satuan3' => set_value('satuan3', $row->satuan3),
					'keterangan3' => set_value('keterangan3', $row->keterangan3),
					'jenis4' => set_value('jenis4', $row->jenis4),
					'ukuran4' => set_value('ukuran4', $row->ukuran4),
					'jumlah4' => set_value('jumlah4', $row->jumlah4),
					'satuan4' => set_value('satuan4', $row->satuan4),
					'keterangan4' => set_value('keterangan4', $row->keterangan4),
					'jenis5' => set_value('jenis5', $row->jenis5),
					'ukuran5' => set_value('ukuran5', $row->ukuran5),
					'jumlah5' => set_value('jumlah5', $row->jumlah5),
					'satuan5' => set_value('satuan5', $row->satuan5),
					'keterangan5' => set_value('keterangan5', $row->keterangan5),
					'user_id' => set_value('user_id', $row->user_id),
					'date_created' => set_value('date_created', $row->date_created),
					'date_updated' => set_value('date_updated', $row->date_updated),
				);
				$this->template->load('template', 'form_inputan_tiga/form_inputan_tiga_form', $data);
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-info fade-in">Data Tidak Di Temukan.</div>');
				redirect(site_url('form_inputan_tiga'));
			}
		}
	}

	public function edit_data()
	{
		$id_user = $this->session->id_user;
		$login   = $this->session->login;

		if ($id_user != '' || $login != '') {

			$this->_rules();

			if ($this->form_validation->run() == FALSE) {
				$this->edit($this->input->post('id', TRUE));
			} else {
				$data = array(
					'nama' => $this->input->post('nama', TRUE),
					'email' => $this->input->post('email', TRUE),
					'alamat' => $this->input->post('alamat', TRUE),
					'nomor_pendaftaran' => $this->input->post('nomor_pendaftaran', TRUE),
					'area' => $this->input->post('area', TRUE),
					'penerima' => $this->input->post('penerima', TRUE),
					'alamatpen' => $this->input->post('alamatpen', TRUE),
					'tanggal' => $this->input->post('tanggal', TRUE),
					'transportasi_angkutan' => $this->input->post('transportasi_angkutan', TRUE),
					'keterangan' => $this->input->post('keterangan', TRUE),
					'nilai' => $this->input->post('nilai', TRUE),
					'jenis1' => $this->input->post('jenis1', TRUE),
					'ukuran1' => $this->input->post('ukuran1', TRUE),
					'jumlah1' => $this->input->post('jumlah1', TRUE),
					'satuan1' => $this->input->post('satuan1', TRUE),
					'keterangan1' => $this->input->post('keterangan1', TRUE),
					'jenis2' => $this->input->post('jenis2', TRUE),
					'ukuran2' => $this->input->post('ukuran2', TRUE),
					'jumlah2' => $this->input->post('jumlah2', TRUE),
					'satuan2' => $this->input->post('satuan2', TRUE),
					'keterangan2' => $this->input->post('keterangan2', TRUE),
					'jenis3' => $this->input->post('jenis3', TRUE),
					'ukuran3' => $this->input->post('ukuran3', TRUE),
					'jumlah3' => $this->input->post('jumlah3', TRUE),
					'satuan3' => $this->input->post('satuan3', TRUE),
					'keterangan3' => $this->input->post('keterangan3', TRUE),
					'jenis4' => $this->input->post('jenis4', TRUE),
					'ukuran4' => $this->input->post('ukuran4', TRUE),
					'jumlah4' => $this->input->post('jumlah4', TRUE),
					'satuan4' => $this->input->post('satuan4', TRUE),
					'keterangan4' => $this->input->post('keterangan4', TRUE),
					'jenis5' => $this->input->post('jenis5', TRUE),
					'ukuran5' => $this->input->post('ukuran5', TRUE),
					'jumlah5' => $this->input->post('jumlah5', TRUE),
					'satuan5' => $this->input->post('satuan5', TRUE),
					'keterangan5' => $this->input->post('keterangan5', TRUE),
					'user_id' => $this->input->post('user_id', TRUE),
					'date_created' => $this->input->post('date_created', TRUE),
					'date_updated' => $this->input->post('date_updated', TRUE),
				);

				$this->Form_inputan_tiga_model->update($this->input->post('id', TRUE), $data);
				$this->session->set_flashdata('message', '<div class="alert alert-success fade-in"><i class="fa fa-check"></i>Edit Data Berhasil.</div>');
				redirect(site_url('form_inputan_tiga'));
			}
		}
	}

	public function hapus($id)
	{
		$row = $this->Form_inputan_tiga_model->get_by_id($id);

		if ($row) {
			$this->Form_inputan_tiga_model->delete($id);
			$this->session->set_flashdata('message', '<div class="alert alert-danger fade-in"><i class="fa fa-check"></i>Data Berhasil Di Hapus</div>');
			redirect(site_url('form_inputan_tiga'));
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-warniing fade-in">Ops Something Went Wrong Please Contact Administrator.</div>');
			redirect(site_url('form_inputan_tiga'));
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('nama', 'nama', 'trim|required');
		$this->form_validation->set_rules('email', 'email', 'trim|required');
		$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
		$this->form_validation->set_rules('nomor_pendaftaran', 'nomor pendaftaran', 'trim|required');
		$this->form_validation->set_rules('area', 'area', 'trim|required');
		$this->form_validation->set_rules('penerima', 'penerima', 'trim|required');
		$this->form_validation->set_rules('alamatpen', 'alamatpen', 'trim|required');
		$this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
		$this->form_validation->set_rules('transportasi_angkutan', 'transportasi angkutan', 'trim|required');
		$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
		$this->form_validation->set_rules('nilai', 'nilai', 'trim|required');
		$this->form_validation->set_rules('jenis1', 'jenis1', 'trim|required');
		$this->form_validation->set_rules('ukuran1', 'ukuran1', 'trim|required');
		$this->form_validation->set_rules('jumlah1', 'jumlah1', 'trim|required');
		$this->form_validation->set_rules('satuan1', 'satuan1', 'trim|required');
		$this->form_validation->set_rules('keterangan1', 'keterangan1', 'trim|required');
		$this->form_validation->set_rules('jenis2', 'jenis2', 'trim|required');
		$this->form_validation->set_rules('ukuran2', 'ukuran2', 'trim|required');
		$this->form_validation->set_rules('jumlah2', 'jumlah2', 'trim|required');
		$this->form_validation->set_rules('satuan2', 'satuan2', 'trim|required');
		$this->form_validation->set_rules('keterangan2', 'keterangan2', 'trim|required');
		$this->form_validation->set_rules('jenis3', 'jenis3', 'trim|required');
		$this->form_validation->set_rules('ukuran3', 'ukuran3', 'trim|required');
		$this->form_validation->set_rules('jumlah3', 'jumlah3', 'trim|required');
		$this->form_validation->set_rules('satuan3', 'satuan3', 'trim|required');
		$this->form_validation->set_rules('keterangan3', 'keterangan3', 'trim|required');
		$this->form_validation->set_rules('jenis4', 'jenis4', 'trim|required');
		$this->form_validation->set_rules('ukuran4', 'ukuran4', 'trim|required');
		$this->form_validation->set_rules('jumlah4', 'jumlah4', 'trim|required');
		$this->form_validation->set_rules('satuan4', 'satuan4', 'trim|required');
		$this->form_validation->set_rules('keterangan4', 'keterangan4', 'trim|required');
		$this->form_validation->set_rules('jenis5', 'jenis5', 'trim|required');
		$this->form_validation->set_rules('ukuran5', 'ukuran5', 'trim|required');
		$this->form_validation->set_rules('jumlah5', 'jumlah5', 'trim|required');
		$this->form_validation->set_rules('satuan5', 'satuan5', 'trim|required');
		$this->form_validation->set_rules('keterangan5', 'keterangan5', 'trim|required');
		// $this->form_validation->set_rules('user_id', 'user id', 'trim|required');
		// $this->form_validation->set_rules('date_created', 'date created', 'trim|required');
		// $this->form_validation->set_rules('date_updated', 'date updated', 'trim|required');

		$this->form_validation->set_rules('id', 'id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}

	public function excel()
	{
		$this->load->helper('exportexcel');
		$namaFile = "form_inputan_tiga.xls";
		$page_title = "form_inputan_tiga";
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
		xlsWriteLabel($tablehead, $kolomhead++, "Nama");
		xlsWriteLabel($tablehead, $kolomhead++, "Email");
		xlsWriteLabel($tablehead, $kolomhead++, "Alamat");
		xlsWriteLabel($tablehead, $kolomhead++, "Nomor Pendaftaran");
		xlsWriteLabel($tablehead, $kolomhead++, "Area");
		xlsWriteLabel($tablehead, $kolomhead++, "Penerima");
		xlsWriteLabel($tablehead, $kolomhead++, "Alamat penerima");
		xlsWriteLabel($tablehead, $kolomhead++, "Tanggal");
		xlsWriteLabel($tablehead, $kolomhead++, "Transportasi Angkutan");
		xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");
		xlsWriteLabel($tablehead, $kolomhead++, "Nilai");
		xlsWriteLabel($tablehead, $kolomhead++, "Jenis1");
		xlsWriteLabel($tablehead, $kolomhead++, "Ukuran1");
		xlsWriteLabel($tablehead, $kolomhead++, "Jumlah1");
		xlsWriteLabel($tablehead, $kolomhead++, "Satuan1");
		xlsWriteLabel($tablehead, $kolomhead++, "Keterangan1");
		xlsWriteLabel($tablehead, $kolomhead++, "Jenis2");
		xlsWriteLabel($tablehead, $kolomhead++, "Ukuran2");
		xlsWriteLabel($tablehead, $kolomhead++, "Jumlah2");
		xlsWriteLabel($tablehead, $kolomhead++, "Satuan2");
		xlsWriteLabel($tablehead, $kolomhead++, "Keterangan2");
		xlsWriteLabel($tablehead, $kolomhead++, "Jenis3");
		xlsWriteLabel($tablehead, $kolomhead++, "Ukuran3");
		xlsWriteLabel($tablehead, $kolomhead++, "Jumlah3");
		xlsWriteLabel($tablehead, $kolomhead++, "Satuan3");
		xlsWriteLabel($tablehead, $kolomhead++, "Keterangan3");
		xlsWriteLabel($tablehead, $kolomhead++, "Jenis4");
		xlsWriteLabel($tablehead, $kolomhead++, "Ukuran4");
		xlsWriteLabel($tablehead, $kolomhead++, "Jumlah4");
		xlsWriteLabel($tablehead, $kolomhead++, "Satuan4");
		xlsWriteLabel($tablehead, $kolomhead++, "Keterangan4");
		xlsWriteLabel($tablehead, $kolomhead++, "Jenis5");
		xlsWriteLabel($tablehead, $kolomhead++, "Ukuran5");
		xlsWriteLabel($tablehead, $kolomhead++, "Jumlah5");
		xlsWriteLabel($tablehead, $kolomhead++, "Satuan5");
		xlsWriteLabel($tablehead, $kolomhead++, "Keterangan5");
		xlsWriteLabel($tablehead, $kolomhead++, "User Id");
		xlsWriteLabel($tablehead, $kolomhead++, "Date Created");
		xlsWriteLabel($tablehead, $kolomhead++, "Date Updated");

		foreach ($this->Form_inputan_tiga_model->get_all() as $data) {
			$kolombody = 0;

			//ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
			xlsWriteNumber($tablebody, $kolombody++, $nourut);
			xlsWriteLabel($tablebody, $kolombody++, $data->nama);
			xlsWriteLabel($tablebody, $kolombody++, $data->email);
			xlsWriteLabel($tablebody, $kolombody++, $data->alamat);
			xlsWriteLabel($tablebody, $kolombody++, $data->nomor_pendaftaran);
			xlsWriteLabel($tablebody, $kolombody++, $data->area);
			xlsWriteLabel($tablebody, $kolombody++, $data->penerima);
			xlsWriteLabel($tablebody, $kolombody++, $data->alamatpen);
			xlsWriteLabel($tablebody, $kolombody++, $data->tanggal);
			xlsWriteLabel($tablebody, $kolombody++, $data->transportasi_angkutan);
			xlsWriteLabel($tablebody, $kolombody++, $data->keterangan);
			xlsWriteLabel($tablebody, $kolombody++, $data->nilai);
			xlsWriteLabel($tablebody, $kolombody++, $data->jenis1);
			xlsWriteLabel($tablebody, $kolombody++, $data->ukuran1);
			xlsWriteLabel($tablebody, $kolombody++, $data->jumlah1);
			xlsWriteLabel($tablebody, $kolombody++, $data->satuan1);
			xlsWriteLabel($tablebody, $kolombody++, $data->keterangan1);
			xlsWriteLabel($tablebody, $kolombody++, $data->jenis2);
			xlsWriteLabel($tablebody, $kolombody++, $data->ukuran2);
			xlsWriteLabel($tablebody, $kolombody++, $data->jumlah2);
			xlsWriteLabel($tablebody, $kolombody++, $data->satuan2);
			xlsWriteLabel($tablebody, $kolombody++, $data->keterangan2);
			xlsWriteLabel($tablebody, $kolombody++, $data->jenis3);
			xlsWriteLabel($tablebody, $kolombody++, $data->ukuran3);
			xlsWriteLabel($tablebody, $kolombody++, $data->jumlah3);
			xlsWriteLabel($tablebody, $kolombody++, $data->satuan3);
			xlsWriteLabel($tablebody, $kolombody++, $data->keterangan3);
			xlsWriteLabel($tablebody, $kolombody++, $data->jenis4);
			xlsWriteLabel($tablebody, $kolombody++, $data->ukuran4);
			xlsWriteLabel($tablebody, $kolombody++, $data->jumlah4);
			xlsWriteLabel($tablebody, $kolombody++, $data->satuan4);
			xlsWriteLabel($tablebody, $kolombody++, $data->keterangan4);
			xlsWriteLabel($tablebody, $kolombody++, $data->jenis5);
			xlsWriteLabel($tablebody, $kolombody++, $data->ukuran5);
			xlsWriteLabel($tablebody, $kolombody++, $data->jumlah5);
			xlsWriteLabel($tablebody, $kolombody++, $data->satuan5);
			xlsWriteLabel($tablebody, $kolombody++, $data->keterangan5);
			xlsWriteNumber($tablebody, $kolombody++, $data->user_id);
			xlsWriteLabel($tablebody, $kolombody++, $data->date_created);
			xlsWriteLabel($tablebody, $kolombody++, $data->date_updated);

			$tablebody++;
			$nourut++;
		}

		xlsEOF();
		exit();
	}

	public function word()
	{
		header("Content-type: application/vnd.ms-word");
		header("Content-Disposition: attachment;Filename=form_inputan_tiga.doc");

		$data = array(
			'form_inputan_tiga_data' => $this->Form_inputan_tiga_model->get_all(),
			'start' => 0
		);

		$this->load->view('template', 'form_inputan_tiga/form_inputan_tiga_doc', $data);
	}
}
