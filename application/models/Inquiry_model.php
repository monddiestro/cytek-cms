<?php
class Inquiry_model extends CI_Model
{
    function push_lead($data) {
        $this->db->insert('lead_tbl',$data);
    }

    function pull_new_lead_cnt() {
        $this->db->where('status',1);
        $this->db->select('count(lead_id) as count');
        $query = $this->db->get('lead_tbl');
        $row = $query->row();
        return $row->count;
    }

    function pull_new_lead() {
        $this->db->where('status',1);
        $query = $this->db->get('lead_tbl');
        return $query->result();
    }

    function pull_leads() {
        $this->db->order_by('date_created','DESC');
        $query = $this->db->get('lead_tbl');
        return $query->result();
    }

    function pull_lead($lead_id) {
        $this->db->where('lead_id',$lead_id);
        $query = $this->db->get('lead_tbl');
        return $query->result();
    }

    function update_read_status($lead_id) {
        $this->db->where('lead_id',$lead_id);
        $this->db->set('status',2);
        $this->db->update('lead_tbl');
    }

    function drop_lead($lead_id) {
        $this->db->where('lead_id',$lead_id);
        $this->db->delete('lead_tbl');
    }

}
