<!DOCTYPE html>
<html lang="en">
<head>
<title>Essays Corp</title>
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
<body class="hold-transition skin-red  sidebar-mini">
    <div class="wrapper">

        <!-- Main Header -->
        <header class="main-header">

            <!-- Logo -->
            <a href="#" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>Ad</b></span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>A</b>dmin</span>
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

                    
                        <li class="<?php if($this->uri->segment(2)=="requests" or $this->uri->segment(2)=="requests" ){echo "active";}?>"><a href="<?php echo base_url('admin/inbox')?>"><i class="icon icon-home"></i> <span class="label label-warning"  style="font-size: 12px;"><?php if(isset($message_count)) { echo $message_count; } ?></span><span>Messages</span></a> </li>
                     
                        <li class=""><a  href="<?php echo base_url('admin/logout')?>"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
                        </ul>
                </div>
            </nav>
        </header>


        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">               
                <!-- Sidebar Menu -->
                <ul class="sidebar-menu" data-widget="tree">
                <li><a href="<?php echo base_url('admin/dashboard') ?>"><i class="fa fa-th"></i> <span>Dashboard</span></a>
                    </li>
                    
                    <li class="treeview <?php if($this->uri->segment(2)=='review' or $this->uri->segment(2)=='pending' or $this->uri->segment(2)=='revision' or $this->uri->segment(2)=='awaiting' or $this->uri->segment(2)=='complete' or $this->uri->segment(2)=='all') { echo 'active'; } ?>"><a href="#"><i class="fa fa-arrow-down"></i> <span>Orders</span> <span class="badge badge-primary pull-right">6</span></a>
                        <ul class="treeview-menu">
                            <li class="<?php if($this->uri->segment(2)=='review') { echo 'active'; } ?>"><a href="<?php echo base_url('admin/review') ?>"><i class="icon icon-circle-o"></i>Under Review</a></li>
                            <li class="<?php if($this->uri->segment(2)=='pending') { echo 'active'; } ?>"><a href="<?php echo base_url('admin/pending') ?>"><i class="icon icon-circle-o"></i>In Progress</a></li>
                            <li class="<?php if($this->uri->segment(2)=='revision') { echo 'active'; } ?>"><a href="<?php echo base_url('admin/revision') ?>"><i class="icon icon-pencil"></i>Revision</a></li>
                            <li class="<?php if($this->uri->segment(2)=='awaiting') { echo 'active'; } ?>"><a href="<?php echo base_url('admin/awaiting') ?>"><i class="icon icon-pencil"></i>Awaiting Payments</a></li>
                            <li class="<?php if($this->uri->segment(2)=='complete') { echo 'active'; } ?>"><a href="<?php echo base_url('admin/complete') ?>"><i class="icon icon-pencil"></i>Completed</a></li>
                             <li class="<?php if($this->uri->segment(2)=='all') { echo 'active'; } ?>"><a href="<?php echo base_url('admin/all') ?>"><i class="icon icon-pencil"></i>All</a></li>
                        </ul>
                    </li>
                    <li class="<?php if($this->uri->segment(2)=='get_earnings') { echo 'active'; } ?>"><a href="<?php echo base_url('admin/get_earnings') ?>"><i class="fa fa-money"></i> <span>Earnings</span></a></li>
                   
                     

                       <li class="treeview <?php if($this->uri->segment(2)=='manage_payouts' or $this->uri->segment(2)=='past_payouts') { echo 'active'; } ?>"><a href="#"><i class="fa fa-arrow-right"></i> <span>Payouts</span> <span class="badge badge-primary pull-right">2</span></a>
                        <ul class="treeview-menu">
                            <li class="<?php if($this->uri->segment(2)=='manage_payouts') { echo 'active'; } ?>"><a href="<?php echo base_url('admin/manage_payouts') ?>"><i class="fa fa-arrow-right"></i> <span>Pay Outs</span></a></li>
                            <li class="<?php if($this->uri->segment(2)=='past_payouts') { echo 'active'; } ?>"><a href="<?php echo base_url('admin/past_payouts') ?>"><i class="fa fa-arrow-down"></i>Past Payouts</a></li>
                             
                        </ul>
                    </li>
                  <!--   <li><a href="#"><i class="fa fa-arrow-right"></i> <span>Payouts</span></a></li> -->
                  

                      <li class="treeview <?php if($this->uri->segment(2)=='message_index' or $this->uri->segment(2)=='inbox') { echo 'active'; } ?>"><a href="#"><i class="fa fa-envelope"></i> <span>Inbox</span> <span class="badge badge-primary pull-right">2</span></a>
                        <ul class="treeview-menu">
                            <li  class="<?php if($this->uri->segment(2)=='message_index') { echo 'active'; } ?>"><a href="<?php echo base_url('admin/message_index') ?>"><i class="icon icon-circle-o text-red"></i> Create Message</a></li>
                            <li  class="<?php if($this->uri->segment(2)=='inbox') { echo 'active'; } ?>"><a href="<?php echo base_url('admin/inbox') ?>"><i class="icon icon-circle-o text-yellow"></i>Inbox</a></li>
                            
                        </ul>
                    </li>
                    
                  
                     <li class="<?php if($this->uri->segment(2)=='writer_approvals') { echo 'active'; } ?>"><a href="<?php echo base_url('admin/writer_approvals') ?>"><i class="fa fa-plus"></i> <span>Writer Requests</span></a></li>
                     <li class="treeview <?php if($this->uri->segment(2)=='get_buyers' or $this->uri->segment(2)=='get_writers') { echo 'active'; } ?>"><a href="#"><i class="fa fa-users"></i> <span>Users</span> <span class="badge badge-primary pull-right">3</span></a>
                        <ul class="treeview-menu">
                            <li class="<?php if($this->uri->segment(2)=='get_buyers') { echo 'active'; } ?>"><a href="<?php echo base_url('admin/get_buyers') ?>"><i class="icon icon-circle-o text-red"></i> Clients</a></li>
                            <li class="<?php if($this->uri->segment(2)=='get_writers') { echo 'active'; } ?>"><a href="<?php echo base_url('admin/get_writers') ?>"><i class="icon icon-circle-o text-yellow"></i>Writers</a></li>
                           <!--  <li><a href="<?php //echo base_url('admin/get_writers_ratings') ?>"><i class="icon icon-circle-o text-yellow"></i>Writer Ratings</a></li> -->
                            <!-- <li><a href="#plugins-list"><i class="icon icon-folder5 text-blue"></i>Admins</a></li> -->
                        </ul>
                    </li>
                      <li class="treeview <?php if($this->uri->segment(2)=='commission_view' or $this->uri->segment(2)=='packages_view') { echo 'active'; } ?>"><a href="#"><i class="fa fa-wrench"></i> <span>Settings</span> <span class="badge badge-primary pull-right">2</span></a>
                        <ul class="treeview-menu">

                            
                          
                           
                          
                        </ul>
                    </li>

                </ul>
                <!-- /.sidebar-menu -->
            </section>
            <!-- /.sidebar -->
        </aside>
