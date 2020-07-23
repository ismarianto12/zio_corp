<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Reg_kelengkapan_model extends CI_Model
{

    public $table = 'reg_kelengkapan';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('id,no_registrasi,form_pendaftar,ktp,npwp,pas_foto,data_orang_tua,data_ujian,data_ijazah,data_nilai,data_sertifikat,create_at,upatated_at,created_by');
        $this->datatables->from('reg_kelengkapan');
        //add this line for join
        //$this->datatables->join('table2', 'reg_kelengkapan.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('reg_kelengkapan/detail/$1'),'<i class="fa fa-book"></i>Read','class="btn btn-info btn-xs edit"')."  ".anchor(site_url('reg_kelengkapan/edit/$1'),'<i class="fa fa-edit"></i> Update','class="btn btn-success btn-xs edit"')."<a href='#' class='btn btn-danger btn-xs delete' onclick='javasciprt: return hapus($1)'><i class='fa fa-trash'></i> Delete</a>", 'id');
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
	$this->db->or_like('no_registrasi', $q);
	$this->db->or_like('form_pendaftar', $q);
	$this->db->or_like('ktp', $q);
	$this->db->or_like('npwp', $q);
	$this->db->or_like('pas_foto', $q);
	$this->db->or_like('data_orang_tua', $q);
	$this->db->or_like('data_ujian', $q);
	$this->db->or_like('data_ijazah', $q);
	$this->db->or_like('data_nilai', $q);
	$this->db->or_like('data_sertifikat', $q);
	$this->db->or_like('create_at', $q);
	$this->db->or_like('upatated_at', $q);
	$this->db->or_like('created_by', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
	$this->db->or_like('no_registrasi', $q);
	$this->db->or_like('form_pendaftar', $q);
	$this->db->or_like('ktp', $q);
	$this->db->or_like('npwp', $q);
	$this->db->or_like('pas_foto', $q);
	$this->db->or_like('data_orang_tua', $q);
	$this->db->or_like('data_ujian', $q);
	$this->db->or_like('data_ijazah', $q);
	$this->db->or_like('data_nilai', $q);
	$this->db->or_like('data_sertifikat', $q);
	$this->db->or_like('create_at', $q);
	$this->db->or_like('upatated_at', $q);
	$this->db->or_like('created_by', $q);
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

 