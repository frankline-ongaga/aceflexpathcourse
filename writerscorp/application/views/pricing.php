<?php include 'header.php'; ?>

			<!-- header end -->



			<!-- page-intro start-->

			<!-- ================ -->

			<div class="page-intro">

				<div class="container">

					<div class="row">

						<div class="col-md-12">

							<ol class="breadcrumb">

								<li><i class="fa fa-home pr-10"></i><a href="<?php echo base_url(); ?>">Home</a></li>

								<li class="active">Pricing</li>

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

						<div class="main col-md-9">



							<!-- page-title start -->

							<!-- ================ -->

							

							<!-- page-title end -->



							<!-- Tables start -->

							<!-- ============================================================================== -->

							

							<h2>Our Pricing Table</h2>
							<p>At Writers Corp we offer pocket friendly rates for all your writing needs. We deliver quality yet affordable papers. You also enjoy 10% off your first order. Have a look at our rates below.  </p>

							<br>

							<table class="table table-hover">

								<thead>

									<tr>

										<th>#</th>

										<th>High School</th>

										<th>Undergrad(yrs 1-2)</th>

										<th>Undergrad(yrs 3-4)</th>

										<th>Masters</th>

										<th>Doctoral</th>

									</tr>

								</thead>

								<tbody>

								

									 <tr>

											  <?php 

											  

											 foreach ($onemonth->result() as $row) 

											 {

											  ?>    

											    <td class="ts-amwm">1 Month*<br></td>

											    <td class="ts-baqh">$<?php echo $row->level_highschool;  ?></td>

											    <td class="ts-baqh">$<?php echo $row->level_undergradlower;  ?></td>

											    <td class="ts-baqh">$<?php echo $row->level_undergradupper;  ?></td>

											    <td class="ts-baqh">$<?php echo $row->level_masters;  ?></td>

											    <td class="ts-baqh">$<?php echo $row->level_doctoral; } ?></td>

											  </tr>

											  <tr>

											  <?php 

											  

											 foreach ($fourteendays->result() as $row) 

											 {

											  ?>    

											    <td class="ts-amwm">14 days<br></td>

											     <td class="ts-baqh">$<?php echo $row->level_highschool;  ?></td>

											    <td class="ts-baqh">$<?php echo $row->level_undergradlower;  ?></td>

											    <td class="ts-baqh">$<?php echo $row->level_undergradupper;  ?></td>

											    <td class="ts-baqh">$<?php echo $row->level_masters;  ?></td>

											    <td class="ts-baqh">$<?php echo $row->level_doctoral; } ?></td>

											  </tr>

											  <tr>

											  <?php 

											  

											 foreach ($sevendays->result() as $row) 

											 {

											  ?>    

											    <td class="ts-amwm">7 days<br></td>

											     <td class="ts-baqh">$<?php echo $row->level_highschool;  ?></td>

											    <td class="ts-baqh">$<?php echo $row->level_undergradlower;  ?></td>

											    <td class="ts-baqh">$<?php echo $row->level_undergradupper;  ?></td>

											    <td class="ts-baqh">$<?php echo $row->level_masters;  ?></td>

											    <td class="ts-baqh">$<?php echo $row->level_doctoral; } ?></td>

											  </tr>

											  <tr>

											   <?php 

											  

											 foreach ($fivedays->result() as $row) 

											 {

											  ?>    

											    <td class="ts-amwm">5 days<br></td>

											    <td class="ts-baqh">$<?php echo $row->level_highschool;  ?></td>

											    <td class="ts-baqh">$<?php echo $row->level_undergradlower;  ?></td>

											    <td class="ts-baqh">$<?php echo $row->level_undergradupper;  ?></td>

											    <td class="ts-baqh">$<?php echo $row->level_masters;  ?></td>

											    <td class="ts-baqh">$<?php echo $row->level_doctoral; } ?></td>

											  </tr>

											  <tr>

											   <?php 

											  

											 foreach ($threedays->result() as $row) 

											 {

											  ?>    

											    <td class="ts-amwm">3 days<br></td>

											     <td class="ts-baqh">$<?php echo $row->level_highschool;  ?></td>

											    <td class="ts-baqh">$<?php echo $row->level_undergradlower;  ?></td>

											    <td class="ts-baqh">$<?php echo $row->level_undergradupper;  ?></td>

											    <td class="ts-baqh">$<?php echo $row->level_masters;  ?></td>

											    <td class="ts-baqh">$<?php echo $row->level_doctoral; } ?></td>

											  </tr>

											  <tr>

											  <?php 

											  

											 foreach ($twodays->result() as $row) 

											 {

											  ?>    

											    <td class="ts-amwm">48 hours<br></td>

											   <td class="ts-baqh">$<?php echo $row->level_highschool;  ?></td>

											    <td class="ts-baqh">$<?php echo $row->level_undergradlower;  ?></td>

											    <td class="ts-baqh">$<?php echo $row->level_undergradupper;  ?></td>

											    <td class="ts-baqh">$<?php echo $row->level_masters;  ?></td>

											    <td class="ts-baqh">$<?php echo $row->level_doctoral; } ?></td>

											  </tr>

											  <tr>

											   <?php 

											  

											 foreach ($oneday->result() as $row) 

											 {

											  ?>    

											    <td class="ts-amwm">24 hours<br></td>

											      <td class="ts-baqh">$<?php echo $row->level_highschool;  ?></td>

											    <td class="ts-baqh">$<?php echo $row->level_undergradlower;  ?></td>

											    <td class="ts-baqh">$<?php echo $row->level_undergradupper;  ?></td>

											    <td class="ts-baqh">$<?php echo $row->level_masters;  ?></td>

											    <td class="ts-baqh">$<?php echo $row->level_doctoral; } ?></td>

											  </tr>

											  <tr>

											  <?php 

											  

											 foreach ($eight->result() as $row) 

											 {

											  ?>                                                             

											                                                                    

											                                                                 

											                                                        

																		

											    <td class="ts-amwm">8 hours<br></td>

											    <td class="ts-baqh">$<?php echo $row->level_highschool;  ?></td>

											    <td class="ts-baqh">$<?php echo $row->level_undergradlower;  ?></td>

											    <td class="ts-baqh">$<?php echo $row->level_undergradupper;  ?></td>

											    <td class="ts-baqh">$<?php echo $row->level_masters; } ?></td>

											    <td class="ts-baqh">n/a</td>

											  

											  </tr>

									

								</tbody>

							</table>

                                <br>

								<div class="section default-bg clearfix">

									

										<div class="call-to-action">

											

												<div class="col-md-7">

													<h1 class="title text-center">Enjoy big discounts</h1>

													<p class="text-center">Get 35% discount on your first order</p>

												</div>

												<div class="col-md-2">

													<div class="text-center">

														<a href="<?php echo base_url('professionalwriting/order_now'); ?>" class="btn btn-white btn-lg">ORDER NOW</a>

													</div>

												</div>

										

										</div>

									

								</div>

							



						</div>

						<!-- main end -->





						<!-- sidebar start -->

						<aside class="col-md-3">

							<div class="sidebar">

								<div class="block clearfix">

									<h3 class="title">Our Payment Options</h3>

									<div class="separator"></div>

									<div class="box gray-bg">

										<i class="fa fa-cc-paypal"></i>

									</div>

									<div class="box gray-bg">

										<i class="fa fa-cc-visa"></i>

									</div>

									<div class="box gray-bg">

										<i class="fa fa-cc-mastercard"></i>

									</div>

								</div>

							</div>

						</aside>

						<!-- sidebar end -->



					</div>

				</div>

			</section>

			<!-- main-container end -->



			<!-- section start -->

			<!-- ================ -->

			



			<?php include 'footer.php' ?>

			<!-- section end -->



			<!-- footer start (Add "light" class to #footer in order to enable light footer) -->

			<!-- ================ -->

		