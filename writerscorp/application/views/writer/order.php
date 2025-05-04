 <?php include 'header.php'; ?>
<div class="page light">
<div class="content-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 offset-lg-2">
                      
                        <legend class="text-center" style="width:88%;">Make your order</legend>
                            <form action="<?php echo base_url('buyer/process_order') ?>" method="post" id="msform">
                                  <div class="toply">
                                            <ul id="progressbar">
                                               
                                                <li class="active">Paper Details</li>
                                                <li>Payment</li>
                                               
                                            </ul>
                                    </div>
                                <fieldset>
                                   <h2 class="fs-title">Paper Details</h2>
                                    <h3 class="fs-subtitle">Tell us more about you paper</h3>

                                                    
                            <!-- Tab panes -->
                                   
                                   
                                    <div class="form-group">
                                        <input type="hidden" name="buyer_id" value="<?php if(isset($buyer_id)){ echo $buyer_id;  } ?>">
                                        <label for="inputEmail" class="col-xl-12 form-control-label">Paper Title</label>
                                        <div class="col-xl-10">
                                            <input class="form-control" value="" name="order_title" id="title" placeholder="Title" type="text" required>
                                        </div>
                                    </div>
                                        <div class="form-group">
                                        <label for="textArea" class="col-xl-12 form-control-label">Paper Description</label>
                                        <div class="col-xl-10">
                                            <textarea class="form-control myeditablediv" name="order_description" rows="5" id="description" required></textarea> 
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label for="select"  class="col-xl-12 form-control-label">Content Type</label>
                                        <div class="col-xl-10">
                                            <select name="content_type_id" class="form-control" id="content" required>
                                            <option></option>
                                            <?php
                                             foreach ($t->result() as $row)
                                              {  ?>
                                                <option value="<?php echo $row->id; ?>"><?php echo $row->content_name; ?></option>
                                              <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label for="select"  class="col-xl-12 form-control-label">Industry</label>
                                        <div class="col-xl-10">
                                            <select name="industry_id" class="form-control" id="industry" required>
                                            <option></option>
                                            <?php
                                             foreach ($i->result() as $row)
                                              {  ?>
                                                <option value="<?php echo $row->industry_id; ?>"><?php echo $row->industry_name; ?></option>
                                              <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail" class="col-xl-12 form-control-label">Keywords(press enter after every keyword)</label>
                                        <div class="col-xl-10">
                                            <input class="form-control" name="order_keywords" id="inputEmail"  data-role="tagsinput" type="text">
                                        </div>
                                    </div>
                                      <div class="form-group">
                                        <label for="select"  class="col-xl-12 form-control-label">Choose Package</label>
                                        <div class="col-xl-10">
                                            <select  name="package_id" onchange="get_total()" class="form-control" id="package" required>
                                                et
                                                <?php
                                             foreach ($p->result() as $row)
                                              {  ?>

                                                <option  pesa="<?php echo $row->level_per_word; ?>" value="<?php echo $row->level_id; ?>"><?php echo $row->level_name; ?></option>
                                              <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label for="inputEmail"  class="col-xl-12 form-control-label">Number of words</label>
                                        <div class="col-xl-10">
                                            <input class="form-control" name="order_word_count" onkeyup="get_total(),get_due()" id="words" placeholder="Number of words" type="number" required>
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label for="inputEmail" class="col-xl-12 form-control-label">Amount Due(USD)</label>
                                        <div class="col-xl-10">
                                            <input class="form-control" name="order_amount" id="amount"  type="text" readonly>
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label for="inputEmail" class="col-xl-12 form-control-label">Due in</label>
                                        <div class="col-xl-10">
                                            <input class="form-control" name="order_due" id="due"  type="text" readonly>
                                        </div>
                                    </div>
                                            <!--<button id="fao" class="btn btn-primary">Make Payment</button> -->
                                   
                                  
                                
                                 
                                
                                            <!--<button type="reset" class="btn btn-secondary">Cancel</button> -->
                                            <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                                            <input type="button" name="next" class="next action-button" value="Next"/>
                                  
                                        
                                </fieldset>
                                <fieldset>
                              

                               
                                <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>

                                              
                                  

                               

                                <input type="submit" style="color:#fff;" name="submit" class="submit btn btn-primary btn-md" value="Check out with PayPal" /><br>
                               

                                </fieldset>
                                 
                            </form>
                         

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
                        $('#amount').val('');
                    } else {                
                        $('#amount').val(total);
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
