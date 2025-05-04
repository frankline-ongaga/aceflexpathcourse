<div class="page-wrapper">
      <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
          <div class="breadcrumb-title pe-3">Request Revision</div>
          <div class="ps-3">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Request Revision</li>
              </ol>
            </nav>
          </div>
         
        </div>
        <!--end breadcrumb-->
        <div class="row">
          <div class="col-xl-9 mx-auto">
            <h6 class="mb-0 text-uppercase">Request Revision</h6>
            <hr/>
              <div class="card">
                 <div class="card-body">
                    

                     <?php 
             if(isset($success))
             {
              ?>
              <div class="alert alert-success">
               <?php
                echo $success;
                ?>
               </div>
               <?php
             }

           ?>


          

                      <!--No Label Form-->

                      <!--===================================================-->

                      
          

           

                <div class="col-md-8">
                      <div class="custom-form">
                        <div class="form-wrapper">
                            <?php if(isset($error)){ ?>
                                         <div class="alert alert-warning">
                                           <?php echo $error; ?>
                                          </div>

                                 <?php     } ?>
                           <form method="post" id="revision" action="<?php echo base_url() ?>client/request_revision_process_new" enctype="multipart/form-data">
                            
                           
                          

                             
                               <div class="row mb-3 form-group">
                                    <input type="hidden" id="order_id" name="order_id" value="<?php if(isset($order_id)){ echo $order_id; } ?>">
                                
                                    <textarea rows="8" class="form-control mb-3" id="order_revision_details" name="order_revision_details" placeholder="Describe your revision" required><?php if(isset($order_revision_details)){ echo $order_revision_details; } ?></textarea>
                                </div>
                              <br>
                            
                            

                           

                              <div class="row mb-3 form-group">
                                                      <label class="row" for="example-textarea">Upload Files</label>
                                                      <div class="row">
                                                         <div class="dropzone" id="myDropzonerevision"></div>
                                                       </div>
                                </div>


           

                            

                                

                            <div class="spacer">&nbsp;</div>

                           
                                <button class="btn btn-primary" type="submit" id="submit-all"><i class="fa fa-plus"></i> REQUEST REVISION</button>
                           
                           </form>

                            <!-- / text-center
                         
                        </div><!-- / form-wrapper -->
                    </div><!-- / custom-form -->
                    
                </div><!-- / column -->
             </div>
            


        
                 
                               

                              
                                 
                           

                      <!--===================================================-->

                      <!--End No Label Form-->

          

                  </div>




            

            <!--===================================================-->

            <!--END MAIN NAVIGATION-->


       </div>
    </div>

</div>
</div>

</div>



     

