<?php include 'header.php' ?>
<div class="content-page">
                <div class="content">
                    
                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                   
                                    <h4 class="page-title">Payment History</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">

                         <div class="col-md-9 offset-md-1">


                          <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Payment History</h4>
                                       
    
                                        <div class="table-responsive">
                                            <table class="table table-striped mb-0">
                                                <thead>
                                                      <tr>
                                                          <th>#</th>
                                                          <th>Amount ($)</th>
                                                          <th>Transaction Code</th>
                                                          <th>Payment Status</th>
                                                         <!--  <th>Refund Status</th> -->
                                                          <th>Date</th>
                                                         
                                                      </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                      <?php
                                                        $amount=0;
                                                        foreach ($p->result() as $row)
                                                            
                                                        {   
                                                            $amount+=$row->transaction_amount;

                                                          ?>
                                                        <tr>
                                                            <td><?php if(isset($row->transaction_id)) { echo $row->transaction_id;  }   ?></td>
                                                            <td><?php if(isset($row->transaction_amount)) { echo $row->transaction_amount;  }   ?></td>
                                                             <td><?php if(isset($row->transaction_code)) { echo $row->transaction_code;  }   ?></td>
                                                            <td><?php if(isset($row->transaction_status)) { echo $row->transaction_status;  }   ?></td>
                                                           <!--  <td><?php //if(isset($row->refund_name)) { echo $row->refund_name;  }   ?></td> -->
                                                            <td><?php if(isset($row->transaction_added)) { date_output($row->transaction_added);  }   ?></td>
                                                           
                                                            
                                                          
                                                         
                                                        </tr>
                                                       <?php } ?>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                          <div class="table-responsive">
                                             <table class="table table-striped mb-0">
                                                 <tr>
                                                     <th>Total</th>
                                                     <td><?= '$ '.$amount;  ?></td>
                                                 </tr>


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