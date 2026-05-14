<?php include 'header.php' ?>
<div class="content-page">
                <div class="content">
                    
                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                   
                                    <h4 class="page-title">Clients</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">

                         <div class="col-md-11 offset-md-1">


                          <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Clients</h4>
                                       
    
                                        <div class="table-responsive">
                                            <table class="table table-striped mb-0">
                                                <thead>
                                                       <tr>
                                                            <th>#</th>
                                                            <th>Name</th>
                                                            <th>Email</th>
                                                            <th>Status</th>
                                                            <th>Orders</th>
                                                            <th>Action</th>
                                                        </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                      foreach ($h->result() as $row)
                                                      {   ?>
                                                      <tr>
                                                          <td><?php if(isset($row->user_id)) { echo $row->user_id;  }   ?></td>
                                                          <td><?php if(isset($row->user_fname )) { echo $row->user_fname.' '.$row->user_lname;  }   ?></td>
                                                          <td><?php if(isset($row->user_email)) { echo $row->user_email;  }   ?></td>
                                                          <td><?php if(isset($row->user_status)) { 

                                                                       if($row->user_status==1)
                                                                        { ?>
                                                                           <span class="badge badge-success">Active</span>
                                                                       <?php
                                                                        }
                                                                     
                                                                       else
                                                                       { ?>

                                                                        <span class="badge badge-primary">Inactive/Deleted</span>

                                                                     <?php  }


                                                                   }   ?></td>
                                                          <td><a href="<?php echo base_url('admin/user_details/').$row->user_id.'/1'; ?>"><button class="btn btn-success btn-sm">Cient Orders</button></a></td>
                                                           <td><?php if(isset($row->user_status)) { 

                                                                       if($row->user_status==1)
                                                                        { ?>
                                                                          <a href="<?php echo base_url('admin/change_status/').$row->user_id.'/0/1'; ?>">
                                                                           <button class="btn btn-md btn-warning">Deactivate/Delete</button>
                                                                          </a>
                                                                       <?php
                                                                        }
                                                                       else
                                                                       { ?>
                                                                       <a href="<?php echo base_url('admin/change_status/').$row->user_id.'/1/1'; ?>">
                                                                        <button class="btn btn-md btn-primary">Activate</button>
                                                                       </a>

                                                                     <?php  }


                                                                   }   ?></td>
                                                      </tr>
                                                     <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                              </div>
                           
                          
                        </div>
                        <!--- end row -->

                       
                        <!-- end row -->

                       
                        <!-- end row -->

                       
                        <!-- end row -->

                      
                        <!-- end row -->


                       
                        <!-- end row -->  
                        
                    </div> <!-- end container-fluid -->

                </div> <!-- end content -->

                

                <!-- Footer Start -->
               
       <?php include 'footer.php'; ?>