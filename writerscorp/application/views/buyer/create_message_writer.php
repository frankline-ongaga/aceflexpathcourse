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
            <h6 class="mb-0 text-uppercase">Create Message</h6>
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
                                        <h4 class="header-title">Create Message</h4> <br>
                                       
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

                                 
                                  

                                <div class="form-group">
                                  
                                      
                                         <div class="col-xl-10">
                                          <input type="hidden" name="user_id"  value="<?= $user_id ?>">

                                          </div>
                                        
                                  </div>



                                  <div class="form-group">
                                   
                                      
                                        
                                        <label for="inputEmail" class="col-xl-8 form-control-label">Order</label>
                                        <br>
                                        <div class="col-xl-10">
                                            <input class="form-control" value="<?= $order_id ?>" name="subject" id="title"  type="text" readonly>
                                        </div>
                                        
                                        
                                  </div>
                                  <br>

                                  <div class="form-group">
                                    
                                       
                                        <label for="inputEmail" class="col-xl-8 form-control-label">Message</label>
                                        <br>
                                        <div class="col-xl-10">
                                            <textarea rows="7" class="form-control"  onblur="checkWords()"  onkeyup="checkWords()" value="" name="message" id="messagebox"  type="text" required></textarea>
                                        </div>
                                        <div class="col-xl-10">
                                          <div id="warning" style="color:red;"></div>
                                        </div> 
                                     
                                        
                                     
                                    
                                  </div>
                                    
                                 
                                 
                                    
                                   

                                  
                                <br>   
                                                                       
                               

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
               
     