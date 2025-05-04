 <?php include 'header.php'; ?>
<div class="page light">
<div class="content-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-3 me acc">
                           <?php if(isset($notification)){?>
                             <div class="alert alert-warning">

                                <?php echo $notification; ?>

                             </div>
                            <?php } 

                              if(isset($amount))
                               {
                                 $amount=$amount;
                               }
                               else
                               {

                                $amount=100;
                               }

                            ?>
                      
                           <h6 class="text-center" style="width:88%;">Please enter the amount that you wish to deposit into your account.</h6>
                           <br>
                            <form action="<?php echo base_url('buyer/process_order') ?>" method="post">

                                 <input type="number" name="amount" onkeyup="get_amount()" class="form-control ha" value="<?php echo $amount; ?>" /><br>
                                  
                               
                                 <div  id="paypal-button-container"></div>
                                  <!-- <input type="submit" style="color:#fff;" name="submit" class="submit btn btn-primary btn-md" value="Check out with PayPal" /><br> -->
                               
                                <?php  
                                               // $amount = $amount; 
                                                $return_url = base_url().'paypal/callback';
                                                //$order_id = 17;
                                                 if(isset($user_id)){

                                                  $user_id=$user_id;  

                                                 // print_r( $user_id); die();

                                                } 
                                ?>
                                
                                 
                            </form>


                      <script src="https://www.paypal.com/sdk/js?client-id=<?php echo PAYPAL_CLIENTID; ?>"> </script>
                      <script>

                        //var amount=10;
                      

                        function get_amount(){

                          amount=$('.ha').val();

                          return amount;

                        }
                       
                          
                        paypal.Buttons({
                          createOrder: function(data, actions) {
                            return actions.order.create({
                              purchase_units: [{

                                "description":"99Content Deposit",

                                amount: {
                                  value: amount,
                                },

                                // items: {
                                //   name: "How are you",
                                // },
                              
                               }]


                            });
                          },
                          onApprove: function(data, actions) {
                            return actions.order.capture().then(function(details) {
                              window.location = "<?php echo $return_url;?>?txn_id="+details.id+"&invoice_id="+details.invoice_id+"&status="+details.status+"&amount="+amount+"&user_id=<?php echo $user_id; ?>"
                              // alert('Transaction completed by ' + details.payer.name.given_name);

                              // Call your server to save the transaction
                              return fetch('/paypal-transaction-complete', {
                                method: 'post',
                                headers: {
                                  'content-type': 'application/json'
                                },
                                body: JSON.stringify({
                                  orderID: data.orderID
                                })
                              });
                            });
                          }
                        }).render('#paypal-button-container');
                      </script>
                         

                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
     <?php include 'footer.php'; ?>
