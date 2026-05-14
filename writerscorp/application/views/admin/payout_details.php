<?php include 'header.php' ?>
<div class="content-page">
                <div class="content">
                    
                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                   
                                    <h4 class="page-title">Payout Details</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">

                         <div class="col-md-9 offset-md-1">


                          <div class="card">
                        <?php
                        foreach ($h->result() as $row)
                        {   ?>
                         <div class="card" style="margin-bottom: 25px;">
                           <?php 
                                  if(isset($notification)) {
                                    ?>
                                     <div class="alert alert-success">
                                       <?php

                                            echo $notification;
                                        ?>
                                       </div>
                                    <?php
                                  }
                                ?>
                     
                          <div class="col-md-12 px-3">
                            <div class="card-block px-3">
                            <br>
                              <h4 class="card-header">Payout Details</h4>

                              <div class="card-body">
                              <h6 class="babu">User ID #<?php if(isset($row->user_id)) { echo $row->user_id; } ?>  </h6>
                              <div class="kirui">
                              <pre>
                              <?php if(isset($row->user_fname)) { echo $row->user_fname.' '.$row->user_lname;  } else { echo '___'; }  ?> 
                              </pre>
                             </div>
                              <h6 class="babu">Amount Requested  </h6>
                               <div class="kirui">
                                 <pre>
                              <?php if(isset($row->request_amount)) { echo $row->request_amount;  } else { echo '___'; }  ?> 
                                </pre>
                              </div>
                             
                               <h6 class="babu">Paypal Email  </h6>
                                <div class="kirui">
                                <pre>
                              <?php if(isset($row->user_paypal_email)) { echo $row->user_paypal_email;  } else { echo '___'; } ?> 
                                </pre>
                              </div>
                             
                             
                              <div>
                              <br> 
                                <a href="<?php echo base_url('admin/complete_payment/').$row->id ?>" class="btn btn-primary">Send Money</a> &nbsp;
                               
                                <br> <br>
                               
                              </div>

                              </div>
                             
                              
                             
                            </div>
                          </div>

                       
                      </div>
                      <?php
                        }
                      ?>
                  
                      
                       </div>
                    </div>
                </div>
            </div>
        </main>
<?php include 'footer.php'; ?>