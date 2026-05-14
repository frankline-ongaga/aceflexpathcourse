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
								<li class="active">Sample Essays</li>
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
								    <h1 class="page-title">Our Previous Papers</h1>
						            	<div class="separator-2"></div>
						            	<p>View paper samples written by our writers, find out how your paper will look like, and make sure we provide our customers with quality writing from scratch according to all their instructions. </p>

						            	<?php

						            	   foreach ($h->result() as $row) {
						            	   	# code...
						            	  
						            	?>

						            	<div class="samples clearfix">
						            	   <h4 class="sample-header"><?php echo $row->previous_title ?></h4>
						            	   <div class="col-md-12">
						            	     <p class="sam"><span class="sample-sub"><?php echo $row->previous_description ?></p>
						            	    
						            	     
						            	   </div>
						            	   <div >
						            	     <a href="<?php echo base_url('Admin/get_prev') ."/$row->previous_id". ?>">Read More</a>
						            	   </div>

						            	</div>
						            	<?php
						            	  }

						            	?>


						            
						            	
									
                                     <br>
								<div class="section default-bg clearfix">
									
										<div class="call-to-action">
											
												<div class="col-md-7">
													<h1 class="title text-center">Enjoy big discounts</h1>
													<p class="text-center">Get 10% discount on your first order</p>
												</div>
												<div class="col-md-2">
													<div class="text-center">
														<a href="#" class="btn btn-white btn-lg">ORDER NOW</a>
													</div>
												</div>
										
										</div>
									
								</div>
									
									
								</div>
								<!-- sidebar start -->
								<aside class="col-md-4">
								 <div class="sidebar">
								  <div class="block clearfix">
									<div class="side vertical-divider-left">
										
										<?php include 'testimonials_sidebar.php'; ?>
										
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