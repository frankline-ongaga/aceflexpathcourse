<?php include 'header.php' ?>
<div class="content-page">
                <div class="content">
                    
                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                   
                                    <h4 class="page-title">Writer Ratings</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">

                         <div class="col-md-9 offset-md-1">


                          <div class="card">
                                    <div class="card-body">
                                      

                                         <h4 class="header-title">Average</h4>

                                        <?php if(isset($average)){

                                        //  $average=3.9;
                                           $average= round($average * 2) / 2;

                                         

                                      

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
                                      </fieldset> (<?= $average ?>) <br><br>
                                       
    
                                        <div class="table-responsive">
                                            <table class="table table-striped mb-0">
                                                <thead>
                                                      <tr>
                                                            <th>#</th>
                                                           
                                                            <th>Rating</th>
                                                            <th>Star Rating</th>
                                                            <th>Review</th>
                                                            
                                                        </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                     <?php
                                                          foreach ($ratings->result() as $row)
                                                          {   ?>
                                                          <tr>
                                                              <td><?php if(isset($row->order_id)) { echo $row->order_id;  }   ?></td>
                                                             
                                                              <td><?php if(isset($row->order_rating)) { echo $row->order_rating.'/5';  }   ?></td>

                                                                <td>


                                        <?php if(isset($row->order_rating)){

                                        //  $average=3.9;
                                           $njuguna= round($row->order_rating * 2) / 2;

                                         

                                      

                                        // $average=0;


                                        ?>
                                                                  

                                                                   <fieldset class="rating" id="oya" style="min-height: 10px;">
                                          <input type="radio"  class="ratey" id="star5" name="rate<?= $row->order_id ?>" value="5"  <?php if($njuguna==5){ echo "checked=''"; } ?>/>
                                          <label class = "full" for="star5" title="Awesome - 5 stars"></label>
                                          <input type="radio"  class="ratey" id="star4half" name="rate<?= $row->order_id ?>" value="4 and a half" <?php if($njuguna==4.5){ echo "checked=''"; } ?> /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                                          <input type="radio" id="star4" name="rate<?= $row->order_id ?>" value="4" <?php if($njuguna==4){ echo "checked=''"; } ?> /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                                          <input type="radio" class="ratey" id="star3half" name="rate<?= $row->order_id ?>" value="3 and a half" <?php if($njuguna==3.5){ echo "checked=''"; } ?> /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                                          <input type="radio" id="star3" name="rate<?= $row->order_id ?>" value="3" <?php if($njuguna==3){ echo "checked=''"; } ?>/><label class = "full" for="star3" title="Meh - 3 stars"></label>
                                          <input type="radio" class="ratey" id="star2half" name="rate<?= $row->order_id ?>" value="2 and a half" <?php if($njuguna==2.5){ echo "checked=''"; } ?>/><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                                          <input type="radio" class="ratey" id="star2" name="rate<?= $row->order_id ?>" value="2" <?php if($njuguna==2){ echo "checked=''"; } ?> /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                                          <input type="radio" class="ratey" id="star1half" name="rate<?= $row->order_id ?>" value="1 and a half" <?php if($njuguna==1.5){ echo "checked=''"; } ?> /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                                          <input type="radio" class="ratey" id="star1" name="rate<?= $row->order_id ?>" value="1" <?php if($njuguna==1){ echo "checked=''"; } ?> /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                                          <input type="radio" class="ratey" id="starhalf" name="rate<?= $row->order_id ?>" value="half" <?php if($njuguna==0.5){ echo "checked=''"; } ?> /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                                      </fieldset> (<?= $njuguna ?>) <br><br>
                                                       <?php } ?>
                                                                </td>

                                                              <td><?php if(isset($row->order_rating_comment)){ echo $row->order_rating_comment;  } else { echo '__'; }?></td>
                                                            
                                                           
                                                          </tr>
                                                         <?php } ?>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                      <?php }else{ ?>
                                          <div class="alert alert-info">


                                            <p>Writer not rated yet</p>


                                          </div>


                                   <?php   }  ?>
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