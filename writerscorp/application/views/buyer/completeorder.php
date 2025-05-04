 <?php include 'header.php'; ?>
<div class="page light">
<div class="content-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 offset-lg-2">
                      
                        <legend class="text-center" style="width:88%;">Complete your order</legend>
                            <form action="<?php echo base_url('client/process_order') ?>" method="post" id="msform">
                                  <div class="toply">
                                            <ul id="progressbar">
                                               <!--  -->
                                                <!-- <li class="active">Paper Details</li> -->
                                                <!-- <li  class="active">Order Payment</li> -->
                                               
                                            </ul>
                                    </div>
                                <fieldset>
                                <h2 class="fs-title">Complete Order</h2>
                                 <h3 class="fs-subtitle">Checkout with paypal</h3>
                                 <div  id="paypal-button-container"></div>
                                  <!-- <input type="submit" style="color:#fff;" name="submit" class="submit btn btn-primary btn-md" value="Check out with PayPal" /><br> -->
                               
                                <?php  
                                                $amount = $amount; 
                                                $return_url = base_url().'paypal/callback';
                                                $order_id = $order_id;
                                            ?>
                                </fieldset>
                                 
                            </form>


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
            </div>
        </div>
     <?php include 'footer.php'; ?>
     <script type="text/javascript">
        function get_total() {
            $(document).ready(function() {        
              
                   var total = 0;
                   var unit_price = $("#package option:selected").attr("pesa");
                   console.log(unit_price);
                   var words=$("#words").val();

                   var totalincents = unit_price*words;
                    total=(totalincents/100).toFixed(2);
                  
                    if (total == 0) {
                        $('.amount').val('');
                    } else {                
                        $('.amount').val(total);
                    }
               
            }); 
         
        }

         function get_due() {
            $(document).ready(function() {        
              
                   var days = 0;
                 
                   var words=$("#words").val();

                   var day = words/750;
                   //round up

                   days=Math.ceil(day);
                   
                  
                    if (days == 0) {
                        $('#due').val('');
                    } else {                
                        $('#due').val(days+' day(s)');
                    }
               
            }); 
         
        }

       
     </script>



     <script>
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches

$(".next").click(function(){
    
   jQuery(function ($) { 
    
       $("#msform").validate({
        errorClass: "my-error-class",
         
        rules: {

            title : {
                required : true
            }
           

        },
        messages: {
            title : {
                required : "Title can not be empty"
            }
        }
    });
     
    
    });
    
    if (!$('#msform').valid()) {
    return false;
}


    if(animating) return false;
    animating = true;
    
    current_fs = $(this).parent();
    next_fs = $(this).parent().next();
    
    //activate next step on progressbar using the index of next_fs
    $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
    
    //show the next fieldset
    next_fs.show(); 
    //hide the current fieldset with style
    current_fs.animate({opacity: 0}, {
        step: function(now, mx) {
            //as the opacity of current_fs reduces to 0 - stored in "now"
            //1. scale current_fs down to 80%
            scale = 1 - (1 - now) * 0.2;
                        
            //2. bring next_fs from the right(50%)
            //left = (1 * 50)+"%";
            //3. increase opacity of next_fs to 1 as it moves in
            opacity = 1 - now;
            current_fs.css({'transform': 'scale('+scale+')'});
            next_fs.css({'left': left, 'opacity': opacity});
        }, 
        duration: 800, 
        complete: function(){
            current_fs.hide();
            animating = false;
        }, 
        //this comes from the custom easing plugin
        easing: 'easeInOutBack'
    });

});

$(".previous").click(function(){
    if(animating) return false;
    animating = true;
    
    current_fs = $(this).parent();
    previous_fs = $(this).parent().prev();
    
    //de-activate current step on progressbar
    $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
    
    //show the previous fieldset
    previous_fs.show(); 
    //hide the current fieldset with style
    current_fs.animate({opacity: 0}, {
        step: function(now, mx) {
            //as the opacity of current_fs reduces to 0 - stored in "now"
            //1. scale previous_fs from 80% to 100%
            scale = 0.8 + (1 - now) * 0.2;
            //2. take current_fs to the right(50%) - from 0%
            //left = ((1-now) * 50)+"%";
            //3. increase opacity of previous_fs to 1 as it moves in
            opacity = 1 - now;
            current_fs.css({'left': left});
            previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
        }, 
        duration: 800, 
        complete: function(){
            current_fs.hide();
            animating = false;
        }, 
        //this comes from the custom easing plugin
        easing: 'easeInOutBack'
    });
});

$(".submit").click(function(){
    return true;
})
    
    
</script>
