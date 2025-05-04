<div class="page-wrapper">
      <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
          <div class="breadcrumb-title pe-3">Paper Details</div>
          <div class="ps-3">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Paper Details Paper Details Order <?php if(!empty($this->uri->segment(3))){ echo $this->uri->segment(3);  } ?></li>
              </ol>
            </nav>
          </div>
         
        </div>
        <!--end breadcrumb-->
        <div class="row">
          <div class="col-xl-9 mx-auto">

              <?php

                  if($this->uri->segment(4)==77){  ?>

                    <div class="alert alert-success">

                        order updated successfuly

                    </div>






               <?php   }


              ?>                
           
            
              <div class="card">
                 <div class="card-body">
                        <?php 


                          foreach ($h->result() as $row) {
                            $order_id=$row->order_id;
                            # code...

                            if($row->order_status==0){ ?>

                              <a href="<?php echo base_url('client/complete_pending_new/').$row->order_id.'/'.$row->order_amount; ?>"><button class="btn btn-success btn-sm">Pay Now</button></a>


                           <?php }
                            elseif($row->order_status==1 or $row->order_status==5 or $row->order_status==6 or $row->order_status==9 or $row->order_status==4 or $row->order_status==2)
                            { ?>

                           

                             <a href="<?php echo base_url('client/request_revision/').$row->order_id; ?>"><button class="btn btn-info btn-sm">Revise</button></a>

                               <a onclick="return confirm('Are you sure you want to cancel this order?');" href="<?php echo base_url('client/cancel_order/').$row->order_id; ?>"><button class="btn btn-warning btn-sm">Cancel</button></a>





                           <?php }

                            if($row->order_status==3){ ?>

                               <a href="<?php echo base_url('client/request_revision/').$row->order_id; ?>"><button class="btn btn-info btn-sm">Revise</button></a>


                         <?php   }
                         

                        ?>
                           <a href="<?php echo base_url('client/edit_order/').$row->order_id; ?>"><button class="btn btn-warning btn-sm">Edit Order</button></a>

                <div class="box box-success">
                      <br>
                      <!-- /.box-header -->
                      <div class="box-body">
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
                          <textarea rows="9" class="form-control" readonly><?php if(isset($row->order_description)){ echo $row->order_description;  } else { echo '__'; } ?></textarea>
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

                                              <?php
                                                    $pa='userfile/'.$up->file_name;
                                                    $path=base64_encode($pa);


                                                ?>

                                           <a href="<?php echo base_url().'client/download/'.$path;?>"><?= $up->file_name; ?> </a> <br>

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

                                             <?php
                                                    $pa='userfile/'.$re->file_name;
                                                    $path=base64_encode($pa);


                                                ?>

                                           <a href="<?php echo base_url().'client/download'.$path;?>"><?= $re->file_name; ?> </a> <br>

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

                         <strong><i class="fa fa-upload margin-r-5"></i> Edit Note</strong>

                        <p class="text-muted">

                         <textarea class="form-control" readonly><?php if(isset($row->edit_note)){ echo $row->edit_note;  } else { echo '__'; } ?></textarea>
                        </p>

                      <div class="row">
                          <div class="col-6">

                          <strong><i class="fa fa-download margin-r-5"></i> Completed</strong>

                        <p class="text-muted">
                               <?php  
                                 foreach ($submission as $sub) 
                                    { 
                                       if(isset($sub->file_name)){  ?>

                                           <?php
                                                    $pa='submission/'.$sub->file_name;
                                                    $path=base64_encode($pa);


                                                ?>

                                            

                                           <a href="<?php echo base_url().'client/download/'.$path;?>"><?= $sub->file_name; ?> </a> <br>

                           <?php  } else { echo '__'; } }  ?> 
                        </p>
                        </div>
                         <div class="col-6">

                        

                       
                       

                        <strong><i class="fa fa-upload margin-r-5"></i> Due in</strong>

                        <p class="text-muted"><?php include_once 'time.php';   ?></p>
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




                        
                       <?php
                         

                         } ?>

                      
                      </div>
                      <!-- /.box-body -->
                    </div>

                  </div>

                </div>

                



              </div>

        




    


             

              </div>
  </div>
</div>
