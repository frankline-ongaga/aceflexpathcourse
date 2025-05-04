<div class="page-wrapper">
      <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
          <div class="breadcrumb-title pe-3">Change Password</div>
          <div class="ps-3">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Change Password</li>
              </ol>
            </nav>
          </div>
         
        </div>
        <!--end breadcrumb-->
        <div class="row">
          <div class="col-xl-9 mx-auto">
            <h6 class="mb-0 text-uppercase">Change Password</h6>
            <hr/>
              <div class="card">
                 <div class="card-body">
   
    
     
            <div class="box box-success">
                    

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

             <?php 
                    if(isset($sucess))
                    {
                      ?>
                      <div class="alert alert-success">
                      <?php
                         echo $sucess;
                      ?>
                      </div>
                    <?php

                    }


                  ?>

                    <?php 
                    if(isset($fail))
                    {
                      ?>
                      <div class="alert alert-warning">
                      <?php
                         echo $fail;
                      ?>
                      </div>
                    <?php

                    }


                  ?>

           <div class="box-header with-border">
             
            </div>

          

                      <!--No Label Form-->

                      <!--===================================================-->

                      
           <form action="<?php echo base_url('client/change_password_process') ?>" method="post" style="padding-bottom: 30px;">

                <div class="box-body">
                                 
                                

                                                    
                            <!-- Tab panes -->
                                 
                                  

                              


                                  <div class="form-group">
                                   
                                      
                                        
                                        <label for="inputEmail" class="col-xl-8 form-control-label">Current Password</label>
                                        <br>
                                        <input class="form-control" value="" name="old_password" id="title"  type="text" required>
                                        
                                        
                                        
                                  </div>
                                  <br>

                                    <div class="form-group">
                                   
                                      
                                        
                                        <label for="inputEmail" class="col-xl-8 form-control-label">New Password</label>
                                        <br>
                                       
                                        <input class="form-control" value="" name="new_password" id="title"  type="text" required>
                                        
                                       
                                        
                                  </div>
                                  <br>
                                   

                                
                                    
                                 
                                 
                                    
                                   

                                  
                                    
                                                                       
                               

                                 <div class="form-group">
                                   
                                <input type="submit" style="color:#fff;" name="submit" class="submit btn btn-primary btn-md" value="Change Password" />
                                  
                                </div>
                               

                               </div> 
                                 
                            </form>

                      <!--===================================================-->

                      <!--End No Label Form-->

          

                  </div>




            

            <!--===================================================-->

            <!--END MAIN NAVIGATION-->


       </div>
    </div>

</div>
</div>
</div>
</div>

        



       