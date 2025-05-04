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
                         <div class="row">
                           <div class="col-md-3">
                             <h6>Deposits</h6>
                            </div>
                            <div class="col-md-3">
                             <h6>Balance: <?php echo $bal; ?></h6>
                            </div>
                            <div class="col-md-3" style="float: right; position: relative;">
                                <h6><a href="<?php echo base_url() ?>buyer/load_account">Deposit Funds</a></h6>
                            </div>
                            <div class="col-md-3" style="float: right; position: relative;">
                                <h6><a href="#"  data-toggle="modal" data-target="#myModal" onclick="return confirm('Are you sure?')">Request a Refund <a href="#" data-toggle="tooltip" data-placement="right" title="Note that refunds will be processed to the payment method used for deposits. Please allow 1 day for refunds."><sup>?</sup></a></a></h6>
                            </div>
                         </div> <br>
                        <table class="table bg-white">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Amount</th>
                                    <th>Transaction Code</th>
                                    <th>Payment Type</th>
                                   
                                    <th>Status</th>
                                    <!--  <th>Request Refund</th> -->
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php
                                foreach ($h->result() as $row)
                                {   ?>
                                <tr>
                                    <td><?php if(isset($row->id)) { echo $row->id;  }   ?></td>
                                    <td><?php if(isset($row->amount)) { echo $row->amount;  }   ?></td>
                                    <td><?php if(isset($row->transaction_details)) { echo $row->transaction_details;  }   ?></td>
                                    <td><?php if(isset($row->type_name)) { echo $row->type_name;  }   ?></td>
                                    <td><?php if(isset($row->transaction_status)) { echo $row->transaction_status;  }   ?></td>
                                    <!-- <td><a onclick="return confirm('Are you sure?')" href="<?php //echo base_url() ?>buyer/request_refund/<?php //echo $row->id ?>">Request Refund</a>  <a href="#" data-toggle="tooltip" data-placement="right" title="Note that refunds will be processed to the payment method used for deposits. Please allow 1 day for refunds."><sup>?</sup></a></td> -->
                                    <td><?php if(isset($row->transaction_added)) { echo $row->transaction_added;  }   ?></td>
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