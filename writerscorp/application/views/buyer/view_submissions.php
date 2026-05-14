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
                       <h3>Submissions</h3>
                        <table class="table bg-white">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Message</th>
                                    <th>File</th>
                                    <th>Submitted</th>
                                   
                                 
                                   
                                </tr>
                            </thead>
                            <tbody>
                              <?php

                               if($subs->num_rows()>0) {
                                foreach ($subs->result() as $row)
                                {   ?>
                                <tr>
                                    <td><?php if(isset($row->submission_id)) { echo $row->submission_id;  }   ?></td>
                                    <td><?php if(isset($row->more_info)) { echo $row->more_info;  }   ?></td>
                                    <td><?php if(isset($row->file)) { ?> <a href="<?php echo base_url('submit_subscriptions/'.$row->file) ?>">View</a><?php } ?></td>
                                    <td><?php 
                                              $message['cdate']= $row->date_added; 
                                              include 'message_time.php';


                                    ?></td>
                                   
                                  
                                  
                                </tr>
                               <?php } } else {?>
                                <div class="alert alert-warning">
                                  <p> You don't have any submissions at the moment </p>
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