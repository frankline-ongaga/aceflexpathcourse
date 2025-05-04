<div class="page-wrapper">
      <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
          <div class="breadcrumb-title pe-3">Edit Order</div>
          <div class="ps-3">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Edit Order</li>
              </ol>
            </nav>
          </div>
         
        </div>
        <!--end breadcrumb-->
        
        <div class="row" id="orderform">
          <div class="col-xl-9 mx-auto">
            <h4 class="mb-0 text-uppercase">Edit Order</h4>
            <p> Kindly note, an update on pages, deadline or academic level may cause a change in price. </p>
            <hr/>
              <div class="card">
                 <div class="card-body">
                                       
                                       
                                             <?php if(!empty($error)){ ?>

                                                 <div class="alert alert-warning">
                                                   <?php echo $error; ?>
                                                  </div>

                                               <?php     } ?>
                                          <?php 


                                             foreach ($h->result() as $row) {

                                                  $formaty=$row->order_format_id;
                                                  $discipliny=$row->order_discipline_id;
                                                  $levely=$row->order_level_id;
                                                  $service=$row->order_service_id;
                                                  $due=$row->order_due;
                                                  $amount=$row->order_amount;
                                             
                                            

                                          ?>

                                            <form id="zombie" method="post" action="<?php echo base_url() ?>client/update_order" enctype="multipart/form-data">
                                                <div class="col-md-9 offset-md-3">
                                                  <input type="hidden" id="order_id" name="order_id" value="<?php if(isset($row->order_id)){ echo $row->order_id; } ?>">
                                                    <div class="mb-3 row">
                                                          <div class="stv-radio-buttons-wrapper">
                                                            <input type="radio" onchange="get_tols()" onclick="get_tols()" class="stv-radio-button"  name="service" value="1" id="button1" <?php if($service==1){ echo "checked"; } ?> />
                                                            <label for="button1">Writing</label> 
                                                            <input type="radio" onchange="get_tols()" onclick="get_tols()" class="stv-radio-button"  name="service" value="2" id="button2"<?php if($service==2){ echo "checked"; } ?> />
                                                            <label for="button2">Editing</label>
                                                            <input type="radio" onchange="get_tols()" onclick="get_tols()"  class="stv-radio-button"  name="service" value="3" id="button3" <?php if($service==3){ echo "checked"; } ?>/>
                                                            <label for="button3">Proof Reading</label>
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label class="col-md-3 col-form-label" for="simpleinput">Title</label>
                                                        <div class="col-md-9">
                                                            <input type="text" id="order_title" value="<?php if(isset($row->order_title)){ echo $row->order_title; } ?>" class="form-control" name="order_title" placeholder="Title" required>
                                                        </div>
                                                    </div>
                                                     <div class="mb-3 row">
                                                        <label class="col-md-3 col-form-label" for="example-textarea">Description</label>
                                                        <div class="col-md-9">
                                                            <textarea class="form-control" rows="5" id="order_description" name="order_description" placeholder="Details"><?php if(isset($row->order_description)){ echo $row->order_description; } ?></textarea>
                                                        </div>
                                                    </div>
                                                  <?php } ?>
                                                    <div class="mb-3 row">
                                                        <label class="col-md-3 col-form-label" for="example-email">Discipline</label>
                                                        <div class="col-md-9">
                                                            <select id="discipline" class="form-control selector mb-3" name="order_discipline_id" onchange="get_other()" required>
                                                               
                                                                 <?php

                                                                  foreach ($discipline->result_array() as $row)         

                                                                    { ?>

                                                                    <option  value="<?php echo $row['discipline_id']; ?>" <?php if($row['discipline_id']==$discipliny){ echo "selected"; }  ?>><?php echo $row['discipline_name']; ?></option>

                                                               <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row" id="other">
                                                       <!--  <label class="col-md-3 col-form-label" for="example-palaceholder">Other</label> -->
                                                        <div class="col-md-9 offset-md-3">
                                                            <input type="text" name="other" class="form-control" id="other" placeholder="other">
                                                        </div>
                                                    </div>
                                                        <input type="hidden" name="order_tz" value="<?php if(isset($order_tz)){ echo $order_tz; }  ?>"  id="tz">

                                                   <?php 

                                                      foreach ($h->result() as $row) {
                                             
                                            

                                                    ?> 

                                                    <div class="mb-3 row">
                                                        <label class="col-md-3 col-form-label" for="example-password">Sources</label>
                                                        <div class="col-md-5">
                                                             
                                  
                                  

                                                             <div class="input-group">
                                                            <span class="input-group-btn">
                                                                <button type="button" id="bata" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="order_sources">
                                                                    <span class="fas fa-minus"></span>
                                                                </button>
                                                            </span>
                                                            <input type="text" value="<?php if(isset($row->order_sources)){ echo $row->order_sources; } ?>" name="order_sources"  id="order_sources" class="form-control input-number"  min="1"  max="100">
                                                            <span class="input-group-btn">
                                                                <button type="button" id="bata" class="btn btn-primary btn-number" data-type="plus" data-field="order_sources">
                                                                    <span class="fas fa-plus"></span>
                                                                </button>
                                                            </span>
                                                         </div>

                                                          
                                                       
                                                        </div>
                                                    </div>
    
                                                  
                                                      <div class="mb-3 row">
                                                        <label class="col-md-3 col-form-label" for="example-password">Pages</label>
                                                       
                                                          <div class="col-md-5">
                                                           <div class="input-group">
                                                              <span class="input-group-btn">
                                                                  <button type="button" id="bata" class="btn btn-primary btn-number"  disabled="disabled" data-type="minus" data-field="order_pages">
                                                                      <span class="fas fa-minus"></span>
                                                                  </button>
                                                              </span>
                                                              <input type="text" value="<?php if(isset($row->order_pages)){ echo $row->order_pages; } ?>" name="order_pages" onchange="get_words(),get_tols()" id="pages" class="form-control input-number" min="1"  max="100">
                                                              <span class="input-group-btn">
                                                                  <button type="button" id="bata" class="btn btn-primary btn-number"  data-type="plus" data-field="order_pages">
                                                                      <span class="fas fa-plus"></span>
                                                                  </button>
                                                              </span>
                                                           </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <input type="text" id="words" value="<?php if(isset($row->order_words)){ echo $row->order_words; } ?>" class="form-control" name="order_words" placeholder="Words" readonly>
                                                        </div>
                                                       
                                                    </div>
                                                  <?php } ?>
                                                   
                                                    <div class="mb-3 row">
                                                        <label class="col-md-3 col-form-label" for="example-readonly">Paper Format</label>
                                                        <div class="col-md-9">
                                                            <select class="form-control selector mb-3" id="order_format_id" name="order_format_id" onchange="get_tols()" required>
                                                                     <option value="" disabled  hidden>Paper Format</option>
                                                                   
                                                                    <?php

                                                                                      foreach ($format->result_array() as $row)

                                                     

                                                                                        { ?>

                                                                                        <option  value="<?php echo $row['format_id']; ?>"  <?php if($row['format_id']==$formaty){ echo "selected"; }  ?>><?php echo $row['format_name']; ?></option>

                                                                                   <?php } ?>
                                                                </select>
                                                        </div>
                                                    </div>
                                                     <div class="mb-3 row">
                                                        <label class="col-md-3 col-form-label" for="example-disable">Uploaded Files</label>
                                                        <div class="col-md-9">



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
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label class="col-md-3 col-form-label" for="example-disable">Upload More Files</label>
                                                        <div class="col-md-9">
                                                            <div class="dropzone" id="updateDropzone"></div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row">
                                                        <label class="col-md-3 col-form-label" for="example-disable">Academic Level</label>
                                                        <div class="col-md-9">
                                                           <select class="form-control selector mb-3" name="order_level_id" id="level" onchange="get_tols()" required>

                                                                
                                                                
                                                                   <?php

                                                                    foreach ($level->result_array() as $row)

                                   

                                                                      { ?>

                                                                      <option  value="<?php echo $row['level_id']; ?>" <?php if($row['level_id']==$levely){ echo 'selected'; } ?>><?php echo $row['level_name']; ?></option>

                                                                 <?php } ?>
                                                              </select>
                                                        </div>
                                                    </div>
                                                     <div class="row mb-3">
                                                        <label class="col-sm-3 col-form-label" for="example-palaceholder">Deadline</label>
                                                        <div class="col-sm-9">
                                                           <div class="input-group mb-3">
                                                             <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="bx bx-calendar"></i></span>
                                                              </div>
                                                              <input class="form-control readonly" value="<?php if(isset($due)){ echo $due; } ?>" placeholder="Launch Calendar" onchange="get_tols()"  type="text" id="deadline" name="order_deadline_id" required />
                                                             </div>
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <label class="col-sm-3 col-form-label" for="example-palaceholder">Edit Note</label>
                                                        <div class="col-sm-9">
                                                           <div class="input-group mb-3">
                                                             
                                                              <textarea name="edit_note" class="form-control"></textarea>
                                                             </div>
                                                        </div>
                                                    </div>


                                                    <input type="hidden" name="order_amount" value="<?php echo $amount; ?>">


                                                     <div class="form-group row">
                                                      <div class="col-md-3">
                                                      </div>
                                                      <div class="col-md-9">

                                                         <button type="submit" id="edit_order" class="btn btn-info btn-lg waves-effect waves-light">Update Order</button>

                                                        </div>


                                                     </div>



                                                </form>
                                           
                                        <!-- end row -->
    
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
                        
                    </div> <!-- end container-fluid -->

                </div> <!-- end content -->

            </section>

                

                <!-- Footer Start -->
               
     

     