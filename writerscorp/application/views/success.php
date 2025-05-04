<?php include 'header.php' ?>

<div class="page-intro">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <ol class="breadcrumb">
                <li><i class="fa fa-home pr-10"></i><a href="<?php echo base_url(); ?>">Home</a></li>
                <li class="active">Success</li>
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
               
                <div class="col-md-5 col-md-offset-3">
                 <div class="login-wrapper">
                       <h2 class="page-title" style="text-align: center; position: relative; bottom: 15px;">Payment Success</h2>

                       <h5>Dear Client,</h5>
  
                      <span>Your payment was successful, thank you for placing you order.</span><br/>
                     
                      <span>Transaction ID : 
                          <strong><?php echo $txn_id; ?></strong>
                      </span><br/>
                      <span>Amount Paid : 
                          <strong>$<?php echo $payment_amt.' '.$currency_code; ?></strong>
                      </span><br/>
                      <span>Payment Status : 
                          <strong><?php echo $status; ?></strong>
                      </span><br/>                             
                       
                        
                      
                 
                                   
              
                  
                  
                </div>
               </div>
                <!-- sidebar start -->
               
                <!-- sidebar end -->
              </div>
              <hr>
            </div>
            <!-- main end -->

          </div>
        </div>
      </section>


<?php include 'footer.php' ?>
