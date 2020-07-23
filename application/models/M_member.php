<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_member extends CI_Model 
{
    function __construct() 
    {
        parent::__construct();
    }

   public function get($id = null) {

        $this->db->select('user.*');
        $this->db->from('user');
   
        if ($id != null) {
            $this->db->where('user.id_user', $id);
        } else {
            $this->db->order_by('id_user');
        }
        $query = $this->db->get();
        if ($id != null) {
            return $query->row_array();
        } else {
            return $query->result_array();
        }
    }

    public function getMember($keyword = null) {

        $this->db->select('user.*');
        $this->db->from('user');
   
        if ($keyword != null)
        {
            $this->db->where('role', '3');
            $this->db->like('nama', $keyword);
        } 
        else 
        {
            $this->db->where('role', '3');
            $this->db->order_by('id_user');
        }

        $query = $this->db->get();
        return $query->result_array();
    }

      public function cekmember($id,$password) {

        $this->db->select('user.*');
        $this->db->from('user');
        $this->db->where('user.id_user="'.$id.'" AND user.password ="'.$password.'"');
        $this->db->order_by('id_user');
        
        $query = $this->db->get();
        $num = $query->num_rows();
       if($num>0) { 
            return TRUE;
        }
        else
        {
            return FALSE;
        }
        
    }
    /**
     * This function will delete the record based on the id
     * @param $id
     */
    public function remove($id) {
        $this->db->where('id_user', $id);
        $this->db->delete('user');
    }

    /**
     * This function will take the post data passed from the controller
     * If id is present, then it will do an update
     * else an insert. One function doing both add and edit.
     * @param $data
     */
    public function add($data) {
        if (isset($data['id_user'])) {
            $this->db->where('id_user', $data['id_user']);
            $this->db->update('user', $data);
        } else {
            $this->db->insert('user', $data);
            return $this->db->insert_id();
        }
    }

    public function searchNameLike($searchterm) {
        $this->db->select('user.*')->from('user');
        $this->db->group_start();
        $this->db->like('user.nama', $searchterm);
        $this->db->group_end();
        $this->db->order_by('user.id_user');

        $query = $this->db->get();
        return $query->result_array();
    }
}