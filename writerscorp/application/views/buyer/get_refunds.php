<?php include 'header.php'; ?>       
        <div class="page light">
            <div class="content-wrapper animatedParent animateOnce">
                <div class="container">
                  <div class="row">
                  <div class="col-md-3">
                    <section class="p-t-17">
                        <?php include 'buyer_menu.php' ?>
                      </section>
                  </div>
                  <div class="col-md-9">

                 
                    <section class="p-t-20 me">
                    <div class="row">
                       <div class="col-md-12">
                        <h3>Refund Status</h3>
                        <table class="table bg-white">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Amount</th>
                                   <!--  <th>Transaction Code</th> -->
                                   <!--  <th>Payment Type</th> -->
                                   
                                    <th>Status</th>
                                    <th>Requested Date</th>
                                     
                                  
                                </tr>
                            </thead>
                            <tbody>
                              <?php
                                foreach ($h->result() as $row)
                                {   ?>
                                <tr>
                                    <td><?php if(isset($row->ido)) { echo $row->ido;  }   ?></td>
                                    <td><?php if(isset($row->refund_amount)) { echo $row->refund_amount;  }   ?></td>
                                   <!--  <td><?php// if(isset($row->transaction_details)) { echo $row->transaction_details;  }   ?></td> -->
                                   <!--  <td><?php// if(isset($row->type_name)) { echo $row->type_name;  }   ?></td> -->
                                    <td><?php if(isset($row->refund_name)) { echo $row->refund_name;  }   ?></td>
                                   
                                   <td><?php if(isset($row->refund_date)) { echo $row->refund_date;  }   ?></td>
                                </tr>
                               <?php } ?>
                            </tbody>
                        </table>
                     </div>
                    </div>
                   </section>
                 </div> <!-- end of tab-->
                 </div>
                </div>
            </div>
        </div>
<?php include 'footer.php'; ?>       