<style>
   .note-editor.note-frame .note-editing-area, .note-editor.note-airframe .note-editing-area {
    height: 180px;
    overflow: hidden;
}

</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
           
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Classroom</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="http://localhost/studynotes/assets/dist/img/user2-160x160.jpg"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?=$username?></h3>

                <p class="text-muted text-center"><?=$c_name?></p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Code</b> <a class="float-right"><?=$code?></a>
                  </li>
                  <!-- <li class="list-group-item">
                    <b>Create</b> <a class="float-right">543</a>
                  </li> -->
                  <li class="list-group-item">
                    <b>Year</b> <a class="float-right"><?=$year?></a>
                  </li>
                </ul>

                <!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

           
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Post</a></li>
                  <!-- <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">People</a></li> -->
                  <!-- <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li> -->
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <?php 

                          if($hide) { ?>
                    <div class="post">
                      <!-- message show -->
                      <div class="show_msg">
                      
                      </div>


                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="http://localhost/studynotes/assets/dist/img/user2-160x160.jpg" alt="user image">
                        <span class="username">
                          <a href="#"><?=$username?></a>
                          <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                        </span>
                        <span class="description">Shared publicly - <?php date_default_timezone_set('Asia/Kolkata'); 
echo date("Y-m-d"); // time in India ?> </span>
                      </div>
                      
                      <!-- /.user-block -->
                      <form id="fupForm" enctype="multipart/form-data">
                            <textarea placeholder="Announce Something to your class" id="name" name="name" class="textarea"></textarea>
                            <p>
                                <div class="form-group">
                                    <label for="file">Attach File</label>
                                    <input type="file" class="form-control" id="file" name="file" />
                                </div>
                            </p>
                            <input type="hidden" id="c_id" name="c_id" value="<?=$c_id?>">
                            <div class="form-horizontal">
                                <input type="submit" name="submit" class="btn btn-success btn-sm submitBtn" value="POST"/>
                            </div>
                            
                      </form>
                    </div>
                    <!-- /.post -->

                   <?php } ?>
                    

                    <div class="post-load">
                        

                    </div>

                       


                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                    <!-- The timeline -->
                    <div class="timeline timeline-inverse">
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-danger">
                          10 Feb. 2014
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-envelope bg-primary"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 12:05</span>

                          <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                          <div class="timeline-body">
                            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                            weebly ning heekya handango imeem plugg dopplr jibjab, movity
                            jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                            quora plaxo ideeli hulu weebly balihoo...
                          </div>
                          <div class="timeline-footer">
                            <a href="#" class="btn btn-primary btn-sm">Read more</a>
                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-user bg-info"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

                          <h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted your friend request
                          </h3>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-comments bg-warning"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>

                          <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                          <div class="timeline-body">
                            Take me to your leader!
                            Switzerland is small and neutral!
                            We are more like Germany, ambitious and misunderstood!
                          </div>
                          <div class="timeline-footer">
                            <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-success">
                          3 Jan. 2014
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-camera bg-purple"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 2 days ago</span>

                          <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                          <div class="timeline-body">
                            <img src="http://placehold.it/150x100" alt="...">
                            <img src="http://placehold.it/150x100" alt="...">
                            <img src="http://placehold.it/150x100" alt="...">
                            <img src="http://placehold.it/150x100" alt="...">
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <div>
                        <i class="far fa-clock bg-gray"></i>
                      </div>
                    </div>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputName" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName2" placeholder="Name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>    
  <!-- /.content-wrapper -->
  <!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>   -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <script>  


function loadpost()
    {
      
      $.ajax({ 
         url: "<?=base_url()?>"+"cla/postload",
         data: {action:'test',classid:"<?=$this->session->userdata('c_id');?>",deletehide:'<?=$hide?>'},
         type: 'post',
        //  contentType: "application/json; charset=utf-8",

         success: function(output) {

              // let data =;
              if(output){
                  
                $(".post-load").html(output)
              }else{
                $("#fetch_create_by").html("<h3>No classroom Available</h3>")
              }
              
            }
          });
    }

loadpost();

$(document).ready(function(e){
    // Submit form data via Ajax
    $("#fupForm").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: "<?php echo base_url(); ?>" + "cla/uploaddoc",
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){
                $('.submitBtn').attr("disabled","disabled");
                $('#fupForm').css("opacity",".5");
            },
            success: function(response){ //console.log(response);
               var error;
                $('.statusMsg').html('');
                if(response.status == true){
                    $('#fupForm')[0].reset();
                  

                     error = 'alert-success';
                     msg = response.message;
               

                }else{
                   error = `alert-danger`;
                   msg = response.message;
                }

                error = `<div class="alert ${error}">
                        ${msg}
                      </div>`;

                $(".show_msg").html(error)
                loadpost();
                $('#fupForm').css("opacity","");
                $(".submitBtn").removeAttr("disabled");
            }
        });
    });
});



function deletepost(id){

  if (confirm("Are you delete post")) {

    $.ajax({ 
         url: "<?=base_url()?>"+"cla/deletepost",
         data: {action:'test',pid:id},
         type: 'post',
         dataType:'json',

         success: function(output) {
              // console.log(json_decode(output));
              if(output.success === true)
              {
             alert(output.message);

              }else{
                alert(output.message)
              }
              loadpost();
            }
          });

  }

}

  </script>


