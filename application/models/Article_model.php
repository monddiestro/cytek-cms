<?php 
class Article_model extends CI_Model
{
    function pull_articles() {
        $this->db->order_by('date_created', 'DESC');
        $query = $this->db->get('article_tbl');
        return $query->result();
    }

    function push_article($data) {
        $this->db->insert('article_tbl', $data);
    }

    function pull_article($article_id) {
        $this->db->where('article_id',$article_id);
        $query = $this->db->get('article_tbl');
        return $query->result();
    }

    function push_update($data,$article_id) {
        $this->db->where('article_id',$article_id);
        $this->db->set($data);
        $this->db->update('article_tbl');
    }

    function pull_image($article_id) {
        $this->db->where('article_id',$article_id);
        $this->db->select('img');
        $query = $this->db->get('article_tbl');
        $query = $query->row();
        return !empty($query->img) ? $query->img : '';
    }

    function drop_article($article_id) {
        $this->db->where('article_id',$article_id);
        $this->db->delete('article_tbl');
    }
}
