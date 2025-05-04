<?php include 'header.php' ?>
<div class="content-page">
                <div class="content">
                    
                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                   
                                    <h4 class="page-title">Change Password</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">

                         <div class="col-md-9 offset-md-1">


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
              <h3 class="box-title">Change Password</h3>
            </div>

          

                      <!--No Label Form-->

                      <!--===================================================-->

                      
           <form action="<?php echo base_url('admin/change_password_process') ?>" method="post" style="padding-bottom: 30px;">

                <div class="box-body">
                                 
                                

                                                    
                            <!-- Tab panes -->
                                 
                                  

                              


                                  <div class="form-group">
                                   
                                      
                                        
                                        <label for="inputEmail" class="col-xl-8 form-control-label">Current Password</label>
                                       
                                        <input class="form-control" value="" name="old_password" id="title"  type="text" required>
                                        
                                        
                                        
                                  </div>

                                    <div class="form-group">
                                   
                                      
                                        
                                        <label for="inputEmail" class="col-xl-8 form-control-label">New Password</label>
                                       
                                        <input class="form-control" value="" name="new_password" id="title"  type="text" required>
                                        
                                       
                                        
                                  </div>
                                   

                                
                                    
                                 
                                 
                                    
                                   

                                  
                                    
                                                                       
                               

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

        



        <!-- FOOTER -->

        <!--===================================================-->

       <?php include 'footer.php'; ?>
         <script type="text/javascript">

       
       $(document).ready(function() {
          $('.js-example-basic-multiple').select2();
        });

     // $("#countrylist option[value=<?php //echo $country; ?>]").prop("selected", "selected");

      </script>
       <script type="text/javascript">

      $("#countrylist option[value=<?php echo $country; ?>]").prop("selected", "selected");

      </script>

