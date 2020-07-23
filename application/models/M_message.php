<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_message extends CI_Model 
{
    function __construct() 
    {
        parent::__construct();
    }

    public function add($data)
    {
    	$this->db->insert('message', $data);
        return $this->db->insert_id();
    }

    public function get($id = null) {
         if ($id != null) 
         {
            $query = $this->db->query('SELECT * FROM message
                JOIN user ON user.id_user = message.id_user WHERE message.id_message = '.$id.'');
            return $query->row_array();
        } else 
        {
            $query = $this->db->query('SELECT * FROM message
                JOIN user ON user.id_user = message.id_user ORDER BY id_message DESC');
            return $query->result_array();
        }
    }

    public function getMsgMember($id) {

        $query = $this->db->query('SELECT * FROM message
                JOIN user ON user.id_user = message.id_user WHERE message.id_user = '.$id.' ORDER BY id_message DESC '); 

        return $query->result_array();
    }

    public function remove($id) 
    {
        $this->db->where('id_message', $id);
        $query = $this->db->get('message');
        $row = $query->row();

        unlink("./assets/images/message/$row->gambar_message");

        $this->db->delete('message', array('id_message' => $id));

        $this->db->where('id_message', $id);
        $this->db->delete('detail_message');
    }

    public function getCountMsg($id){
    	$this->db->select('detail_message.*');
    	$this->db->where('detail_message.id_message', $id);
    	$query = $this->db->get();
    	return $query->result_array();
    }
}