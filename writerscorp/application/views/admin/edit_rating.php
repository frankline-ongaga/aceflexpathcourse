<?php include 'header.php' ?>
<div class="content-page">
                <div class="content">
                    
                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                   
                                    <h4 class="page-title">Edit Rating</h4>
                                </div>
                            </div>
                        </div>     
  <section class="content">

           <div class="row">

              <div class="col-md-7 offset-md-2">
                  <div class="card">

                               <div class="card-body">

                <div class="box box-success">
                     
                      <!-- /.box-header -->
                      
                        <?php 


                          foreach ($d->result() as $row) {
                            $order_id=$row->order_id;
                            # code...
                         

                        ?>
                        <strong><i class="fa fa-book margin-r-5"></i> Title</strong>

                        <p class="text-muted">
                           <?php if(isset($row->order_title)){ echo $row->order_title;  } else { echo '__'; } ?>
                        </p>

                        <hr>

                        <strong><i class="fa fa-edit margin-r-5"></i> Description</strong>

                        <p class="text-muted">
                           <?php if(isset($row->order_description)){ echo $row->order_description;  } else { echo '__'; } ?>
                        </p>

                         <hr>

                       

                       
                       

                      




                          <div id="tot">

                       

                       
                            <h4>Rate this paper</h4>
                        
                          <!--   <div class="rate container">
                             
                              <input type="radio" class="ratey" id="star5" name="rate" value="5" />
                              <label for="star5" title="text">5 stars</label>
                              <input type="radio" class="ratey" id="star4" name="rate" value="4" />
                              <label for="star4" title="text">4 stars</label>
                              <input type="radio" class="ratey" id="star3" name="rate" value="3" />
                              <label for="star3" title="text">3 stars</label>
                              <input type="radio" class="ratey" id="star2" name="rate" value="2" />
                              <label for="star2" title="text">2 stars</label>
                              <input type="radio" class="ratey" id="star1" name="rate" value="1" />
                              <label for="star1" title="text">1 star</label>


                             
                            </div> -->
                           <?php if(isset($row->order_rating)){

                                        //  $average=3.9;
                                           $average= round($row->order_rating * 2) / 2;

                                         

                                      

                                        // $average=0;


                                        ?>


                                         <fieldset class="rating" id="oya" style="min-height: 10px;">
                                          <input type="radio"  class="ratey" id="star5" name="rate" value="5"  <?php if($average==5){ echo "checked=''"; } ?>/>
                                          <label class = "full" for="star5" title="Awesome - 5 stars"></label>
                                          <input type="radio"  class="ratey" id="star4half" name="rate" value="4 and a half" <?php if($average==4.5){ echo "checked=''"; } ?> /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                                          <input type="radio" id="star4" name="rate" value="4" <?php if($average==4){ echo "checked=''"; } ?> /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                                          <input type="radio" class="ratey" id="star3half" name="rate" value="3 and a half" <?php if($average==3.5){ echo "checked=''"; } ?> /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                                          <input type="radio" id="star3" name="rate" value="3" <?php if($average==3){ echo "checked=''"; } ?>/><label class = "full" for="star3" title="Meh - 3 stars"></label>
                                          <input type="radio" class="ratey" id="star2half" name="rate" value="2 and a half" <?php if($average==2.5){ echo "checked=''"; } ?>/><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                                          <input type="radio" class="ratey" id="star2" name="rate" value="2" <?php if($average==2){ echo "checked=''"; } ?> /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                                          <input type="radio" class="ratey" id="star1half" name="rate" value="1 and a half" <?php if($average==1.5){ echo "checked=''"; } ?> /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                                          <input type="radio" class="ratey" id="star1" name="rate" value="1" <?php if($average==1){ echo "checked=''"; } ?> /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                                          <input type="radio" class="ratey" id="starhalf" name="rate" value="half" <?php if($average==0.5){ echo "checked=''"; } ?> /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                                      </fieldset> <br><br>
                         
                            
                          </div>
                         
                           <?php }


                             ?>
                             <div id="lynn">

                         <form id="sunguch">
                          <br>

                         <small>Leave a Comment</small>
                          <textarea class="form-control" name="comment" id="naliaka"  rows="4" cols="50" required><?php if(isset($row->order_rating_comment)){ echo $row->order_rating_comment;  } else { echo '__'; } ?></textarea> 
                          <br>
                          <button type="submit" id="ham" class="btn btn-success">Submit</button>
                          </form>
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

                      <?php } ?>

                      






                        


                        


                       

                      
                      </div>
                      <!-- /.box-body -->
                    </div>

                  </div>

                </div>

                



              </div>

        




    


             

              </div>
  </section>
</div>





       


        



        <!-- FOOTER -->

        <!--===================================================-->

       <?php include 'footer.php'; ?>

       <script type="text/javascript">
  
  $(".ratey").click(function(e){

  

  var ra=$(this).val();
  var order_id=<?php echo $order_id;  ?> ;
  $.ajax({

    url: "<?php echo base_url('client/rate_writer') ?>", 
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

    url: "<?php echo base_url('client/comment_writer') ?>", 
    data:{ comment: com,order_id: order_id}, 
    type:'POST', 

    success: function(result){
    $("#lynn").hide();
    $("#letisha").show();
  }});

});
</script>
     