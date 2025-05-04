<?php include 'header.php' ?>
    
     <section id="values" class="" style="background-color: #021A3A;color:#B8B8B8;">
            <div class="container inner-bottom-sm">
               <h2 style="color:#B8B8B8; text-align:center; position: relative; top:30px; bottom: -30px;">Join us today at Betstadia and enjoy huge winnings!</h2>
              
               <div class="row inner-top-sm">
                  <div class="col-lg-1 col-sm-2 col-3 text-right">
                     <div class="icon pos-left"><i class="icon-mobile icn"></i></div>
                  </div>
                  <div class="col-lg-5 col-sm-10 col-9 inner-bottom-xs">
                     <h2 style="color:#B8B8B8;">Join Betstadia.com via M-Pesa</h2>
                     
                     <ol>
                       <li>On your Safaricom phone go to the M-PESA menu</li>
                       <li>Select Lipa Na M-PESA</li>
                       <li>Select Buy Goods and Services</li>
                       <li>Enter the Till Number 673814.</li>
                       <li>Enter Amount: KSH 50 (DAILY - Tips Via SMS ONLY) OR Access Premium Page for KSH 250 (WEEKLY), KSH 800 (1 Month) And KSH 2000 (3 Months)</li>
                       <li>Confirm that all the details are correct and press OK</li>
                       <li>You will Receive confirmation message paid to WEKA SURE SERVICES</li>
                       <li>You Will receive Second SMS with your Username and Password </li>

                     </ol>
                  </div>
                  <div class="col-lg-1 col-sm-2 col-3 text-right">
                     <div class="icon pos-left"><i class="icon-s-paypal icn"></i></div>
                  </div>
                  <div class="col-lg-5 col-sm-10 col-9 inner-bottom-xs">
                     <h2 style="color:#B8B8B8;">Join Betstadia.com via Paypal</h2>
                      <p>
                       Pay securely via Paypal by completing the form below and enjoy winning odds, our pricing table is provided below. 
                      </p>
                     
                  </div>
                 
               </div>
            </div>
         </section>
          <section id="product" style="padding-bottom: 40px; background: #f2f5f7;  ">
            <div class="container">
             
               <div class="row">
                   
                  <div class="col-md-8 inner-top-xs inner-left-xs">
                     <h2>Our Past Predictions(Yesterday)</h2>
                      <table class="table table-bordered">
					    <thead>
					      <tr>
			                <th> Match Time </th>
                            <th> Matches </th>
                            <th> Predictions</th>
                            <th> Results</th>
                            <th> Status</th>
					      </tr>
					    </thead>
					    <tbody>
					     <?php  
                                    foreach ($past_winning->result() as $row) {
                                        $match_date = $row->tarehe .' '.$row->match_time;
                                    ?>
                                    <tr> <td> <?php echo $match_date; ?></td> 
                                    <td> <?php echo $row->hometeam.' <span style="color:red;font-weight:bold">Vs</span> '. $row->awayteam ?></td> 
                                    <td> <?php echo $row->tip; ?></td>

                                    <td> <?php  $homescore = $row->homescore; $awayscore = $row->awayscore; $results = $homescore." - ".$awayscore; echo $results;?> </td>

                                    <td> <?php $prediction_state = $row->status ;
                                        if ($prediction_state==2) { ?> <span class="label label-warning"><?php echo 'Not Started' ?></span> <?php                                                                                
                                        } elseif ($prediction_state==1) { ?>
                                            <img src="<?php echo base_url('images/success.png');?>" alt="Wrong Prediction";<?php                                            
                                        }elseif ($prediction_state == 0) { ?> <img src="<?php echo base_url('images/failure.png');?>" alt="Wrong Prediction";<?php }  
                                    ?> </td> </tr>
                                    <?php 
                                    }
                                    ?>
					    </tbody>
					  </table>
                  </div>

                   <div class="col-md-4 inner-top-xs inner-left-xs">
                     <h2>Our Pricing Table</h2>
                      <table class="table table-bordered">
					    <thead>
					      <tr>
					        <th>Duration</th>
					        <th>MPESA</th>
					        <th>Paypal</th>
					      </tr>
					    </thead>
					    <tbody>
					      <tr>
					        <td>Daily</td>
					        <td>KES 50</td>
					        <td>$2</td>
					        
					      </tr>
					      <tr>
					        <td>Weekly</td>
					        <td>KES 250</td>
					        <td>$5</td>
					        
					      </tr>
					      <tr>
					       <td>Monthly</td>
					        <td>KES 800</td>
					        <td>$10</td>
					       </tr>

					       <tr>
					       <td>3 Months</td>
					        <td>KES 2000</td>
					        <td>$20</td>
					       </tr>

					    </tbody>
					  </table>
                  </div>

               </div>
             
               
            </div>
         </section>

<?php include 'footer.php' ?>