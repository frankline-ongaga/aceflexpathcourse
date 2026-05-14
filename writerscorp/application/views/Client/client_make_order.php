<?php include 'client_header.php' ?>
			<!-- header end -->

			<!-- banner start -->
			<!-- ================ -->
			
			<!-- banner end -->

			<!-- page-intro start-->
			<!-- ================ -->
			<div class="page-intro">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<ol class="breadcrumb">
								<li>Welcome <?php if(isset($cust_name) ){ echo $cust_name; } ?></li>
								
							</ol>
						</div>
					</div>
				</div>
			</div>
			<!-- page-intro end -->

			<!-- main-container start -->
			<!-- ================ -->
			<section class="main-container">

				<div class="container">
					<div class="row">

						<!-- main start -->
						<!-- ================ -->
						<div class="main col-md-12">

							<!-- page-title start -->
							<!-- ================ -->
							
							<!-- page-title end -->
							
							<div class="row">
								<div class="col-md-8">
								   
									
									<!-- MultiStep Form -->
								<div class="row">
								    <div class="col-md-12 ">
								        <form id="msform" enctype="multipart/form-data"  method="post" action="<?php echo base_url('Client/process_orders_client')?>">
								            <!-- progressbar -->
								          <div class="toply">
								            <ul id="progressbar">
								               
								                <li class="active">Paper Details</li>
								                <li>Price Calculation</li>
								               
								            </ul>
								          </div>
								            <!-- fieldsets -->
								           
								            <fieldset>
								                <h2 class="fs-title">Paper Details</h2>
								                <h3 class="fs-subtitle">Tell us more about you paper</h3>

								                	
							<!-- Tab panes -->
							<div class="tab-content">
								<div class="tab-pane fade in active" id="htab1">
									

													<div class="form-group">
														<label for="exampleInputEmail1" id="lebo">Type of Paper</label>
												<select name="typeofpaper" id="dropdown" class="form-control">
						                               <?php
						                                 foreach ($typeofpaper->result_array() as $row)
						 
						                                    { ?>
						                                    <option  value="<?php echo $row['essaytype_id']; ?>"><?php echo $row['essaytype_name']; ?></option>
						                               <?php } ?>
					                            </select>
													</div>

													<div class="form-group">
														<label for="exampleInputEmail1" id="lebo">Discipline</label>
												<select name="discipline"  id="dropdown" class="form-control">
						                               <?php
						                                  foreach ($discipline->result_array() as $row)
						 
						                                    { ?>
						                                    <option  value="<?php echo $row['discipline_id']; ?>"><?php echo $row['discipline_name']; ?></option>
						                               <?php } ?>
					                            </select>
													</div>

													<div class="form-group">
														<label for="exampleInputPassword1" id="lebo">Topic</label>
														<input type="text" required name="topic" class="form-control" id="exampleInputPassword1" placeholder="Topic">
													</div>

													<label id="lebo">Paper Instructions</label>
							                    	<textarea class="form-control" rows="3" name="instructions" placeholder="Paper Instructions"></textarea>

							                    	<div class="form-group">
														<label for="exampleInputPassword1" id="lebo">Sources</label>
														<input type="number" name="sources" class="form-control" id="exampleInputPassword1" placeholder="Sources">
													</div>
													 <div class="form-group">
											            <label for="password" id="lebo">Upload</label>

											            <input multiple name="userfile[]"  id="userfile" type="file">
											        </div>

											        <div class="form-group">
														<label for="exampleInputEmail1" id="lebo">Paper Format</label>
												<select name="format"  id="dropdown" class="form-control">
						                               <?php
						                                  foreach ($format->result_array() as $row)
						 
						                                    { ?>
						                                    <option  value="<?php echo $row['format_id']; ?>"><?php echo $row['format_name']; ?></option>
						                               <?php } ?>
					                            </select>
													</div>
								               
								               
								</div>
								
								
							</div>

                                            <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
								                <input type="button" name="next" class="next action-button" value="Next"/>
								            </fieldset>
								       
								              

													
								            </fieldset>
								            <fieldset>
								                 <?php include'specialcalculation.php'; ?>
								            </fieldset>
								           
								        </form>
								        <!-- link to designify.me code snippets -->
								       
								        <!-- /.link to designify.me code snippets -->
								    </div>
								</div>
								<!-- /.MultiStep Form -->

                                   
								
									
									
								</div>
								<!-- sidebar start -->
								<aside class="col-md-4">
								 <div class="sidebar">
								  <div class="block clearfix">
									<div class="side vertical-divider-left" style="margin-top: 40px">
									    <h2 class="title">Our Advantages</h2>
										<div class="separator"></div>
									   <ul style="list-style: none; text-align: left;" class="kashogi">
									     <li><i class="fa fa-check jamal"></i>&nbspFree Bibliography</li>
									     <li><i class="fa fa-check jamal"></i>&nbspFree Revision</li>
									     <li><i class="fa fa-check jamal"></i>&nbspFree Formatting</li>
									     <li><i class="fa fa-check jamal"></i>&nbspFree Title Page</li>
									     <li><i class="fa fa-check jamal"></i>&nbspFree Outline</li>
									   	
									   </ul>


										
										
										
									  </div>
									</div>
								  </div>
								</aside>
								<!-- sidebar end -->
							</div>
							<hr>
						</div>
						<!-- main end -->

					</div>
				</div>
			</section>
			<!-- main-container end -->

			<script>
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches

$(".next").click(function(){
    
   jQuery(function ($) { 
    
       $("#msform").validate({
        errorClass: "my-error-class",
         
        rules: {
            topic : {
                required : true
            },
            email: {
                required : true,
                email: true,
                 
                 
               
            }
            ,
            password : {
                required : true,
                minlength:5
            }
            ,
            cpassword: {
              required : true,
              equalTo: "#passy"
            }
            ,
            name: {
              required : true,
              
            }
            ,
            phone: {
              required : true,
              
            }

        },
        messages: {
            topic : {
                required : "Topic can not be empty"
            },
           email : {
                required : "Email field is required",
               
               
                
            }
            ,
            password : {
                required : "Password field is required",
                minlength:"Password should have a minimum of 5 characters"
            }
            ,
            cpassword : {
                required : "Confirm Password field is required",
                equalTo:"Passwords do not match"
            }
            ,
            name : {
                required : "Name field is required",
               
            }
            ,
            phone : {
                required : "Phone field is required",
                
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

			<!-- section start -->
			<!-- ================ -->
	
			<!-- section end -->

			<!-- section start -->
			<!-- ================ -->

			<!-- section end -->

			<!-- section start -->
			<!-- ================ -->
		
			<!-- section end -->

			<!-- section start -->
			<!-- ================ -->
			
			<!-- section end -->

			<!-- footer start (Add "light" class to #footer in order to enable light footer) -->
			<!-- ================ -->
			<?php include 'client_footer.php' ?>