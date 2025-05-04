<?php include 'header.php' ?>
<div class="content-page">
                <div class="content">
                    
                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                   
                                    <h4 class="page-title">Send Emails to Clients </h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">

                         <div class="col-md-9 offset-md-1">
                           <div class="card">

                               <div class="card-body">
        <?php 
            if(isset($success))
              { ?>
              <div class="alert alert-success" style="text-align:center">
                <?php
                  echo $success;
                ?>
               </div>
            <?php
             
              }  
              ?>
                
          
                      <!--No Label Form-->
                      <!--===================================================-->
                      <form class="form-horizontal" method="post" action="<?php echo base_url('admin/send_client_emails'); ?>">
                          <div class="panel-body">
                            
                              <div class="row">
                                  <div class="col-md-8 mar-btm">
                                    <label class="control-label">Subject</label>
                                  
                                       <input type="text" name="subject" class="form-control"  required>
                                  </div>
                                  
                              </div>
                               <div class="row">
                                  <div class="col-md-8 mar-btm">
                                    <label class="control-label">Message</label>
                                      <textarea name="message" class="form-control" rows="8" placeholder="Message" required></textarea>
<!--                                       <input type="password" name="password" class="form-control" placeholder="Password" required>
 -->                                  </div>
                                  
                              </div>
                               
                             

                               

                               
                             
                          </div>
                          <br>
                          <div class="panel-footer text-left">
                              <button class="btn btn-primary">Send Emails</button>
                          </div>
                      </form>
                      <!--===================================================-->
                      <!--End No Label Form-->
          
                  </div>
              </div>
          </div>

        </div>
  
              </div>
          
          
          
              
                </div>
                <!--===================================================-->
                <!--End page content-->

           
            <!--===================================================-->
            <!--END CONTENT CONTAINER-->


            
            <!--ASIDE-->
            <!--===================================================-->
          
           
            <!--===================================================-->
            <!--END ASIDE-->

            
            <!--MAIN NAVIGATION-->
            <!--===================================================-->
          
            <!--===================================================-->
            <!--END MAIN NAVIGATION-->


</div>
        

        <!-- FOOTER -->
        <!--===================================================-->
       <?php include 'footer.php'; ?>