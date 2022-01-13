<?php

error_reporting(0);
class Login extends CI_Controller{

    
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Kolkata');
        
        //import model
		$this->load->model('Login_m');

        if($this->session->userdata('userdata'))
	    {
			
				redirect(base_url().'Dashboard');

        }

    }


    function index()
    {
        $this->load->view('login');
    }

    function login_submit()
    {
        // $this->load->library('session');

       $u_email=htmlspecialchars($_POST['email']); 
       $u_password=htmlspecialchars($_POST['password']); 

       $user=$this->Login_m->user_login($u_email,$u_password);

       if($user)
       {
           $userdata=array(
                           'u_id'    => $user->u_id,
                           'u_fullname'  =>$user->u_fullname,
                           'u_email'    =>$user->u_email,
                           'authenticated' => TRUE
                           );

            // set session 
           $this->session->set_userdata('userdata',$userdata);
           echo 1;

       }
       else
       {
           echo 0;
       }
        
        

    }


    



}