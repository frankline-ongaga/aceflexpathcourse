<div class="page-wrapper">
      <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
          <div class="breadcrumb-title pe-3">Place Order</div>
          <div class="ps-3">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Place Order</li>
              </ol>
            </nav>
          </div>
         
        </div>
        <!--end breadcrumb-->
        
        <div class="row" id="orderform">
          <div class="col-xl-9 mx-auto">
            <h4 class="mb-0 text-uppercase">Place Order</h4>
            <hr/>
              <div class="card">
                 <div class="card-body">
                                  <h6>Active Coupons</h6>
                                  
                                     <?php

                                       if(!empty($coupons)){ ?>

                                        
                                        <?php
                                           foreach ($coupons->result() as $coupon) {
                                             # code...
                                               echo strtoupper($coupon->coupon_code).'   ';
                                           }
                                           if(isset($specialcoupons)){
                                            foreach ($specialcoupons->result() as $scoupon) {
                                             # code...
                                               echo strtoupper($scoupon->coupon_code).'   ';
                                           }
                                         }




                                         }


                                     ?>
                                    


                                        
                                       
                                        <div class="row">
                                            <div class="col-xl-9">
                                             <?php if(!empty($error)){ ?>

                                                 <div class="alert alert-warning">
                                                   <?php echo $error; ?>
                                                  </div>

                                               <?php     } ?>
                                            <form class="form-horizontal" id="zombie" method="post" action="<?php echo base_url() ?>client/process_order_login_new" enctype="multipart/form-data">
                                                <div class="col-md-9 offset-md-3">
                                                    <div class="row mb-3">
                                                          <div class="stv-radio-buttons-wrapper">
                                                            <input type="radio"  onchange="get_tols()" onclick="get_tols()" class="stv-radio-button"  name="service" value="1" id="button1" checked />
                                                            <label for="button1">Custom Writing</label> 
                                                            <input type="radio"  onchange="get_tols()" onclick="get_tols()" class="stv-radio-button"  name="service" value="2" id="button2" />
                                                            <label for="button2">Editing</label>
                                                            <input type="radio" onchange="get_tols()" onclick="get_tols()"  class="stv-radio-button"  name="service" value="3" id="button3" />
                                                            <label for="button3">Proof Reading</label>
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label class="col-sm-3 col-form-label" for="simpleinput">Title</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" name="order_title" id="order_title" placeholder="Title" required>
                                                        </div>
                                                    </div>
                                                     <div class="row mb-3">
                                                        <label class="col-sm-3 col-form-label" for="example-textarea">Description</label>
                                                        <div class="col-sm-9">
                                                            <textarea class="form-control" rows="5" name="order_description" id="order_description" placeholder="Details"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label class="col-sm-3 col-form-label" for="example-email">Discipline</label>
                                                        <div class="col-sm-9">
                                                            <select id="discipline" class="form-select selector mb-3" name="order_discipline_id" onchange="get_other()" required>
                                                               
                                                                 <?php

                                                                  foreach ($discipline->result_array() as $rowz)         

                                                                    { ?>

                                                                    <option  value="<?php echo $rowz['discipline_id']; ?>"><?php echo $rowz['discipline_name']; ?></option>

                                                               <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3" id="other">
                                                       <!--  <label class="col-md-3 col-form-label" for="example-palaceholder">Other</label> -->
                                                        <div class="col-sm-9 offset-sm-3">
                                                            <input type="text" name="other" class="form-control" id="other" placeholder="other">
                                                        </div>
                                                    </div>

                                                    <input type="hidden" name="order_tz" value=""  id="tz">

                                                    <div class="row mb-3">
                                                        <label class="col-sm-3 col-form-label" for="example-password">Sources</label>
                                                        <div class="col-sm-5">
                                                             
                                  
                                  

                                                             <div class="input-group">
                                                            <span class="input-group-btn">
                                                                <button type="button" id="bata" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="order_sources">
                                                                    <span class="bx bx-minus"></span>
                                                                </button>
                                                            </span>
                                                            <input type="text" name="order_sources"  id="order_sources" class="form-control input-number" value="1" min="1"  max="100">
                                                            <span class="input-group-btn">
                                                                <button type="button" id="bata" class="btn btn-primary btn-number" data-type="plus" data-field="order_sources">
                                                                    <span class="bx bx-plus"></span>
                                                                </button>
                                                            </span>
                                                         </div>

                                                          
                                                       
                                                        </div>
                                                    </div>
    
                                                  
                                                      <div class="row mb-3">
                                                        <label class="col-sm-3 col-form-label" for="example-password">Pages</label>
                                                       
                                                          <div class="col-sm-5">
                                                           <div class="input-group">
                                                              <span class="input-group-btn">
                                                                  <button type="button" id="bata" class="btn btn-primary btn-number"  disabled="disabled" data-type="minus" data-field="order_pages">
                                                                      <span class="bx bx-minus"></span>
                                                                  </button>
                                                              </span>
                                                              <input type="text" name="order_pages" onchange="get_words(),get_tols()" id="pages" class="form-control input-number" value="1" min="1"  max="100">
                                                              <span class="input-group-btn">
                                                                  <button type="button" id="bata" class="btn btn-primary btn-number"  data-type="plus" data-field="order_pages">
                                                                      <span class="bx bx-plus"></span>
                                                                  </button>
                                                              </span>
                                                           </div>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <input type="text" id="words" value="275 words" class="form-control" name="order_words" placeholder="Words" readonly>
                                                        </div>
                                                       
                                                    </div>
                                                   
                                                    <div class="row mb-3">
                                                        <label class="col-sm-3 col-form-label" for="example-readonly">Paper Format</label>
                                                        <div class="col-sm-9">
                                                            <select class="form-select selector mb-3" id="order_format_id" name="order_format_id" onchange="get_tols()" required>
                                                                     <option value="" disabled selected hidden>Paper Format</option>
                                                                   
                                                                    <?php

                                                                                      foreach ($format->result_array() as $row)

                                                     

                                                                                        { ?>

                                                                                        <option  value="<?php echo $row['format_id']; ?>"><?php echo $row['format_name']; ?></option>

                                                                                   <?php } ?>
                                                                </select>
                                                        </div>
                                                    </div>
                                                   <!--  <div class="row mb-3">
                                                        <label class="col-sm-3 col-form-label" for="example-disable">File to upload</label>
                                                        <div class="col-sm-9">
                                                           <input type='file' name='files[]' multiple>
                                                        </div>
                                                    </div> -->
                                                   
                                                    <div class="row mb-3">
                                                        <label class="col-sm-3 col-form-label" for="example-disable">Academic Level</label>
                                                        <div class="col-sm-9">
                                                           <select class="form-select selector mb-3" name="order_level_id" id="level" onchange="get_tols()" required>

                                                                
                                                                
                                                                   <?php

                                                                    foreach ($level->result_array() as $row)

                                   

                                                                      { ?>

                                                                      <option  value="<?php echo $row['level_id']; ?>" <?php if($row['level_id']==3){ echo 'selected'; } ?>><?php echo $row['level_name']; ?></option>

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
                                                              <input class="form-control readonly" placeholder="Launch Calendar" onchange="get_tols()"  type="text" id="deadline" name="order_deadline_id" required />
                                                             </div>
                                                        </div>
                                                    </div>


                                                    <div class="row mb-3">
                                                        <label class="col-sm-3 col-form-label" for="example-palaceholder">Coupon</label>
                                                        <div class="col-sm-9">
                                                             <input type="text" onkeyup="get_tols()" onpaste="get_tols()" name="coupon" class="form-control mb-3" id="coupon" placeholder="Coupon (optional)">
                                                        </div>
                                                    </div>

                                                     <div class="row mb-3">
                                                        <label class="col-sm-3 col-form-label" for="example-palaceholder">Upload File(s)</label>
                                                        <div class="col-sm-9">
                                                          <div class="dropzone" id="myDropzone"></div>
                                                        </div>
                                                      </div>

                                                    <div class="row mb-3">
                                                        <label class="col-sm-3 col-form-label" for="example-palaceholder">Total (USD)</label>
                                                        <div class="col-sm-9">

                                                             <input style="border:none;background:white;font-size: 28px;font-weight: 600;" type="text"  min="0" name="order_amount" class="form-control mb-3" id="total" readonly>
                                                        </div>
                                                    </div>

                                                    

                                                     <div class="row mb-3">
                                                      <div class="col-sm-3">
                                                      </div>
                                                      <div class="col-sm-9">

                                                         <button style="width: 100%;" id="submit-all" type="submit" class="btn btn-warning px-5"><i class="bx bx-plus"></i> Place Order</button>

                                                        </div>


                                                     </div>



                                                </form>
                                            </div>
    
                                           
                                        </div>
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
                        
                   