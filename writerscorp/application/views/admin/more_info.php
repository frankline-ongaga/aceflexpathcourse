<?php include 'header.php' ?>
<div class="content-page">
                <div class="content">
                    
                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                   
                                    <h4 class="page-title">Request more information from applicant</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">

                         <div class="col-md-9 offset-md-1">


                          <div class="card">
                                    <div class="card-body">
                                        <!-- <h4 class="header-title">Writer Details</h4> -->
        
                    
                     
                          <div class="col-md-12 px-3">

                            <div class="card-block px-3">
                            <br>
                             

                              <div class="card-body">
                                  <h5>Request more information from applicant</h5>

                               <form method="post" action="<?php echo base_url('admin/request_more_info'); ?>">
                                <input type="hidden" name="writer_id" value="<?php if(isset($writerid)) { echo $writerid; }?>">
                                <textarea class="form-control" name="more_info" rows="8" required></textarea>
                                <br>
                                <button class="btn btn-primary" type="submit">Send Response</button>
                               </form>
                             
                         

                              </div>
                             
                              
                             
                            </div>
                          </div>

                       
                      </div>
                      
                  
                      
                       </div>
                    </div>
                </div>
            </div>
        </div>
<?php include 'footer.php'; ?>