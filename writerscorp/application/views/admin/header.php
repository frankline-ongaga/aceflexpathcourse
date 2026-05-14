<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from coderthemes.com/codefox/layouts/vertical/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 15 Jul 2020 17:02:52 GMT -->
<head>
        <meta charset="utf-8" />
        <title>Admin | EssayLoop</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- Bootstrap select pluings -->
        <link href="<?php echo base_url('corpadmin/libs/bootstrap-select/bootstrap-select.min.css') ?>" rel="stylesheet" type="text/css" />

        <!-- c3 plugin css -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('corpadmin/libs/c3/c3.min.css') ?>">

        <!-- App css -->
        <link href="<?php echo base_url('corpadmin/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
        <link href="<?php echo base_url('corpadmin/css/icons.min.css') ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('corpadmin/css/app.min.css') ?>" rel="stylesheet" type="text/css"  id="app-stylesheet" />
        <link href="<?php echo base_url('corpadmin/css/mystyle.css') ?>" rel="stylesheet" type="text/css"  id="app-stylesheet" />



    </head>

    <body>

        <!-- Begin page -->
        <div id="wrapper">

            
            <!-- Topbar Start -->
            <div class="navbar-custom">
                <ul class="list-unstyled topnav-menu float-right mb-0">

                    <li class="dropdown notification-list">
                        <a href="<?php echo base_url('admin/inbox'); ?>"  class="nav-link waves-effect waves-light"><i class="fe-mail noti-icon"></i> <span class="badge badge-danger rounded-circle noti-icon-badge"><?php if(isset($message_count)) { echo $message_count; } ?></span></a>
                    </li>
        
                  

                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <img src="<?php echo base_url('corpadmin/images/users/avatar-1.jpg') ?>" alt="user-image" class="rounded-circle">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                            <!-- item-->
                            <div class="dropdown-header noti-title">
                                <h6 class="text-overflow m-0">Welcome !</h6>
                            </div>

                            <!-- item-->
                           

                            <!-- item-->
                          
                            <a href="<?php echo base_url('admin/change_password') ?>" class="dropdown-item notify-item">
                                <i class="fe-settings"></i>
                                <span>Change Password</span>
                            </a>
                       

                            <!-- item-->
                           
                            <div class="dropdown-divider"></div>

                            <!-- item-->
                           
                               <!--  <i class="fe-log-out"></i>
                                <span>Logout</span> -->


                                <a  class="dropdown-item notify-item" href="<?php echo base_url('admin/logout'); ?>"><i class="fe-log-out"></i> <span>Logout</span></a>


                           

                        </div>
                    </li>

                   


                </ul>

                <!-- LOGO -->
                <div class="logo-box">
                    <a href="<?php echo base_url('admin/dashboard')?>" class="logo text-center logo-light">
                       
                        <span class="logo-lg">
                            <img src="<?php echo base_url('assets/images/loopadmin.png') ?>" alt="" height="40">
                            <!-- <span class="logo-lg-text-light">Codefox</span> -->
                        </span>
                       
                    </a>
                   
                </div>

                <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                    <li>
                        <button class="button-menu-mobile waves-effect waves-light">
                            <i class="fe-menu"></i>
                        </button>
                    </li>
        
                  

                </ul>
            </div>
            <div class="left-side-menu">

                <div class="slimscroll-menu">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">

                        <ul class="metismenu" id="side-menu">

                            <li class="menu-title">Navigation</li>

                            <li>
                                <a href="<?php echo base_url('admin/dashboard')?>">
                                    <i class="fe-airplay"></i>
                                   
                                    <span> Dashboard </span>
                                </a>
                            </li>
                            <!-- <li>
                                <a href="<?php // echo base_url('admin/jobs')?>">
                                    <i class="fas fa-plus"></i>
                                   
                                    <span> Take Up Orders </span>
                                </a>
                            </li> -->
                             <!-- <li>
                                <a href="<?php // echo base_url('admin/awaiting_approval')?>">
                                    <i class="fas fa-arrow-right"></i>
                                     <span class="badge badge-success badge-pill float-right"><?php // if(isset($awaiting_count)){ echo $awaiting_count;  //} else { echo "0"; } ?></span>
                                   
                                    <span> Approve Orders </span>
                                </a>
                            </li> -->
                             <li>
                                <a href="<?php echo base_url('admin/get_technical')?>">
                                    <i class="fas fa-adjust"></i>
                                     <span class="badge badge-success badge-pill float-right"><?php if(isset($technical_count)){ echo $technical_count;  } else { echo "0"; } ?></span>
                                   
                                    <span> Technical Requests </span>
                                </a>
                            </li>
                            <!--  <li>
                                <a href="<?php // echo base_url('admin/writer_approvals')?>">
                                    <i class="fas fa-edit"></i>
                                    <span class="badge badge-success badge-pill float-right"><?php // if(isset($approval_count)){ echo $approval_count;  } else { echo "0"; } ?></span>
                                   
                                    <span> Writer Applications </span>
                                </a>
                            </li> -->
                             <li>
                                <a href="<?php echo base_url('admin/get_cancelled')?>">
                                    <i class="fas fa-exclamation-triangle "></i>
                                     <span class="badge badge-success badge-pill float-right"><?php if(isset($cancelled_count)){ echo $cancelled_count;  } else { echo "0"; } ?></span>
                                   
                                    <span> Cancellation Requests</span>
                                </a>
                            </li>
                           <!--   <li>
                                <a href="<?php // echo base_url('admin/create_special')?>">
                                    <i class="fas fa-plus"></i>
                                     <span class="badge badge-success badge-pill float-right"></span>
                                   
                                    <span> Create Special Order </span>
                                </a>
                            </li> -->
                            <!--   <li>
                                <a href="<?php // echo base_url('admin/jobs')?>">
                                    <i class="fas fa-plus"></i>
                                   
                                    <span> Take Up Orders </span>
                                </a>
                            </li> -->

                           
                           
                            <li class="menu-title mt-2">Orders</li>

                             <!-- <li>
                                <a href="<?php // echo base_url('admin/review')?>">
                                    <i class="fe-calendar"></i>
                                    <span class="badge badge-success badge-pill float-right"><?php // if(isset($review_count)){ echo $review_count;  } else { echo "0"; } ?></span>
                                    <span> Under Review </span>
                                </a>
                            </li> -->

                           <!--  <li>
                                <a href="<?php //echo base_url('admin/revision')?>">
                                    <i class="fas fa-undo"></i>
                                     <span class="badge badge-success badge-pill float-right"><?php if(isset($revision_count)){ echo $revision_count;  }// else { echo "0"; } ?></span>
                                    <span> Revision </span>
                                </a>
                            </li> -->

                           

                            <!-- <li>
                                <a href="<?php // echo base_url('admin/all')?>">
                                    <i class="fe-calendar"></i>
                                    <span class="badge badge-success badge-pill float-right"><?php // if(isset($all_count)){ echo $all_count;  } else { echo "0"; } ?></span>
                                    <span> All Orders </span>
                                </a>
                            </li> -->
                            <li>
                                <a href="<?php echo base_url('admin/pending')?>">
                                    <i class="fas fa-clock"></i>
                                    <span class="badge badge-success badge-pill float-right"><?php if(isset($pending_count)){ echo $pending_count;  } else { echo "0"; } ?></span>

                                    <span> In Progress </span>
                                </a>
                            </li>
                             <li>
                                <a href="<?php echo base_url('admin/revision')?>">
                                    <i class="fas fa-clock"></i>
                                    <span class="badge badge-success badge-pill float-right"><?php if(isset($revision_count)){ echo $revision_count;  } else { echo "0"; } ?></span>

                                    <span> Revision </span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('admin/complete')?>">
                                    <i class="fas fa-check"></i>
                                    <span class="badge badge-success badge-pill float-right"><?php if(isset($completed_count)){ echo $completed_count;  } else { echo "0"; } ?></span>

                                    <span> Completed </span>
                                </a>
                            </li>
                             <li>
                                <a href="<?php echo base_url('admin/awaiting')?>">
                                    <i class="fas fa-check"></i>
                                    <span class="badge badge-success badge-pill float-right"><?php if(isset($awaiting_payments_count)){ echo $awaiting_payments_count;  } else { echo "0"; } ?></span>

                                    <span> Awaiting Payments </span>
                                </a>
                            </li>
                              <li>
                                <a href="<?php echo base_url('admin/cancelled_orders')?>">
                                    <i class="fas fa-exclamation-triangle"></i>
                                    <span class="badge badge-success badge-pill float-right"><?php if(isset($cancelled_orders_count)){ echo $cancelled_orders_count;  } else { echo "0"; } ?></span>

                                    <span> Cancelled Orders </span>
                                </a>
                            </li>
                           
