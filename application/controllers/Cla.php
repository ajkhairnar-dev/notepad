<?php

class Cla extends CI_Controller{

    
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Kolkata');

        $this->load->model('Cla_m');

        
        if(!$this->session->userdata('userdata')){
            redirect(base_url().'Login');
        }

    }

    function c($cid)
    {
        $data['title'] = "Classroom";
        $this->session->set_userdata('c_id',$cid);

        $class_details=$this->Cla_m->get_join_class_details($cid);
        $user_details = $this->Cla_m->get_join_own_details($class_details->u_id);
        
        // print_r($class_details);
        $data['hide']=true;
        $data['c_id'] = $cid;
        $data['c_name'] = $class_details->c_name;
        $data['username'] = $user_details->u_fullname;
        $data['code'] = $class_details->c_code;
        $data['year'] = $class_details->year;

        $data['main_title']="Classrooms";
        $this->load->view('common/header',$data);
        $this->load->view('p_class',$data);
        $this->load->view('common/footer');
    }


    function v($cid)
    {
        $data['title'] = "Join Classes";
        $this->session->set_userdata('c_id',$cid);

        $class_details=$this->Cla_m->get_join_class_details($cid);
        $user_details = $this->Cla_m->get_join_own_details($class_details->u_id);
        
        // print_r($class_details);
        $data['hide']=false;
        $data['c_id'] = $cid;
        $data['c_name'] = $class_details->c_name;
        $data['username'] = $user_details->u_fullname;
        $data['code'] = $class_details->c_code;
        $data['year'] = $class_details->year;

        $data['main_title']="Classrooms";
        $this->load->view('common/header',$data);
        $this->load->view('p_class',$data);
        $this->load->view('common/footer');
    }


    function postload()
    {
        
        $class_id = $_POST['classid'];
        $deletehide = $_POST['deletehide'];
        $data = $this->Cla_m->get_post_load($class_id);
        $class_details=$this->Cla_m->get_join_class_details($class_id);
        $user_details = $this->Cla_m->get_join_own_details($class_details->u_id);

        $post='';
        if($data){
            
            foreach($data as $d){
                $post .= '<!-- Post -->
                <div class="post">
                    <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="http://localhost/studynotes/assets/dist/img/user2-160x160.jpg" alt="user image">
                        <span class="username">
                        <a href="#">'.$user_details->u_fullname.'</a>';

                        if($deletehide){
                            $post .= '<a href="#" class="float-right btn-tool" onclick="deletepost('.$d['p_id'].')"><i class="fas fa-times"></i></a>';
                        }
                        
                        $post .= '</span>
                        <span class="description">Shared publicly - '.$d['post_time'].'</span>
                    </div>
                    <!-- /.user-block -->
                    <p>
                        '.$d['text'].'
                    </p>
                    <p>';

                    if($d['file'])
                    {
                      
                        $post .= '<a href="https://localhost/studynotes/uploads/'.$d['file'].'" class="link-black text-sm" target="_blank"><i class="fas fa-link mr-1"></i>'.$d['file'].'</a>';
                    }
                        
                    
                    $post .='</p>
                    <!--<p>
                        <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>

                        <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>

                        <span class="float-right">
                        <a href="#" class="link-black text-sm">
                            <i class="far fa-comments mr-1"></i> Comments (5)
                        </a>
                        </span>
                    </p>
                    
                    <form class="form-horizontal">
                        <div class="input-group input-group-sm mb-0">
                        <input class="form-control form-control-sm" placeholder="Response">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-danger">Send</button>
                        </div>
                        </div>
                    </form>-->
                </div>
            <!-- /.post -->';
            }
        }else{
            $post.='<h4>No any Post</h4>';
        }
        

    
     echo $post;
    }


    




    function uploaddoc()
    {

        $uid = $this->session->userdata('userdata')['u_id'];

        $uploadDir = 'uploads/'; 
        $response = array( 
            'status' => false, 
            'message' => 'Form submission failed, please try again.' 
        ); 
        
        // If form is submitted 
        if(isset($_POST['name']) || isset($_POST['file'])){ 
            // Get the submitted form data 
            $name = $_POST['name']; 
            
            
            // Check whether submitted data is not empty 
            if(!empty($name)){ 
            
                    $uploadStatus = true; 
                    
                    // Upload file 
                    $uploadedFile = ''; 
                    if(!empty($_FILES["file"]["name"])){ 
                        
                        // File path config 
                        $fileName = basename($_FILES["file"]["name"]); 
                        $targetFilePath = $uploadDir . $fileName; 
                        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
                        
                        // Allow certain file formats 
                        $allowTypes = array('pdf', 'doc', 'docx', 'jpg', 'png', 'jpeg', 'txt'); 
                        if(in_array($fileType, $allowTypes)){ 
                            // Upload file to the server 
                            if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){ 
                                $uploadedFile = $fileName; 
                            }else{ 
                                $uploadStatus = false; 
                                $response['status'] = false;
                                $response['message'] = 'Sorry, there was an error uploading your file.'; 
                            } 
                        }else{ 
                            $uploadStatus = false; 
                            $response['status'] = false;
                            $response['message'] = 'Sorry, only PDF, DOC, JPG, JPEG, & PNG files are allowed to upload.'; 
                        } 
                    } 
                    
                    if($uploadStatus == true){ 
                        // Include the database config file 
                        // include_once 'dbConfig.php'; 
                        
                        // // Insert form data in the database 
                        // $insert = $db->query("INSERT INTO form_data (name,email,file_name) VALUES ('".$name."','".$email."','".$uploadedFile."')");
                        
                        $data['c_id'] = $_POST['c_id'];
                        $data['text'] = $name;
                        $data['file'] = $uploadedFile;
                        $data['post_time'] = date('Y-m-d h:i:s');

                        $insert = $this->Cla_m->post($data);
                        
                        if($insert){ 
                            $response['status'] = true; 
                            $response['message'] = 'Form data submitted successfully!'; 
                        }else{
                            $response['status'] = false; 
                            $response['message'] = 'Something Wends Wrong..!'; 
                        }
                    } 
                
            }else{ 
                $response['status'] = false;
                $response['message'] = 'Please Write message..!'; 
            } 
        } 
 
        // Return response 
        echo json_encode($response);
    }


    function deletepost()
    {
        $pi = $_POST['pid'];
        $isDeleted = $this->Cla_m->deletepost($pi);
        if($isDeleted)

        $response['success'] = $isDeleted ? true : false;
        $response['message'] = $isDeleted ? "Post Deleted Successfully..!" : "Something wends wrong..";

        echo json_encode($response);

    }

}