<div class="page-wrapper">
      <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
          <div class="breadcrumb-title pe-3">Chat</div>
          <div class="ps-3">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Chat</li>
              </ol>
            </nav>
          </div>
         
        </div>
        <!--end breadcrumb-->
        <div class="row">
          <div class="col-xl-9 mx-auto">
             <h4 class="page-title">Conversation <span style="font-size: 16px"> <?php if(isset($subject)){ echo $subject; }   ?></h4>
            <hr/>
              <?php 
                                   if(!empty($not))
                                   { ?>
                                       <div class="alert alert-success border-0 bg-success alert-dismissible fade show py-2">
                                          <div class="d-flex align-items-center">
                                            <div class="font-35 text-white"><i class="bx bxs-check-circle"></i>
                                            </div>
                                            <div class="ms-3">
                                              <h6 class="mb-0 text-white">Success</h6>
                                          <div class="text-white"><?php echo $not; ?> </div>
                                       </div>
                              </div>
                              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                                      <?php

                                   }

                                ?>
              <div class="card">
                 <div class="card-body">

                           
                <!-- Footer Start -->

          <div class="chat-content ps ps--active-y">

                <?php
                          if(!empty($messages)){
                            foreach ($messages as $message)
                            {   

                             
                             if($message['sender_id']!=$user_id) {

                              ?>
            <div class="chat-content-leftside">
              <div class="d-flex">
                 <img src="<?php echo base_url('adminassets/images/avatar.png') ?>" class="rounded-circle" alt="" width="50" height="50">
                <div class="flex-grow-1 ms-2">
                  <p class="mb-0 chat-time">#<?php  echo $message['sender_id'];   ?>, <?php  include 'message_time.php';   ?></p>
                  <p class="chat-left-msg"><?php  echo $message['body'];   ?></p>
                </div>
              </div>
            </div>
             <?php
                                            }
                                            else
                                            {

                                        ?>

            <div class="chat-content-rightside">
              <div class="d-flex ms-auto">
                <div class="flex-grow-1 me-2">
                  <p class="mb-0 chat-time text-end">Me ,<?php  include 'message_time.php';   ?></p>
                  <p class="chat-right-msg"><?php  echo $message['body'];   ?></p>
                </div>
              </div>
            </div>
            <?php }
                 $id=$message['id']; 
             } }?>
           <form  method="post" action="<?php  echo base_url('client/reply'); ?>">
          <div class="chat-footer d-flex align-items-center">
           
                            <input type="hidden" name="message_id" value="<?php echo $id ?>">
                             <input type="hidden" name="sender_id" value="<?php echo $user_id ?>">
                              <input type="hidden" name="thread" value="<?php echo $this->uri->segment(3); ?>">
            <div class="flex-grow-1 pe-2">
              <div class="input-group"> <span class="input-group-text"><i class="bx bx-smile"></i></span>
                <input type="text" name="body" class="form-control" placeholder="Type a message">
              </div>
            </div>
          
            <div class="chat-footer-menu"> 
              <input type="submit" value="send" class="btn btn-md btn-primary"/>
             
            </div>
            
          </div>
          </form>




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

              
    