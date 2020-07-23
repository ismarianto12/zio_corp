<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_album extends CI_Model 
{
    function __construct() 
    {
        parent::__construct();
    }

   public function get($id = null) {

        $this->db->select('album.*`');
        $this->db->from('album');
   
        if ($id != null) {
            $this->db->where('album.albumid', $id);
        } else {
            $this->db->order_by('albumid');
        }
        $query = $this->db->get();
        if ($id != null) {
            return $query->row_array();
        } else {
            return $query->result_array();
        }
    }


     public function getAlbumDinas($id = null) {

        $this->db->select('album.*`');
        $this->db->from('album');
   
        if ($id != null) {
            $this->db->where('album.id_dinas', $id);
        } else {
            $this->db->order_by('albumid');
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
        $this->db->where('albumid', $id);
        $this->db->delete('album');
    }

    /**
     * This function will take the post data passed from the controller
     * If id is present, then it will do an update
     * else an insert. One function doing both add and edit.
     * @param $data
     */
    public function add($data) {
        if (isset($data['id'])) {
            $this->db->where('albumid', $data['id']);
            $this->db->update('album', $data);
        } else {
            $this->db->insert('album', $data);
            return $this->db->insert_id();
        }
    }

    public function searchNameLike($searchterm) {
        $this->db->select('album.*')->from('album');
        $this->db->group_start();
        $this->db->like('album.nama_album', $searchterm);
        $this->db->group_end();
        $this->db->order_by('album.albumid');

        $query = $this->db->get();
        return $query->result_array();
    }
}