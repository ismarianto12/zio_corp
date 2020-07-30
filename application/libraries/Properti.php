<?php 


class Properti{
     
     
    function __construct()
    {  
        $this->ci = &get_instance();
    }
    
   public function getForm()
    { 
        $data  = $this->ci->db->select_max('id')->from('estimasi_iuran')->get();
        if($data->num_rows() == 0){
            $value = 1;
        }else{
            $value = $data->row()->id;
        }
     return $value;    
    }
    
    
}