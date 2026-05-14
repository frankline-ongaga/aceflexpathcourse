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
                                  <h5>Change Pricing on Packages (US Cents)</h5>

                               <form method="post" action="<?php echo base_url('admin/settings_pricing'); ?>">
                                 <?php
                                $total=0;
                                foreach ($e->result() as $row)
                                {   ?>
                                <label><?php if(isset($row->level_name)) { echo $row->level_name;  }   ?></label>
                                <input class="form-control" name="<?php if(isset($row->level_name)) { echo $row->level_name;  }   ?>" value="<?php if(isset($row->level_per_word)) { echo $row->level_per_word;  }   ?>" type="number" required step="any">
                                <?php } ?>
                               
                                <br>
                                <button class="btn btn-primary" type="submit">Change Rates</button>
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