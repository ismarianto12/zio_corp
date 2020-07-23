<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class M_sponsor extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function get($id = null) {

        $this->db->select('sponsor.*');
        $this->db->from('sponsor');
   
        if ($id != null) {
            $this->db->where('sponsor.id_sponsor', $id);
        } else {
            $this->db->order_by('id_sponsor');
        }
        $query = $this->db->get();
        if ($id != null) {
            return $query->row_array();
        } else {
            return $query->result_array();
        }
    }

    public function add($data) {
        if (isset($data['id_sponsor'])) {
            $this->db->where('id_sponsor', $data['id_sponsor']);
            $this->db->update('sponsor', $data);
        } else {
            $this->db->insert('sponsor', $data);
            return $this->db->insert_id();
        }
    }

    public function remove($id) {

        $this->db->where('id_sponsor', $id);
        $query = $this->db->get('sponsor');
        $row = $query->row();

        unlink("./assets/images/sponsor/$row->foto_sponsor");

        $this->db->delete('sponsor', array('id_sponsor' => $id));
    }
}

?>