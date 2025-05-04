<?php include 'header.php' ?>
<div class="content-page">
                <div class="content">
                    
                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                   
                                    <h4 class="page-title">Coupon Management</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">

                         <div class="col-md-9 offset-md-1">


                          <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Coupon Management</h4>
                                       
    
                                        <div class="table-responsive">
                                            <table class="table table-striped mb-0">
                                                <thead>
                                                       <tr>
                                                            <th>#</th>
                                                            <th>Coupon Code</th>
                                                            <th>Coupon Discount</th>
                                                            <th>Action</th>
                                                        </tr>
                                                </thead>
                                                <tbody>
                                                     <?php
                                                        foreach ($h->result() as $row)
                                                        {   ?>
                                                        <tr>
                                                            <td><?php if(isset($row->coupon_id)) { echo $row->coupon_id;  }   ?></td>
                                                            <td><?php if(isset($row->coupon_code )) { echo $row->coupon_code;  }   ?></td>
                                                            <td><?php if(isset($row->coupon_discount)) { echo $row->coupon_discount;  }   ?></td>
                                                         
                                                          
                                                             <td><?php if(isset($row->coupon_status)) { 

                                                                         if($row->coupon_status==0)
                                                                          { ?>
                                                                            <a href="<?php echo base_url('admin/change_coupon_status/0/').$row->coupon_id; ?>">
                                                                             <button class="btn btn-md btn-warning">Deactivate</button>
                                                                            </a>
                                                                         <?php
                                                                          }
                                                                         else
                                                                         { ?>
                                                                         <a href="<?php echo base_url('admin/change_coupon_status/1/').$row->coupon_id; ?>">
                                                                          <button class="btn btn-md btn-success">Activate</button>
                                                                         </a>

                                                                       <?php  }


                                                                     }   ?></td>
                                                        </tr>
                                                       <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
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

                

                <!-- Footer Start -->
               
       <?php include 'footer.php'; ?>