<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=assets?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?=assets?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=assets?>dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <style>
      .error{
        color: red !important;
      }
    </style>
</head>
<body class="hold-transition login-page">
  
<div class="login-box">
<div class="error_response">
    
    </div>
  <div class="login-logo">
    <a href="../../index2.html"><b>StudyNotes </b>Classroom</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>


      <!-- Login form -->
      <form action="javascript:void(0)" method="post" id="login_form">
        <div class="input-group mb-3">
          <input type="email" name="email" id="email" class="form-control"  placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="password" name="password" id="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <label id="email-error" class="error" for="email"></label> <br>

        <label id="password-error" class="error" for="password"></label> 

        <div class="row">
          <div class="col-8">
           
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="<?=base_url()?>Registration" class="btn btn-block btn-primary">
          <i class="fab fa-new mr-2"></i> Register a new membership
        </a>
      </div>
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="#">I forgot my password</a>
      </p>
      
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?=assets?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=assets?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=assets?>dist/js/adminlte.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  

<!-- JQUERY VALIDATION LIBRARY -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>

</body>
</html>


<script>
  // Registration form
  if ($("#login_form").length > 0) {

    $("#login_form").validate({
      
    rules: {
        
        email: {
          required: true,
          maxlength: 50,
          email: true,
        },

        password :{
          required: true,
          minlength: 8,
          maxlength:15,
        } 

       
    },

    messages: { 
        
        
        email: {
          required: "Please enter email",
          email: "Please enter valid email",
          maxlength: "The email name should less than or equal to 50 characters",
        },

        
        password :{
          required: "Please enter password",
          maxlength: "The password should less than or equal to 15 characters",
        }  
              
    },

    submitHandler: function(form) {
     
      // $('#send_form').html('Sending..');
      // $('.fa-spin').show();

      $.ajax({
        url: "<?php echo base_url(); ?>" + "Login/login_submit",
        type: "POST",
        data: $('#login_form').serialize(),
        dataType: "json",

        success: function( response ) {
            // alert(response);
            if(response == 0){

               error = 'alert-danger';
               msg = 'Please Enter Valid Field..!';

            }else{

              setTimeout(function(){
                
               location.reload();
                
              },500)

              error = `alert-success`;
              msg = 'Your Logged In Successfully..!';
            }

            error = `<div class="alert ${error}">
                        ${msg}
                      </div>`;
           
            $('.error_response').html(error);
            

        }
      });
    }
  })
}
  </script>
