<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Estimasi_iuran_model extends CI_Model
{

    public $table = 'estimasi_iuran';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('id,jenis_id,subkategori_id,nilai,quantity,tot_bayar,user_id,update_at,creaate_at');
        $this->datatables->from('estimasi_iuran');
        //add this line for join
        //$this->datatables->join('table2', 'estimasi_iuran.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('estimasi_iuran/detail/$1'),'<i class="fa fa-book"></i>Read','class="btn btn-info btn-xs edit"')."  ".anchor(site_url('estimasi_iuran/edit/$1'),'<i class="fa fa-edit"></i> Update','class="btn btn-success btn-xs edit"')."<a href='#' class='btn btn-danger btn-xs delete' onclick='javasciprt: return hapus($1)'><i class='fa fa-trash'></i> Delete</a>", 'id');
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
	$this->db->or_like('jenis_id', $q);
	$this->db->or_like('subkategori_id', $q);
	$this->db->or_like('nilai', $q);
	$this->db->or_like('quantity', $q);
	$this->db->or_like('tot_bayar', $q);
	$this->db->or_like('user_id', $q);
	$this->db->or_like('update_at', $q);
	$this->db->or_like('creaate_at', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
	$this->db->or_like('jenis_id', $q);
	$this->db->or_like('subkategori_id', $q);
	$this->db->or_like('nilai', $q);
	$this->db->or_like('quantity', $q);
	$this->db->or_like('tot_bayar', $q);
	$this->db->or_like('user_id', $q);
	$this->db->or_like('update_at', $q);
	$this->db->or_like('creaate_at', $q);
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

 