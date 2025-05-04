<?php include 'header.php'; ?>
<div class="content-wrapper">
                <div class="container">
                   <div class="row">
                 
                       <div class="col-md-8 p-t-20 offset-md-2" >
                      
                         <div class="card" style="margin-bottom: 25px;">
                    
                     
                          <div class="col-md-12 px-3">

                            <div class="card-block px-3">
                            <br>
                             

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
                                  <h5>Change commission charged on orders</h5>

                               <form method="post" action="<?php echo base_url('admin/settings_commission'); ?>">
                               
                                <input class="form-control" name="commission" type="number" value="<?php if(isset($comm)){
                                  echo $comm;
                                  } ?>" required>
                                <br>
                                <button class="btn btn-primary" type="submit">Change Commission</button>
                               </form>
                             
                         

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