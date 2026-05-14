<?php include 'header.php' ?>
<div class="content-wrapper">
  <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></li>
            <li class="active">Send Message to Support</li>
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
              <h3 class="box-title">Set Payment Option</h3>
            </div>

          

                      <!--No Label Form-->

                      <!--===================================================-->

                      
            <form action="<?php echo base_url('writer/set_payment_option') ?>" method="post" style="padding-bottom: 30px;">
                     <div class="box-body">
                                  

                                                    
                            <!-- Tab panes -->
                                   <input type="hidden" name="writer_id" value="<?php if(isset($writer_id)){ echo $writer_id;  } ?>">
                                      <div class="form-group">
                                      <div class="col-5 offset-md-3">
                                     
                                        <label for="inputEmail" class="col-xl-12 form-control-label">Choose payment type</label>
                                        <div class="col-xl-12">
                                               <select name="payment_type" class="form-control" id="countrylist" required>
                                            <option></option>
                                            <?php
                                              $country='';
                                             foreach ($p->result() as $row)
                                              {  
                                                 $country=$row->type_id;

                                                ?>
                                                
                                                <option value="<?php echo $row->payment_id; ?>"><?php echo $row->payment_name; ?></option>
                                              <?php } ?>
                                            </select>
                                          </div>
                                        </div>
                                      </div>
                                           
                                      <div class="form-group">
                                      <div class="col-5 offset-md-3">
                                              <label for="inputEmail" class="col-xl-12 form-control-label">Paypal Email</label>
                                                <div class="col-xl-12">
                                                  <input type="text" name="paypalid" class="form-control" value="<?php if(!empty($paypalid)){ echo $paypalid; } ?>" required>
                                                </div>

                                        </div>
                                       </div>
                                     
                                        
                                   
                                   

                                 <div class="form-group">
                                  <div class="col-5 offset-md-3">
                                   <div class="col-xl-12">
                                <input type="submit" style="color:#fff;" name="submit" class="submit btn btn-primary btn-md" value="Update Payment" /><br>
                                  </div>
                                 </div>
                                </div>
                               

                              
                              </div>    
                            </form>

                      <!--===================================================-->

                      <!--End No Label Form-->

          

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

