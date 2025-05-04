
        <!-- Page Title -->
        <section class="page-heading parallax effect-section" style="background-image: url(static/img/bg-1.webp);">
            <div class="mask bg-primary opacity-8"></div>
            <div class="container position-relative">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h1 class="text-white h1 mb-4">Blog</h1>
                        
                    </div>
                </div>
            </div>
        </section>
        <!-- End Page Title -->
        <!-- Section -->
        <section class="section">
            <div class="container">
                <div class="row">
                  <div class="col-md-9">
                    <div class="row">
                    <?php 
           // echo $h->num_rows();
                        foreach($h->result() as $row){ ?>

                    <div class="col-md-6 mb-5">
                        <div class="hover-top card shadow-only-hover">
                           
                            <div class="card-body">
                                <h5 class="mb-3"><a class="text-dark stretched-link" href="<?php echo base_url() ?>blog/<?php echo $row->post_name; ?>"> <?php
                                              echo  $row->post_title;
                                              ?></a></h5>
                                <p> 
                                      <?php
                                           echo $row->post_excerpt;
                                      ?>
                                          
                                      </p>
                                <div class="nav small border-top pt-3">
                                  
                                    <a class="text-body font-w-600 ms-auto" href="<?php echo base_url() ?>blog/<?php echo $row->post_name; ?>">Read More <i class="fas fa-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                   <?php } ?>

                    <?= $links; ?>

                    
                   </div>
                  </div>
                  <div class="col-md-3">

                      <?php include 'sidebar.php'; ?>


                  </div>



                </div>
            </div>
        </section>
        <!-- End section -->
