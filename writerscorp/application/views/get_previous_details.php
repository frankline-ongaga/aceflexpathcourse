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
								    <h1 class="page-title"><?php if(isset($title)){ echo $title; } ?></h1>
						            	<div class="separator-2"></div>
						            	<p> <pre><?php if(isset($paper)){ echo $paper; } ?> </pre></p>

						            	


						            
						            	
									
                                     <br>
								<div class="section default-bg clearfix">
									
										<div class="call-to-action">
											
												<div class="col-md-7">
													<h1 class="title text-center">Enjoy big discounts</h1>
													<p class="text-center">Get 35% discount on your first order</p>
												</div>
												<div class="col-md-2">
													<div class="text-center">
														<a href="<?php echo base_url() ?>professionalwriting/order_now" class="btn btn-white btn-lg">ORDER NOW</a>
													</div>
												</div>
										
										</div>
									
								</div>
									
									
								</div>
								<!-- sidebar start -->
								<aside class="col-md-4">
								<br><br> <br><br><br>
								 <div class="sidebar">
								  <div class="block clearfix">
									<div class="side vertical-divider-left">

										<?php include 'new_calculator.php'; ?>

										<br>
										
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


			<script type="text/javascript">
		
                           
        function get_tols(){

                    var pages=$("#pages").val();
       	            var level=$("#level").val();
       	            var deadline=$("#deadline").val();
                
                    $.ajax({
                            url:'<?php echo base_url() ?>professionalwriting/get_price',
                            type:'POST',
                            data:{ deadline:deadline, level : level },
                            success:function(result){
                                
                               var tot=result*pages;

                               $("#total").val(tot);


                                  
                            }

                    });
                // });
            }

      </script>