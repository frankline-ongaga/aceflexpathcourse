<?php include 'header.php' ?>
<div class="content-page">
                <div class="content">
                    
                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                   
                                    <h4 class="page-title">Request Revision</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">

                         <div class="col-md-9 offset-md-1">


                          <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Request Revision</h4>
   
    
     
            <div class="box box-success">
                    

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

                      
          

             <div class="box-body">
                                 
                                

                                                    
                            <!-- Tab panes -->

                                 
                                  

                               <div class="container kevvy">
       
         
                     <br>
        

                <div class="col-md-7 offset-md-2 mt-3 mb-3 right-area animated fadeInRight second">
                      <div class="custom-form">
                        <div class="form-wrapper">
                            <?php if(isset($error)){ ?>
                                         <div class="alert alert-warning">
                                           <?php echo $error; ?>
                                          </div>

                                 <?php     } ?>
                           <form method="post" action="<?php echo base_url() ?>admin/request_revision_process_new" enctype="multipart/form-data">
                            
                           
                          

                             
                               <div class="form-group">
                                    <input type="hidden" name="order_id" value="<?php if(isset($order_id)){ echo $order_id; } ?>">
                                
                                    <textarea rows="8" class="form-control mb-3" name="order_revision_details" placeholder="Describe your revision" required><?php if(isset($order_revision_details)){ echo $order_revision_details; } ?></textarea>
                                </div>
                              <br>
                            
                            

                              <div class="form-group">

                                <label for="fileupload"> Select a file to upload (Optional)</label>
                                    <input type='file' name='files[]' multiple>
                                    
                              </div><!-- / sub-col -->

           

                            

                                

                            <div class="spacer">&nbsp;</div>

                            <div class="text-center">
                                <button class="btn btn-primary ml-auto mr-auto" type="submit"><i class="fa fa-plus"></i> <span class="va-middle">REQUEST A REVISION</span></button>
                            </div>
                           </form>

                            <!-- / text-center
                         
                        </div><!-- / form-wrapper -->
                    </div><!-- / custom-form -->
                    
                </div><!-- / column -->
             </div>
            


        
                  </div>
                                    
                                 
                                 
                                    
                                   

                                  
                                    
                                                                       
                               

                              



                            </div>
                               

                              
                                 
                           

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
       


     

