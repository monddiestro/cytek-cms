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

}
