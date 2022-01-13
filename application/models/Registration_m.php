<?php

class Registration_m extends CI_Model{


    // email exit not not
    function check_exit_email($u_email)
    {
        $this->db->where('u_email', $u_email);
        $query = $this->db->get('users');

        if($query->num_rows() > 0) {
            return true;
        }else{
            return false;
        }

    }

    public function registration_form($data)
    {
        $this->db->insert('users', $data);
        if ($this->db->affected_rows() == '1')
        {
            return true;
        }
        return false;
    }

}

