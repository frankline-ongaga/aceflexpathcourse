<?php include 'header.php' ?>

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

								<li><i class="fa fa-home pr-10"></i><a href="<?php echo base_url(); ?>">Home</a></li>

								<li class="active">Order Now</li>

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

								    <h1 class="page-title">Order Now</h1>

							<div class="separator-2"></div>
							<p>Make an order for your custom paper in 3 easy steps. Enjoy 10% discount on your first order. Having trouble making an order? Email support at support@writers-corp.net</p>

									

									<!-- MultiStep Form -->

								<div class="row">

								    <div class="col-md-12 ">

								        <form id="msform" enctype="multipart/form-data"  method="post" action="<?php echo base_url('Professionalwriting/process_orders')?>">

								            <!-- progressbar -->

								          <div class="toply">

								            <ul id="progressbar">

								               

								                <li class="active">Paper Details</li>

								                <li>Price Calculation</li>

								                <li>Account Setup</li>

								            </ul>

								          </div>

								            <!-- fieldsets -->

								           

								            <fieldset>

								                <h2 class="fs-title">Paper Details</h2>

								                <h3 class="fs-subtitle">Tell us more about you paper</h3>



								                	<ul class="nav nav-tabs" role="tablist">

								<li class="active"><a href="#htab1" role="tab" data-toggle="tab"><i class="fa fa-plus pr-5"></i>New Clients Proceed</a></li>

								<li><a href="#htab2" role="tab" data-toggle="tab"><i class="fa fa-lock pr-5"></i>Returning Clients Login</a></li>

								

							</ul>

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

								<div class="tab-pane fade" id="htab2">

									<a href="<?php echo base_url('client/login'); ?>" class="btn btn-default btn-lg">LOGIN</a>

								</div>

								

							</div>



                                             <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>

								                <input type="button" name="next" class="next action-button" value="Next"/>

								              



													

								            </fieldset>

								            <fieldset>

								                 <?php include'specialcalculation.php'; ?>

								            </fieldset>

								            <fieldset>

								                <h2 class="fs-title">Create your account</h2>

								                <h3 class="fs-subtitle">Fill in your credentials</h3>



                                                 <div class="form-group">

										            <label for="email" id="lebo">Email Address</label>

										            <input name="email" id="email"  class="form-control" type="email" placeholder="Email Address">

										            

										        </div>

												 



										        

										        <div class="form-group">

										            <label for="password" id="lebo">Password</label>

										            <input name="password" class="form-control" id="passy"class="pure-input-1-2" type="password" placeholder="Password">

										        </div>



										        <div class="form-group">

										            <label for="password" id="lebo">Confirm Password</label>

										            <input name="cpassword" id="cpassword" class="form-control" type="password" placeholder="Password">

										        </div>



										        <div class="form-group">

										            <label for="name" id="lebo">Name</label>

										            <input name="name" class="form-control" type="text" id="name" placeholder="name">

										        </div>



										       



                                                 <div class="form-group">

										            <label for="name" id="lebo">Country</label>

                                                <select id="countries_phone1" name="country" class="form-control bfh-countries" data-country="US"></select>

												</div>



												<div class="form-group">

										            <label for="name" id="lebo">Phone</label>

												<input type="text" name="phone" class="form-control bfh-phone" data-country="countries_phone1">

												</div>





												

												<br>



										         <input name="currency" value="USD" type="hidden">

										         <input name="description" value="Writing payment" type="hidden">

         





                                              

                                              

								             

								                 <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>

                                              

								               

								              <div style="text-align: right; margin-top: -60px;" >

								                <input type="submit" style="color:#fff;" name="submit" class="btn btn-primary btn-md" value="Check out with PayPal" /><br>

	                                        <!-- 	<input type="submit" style="color:#fff;" name="submit" class="btn btn-warning btn-md"  value="Check out with Card" /> -->

	                                        	

	                                          </div>

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

			<?php include 'footer.php' ?>



			
    <script type="text/javascript">

    $(document).ready(function() {

    $(".pure-menu-list a").click(function(event) {

        event.preventDefault();

        $(this).parent().addClass("current");

        $(this).parent().siblings().removeClass("current");

        var tab = $(this).attr("href");

        $(".tab-content").not(tab).css("display", "none");

         

        $(tab).fadeIn();

    });

});

 </script>

 <script>

 

 $(document).ready(function() {

    $(".tabby-menu a").click(function(event) {

        event.preventDefault();

        $(this).parent().addClass("current");

        $(this).parent().siblings().removeClass("current");

        var tab = $(this).attr("href");

        $(".tabby-content").not(tab).css("display", "none");

        $(tab).fadeIn();

    });

});

 </script>

 <!--Start of Tawk.to Script-->

