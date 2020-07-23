<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_detailnews extends CI_Model 
{
    function __construct() 
    {
        parent::__construct();
    }

    public function add($data)
    {
    	$this->db->insert('detail_news', $data);
        return $this->db->insert_id();
    }

    public function get($id = null) {

        $this->db->select('detail_message.*');
        $this->db->from('detail_message');

        $this->db->where('detail_message.id_message', $id);
   
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getDetailNews($id = null)
    {
        $query = $this->db->query('SELECT distinct detail_news.*, user.nama, user.user_pic, user.role FROM detail_news JOIN user ON detail_news.id_user = user.id_user WHERE detail_news.id_news = '.$id.' ORDER BY detail_news.id_detailnews ASC ');
        return $query->result();
    }

    public function updaterespon($data)
    {
    	$this->db->where('id_detailnews', $data['id_detailnews']);
        $this->db->update('detail_news', $data);
    }

    public function remove($id) {
        $this->db->where('id_detailnews', $id);
        $this->db->delete('detail_news');
    }
}