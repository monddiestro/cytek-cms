<?php
class User_model extends CI_Model
{
    
    function pull_user($email) {
        $this->db->where('email',$email);
        $query = $this->db->get('user_tbl');
        return $query->num_rows();
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

}