<!--End of Tawk.to Script-->

    <script>

/*

This source is shared under the terms of LGPL 3

www.gnu.org/licenses/lgpl.html



You are free to use the code in Commercial or non-commercial projects

*/



 //Set up an associative array

 //The keys represent the size of the cake

 //The values represent the cost of the cake i.e A 10" cake cost's $35

           var cake_prices = new Array();

             <?php 

            

           foreach ($hi->result() as $row) 

           {

              

            ?>       

           cake_prices["<?php echo $row->level_deadline;  ?>"]=<?php echo $row->level_highschool;  ?>;

           <?php } ?>

           

           

           var under_grad = new Array();

           <?php 

            

           foreach ($undergrad_lo->result() as $row) 

           {

              

            ?>       

           under_grad["<?php echo $row->level_deadline;  ?>"]=<?php echo $row->level_undergradlower;  ?>;

           <?php } ?>

           

           var upper_grad = new Array();

           <?php 

            

           foreach ($undergrad_hi->result() as $row) 

           {

              

            ?>      

           upper_grad["<?php echo $row->level_deadline;  ?>"]=<?php echo $row->level_undergradupper;  ?>;

           <?php } ?>

           

           

           var masters_grad = new Array();

           <?php 

            

           foreach ($mast->result() as $row) 

           {

              

            ?>      

           masters_grad["<?php echo $row->level_deadline;  ?>"]=<?php echo $row->level_masters;  ?>;

           <?php } ?>

           

           

           var doctoral_grad = new Array();

           <?php 

            

           foreach ($doct->result() as $row) 

           {

              

            ?>      

          doctoral_grad["<?php echo $row->level_deadline;  ?>"]=<?php echo $row->level_doctoral;  ?>;

           <?php } ?>

           

           //Set up an associative array 

           //The keys represent the filling type

           //The value represents the cost of the filling i.e. Lemon filling is $5,Dobash filling is $9

           //We use this this array when the user selects a filling from the form

           

           

             

             

          // getCakeSizePrice() finds the price based on the size of the cake.

          // Here, we need to take user's the selection from radio button selection

          function getCakeSizePrice()

          {  

              var rates = document.getElementsByName('price');

          var rate_value;

          for(var i = 0; i < rates.length; i++){

              if(rates[i].checked){

                  rate_value = cake_prices[rates[i].value];

              }

          }

            return rate_value;

          }



          function getundergradPrice()

          {  

              var rates = document.getElementsByName('see');

          var rate_value;

          for(var i = 0; i < rates.length; i++){

              if(rates[i].checked){

                  rate_value = under_grad[rates[i].value];

              }

          }

            return rate_value;

          }



          function getundergradUpper()

          {  

               var rates = document.getElementsByName('upper');

          var rate_value;

          for(var i = 0; i < rates.length; i++){

              if(rates[i].checked){

                  rate_value = upper_grad[rates[i].value];

              }

          }

            return rate_value;

          }



          function getMasters()

          {  

             var rates = document.getElementsByName('masters');

          var rate_value;

          for(var i = 0; i < rates.length; i++){

              if(rates[i].checked){

                  rate_value = masters_grad[rates[i].value];

              }

          }

            return rate_value;

          }

          function getDoctoral()

          {  

             var rates = document.getElementsByName('doctoral');

          var rate_value;

          for(var i = 0; i < rates.length; i++){

              if(rates[i].checked){

                  rate_value = doctoral_grad[rates[i].value];

              }

          }

            return rate_value;

          }

          //This function finds the filling price based on the 

          //drop down selection





          //candlesPrice() finds the candles price based on a check box selection





          function pages()

          {

              //This local variable will be used to decide whether or not to charge for the inscription

              //If the user checked the box this value will be 20

              //otherwise it will remain at 0

              

              //Get a refernce to the form id="cakeform"

               var x = document.getElementById("pages").value;

              //If they checked the box set inscriptionPrice to 20

              

              //finally we return the inscriptionPrice

              return x;

          }



          function calculateWords()

          {

              //Here we get the total price by calling our function

              //Each function returns a number so by calling them we add the values they return together

              var cakePrice = 275 * pages();

              

              //display the result

              var divobj = document.getElementById('words');

              divobj.style.display='inline';

               divobj.style.left='40px';

              divobj.innerHTML = cakePrice+' '+"words";



          }

               



          function calculateUnder()

          {

              //Here we get the total price by calling our function

              //Each function returns a number so by calling them we add the values they return together

              var cakePrice = getundergradPrice() * pages();

              

              //display the result

              var divobj = document.getElementById('totalundergrad');

              divobj.style.display='block';

              divobj.innerHTML = "<span class='kivutha'>Total Price:</span> <span id='dollar'>"+"$"+"<input type='hidden' name='amountunder' value='"+cakePrice+ "'  >"+cakePrice+"</span>";



          }

          function calculateUpper()

          {

              //Here we get the total price by calling our function

              //Each function returns a number so by calling them we add the values they return together

              var cakePrice = getundergradUpper() * pages();

              

              //display the result

              var divobj = document.getElementById('upper');

              divobj.style.display='block';

              divobj.innerHTML = "<span class='kivutha'>Total Price:</span> <span id='dollar'>"+"$"+"<input type='hidden' name='amountupper' value='"+cakePrice+ "'  >"+cakePrice+"</span>";

          }

          function calculateMasters()

          {

              //Here we get the total price by calling our function

              //Each function returns a number so by calling them we add the values they return together

              var cakePrice = getMasters() * pages();

              

              //display the result

              var divobj = document.getElementById('mastersid');

              divobj.style.display='block';

             divobj.innerHTML = "<span class='kivutha'>Total Price:</span> <span id='dollar'>"+"$"+"<input type='hidden' name='amountmasters' value='"+cakePrice+ "'  >"+cakePrice+"</span>";



          }



          function calculateDoctoral()

          {

              //Here we get the total price by calling our function

              //Each function returns a number so by calling them we add the values they return together

              var cakePrice = getDoctoral() * pages();

              

              //display the result

              var divobj = document.getElementById('doctoralid');

              divobj.style.display='block';

              

              divobj.innerHTML = "<span class='kivutha'>Total Price:</span> <span id='dollar'>"+"$"+"<input type='hidden' name='amountdoctoral' value='"+cakePrice+ "'  >"+cakePrice+"</span>";



          }



          function calculateTotal()

          {

              //Here we get the total price by calling our function

              //Each function returns a number so by calling them we add the values they return together

              var cakePrice = getCakeSizePrice() * pages();

              

              //display the result

              var divobj = document.getElementById('totalPrice');

              divobj.style.display='block';

               divobj.style.display='visible';

              divobj.innerHTML = "<span class='kivutha'>Total Price:</span> <span id='dollar'>"+"$"+"<input type='hidden' name='amounthigh' value='"+cakePrice+ "'  >"+cakePrice+"</span>";

               

               



          }





        </script>



        <script>

$(document).ready(function(){

    $(".select").change(function(){

         var _curr_tab = $(".select option:selected").html().toLowerCase();

         $(".tab_class").removeClass("active"); // Will remove .active from all "a"

         $("#"+_curr_tab).addClass("active"); // Will add .active to a having id _curr_tab

        showProduct(_curr_tab , document.getElementById(_curr_tab));



     });





    $(".tab_class").click(function(){

      var id=$(this).attr("id");

        showProduct(id, document.getElementById(id));

    });



});



function showProduct(a,b)

{

$(".tab_class").removeClass("active");

$("#"+a).addClass("active");

}

</script>