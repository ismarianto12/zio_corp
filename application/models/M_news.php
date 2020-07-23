<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_news extends CI_Model 
{
    function __construct() 
    {
        parent::__construct();
    }

    public function get($id = null) {

        if($id != null)
        {
            $query = $this->db->query('SELECT * FROM news JOIN user ON user.id_user = news.id_user WHERE news.id_news = '.$id.'');
            return $query->row_array();
        }
        else
        {
            $query = $this->db->query('SELECT distinct * FROM news JOIN user ON user.id_user = news.id_user ORDER BY id_news DESC');
            return $query->result_array();
        }
    }

    public function getNewsBupati($id)
    {
        $query = $this->db->query('SELECT * FROM news JOIN user ON user.id_user = news.id_user WHERE user.id_user = '.$id.' ORDER BY news.id_news DESC');
        return $query->result_array();
    }

    public function getDinasNews($id_dinas){
        $this->db->select('news.*');
        $this->db->from('news');
        $this->db->where('news.id_dinas', $id_dinas);
          $query = $this->db->get();
        return $query->result_array();
        

    }

    public function updaterespon($data,$id)
    {
        $this->db->where('id_news', $id);
        $this->db->update('news', $data);
    }

    /**
     * This function will delete the record based on the id
     * @param $id
     */
    public function remove($id) {
        $this->db->where('id_news', $id);
        $query = $this->db->get('news');
        $row = $query->row();

        unlink("./assets/images/news/$row->gambar");

        $this->db->delete('news', array('id_news' => $id));

        $this->db->where('id_news', $id);
        $this->db->delete('detail_news');
    }

    /**
     * This function will take the post data passed from the controller
     * If id is present, then it will do an update
     * else an insert. One function doing both add and edit.
     * @param $data
     */
    public function add($data) {
        if (isset($data['id_news'])) {
            $this->db->where('id_news', $data['id_news']);
            $this->db->update('news', $data);
        } else {
            $this->db->insert('news', $data);
            return $this->db->insert_id();
        }
    }

    public function searchNameLike($searchterm) {
        $this->db->select('news.*')->from('news');
        $this->db->group_start();
        $this->db->like('news.judul', $searchterm);
        $this->db->group_end();
        $this->db->order_by('news.id_news');

        $query = $this->db->get();
        return $query->result_array();
    }
}