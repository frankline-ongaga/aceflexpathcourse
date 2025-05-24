<!doctype html>
<html lang="en" class="<?php if(!empty($mode_name)){ echo $mode_name; } else { echo 'light-theme';} ?>">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="assets/images/favicon-32x32.png" type="image/png" />
    <!--plugins-->
    <link href="<?php echo base_url('adminassets/plugins/vectormap/jquery-jvectormap-2.0.2.css'); ?>" rel="stylesheet"/>
    <link href="<?php echo base_url('adminassets/plugins/simplebar/css/simplebar.css'); ?>" rel="stylesheet" />
    <link href="<?php echo base_url('adminassets/plugins/perfect-scrollbar/css/perfect-scrollbar.css'); ?>" rel="stylesheet" />

    <link href="<?php echo base_url('adminassets/css/dropzone.min.css'); ?>" rel="stylesheet" />


    <link href="<?php echo base_url('adminassets/plugins/metismenu/css/metisMenu.min.css'); ?>" rel="stylesheet" />
    <link href="<?php echo base_url('adminassets/plugins/datatable/css/dataTables.bootstrap5.min.css'); ?>" rel="stylesheet" />

    <!-- loader-->
    <link href="<?php echo base_url('adminassets/css/pace.min.css'); ?>" rel="stylesheet" />
    
    <!-- Bootstrap CSS -->
    <link href="<?php echo base_url('adminassets/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('adminassets/css/mystyle.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('adminassets/css/bootstrap-extended.css'); ?>" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
    <link href="<?php echo base_url('adminassets/css/app.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('adminassets/css/icons.css'); ?>" rel="stylesheet">
    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="<?php echo base_url('adminassets/css/dark-theme.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('adminassets/css/semi-dark.css'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('adminassets/css/header-colors.css'); ?>" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.css" integrity="sha512-f0tzWhCwVFS3WeYaofoLWkTP62ObhewQ1EZn65oSYDZUg1+CyywGKkWzm8BxaJj5HGKI72PnMH9jYyIFz+GH7g==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('img/fav/apple-touch-icon.png'); ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('img/fav/favicon-32x32.png'); ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('img/fav/favicon-16x16.png'); ?>">

    
    <title>AceFlexPathCourse</title>
</head>

