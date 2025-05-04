<?php include 'header.php' ?>
<div class="content-wrapper">
  <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></li>
            <li class="active">Send Message to Support</li>
        </ol>    
  </section>
 

   <br>
    <br>
    
  
  <div class="container-fluid">
    <div class="col-md-7 col-md-offset-2">
   
    
     
            <div class="box box-default">
                    

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

           <div class="box-header with-border">
              <h3 class="box-title">Send Message to support</h3>
            </div>

          

                      <!--No Label Form-->

                      <!--===================================================-->

                      
           <form action="<?php echo base_url('writer/send_message') ?>" method="post">

             <div class="box-body">
                                 
                                

                                                    
                            <!-- Tab panes -->

                                 
                                  

                                <div class="form-group">
                                  
                                      
                                        <label for="inputEmail">Choose Support Officer</label>
                                       
                                          <select name="user_id" class="form-control" id="countrylist" required>
                                           
                                            <?php
                                             foreach ($a->result() as $row)
                                              {  ?>
                                                <option value="<?php echo $row->user_id; ?>"><?php echo $row->role_name; ?></option>
                                              <?php } ?>
                                            </select>
                                        
                                  </div>



                                  <div class="form-group">
                                   
                                      
                                        
                                        <label for="inputEmail" class="col-xl-8 form-control-label">Subject</label>
                                        <div class="col-xl-10">
                                            <input class="form-control" value="" name="subject" id="title"  type="text" required>
                                        </div>
                                        
                                        
                                  </div>
                                   

                                  <div class="form-group">
                                    
                                       
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

