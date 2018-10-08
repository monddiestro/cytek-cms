<?php 
class Category_model extends CI_Model
{
    function push_category($data) {
        $this->db->insert('category_tbl',$data);
    }
}
