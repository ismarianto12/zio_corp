<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_login extends CI_Model{	

	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	function cek_login($table,$where){		
		return $this->db->get_where($table,$where);
	}
	
	function check_user($kduser, $pass)
	{
		$query = $this->db->select('id_user,username,nama,role,id_dinas')->get_where('user',array('username' => $kduser, 'password' => $pass), 1, 0);
		if ($query->num_rows() > 0)
		{
			return $query->row_array();
		}
		else
		{
				return FALSE; 
				redirect('/web/login','locate');	
		}

   }
	
    function check_member($kduser, $pass)
	{
		$query = $this->db->select('id_user,telepon,nama')->get_where('user',array('telepon' => $kduser, 'password' => $pass), 1, 0);
		if ($query->num_rows() > 0)
		{
			 
			return  $query->row_array();
		 
		}
		else{
				return FALSE; 
				redirect('/web/login','locate');	
		}

   }

    function check_role($idrole)
    {
		
    	 $this->db->select('id_user,nama,username,role');
		 $this->db->where('username',$idrole);
		 $query=$this->db->get('user');
	 
	       $role=$query->row_array();
       
        return $role;
	}
}
