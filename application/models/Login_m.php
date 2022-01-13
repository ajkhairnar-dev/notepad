<?php

    class Login_m extends CI_Model{

        function user_login($u_email,$u_password)
        {
        
            $this->db->where('u_email', $u_email);
            $this->db->where('u_password', md5($u_password));
           
            $query = $this->db->get('users');
    
            if($query->num_rows() == 1) {
                return $query->row();
            }
    
            return false;
           
        }
    


    }

?>