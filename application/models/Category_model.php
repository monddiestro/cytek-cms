<?php
class Category_model extends CI_Model
{
    function push_category($data) {
        $this->db->insert('category_tbl',$data);
    }
    function pull_categories() {
      $query = $this->db->get('category_tbl');
      return $query->result();
    }
    function pull_subcategories() {
      $this->db->join('category_tbl','category_tbl.cat_id = subcategory_tbl.cat_id', 'inner');
      $this->db->order_by('category_tbl.cat_title','ASC');
      $this->db->order_by('subcat_title','ASC');
      $query = $this->db->get('subcategory_tbl');
      return $query->result();
    }
    function push_subcategory($data) {
      $this->db->insert('subcategory_tbl',$data);
    }
    function pull_category_subcategories($cat_id) {
      $this->db->where('cat_id',$cat_id);
      $query = $this->db->get('subcategory_tbl');
      return $query->result();
    }
    function drop_category($cat_id) {
      $this->db->where('cat_id',$cat_id);
      $this->db->delete('subcategory_tbl');
      $this->db->where('cat_id',$cat_id);
      $this->db->delete('category_tbl');
    }
    function drop_subcategory($subcat_id) {
      $this->db->where('subcat_id',$subcat_id);
      $this->db->delete('subcategory_tbl');
    }
    function update_category($cat_id,$data) {
      $this->db->where('cat_id',$cat_id);
      $this->db->set($data);
      $this->db->update('category_tbl');
    }
    function update_subcategory($subcat_id,$data) {
      $this->db->where('subcat_id',$subcat_id);
      $this->db->set($data);
      $this->db->update('subcategory_tbl');
    }
    function pull_category($cat_id) {
      $this->db->where('cat_id',$cat_id);
      $query = $this->db->get('category_tbl');
      return $query->result();
    }
    function pull_subcategory($subcat_id) {
      $this->db->where('subcat_id',$subcat_id);
      $this->db->join('category_tbl','subcategory_tbl.cat_id = category_tbl.cat_id');
      $this->db->select('subcat_id,subcat_title,subcategory_tbl.cat_id, subcategory_tbl.description, subcategory_tbl.img, subcategory_tbl.keyword,cat_title');
      $query = $this->db->get('subcategory_tbl');
      return $query->result();
    }

    function pull_subcategory_product($subcat_id) {
      $this->db->where('subcat_id',$subcat_id);
      $query = $this->db->get('product_tbl');
      return $query->result();
    }
}
