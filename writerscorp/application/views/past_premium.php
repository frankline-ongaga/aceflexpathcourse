<?php 
include('header.php');
?>
 <section id="values" class="" style="background-color: #ffffff">
 <div class="container" >

    <div class="row">
      <div class="col-lg-8">
      <br>
       <?php if (isset($tarehe)){
           $newDate = date("l \, jS  F Y ", strtotime($tarehe));
         ?><h4 align="center" class="btn btn-danger btn-lg  btn-block"> <b> <?php echo $newDate; ?>Predictions</b></h4> <?php

       } else { ?>
           <h4 align="center" class="btn btn-danger btn-lg  btn-block"> <b> No Predictions for this date</b></h4> <?php
       } ?>
                            <?php if (isset($betslip1)){ ?>
                         
                          <br>
                          <h4 align="center" class="btn btn-danger btn-lg "> <b> Betslip One</b></h4>
                          <br>
                        <br>
                                <table class="table table-bordered table-striped">
                                    <th> Match Time </th>
                                    <th> Matches </th>
                                    <th> Type </th>
                                    <th> Predictions</th>
                                    <th> Results</th>
                                    <th> Status</th>
                                    <?php  
                                    foreach ($betslip1->result() as $row) {
                                        $type = $row->type;
                                        $new_type = '';
                                        if($type == 1 ){ $new_type.= '1X2'; }
                                        if($type == 2 ){ $new_type.= 'OV/UN'; }
                                        if($type == 3 ){ $new_type.= 'BTS'; }
                                            ?>
                                            <tr> <td> <?php echo $row->match_time ?></td> 
                                            <td align="centre"> <?php echo $row->hometeam.'  <span style="color:red;font-weight:bold">Vs</span> '. $row->awayteam ?></td> 
                                            <td> <?php echo $new_type;?></td>
                                            <td> <?php echo $row->tip; ?></td>        
                                            <td> <?php  $homescore = $row->homescore; $awayscore = $row->awayscore; $results = $homescore." - ".$awayscore; echo $results;?> </td>
                                           <td> <?php $prediction_state = $row->status ;
                                                if ($prediction_state==0) { ?> <span class="label label-warning"><?php echo 'Not Started' ?></span> <?php                                                                                
                                                } elseif ($prediction_state==1) { ?>
                                                    <img src="<?php echo base_url('images/success.png');?>" alt="Wrong Prediction";<?php                                            
                                                }elseif ($prediction_state == 2) { ?> <img src="<?php echo base_url('images/failure.png');?>" alt="Wrong Prediction";<?php }  
                                            ?> </td> </tr> <?php
                                  
                                    }
                                    ?>
                                </table>
                                <?php
                                } 
                            ?> 

                    <?php if (isset($betslip2)){ ?>
                        
                        <h4 align="center" class="btn btn-danger btn-lg "> <b> Betslip Two</b></h4>
                        <br>
                        <br>
                            <table class="table table-bordered table-striped">
                                <th> Match Time </th>
                                <th> Matches </th>
                                <th> Type </th>
                                <th> Predictions</th>
                                <th> Results</th>
                                <th> Status</th>
                                <?php  
                                foreach ($betslip2->result() as $row) {
                                    $type = $row->type;
                                    $new_type = '';
                                    if($type == 1 ){ $new_type.= '1X2'; }
                                    if($type == 2 ){ $new_type.= 'OV/UN'; }
                                    if($type == 3 ){ $new_type.= 'BTS'; }
                                        ?>
                                        <tr> <td> <?php echo $row->match_time ?></td> 
                                        <td align="centre"> <?php echo $row->hometeam.'  <span style="color:red;font-weight:bold">Vs</span> '. $row->awayteam ?></td> 
                                        <td> <?php echo $new_type;?></td>
                                        <td> <?php echo $row->tip; ?></td>        
                                        <td> <?php  $homescore = $row->homescore; $awayscore = $row->awayscore; $results = $homescore." - ".$awayscore; echo $results;?> </td>
                                        <td> <?php $prediction_state = $row->status ;
                                            if ($prediction_state==0) { ?> <span class="label label-warning"><?php echo 'Not Started' ?></span> <?php                                                                                
                                            } elseif ($prediction_state==1) { ?>
                                                <img src="<?php echo base_url('images/success.png');?>" alt="Wrong Prediction";<?php                                            
                                            }elseif ($prediction_state == 2) { ?> <img src="<?php echo base_url('images/failure.png');?>" alt="Wrong Prediction";<?php }  
                                        ?> </td> </tr> <?php
                                
                                }
                                ?>
                            </table>
                            <?php
                            } 
                        ?> 



     <?php if (isset($betslip3)){ ?>

                          <h4 align="center" class="btn btn-danger btn-lg "> <b> Betslip 3</b></h4>
                          <br>
                        <br>
                                <table class="table table-bordered table-striped">
                                    <th> Match Time </th>
                                    <th> Matches </th>
                                    <th> Type </th>
                                    <th> Predictions</th>
                                    <th> Results</th>
                                    <th> Status</th>
                                    <?php  
                                    foreach ($betslip3->result() as $row) {
                                        $type = $row->type;
                                        $new_type = '';
                                        if($type == 1 ){ $new_type.= '1X2'; }
                                        if($type == 2 ){ $new_type.= 'OV/UN'; }
                                        if($type == 3 ){ $new_type.= 'BTS'; }
                                            ?>
                                            <tr> <td> <?php echo $row->match_time ?></td> 
                                            <td align="centre"> <?php echo $row->hometeam.'  <span style="color:red;font-weight:bold">Vs</span> '. $row->awayteam ?></td> 
                                            <td> <?php echo $new_type;?></td>
                                            <td> <?php echo $row->tip; ?></td>        
                                            <td> <?php  $homescore = $row->homescore; $awayscore = $row->awayscore; $results = $homescore." - ".$awayscore; echo $results;?> </td>
                                           <td> <?php $prediction_state = $row->status ;
                                                if ($prediction_state==0) { ?> <span class="label label-warning"><?php echo 'Not Started' ?></span> <?php                                                                                
                                                } elseif ($prediction_state==1) { ?>
                                                    <img src="<?php echo base_url('images/success.png');?>" alt="Wrong Prediction";<?php                                            
                                                }elseif ($prediction_state == 2) { ?> <img src="<?php echo base_url('images/failure.png');?>" alt="Wrong Prediction";<?php }  
                                            ?> </td> </tr> <?php
                                  
                                    }
                                    ?>
                                </table>
                                <?php
                                } 
                            ?> 

