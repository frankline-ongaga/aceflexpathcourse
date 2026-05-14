<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/img/basic/favicon.ico" type="image/x-icon">
    <title>Paper</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/panel.css') ?>">
   
</head>

  <style>
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
    </style>
</head>

<body>
    <div id="loader" class="loader">
        <div class="plane-container">
            <div class="l-s-2 blink">LOADING</div>
        </div>
    </div>
    <div id="loader" class="loader">
        <div class="plane-container">
            <div class="l-s-2 blink">LOADING</div>
        </div>
    </div>
    <div id="app" class="paper-loading"><a href="#" data-toggle="offcanvas" class="paper-nav-toggle fixed left"><i></i></a>
        <aside class="main-sidebar fixed offcanvas scroll shadow">
            <section class="sidebar">
                <div class="user-panel">
                    <div class="image float-left"> <img class="user_avatar" src="<?php echo base_url('assets/img/dummy/u2.png') ?>" alt="User Image"></div>
                    <div class="info">
                        <h6 class="p-t-10"><?php if(isset($user_fname)) { echo $user_fname; }?></h6><a href="#"><i class="icon-circle text-primary blink"></i> Online</a></div>
                </div>
                <ul class="sidebar-menu scroll">
                    <li><a href="<?php echo base_url('admin/dashboard') ?>"><i class="icon-sailing-boat-water purple-text"></i> <span>Dashboard</span></a>
                    </li>
                      <li><a href="<?php echo base_url('admin/get_sub') ?>"><i class="icon icon-input blue-text"></i> <span>Subscriptions</span></a></li>
                    <li class="treeview"><a href="#"><i class="icon icon-package blue-text"></i> <span>Orders</span> <span class="badge badge-primary pull-right">4</span></a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo base_url('admin/review') ?>"><i class="icon icon-circle-o"></i>Under Review</a></li>
                            <li><a href="<?php echo base_url('admin/pending') ?>"><i class="icon icon-circle-o"></i>Pending</a></li>
                            <li><a href="<?php echo base_url('admin/revision') ?>"><i class="icon icon-pencil"></i>Revision</a></li>
                            <li><a href="<?php echo base_url('admin/awaiting') ?>"><i class="icon icon-pencil"></i>Awaiting Payments</a></li>
                            <li><a href="<?php echo base_url('admin/complete') ?>"><i class="icon icon-pencil"></i>Completed</a></li>
                             <li><a href="<?php echo base_url('admin/all') ?>"><i class="icon icon-pencil"></i>All</a></li>
                        </ul>
                    </li>
                    <li><a href="<?php echo base_url('admin/get_earnings') ?>"><i class="icon icon-input blue-text"></i> <span>Earnings</span></a></li>
                    <li><a href="#"><i class="icon icon-input blue-text"></i> <span>Payouts</span></a></li>
                  

                      <li class="treeview"><a href="#"><i class="icon icon-hand-grab-o"></i> <span>Inbox</span> <span class="badge badge-primary pull-right"><?php if(isset($message_count)) { echo $message_count; } ?></span></a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo base_url('admin/message_index') ?>"><i class="icon icon-circle-o text-red"></i> Create Message</a></li>
                            <li><a href="<?php echo base_url('admin/inbox') ?>"><i class="icon icon-circle-o text-yellow"></i>Inbox</a></li>
                            
                        </ul>
                    </li>
                    
                  
                     <li><a href="<?php echo base_url('admin/writer_approvals') ?>"><i class="icon icon-package blue-text"></i> <span>Writer Requests</span> <span class="badge badge-primary pull-right">4</span></a></li>
                     <li class="treeview"><a href="#"><i class="icon icon-hand-grab-o"></i> <span>Users</span> <span class="badge badge-primary pull-right">4</span></a>
                        <ul class="treeview-menu">
                            <li><a href="#scroll"><i class="icon icon-circle-o text-red"></i> Buyers</a></li>
                            <li><a href="#sticky"><i class="icon icon-circle-o text-yellow"></i>Writers</a></li>
                            <li><a href="#plugins-list"><i class="icon icon-folder5 text-blue"></i>Admins</a></li>
                        </ul>
                    </li>
                      <li class="treeview"><a href="#"><i class="icon icon-package blue-text"></i> <span>Settings</span> <span class="badge badge-primary pull-right">2</span></a>
                        <ul class="treeview-menu">

                            <li><a href="<?php echo base_url('admin/commission_view') ?>"><i class="icon icon-circle-o"></i>Commission</a></li>
                            <li><a href="<?php echo base_url('admin/packages_view') ?>"><i class="icon icon-pencil"></i>Pricing</a></li>
                           
                          
                        </ul>
                    </li>
                   
                </ul>
            </section>
        </aside>
        <div class="page light offcanvas-page">
            <div class="pos-f-t">
                <div class="collapse" id="navbarToggleExternalContent">
                    <div class="bg-dark p-4">
                        <div class="search-bar">
                            <input class="transparent s-24 text-white b-0 font-weight-lighter w-128 height-50" type="text" placeholder="start typing...">
                        </div><a href="#" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation" class="paper-nav-toggle paper-nav-white active "><i></i></a></div>
                </div>
            </div>
            <div>
                <header class="blue accent-3 relative">
                    <div class="navbar navbar-expand navbar-dark d-flex justify-content-end bd-navbar">
                        <ul class="navbar-nav p-t-10">
                            <li class="nav-item dropdown"><a href="#" class="nav-link" data-toggle="dropdown" aria-expanded="false"><i class="icon-message s-18"></i> <span class="badge badge-success badge-mini rounded-circle"><?php if(isset($message_count)) { echo $message_count; } ?></span></a>
                               
                            </li>
                        
                           
                          
                            <li class="nav-item dropdown"><a class="nav-item nav-link  mr-md-2" href="#" id="bd-versions" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon-more_vert s-18"></i></a>
                                <div class="dropdown-menu dropdown-menu-right b-0 shadow1"><a class="dropdown-item" href="#"><i class="icon-profile"></i> View Profile</a>
                                <a class="dropdown-item" href="#"><i class="icon-cog"></i>Change Password</a>
                               
                                <div class="dropdown-divider"></div><a class="dropdown-item" href="<?php echo base_url('admin/logout') ?>"><i class="icon-money"></i> Logout</a></div>
                            </li>
                        </ul>
                    </div>
                    <div class="container-fluid text-white">
                        <div class="row p-t-b-10 ">
                            <div class="col">
                                <h4> Dashboard</h4></div>
                        </div>
                       <!--  <div class="row ">
                            <ul class="nav">
                                <li class="nav-item"> <a class="nav-link active s-12" href="#">Today</a></li>
                                <li class="nav-item"> <a class="nav-link s-12" href="#">Yesterday</a></li>
                                <li class="nav-item"> <a class="nav-link s-12" href="#">By Date</a></li>
                                <li class="nav-item"> <a class="nav-link s-12" href="#">By Progress</a></li>
                            </ul>
                        </div>
                    </div>
                </header> -->