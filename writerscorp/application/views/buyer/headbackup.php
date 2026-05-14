<!DOCTYPE html>
<html lang="en">
<head>
<title>Avid Essay Writer- Client</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
 <link rel="stylesheet" href="<?php echo base_url('dist/css/main.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('bower_components/bootstrap/dist/css/bootstrap.min.css');?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url('bower_components/font-awesome/css/font-awesome.min.css');?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo base_url('bower_components/Ionicons/css/ionicons.min.css');?>">
  

        <!-- <link rel="stylesheet" href="<?php echo base_url('datetimepicker/build/jquery.datetimepicker.min.css') ?>"> -->

    <!-- Theme style -->
    


    <link rel="stylesheet" href="<?php echo base_url('dist/css/AdminLTE.min.css');?>">

     <!--  <link rel="stylesheet" href="<?php echo base_url('css/jquery-jvectormap-2.0.3.css');?>"> -->
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
       <link rel="stylesheet" href="<?php echo base_url('dist/css/skins/skin-green.min.css');?>">
       <link rel="stylesheet" href="<?php echo base_url('dist/css/select2.min.css');?>">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
         <!-- <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"> -->
         <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

         <link rel="stylesheet" href="<?php echo base_url('dist/css/dataTables.bootstrap.min.css');?>">
         <link rel="stylesheet" href="<?php echo base_url('bower_components/bootstrap/less/pagination.less');?>">

         <script src="<?php echo base_url('bower_components/jquery/dist/jquery.min.js') ?>"></script>
          <link rel="stylesheet" href="<?php echo base_url('dist/buttons.dataTables.min.css');?>">
          <link rel="stylesheet" href="<?php echo base_url('css/admin.css');?>">
         <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />



          
         
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
<body class="hold-transition skin-green  sidebar-mini">
    <div class="wrapper">

        <!-- Main Header -->
        <header class="main-header">

            <!-- Logo -->
            <a href="#" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>CL</b></span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b></b>Client</span>
            </a>
                
            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">




                       <!-- Notifications Menu -->
                       

                       
                     

                       
                        <!-- /.messages-menu -->
                         <li class="messages-menu">
                            <a href="<?php echo base_url('client/inbox'); ?>">
                              <i class="fa fa-envelope-o"></i>
                              <span class="label label-success"><?php if(isset($message_count)) { echo $message_count; } ?></span>
                            </a>
                          </li>

                     
                        
                        <!-- User Account Menu -->
                       
                           <!-- 
                                 <li class=""><a title="" href="<?php echo base_url('admin/change')?>"><i class="icon icon-cog"></i> <span class="text">Change Password</span></a></li> -->
                         <?php
                                        if($user_login_type===1){ ?>
                                        <li><a href="<?php echo base_url('client/change_password') ?>"><i class="icon icon-rotate-right"></i> Change Password</a></li>
                                        <?php } ?>
                        <li class=""><a  href="<?php

                                        if(isset($user_login_type)){
                                         //Normal
                                        if($user_login_type===1){

                                            echo base_url('home/normal_logout');                                          
                                          }
                                         //FB
                                         if($user_login_type===2){

                                            echo base_url('home/logout');                                          
                                          }
                                          //Google
                                          if($user_login_type===3){

                                            echo base_url('home/google_logout');
                                          }   
                                        } 
                                        ?>"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>

                        <!--  <a href="<?php // echo base_url('Admin/logout') ?>"><i class="demo-pli-unlock icon-lg icon-fw"></i> Logout</a> -->
                                <!-- The user image in the menu -->
                               
                              
                                <!-- Menu Footer-->
                               
                        

                       
                    </ul>
                </div>
            </nav>
        </header>
        
        <?php include 'buyer_menu.php';?>

        
  <!-- Modal for importing contacts -->
     
  <!-- end of modal for importing  -->

  <!-- Modal for importing contacts -->
  
  <!-- end of modal for importing  -->