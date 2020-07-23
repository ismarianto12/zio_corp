<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class M_slide extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	public function get($id = null) {

        $this->db->select('slide.*');
        $this->db->from('slide');
   
        if ($id != null) {
            $this->db->where('slide.id_slide', $id);
        } else {
            $this->db->order_by('id_slide');
        }
        $query = $this->db->get();
        if ($id != null) {
            return $query->row_array();
        } else {
            return $query->result_array();
        }
    }

    public function getMarquee($id = null) {

        $this->db->select('marquee.*');
        $this->db->from('marquee');
   
        if ($id != null) {
            $this->db->where('marquee.id_marque', $id);
        } else {
            $this->db->order_by('id_marque');
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

    public function updateMarque($data) {
        $this->db->where('id_marque', $data['id_marque']);
        $this->db->update('marquee', $data);
    }

    public function add($data) {
        $this->db->insert('slide', $data);
        return $this->db->insert_id();
    }

    public function remove($id) {

        $this->db->where('id_slide', $id);
        $query = $this->db->get('slide');
        $row = $query->row();

        unlink("./assets/images/slidefoto/$row->foto");

        $this->db->delete('slide', array('id_slide' => $id));
    }
}

?>