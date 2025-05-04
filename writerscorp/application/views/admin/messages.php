 <?php include 'header.php' ?>
<div class="content-page">
                <div class="content">
                    
                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                   
                                    <h4 class="page-title">Conversation <span style="font-size: 16px"> #<?php if(isset($subject)){ echo $subject; }   ?></h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">

                         <div class="col-md-9 offset-md-1">
                           <div class="card">

                                <div class="card-body">

                                      <div class="container-flude">
      
                            <?php 
                                   if(!empty($not))
                                   { ?>
                                      <div class="alert alert-success">
                                         <?php echo $not; ?>
                                       </div>
                                      <?php

                                   }

                                ?>

                                    <div class="mesgs">

                                      <div class="msg_history">
                                         <?php
                                           if(!empty($messages)){
                                        
                                        foreach ($messages as $message)
                                        {   

                                          $id=$message['id']; 

                                         
                                         if($message['sender_id']!=$user_id) {

                                          ?>
                                        <div class="incoming_msg">
                                          <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                          <div class="received_msg">
                                            <div class="received_withd_msg">
                                              
                                              <p><?php  echo $message['body'];   ?></p>
                                              <span class="time_date"> <?php  include 'message_time.php';   ?>    |    <?php  echo $message['user_lname'];   ?></span></div>
                                          </div>
                                        </div>
                                         <?php

                                            }
                                            else
                                            {

                                        ?>
                                        <div class="outgoing_msg">
                                          <div class="sent_msg">
                                          
                                            <p><?php  echo $message['body'];   ?></p>
                                            <span class="time_date"> <?php  include 'message_time.php';   ?>    |    <?php  echo $message['user_lname'];   ?></span> </div>
                                        </div>
                                         <?php } ?>
                                          
                                           <?php 

                                                

                                             } }?>           
                            
                                    </div>
      
                          </div>



                     <div class="container">
                     <form  method="post" action="<?php  echo base_url('admin/reply'); ?>">
                            <input type="hidden" name="message_id" value="<?php echo $id ?>">
                             <input type="hidden" name="sender_id" value="<?php echo $user_id ?>">
                              <input type="hidden" name="thread" value="<?php echo $this->uri->segment(3); ?>">
                             <br>   <br>
                            
                            <div class="form-group text-center">
                              <textarea style="width: 80%;" class="form-control" name="body"  rows="5" placeholder="Say something..."></textarea>
                              
                           </div>
                            <div class="form-group">
                             <button type="submit" class="btn btn-success btn-lg">Reply</button>                           
                           </div>

                          </form>
                      </div>




                          </div>

    
                                 </div>

                            </div>


                          </div>
                           
                          
                        </div>
                        <!--- end row -->

                       
                        <!-- end row -->

                       
                        <!-- end row -->

                       
                        <!-- end row -->

                      
                        <!-- end row -->


                       
                        <!-- end row -->  
                        
                    </div> <!-- end container-fluid -->

                </div> <!-- end content -->

                

                <!-- Footer Start -->
               
       <?php include 'footer.php'; ?>