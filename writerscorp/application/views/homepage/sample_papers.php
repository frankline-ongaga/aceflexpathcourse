



        <div class="mesh-background-div relative">
    <div class="mesh-hero-gradient d-flex h-100">
        <div class="container-lg">
            <div class="row align-items-center">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 text-center">
                    <h1 class="mesh-page-title infinite wow animate__slideDownSlightly" data-wow-duration="1.5s" data-wow-delay=".0s">
                       Sample Papers
                    </h1>
                    <p class="mesh-page-description my-3 infinite wow animate__slideUpSlightly" data-wow-duration="1.5s" data-wow-delay=".0s">
                        
                    </p>
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
     
    <div class="bussiness-about-company blog-list-layout">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="padding-top-large"></div>

         <?php
               foreach($samples->result() as $row) {  ?>
                    
          <div class="single-bolg hover01 brainer party">
            <div class="blog-content">
              <a href="#"><?php echo $row->sample_title; ?></a>
                          
                            <p><?php echo $row->sample_paragraph; ?></p>                        
            </div>
                        <a href="<?php echo base_url() ?>home/paper_details_samples/<?php echo $row->sample_slug; ?>" class="bussiness-btn-larg">Read More</a>
          </div>

        <?php } ?>
        
         

                  
                    
                   

 
                </div>
                
                
            </div>
        </div>
    </div>  
      
   <div class="padding-top-large"></div>
      
    <div class="business-cta-2x">
    <div class="business-cta-2-content">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <div class="business-cta-left-2">
              <h2>Get quality writing services </h2>
            </div>
          </div>  
          <div class="col-md-4">
            <div class="business-cta-right-2">
              <a href="<?php echo base_url('home/order_now') ?>" class=" btn bussiness-btn-larg">Place order <i class="fa fa-angle-right"></i> </a>
            </div>
          </div>  
        </div>  
      </div>  
    </div>  
  </div>
      
