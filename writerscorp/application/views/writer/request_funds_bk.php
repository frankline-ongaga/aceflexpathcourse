 <?php include 'header.php'; ?>
<div class="page light">
<div class="content-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                          <section class="p-t-20">
                              <?php include 'buyer_menu.php' ?>
                            </section>
                        </div>

                        <div class="col-md-9">
                          <div class="row">
                            <div class="col-md-12">
                           <section class="p-t-20 bg-white" style="margin-top: 50px;">

                      
                      
                        <legend class="text-center" style="width:83%; padding-top: 20px;">Request Funds(Minimum Payout ($20) )

                         

                        </legend>
                       
                           <?php
                              if(!empty($this->session->flashdata('message'))) { ?>
                             <div class="alert alert-success">
                                <?php echo $this->session->flashdata('message');  ?>
                                 
                             </div>
                            <?php
                             }

                           ?>
                            <?php if($balance>=3) {?>
                            <form action="<?php echo base_url('writer/request_funds_process') ?>" method="post" style="padding-bottom: 30px;">
                                 
                                  

                                                    
                            <!-- Tab panes -->
                                   <input type="hidden" name="writer_id" value="<?php if(isset($writer_id)){ echo $writer_id;  } ?>">
                                      <div class="form-group">
                                      <div class="col-5 offset-md-3">
                                     
                                        <label for="inputEmail" class="col-xl-12 form-control-label">Request Amount</label>
                                        <div class="col-xl-12">
                                              <input type="number" class="form-control" name="request_amount" required>
                                        </div>
                                       </div>
                                     
                                        
                                     
                                    </div>
                                   

                                 <div class="form-group">
                                  <div class="col-5 offset-md-3">
                                   <div class="col-xl-12">
                                <input type="submit" style="color:#fff;" name="submit" class="submit btn btn-primary btn-md" value="Request Funds" /><br>
                                  </div>
                                 </div>
                                </div>
                               

                              
                                 
                            </form>

                            <?php 
                          }
                          else
                           { ?>
                                 <div class="alert alert-warning text-center">
                                  
                                    The minimum amount you can request is $20

                                 </div>


                          <?php } ?>
                         
                            </section>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>

     <?php include 'footer.php'; ?>
     <script type="text/javascript">

      $("#countrylist option[value=<?php echo $country; ?>]").prop("selected", "selected");

      </script>


