<?php

class Registration extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Kolkata');
		$this->load->model('Registration_m');
    }

    function index()
    {
        $this->load->view('Registration');
    }

    function registration_submit()
    {

       $reg_name=htmlspecialchars($_POST['name']);  
	   $reg_email=htmlspecialchars($_POST['email']);  
	   $reg_password=htmlspecialchars($_POST['password']);
		
        if($this->exit_email($reg_email) == true)
        {
            echo 0;

        }else{
            $data['u_fullname'] = $reg_name;
            $data['u_email'] = $reg_email;
            $data['u_password'] = md5($reg_password);
			$data['u_create_at'] = date('Y-m-d h:i:s');

			$isInsert=$this->Registration_m->registration_form($data);

			if($isInsert)
			{
				echo 2;
				// Successfully

			}else{
				echo 3;
				// Something wends wrong..

			}
            echo 1;
        }
    }


    function exit_email($reg_email)
    {
        $u_email=$this->Registration_m->check_exit_email($reg_email);
        if($u_email == true)
        {
            return true;
        }else{
            return false;
        }
    }

}