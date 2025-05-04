<?php include 'header.php' ?>
<div class="content-page">
                <div class="content">
                    
                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                   
                                    <h4 class="page-title">Admins</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">

                         <div class="col-md-11 offset-md-1">
                           <?php 
                                  if(isset($success)) {
                                    ?>
                                     <div class="alert alert-success">
                                       <?php

                                            echo $success;
                                        ?>
                                       </div>
                                    <?php
                                  }
                                ?>


                          <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Admins <span style="float:right;"><a class="btn btn-success" href="<?= base_url() ?>admin/add_admin"><i class="fas fa-plus"></i> Add Admin</a></span></h4>
                                       
    
                                        <div class="table-responsive">
                                            <table class="table table-striped mb-0">
                                                <thead>
                                                       <tr>
                                                            <th>#</th>
                                                            <th>Name</th>
                                                            <th>Email</th>
                                                            <th>Role</th>
                                                            <th>Action</th>
                                                        </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                      foreach ($h as $row)
                                                      {   ?>
                                                      <tr>
                                                          <td><?php if(isset($row->user_id)) { echo $row->user_id;  }   ?></td>
                                                          <td><?php if(isset($row->user_fname )) { echo $row->user_fname.' '.$row->user_lname;  }   ?></td>
                                                          <td><?php if(isset($row->user_email)) { echo $row->user_email;  }   ?></td>
                                                          <td><?php if(isset($row->role_name)) { 

                                                                       echo $row->role_name;
                                                                     


                                                                   }   ?></td>
                                                        
                                                           <td>
                                                               <?php if($row->role_id!=1) {  ?>
                                                                          <a href="<?php echo base_url('admin/delete_admin/').$row->user_id; ?>" onclick="return confirm('Are you sure you want to delete this admin?');">
                                                                           <button class="btn btn-md btn-warning">Delete Admin</button>
                                                                          </a>
                                                                <?php }else{ 

                                                                      echo "___";
                                                                }  ?>
                                                          </td>
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