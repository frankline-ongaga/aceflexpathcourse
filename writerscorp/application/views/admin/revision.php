<?php include 'header.php' ?>
<div class="content-page">
                <div class="content">
                    
                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                   
                                    <h4 class="page-title">Revision</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">

                         <div class="col-md-10 offset-md-1">


                          <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">All Orders</h4>
                                       
    
                                        <div class="table-responsive">
                                            <table class="table table-striped mb-0">
                                                <thead>
                                                      <tr>
                                                              <th>#</th>
                                                              <th>Paper Title</th>
                                                              <th>Discipline</th>
                                                              <th>Revision Details</th>
                                                             
                                                              <th>Amount</th>
                                                              <th>Submit Revision</th>
                                                              <th>Chat</th>
                                                              <th>Action</th>
                                                        </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                       <?php
                                                            foreach ($revision->result() as $row)
                                                            {   ?>
                                                            <tr>
                                                                <td><?php if(isset($row->order_id)) { echo $row->order_id;  }   ?></td>
                                                                <td><?php if(isset($row->order_title)) { echo $row->order_title;  }   ?></td>
                                                                <td><?php 

                                                               if($row->discipline_id!=69){

                                                                if(isset($row->discipline_name)){ echo $row->discipline_name;  } else { echo '__'; } 

                                                              }
                                                              else
                                                              {

                                                                echo $row->other;
                                                              }




                                                                ?></td>
                                                                <td><?php if(isset($row->order_revision_details)) { echo $row->order_revision_details;  }   ?></td>
                                                               
                                                                <td><?php if(isset($row->order_amount)) { echo $row->order_amount;  }   ?></td>

                                                                 <td><a href="<?php echo base_url('admin/submit_paper/').$row->order_id; ?>"><button class="btn btn-warning btn-sm">Submit Work</button></a></td>

                                                                  <td><a href="<?php echo base_url('admin/message_client/').$row->order_id.'/'.$row->order_user_id; ?>"><button class="btn btn-success btn-sm">Message Client</button></a></td>

                                                                  


                                                                 
                                                                <td><a href="<?php echo base_url('admin/get_paper_details/').$row->order_id; ?>"><button class="btn btn-primary btn-sm">Paper Details</button></a></td>
                                                             
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