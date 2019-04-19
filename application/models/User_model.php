<?php
class User_model extends CI_Model
{
    
    function pull_user($email) {
        $this->db->where('email',$email);
        $query = $this->db->get('user_tbl');
        return $query->num_rows();
    }

    function pull_user_details($user_id) {
        $this->db->where('user_id',$user_id);
        $query = $this->db->get('user_tbl');
        return $query->result();
    }

    function pull_userdata($email,$password) {
        $this->db->where('email',$email);
        $this->db->where('password',md5($password));
        $query = $this->db->get('user_tbl');
        return $query->result();
    }

    function pull_users() {
        $this->db->order_by('f_name', 'ASC');
        $query = $this->db->get('user_tbl');
        return $query->result();
    }

    function push_new_user($data) {
        $this->db->insert('user_tbl',$data);
    }

    function pull_user_img($user_id) {
        $this->db->where('user_id',$user_id);
        $this->db->select('img');
        $query = $this->db->get('user_tbl');
        $row = $query->row();
        return $row->img;
    }

    function push_user_update($data,$user_id) {
        $this->db->where('user_id',$user_id);
        $this->db->set($data);
        $this->db->update('user_tbl');
    }
    function drop_user($user_id) {
        $this->db->where('user_id',$user_id);
        $this->db->delete('user_tbl');
    }

    function pull_password($password,$user_id) {
        $this->db->where('password', md5($password));
        $this->db->where('user_id',$user_id);
        $query = $this->db->get('user_tbl');
        return $query->num_rows();
    }

}
