<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_dinas extends CI_Model 
{
    function __construct() 
    {
        parent::__construct();
    }

   public function get($id = null) {

        $this->db->select('dinas.*');
        $this->db->from('dinas');
   
        if ($id != null) {
            $this->db->where('dinas.id_dinas', $id);
        } else {
            $this->db->order_by('id_dinas');
        }
        $query = $this->db->get();
        if ($id != null) {
            return $query->row_array();
        } else {
            return $query->result_array();
        }
    }

    /**
     * This function will delete the record based on the id
     * @param $id
     */
    public function remove($id) {
        $this->db->where('id_dinas', $id);
        $this->db->delete('dinas');
    }

    /**
     * This function will take the post data passed from the controller
     * If id is present, then it will do an update
     * else an insert. One function doing both add and edit.
     * @param $data
     */
    public function add($data) {
        if (isset($data['id_dinas'])) {
            $this->db->where('id_dinas', $data['id_dinas']);
            $this->db->update('dinas', $data);
        } else {
            $this->db->insert('dinas', $data);
            return $this->db->insert_id();
        }
    }

    public function searchNameLike($searchterm) {
        $this->db->select('dinas.*')->from('dinas');
        $this->db->group_start();
        $this->db->like('dinas.nama_dinas', $searchterm);
        $this->db->group_end();
        $this->db->order_by('dinas.id_dinas');

        $query = $this->db->get();
        return $query->result_array();
    }
}