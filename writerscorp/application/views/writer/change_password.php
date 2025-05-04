<?php include 'header.php' ?>
<div class="content-wrapper">
  <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></li>
            <li class="active">Change Password</li>
        </ol>    
  </section>
 

   <br>
    <br>
    
  
  <div class="container-fluid">
    <div class="col-md-7 col-md-offset-2">
   
    
     
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

                      
           <form action="<?php echo base_url('writer/change_password_process') ?>" method="post" style="padding-bottom: 30px;">

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

