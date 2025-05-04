 <?php include 'header.php'; ?>
<div class="page light">
<div class="content-wrapper">
                <div class="container">
                   <br> </br>
                    <div class="row">
                     
                        <div class="col-lg-8 col-lg-offset-2 bg-white">
                          <div class="box box-default">
                            <div class="box-body">
                      
                        <legend class="text-center" style="width:83%; padding-top: 20px;">Kindly provide addittional information <br>

                          <small style="font-size: 12px;">Kindly provide additional information as outlined below </small>

                        </legend>

                            <?php
                              if(!empty($error)) { ?>
                             <div class="alert alert-warning">
                                <?php echo $error;  ?>
                                 
                             </div>
                            <?php
                             }

                           ?>
                       
                           <?php
                              if(!empty($i)) { ?>
                             <div class="alert alert-success">
                                <?php echo $i;  ?>
                                 
                             </div>
                            <?php
                             }

                           ?>
                            <form action="<?php echo base_url('writer/apply_process_with_i') ?>" method="post" style="padding-bottom: 30px;" enctype="multipart/form-data">
                                 <div class="box-body">
                              

                                                    
                            <!-- Tab panes -->
                                   <input type="hidden" name="user_id" value="<?php if(isset($user_id)){ echo $user_id;  } ?>">
                                 

                             


                                    <div class="form-group">
                                       <div class="row">
                                         <div class="col-12">
                                        <label for="textArea" class="col-xl-12 form-control-label">Respond</label>
                                        <div class="col-xl-12">
                                           <textarea name="info" rows="7" class="form-control"></textarea>
                                        </div>
                                       </div>
                                      </div>
                                    </div>

                                     <div class="form-group">
                                       <div class="row">
                                         <div class="col-12">
                                        <label for="textArea" class="col-xl-12 form-control-label">Upload File</label>
                                        <div class="col-xl-12">
                                          <input type="file" name="userfile" required>
                                        </div>
                                       </div>
                                      </div>
                                    </div>
                                    
                                    
                                 
                                  
                                   
                                  
                                    
                                   

                                  
                                   
                                   
                                                                       
                               

                                 <div class="form-group">
                                  <div class="row">
                                   <div class="col-12">
                                <input type="submit" style="color:#fff;" name="submit" class="submit btn btn-primary btn-md" value="Send Additional information" /><br>
                                  </div>
                                  </div>
                                </div>
                               

                              
                              </div>
                            </form>
                         

                        </div>
                      </div>
                    </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <?php include 'footer.php'; ?>
       


    