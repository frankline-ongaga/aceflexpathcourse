<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
     <link rel="icon" href="<?php echo base_url('assets/img/basic/favicon.ico') ?>" type="image/x-icon">
    <title>99 Content</title>
     <link rel="stylesheet" href="<?php echo base_url('assets/css/app.css') ?>">
     <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/tagsinput.css'); ?>">

      <script
              src="https://code.jquery.com/jquery-3.4.1.min.js"
              integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
              crossorigin="anonymous"></script>
    
    <script src="https://cdn.tiny.cloud/1/7kkzvyqz5eddymp60126lsicoarfsfg9ncxchxveqq82m5oi/tinymce/5/tinymce.min.js"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>

   
   <script type="text/javascript">
  tinymce.init({
    selector: '.myeditablediv',
     setup: function (editor) {
    editor.on('change', function (e) {
        editor.save();
    });
    }
   
  });


  </script>
     
 <!--    <style>
        .loader {
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: #f5f8fa;
            z-index: 9998;
            text-align: center
        }
        
        .plane-container {
            position: absolute;
            top: 50%;
            left: 50%
        }
    </style> -->
</head>

<body>
  <!--   <div id="loader" class="loader">
        <div class="plane-container">
            <div class="l-s-2 blink">LOADING</div>
        </div>
    </div> -->
    <div id="app" class="">
       
        <div class="shadow relative">
            <div class="container">
                <nav class="mainnav navbar navbar-default navbar-toggleable-md justify-content-between">
                    <button class="offcanvas dl-trigger paper-nav-toggle navbar-toggler " type="button" data-toggle="offcanvas" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"><i></i></button>
                    <a class="navbar-brand" href="#">Writer Site</a>
                    <div class="paper_menu ">
                        <div id="dl-menu" class="xv-menuwrapper responsive-menu">
                           
                            <ul class="dl-menu align-items-center">
                                 
                                  

                                 <?php  


                                    if($user_writer_status==0){
                                        ?>
                                           <li> <a href=" <?php echo base_url('writer/apply_view'); ?>"   class="btn btn-success nav-btn">Apply</a></li>
                                        <?php
                                    }

                                 ?>


                                 <?php  


                                    if($user_writer_status==4){
                                        ?>
                                           <li> <a href=" <?php echo base_url('writer/more_info_view'); ?>"   class="btn btn-warning nav-btn">More information needed</a></li>
                                        <?php
                                    }

                                 ?>
                                 <li> <a href=" <?php echo base_url('writer/index'); ?>"   class="btn btn-primary nav-btn">My orders</a></li>&nbsp;
                                  <li> <a href="<?php echo base_url('writer/jobs'); ?>" id="sungura"  class="btn btn-outline-warning nav-btn">Jobs Board</a></li>

                                 <li> <a href="<?php echo base_url('writer/jobs'); ?>" id="sungura"  class="btn btn-outline-warning nav-btn">Bal: $ <?php if(!empty($balance)){ echo $balance;  } ?></a></li>
                                 
                               
                                <?php if(!empty($level)){ ?>
                                <?php if($level==1) { ?>
                                <span class="badge badge-success">Starter</span>
                                <?php }  elseif($level==2) {?>
                                <span class="badge badge-primary">Pro</span>
                                <?php }  elseif($level==3) {?>
                                 <span class="badge badge-danger">Expert</span>
                                  <?php }  else {?>
                                  <span class="badge badge-secondary">Awaiting Approval</span>
                                  <?php } ?>

                                  <?php } ?>

                                <li class="parent user-avatar"> <a>Welcome <?php if(isset($user_fname)){ echo $user_fname;  } ?> <img src="<?php echo base_url('assets/img/dummy/u1.png') ?>"></a>
                                    <ul class="lg-submenu no-b">
                                        <li><a href="<?php echo base_url('writer/profile') ?>"><i class="icon icon-account_box"></i> Profile </a></li>
                                        <?php
                                        if($user_login_type===1){ ?>
                                        <li><a href="#"><i class="icon icon-rotate-right"></i> Change Password</a></li>
                                        <?php } ?>
                                        <li><a href="<?php

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
                                        ?>"><i class="icon icon-arrow_back"></i> Logout </a></li>
                                       
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>




        