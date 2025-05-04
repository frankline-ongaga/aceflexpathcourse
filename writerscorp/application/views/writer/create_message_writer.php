<?php include 'header.php' ?>
<div class="content-wrapper">
  <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></li>
            <li class="active">Message Client</li>
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
            <div class="alert alert-info">
                                    <p>Disclaimer! Do not share personal information with anyone, this is against our terms and conditions.</p>

            </div>

           <div class="box-header with-border">
              <h3 class="box-title">Message Client</h3>
            </div>
                            <form action="<?php echo base_url('writer/send_message') ?>" method="post">

                                 <div class="box-body">
                                 
                                

                                                    
                            <!-- Tab panes -->

                                 
                                  

                                <div class="form-group">
                                  
                                      
                                         <div class="col-xl-10">
                                          <input type="hidden" name="user_id"  value="<?= $user_id ?>">

                                          </div>
                                        
                                  </div>



                                  <div class="form-group">
                                   
                                      
                                        
                                        <label for="inputEmail" class="col-xl-8 form-control-label">Order</label>
                                        <div class="col-xl-10">
                                            <input class="form-control" value="<?= $order_id ?>" name="subject" id="title"  type="text" readonly>
                                        </div>
                                        
                                        
                                  </div>
                                   

                                  <div class="form-group">
                                    
                                       
                                        <label for="inputEmail" class="col-xl-8 form-control-label">Message</label>
                                        <div class="col-xl-10">
                                            <textarea rows="7" class="form-control"  onblur="checkWords()"  onkeyup="checkWords()" value="" name="message" id="messagebox"  type="text" required></textarea>
                                        </div>
                                        <div class="col-xl-10">
                                          <div id="warning" style="color:red;"></div>
                                        </div> 
                                     
                                        
                                     
                                    
                                  </div>
                                    
                                 
                                 
                                    
                                   

                                  
                                    
                                                                       
                               

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

                              


                         
                           
                          
                      
                        <!--- end row -->

                       
                        <!-- end row -->

                       
                        <!-- end row -->

                       
                        <!-- end row -->

                      
                        <!-- end row -->


                       
                        <!-- end row -->  
                        
                   <!-- end container-fluid -->

                </div> <!-- end content -->

                

                <!-- Footer Start -->
               
       <?php include 'footer.php'; ?>

        <script>
      function checkWords() {
        var my_textarea = document.getElementById('messagebox').value;
        var pattern = /contact|mail|email|@|call|chat|skype|zoom|phone|message|whatsapp|telegram|paypal|text|number|mobile|sms/ig;
        
        if (my_textarea.match(pattern)) {
          //alert("Sharing of personal details is against our terms of use.");
         //  $('<p>Sharing of personal details is against our terms of use</p>').appendTo('#warning');

           $("#warning").html("<p>Sharing of personal details is against our terms of use, this message will not be sent.</p>");

          $(':input[type="submit"]').prop('disabled', true);
         // my_textarea = my_textarea.replace(pattern, "****" );
         // document.getElementById('messagebox').value = my_textarea;
        }
        else
        {
            $("#warning").html("");
            $(':input[type="submit"]').prop('disabled', false);

        }
        
      }
    </script>