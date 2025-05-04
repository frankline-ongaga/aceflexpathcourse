<?php include 'header.php' ?>
<div class="content-page">
                <div class="content">
                    
                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                   
                                    <h4 class="page-title">Paper Details</h4>
                                </div>
                            </div>
                        </div>     
  <section class="content">

           <div class="row">

              <div class="col-md-8 offset-md-2">
                  <div class="card">

                               <div class="card-body">
                        <?php 


                          foreach ($d->result() as $row) {
                            $order_id=$row->order_id;
                            # code...

                    
                         

                        ?>

                <div class="box box-success">
                      <div class="box-header with-border">
                        <h3 class="box-title">Paper Details</h3>
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body">
                           <div class="row">
                          <div class="col-6">
                      
                        <strong><i class="fa fa-user margin-r-5"></i> Client Name</strong>

                        <p class="text-muted">
                           <input type="text" class="form-control" value="<?php if(isset($row->user_fname)){ echo $row->user_fname;  } else { echo '__'; } ?> <?php if(isset($row->user_lname)){ echo $row->user_lname;  } else { echo '__'; } ?>"  readonly/>
                        </p>

                        
                         </div>

                         <div class="col-6">

                           <strong><i class="fa fa-envelope margin-r-5"></i> Client Email</strong>

                        <p class="text-muted">
                           <input type="text" class="form-control" value="<?php if(isset($row->user_email)){ echo $row->user_email;  } else { echo '__'; } ?>" readonly />
                        </p>

                         

                       
                          </div>
                         </div>
                        <div class="row">
                          <div class="col-6">
                      
                        <strong><i class="fa fa-book margin-r-5"></i> Title</strong>

                        <p class="text-muted">
                           <input type="text" class="form-control" value="<?php if(isset($row->order_title)){ echo $row->order_title;  } else { echo '__'; } ?>"  readonly/>
                        </p>

                        
                         </div>

                         <div class="col-6">

                           <strong><i class="fa fa-th margin-r-5"></i> Order Type</strong>

                        <p class="text-muted">
                           <input type="text" class="form-control" value="<?php if(isset($row->order_type_name)){ echo $row->order_type_name;  } else { echo '__'; } ?>" readonly />
                        </p>

                         

                       
                          </div>
                         </div>

                          <strong><i class="fa fa-edit margin-r-5"></i> Description</strong>

                        <p class="text-muted">
                          <textarea class="form-control" readonly><?php if(isset($row->order_description)){ echo $row->order_description;  } else { echo '__'; } ?></textarea>
                        </p>

                         
                          

                         
                         <div class="row">
                          <div class="col-6">
                        <strong><i class="fa fa-search margin-r-5"></i> Discipline</strong>

                        <p class="text-muted">

                              <input type="text" class="form-control" value="<?php 

                                   if($row->discipline_id!=69){

                                    if(isset($row->discipline_name)){ echo $row->discipline_name;  } else { echo '__'; } 

                                  }
                                  else
                                  {

                                    echo $row->other;
                                  }




                                    ?>" readonly />
                          
                        </p>

                         
                       </div>
                        <div class="col-6">

                        <strong><i class="fa fa-bars margin-r-5"></i> Academic Level</strong>

                        <p class="text-muted">

                           <input type="text" class="form-control" value="<?php if(isset($row->level_name)){ echo $row->level_name;  } else { echo '__'; } ?>" readonly />
                          
                        </p>

                       
                       </div>
                     </div>

                     <div class="row">
                          <div class="col-6">


                        <strong><i class="fa fa-ellipsis-h margin-r-5"></i> Paper Format</strong>

                        <p class="text-muted">
                            <input type="text" class="form-control" value="<?php if(isset($row->format_name)){ echo $row->format_name;  } else { echo '__'; } ?>" readonly />
                        </p>
                         
                       </div>
                       <div class="col-6">

                        <strong><i class="fa fa-file-text-o margin-r-5"></i> Pages</strong>

                        <p class="text-muted">
                           <input type="text" class="form-control" value="<?php if(isset($row->order_pages)){ echo $row->order_pages;  } else { echo '__'; } ?>" readonly  />
                        </p>


                       
                       </div>
                      </div>


                        <strong><i class="fa fa-plus margin-r-5"></i> Sources</strong>

                        <p class="text-muted">
                           <input type="text" class="form-control" value="<?php if(isset($row->order_sources)){ echo $row->order_sources;  } else { echo '__'; } ?>" readonly />
                        </p>

                        

                          
                        <div class="row">
                          <div class="col-6">

                        <strong><i class="fa fa-upload margin-r-5"></i> Upload(s)</strong>

                        <p class="text-muted">

                          <?php  
                                 foreach ($uploads as $up) 
                                    { 
                                       if(isset($up->file_name)){  ?>

                                           <a href="<?php echo base_url().'userfile/'.$up->file_name;?>"><?= $up->file_name; ?> </a> <br>

                           <?php  } else { echo '__'; } }  ?>
                        </p>
                           </div>

                           <div class="col-6">
                          <strong><i class="fa fa-upload margin-r-5"></i> Revision Files</strong>

                        <p class="text-muted">

                          <?php  
                                 foreach ($rev as $re) 
                                    { 
                                       if(isset($re->file_name)){  ?>

                                           <a href="<?php echo base_url().'userfile/'.$re->file_name;?>"><?= $re->file_name; ?> </a> <br>

                           <?php  } else { echo '__'; } }  ?>
                        </p>
                          </div>
                        </div>

                        

                         <strong><i class="fa fa-upload margin-r-5"></i> Revision Notes</strong>

                        <p class="text-muted">

                         <textarea class="form-control" readonly><?php if(isset($row->order_revision_details)){ echo $row->order_revision_details;  } else { echo '__'; } ?></textarea>
                        </p>

                        



                       

                        

                         <div class="row">
                          <div class="col-6">
                        <strong><i class="fa fa-check margin-r-5"></i> Amount</strong>

                        <p class="text-muted">
                          
                            <input type="text" class="form-control" value="<?php if(isset($row->order_amount)){ echo $row->order_amount;  } else { echo '__'; } ?>" readonly />
                        </p>

                       

                         
                       </div>

                        <div class="col-6">
                        <strong><i class="fa fa-upload margin-r-5"></i> Payment Status</strong>

                        <p class="text-muted">
                              <input type="text" class="form-control" value="<?php if(isset($row->transaction_status)){ echo $row->transaction_status;  } else { echo '__'; } ?>" readonly />
                        </p>


                        
                         </div>
                        </div>


                        <strong><i class="fa fa-credit-card margin-r-5"></i> Transaction Code</strong>

                        <p class="text-muted">
                              <input type="text" class="form-control" value="<?php if(isset($row->transaction_code)){ echo $row->transaction_code;  } else { echo '__'; } ?>"  readonly />
                        </p>

                        

                         <strong><i class="fa fa-upload margin-r-5"></i> Delivery Notes</strong>

                        <p class="text-muted">

                         <textarea class="form-control" readonly><?php if(isset($row->order_delivery_note)){ echo $row->order_delivery_note;  } else { echo '__'; } ?></textarea>
                        </p>

                      <div class="row">
                          <div class="col-6">

                          <strong><i class="fa fa-download margin-r-5"></i> Completed</strong>

                        <p class="text-muted">
                               <?php  
                                 foreach ($submission as $sub) 
                                    { 
                                       if(isset($sub->file_name)){  ?>

                                           <a href="<?php echo base_url().'submission/'.$sub->file_name;?>"><?= $sub->file_name; ?> </a> <br>

                           <?php  } else { echo '__'; } }  ?> 
                        </p>
                        </div>
                         <div class="col-6">

                        

                       
                       

                        <strong><i class="fa fa-upload margin-r-5"></i> Due in</strong>

                        <p class="text-muted"><?php include 'time.php';   ?></p>
                      </div>
                    </div>

                     <div class="row">
                          <div class="col-6">
                        <strong><i class="fa fa-plus margin-r-5"></i> Order Placed</strong>

                        <p class="text-muted">
                          
                            <input type="text" class="form-control" value="<?php if(isset($row->order_start)){ date_output($row->order_start);  } else { echo '__'; } ?>" readonly />
                        </p>

                       

                         
                       </div>

                        <div class="col-6">
                        <strong><i class="fa fa-clock margin-r-5"></i>Order Due</strong>

                        <p class="text-muted">
                              <input type="text" class="form-control" value="<?php if(isset($row->order_due)){ date_output($row->order_due);  } else { echo '__'; } ?>" readonly />
                        </p>


                        
                         </div>
                        </div>

                      <div class="row">
                          <div class="col-12">
                        <strong><i class="fa fa-globe margin-r-5"></i> Time Zone</strong>

                        <p class="text-muted">
                          
                            <input type="text" class="form-control" value="<?php if(isset($row->order_tz)){ echo $row->order_tz;  } else { echo '__'; } ?>" readonly />
                        </p>

                       

                         
                       </div>
                     </div>

                       <div class="row">
                          <div class="col-12">
                        <strong><i class="fa fa-globe margin-r-5"></i> Website</strong>

                        <p class="text-muted">
                          
                            <input type="text" class="form-control" value="<?php if(isset($row->website)){ echo $row->website;  } else { echo '__'; } ?>" readonly />
                        </p>

                       

                         
                       </div>
                     </div>





                        
                       <?php
                         

                         } ?>






                        


                        


                       

                      
                      </div>
                      <!-- /.box-body -->
                    </div>

                  </div>

                </div>

                



              </div>

        




    


             

              </div>
  </section>
</div>





       


        



        <!-- FOOTER -->

        <!--===================================================-->

       <?php include 'footer.php'; ?>

      
     