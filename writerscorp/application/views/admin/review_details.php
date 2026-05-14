<?php include 'header.php' ?>
<div class="content-page">
                <div class="content">
                    
                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                   
                                    <h4 class="page-title">Review Paper</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">

                         <div class="col-md-9 offset-md-1">


                          <div class="card">
                                    <div class="card-body">
                        <?php
                        foreach ($d->result() as $row)
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
                              <!-- <h4 class="card-header">Review Paper</h4> -->

                              <div class="card-body">
                              <h6 class="babu">Paper Title  </h6>
                              <div class="kirui">
                              <pre>
                              <?php if(isset($row->order_title)) { echo $row->order_title;  } else { echo '___'; }  ?> 
                              </pre>
                             </div>
                              <h6 class="babu">Paper Description  </h6>
                               <div class="kirui">
                                 <pre>
                              <?php if(isset($row->order_description)) { echo $row->order_description;  } else { echo '___'; }  ?> 
                                </pre>
                              </div>
                             
                               <h6 class="babu">Writer  </h6>
                                <div class="kirui">
                                <pre>
                              <?php if(isset($row->user_fname)) { echo $row->user_fname.' '.$row->user_lname;  } else { echo '___'; } ?> 
                                </pre>
                              </div>
                               <h6 class="babu">Delivery Note  </h6>
                                <div class="kirui">
                                 <pre>
                              <?php if(isset($row->order_delivery_note)) { echo $row->order_delivery_note;  } else { echo '___'; }  ?> 
                               </pre>
                              </div>







                              <h6 class="babu">Document(s)</h6>
                               <div class="kirui">
                               <pre>
                                 <?php  
                                 foreach ($submission as $sub) 
                                    { 
                                       if(isset($sub->file_name)){  ?>

                                           <a href="<?php echo base_url().'submission/'.$sub->file_name;?>"><?= $sub->file_name; ?> </a> <br>

                           <?php  } else { echo '__'; } }  ?> 
                              </pre>
                              </div>
                             
                              <div>
                              <br> 
                                <a href="<?php echo base_url('admin/mark_complete/').$row->order_id ?>" class="btn btn-primary">Mark as complete & send to client</a> &nbsp;
                                <a href="<?php echo base_url('admin/get_revise_details/').$row->order_id ?>" class="btn btn-warning">Request a revision</a> &nbsp;
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