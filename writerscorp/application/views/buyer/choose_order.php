<?php include 'header.php'; ?>       
        <div class="page light">
            <div class="content-wrapper animatedParent animateOnce">
                <div class="container">
                  <div class="row">
                  <div class="col-md-3">
                    <section class="">
                        <?php include 'buyer_menu.php' ?>
                      </section>
                  </div>
                  <div class="col-md-9">

                 
                    <section class="me">
                    <div class="row">
                       <div class="col-md-12 text-center">
                       <h3>Select your Plan</h3>
                            <br>

                            <a href="<?php echo base_url('buyer/order_subscription') ?>">
                              <button class="btn btn-lg btn-success">Subscription</button>
                            </a>
                             <br> <br>
                            <a href="<?php echo base_url('buyer/order') ?>">
                            <button class="btn btn-lg btn-warning">Per Page</button>
                            </a>

                      
                     </div>
                    </div>
                   </section>
                 </div> <!-- end of tab-->
                 </div>
                </div>
            </div>
        </div>
<?php include 'footer.php'; ?>       