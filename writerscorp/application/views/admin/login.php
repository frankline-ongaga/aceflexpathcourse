
<!DOCTYPE html>
<html lang="en">
<head>
<title>99Content</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
 <link rel="stylesheet" href="<?php echo base_url('dist/css/main.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('bower_components/bootstrap/dist/css/bootstrap.min.css');?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url('bower_components/font-awesome/css/font-awesome.min.css');?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo base_url('bower_components/Ionicons/css/ionicons.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('bower_components/bootstrap-daterangepicker/daterangepicker.css');?>">
    <!-- Theme style -->
    


    <link rel="stylesheet" href="<?php echo base_url('dist/css/AdminLTE.min.css');?>">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
       <link rel="stylesheet" href="<?php echo base_url('dist/css/skins/skin-red.min.css');?>">
       <link rel="stylesheet" href="<?php echo base_url('dist/css/select2.min.css');?>">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
         <!-- <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"> -->
         <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

         <link rel="stylesheet" href="<?php echo base_url('dist/css/dataTables.bootstrap.min.css');?>">
         <link rel="stylesheet" href="<?php echo base_url('bower_components/bootstrap/less/pagination.less');?>">

         <script src="<?php echo base_url('bower_components/jquery/dist/jquery.min.js') ?>"></script>
          <script src="<?php echo base_url('bower_components/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
          <link rel="stylesheet" href="<?php echo base_url('dist/buttons.dataTables.min.css');?>">


          
         
        <style>
            /* @media print {
                pre, blockquote {page-break-inside: avoid;}
            } */
            

                .pagination a.active {
                    background-color: #4CAF50;
                    color: white;
                    }

                    .pagination a:hover:not(.active) {background-color: #ddd;}

        </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  
  <!-- /.login-logo -->
  <div class="login-box-body">
      <?php if(isset($message_display)){
                                 ?>
                                 <div class="alert alert-success">
                                 <?php echo $message_display; ?>
                                 </div>
                             <?php
                               } 

                              if(isset($error_message)) { ?>
                             <div class="alert alert-warning">
                                <?php echo $error_message;  ?>
                                 
                             </div>
                            <?php
                             }

        ?>
    <p class="login-box-msg">Admin Login</p>

    <form action="<?php echo base_url('admin/user_login_process') ?>" method="post">
      <div class="form-group has-feedback">
        <input type="email" name="admin_email" class="form-control" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <label>Role</label>
      <div class="form-group has-feedback">
         <select name="user_role" class="form-control" required>
                                  <option value="">----</option>
                                   <option value="1">Super Admin</option>
                                   <option value="2">Client Support</option>
                                   <option value="3">Quality Department</option>
                                   <option value="4">Finance Department</option>
                                  
          </select>
      
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="admin_password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
       
        <!-- /.col -->
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

  
    <!-- /.social-auth-links -->

   

  </div>
  