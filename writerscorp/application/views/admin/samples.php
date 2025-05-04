<?php include 'header.php' ?>
<div class="content-page">
                <div class="content">
                    
                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                   
                                    <h4 class="page-title">Samples</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">

                         <div class="col-md-9 offset-md-1">


                          <div class="card">
                                    <div class="card-body">
                                        <?php 
                                         if(isset($success))
                                         {
                                          ?>
                                          <div class="alert alert-success">
                                           <?php
                                            echo $success;
                                            ?>
                                           </div>
                                           <?php
                                         }

                                       ?>
                                        <h4 class="header-title">Samples</h4>
                                       
    
                                        <div class="table-responsive">
                                            <table class="table table-striped mb-0">
                                                <thead>
                                                      <tr>
                                                            <th>#</th>
                                                            <th>Title</th>
                                                            <th>Edit</th>
                                                            <th>Action</th>
                                                        </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                     <?php
                                                          foreach ($h->result() as $row)
                                                          {   ?>
                                                          <tr>
                                                              <td><?php if(isset($row->sample_id)) { echo $row->sample_id;  }   ?></td>
                                                              <td><?php if(isset($row->sample_title)) { echo $row->sample_title;  }   ?></td>
                                                              <td><a href='<?php echo base_url("Admin/edit_sample/$row->sample_id");  ?>'>Edit</a></td>
                                                              <td><a href='<?php echo base_url("Admin/delete_sample/$row->sample_id");  ?>'' Onclick="return confirm('Are you sure you want to delete this record?')" >Delete</a></td>
                                                             
                                                           
                                                          </tr>
                                                         <?php } ?>
                                                    </tr>
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