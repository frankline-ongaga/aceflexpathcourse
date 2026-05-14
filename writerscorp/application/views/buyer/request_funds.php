<?php include 'header.php' ?>
<div class="content-page">
                <div class="content">
                    
                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                   
                                    <h4 class="page-title">Request Funds</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">

                         <div class="col-md-9 offset-md-1">


                          <div class="card">
                                    <div class="card-body">
                    

                     <?php
                              if(!empty($this->session->flashdata('message'))) { ?>
                             <div class="alert alert-success">
                                <?php echo $this->session->flashdata('message');  ?>
                                 
                             </div>
                            <?php
                             }

                           ?>

           <div class="box-header with-border">
              <h4>Request Funds(Minimum Payout ($20) )</h4>
            </div>

          

                      <!--No Label Form-->

                      <!--===================================================-->

                      
            <?php if($balance>=3) {?>
                            <form action="<?php echo base_url('client/request_funds_process') ?>" method="post" style="padding-bottom: 30px;">
                                <div class="box-body">
                                 
                                  

                                                    
                            <!-- Tab panes -->
                                   <input type="hidden" name="user_id" value="<?php if(isset($user_id)){ echo $user_id;  } ?>">
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
          

                  </div>




            

            <!--===================================================-->

            <!--END MAIN NAVIGATION-->


       </div>
    </div>

</div>

        



        <!-- FOOTER -->

        <!--===================================================-->

       <?php include 'footer.php'; ?>
         <script type="text/javascript">

       
       $(document).ready(function() {
          $('.js-example-basic-multiple').select2();
        });

     // $("#countrylist option[value=<?php //echo $country; ?>]").prop("selected", "selected");

      </script>
       <script type="text/javascript">

      $("#countrylist option[value=<?php echo $country; ?>]").prop("selected", "selected");

      </script>

