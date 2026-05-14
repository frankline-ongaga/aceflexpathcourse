	<?php 
           // echo $h->num_rows();
                                       foreach($h->result() as $row){ ?>
        <!-- Page Title -->
     


<main id="content">
  


<div class="mesh-background-div relative">
    <div class="mesh-hero-gradient d-flex h-100">
        <div class="container-lg">
            <div class="row align-items-center">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 text-center">
                    <h1 class="mesh-page-title infinite wow animate__slideDownSlightly" data-wow-duration="1.5s" data-wow-delay=".0s">
                       <?php
									          echo  $row->post_title;
									          ?>
                    </h1>
                    <br>
                 
                    <a href="<?php echo base_url('order_now'); ?>" class="mesh-button px-3 infinite wow animate__slideLeftSlightly" data-wow-duration="1.5s" data-wow-delay=".0s">
                        Place Your Order Now
                    </a>
                </div>
                <!-- Image column (commented out)
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 text-end">
                    <img src="assets/images/teaspage.png" alt="" class="w-100" style="--animate-duration: 6s; height:100%" />
                </div>
                -->
            </div>
        </div>
    </div>
</div>
        <!-- End Page Title -->
        <!-- Section -->
        <section class="section">
	
           <p class="lead mb-3 text-center"> </p> 
           <br>
			
			<article class="post">
			
				<div class="container scrollimation fade-up in">
					
					<div class="row">
						
					
						<div class="col-sm-12 blog-box">
						   <div class="single-bolg hover01 brainer party">
                              <div class="blog-content">
						
							<header class="post-header">
								<h1 class="post-title">
									        
                                   </h1>
								<!-- <small class="post-meta">March 28 2014 , in <a href="blog-travel.html">Travelling</a></small> -->
							</header>
							
							
							
							<div class="post-content">
							
								<div class="post-excerpt">
									<p>
								
									 <?php
                                           echo $row->post_content;
                                      ?>
                                     </p>
							
								</div>
								
							</div>
							
							<footer>
								<p><a class="btn btn-primary" href="<?php echo base_url('order_now'); ?>">Order Now</a></p>
							</footer>
							</div>
						  </div>
						</div>
					<?php } ?>
						
					</div><!--End row -->
					
				</div><!--End container -->
			
			</article><!--End post -->

			
			
			
			
			
			
		
			
		</section>
