<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_detailmessage extends CI_Model 
{
    function __construct() 
    {
        parent::__construct();
    }

    public function add($data)
    {
    	$this->db->insert('detail_message', $data);
        return $this->db->insert_id();
    }

    public function get($id = null) {

        $this->db->select('detail_message.*');
        $this->db->from('detail_message');

        $this->db->where('detail_message.id_message', $id);
   
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getTest($id = null)
    {
        $query = $this->db->query('SELECT detail_message.*, user.nama, user.user_pic, user.role FROM detail_message JOIN user ON detail_message.id_user = user.id_user WHERE detail_message.id_message = '.$id.' ORDER BY detail_message.id_detail ASC ');
        return $query->result();
    }

    public function remove($id) {
        $this->db->where('id_detail', $id);
        $this->db->delete('detail_message');
    }
}