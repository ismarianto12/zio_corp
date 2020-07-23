<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class M_galeri extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	public function getGambar($id = null) {

        $this->db->select('galeri_gambar.*');
        $this->db->from('galeri_gambar');
   
        if ($id != null) {
            $this->db->where('galeri_gambar.id_user', $id);
        } else {
            $this->db->order_by('id_gambar');
        }
        $query = $this->db->get();
        if ($id != null) {
            return $query->row_array();
        } else {
            return $query->result_array();
        }
    }

    public function getVideo($id = null) {

        $this->db->select('galeri_video.*');
        $this->db->from('galeri_video');
   
        if ($id != null) {
            $this->db->where('galeri_video.id_user', $id);
        } else {
            $this->db->order_by('id_video');
        }
        $query = $this->db->get();
        if ($id != null) {
            return $query->row_array();
        } else {
            return $query->result_array();
        }
    }

    public function updateVideo($data){
        $this->db->insert('galeri_video', $data);
        return $this->db->insert_id();
    }

    public function addGambar($data) {
        $this->db->insert('galeri_gambar', $data);
        return $this->db->insert_id();
    }

    public function remove($id) {
        $this->db->where('id_gambar', $id);
        $query = $this->db->get('galeri_gambar');
        $row = $query->row();

        unlink("./assets/images/galeri/gambar/$row->foto_galeri");

        $this->db->delete('galeri_gambar', array('id_gambar' => $id));
    }

    public function removeVideo($id) {
        $this->db->where('id_video', $id);
        $query = $this->db->get('galeri_video');
        $row = $query->row();

        if($row->video != '')
        {
            unlink("./assets/images/galeri/video/$row->video");
        }

        $this->db->delete('galeri_video', array('id_video' => $id));
    }
}

?>