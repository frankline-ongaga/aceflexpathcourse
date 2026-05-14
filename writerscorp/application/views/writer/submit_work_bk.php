 <?php include 'header.php'; ?>
<div class="page light">
<div class="content-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 offset-lg-2 bg-white">
                      
                        <legend class="text-center" style="width:83%; padding-top: 20px;">Submit work <br>

                         

                        </legend>
                       
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
                            { ?>
                            <div class="alert alert-warning" style="text-align:center">
                              <?php
                                echo $error;
                              ?>
                             </div>
                          <?php
                           
                            }  
                            ?>
                            <form action="<?php echo base_url('writer/submit_process') ?>" enctype='multipart/form-data' method="post" style="padding-bottom: 30px;">
                                 
                                  

                                                    
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
                                 <input type="file" name="assignment" required>
                                 </div>
                                 </div>

                                 <div class="form-group">
                                   <div class="col-xl-10">
                                <input type="submit" style="color:#fff;" name="submit" class="submit btn btn-primary btn-md" value="Submit Paper" /><br>
                                  </div>
                                </div>
                               

                              
                                 
                            </form>
                         

                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
     <?php include 'footer.php'; ?>
     <script type="text/javascript">

      $("#countrylist option[value=<?php echo $country; ?>]").prop("selected", "selected");

      </script>
    