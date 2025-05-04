<?php include 'header.php' ?>
<div class="content-page">
                <div class="content">
                    
                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                   
                                    <h4 class="page-title">Affiliate Rate</h4>
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
                            <form action="<?php echo base_url('admin/create_affiliate_process') ?>" method="post" style="padding-bottom: 30px;">
                                 
                                

                                                    
                            <!-- Tab panes -->
                                 
                                  

                             



                              
                                  <div class="form-group">
                                        
                                        <label for="inputEmail" class="col-xl-8 form-control-label">Affiliate Rate</label>
                                        <div class="col-xl-10">
                                            <input class="form-control" value="<?php if(isset($affiliate)){ echo $affiliate; } ?>" onkeyup="get_due()" name="affiliate_rate" id="perc" min="1"   type="text" max="70" required>
                                        </div> 
                                       
                                        
                                  <div class="form-group">
                                        
                                        <label for="inputEmail" class="col-xl-8 form-control-label">Original (sample)</label>
                                        <div class="col-xl-10">
                                            <input class="form-control" value="100" name="coupon" id="title"   type="text" readonly>
                                        </div>
                                       
                                        
                                  </div>

                                  <div class="form-group">
                                        
                                        <label for="inputEmail" class="col-xl-8 form-control-label">After Afilliate Rate</label>
                                        <div class="col-xl-10">
                                            <input class="form-control" name="coupon" id="due"  type="text" readonly>
                                        </div>
                                       
                                        
                                  </div>
                                   

                                 <div class="form-group">
                                   <div class="col-xl-10">
                                <input type="submit" style="color:#fff;" name="submit" class="submit btn btn-primary btn-md" value="Update Affiliate Rate" /><ebr>
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
    


    