<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_quiz extends CI_Model 
{
  public   function __construct() 
    {
        parent::__construct();
    }


   public function num_qbank(){
   
   $query=$this->db->get('questions');
    return $query->num_rows();
   }
 
 
 
  public function get_question($qid){
   $this->db->where('qid',$qid);
   $query=$this->db->get('questions');
   return $query->row_array();
   
 
 }
  public function get_question_day($date){
   $this->db->where('tgl',$date);
   $query=$this->db->get('questions');
   return $query->row_array();
   
 
 }

  public function get_option($qid){
   $this->db->where('qid',$qid);
   $query=$this->db->get('choices');
   return $query->result_array();
  }
 
  public function remove($id) {
        $this->db->where('qid', $id);
        $this->db->delete('questions');
    }

      public function delete($id) {
        $this->db->where('qid', '$id');
        $this->db->delete('questions');
    }

    
    public function add($data) {
      
            $this->db->insert('questions', $data);
            return $this->db->insert_id();     
    }
 
    public function removeOpsi($cid){
        $this->db->where('id', $cid);
        $this->db->delete('choices');
    }

     public function addOpsi($data) {
        $this->db->insert('choices', $data);
        return $this->db->insert_id();     
    }
   
     public function getRightAnswer($qid,$is_correct=1){
     //$array = array('qid=' => $qid, 'is_correct =' => $is_correct);
   $this->db->where(array('qid=' => $qid, 'is_correct =' => $is_correct));
   
   $query=$this->db->get('choices');
   return $query->row_array();
   
  }

    public function saveAnswer($data){
      $this->db->insert('jawaban',$data);
      return $this->db->insert_id();
    }

      public function cekJawabanUser($userid,$date){
     //$array = array('qid=' => $qid, 'is_correct =' => $is_correct);
   $this->db->where(array('id_user=' => $userid, 'date_answer =' => $date));
   
   $query=$this->db->get('jawaban');
   return $query->num_rows();
   
  }
   public function hasilJawabanUser($userid,$date){
     //$array = array('qid=' => $qid, 'is_correct =' => $is_correct);
   $this->db->where(array('id_user=' => $userid, 'date_answer =' => $date));
   
   $query=$this->db->get('jawaban');
   return $query->row_array();
   
  }

}