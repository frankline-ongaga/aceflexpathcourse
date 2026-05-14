<?php include 'header.php' ?>
<div class="content-page">
                <div class="content">
                    
                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                   
                                    <h4 class="page-title">Cancelled Order</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">

                         <div class="col-md-10 offset-md-1">
                            <?php 
                               if(isset($message))
                               {
                                ?>
                                <div class="alert alert-success">
                                 <?php
                                  echo $message;
                                  ?>
                                 </div>
                                 <?php
                               }

                             ?>


                          <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Cancelled Order</h4>
                                       
    
                                        <div class="table-responsive">
                                            <table class="table table-striped mb-0">
                                                <thead>
                                                      <tr>
                                                            <th>#</th>
                                                            <th>Paper Title</th>
                                                            <th>Discipline</th>
                                                            <th>Amount</th>
                                                            <th>Status</th>
                                                            <th>Chat</th>
                                                            
                                                           
                                                            <th>Action</th>
                                                        </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                      <?php
                                                          foreach ($cancelled->result() as $row)
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
                                                              <td><?php if(isset($row->order_amount)) { echo $row->order_amount;  }   ?></td>
                                                              <td><?php if(isset($row->status_name)) { echo $row->status_name;  }   ?></td>
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