<?php include 'header.php' ?>
<div class="content-page">
                <div class="content">
                    
                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                   
                                    <h4 class="page-title">Writers</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">

                         <div class="col-md-11 offset-md-1">


                          <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Writers</h4>
                                       
    
                                        <div class="table-responsive">
                                            <table class="table table-striped mb-0">
                                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                  
                                    <th>Orders</th>
                                    <th>Deactivate/Activate Writer</th>
                                    <th>Suspend</th>
                                   
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
                                   <!--   <td><?php // if(isset($row->account_balance)) { echo $row->account_balance;  }   ?></td>
                                   <td><?php // if(isset($row->writer_status_name)) {  echo $row->writer_status_name;  }   ?></td> -->

                                               
                                    <td><a href="<?php echo base_url('admin/user_details/').$row->user_id.'/2'; ?>"><button class="btn btn-success btn-sm">Writer Assignments</button></a></td>
                                     <td><?php if(isset($row->user_status)) { 
                                                 // $activestatus==1 or $activestatus==2 or $activestatus==3 or $activestatus==4

                                                                       if($row->user_status==1 or $row->user_status==2 or $row->user_status==3 or $row->user_status==4)
                                                                        { ?>
                                                                          <a href="<?php echo base_url('admin/change_status_writer/').$row->user_id.'/0/2'; ?>">
                                                                           <button class="btn btn-md btn-warning">Deactivate/Delete</button>
                                                                          </a>
                                                                       <?php
                                                                      
                                                                     


                                                                        }   
                                                                       else
                                                                       { ?>
                                                                       <a href="<?php echo base_url('admin/change_status_writer/').$row->user_id.'/1/2'; ?>">
                                                                        <button class="btn btn-md btn-primary">Activate</button>
                                                                       </a>

                                                                     <?php  }


                                                                   }   ?></td>
                                          <td><?php if(isset($row->user_status)) { 
                                                 // $activestatus==1 or $activestatus==2 or $activestatus==3 or $activestatus==4

                                                                       if($row->user_status==1 or $row->user_status==2 or $row->user_status==3 or $row->user_status==4)
                                                                        { ?>
                                                                          <a href="<?php echo base_url('admin/change_status_writer/').$row->user_id.'/7/2'; ?>">
                                                                           <button class="btn btn-md btn-warning">Suspend</button>
                                                                          </a>
                                                                       <?php
                                                                      
                                                                     


                                                                        }   
                                                                       else
                                                                       { ?>
                                                                       <a href="<?php echo base_url('admin/change_status_writer/').$row->user_id.'/1/2'; ?>">
                                                                        <button class="btn btn-md btn-primary">Unsuspend</button>
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
                       
                    </section>
            
    </div>
   
</body>

<?php include 'footer.php'; ?>