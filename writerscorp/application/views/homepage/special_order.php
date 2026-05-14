<main id="content">
<div id="hero" class="section py-5 jarallax">
        <!-- background parallax -->
        
        <!-- background overlay -->
        <div class="overlay bg-primary opacity-90 z-index-n1"></div>

        <!-- rocket moving up animation -->
       

        <div class="container">
          <div class="row align-items-center justify-content-center">
            <!-- content -->
            <div class="col-lg-7">
              <br>
               <br>

              <div class="mt-0 pt-4 text-center">
                <h1 class="text-white text-shadow">Technical Order</h1>    
                <hr class="divider mt-4 mx-auto bg-warning border-warning">       
              </div>
            </div><!-- end content -->
          </div>
        </div>
      <div style="position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; overflow: hidden; z-index: -100;" id="jarallax-container-0"><img class="jarallax-img" src="src/img-min/bg/bg-planet.jpg" alt="title" style="object-fit: cover; object-position: 50% 50%; max-width: none; position: absolute; top: 0px; left: 0px; width: 1525px; height: 351.727px; overflow: hidden; pointer-events: none; transform-style: preserve-3d; backface-visibility: hidden; will-change: transform, opacity; margin-top: 15.1367px; transform: translate3d(0px, -86.3367px, 0px);"></div></div>
<div id="pricing" class="section pt-6 pt-md-7 pb-4 pb-md-5 bg-light">
        <div class="container">

          <div class="padding-top-large"></div>

        	
        	 
            <div class="row">
        	      <div class="col-lg-8">
                  <p class="lead mb-3 text-center">Place a technical order and get a quotation in minutes</p>
                  <div class="eldoret">
                    <div class="card">
                      <div class="card-body">

                      <div class="main-form">
                             <?php
                                 if($this->session->flashdata('warning')){
                                  ?>
                                    <div class="alert alert-warning">

                                       <?php echo $this->session->flashdata('warning'); ?>
                                      
                                    </div>
                             <?php    }


                               ?>

                                 <?php
                                 if(isset($error)){
                                  ?>
                                    <div class="alert alert-warning">

                                       <?php echo $error; ?>
                                      
                                    </div>
                             <?php    }


                               ?>
                     
                           <form action="<?php echo base_url() ?>client/special_first" method="post" id="zoney" enctype='multipart/form-data'>
                           
                                 <?php   
                                       if($this->uri->segment(3)){

                                               $affiliate=$this->uri->segment(3);
                                               $aff_id=$affiliate;



                                             


                                               

                                       }
                                     ?>
                                   <input type="hidden" class="form-control mb-3" value="<?php if(isset($aff_id)){  echo $aff_id; } ?>" name="affiliate">
                          

                           
                               

                                <div class="form-group">
                                    <input type="text" class="form-control mb-3" id="order_title" name="order_title" placeholder="Title" required>
                                </div>
                                 <div class="form-group">
                                    <textarea class="form-control mb-3" id="order_description" name="order_description" placeholder="Details" rows="5"></textarea>
                                </div>

                                 <div class="form-group">
                                    <div class="input-group mb-3">
                                   <div class="input-group-prepend">
                                      <span class="input-group-text" style="height: 48px;"><i class="fa fa-calendar"></i></span>
                                    </div>
                                   <input class="form-control readonly" placeholder="Deadline"  type="text" id="deadline" name="order_deadline_id" required />
                                  
                                  </div>

                                  <input type="hidden" name="order_tz" value=""  id="tz">

                                    
                                </div>
                  
                             
                              
                                 <div class="form-group">
                                    <div class="dropzone" id="myDropzonespecial">
                                    </div>
                                 </div>

                               
                                 <div class="col-md-12 sub-col-right">
                                   
                                      <h5 class="text-default text-center mb-0"> - PERSONAL INFORMATION - </h5> 
                                      <br>
                                </div>
                                  
                                    
                                    
                                  
                                 <div class="row form-group">
                                    <div class="col-md-6">
                                       <input type="text" class="form-control  mb-3" id="user_fname"  name="user_fname" placeholder="First Name" required>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control  mb-3" id="user_lname"  name="user_lname" placeholder="Surname (optional)">
                                    </div>
                                 </div>
                                 
                                    <div class="row form-group">

                                       <div class="col-md-6">   
                                        <input type="email" class="form-control mb-3" id="user_email" name="user_email" placeholder="Your email" required>
                                      </div>
                                         <div class="col-md-6">
                                        <input type="number" class="form-control mb-3" id="user_phone" name="user_phone" placeholder="Your Phone(Optional)">
                                       </div>
                                    </div>
                                  <div class="row form-group">

                                    <div class="col-md-6">
                                       <input type="password" class="form-control  mb-3" id="new_password"  name="password" placeholder="Password" required>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="password" class="form-control  mb-3" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required>
                                    </div>
                                  </div>
                                    <div class="form-group">
                                     <div class="g-recaptcha" data-sitekey="6LdVpcgZAAAAAKXFlnZb259PNT4YoZpAHACYgRLu"></div>
                                    </div>
                                  <button  type="submit" id="submit-all" class="btn btn-warning btn-lg"><i class="fa fa-shopping-cart"></i> ORDER NOW</button>
                     
                           </form>

                            <!-- / text-center
                         
                        </div><!-- / form-wrapper -->
                    </div><!-- / custom-form -->
                  </div>   
                 </div>   
                </div><!-- / column -->
              </div>
              <div class="col-lg-4">
                  <?php include 'sidebar_order.php'; ?>
              </div>
            </div>
           
            


       
</div>
 </div>
</main>
  