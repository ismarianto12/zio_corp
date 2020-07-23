<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class M_fasilitas extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	public function get($id = null) {

        $this->db->select('fasilitas.*');
        $this->db->from('fasilitas');
   
        if ($id != null) {
            $this->db->where('fasilitas.id_fasilitas', $id);
        } else {
            $this->db->order_by('id_fasilitas', 'DESC');
        }
        $query = $this->db->get();
        if ($id != null) {
            return $query->row_array();
        } else {
            return $query->result_array();
        }
    }

    public function getprof($id = null) {

        $this->db->select('fasilitas.*');
        $this->db->from('fasilitas');
   
        if ($id != null) {
            $this->db->where('fasilitas.id_fasilitas', $id);
        } else {
            $this->db->order_by('id_fasilitas');
        }

        $query = $this->db->get();
        
        if ($id != null) {
            return $query->row_array();
        } else {
            return $query->result_array();
        }
    }

    public function add($data) {
        if (isset($data['id_fasilitas'])) {
            $this->db->where('id_fasilitas', $data['id_fasilitas']);
            $this->db->update('fasilitas', $data);
        } else {
            $this->db->insert('fasilitas', $data);
            return $this->db->insert_id();
        }
    }

    public function remove($id) {

        $this->db->where('id_fasilitas', $id);
        $query = $this->db->get('fasilitas');
        $row = $query->row();

        unlink("./assets/images/fasilitas/$row->foto_fasilitas");

        $this->db->delete('fasilitas', array('id_fasilitas' => $id));
    }
}

?>