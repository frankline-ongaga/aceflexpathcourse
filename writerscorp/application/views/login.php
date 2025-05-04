<?php include(dirname(__FILE__)."/../header.php"); ?>


         <section id="values" class="" style="background-color: #ffffff">
         <div class="container " >
            <div class="row">
               <div class="col-lg-3">
               </div>
               <div class="col-lg-8 inner-right-md ">
                
                  <section id="contact-form" style="padding-top: 20px">
                     <h2 style="margin-bottom:-30px;">Login to access our prediction analysis</h2>
                     <hr style="width: 50%; ">
                     <?php
                       if(isset($error_message))
                       {
                        ?>
                        <p class="orange">Wrong username or password or You aren't subscribed to this service</p>
                      
                       <?php
                         }
                       ?>

                       <?php
                       if(isset($message_display))
                       {
                        ?>
                        <p class="orange"><?php echo $message_display; ?></p>
                      
                       <?php
                         }
                       ?>
                     <form id="contactform" class="forms" action="<?php echo base_url('betting/client_login_process');?>" method="post">
                        <div class="row" style="margin-top: -12px;">
                           <div class="col-md-6"><input type="text" name="phoneno" required class="form-control" placeholder="Phone Number/email (Paypal)"></div>
                        </div>
                        <div class="row">
                           <div class="col-md-6"><input type="password" name="password" class="form-control" placeholder="your password"></div>
                        </div>
                        
                      

                      
                        <button type="submit" class="btn btn-submit btn-block">Login</button>
                        
                         <a href="<?php echo base_url('betting/reset_password');?>" class="btn btn-small btn-orange">Forgot Password?</a>
                     </form>
                     <div id="response"></div>
                  </section>
                 
               </div>
               <div class="col-lg-1">
                 
               </div>
            </div>
         </div>
      </section>
   <?php include(dirname(__FILE__)."/../header.php"); ?>