<body onload="get_tols()">
    <!--wrapper-->
    <div class="wrapper">
        <!--sidebar wrapper -->
        <div class="sidebar-wrapper" data-simplebar="true">
            <div class="sidebar-header">
                <div>
                    <img style="width: 60%;" src="<?php echo base_url('images/aceflexpathcoursecolor.png'); ?>" class="logo-icon" alt="logo icon">
                </div>
                <!-- <div>
                    <h4 class="logo-text">EssayLoop</h4>
                </div> -->
                <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
                </div>
            </div>
            <!--navigation-->
            <ul class="metismenu" id="menu">

                    <li>
                        <a href="<?= base_url('client/index'); ?>">
                            <div class="parent-icon"><i class="bx bx-home"></i>
                            </div>
                            <div class="menu-title">Dashboard</div>
                        </a>
                    </li>
                   
              
                   
                  <li>   
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class="bx bx-plus"></i>
                        </div>
                        <div class="menu-title">Place Order</div>
                    </a>
                    <ul>
                        <li> <a href="<?= base_url('client/order'); ?>"><i class="bx bx-text"></i>Regular Order</a>
                        </li>
                        <li> <a href="<?= base_url('client/make_technical'); ?>"><i class="bx bx-health"></i>Technical Order</a>
                        </li>
                        
                    </ul>
                </li>
                <li class="menu-label">ORDERS</li>
                <li>
                    <a href="<?= base_url('client/get_awaiting'); ?>">
                        <div class="parent-icon"><i class='bx bx-question-mark'></i>
                        </div>
                        <div class="menu-title">Pending Payments</div>
                    </a>
                </li>
                 <li>
                    <a href="<?= base_url('client/get_pending'); ?>">
                        <div class="parent-icon"><i class='bx bx-loader'></i>
                        </div>
                        <div class="menu-title">In Progress</div>
                    </a>
                </li>
                 <li>
                    <a href="<?= base_url('client/get_completed'); ?>">
                        <div class="parent-icon"><i class='bx bx-check'></i>
                        </div>
                        <div class="menu-title">Completed</div>
                    </a>
                </li>
                 <li>
                    <a href="<?= base_url('client/get_cancelled'); ?>">
                        <div class="parent-icon"><i class='bx bx-x'></i>
                        </div>
                        <div class="menu-title">Cancelled</div>
                    </a>
                </li>
                 <li>
                    <a href="<?= base_url('client/get_technical'); ?>">
                        <div class="parent-icon"><i class='bx bx-health'></i>
                        </div>
                        <div class="menu-title">Technical Orders</div>
                    </a>
                </li>
                <li class="menu-label">PAYMENTS</li>
                <li>
                    <a href="<?= base_url('client/payment_history'); ?>">
                        <div class="parent-icon"><i class='bx bx-money'></i>
                        </div>
                        <div class="menu-title">Payment History</div>
                    </a>
                </li>
                 <li class="menu-label">MESSAGES</li>
               
                        <li> <a href="<?= base_url('client/message_index'); ?>"> <div class="parent-icon"><i class="bx bx-pencil"></i></div> Create Message</a>
                        </li>
                        <li> <a href="<?= base_url('client/inbox'); ?>"> <div class="parent-icon"><i class="bx bx-envelope"></i></div> Messages</a>
                        </li>
                    
                <li class="menu-label">AFFILIATE PROGRAM</li>
                <li>
                    <a href="<?= base_url('client/my_link'); ?>">
                        <div class="parent-icon"><i class='bx bx-link'></i>
                        </div>
                        <div class="menu-title">My Afilliate Link</div>
                    </a>
                </li>
                 <li>
                    <a href="<?= base_url('client/my_earnings'); ?>">
                        <div class="parent-icon"><i class='bx bx-money'></i>
                        </div>
                        <div class="menu-title">Coupons Awarded</div>
                    </a>
                </li>
              
            </ul>
            <!--end navigation-->
        </div>
        <!--end sidebar wrapper -->
        <!--start header -->
        <header>
            <div class="topbar d-flex align-items-center">
                <nav class="navbar navbar-expand">
                    <div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
                    </div>
                   
                    <div class="top-menu ms-auto">
                        <ul class="navbar-nav align-items-center">

                           
                           
                           
                            <li class="nav-item dropdown dropdown-large">
                                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span class="alert-count"><?php if(isset($message_count)) { echo $message_count; } ?></span>
                                    <i class='bx bx-comment'></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="javascript:;">
                                        <div class="msg-header">
                                            <p class="msg-header-title">Messages</p>
                                           
                                        </div>
                                    </a>
                                    <div class="header-message-list">
                                         <?php
                                          foreach ($thready as $thread)
                                          {   ?>
                                        <a class="dropdown-item" href="<?php echo base_url('client/view_thread/').$thread['thread_id']?>">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <img src="<?= base_url('adminassets/images/avatar.png'); ?>" class="msg-avatar" alt="user avatar">
                                                </div>
                                                <div class="flex-grow-1">
                                                    
                                                    <h6 class="msg-name"><?php  echo $thread['messages'][0]['subject'];   ?></h6>
                                                   
                                                </div>
                                            </div>
                                        </a>
                                        <?php } ?>
                                       
                                    </div>
                                    <a href="<?= base_url('client/inbox'); ?>">
                                        <div class="text-center msg-footer">View All Messages</div>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="user-box dropdown">
                        <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                           <i class="bx bx-user"></i>
                            <div class="user-info ps-3">
                                <p class="user-name mb-0"><?php if(isset($user_fname)){  echo $user_fname; } ?></p>
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="<?php echo base_url('client/profile') ?>"><i class="bx bx-user"></i><span>Profile</span></a>
                            </li>
                           
                            <li><a class="dropdown-item" href="<?php echo base_url('client/my_link') ?>"><i class='bx bx-download'></i><span>Free Coupons</span></a>
                            </li>
                             <li><a class="dropdown-item" href="<?php echo base_url('client/change_password') ?>"><i class='bx bx-undo'></i><span>Change Password</span></a>
                            </li>
                            <li>
                                <a href="#" class="dropdown-item mybuttn"> 
                                   <i class='bx bx-image-alt'></i>
                                   
                                       <span> Change Theme </span>
                                   
                                 </a>
                            </li>
                                <div class="dropdown-divider mb-0"></div>
                            </li>
                            <li><a class="dropdown-item" href="<?php

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
                                        ?>"><i class='bx bx-log-out-circle'></i><span>Logout</span></a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
