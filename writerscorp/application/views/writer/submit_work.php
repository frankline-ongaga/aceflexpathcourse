<?php include 'header.php' ?>
<div class="content-wrapper">
  <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></li>
            <li class="active">Submit Work</li>
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

                      
             <form action="<?php echo base_url('writer/submit_process_new') ?>" enctype='multipart/form-data' method="post" style="padding-bottom: 30px;">
              <div class="box-body">
                                 
                                  

                                                    
                            <!-- Tab panes -->
                                   <input type="hidden" name="order_id" value="<?php if(isset($order_id)){ echo $order_id;  } ?>">
                                    
                                <div class="form-group">
                                        <label for="textArea" class="col-xl-12 form-control-label">Note</label>
                                        <div class="col-xl-10">
                                            <textarea class="form-control myeditablediv" name="order_delivery_note" rows="7" id="description" required></textarea> 
                                        </div>
                                 </div>
                               
                                 <div class="form-group">
                                  <label for="textArea" class="col-xl-12 form-control-label">Upload File</label>
                                  <div class="col-xl-10">
                                 <input type="file" name="files[]" required multiple>
                                 </div>
                                 </div>
                                  <div class="form-group">
                                  <label for="textArea" class="col-xl-12 form-control-label">Upload Plagiarism Report(s)</label>
                                  <div class="col-xl-10">
                                 <input type="file" name="plagiarism[]" required multiple>
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

