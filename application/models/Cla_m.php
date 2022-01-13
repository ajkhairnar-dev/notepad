<?php

    class Cla_m extends CI_Model{

        
        public function get_join_class_details($cid)
        {

            $this->db->where('c_id', $cid);
                $query = $this->db->get('classroom');

                if($query->num_rows() > 0) {
                    return $query->row();

                }else{
                    return false;
                }
        }

        function get_join_own_details($user_id)
        {
            $this->db->select("u_fullname");
            $this->db->where('u_id', $user_id);
            $query = $this->db->get('users');

            if($query->num_rows() > 0) {
                return $query->row();
            }
        }

        
        function post($data)
        {
            $this->db->insert('post_files', $data);
                
                if ($this->db->affected_rows() == '1')
                {
                    return true;
                }

                return false;
        }


        function get_post_load($c_id)
        {
            
            $this->db->where('c_id',$c_id);
            $this->db->order_by('p_id','desc');
            $query = $this->db->get('post_files');
    
    
            if($query->num_rows() > 0)
            {
                return $query->result_array();
            }else{
                return false;
            }
    
        }

        function deletepost($pi)
        {
            $this->db->where("p_id", $pi);
            $this->db->delete("post_files");
            return true;
        }


    }

    
  

?>