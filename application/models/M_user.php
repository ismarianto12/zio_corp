<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_user extends CI_Model 
{
    function __construct() 
    {
        parent::__construct();
    }

   public function get($id = null) {

        $this->db->select('user.*');
        $this->db->from('user');
   
        if ($id != null) {
            $this->db->where('user.id_user', $id);
        } else {
            $this->db->order_by('id_user');
        }
        $query = $this->db->get();
        if ($id != null) {
            return $query->row_array();
        } else {
            return $query->result_array();
        }
    }

    public function getBupati($keyword = null)
    {
        $this->db->select('user.*');
        $this->db->from('user');
   
        if ($keyword != null) 
        {
            $this->db->like('nama', $keyword);
            $this->db->where('user.role', 1);
        } 
        else 
        {
            $this->db->where('user.role', 1);
            $this->db->order_by('id_user');
        }
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getAkunDinas($keyword = null)
    {
        $this->db->select('user.*');
        $this->db->from('user');
   
        if ($keyword != null) 
        {
            $this->db->like('nama', $keyword);
            $this->db->where('user.role', 2);
        } 
        else 
        {
            $this->db->where('user.role', 2);
            $this->db->order_by('id_user');
        }
        $query = $this->db->get();
        return $query->result_array();
    }

      public function cekUser($id,$password) {

        $this->db->select('user.*');
        $this->db->from('user');
        $this->db->where('user.id_user="'.$id.'" AND user.password ="'.$password.'"');
        $this->db->order_by('id_user');
        
        $query = $this->db->get();
        $num = $query->num_rows();
       if($num>0) { 
            return TRUE;
        }
        else
        {
            return FALSE;
        }
        
    }
    /**
     * This function will delete the record based on the id
     * @param $id
     */
    public function remove($id) {

        $this->db->where('id_user', $id);
        $query = $this->db->get('user');
        $row = $query->row();

        unlink("./assets/images/bupati/photo_profile/$row->user_pic");
        unlink("./assets/images/bupati/photo_profile/$row->foto_sampul");

        $this->db->delete('user', array('id_user' => $id));
    }

    /**
     * This function will take the post data passed from the controller
     * If id is present, then it will do an update
     * else an insert. One function doing both add and edit.
     * @param $data
     */
    public function add($data) {
        if (isset($data['id_user'])) {
            $this->db->where('id_user', $data['id_user']);
            $this->db->update('user', $data);
        } else {
            $this->db->insert('user', $data);
            return $this->db->insert_id();
        }
    }

    public function searchNameLike($searchterm) {
        $this->db->select('user.*')->from('user');
        $this->db->group_start();
        $this->db->like('user.nama', $searchterm);
        $this->db->group_end();
        $this->db->order_by('user.id_user');

        $query = $this->db->get();
        return $query->result_array();
    }

       public function getDinas($iduser=null) {

        $this->db->select('a.id_user,a.username,a.password,a.nama,a.email,a.jabatan,a.telepon,a.role,a.id_dinas,
b.nama_dinas,b.alamat_dinas,b.no_telepon');
        $this->db->from('user a');
        $this->db->join('dinas b','a.id_dinas = b.id_dinas');
        if ($iduser != null) {
            $this->db->where('a.id_user', $iduser);
        } else {
            $this->db->order_by('id_user');
        }
        $query=$this->db->get();
        if ($iduser != null) {
            return $query->row_array();
        } else {
            return $query->result_array();
        }
    }
}