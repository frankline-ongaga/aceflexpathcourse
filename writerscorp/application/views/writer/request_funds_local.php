<?php include 'header.php' ?>
<div class="content-wrapper">
  <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></li>
            <li class="active">Request Funds</li>
        </ol>    
  </section>
 

   <br>
    <br>
    
  
  <div class="container-fluid">
    <div class="col-md-7 col-md-offset-2">
   
    
     
            <div class="box box-default">
                    

                     <?php
                              if(!empty($this->session->flashdata('message'))) { ?>
                             <div class="alert alert-success">
                                <?php echo $this->session->flashdata('message');  ?>
                                 
                             </div>
                            <?php
                             }

                           ?>

           <div class="box-header with-border">
              <h3 class="box-title">Request Funds(Minimum Payout (KES 100) )</h3>
            </div>

          

                      <!--No Label Form-->

                      <!--===================================================-->

                      
           
                            <form action="<?php echo base_url('writer/request_funds_process_local') ?>" method="post" style="padding-bottom: 30px;">
                                <div class="box-body">
                                 
                                  

                                                    
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
                               

                              
                              </div> 
                            </form>

                           
          

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

