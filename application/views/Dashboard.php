  <style>
  .error{
    color:red;
  }
  </style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 d-flex">
            <h1><?=$main_title?> </h1>

            <button type="submit" class=" ml-2 btn btn-light btn-sm" data-toggle="modal" data-target="#modal-default">
                + Create class
            </button>
            <button type="submit" class=" ml-2 btn btn-light btn-sm" data-toggle="modal" data-target="#join-default">
                + Join class
            </button>
        </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      
        <div class="row" id="fetch_create_by">
          
        </div>

        <div class="row" id="fetch_join_class">

        


        </div>
        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->



     <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Class Create</h4> <br>
              
              
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <!-- <div class="container"> -->
              <div class="error_response">
               
              </div>
              <form id="class_create_form">
                  <div class="row">
                      <div class="col-md-12">
                        <input type="text" class="form-control" name="class_name" id="class_name" placeholder="Enter Class Name">
                      </div>
                  </div>
              <!-- </div> -->
            </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" onclick="close_windows()" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Create Class</button>
              </div>
            </form>

          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

      <!-------------------- Join class ----------------------------->
      <div class="modal fade" id="join-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Join Create</h4> <br>
              
              
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <!-- <div class="container"> -->
              <div class="join_error_response">
               
              </div>
              <form id="class_join_form">
                  <div class="row">
                      <div class="col-md-12">
                        <input type="text" class="form-control" name="join_class_name" id="join_class_name" placeholder="Enter Class Code">
                      </div>
                  </div>
              <!-- </div> -->
            </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" onclick="close_windows()" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Join Class</button>
              </div>
            </form>

          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>


    <a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
      <i class="fas fa-chevron-up"></i>
    </a>
  </div>
  <!-- /.content-wrapper -->
  <!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>   -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>




  <script>

    function loadclass()
    {
      // var data=[] ;
      $.ajax({ 
         url: "<?=base_url()?>"+"Dashboard/load_classes",
         data: {action: 'test',userid:"<?=$this->session->userdata('userdata')['u_id']?>"},
         type: 'post',
        //  contentType: "application/json; charset=utf-8",

         success: function(output) {

              // let data =;
              if(output){
                $("#fetch_create_by").html(output)
              }else{
                $("#fetch_create_by").html("<h3>No classroom Available</h3>")
              }
              
            }
          });
    }

    function join_classes()
    {
     
      $.ajax({ 
         url: "<?=base_url()?>"+"Dashboard/join_load_classes",
         data: {action: 'test',userid:"<?=$this->session->userdata('userdata')['u_id']?>"},
         type: 'post',
        //  contentType: "application/json; charset=utf-8",

         success: function(output) {
              
              // let data =;
              
              $("#fetch_join_class").html(output)
            }
          });
    }




    // Function call automatice
    join_classes();
    loadclass();

  </script>

  

<script>
  // ----------------------------------- class create form ----------------------------
  if ($("#class_create_form").length > 0) {
    $("#class_create_form").validate({
      
    rules: {
        class_name:{
              required: true,
            },
    },

    messages: { 
        
        class_name: {
            required: "Please enter classname",
        },    
    },

    submitHandler: function(form) {
     
      // $('#send_form').html('Sending..');
      $('.fa-spin').show();

      $.ajax({
        url: "<?php echo base_url(); ?>" + "Dashboard/create_class",
        type: "POST",
        data: $('#class_create_form').serialize(),
        dataType: "json",

        success: function( response ) {
            // $resp = json_decode(response);
            if(response.success === false){

               error = 'alert-danger';
               msg = response.msg;
               

            }else{
              error = `alert-success`;
               msg = response.msg;
            }

            error = `<div class="alert ${error}">
                        ${msg}
                      </div>`;
           
            $('.error_response').html(error);
            $('#class_name').val('')
          
            
            loadclass();
        }
      });
    }
  })
}


// -------------------------------------- Join class room -----------------------------------------
// class join create form 
if ($("#class_join_form").length > 0) {

  
    $("#class_join_form").validate({
      
    rules: {
        join_class_name:{
              required: true,
            },
    },

    messages: { 
      join_class_name: {
            required: "Please enter Class name",
        },    
    },

    submitHandler: function(form) {
    
      // $('#send_form').html('Sending..');
      $('.fa-spin').show();

      $.ajax({
        url: "<?php echo base_url(); ?>" + "Dashboard/join_class",
        type: "POST",
        data: $('#join_class_name').serialize(),
        dataType: "json",

        success: function( response ) {
            // $resp = json_decode(response);

           
            if(response.success === false){

               error = 'alert-danger';
               msg = response.msg;
               

            }else{
              error = `alert-success`;
               msg = response.msg;
            }

            error = `<div class="alert ${error}">
                        ${msg}
                      </div>`;
           
            $('.join_error_response').html(error);
            $('#join_class_name').val('')
          
            
            join_classes();
        }
      });
    }
  })
}


// ---------------------------- close window --------------------------
function close_windows()
{
  $("#class_name").val('');
  $('.error_response').html("")

}
  </script>