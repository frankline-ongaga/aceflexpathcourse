<div class="business-banner">                 
        <div class="hvrbox">
            <img src="images/slider-3.jpg" alt="Mountains" class="hvrbox-layer_bottom">
            <div class="hvrbox-layer_top">
                <div class="container">
                    <div class="overlay-text text-left">            
                        <h3>Sample Papers</h3>
                        <nav aria-label="breadcrumb">
                          <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Sample Papers</li>
                          </ol>
                        </nav>
                    </div>
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
               foreach($h->result() as $row) {  ?>
                    
          <div class="single-bolg hover01 brainer">
            <div class="blog-content">
              <a href="single.html"><?php echo $row->sample_title; ?></a>
                          
                            <p><?php echo $row->sample_paper; ?></p>                        
            </div>
                        <a href="<?php echo base_url() ?>home/order_now" class="bussiness-btn-larg">Order a similar paper</a>
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
              <h2>Looking for an excelent business solution ?</h2>
            </div>
          </div>  
          <div class="col-md-4">
            <div class="business-cta-right-2">
              <a href="#" class="bussiness-btn-larg">Get a Quote <i class="fa fa-angle-right"></i> </a>
            </div>
          </div>  
        </div>  
      </div>  
    </div>  
  </div>

      
