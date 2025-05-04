<?php include 'header.php' ?>
<div class="content-page">
                <div class="content">
                    
                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                   
                                    <h4 class="page-title">Send Revision Request to Writer</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">

                         <div class="col-md-9 offset-md-1">


                          <div class="card">
                                    <div class="card-body">

                              <div class="card-body">
                                  <h5>Send Revision details to writer</h5>

                               <form method="post" action="<?php echo base_url('admin/mark_revise'); ?>">
                                <input type="hidden" name="order_id" value="<?php if(isset($order_id)) { echo $order_id; }?>">
                                <textarea class="form-control" name="revision_details" rows="8" required></textarea>
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
        </main>
<?php include 'footer.php'; ?>