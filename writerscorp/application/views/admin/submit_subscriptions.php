<?php include 'header.php'; ?>
<div class="content-wrapper">
                <div class="container">
                   <div class="row">
                 
                       <div class="col-md-8 p-t-20 offset-md-2" >
                      
                         <div class="card" style="margin-bottom: 25px;">
                    
                     
                          <div class="col-md-12 px-3">

                            <div class="card-block px-3">
                            <br>

                             <h3>Previous Submissions on this package</h3>
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
                             

                              <div class="card-body">
                                <?php if(!empty($error)){ ?>
                                         <div class="alert alert-warning">
                                           <?php echo $error; ?>
                                          </div>

                                 <?php     } ?>

                                  <?php if(!empty($success)){ ?>
                                         <div class="alert alert-success">
                                           <?php echo $success; ?>
                                          </div>

                                 <?php     } ?>
                                  <h5>Submit Subscriptions to this client</h5>
                              

                               <form method="post" action="<?php echo base_url('admin/submit_work_process'); ?>" enctype="multipart/form-data">
                                <label>Leave a message (optional)</label>
                                <input type="hidden" name="order_id" value="<?php if(isset($order_id)) { echo $order_id; }?>">
                                <textarea class="form-control" name="more_info" rows="8" required></textarea>
                                <br>
                                <label>Upload a file</label><br>
                                <input type="file" name="assignment">
                                <br> <br>  <br>
                                <button class="btn btn-primary" type="submit">Submit work</button>
                               </form>
                             
                         

                              </div>
                             
                              
                             
                            </div>
                          </div>

                       
                      </div>
                      
                  
                      
                       </div>
                    </div>
                </div>
            </div>
        </main>
<?php include 'footer.php'; ?>