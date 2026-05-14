 <div class="business-banner">                 
        <div class="hvrbox">
            <img src="<?php echo base_url('loop/images/essayloopcollege.webp') ?>" alt="student essays" class="hvrbox-layer_bottom">
            <div class="hvrbox-layer_top">
                <div class="container">
                    <div class="overlay-text text-left">            
                        <h3>Details</h3>
                        <nav aria-label="breadcrumb">
                          <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Details</li>
                          </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>                       
    </div> 
<section id="features" class="section-yellow padding-top-bottom god">
           <div class="container kevvy">
          
           <br>
<div class="container kevvy">
        
        	
        	
        	 <br>
        	

             <div class="row">


              <?php
               foreach($h->result() as $row) {  ?>
                <div class="blog-box">
            
              <header class="post-header">
                <h1 class="post-title"><?php  echo $row->post_title ?></h1>
              </header>
              
              
              
              <div class="post-content">
              
                <div class="post-excerpt" style="text-align: left;">
                
                  <p style="font-weight: 400;"><?php  echo $row->post_content ?></p>
              
                </div>
                
              </div>
              
              
              
            </div>

            <?php } ?>

              
            </div>


       
</div>
 </section>
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