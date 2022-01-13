<?php

error_reporting(0);
class Dashboard extends CI_Controller{

    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Kolkata');
        $this->load->model('Dashboard_m');

        // check user login session
        if( !$this->session->userdata('userdata' )){
            redirect(base_url().'Login');
        }

    }

    function index()
    {
        $data['title']="Dashboard";
        
        $this->load->view('common/header',$data);
        $this->load->view('Dashboard',$data);
        $this->load->view('common/footer');

    }

    function load_classes()
    {

        if(isset($_POST['action'])){

        $id=$_POST['userid'];
        //     exit;

            $create_by_me='';

            //call model method
            $data = $this->Dashboard_m->get_crete_class($id);

            foreach($data as $d)
            {

                // print_r($d->c_id);
                $countpeople = $this->Dashboard_m->count_people_class($d->c_id);
               
                $create_by_me.='  <div class="col-md-3">
                <!-- Widget: user widget style 1 -->
                <a href="'.base_url().'Cla/c/'.$d->c_id.'" style="color:black">
                <div class="card card-widget widget-user">
                  <!-- Add the bg color to the header using any of the bg-* classes -->
                  <div class="widget-user-header" style="background-color:'.$d->c_back_color.'">
                    <h5 class="widget-user-username" style="font-size:20px;margin-bottom:10px">'.$d->c_name.'</h5>
                    <h5 class="widget-user-desc">'.$this->session->userdata('userdata')['u_fullname'].'</h5>
                  </div>
                  <div class="widget-user-image">
                    <img class="img-circle elevation-2" src="'.assets.'dist/img/'.$d->c_profile_image.'" alt="User Avatar">
                  </div>
                  <div class="card-footer">
                    <div class="row">
                      <div class="col-sm-4 border-right">
                        <div class="description-block">
                          <!-- <h5 class="description-header">3,200</h5>
                          <span class="description-text">SALES</span> -->
                          <i class="fas fa-user-tag" style="font-size:25px;margin-top:10px"></i>
                        </div>
                        <!-- /.description-block -->
                      </div>
                      <!-- /.col -->
                      <div class="col-sm-4 border-right">
                        <div class="description-block">
                        <h5 class="description-header">'.$countpeople.'</h5>
                          <span class="description-text">People</span>
                        </div>
                        <!-- /.description-block -->
                      </div>
                      <!-- /.col -->
                      <div class="col-sm-4">
                        <div class="description-block">
                          <h5 class="description-header">'.$d->year.'</h5>
                          <span class="description-text">Year</span>
                        </div>
                        <!-- /.description-block -->
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
                  </div>
                </div>
                </a>
                <!-- /.widget-user -->
              </div>
              ';

            }

            echo $create_by_me;

            
            
        }
    }


