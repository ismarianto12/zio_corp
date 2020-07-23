<?php

class M_event extends CI_Model {

    public function add($data) {
        if (isset($data["id"])) {

            $this->db->where("id", $data["id"])->update("events", $data);
        } else {

            $this->db->insert("events", $data);
        }
    }

    public function get($id = null) {

        if (!empty($id)) {
            $query = $this->db->where("id", $id)->get("events");
            $query = $this->order_by('start_date');
            return $query->row_array();
        } else {
            $query = $this->db->get("events");
            return $query->result_array();
        }
    }

    public function getBaru($id = null) 
    {
        $query = $this->db->query('SELECT * FROM events WHERE id_user = '.$id.'');
        return $query->result_array();
    }

    public function remove($id) {

        $this->db->where('id', $id);
        $query = $this->db->get('events');
        $row = $query->row();

        unlink("./assets/images/events/$row->foto");

        $this->db->delete('events', array('id' => $id));
    }

    public function getedit($id = null){
        if (!empty($id)) {
            $query = $this->db->where("id", $id)->get("events");
            return $query->row_array();
        } else {
            $query = $this->db->get("events");
            return $query->result_array();
        }
    }
     
    public function getNextEvent($id = null){
        $tgl=date('Y-m-d');
        $action = " status = 'Belum' && id_user = '".$id."' ";
          $query = $this->db->where($action)->get("events");
         
            return $query->result_array();
    }
       
    public function getNowEvent($id = null){
        $tgl=date('Y-m-d');
        $action = " start_date = '".$tgl."' && status = 'Belum' && id_user = '".$id."' ";
        $query = $this->db->where($action)->get("events"); 
        return $query->result_array();

    }

    public function getEventBulan($month){

          $query = $this->db->where("month(start_date)", $month)->get("events");
         
            return $query->result_array();

    }
        public function getLastEvent() {
            $tgl=date("Y-m-d");
            $action = " start_date < '".$tgl."' && status = 'Belum' ";
            $query = $this->db->where($action)->get("events");
        
             return $query->result_array();
       }

    public function doneEvent($id = null){
        $done = " status = 'Selesai' && id_user = '".$id."' ";
        $query = $this->db->where($done)->get("events");
         
        return $query->result_array();
    }

    public function getStudentEvents($id = null) {

        $cond = "event_type = 'public' or event_type = 'task' ";
        $query = $this->db->where($cond)->get("events");
        return $query->result_array();
    }

    public function deleteEvent($id) {

        $this->db->where("id", $id)->delete("events");
    }

    public function getTask($limit = null, $offset = null, $id) {


        $query = $this->db->where(array('event_type' => 'task', 'event_for' => $id))->order_by("is_active,start_date", "asc")->limit($limit, $offset)->get("events");

        return $query->result_array();
    }

    function countrows() {

        $query = $this->db->where("event_type", "task")->get("events");

        return $query->num_rows();
    }

    function countincompleteTask($id) {

        $query = $this->db->where("event_type", "task")->where("is_active", "no")->where("event_for", $id)->where("start_date", date("Y-m-d"))->get("events");

        return $query->num_rows();
    }

    function getincompleteTask($id) {


        $query = $this->db->where("event_type", "task")->where("is_active", "no")->where("event_for", $id)->where("start_date", date("Y-m-d"))->order_by("start_date", "asc")->get("events");

        return $query->result_array();
    }

}

?>