<?php include 'header.php' ?>
<div class="content-page">
                <div class="content">
                    
                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                   
                                    <h4 class="page-title">Place Order</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">

                         <div class="col-md-9 offset-md-1">
                           <div class="card">

                               <div class="card-body">
                                    


                                       
                                        <div class="row">
                                            <div class="col-xl-9">
                                             <?php if(!empty($error)){ ?>

                                                 <div class="alert alert-warning">
                                                   <?php echo $error; ?>
                                                  </div>

                                               <?php     } ?>
                                            <form class="form-horizontal" method="post" action="<?php echo base_url() ?>admin/process_order_login_new" enctype="multipart/form-data">
                                                <div class="col-md-9 offset-md-3">
                                                  
                                                    </div>
                                                    <input type="hidden" name="service" value="1">
                                                    <div class="form-group row">
                                                        <label class="col-md-3 col-form-label" for="simpleinput">Title</label>
                                                        <div class="col-md-9">
                                                            <input type="text" id="simpleinput" class="form-control" name="order_title" placeholder="Title" required>
                                                        </div>
                                                    </div>
                                                     <div class="form-group row">
                                                        <label class="col-md-3 col-form-label" for="example-textarea">Description</label>
                                                        <div class="col-md-9">
                                                            <textarea class="form-control" rows="5" id="example-textarea" name="order_description" placeholder="Details"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 col-form-label" for="example-email">Discipline</label>
                                                        <div class="col-md-9">
                                                            <select id="discipline" class="form-control selector mb-3" name="order_discipline_id" onchange="get_other()" required>
                                                               
                                                                 <?php

                                                                  foreach ($discipline->result_array() as $row)         

                                                                    { ?>

                                                                    <option  value="<?php echo $row['discipline_id']; ?>"><?php echo $row['discipline_name']; ?></option>

                                                               <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                     <div class="form-group row">
                                                        <label class="col-md-3 col-form-label" for="example-email">Choose Writer</label>
                                                        <div class="col-md-9">
                                                            <select id="discipline" class="form-control selector mb-3" name="user_id" required>
                                                               
                                                                 <?php

                                                                  foreach ($writers->result_array() as $row)         

                                                                    { ?>

                                                                    <option  value="<?php echo $row['user_id']; ?>"><?php echo $row['user_fname']; ?></option>

                                                               <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row" id="other">
                                                       <!--  <label class="col-md-3 col-form-label" for="example-palaceholder">Other</label> -->
                                                        <div class="col-md-9 offset-md-3">
                                                            <input type="text" name="other" class="form-control" id="example-palaceholder" placeholder="other">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-md-3 col-form-label" for="example-password">Sources</label>
                                                        <div class="col-md-5">
                                                             
                                  
                                  

                                                             <div class="input-group">
                                                            <span class="input-group-btn">
                                                                <button type="button" id="bata" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="order_sources">
                                                                    <span class="fas fa-minus"></span>
                                                                </button>
                                                            </span>
                                                            <input type="text" name="order_sources" class="form-control input-number" value="1" min="1"  max="100">
                                                            <span class="input-group-btn">
                                                                <button type="button" id="bata" class="btn btn-primary btn-number" data-type="plus" data-field="order_sources">
                                                                    <span class="fas fa-plus"></span>
                                                                </button>
                                                            </span>
                                                         </div>

                                                          
                                                       
                                                        </div>
                                                    </div>

                                                     <div class="form-group row">
                                                        <label class="col-md-3 col-form-label" for="example-palaceholder">CPP</label>
                                                        <div class="col-md-9">
                                                             <input type="text" min="0" name="order_cpp" onkeyup="get_tolly()" class="form-control mb-3" id="cpp" placeholder="CPP in KES" required>
                                                        </div>
                                                    </div>
    
                                                  
                                                      <div class="form-group row">
                                                        <label class="col-md-3 col-form-label" for="example-password">Pages</label>
                                                       
                                                          <div class="col-md-5">
                                                           <div class="input-group">
                                                              <span class="input-group-btn">
                                                                  <button type="button" id="bata" class="btn btn-primary btn-number" onclick="get_words(),get_tolly()" disabled="disabled" data-type="minus" data-field="order_pages">
                                                                      <span class="fas fa-minus"></span>
                                                                  </button>
                                                              </span>
                                                              <input type="text"  name="order_pages" onchange="get_words(),get_tolly()" id="pages" class="form-control input-number" value="1" min="1"  max="100">
                                                              <span class="input-group-btn">
                                                                  <button type="button" id="bata" class="btn btn-primary btn-number" onclick="get_words(),get_tolly()" data-type="plus" data-field="order_pages">
                                                                      <span class="fas fa-plus"></span>
                                                                  </button>
                                                              </span>
                                                           </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <input type="text" id="words" value="275 words" class="form-control" name="order_words" placeholder="Words" readonly>
                                                        </div>
                                                       
                                                    </div>
                                                   
                                                    <div class="form-group row">
                                                        <label class="col-md-3 col-form-label" for="example-readonly">Paper Format</label>
                                                        <div class="col-md-9">
                                                            <select class="form-control selector mb-3" name="order_format_id" onchange="get_tols()" required>
                                                                     <option value="" disabled selected hidden>Paper Format</option>
                                                                   
                                                                    <?php

                                                                                      foreach ($format->result_array() as $row)

                                                     

                                                                                        { ?>

                                                                                        <option  value="<?php echo $row['format_id']; ?>"><?php echo $row['format_name']; ?></option>

                                                                                   <?php } ?>
                                                                </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 col-form-label" for="example-disable">File to upload</label>
                                                        <div class="col-md-9">
                                                           <input type='file' name='files[]' multiple>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 col-form-label" for="example-disable">Academic Level</label>
                                                        <div class="col-md-9">
                                                           <select class="form-control selector mb-3" name="order_level_id" id="level" required>

                                                                
                                                                
                                                                   <?php

                                                                    foreach ($level->result_array() as $row)

                                   

                                                                      { ?>

                                                                      <option  value="<?php echo $row['level_id']; ?>" <?php if($row['level_id']==3){ echo 'selected'; } ?>><?php echo $row['level_name']; ?></option>

                                                                 <?php } ?>
                                                              </select>
                                                        </div>
                                                    </div>
                                                      <div class="form-group row">
                                                        <label class="col-md-3 col-form-label" for="example-disable">Deadline</label>
                                                        <div class="col-md-9">
                                                            <select class="form-control selector mb-3" name="order_deadline_id" id="deadline" required>
                                                                     <option value="" disabled selected hidden>Deadline</option>
                                                                   
                                                                    <?php

                                                                                      foreach ($deadline->result_array() as $row)

                                                     

                                                                                        { ?>

                                                                                        <option  value="<?php echo $row['deadline_id']; ?>" <?php if($row['deadline_id']==1){ echo 'selected'; } ?>><?php echo $row['name']; ?></option>

                                                                                   <?php } ?>
                                                                </select>
                                                        </div>
                                                    </div>

                                                 <!--    <div class="form-group row">
                                                        <label class="col-md-3 col-form-label" for="example-palaceholder">Coupon</label>
                                                        <div class="col-md-9">
                                                             <input type="text" onkeyup="get_tols()" onpaste="get_tols()" name="coupon" class="form-control mb-3" id="coupon" placeholder="Coupon (optional)">
                                                        </div>
                                                    </div> -->


                                                    <div class="form-group row">
                                                        <label class="col-md-3 col-form-label" for="example-palaceholder">Total</label>
                                                        <div class="col-md-9">
                                                             <input type="text" min="0" name="order_amount" class="form-control mb-3" id="totally" placeholder="Total (KES)" readonly>
                                                        </div>
                                                    </div>
                                                     <div class="form-group row">
                                                      <div class="col-md-3">
                                                      </div>
                                                      <div class="col-md-9">

                                                         <button type="submit" class="btn btn-info waves-effect waves-light">Place Order</button>

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
                        
                    </div> <!-- end container-fluid -->

                </div> <!-- end content -->

                

                <!-- Footer Start -->
               
       <?php include 'footer.php'; ?>

       <script type="text/javascript">
         function get_tolly(){
              var pages=$("#pages").val();
              var cpp=$("#cpp").val();
              var total=cpp*pages;

              $('#totally').val(total);



         }

          function get_words(){

          var pages=$("#pages").val();
          var words=pages*275;
          $("#words").val(words+" words");


        }
       </script>