// ------------------------------------------create class ---------------------------------------
    function create_class()
    {

        $data['u_id']=$this->session->userdata('userdata')['u_id'];
        $data['c_code'] = $this->generateRandomString();

        $data['c_back_color']=$this->generatebackground();
        $data['c_profile_image']="user1-128x128.jpg";

        $data['c_name']=htmlspecialchars($_POST['class_name']); 
        $data['year'] = "2021";
        $data['c_create_at']=date('Y-m-d h:i:s');
        // $u_password=htmlspecialchars($_POST['password']); 

        // if($this->Dashboard_m->check)

        $response = array();
        if($this->Dashboard_m->create_class_exit($data['c_name'])){

          $response['success'] = false;
          $response['msg'] = "This Class Name alredy exit..!";
          // echo 

        }else{

          if($this->Dashboard_m->create_class($data))
          {
            $response['success'] = true;
            $response['msg'] = "Class Created Successfully..!";

          }else{
            $response['success'] = false;
            $response['msg'] = "Something wends wrong..!";
          }

        }

        echo json_encode($response);
    }

    function generateRandomString($length = 8) {
      return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
  }

  function generatebackground()
  {
    $color_array=array("#eee3e7","#b3cde0","#f9caa7","#83d0c9","#dddddd","#a8e6cf",
  "#dcedc1","#ffd3b6","#ffaaa5","#ff8b94");
$t = rand(0,9);
return $color_array[$t];
  }


  // ---------------------------------------------------------join class

  function join_class()
  {
       
        $name=htmlspecialchars($_POST['join_class_name']); 
      
        // check this class already join
        if($r = $this->Dashboard_m->join_class_exit($name)){

          $data['c_id'] =  $r->c_id;
          $data['u_id'] = $this->session->userdata('userdata')['u_id'];
      
         
          //check already join or not
            if($d = $this->Dashboard_m->check_already_join_class($data['c_id'],$data['u_id']))
            {
                
                $response['success'] = false;
                $response['msg'] = "You have already Join this class..!";

            }else{

                //again check class exit in classroom table

                  if($r = $this->Dashboard_m->join_class_exit1($data['u_id'],$name)){

                      $response['success'] = false;
                      $response['msg'] = "You have already Join this class..!";

                  }else{

                    $data['join_date']=date('Y-m-d h:i:s');
                    $isJoin = $this->Dashboard_m->join_class($data);
                  
                    $response['msg'] = $isJoin ? "Join Successfully.." : "Something went wrong";
                    $response['success'] = $isJoin ? true : false;

                  }
            }
        }else{

          $response['success'] = false;
          $response['msg'] = "Class not Available..!";
        }

        echo json_encode($response);
  }



  function join_load_classes()
  {

    $uid = $this->session->userdata('userdata')['u_id'];

    $data = $this->Dashboard_m->get_join_class($uid);

    if($data)
    {
      $join_classes='<div class="col-md-12 mt-4 mb-3">
                      <h3 class="text-decoration-none">My Join Classes</h3>
                    </div>';

      foreach($data as $d)
      {
        
        $class_details = $this->Dashboard_m->get_join_class_details($d['c_id']);
        $u_id = $class_details->u_id;

        $user_details = $this->Dashboard_m->get_join_own_details($u_id);

        // $user_details->u_fullname;

        // $c_id = $class_details->c_id;
        // $classname = $class_details->c_name;
        // $c_back_color = $class_details->c_back_color;
        // $c_profile_image = $class_details->c_profile_image;
        // $year = $class_details->year;

        
        $join_classes.='<div class="col-md-3">
        <!-- Widget: user widget style 1 -->
        <a href="'.base_url().'Cla/v/'.$class_details->c_id.'" style="color:black">
        <div class="card card-widget widget-user">
          <!-- Add the bg color to the header using any of the bg-* classes -->
          <div class="widget-user-header" style="background-color:'.$class_details->c_back_color.'">
            <h5 class="widget-user-username" style="font-size:20px;margin-bottom:10px">'.$class_details->c_name.'</h5>
            <h5 class="widget-user-desc">'.$user_details->u_fullname.'</h5>
          </div>
          <div class="widget-user-image">
            <img class="img-circle elevation-2" src="'.assets.'dist/img/'.$class_details->c_profile_image.'" alt="User Avatar">
          </div>
          <div class="card-footer">
            <div class="row">
              <div class="col-sm-4 border-right">
                <div class="description-block">
                  <!-- <h5 class="description-header">3,200</h5>
                  <span class="description-text">SALES</span> -->
                  <i class="fas fa-user-tag" style="font-size:25px;margin-top:10px"></i>
                </div>
                <!-- /.description-block -->
              </div>
              <!-- /.col -->
              
              <!-- /.col -->
              <div class="col-sm-8">
                <div class="description-block">
                  <h5 class="description-header">'.$class_details->year.'</h5>
                  <span class="description-text">Year</span>
                </div>
                <!-- /.description-block -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
        </div>
        </a>
        <!-- /.widget-user -->
      </div>
      ';



      }
      echo $join_classes;
    }
   
  

  }
 


}