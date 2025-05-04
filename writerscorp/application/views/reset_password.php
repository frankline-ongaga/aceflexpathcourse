<?php 
include('header.php');
?>
 <section id="values" class="" style="background-color: #ffffff">
         <div class="container " >
            <div class="row">
               <div class="col-lg-3">
               </div>
               <div class="col-lg-8 inner-right-md ">
                
                  <section id="contact-form" style="padding-top: 20px; margin-bottom: 35px">
                     <h2 style="margin-bottom:-30px;">Reset your Betstadia Password</h2>
                     <hr style="width: 50%; ">
                     <?php
                       if(isset($error_message))
                       {
                        ?>
                        <p class="orange">Wrong username or password or You aren't subscribed to this service</p>
                      
                       <?php
                         }
                       ?>
                     <form id="contactform" class="forms" action="<?php echo base_url('betting/login_process');?>" method="post">
                        <div class="row" style="margin-top: -12px; ">
                           <div class="col-md-6"><input type="text" name="username" required class="form-control" placeholder="Phone Number"></div>
                        </div>
                       
                        
                      

                      
                        <button type="submit" class="btn btn-submit btn-block">Reset Password</button>
                        
                         
                     </form>
                     <div id="response"></div>
                  </section>
                 
               </div>
               <div class="col-lg-1">
                 
               </div>
            </div>
         </div>
      </section>

</div>



<?php
include('footer.php');
?>