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

								<li class="active">Sample Papers</li>

							</ol>

						</div>

					</div>

				</div>

			</div>

			<!-- page-intro end -->



			<!-- main-container start -->

			<!-- ================ -->

			<div class="gray-bg section">
				 
						<div class="container">
							<h1 class="page-title">Sample Papers</h1>

							<div class="separator-2"></div>
							<p>View paper samples written by our writers, find out how your paper will look like, we provide our customers with quality writing from scratch, following all instructions to details.</p>
							<div class="row">
								<div class="col-md-8">
									<?php 

									    foreach ($samples->result() as $row) {

									  ?>

									
										<div class="col-md-12">
											<div class="box-style-1 white-bg object-non-visible animated object-visible fadeInUpSmall sample-left" data-animation-effect="fadeInUpSmall" data-effect-delay="0">
												<h2><a href="<?php echo base_url() ?>admin/get_sample/<?php echo $row->sample_slug ?>"><?php echo $row->sample_title ;  ?></a></h2>
												<p> <?php echo $row->sample_paragraph ;  ?>
                                                </p>
                                                <span>No of pages: </span><b><?php echo $row->sample_pages ;  ?></b> &nbsp; &nbsp; <span>Subject Area: </span><b><?php echo $row->sample_subject_area ;  ?></b><br>
                                                <span>Urgency: </span><b><?php echo $row->sample_urgency ?>	 days</b> &nbsp; &nbsp; <span>Style: </span><b><?php echo $row->format_name ?></b><br>
                                                <span>Academic Level: </span><b><?php echo $row->level_name ?></b> &nbsp; &nbsp;  <span>No. of Sources: </span><b><?php echo $row->sample_number_sources ?></b><br>

												<a href="<?php echo base_url() ?>professionalwriting/order_now" class="btn btn-success btn-sm">Order a paper like this for: <b><span style="font-size: 20px;">$<?php echo $row->sample_price ?></span></b> </a>
												<span style="float:right;"><a href="<?php echo base_url() ?>sample/<?php echo $row->sample_upload;  ?>"><i class="fa fa-download" style="font-size: 30px;"></i> </a></span>
											</div>
										</div>
									<?php
									   }

									 ?>

										
										
									
								</div>
								<div class="col-md-4">
								  <div class="box-style-1 white-bg object-non-visible animated object-visible fadeInUpSmall sample-left" data-animation-effect="fadeInUpSmall" data-effect-delay="0">
								  	<legend>Get a Price</legend>

									<form role="form">
										<div class="form-group">
											<label for="exampleInputPassword1">Discipline</label>
											<select class="form-control">
											        <?php

						                                  foreach ($discipline->result_array() as $row)

						 

						                                    { ?>

						                                    <option  value="<?php echo $row['discipline_id']; ?>"><?php echo $row['discipline_name']; ?></option>

						                               <?php } ?>

                                           
												
											</select>
										</div>
										<div class="form-group">
											<label for="exampleInputEmail1">No of Pages</label>
											<input type="number" class="form-control" id="pages" value="1" min="1" onkeyup="get_tols()" onclick="get_tols()">
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Academic Level</label>
											<select class="form-control" id="level"  onchange="get_tols()">
											  <?php 

									             foreach ($level->result() as $row) {

									            ?>
												
											   <option value="<?php echo $row->level_id; ?>"> <?php echo $row->level_name; ?></option>
											   <?php } ?>

                                           
												
											</select>
										</div>

										<div class="form-group">
											<label for="exampleInputPassword1">Deadline</label>
											<select class="form-control" id="deadline" onchange="get_tols()">
												<?php 

									             foreach ($deadline->result() as $row) {

									            ?>
												
											   <option value="<?php echo $row->deadline_id; ?>"> <?php echo $row->name; ?></option>
											   <?php } ?>
												
											</select>
										</div>

										<div class="form-group">
											<label for="exampleInputPassword1">Total ($)</label>
											<input type="text" id="total" value="8" class="form-control">
										</div>
										
									   <a style="width: 100%;" href="<?php echo base_url() ?>professionalwriting/order_now" class="btn btn-default">
										  Order Now
									   </a>
									</form>
								 </div>


							    </div>




							</div>
						</div>
					</div>

		

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