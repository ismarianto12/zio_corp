<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_visi extends CI_Model 
{
    function __construct() 
    {
        parent::__construct();
    }

   public function get($id = null) {

        $this->db->select('visi.*');
        $this->db->from('visi');
   
        if ($id != null) {
            $this->db->where('visi.id_visi', $id);
        } else {
            $this->db->order_by('id_visi');
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
        $this->db->where('id_visi', $id);
        $this->db->delete('visi');
    }

    /**
     * This function will take the post data passed from the controller
     * If id is present, then it will do an update
     * else an insert. One function doing both add and edit.
     * @param $data
     */
    public function add($data) {
        if (isset($data['user_id'])) {
            $this->db->where('id_visi', '1');
            $this->db->update('visi', $data);
        } else {
            $this->db->insert('visi', $data);
            return $this->db->insert_id();
        }
    }
 
}