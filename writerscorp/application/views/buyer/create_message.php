<div class="page-wrapper">
      <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
          <div class="breadcrumb-title pe-3">Create Message</div>
          <div class="ps-3">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Create Message</li>
              </ol>
            </nav>
          </div>
         
        </div>
        <!--end breadcrumb-->
        <div class="row">
          <div class="col-xl-9 mx-auto">
            <h6 class="mb-0 text-uppercase">Message Support</h6>
            <hr/>
              <div class="card">
                 <div class="card-body">
                                           
                                             <?php 
                                     if(isset($success))
                                     {
                                      ?>
                                      <div class="alert alert-success">
                                       <?php
                                        echo $success;
                                        ?>
                                       </div>
                                       <?php
                                     }

                                   ?>
                                        <h4 class="header-title">Message Support</h4> <br>
                                       
                                        <div class="row">
                                            <div class="col-xl-9">
                                             <?php if(!empty($error)){ ?>

                                                 <div class="alert alert-warning">
                                                   <?php echo $error; ?>
                                                  </div>

                                               <?php     } ?>
                                             <form action="<?php echo base_url('client/send_message') ?>" method="post">

             <div class="box-body">
                                 
                                

                                                    
                            <!-- Tab panes -->

                                 
                                  

                               
                                           
                                            <?php
                                             foreach ($a->result() as $row)
                                              {  ?>
                                                <input type="hidden" value="<?php echo $row->user_id; ?>" name="user_id" /> 
                                              <?php } ?>
                                           



                                  <div class="row mb-3">
                                   
                                      
                                        
                                        <label for="inputEmail" class="col-xl-8 form-control-label">Subject</label>
                                        <div class="col-xl-10">
                                            <input class="form-control" value="" name="subject" id="title"  type="text" required>
                                        </div>
                                        
                                        
                                  </div>
                                   

                                  <div class="row mb-3">
                                    
                                       
                                        <label for="inputEmail" class="col-xl-8 form-control-label">Message</label>
                                        <div class="col-xl-10">
                                            <textarea rows="7" class="form-control" value="" name="message" id="title"  type="text" required></textarea>
                                        </div>
                                     
                                        
                                     
                                    
                                  </div>
                                    
                                 
                                 
                                    
                                   

                                  
                                    
                                                                       
                               

                                 <div class="form-group">
                                   
                                   <div class="col-xl-10">
                                     <input type="submit" style="color:#fff;" name="submit" class="submit btn btn-primary btn-md" value="Send Message" />
                                    </div>
                                 
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
               
      