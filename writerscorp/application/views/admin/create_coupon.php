<?php include 'header.php' ?>
<div class="content-page">
                <div class="content">
                    
                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                   
                                    <h4 class="page-title">Create Coupon</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">

                         <div class="col-md-9 offset-md-1">


                          <div class="card">
                                    <div class="card-body">
                       
                           <?php

                              if(!empty($message)) { ?>

                             <div class="alert alert-success">
                                <?php echo $message;  ?>
                                 
                             </div>

                            <?php
                             }

                           ?>
                            <form action="<?php echo base_url('admin/create_coupon_process') ?>" method="post" style="padding-bottom: 30px;">
                                 
                                

                                                    
                            <!-- Tab panes -->
                                 
                                  

                             



                                  <div class="form-group">
                                  
                                        
                                        <label for="inputEmail" class="col-xl-8 form-control-label">Coupon Code</label>
                                        <div class="col-xl-10">
                                            <input style="text-transform:uppercase" class="form-control" value="" name="coupon_code" id="title" min="6"  type="text" required>
                                        </div>
                                       
                                        
                                  </div>

                                  <div class="form-group">
                                        
                                        <label for="inputEmail" class="col-xl-8 form-control-label">Percentage Discount</label>
                                        <div class="col-xl-10">
                                            <input class="form-control" value="" onkeyup="get_due()" name="coupon_discount" id="perc" min="6"  type="text" max="70" required>
                                        </div> 
                                       
                                        
                                  <div class="form-group">
                                        
                                        <label for="inputEmail" class="col-xl-8 form-control-label">Original (sample)</label>
                                        <div class="col-xl-10">
                                            <input class="form-control" value="100" name="coupon" id="title"   type="text" readonly>
                                        </div>
                                       
                                        
                                  </div>

                                  <div class="form-group">
                                        
                                        <label for="inputEmail" class="col-xl-8 form-control-label">After Discount</label>
                                        <div class="col-xl-10">
                                            <input class="form-control" name="coupon" id="due"  type="text" readonly>
                                        </div>
                                       
                                        
                                  </div>
                                   

                                 <div class="form-group">
                                   <div class="col-xl-10">
                                <input type="submit" style="color:#fff;" name="submit" class="submit btn btn-primary btn-md" value="Add Coupon" /><ebr>
                                  </div>
                                </div>
                               

                              
                                 
                            </form>
                        
                                            </div>
    
                                           
                                        </div>
                                        <!-- end row -->
    
                                    </div>

                                </div>


                          </div>
                           
                          
                        </div>
                        <!--- end row -->

                       
                        <!-- end row -->

                       
                        <!-- end row -->

                       
                        <!-- end row -->

                      
                        <!-- end row -->


                       
                        <!-- end row -->  
                        
                    </div> <!-- end container-fluid -->

                </div> <!-- end content -->
            </body>
        <?php include 'footer.php'; ?>
       
     
      <script type="text/javascript">
            function get_due() {
            $(document).ready(function() {        
              
                   var days = 0;
                 
                   var perce=$("#perc").val();
                   var balpercent=100-perce;
                   var amount = (balpercent/100)*100;

                   console.log(perce);

                    
                   //round up

                  
                   
                  
                    if (amount == 0) {
                        $('#due').val('');
                    } else {                
                        $('#due').val(amount);
                    }
               
            }); 
         
        }

       
     </script>
    


    