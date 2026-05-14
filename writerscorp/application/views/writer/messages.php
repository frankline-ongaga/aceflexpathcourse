<?php include 'header.php'; ?>

<div class="content-wrapper">
  <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></li>
            <li class="active">Conversation</li>
        </ol>    
  </section>
 

   <br>
    <br>
    
  
  <div class="container-fluid">
   
     
         <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Conversation <span style="font-size: 16px"> <?php if(isset($subject)){ echo $subject; }   ?></span></h3>

                    </div>
          <div class="box-body">
                      
                     
                           
                             
                           
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

                                         
                                         if($message['sender_id']!=$user_id) {

                                          ?>
                                        <div class="incoming_msg">
                                          <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                          <div class="received_msg">
                                            <div class="received_withd_msg">
                                              
                                              <p><?php  echo $message['body'];   ?></p>
                                              <span class="time_date"> <?php  include 'message_time.php';   ?>    |    #<?php  echo $message['sender_id'];   ?></span></div>
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
                                            <span class="time_date"> <?php  include 'message_time.php';   ?>    |    Me</span> </div>
                                        </div>
                                         <?php } ?>
                                          
                                           <?php 

                                                $id=$message['id']; 

                                             } }?>           
                            
                                    </div>
      
                          </div>




                         

                         
                           






                     </div>
                    </div>
                  
                   <div class="container">
                     <form  method="post" action="<?php  echo base_url('writer/reply'); ?>">
                            <input type="hidden" name="message_id" value="<?php echo $id ?>">
                             <input type="hidden" name="sender_id" value="<?php echo $user_id ?>">
                              <input type="hidden" name="thread" value="<?php echo $this->uri->segment(3); ?>">
                             <br>   <br>
                            
                            <div class="form-group text-center">
                              <textarea style="width: 80%;" id="messagebox" onblur="checkWords()" onkeyup="checkWords()" class="form-control" name="body"  rows="5" placeholder="Say something..."></textarea>
                              
                           </div>
                            <div id="warning" style="color:red;"></div>
                            <div class="form-group">
                             <button type="submit" class="btn btn-success btn-lg">Reply</button>                           
                           </div>

                          </form>
                      </div>
                     
                   </section>
                </div>
        </div>
      </div>
<?php include 'footer.php'; ?>  

  <script>
      function checkWords() {
        var my_textarea = document.getElementById('messagebox').value;
        var pattern = /contact|sms|mail|email|@|call|chat|skype|zoom|phone|message|whatsapp|telegram|paypal|text|number|mobile/ig;
        
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