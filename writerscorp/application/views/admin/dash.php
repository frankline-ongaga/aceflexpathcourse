<?php include 'header.php'; ?>



            <div class="content-page">
                <div class="content">
                    
                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Role: <?php if(isset($role_name)){ echo $role_name; } ?></a></li>
                                            <li class="breadcrumb-item active">Dashboard</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title"><?php if(isset($user_fname)){
                                      echo "Welcome  " . $user_fname;
                                    } ?></h4> 
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        
                        <div class="row">

                            <div class="col-xl-3 col-md-6">
                                <div class="card widget-box-two bg-purple">
                                    <div class="card-body">
                                        <div class="media">
                                            <div class="media-body wigdet-two-content">
                                                <p class="m-0 text-uppercase text-white" title="Statistics">COMPLETED</p>
                                                <h2 class="text-white"><span data-plugin="counterup"><?php if(isset($completed_count)){ echo $completed_count;  } else { echo "0"; } ?></span> <i class="mdi mdi-arrow-up text-white font-22"></i></h2>
                                            </div>
                                            <div class="avatar-lg rounded-circle bg-soft-light ml-2 align-self-center">
                                                <i class="mdi mdi-chart-line font-22 avatar-title text-white"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end col -->
        
                            <div class="col-xl-3 col-md-6">
                                <div class="card widget-box-two bg-info">
                                    <div class="card-body">
                                        <div class="media">
                                            <div class="media-body wigdet-two-content">
                                                <p class="m-0 text-white text-uppercase" title="User Today">In Progress</p>
                                                <h2 class="text-white"><span data-plugin="counterup"><?php if(isset($pending_count)){ echo $pending_count;  } else { echo "0"; }?></span> <i class="mdi mdi-arrow-up text-white font-22"></i></h2>
                                            </div>
                                            <div class="avatar-lg rounded-circle bg-soft-light ml-2 align-self-center">
                                                <i class="mdi mdi-access-point-network  font-22 avatar-title text-white"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end col -->
        
                            <div class="col-xl-3 col-md-6">
                                <div class="card widget-box-two bg-pink">
                                    <div class="card-body">
                                        <div class="media">
                                            <div class="media-body wigdet-two-content">
                                                <p class="m-0 text-uppercase text-white" title="Request Per Minute">Revision</p>
                                                <h2 class="text-white"><span data-plugin="counterup"><?php if(isset($revision_count)){ echo $revision_count;  } else { echo "0"; }?></span> <i class="mdi mdi-arrow-up text-white font-22"></i></h2>
                                            </div>
                                            <div class="avatar-lg rounded-circle bg-soft-light ml-2 align-self-center">
                                                <i class="mdi mdi-timetable font-22 avatar-title text-white"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end col -->
        
                            <div class="col-xl-3 col-md-6">
                                <div class="card widget-box-two bg-success">
                                    <div class="card-body">
                                        <div class="media">
                                            <div class="media-body wigdet-two-content">
                                                <p class="m-0 text-white text-uppercase" title="New Downloads">Technical Req</p>
                                                <h2 class="text-white"><span data-plugin="counterup"><?php if(isset($technical_count)){ echo $technical_count;  } else { echo "0"; } ?></span> <i class="mdi mdi-arrow-up text-white font-22"></i></h2>
                                            </div>
                                            <div class="avatar-lg rounded-circle bg-soft-light ml-2 align-self-center">
                                                <i class="mdi mdi-cloud-download font-22 avatar-title text-white"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end col -->
        
                        </div>
                        <!-- end row -->

                        <div class="row">
                           
                                 <div class="col-md-4">
                                        <div class="card widget-box-three">
                                            <div class="card-body">
                                                <div class="media">
                                                    <div class="bg-icon avatar-lg text-center bg-light rounded-circle">
                                                        <i class="fas fa-money-bill h2 text-muted m-0 avatar-title"></i>
                                                    </div>
                                                    <div class="media-body text-right ml-2">
                                                        <p class="text-uppercase">Earnings</p>
                                                        <h2 class="mb-0"><span data-plugin="counterup"><?php if(isset($e)){ echo $e;  } else { echo "0"; } ?></span></h2>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                       <div class="col-md-4">
                                        <div class="card widget-box-three">
                                            <div class="card-body">
                                                <div class="media">
                                                    <div class="bg-icon avatar-lg text-center bg-light rounded-circle">
                                                        <i class="fas fa-users h2 text-muted m-0 avatar-title"></i>
                                                    </div>
                                                    <div class="media-body text-right ml-2">
                                                        <p class="text-uppercase">Clients</p>
                                                        <h2 class="mb-0"><span data-plugin="counterup"><?php if(isset($b)){ echo $b;  } else { echo "0"; } ?></span></h2>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="card widget-box-three">
                                            <div class="card-body">
                                                <div class="media">
                                                    <div class="bg-icon avatar-lg text-center bg-light rounded-circle">
                                                        <i class="fas fa-edit h2 text-muted m-0 avatar-title"></i>
                                                    </div>
                                                    <div class="media-body text-right ml-2">
                                                        <p class="text-uppercase">Writers</p>
                                                        <h2 class="mb-0"><span data-plugin="counterup"><?php if(isset($w)){ echo $w;  } else { echo "0"; } ?></span></h2>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                           
                      </div>



                     
                        <!-- end row -->


                        <div class="row">
                           
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title mb-3">Recent Orders</h4>
    
                                        <div class="table-responsive">
                                            <table class="table mb-0">
                                                <thead>
                                               
                                                     <tr>
                                                        <th>Client Name</th>
                                                        <th>Paper</th>
                                                        <th>Price(USD)</th>
                                                        <th>Action</th>
                                                    </tr>
                                               
                                                </thead>
                                                <tbody>
                                                      <?php
                                                        foreach ($f->result() as $row)
                                                        {   ?>
                                                    <tr>
                                                       
                                                        <td>
                                                            <h6><?php if(isset($row->user_fname)) { echo $row->user_fname;  }   ?></h6></td>
                                                        <td><?php if(isset($row->order_title)) { echo $row->order_title;  }   ?></td>
                                                        <td><?php if(isset($row->order_amount)) { echo $row->order_amount;  }   ?></td>
                                                         <td><a href="<?php echo base_url('admin/get_paper_details/').$row->order_id; ?>"><button class="btn btn-primary btn-sm">Paper Details</button></a></td>
                                                    </tr>
                                                    <?php
                                                        }
                                                    ?>
    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                             <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title mb-3">Writer Applications</h4>
    
                                        <div class="table-responsive">
                                              <table id="recent-orders" class="table table-hover mb-0 ps-container ps-theme-default">
                                                <thead class="bg-light">
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Customer Name</th>
                                                      
                                                        <th>Status</th>
                                                        <th>View Request</th>

                                                      
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                 <?php
                                                        foreach ($r->result() as $row)
                                                        {   ?>

                                                    <tr>

                                                        <td>#<?php if(isset($row->user_id)) { echo $row->user_id;  }   ?></td>
                                                        <td><?php if(isset($row->user_fname)) { echo $row->user_fname . ' '.$row->user_lname ;  }   ?></td>
                                                      
                                                        <td><span class="badge badge-success">Unconfirmed</span></td>
                                                        <td><a href="<?php echo base_url('admin/writer_application/').$row->user_id; ?>"><button class="btn-sm btn btn-warning">View Application</button></a></td>
                                                    </tr>
                                                    <?php } ?>
                                                   
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          
                            <!-- end col -->

                        </div>
                        <!-- end row -->
                        
                    </div> <!-- end container-fluid -->

                </div> <!-- end content -->

       <?php include 'footer.php'; ?>

     