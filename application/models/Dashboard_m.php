<?php


class Dashboard_m extends CI_Model{

// get create class data

function get_crete_class($uid)
{
   

    return $this->db->get_where('classroom', ['u_id' => $uid])->result();

}

function count_people_class($id)
{
    $query = $this->db->query("SELECT * FROM classroom_join WHERE c_id='$id'");
  return $query->num_rows();

}


function create_class($data)
{
  $this->db->insert('classroom', $data);
        
        if ($this->db->affected_rows() == '1')
        {
            return true;
        }

        return false;
}

public function create_class_exit($classname)
    {
        $this->db->where('c_name', $classname);
        $query = $this->db->get('classroom');

        if($query->num_rows() > 0) {
           return true;
        }else{
            return false;
        }
    }



    public function join_class_exit($classname)
    {
        $this->db->where('c_code', $classname);
        $query = $this->db->get('classroom');

        if($query->num_rows() > 0) {
            return $query->row();

        }else{
            return false;
        }
    }

    public function join_class_exit1($userid,$classcode)
    {
        $query = $this->db->query("SELECT * FROM classroom WHERE u_id='$userid' AND c_code='$classcode' ");

        // $this->db->where('c_code', $classname);
        // $query = $this->db->get('classroom');

        if($query->num_rows() > 0) {
            return true;

        }else{
            return false;
        }
    }

    public function check_already_join_class($class_id,$user_id)
    {
        $query = $this->db->query("SELECT * FROM classroom_join WHERE c_id='$class_id' AND u_id='$user_id'");
        if($d = $query->num_rows() > 0) {
            
            return true;
           

        }else{
            return false;
        }
    }

    public function join_class($data){
        $this->db->insert('classroom_join', $data);
        
        if ($this->db->affected_rows() == '1')
        {
            return true;
        }

        return false;
    }


public function get_join_class($id)
{
    
    $this->db->where('u_id',$id);
    $query = $this->db->get('classroom_join');


    if($query->num_rows() > 0)
    {
        return $query->result_array();
    }else{
        return false;
    }

}


public function get_join_class_details($id)
{

    $this->db->where('c_id', $id);
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
    


}



?>