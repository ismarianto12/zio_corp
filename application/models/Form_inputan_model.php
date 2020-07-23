<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Form_inputan_model extends CI_Model
{

    public $table = 'form_inputan';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('id,nama,email,alamat,nomor_pendaftaran,area,penerima,alamatpen,tanggal,transportasi_angkutan,keterangan,nilai,jenis1,ukuran1,jumlah1,satuan1,keterangan1,jenis2,ukuran2,jumlah2,satuan2,keterangan2,jenis3,ukuran3,jumlah3,satuan3,keterangan3,jenis4,ukuran4,jumlah4,satuan4,keterangan4,jenis5,ukuran5,jumlah5,satuan5,keterangan5,user_id,date_created,date_updated');
        $this->datatables->from('form_inputan');
        //add this line for join
        //$this->datatables->join('table2', 'form_inputan.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('form_inputan/detail/$1'),'<i class="fa fa-book"></i>Read','class="btn btn-info btn-xs edit"')."  ".anchor(site_url('form_inputan/edit/$1'),'<i class="fa fa-edit"></i> Update','class="btn btn-success btn-xs edit"')."<a href='#' class='btn btn-danger btn-xs delete' onclick='javasciprt: return hapus($1)'><i class='fa fa-trash'></i> Delete</a>", 'id');
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
	$this->db->or_like('nama', $q);
	$this->db->or_like('email', $q);
	$this->db->or_like('alamat', $q);
	$this->db->or_like('nomor_pendaftaran', $q);
	$this->db->or_like('area', $q);
	$this->db->or_like('penerima', $q);
	$this->db->or_like('alamatpen', $q);
	$this->db->or_like('tanggal', $q);
	$this->db->or_like('transportasi_angkutan', $q);
	$this->db->or_like('keterangan', $q);
	$this->db->or_like('nilai', $q);
	$this->db->or_like('jenis1', $q);
	$this->db->or_like('ukuran1', $q);
	$this->db->or_like('jumlah1', $q);
	$this->db->or_like('satuan1', $q);
	$this->db->or_like('keterangan1', $q);
	$this->db->or_like('jenis2', $q);
	$this->db->or_like('ukuran2', $q);
	$this->db->or_like('jumlah2', $q);
	$this->db->or_like('satuan2', $q);
	$this->db->or_like('keterangan2', $q);
	$this->db->or_like('jenis3', $q);
	$this->db->or_like('ukuran3', $q);
	$this->db->or_like('jumlah3', $q);
	$this->db->or_like('satuan3', $q);
	$this->db->or_like('keterangan3', $q);
	$this->db->or_like('jenis4', $q);
	$this->db->or_like('ukuran4', $q);
	$this->db->or_like('jumlah4', $q);
	$this->db->or_like('satuan4', $q);
	$this->db->or_like('keterangan4', $q);
	$this->db->or_like('jenis5', $q);
	$this->db->or_like('ukuran5', $q);
	$this->db->or_like('jumlah5', $q);
	$this->db->or_like('satuan5', $q);
	$this->db->or_like('keterangan5', $q);
	$this->db->or_like('user_id', $q);
	$this->db->or_like('date_created', $q);
	$this->db->or_like('date_updated', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
	$this->db->or_like('nama', $q);
	$this->db->or_like('email', $q);
	$this->db->or_like('alamat', $q);
	$this->db->or_like('nomor_pendaftaran', $q);
	$this->db->or_like('area', $q);
	$this->db->or_like('penerima', $q);
	$this->db->or_like('alamatpen', $q);
	$this->db->or_like('tanggal', $q);
	$this->db->or_like('transportasi_angkutan', $q);
	$this->db->or_like('keterangan', $q);
	$this->db->or_like('nilai', $q);
	$this->db->or_like('jenis1', $q);
	$this->db->or_like('ukuran1', $q);
	$this->db->or_like('jumlah1', $q);
	$this->db->or_like('satuan1', $q);
	$this->db->or_like('keterangan1', $q);
	$this->db->or_like('jenis2', $q);
	$this->db->or_like('ukuran2', $q);
	$this->db->or_like('jumlah2', $q);
	$this->db->or_like('satuan2', $q);
	$this->db->or_like('keterangan2', $q);
	$this->db->or_like('jenis3', $q);
	$this->db->or_like('ukuran3', $q);
	$this->db->or_like('jumlah3', $q);
	$this->db->or_like('satuan3', $q);
	$this->db->or_like('keterangan3', $q);
	$this->db->or_like('jenis4', $q);
	$this->db->or_like('ukuran4', $q);
	$this->db->or_like('jumlah4', $q);
	$this->db->or_like('satuan4', $q);
	$this->db->or_like('keterangan4', $q);
	$this->db->or_like('jenis5', $q);
	$this->db->or_like('ukuran5', $q);
	$this->db->or_like('jumlah5', $q);
	$this->db->or_like('satuan5', $q);
	$this->db->or_like('keterangan5', $q);
	$this->db->or_like('user_id', $q);
	$this->db->or_like('date_created', $q);
	$this->db->or_like('date_updated', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

 