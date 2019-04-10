<?php 
class Career_model extends CI_Model
{
    function push_career($data) {
        $this->db->insert('careers_tbl',$data);
    }

    function pull_careers() {
        $query = $this->db->get('careers_tbl');
        return $query->result();
    }

    function drop_career($career_id) {
        $this->db->where('career_id',$career_id);
        $this->db->delete('careers_tbl');
    }
}
