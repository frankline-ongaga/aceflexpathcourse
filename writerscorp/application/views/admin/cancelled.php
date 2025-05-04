<?php include 'header.php' ?>
<div class="content-page">
                <div class="content">
                    
                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                   
                                    <h4 class="page-title">Cancellation Requests</h4>
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
                                        <h4 class="header-title">Cancellation Requests</h4>
                                       
    
                                        <div class="table-responsive">
                                            <table class="table table-striped mb-0">
                                                <thead>
                                                      <tr>
                                                            <th>#</th>
                                                            <th>Paper Title</th>
                                                            <th>Discipline</th>
                                                            <th>Amount</th>
                                                            <th>Status</th>
                                                            <th>Process</th>
                                                           
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
                                                              <td><a href="#myModal<?php echo $row->order_id;  ?>" data-target="#myModal<?php echo $row->order_id;  ?>" data-toggle="modal"><button class="btn btn-success btn-sm">Process Cancellation</button></a></td>

                                                                <div class="modal" id="myModal<?php echo $row->order_id;  ?>">
                                                                <div class="modal-dialog">
                                                                  <div class="modal-content">

                                                                    <!-- Modal Header -->
                                                                    <div class="modal-header">
                                                                      <h4 class="modal-title">Process Refund</h4>
                                                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                    </div>

                                                                    <!-- Modal body -->
                                                                    <div class="modal-body">
                                                                      <form method="post" action="<?php echo base_url('admin/process_refund') ?>">
                                                                         <input type="hidden" name="order_id" value="<?php if(isset($row->order_id)) { echo $row->order_id;  }   ?>">
                                                                         <label>Order Amount</label>
                                                                         <input type="number" class="form-control" value="<?= $row->order_amount ?>" name="amount" placeholder="amount" required readonly="">

                                                                          <label>Refund Amount</label>
                                                                         <input type="number" max="<?= $row->order_amount ?>" class="form-control" name="refund_amount" placeholder="amount" required>

                                                                         <br>

                                                                         <button type="Submit" class="btn btn-primary">Submit</button>

                                                                      </form>
                                                                    </div>

                                                                    <!-- Modal footer -->
                                                                    <div class="modal-footer">
                                                                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                    </div>

                                                                  </div>
                                                                </div>
                                                              </div>

                                                              
                                                              
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