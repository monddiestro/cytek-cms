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
}
