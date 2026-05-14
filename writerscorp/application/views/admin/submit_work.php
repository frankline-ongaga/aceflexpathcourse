<?php include 'header.php' ?>
<div class="content-page">
                <div class="content">
                    
                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                   
                                    <h4 class="page-title">Submit Work</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">

                         <div class="col-md-9 offset-md-1">


                          <div class="card">
   
    
     
            <div class="box box-default">
                    

                       <?php
                              if(!empty($this->session->flashdata('message'))) { ?>
                             <div class="alert alert-success">
                                <?php echo $this->session->flashdata('message');  ?>
                                 
                             </div>
                            <?php
                             }

                           ?>



              <?php 
             if(isset($error))
             {
              ?>
              <div class="alert alert-warning">
               <?php
                echo $error;
                ?>
               </div>
               <?php
             }

           ?>

           <div class="box-header with-border">
              <h3 class="box-title">Submit Work</h3>
            </div>

          

                      <!--No Label Form-->

                      <!--===================================================-->

                      
             <form action="<?php echo base_url('admin/submit_process') ?>" enctype='multipart/form-data' method="post" style="padding-bottom: 30px;">
              <div class="box-body">
                                 
                                  

                                                    
                            <!-- Tab panes -->
                                   <input type="hidden" name="order_id" value="<?php if(isset($order_id)){ echo $order_id;  } ?>">
                                    
                                    <div class="form-group">
                                        <label for="textArea" class="col-xl-12 form-control-label">Note(optional)</label>
                                        <div class="col-xl-10">
                                            <textarea class="form-control myeditablediv" name="order_delivery_note" rows="7" id="description" required></textarea> 
                                        </div>
                                    </div>
                                 <div class="form-group">
                                  <label for="textArea" class="col-xl-12 form-control-label">Upload File</label>
                                  <div class="col-xl-10">
                                  <input type='file' name='files[]' multiple required>
                                 </div>
                                 </div>

                                 <div class="form-group">
                                   <div class="col-xl-10">
                                <input type="submit" style="color:#fff;" name="submit" class="submit btn btn-primary btn-md" value="Submit Paper" /><br>
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

