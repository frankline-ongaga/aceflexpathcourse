<?php include 'header.php' ?>
<div class="content-page">
                <div class="content">
                    
                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                   
                                    <h4 class="page-title">Notification</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">

                         <div class="col-md-9 offset-md-1">


                          <div class="card">
                             

                              <div class="card-body">
                                <?php 
                                  if(isset($notification)) {
                                    ?>
                                     <div class="alert alert-success">
                                       <?php

                                            echo $notification;
                                        ?>
                                       </div>
                                    <?php
                                  }
                                ?>
                         

                              </div>
                             
                              
                             
                            </div>
                          </div>

                       
                      </div>
                      
                  
                      
                       </div>
                    </div>
                </div>
            </div>
         
        </main>
<?php include 'footer.php'; ?>