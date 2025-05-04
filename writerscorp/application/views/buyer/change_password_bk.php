 <?php include 'header.php'; ?>
  <div class="page light">
            <div class="content-wrapper animatedParent animateOnce">
                <div class="container">
                  <div class="row">
                  <div class="col-md-3">
                    <section class="p-t-17">
                        <?php include 'buyer_menu.php' ?>
                      </section>
                  </div>
                  <div class="col-md-9" style="background: white;">
                      <section class="p-t-20">
                       
                      
                        <legend class="text-center" style="width:83%;">Change Password <br>

                       <!--    <small style="font-size: 12px;">Complete and submit the form below for assessment </small> -->

                        </legend>
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
                            <form action="<?php echo base_url('buyer/change_password_process') ?>" method="post" style="padding-bottom: 30px;">
                                 
                                

                                                    
                            <!-- Tab panes -->
                                 
                                  

                              


                                  <div class="form-group">
                                    <div class="row">
                                      
                                        
                                        <label for="inputEmail" class="col-xl-8 form-control-label">Current Password</label>
                                        <div class="col-xl-10">
                                            <input class="form-control" value="" name="old_password" id="title"  type="text" required>
                                        </div>
                                        </div>
                                        
                                  </div>

                                    <div class="form-group">
                                    <div class="row">
                                      
                                        
                                        <label for="inputEmail" class="col-xl-8 form-control-label">New Password</label>
                                        <div class="col-xl-10">
                                            <input class="form-control" value="" name="new_password" id="title"  type="text" required>
                                        </div>
                                        </div>
                                        
                                  </div>
                                   

                                
                                    
                                 
                                 
                                    
                                   

                                  
                                    
                                                                       
                               

                                 <div class="form-group">
                                    <div class="row">

                                   <div class="col-xl-10">
                                <input type="submit" style="color:#fff;" name="submit" class="submit btn btn-primary btn-md" value="Change Password" />
                                  </div>
                                 </div>
                                </div>
                               

                              
                                 
                            </form>
                         

                        </div>
                     </section>   
                    </div>
                </div>
            </div>
        </div>
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


    