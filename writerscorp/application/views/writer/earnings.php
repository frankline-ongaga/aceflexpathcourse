<?php include 'header.php' ?>
<div class="content-wrapper">
  <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></li>
            <li class="active">All Orders</li>
        </ol>    
  </section>
 

   <br>
    <br>
    
  
  <div class="container-fluid">

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
   
   
                <div class="box box-default">
                    <div class="box-header with-border">
                      <h3 class="box-title"></h3>
                       <h4 class="header-title">Account Bal $ <?php if(!empty($balance)){ print_r($balance);  }else{ echo '0'; } ?>  <a class="btn btn-success" style="float: right;" href="<?= base_url() ?>writer/request_funds/1">Request Funds</a></h4>
                       <br>

                       <?php if(isset($balancetwo)){ ?>

                         <h4 class="header-title">Local Acc Bal KES <?php if(isset($balancetwo)){ print_r($balancetwo);  }else{ echo '0'; } ?>  <a class="btn btn-warning" style="float: right;" href="<?= base_url() ?>writer/request_funds/2">Request Local</a></h4>


                      <?php } ?>

                    </div>
                 <div class="box-body table-responsive no-padding">


                        
                                       
                                       
    
                                        <div class="table-responsive">
                                            <table class="table table-striped mb-0">
                                                <thead>
                                                      <tr>
                                                            <th>ORDER ID</th>
                                                           
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
                                                            
                                                              <?php if($row->order_type==3){ ?>

                                                              <td><?php if(isset($row->order_amount)) { echo $row->order_amount.' KES';  }   ?></td>
                                                               <?php } else { ?>


                                                               <td><?php if(isset($row->order_amount)) { echo $row->order_amount*($row->order_commission/100) .' USD';  }   ?></td>
                                                             <?php } ?>



                                                              
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
                        
                    
               

                

                <!-- Footer Start -->
               
       <?php include 'footer.php'; ?>