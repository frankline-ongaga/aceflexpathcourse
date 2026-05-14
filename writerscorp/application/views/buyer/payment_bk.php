<?php include 'header.php' ?>
<div class="content-wrapper">
  <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></li>
            <li class="active">Payment History</li>
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
   
       <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Payment History</h3>
            </div>
           <div class="box-body table-responsive no-padding">
                       <table class="table table-striped" style="font-size: 12px;">
                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Amount</th>
                                    <th>Transaction Code</th>
                                    <th>Payment Status</th>
                                    <th>Date</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                              <?php
                                foreach ($p->result() as $row)
                                {   ?>
                                <tr>
                                    <td><?php if(isset($row->transaction_id)) { echo $row->transaction_id;  }   ?></td>
                                    <td><?php if(isset($row->transaction_amount)) { echo $row->transaction_amount;  }   ?></td>
                                     <td><?php if(isset($row->transaction_code)) { echo $row->transaction_code;  }   ?></td>
                                    <td><?php if(isset($row->transaction_status)) { echo $row->transaction_status;  }   ?></td>
                                    <td><?php if(isset($row->transaction_added)) { echo $row->transaction_added;  }   ?></td>
                                   
                                    
                                  
                                 
                                </tr>
                               <?php } ?>
                            </tbody>
              </table>
              </div>

                                      </div>

                      <!--===================================================-->

                      <!--End No Label Form-->

          

                  </div>

              </div>

         

  

          
      


        



        <!-- FOOTER -->

        <!--===================================================-->

       <?php include 'footer.php'; ?>