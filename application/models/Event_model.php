<?php
class Event_model extends CI_Model
{
    function push_new_event($data) {
        $this->db->insert('events_tbl',$data);
        $this->db->select_max('event_id', 'event_id');
        $query = $this->db->get('events_tbl');
        $row = $query->row();
        return $row->event_id;
    }
    function pull_event($id) {
        $this->db->where('event_id',$id);
        $query = $this->db->get('events_tbl');
        return $query->result();
    }

    function pull_events() {
        $this->db->order_by('date_created','DESC');
        $query = $this->db->get('events_tbl');
        return $query->result();
    }

    function pull_events_count() {
        $query = $this->db->get('events_tbl');
        return $query->num_rows();
    }
}
