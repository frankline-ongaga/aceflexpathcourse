<div class="page-wrapper">
      <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
          <div class="breadcrumb-title pe-3">Rate Writer</div>
          <div class="ps-3">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Rate Writer</li>
              </ol>
            </nav>
          </div>
         
        </div>
        <!--end breadcrumb-->
        <div class="row">
          <div class="col-xl-9 mx-auto">
            <h6 class="mb-0 text-uppercase">Rate Writer</h6>
            <hr/>
              <div class="card">
                 <div class="card-body">
                     
                      <!-- /.box-header -->
                      
                        <?php 


                          foreach ($h->result() as $row) {
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

                         <?php if($row->order_status==3 and $row->order_rating<1 ) {  ?>

                       
                            <h4>Rate this writer</h4>
                        
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
                           <fieldset class="rating" id="oya" style="min-height: 10px;">
                              <input type="radio"  class="ratey" id="star5" name="rate" value="5" />
                              <label class = "full" for="star5" title="Awesome - 5 stars"></label>
                              <input type="radio"  class="ratey" id="star4half" name="rate" value="4.5" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                              <input type="radio" id="star4" name="rate" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                              <input type="radio" class="ratey" id="star3half" name="rate" value="3.5" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                              <input type="radio" id="star3" name="rate" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
                              <input type="radio" class="ratey" id="star2half" name="rate" value="2.5" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                              <input type="radio" class="ratey" id="star2" name="rate" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                              <input type="radio" class="ratey" id="star1half" name="rate" value="1.5" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                              <input type="radio" class="ratey" id="star1" name="rate" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                              <input type="radio" class="ratey" id="starhalf" name="rate" value="0.5" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                          </fieldset> <br><br>
                         
                            
                          </div>
                         
                           <?php } 

                          if($row->order_status==3 and $row->order_rating_comment==NULL) {  ?>
                             <div id="lynn">

                         <form id="sunguch">
                          <br>

                         <small>Leave a Comment</small>
                          <textarea class="form-control" name="comment" id="naliaka"  rows="4" cols="50" required></textarea> 
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

                       <?php
                          }

                         } ?>






                        


                        


                       

                      
                      </div>
                      <!-- /.box-body -->
                    </div>

                  </div>

                </div>

                



              </div>

        




    


             

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
     