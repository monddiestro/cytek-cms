<?php
class Event_model extends CI_Model
{
    function push_new_event($data) {
        $this->db->insert('events_tbl',$data);
    }
    function pull_event($id) {
        $this->db->where('event_id',$id);
        $query = $this->db->get('events_tbl');
        return $query->result();
    }
}
