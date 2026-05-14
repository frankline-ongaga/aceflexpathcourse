          <div class="col-6 mx-auto">
            <h6 class="mb-0 text-uppercase">Check Out</h6>
            <hr/>
              <div class="card">
                 <div class="card-body">


                      
                                        <div  id="paypal-button-container"></div>
                                <?php  
                                    if(!empty($amount)){
                                       $amount = $amount; 
                                    }
                                    $return_url = base_url().'paypal/callback';
                                    $order_id = $order_id;
                                ?>
                              
                           
                            <script src="https://www.paypal.com/sdk/js?client-id=<?php echo PAYPAL_CLIENTID; ?>"> </script>
                      <script>
                        paypal.Buttons({
                          createOrder: function(data, actions) {
                            return actions.order.create({
                              purchase_units: [{
                                amount: {
                                  value: '<?php echo $amount; ?>'
                                }
                              }]
                            });
                          },
                          onApprove: function(data, actions) {
                            return actions.order.capture().then(function(details) {
                              window.location = "<?php echo $return_url;?>?txn_id="+details.id+"&invoice_id="+details.invoice_id+"&status="+details.status+"&amount=<?php echo $amount; ?>&order_id=<?php echo $order_id; ?>"
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
         <div class="col-6">

              <h2>Wise Goes Here</h2>
         </div>