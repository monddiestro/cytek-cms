<?php
class Page_model extends CI_Model
{
    function pull_page_meta($page_id) {
        $this->db->where('page_id',$page_id);
        $query = $this->db->get('page_tbl');
        return $query->result();
    }
}
