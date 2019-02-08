<?php
/**
 *
 */
class Product_model extends CI_Model
{
  function pull_products() {
    $this->db->join('category_tbl', "product_tbl.cat_id = category_tbl.cat_id", "left");
    $this->db->join('subcategory_tbl', "product_tbl.subcat_id = subcategory_tbl.subcat_id", "left");
    $query = $this->db->get('product_tbl');
    return $query->result();
  }
  function push_product($data) {
    $this->db->insert('product_tbl',$data);
    $this->db->select_max('prod_id', 'prod_id');
    $query = $this->db->get('product_tbl');
    $row = $query->row();
    return $row->prod_id;
  }
  function pull_features($prod_id) {
    $this->db->where('prod_id',$prod_id);
    $query = $this->db->get('product_feature_tbl');
    return $query->result();
  }
  function push_feature($data) {
    $this->db->insert('product_feature_tbl',$data);
  }
  function drop_feature($feature_id) {
    $this->db->where('feature_id',$feature_id);
    $this->db->delete('product_feature_tbl');
  }
  function pull_product($prod_id) {
    $this->db->where("prod_id",$prod_id);
    $this->db->join('category_tbl','product_tbl.cat_id = category_tbl.cat_id');
    $this->db->join('subcategory_tbl', 'subcategory_tbl.subcat_id = product_tbl.subcat_id');
    $this->db->order_by('cat_title','ASC');
    $this->db->order_by('subcat_title', 'ASC');
    $this->db->order_by('prod_title', 'ASC');
    $this->db->select('prod_id,prod_title,product_tbl.cat_id,product_tbl.subcat_id,product_tbl.description, product_tbl.img,product_tbl.keyword, product_tbl.date_created, cat_title,subcat_title');
    $query = $this->db->get('product_tbl');
    return $query->result();
  }
  function pull_meta_img($prod_id) {
    $this->db->where('prod_id',$prod_id);
    $this->db->select('meta_img');
    $query = $this->db->get('product_tbl');
    $row = $query->row();
    return $row->meta_img;
  }
  function push_product_update($data,$prod_id) {
    $this->db->where('prod_id',$prod_id);
    $this->db->set($data);
    $this->db->update('product_tbl');
  }
  function pull_specs($prod_id) {
    $this->db->where('prod_id',$prod_id);
    $this->db->select('specs');
    $query = $this->db->get('product_specs_tbl');
    if ($query->num_rows() > 0) {
      $row = $query->row();
      return $row->specs;
    } else {
      return "";
    }
  }
  function push_specs($specs) {
    $this->db->insert('product_specs_tbl',$specs);
  }
  function push_update_specs($prod_id,$specs) {
    $this->db->query("update product_specs_tbl set specs = '".$specs."' where prod_id=".$prod_id);
  }
  function pull_banners($prod_id) {
    $this->db->where('prod_id',$prod_id);
    $query = $this->db->get('product_banner_tbl');
    return $query->result();
  }
  function push_banner($data) {
    $this->db->insert('product_banner_tbl',$data);
  }
  function pull_banner($banner_id) {
    $this->db->where('banner_id',$banner_id);
    $this->db->select('image_path');
    $query = $this->db->get('product_banner_tbl');
    $row = $query->row();
    return $row->image_path;
  }
  function drop_banner($banner_id) {
    $this->db->where('banner_id',$banner_id);
    $this->db->delete('product_banner_tbl');
  }

  function pull_product_image($prod_id) {
    $this->db->where('prod_id',$prod_id);
    $this->db->select('img');
    $query = $this->db->get('product_tbl');
    $row = $query->row();
    return $row->img;
  }

}
