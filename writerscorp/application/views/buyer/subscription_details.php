<?php include 'header.php'; ?>
 <div class="page light">
<div class="content-wrapper">
                <div class="container">
                   <div class="row">
                  <div class="col-md-3">
                    <section class="p-t-20">
                        <?php include 'buyer_menu.php' ?>
                      </section>
                  </div>
                  <div class="col-md-9 p-t-20">
                  
                        <div class="comments">
                            <ol class="comment-list">
                                <li id="comment-1" class="comment">
                                  <?php
                                    $order_id='';
                                    foreach ($d->result() as $row)
                                    {   
                                       $title=$row->order_title;
                                       $order_id=$row->order_id;
                                      ?>
                                    <ul class="comments-meta">
                                        <li style="font-weight: 400">Package Name</li>
                                       
                                    </ul>
                                    <div class="media-body description">
                                        <p><?php if(isset($row->order_title)) { echo $row->order_title;  }   ?></p>
                                    </div>
                                   
                                  
                              
                                
                                   
                                      <ul class="comments-meta">
                                        <li style="font-weight: 400">Expires In</li>
                                       
                                    </ul>
                                    <div class="media-body description">
                                      <?php if($row->payment_status==0) { ?>
                                        <p>__</p>
                                      <?php }else{ ?>
                                        <p><?php include 'time.php';   ?></p>
                                          <?php } ?>
                                    </div>
                                      <ul class="comments-meta">
                                        <li style="font-weight: 400">Payment Status</li>
                                       
                                    </ul>
                                    <div class="media-body description">
                                        <p><?php if($row->payment_status==1) { echo 'Paid';  } else { echo 'Not Paid'; }   ?>&nbsp; &nbsp;
                                          <?php if($row->payment_status==0) { ?>
                                          <a href="<?php echo base_url('buyer/complete_pending/').$this->uri->segment(3).'/'.$row->order_amount.'/'.$row->order_type; ?>"><button class="btn btn-success btn-sm">Complete Payment</button></a>
                                        <?php } ?>
                                        </p>
                                    </div>
                                   
                                  
                                </li>
                                <!-- #comment-## -->
                              
                                <!-- #comment-## -->
                              
                              
                            </ol>
                            <br>

                         <!--  <?php //if($row->order_status==1 and $row->order_paid_status==1) {  ?>
                             <!-- send message to writer -->
                           <!--  <strong>Send Message to writer regarding this particular order</strong>
                          <form  method="post" action="<?php  //cho base_url('buyer/send_message_to_writer'); ?>">
                          <!--   <input type="hidden" name="message_id" value="<?php //echo $id ?>"> -->
                            <!--  <input type="hidden" name="sender_id" value="<?php// echo $user_id ?>">
                            <input type="hidden" name="writer_id" value="<?php //echo $writer_id ?>">
                              <input type="hidden" name="subject" value="<?php //echo $title ?>">
                             <br>
                            
                            <div class="form-group">
                              <textarea  class="form-control" name="body"  rows="5"></textarea>
                              
                           </div>
                            <div class="form-group">
                             <button type="submit" class="btn btn-success btn-lg">Send Message</button>                           
                           </div>

                          </form> -->
                      

                       
                     <div id="tot">

                            <?php if($row->order_status==1  and $row->order_paid_status==1 and $row->rating<1 ) {  ?>

                       
                            <legend>Rate our work</legend>
                            <br>
                    
                           <fieldset class="rating" id="oya" style="min-height: 10px;">
                              <input type="radio" class="ratey" id="star5" name="rate" value="5" />
                              <label class = "full" for="star5" title="Awesome - 5 stars"></label>
                              <input type="radio"  class="ratey" id="star4half" name="rate" value="4 and a half" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                              <input type="radio" id="star4" name="rate" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                              <input type="radio" class="ratey" id="star3half" name="rate" value="3 and a half" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                              <input type="radio" id="star3" name="rate" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
                              <input type="radio" class="ratey" id="star2half" name="rate" value="2 and a half" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                              <input type="radio" class="ratey" id="star2" name="rate" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                              <input type="radio" class="ratey" id="star1half" name="rate" value="1 and a half" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                              <input type="radio" class="ratey" id="star1" name="rate" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                              <input type="radio" class="ratey" id="starhalf" name="rate" value="half" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                          </fieldset> <br><br>

                        </div>
                           
                         
                           <?php }  
                           if($row->order_status==1  and $row->order_paid_status==1 and $row->rating<1) {  ?>
                          <div id="lynn">

                         <form id="sunguch">

                         <small>Leave a Comment</small>
                          <textarea class="form-control" name="comment" id="naliaka"  rows="4" cols="50" required></textarea> 
                          <br>
                          <button type="submit" id="ham" class="btn btn-success">Submit</button>
                          </form>
                        </div>
                        <br>

                       <?php
                          }

                         } ?>

                       
                       </div>
                        <div id="hymn" style="display: none;">
                           <div class="alert alert-success">

                               Thank you for leaving a rating
                           </div>

                        </div>
                      
                         <div id="letisha" style="display: none;">
                           <div class="alert alert-success">

                               Thank you for leaving a comment
                           </div>

                        </div>


                        </div>
                       </div>
                    </div>
                </div>
            </div>
        </main>
<?php include 'footer.php'; ?>
<script type="text/javascript">
  
  $(".ratey").click(function(e){

  

  var ra=$(this).val();
  var order_id=<?php echo $order_id;  ?> ;
  $.ajax({

    url: "<?php echo base_url('buyer/rate_writer') ?>", 
    data:{ rating: ra,order_id: order_id}, 
    type:'POST', 

    success: function(result){
    $("#tot").hide();
    $("#hymn").show();
  }});

});
</script>

<script type="text/javascript">
  
  $("#ham").click(function(e){

     e.preventDefault();

  

  var com=$("#naliaka").val();
  var order_id=<?php echo $order_id;  ?> ;
  $.ajax({

    url: "<?php echo base_url('buyer/comment_writer') ?>", 
    data:{ comment: com,order_id: order_id}, 
    type:'POST', 

    success: function(result){
    $("#lynn").hide();
    $("#letisha").show();
  }});

});
</script>