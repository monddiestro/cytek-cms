<?php
class Page_model extends CI_Model
{
    function pull_page_meta($page_id) {
        $this->db->where('page_id',$page_id);
        $query = $this->db->get('page_tbl');
        return $query->result();
    }

    function push_slider($data) {
        $this->db->insert('slider_tbl',$data);
    }

    function pull_slider() {
        $query = $this->db->get('slider_tbl');
        return $query->result();
    }

    function pull_slider_img($slider_id) {
        $this->db->where('slider_id',$slider_id);
        $this->db->select('img');
        $query = $this->db->get('slider_tbl');
        $query = $query->row();
        return $query->img;
    }

    function push_update($data,$slider_id) {
        $this->db->where('slider_id',$slider_id);
        $this->db->set($data);
        $this->db->update('slider_tbl');
    }
    
    function drop_slider($slider_id) {
        $this->db->where('slider_id',$slider_id);
        $this->db->delete('slider_tbl');
    }

    function pull_page_image($id) {
        $this->db->where('page_id',$id);
        $this->db->select('meta_image');
        $query = $this->db->get('page_tbl');
        $query = $query->row();
        return $query->meta_image;
    }

    function push_update_page($data,$id) {
        $this->db->where('page_id',$id);
        $this->db->set($data);
        $this->db->update('page_tbl');
    }

    function pull_description($page_id) {
        $this->db->where('page_id',$page_id);
        $this->db->select('met_description');
        $query = $this->db->get('page_tbl');
        $query = $query->row();
        return $query->meta_description;
    }
}
