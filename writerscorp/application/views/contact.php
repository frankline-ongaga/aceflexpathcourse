<?php include 'header.php'; ?>

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

								<li class="active">Contact</li>

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

								<div class="col-md-6 col-md-offset-3">
								<h1 class="page-title">Contact Us</h1>

								  <?php
								     if(isset($success))
								     {
								     	?>
								     	<div class="alert alert-success">
								     	 <?php

								     	    echo $success;

								     	 ?>
								     		
								     	</div>
								 <?php
								     }

								  ?>

									<p>We'd love to hear from you, kindly fill this form</p>

									<div class="alert alert-success hidden" id="MessageSent">

										We have received your message, we will contact you very soon.

									</div>

									<div class="alert alert-danger hidden" id="MessageNotSent">

										Oops! Something went wrong, please verify that you are not a robot or refresh the page and try again.

									</div>

									<div class="contact-form">

										<form  method="post" action="<?php echo base_url('professionalwriting/contact_us_process'); ?>">

											<div class="form-group has-feedback">

												<label for="name">Name*</label>

												<input type="text" class="form-control" id="name" name="name" placeholder="">

												<i class="fa fa-user form-control-feedback"></i>

											</div>

											<div class="form-group has-feedback">

												<label for="email">Email*</label>

												<input type="email" class="form-control" id="email" name="email" placeholder="">

												<i class="fa fa-envelope form-control-feedback"></i>

											</div>

											<div class="form-group has-feedback">

												<label for="subject">Subject*</label>

												<input type="text" class="form-control" id="subject" name="subject" placeholder="">

												<i class="fa fa-navicon form-control-feedback"></i>

											</div>

											<div class="form-group has-feedback">

												<label for="message">Message*</label>

												<textarea class="form-control" rows="6" id="message" name="message" placeholder=""></textarea>

												<i class="fa fa-pencil form-control-feedback"></i>

											</div>

											<div class="g-recaptcha" data-sitekey="6LdqXycTAAAAANwr-Pi06hTJMXKhGRsO4n4i1KxV"></div>

											<input type="submit" value="Submit" class="submit-button btn btn-default">

										</form>

									</div>

								</div>

								<div class="col-md-6">

									<!-- google maps start -->

									<!-- <div id="map-canvas"></div>
 -->
									<!-- google maps end -->

								</div>

							</div>

						</div>

						<!-- main end -->

						

					</div>

				</div>

			</section>

			<!-- main-container end -->



			<!-- section start -->

			<!-- ================ -->

			

			<!-- section end -->



			<!-- section start -->

			<!-- ================ -->

			

			<!-- section end -->



			<!-- footer start (Add "light" class to #footer in order to enable light footer) -->

			<!-- ================ -->

			<?php include 'footer.php'; ?>