<?php include 'header.php'; ?>

<div class="light b-t">
            <div id="primary" class="content-area" data-bg-possition="center" data-bg-repeat="false" style="background: url('assets/img/icon/icon-circles.png');">
                <main id="main" class="site-main" role="main">
                    <div class="container">
                        <div class="col-xl-8 mx-lg-auto p-t-b-80">
                            <header class="text-center">
                                <h1>Transaction Successful</h1>
                                <p class="section-subtitle">Your transaction was successful, detail is as follows</p> 
                                <span>Transaction ID : 
                                <strong><?php echo $txn_id; ?></strong>
                                  </span><br/>
                                  <span>Amount Paid : 
                                      <strong>$<?php echo $payment_amt; ?></strong>
                                  </span><br/>
                                  <span>Payment Status : 
                                      <strong><?php echo $status; ?></strong>
                                  </span><br/>       
                            </header>
                           
                        </div>
                    </div>
                </main>
                <!-- #main -->
            </div>
            <!-- #primary -->
        </div>
<?php include 'footer.php'; ?>
