<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_gallery extends CI_Model 
{
    function __construct() 
    {
        parent::__construct();
    }

   public function get($id = null) {

        $this->db->select('gallery.*');
        $this->db->from('gallery');
   
        if ($id != null) {
            $this->db->where('gallery.gid', $id);
        } else {
            $this->db->order_by('gid');
        }
        $query = $this->db->get();
        if ($id != null) {
            return $query->row_array();
        } else {
            return $query->result_array();
        }
    }

    public function getToken($id = null) {

        $this->db->select('gallery.*');
        $this->db->from('gallery');
   
        if ($id != null) {
            $this->db->where('gallery.token', '$id');
        } else {
            $this->db->order_by('gid');
        }
        $query = $this->db->get();
           if ($id != null) {
            return $query->row_array();
        } else {
            return $query->result_array();
        }
       
    }

      public function getGaleriDinas($id = null) {

 
        $this->db->select('gallery.*,album.*');
        $this->db->from('gallery');
        $this->db->join('album','album.albumid=gallery.aid');


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

    /**
     * This function will delete the record based on the id
     * @param $id
     */
    public function remove($id) {
        $this->db->where('gid', $id);
        $this->db->delete('gallery');
    }

      public function delete($id) {
        $this->db->where('token', '$id');
        $this->db->delete('gallery');
    }

    /**
     * This function will take the post data passed from the controller
     * If id is present, then it will do an update
     * else an insert. One function doing both add and edit.
     * @param $data
     */
    public function add($data) {
      
            $this->db->insert('gallery', $data);
            return $this->db->insert_id();
        
    }

    public function searchNameLike($searchterm) {
        $this->db->select('gallery.*')->from('gallery');
        $this->db->group_start();
        $this->db->like('gallery.gname', $searchterm);
        $this->db->group_end();
        $this->db->order_by('gallery.gid');

        $query = $this->db->get();
        return $query->result_array();
    }
}