<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class M_profile extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	public function get($id = null) {

        $this->db->select('profile.*');
        $this->db->from('profile');
   
        if ($id != null) {
            $this->db->where('profile.id_profile', $id);
        } else {
            $this->db->order_by('id_profile', 'DESC');
        }
        $query = $this->db->get();
        if ($id != null) {
            return $query->row_array();
        } else {
            return $query->result_array();
        }
    }

    public function getprof($id = null) {

        $this->db->select('profile.*');
        $this->db->from('profile');
   
        if ($id != null) {
            $this->db->where('profile.id_user', $id);
        } else {
            $this->db->order_by('id_profile');
        }

        $query = $this->db->get();
        
        if ($id != null) {
            return $query->row_array();
        } else {
            return $query->result_array();
        }
    }

    public function add($data) {
        if (isset($data['id_profile'])) {
            $this->db->where('id_profile', $data['id_profile']);
            $this->db->update('profile', $data);
        } else {
            $this->db->insert('profile', $data);
            return $this->db->insert_id();
        }
    }

    public function remove($id) {

        $this->db->where('id_profile', $id);
        $query = $this->db->get('profile');
        $row = $query->row();

        unlink("./assets/images/profile/$row->foto_profile");

        $this->db->delete('profile', array('id_profile' => $id));
    }
}

?>