<!-- 
                            <li>
                                <a href="<?php // echo base_url('admin/awaiting')?>">
                                    <i class="fas fa-exclamation"></i>
                                    <span class="badge badge-success badge-pill float-right"><?php // if(isset($awaiting_count)){ echo $awaiting_count;  } else { echo "0"; } ?></span>

                                    <span> Awaiting Payments </span>
                                </a>
                            </li> -->

                            
                            <li class="menu-title mt-2">Payments</li>

                           

                            <li>
                                <a href="<?php echo base_url('admin/payment_history')?>">
                                    <i class="fas fa-money-bill"></i>
                                    <span class="badge badge-success badge-pill float-right"></span>
                                    <span> Payments </span>
                                </a>
                            </li>

                             <li class="menu-title mt-2">Affiliate Tracker</li>

                           

                            <li>
                                <a href="<?php echo base_url('admin/affiliate_tracker')?>">
                                    <i class="fas fa-money-bill"></i>
                                    <span class="badge badge-success badge-pill float-right"></span>
                                    <span> Affiliate Tracker </span>
                                </a>
                            </li>

                             <li class="menu-title mt-2">Payouts</li>

                           

                            <li>
                                <a href="<?php echo base_url('admin/manage_payouts')?>">
                                    <i class="fas fa-money-bill"></i>
                                    <span class="badge badge-success badge-pill float-right"></span>
                                    <span> Process Payouts </span>
                                </a>
                            </li>

                            <li>
                                <a href="<?php echo base_url('admin/past_payouts')?>">
                                    <i class="fas fa-money-bill"></i>
                                    <span class="badge badge-success badge-pill float-right"></span>
                                    <span> Past Payouts</span>
                                </a>
                            </li>


                             <li class="menu-title mt-2">Messages</li>

                           

                            <li>
                                <a href="<?php echo base_url('admin/message_index')?>">
                                    <i class="fas fa-edit"></i>
                                    <span class="badge badge-success badge-pill float-right"></span>
                                    <span> Create Message</span>
                                </a>
                            </li>
                              <li>
                                <a href="<?php echo base_url('admin/inbox')?>">
                                    <i class="fas fa-envelope"></i>
                                    <span class="badge badge-success badge-pill float-right"></span>
                                    <span>Inbox </span>
                                </a>
                            </li>

                              <li class="menu-title mt-2">Users</li>

                           

                            <li>
                                <a href="<?php echo base_url('admin/get_buyers')?>">
                                    <i class="fas fa-users"></i>
                                    <span class="badge badge-success badge-pill float-right"></span>
                                    <span>Clients</span>
                                </a>
                            </li>
                          
                            <li>
                                <a href="<?php echo base_url('admin/get_writers')?>">
                                    <i class="fas fa-users"></i>
                                    <span class="badge badge-success badge-pill float-right"></span>
                                    <span>Writers</span>
                                </a>
                             </li>

                              <li>
                                <a href="<?php echo base_url('admin/get_writers_ratings')?>">
                                    <i class="fas fa-users"></i>
                                    <span class="badge badge-success badge-pill float-right"></span>
                                    <span>Writer Ratings</span>
                                </a>
                             </li>
                             <?php 
                                 if(isset($role_id)){

                                   if($role_id==1){  ?>

                               <li>
                                <a href="<?php echo base_url('admin/get_admins')?>">
                                    <i class="fas fa-users"></i>
                                    <span class="badge badge-success badge-pill float-right"></span>
                                    <span>Admins</span>
                                </a>
                            </li>
                            <?php } }?>

                             <li class="menu-title mt-2">Emails</li>

                           

                            <li>
                                <a href="<?php echo base_url('admin/create_email')?>">
                                    <i class="fas fa-money-bill"></i>
                                    <span class="badge badge-success badge-pill float-right"></span>
                                    <span> Send to Clients </span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('admin/create_email_writer')?>">
                                    <i class="fas fa-money-bill"></i>
                                    <span class="badge badge-success badge-pill float-right"></span>
                                    <span> Send to Writers </span>
                                </a>
                            </li>
                              <li>
                                <a href="<?php echo base_url('admin/send_to_selected')?>">
                                    <i class="fas fa-money-bill"></i>
                                    <span class="badge badge-success badge-pill float-right"></span>
                                    <span> Send to Selected </span>
                                </a>
                            </li>

                              <li class="menu-title mt-2">Samples</li>

                           

                            <li>
                                <a href="<?php echo base_url('admin/add_sample')?>">
                                    <i class="fas fa-money-bill"></i>
                                    <span class="badge badge-success badge-pill float-right"></span>
                                    <span> Create Sample </span>
                                </a>
                            </li>

                            <li>
                                <a href="<?php echo base_url('admin/get_samples')?>">
                                    <i class="fas fa-money-bill"></i>
                                    <span class="badge badge-success badge-pill float-right"></span>
                                    <span> Manage Samples</span>
                                </a>
                            </li>


                            <li class="menu-title mt-2">Settings</li>

                           

                            <li>
                                <a href="<?php echo base_url('admin/create_coupon')?>">
                                    <i class="fas fa-plus"></i>
                                    <span class="badge badge-success badge-pill float-right"></span>
                                    <span>Create Coupon</span>
                                </a>
                            </li>

                              <li>
                                <a href="<?php echo base_url('admin/coupon_management')?>">
                                    <i class="fas fa-th"></i>
                                    <span class="badge badge-success badge-pill float-right"></span>
                                    <span>Manage Coupon</span>
                                </a>
                            </li>



                            <li>
                                <a href="<?php echo base_url('admin/discount')?>">
                                    <i class="fas fa-minus"></i>
                                    <span class="badge badge-success badge-pill float-right"></span>
                                    <span>1st Order Discount</span>
                                </a>
                            </li>

                             <li>
                                <a href="<?php  echo base_url('admin/affiliate')?>">
                                    <i class="fas fa-edit"></i>
                                    <span class="badge badge-success badge-pill float-right"></span>
                                    <span>Affiliate Rate</span>
                                </a>
                            </li>

                             



                        </ul>

                    </div>
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