<?php if (isset($betslip4)){ ?>
                         
                         
                         <h4 align="center" class="btn btn-danger btn-lg "> <b> Betslip 4</b></h4>
                        <br>
                        <br>
                               <table class="table table-bordered table-striped">
                                   <th> Match Time </th>
                                   <th> Matches </th>
                                   <th> Type </th>
                                   <th> Predictions</th>
                                   <th> Results</th>
                                   <th> Status</th>
                                   <?php  
                                   foreach ($betslip4->result() as $row) {
                                       $type = $row->type;
                                       $new_type = '';
                                       if($type == 1 ){ $new_type.= '1X2'; }
                                       if($type == 2 ){ $new_type.= 'OV/UN'; }
                                       if($type == 3 ){ $new_type.= 'BTS'; }
                                           ?>
                                           <tr> <td> <?php echo $row->match_time ?></td> 
                                           <td align="centre"> <?php echo $row->hometeam.'  <span style="color:red;font-weight:bold">Vs</span> '. $row->awayteam ?></td> 
                                           <td> <?php echo $new_type;?></td>
                                           <td> <?php echo $row->tip; ?></td>        
                                           <td> <?php  $homescore = $row->homescore; $awayscore = $row->awayscore; $results = $homescore." - ".$awayscore; echo $results;?> </td>
                                          <td> <?php $prediction_state = $row->status ;
                                               if ($prediction_state==0) { ?> <span class="label label-warning"><?php echo 'Not Started' ?></span> <?php                                                                                
                                               } elseif ($prediction_state==1) { ?>
                                                   <img src="<?php echo base_url('images/success.png');?>" alt="Wrong Prediction";<?php                                            
                                               }elseif ($prediction_state == 2) { ?> <img src="<?php echo base_url('images/failure.png');?>" alt="Wrong Prediction";<?php }  
                                           ?> </td> </tr> <?php
                                 
                                   }
                                   ?>
                               </table>
                               <?php
                               } 
                           ?> 



                    <?php if (isset($betslip5)){ ?>
                         
                       
                         <h4 align="center" class="btn btn-danger btn-lg "> <b> Betslip 5</b></h4>
                         <br>
                        <br>
                               <table class="table table-bordered table-striped">
                                   <th> Match Time </th>
                                   <th> Matches </th>
                                   <th> Type </th>
                                   <th> Predictions</th>
                                   <th> Results</th>
                                   <th> Status</th>
                                   <?php  
                                   foreach ($betslip5->result() as $row) {
                                       $type = $row->type;
                                       $new_type = '';
                                       if($type == 1 ){ $new_type.= '1X2'; }
                                       if($type == 2 ){ $new_type.= 'OV/UN'; }
                                       if($type == 3 ){ $new_type.= 'BTS'; }
                                           ?>
                                           <tr> <td> <?php echo $row->match_time ?></td> 
                                           <td align="centre"> <?php echo $row->hometeam.'  <span style="color:red;font-weight:bold">Vs</span> '. $row->awayteam ?></td> 
                                           <td> <?php echo $new_type;?></td>
                                           <td> <?php echo $row->tip; ?></td>        
                                           <td> <?php  $homescore = $row->homescore; $awayscore = $row->awayscore; $results = $homescore." - ".$awayscore; echo $results;?> </td>
                                          <td> <?php $prediction_state = $row->status ;
                                               if ($prediction_state==0) { ?> <span class="label label-warning"><?php echo 'Not Started' ?></span> <?php                                                                                
                                               } elseif ($prediction_state==1) { ?>
                                                   <img src="<?php echo base_url('images/success.png');?>" alt="Wrong Prediction";<?php                                            
                                               }elseif ($prediction_state == 2) { ?> <img src="<?php echo base_url('images/failure.png');?>" alt="Wrong Prediction";<?php }  
                                           ?> </td> </tr> <?php
                                 
                                   }
                                   ?>
                               </table>
                               <?php
                               } else{
                               ?> 
                               <div class="alert alert-info" role="alert"> Please wait as we prepare betslip 5....</div>
                               <?php
                               }
                           ?> 
                            <hr>

      </div>
      <div class="col-lg-4">
      <br>
      <?php
 $yesterday = date('Y-m-d', strtotime($today.' -1 day'));
  $yesterday2 = date('Y-m-d', strtotime($today.' -2 day'));
   $yesterday3 = date('Y-m-d', strtotime($today.' -3 day'));
 ?>
     <h4 align="center" class="btn btn-danger btn-lg  btn-block"> <b>OUR PAST PREDICTIONS</b></h4>
<br>
      
                        <br>
        <img src="<?php echo base_url('images/latest5.jpg');?>" class="img-responsive img-thumbnail" alt="Sportpesa Betting Club latest tips">
                        <br>
                        <h4><b><a class="orange-bg" href="<?php echo base_url("betting/past_premium/$yesterday2");?>"><?php echo date('l \, jS  F Y ',strtotime("-2 days"));?> Premium Predictions Tips</a></b></h4>

                        <br>
        <img src="<?php echo base_url('images/latest6.jpg');?>" class="img-responsive img-thumbnail" alt="Sportpesa Betting Club latest tips">
                        <br>
                        <h4><b><a class="orange-bg" href="<?php echo base_url("betting/past_premium/$yesterday3");?>"><?php echo date('l \, jS  F Y ',strtotime("-3 days"));?> Premium Predictions Tips</a></b></h4>
     
      </div>
     </div>
</div>
</section>
      <?php
include('footer.php');
?>