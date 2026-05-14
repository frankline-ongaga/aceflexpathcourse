<?php include 'header.php' ?>
<div class="content-page">
                <div class="content">
                    
                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                   
                                    <h4 class="page-title">Affiliate Tracker</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">

                         <div class="col-md-9 offset-md-1">


                          <div class="card">
                                    <div class="card-body">
                                      
                                       
    
                                        <div class="table-responsive">
                                            <table class="table table-striped mb-0">
                                                <thead>
                                                      <tr>
                                                            <th>Order ID</th>
                                                            <th>Order Made By ID</th>
                                                            <th>Order Amount</th>
                                                            <th>Earned by ID</th>
                                                            <th>Earned</th>
                                                            
                                                        </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                     <?php
                                                          foreach ($earnings->result() as $row)
                                                          {   ?>
                                                          <tr>
                                                              <td><?php if(isset($row->order_id)) { echo $row->order_id;  }   ?></td>


                                                              <td><?php if(isset($row->order_user_id)) { echo $row->order_user_id;  }   ?></td>
                                                            
                                                          

                                                              <td><?php if(isset($row->order_amount)) { echo $row->order_amount;  }   ?></td>

                                                              <td><?php if(isset($row->affiliate_id)) { echo $row->affiliate_id;  }   ?></td>
                                                              
                                                              <td><?php if(isset($row->affiliate_amount)) { echo $row->affiliate_amount;  }   ?></td>
                                                            
                                                           
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