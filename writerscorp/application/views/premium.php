<?php
include('header.php');
?> 
 <section id="values" class="" style="background-color: #f5f7fa">
 <div class="container" >

    <div class="row">
 
               
                    <?php
                    $today = date('Y-m-d');

                    $yesterday = date('Y-m-d', strtotime($today.' -1 day'));
                    $yesterday2 = date('Y-m-d', strtotime($today.' -2 day'));
                    $yesterday3 = date('Y-m-d', strtotime($today.' -3 day'));
                    $yesterday4 = date('Y-m-d', strtotime($today.' -4 day'));
                    $yesterday5 = date('Y-m-d', strtotime($today.' -5 day'));
                    $yesterday6 = date('Y-m-d', strtotime($today.' -6 day'));
                    $yesterday7 = date('Y-m-d', strtotime($today.' -7 day'));
                    $yesterday8 = date('Y-m-d', strtotime($today.' -8 day'));
                    $yesterday9 = date('Y-m-d', strtotime($today.' -9 day'));
                    $yesterday10 = date('Y-m-d', strtotime($today.' -10 day'));
                    $yesterday11 = date('Y-m-d', strtotime($today.' -11 day'));
                    $yesterday12 = date('Y-m-d', strtotime($today.' -12 day'));
                    ?>

                     <h4 align="center" class="btn btn-danger btn-lg  btn-block"> <b>OUR PAST PREDICTIONS</b></h4>
                        <br>
                        <div class="row">
                          
                                <div class="col-lg-4">
                                    <img src="<?php echo base_url('images/latest1.jpg');?>" class="img-responsive img-thumbnail" width="320" heigth="320" alt="Sportpesa Betting Club latest tips">
                                    <br>                       
                                    <h4><a class="orange-bg" href="<?php echo base_url("betting/past_premium/$today");?>">Today (<?php echo date("Y-m-d");?>) Premium  Tips</a></h4>
                                    <br>
                                </div>
                                <div class="col-lg-4">
                                     <img src="<?php echo base_url('images/latest2.jpg');?>" class="img-responsive img-thumbnail" width="320" heigth="320" alt="Sportpesa Betting Club latest tips">
                                    <br>                       
                                    <h4><a class="orange-bg" href="<?php echo base_url("betting/past_premium/$yesterday");?>"><?php echo date('l \, jS  F Y ',strtotime("-1 days"));?> Premium  Tips</a></h4>
                                    <br>
                                    
                                </div>
                                <div class="col-lg-4">
                                    <img src="<?php echo base_url('images/latest4.jpg');?>" class="img-responsive img-thumbnail" alt="Sportpesa Betting Club latest tips">
                                    <br>                       
                                    <h4><a class="orange-bg" href="<?php echo base_url("betting/past_premium/$yesterday2");?>"><?php echo date('l \, jS  F Y ',strtotime("-2 days"));?> Premium  Tips</a></h4>
                                    <br>
                                    
                                </div>

                           

                        </div>

                        <br>
                        <div class="row">
                            
                                <div class="col-lg-4">
                                    <img src="<?php echo base_url('images/latest3.jpg');?>" class="img-responsive img-thumbnail" width="320" heigth="320" alt="Sportpesa Betting Club latest tips">
                                    <br>                       
                                    <h4><a class="orange-bg" href="<?php echo base_url("betting/past_premium/$yesterday3");?>"><?php echo date('l \, jS  F Y ',strtotime("-3 days"));?> Premium  Tips</a></b></h4>
                                    <br>
                                </div>
                                <div class="col-lg-4">
                                     <img src="<?php echo base_url('images/latest4.jpg');?>" class="img-responsive img-thumbnail" alt="Sportpesa Betting Club latest tips">
                                    <br>                       
                                    <h4><a class="orange-bg" href="<?php echo base_url("betting/past_premium/$yesterday4");?>"><?php echo date('l \, jS  F Y ',strtotime("-4 days"));?> Premium  Tips</a></h4>
                                    <br>
                                    
                                </div>
                                <div class="col-lg-4">
                                    <img src="<?php echo base_url('images/latest1.jpg');?>" class="img-responsive img-thumbnail" width="320" heigth="320" alt="Sportpesa Betting Club latest tips">
                                    <br>                       
                                    <h4><a class="orange-bg" href="<?php echo base_url("betting/past_premium/$yesterday5");?>"><?php echo date('l \, jS  F Y ',strtotime("-5 days"));?> Premium  Tips</a></h4>
                                    <br>
                                    
                                </div>

                            


                        </div>

                        <br>
                        <div class="row">
                            
                                <div class="col-lg-4">
                                    <img src="<?php echo base_url('images/latest2.jpg');?>"  class="img-responsive img-thumbnail" width="320" heigth="320" alt="Sportpesa Betting Club latest tips">
                                    <br>                       
                                    <h4><a class="orange-bg" href="<?php echo base_url("betting/past_premium/$yesterday6");?>"> <?php echo date('l \, jS  F Y ',strtotime("-6 days"));?> Premium  Tips</a></h4>
                                    <br>
                                </div>
                                <div class="col-lg-4">
                                     <img src="<?php echo base_url('images/latest3.jpg');?>"  class="img-responsive img-thumbnail" width="320" heigth="320" alt="Sportpesa Betting Club latest tips">
                                    <br>                       
                                    <h4><a class="orange-bg" href="<?php echo base_url("betting/past_premium/$yesterday7");?>"><?php echo date('l \, jS  F Y ',strtotime("-7 days"));?> Premium  Tips</a></h4>
                                    <br>
                                    
                                </div>
                                <div class="col-lg-4">
                                    <img src="<?php echo base_url('images/latest4.jpg');?>" class="img-responsive img-thumbnail" alt="Sportpesa Betting Club latest tips">
                                    <br>                       
                                    <h4><a class="orange-bg" href="<?php echo base_url("betting/past_premium/$yesterday8");?>"><?php echo date('l \, jS  F Y ',strtotime("-8 days"));?> Premium  Tips</a></h4>
                                    <br>
                                    
                                </div>

                           


                        </div>

                        <br>
                        <div class="row">
                            
                                <div class="col-lg-4">
                                    <img src="<?php echo base_url('images/latest1.jpg');?>" class="img-responsive img-thumbnail" width="320" heigth="320" alt="Sportpesa Betting Club latest tips">
                                    <br>                       
                                    <h4><a class="orange-bg" href="<?php echo base_url("betting/past_premium/$yesterday9");?>"><?php echo date('l \, jS  F Y ',strtotime("-9 days"));?> Premium  Tips</a></h4>
                                    <br>
                                </div>
                                <div class="col-lg-4">
                                     <img src="<?php echo base_url('images/latest2.jpg');?>" class="img-responsive img-thumbnail"  width="320" heigth="320" alt="Sportpesa Betting Club latest tips">
                                    <br>                       
                                    <h4><a class="orange-bg" href="<?php echo base_url("betting/past_premium/$yesterday10");?>"><?php echo date('l \, jS  F Y ',strtotime("-10 days"));?> Premium  Tips</a></h4>
                                    <br>
                                    
                                </div>
                                <div class="col-lg-4">
                                    <img src="<?php echo base_url('images/latest4.jpg');?>" class="img-responsive img-thumbnail" alt="Sportpesa Betting Club latest tips">
                                    <br>                       
                                    <h4><a class="orange-bg" href="<?php echo base_url("betting/past_premium/$yesterday11");?>"><?php echo date('l \, jS  F Y ',strtotime("-11 days"));?> Premium  Tips</a></h4>
                                    <br>
                                    
                                </div>

                           


                        </div>

                        
                   
      
    </div>
    </section>

      <?php
include('footer.php');
?>