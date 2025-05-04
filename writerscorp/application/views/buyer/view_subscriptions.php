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
                       <h3>Subscriptions</h3>
                        <table class="table bg-white">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Package</th>
                                    <th>Payment Status</th>
                                    <th>Expires In</th>
                                    <th>View Submissions</th>
                                 
                                   
                                </tr>
                            </thead>
                            <tbody>
                              <?php

                               if($subs->num_rows()>0) {
                                foreach ($subs->result() as $row)
                                {   ?>
                                <tr>
                                    <td><?php if(isset($row->order_id)) { echo $row->order_id;  }   ?></td>
                                    <td><?php if(isset($row->order_title)) { echo $row->order_title;  }   ?></td>
                                    <td><?php if($row->order_paid_status==1 and $leo<=$row->order_due) 
                                                { 
                                                    echo 'Active'; 

                                                 } 
                                                 elseif($row->order_paid_status==1 and $leo>$row->order_due) {
                                                    # code...
                                                      echo 'Expired';
                                                  } 
                                                  else
                                                  {

                                                      echo 'Pending Payments';

                                                  }


                                                  ?>
                                              </td>
                                    <td><?php  include 'date.php';  ?></td>

                                    <td><?php if($row->order_paid_status==1) 
                                                { ?>
                                                    <a href="<?php echo base_url('buyer/view_submissions/'.$row->order_id);?>">View Submissions</a>

                                              <?php   } 
                                                


                                                  ?>
                                              </td>
                                  
                                  
                                </tr>
                               <?php }  } else {?>
                                <div class="alert alert-warning">
                                  <p> You don't have any subscriptions at the moment </p>
                                </div>
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