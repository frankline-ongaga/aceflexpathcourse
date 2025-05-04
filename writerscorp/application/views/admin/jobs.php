



<?php include 'header.php' ?>
<div class="content-page">
                <div class="content">
                    
                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                   
                                    <h4 class="page-title">Take up orders</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">

                         <div class="col-md-9 offset-md-1">


                        <?php
                        if($h->num_rows()>0) {
                        foreach ($h->result() as $row)
                        {   ?>


                          <div class="card">
                                    <div class="card-body">
                                       
                                       
    
                      
                      
                          <h3 class="box-title"><?php if(isset($row->order_title)) { echo $row->order_title;  }   ?></h3>

                          <div class="box-tools pull-right">
                           <?php if(isset($row->industry_name)) { echo $row->industry_name;  }   ?>
                          </div>
                          <!-- /.box-tools -->
                       
                        <!-- /.box-header -->
                        <div class="box-body" style="">
                          <?php if(isset($row->order_description)) { echo $row->order_description;  }   ?>
                          <br>  <br>
                              <a href="<?php echo base_url('admin/get_job_details/').$row->order_id ?>" class="btn btn-primary">Apply</a>
                              &nbsp; &nbsp;
                               <a href="#myModal<?php echo $row->order_id;  ?>" data-target="#myModal<?php echo $row->order_id;  ?>" data-toggle="modal"><button class="btn btn-warning">Process Cancellation</button></a>

                                                                <div class="modal" id="myModal<?php echo $row->order_id;  ?>">
                                                                <div class="modal-dialog">
                                                                  <div class="modal-content">

                                                                    <!-- Modal Header -->
                                                                    <div class="modal-header">
                                                                      <h4 class="modal-title">Process Refund</h4>
                                                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                    </div>

                                                                    <!-- Modal body -->
                                                                    <div class="modal-body">
                                                                      <form method="post" action="<?php echo base_url('admin/process_refund') ?>">
                                                                         <input type="hidden" name="order_id" value="<?php if(isset($row->order_id)) { echo $row->order_id;  }   ?>">
                                                                         <label>Order Amount</label>
                                                                         <input type="number" class="form-control" value="<?= $row->order_amount ?>" name="amount" placeholder="amount" required readonly="">

                                                                          <label>Refund Amount</label>
                                                                         <input type="number" max="<?= $row->order_amount ?>" class="form-control" name="refund_amount" placeholder="amount" required>

                                                                         <br>

                                                                         <button type="Submit" class="btn btn-primary">Submit</button>

                                                                      </form>
                                                                    </div>

                                                                    <!-- Modal footer -->
                                                                    <div class="modal-footer">
                                                                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                    </div>

                                                                  </div>
                                                                </div>
                                                              </div>



                        </div>
                        <!-- /.box-body -->

                         </div>
                         </div>
                      
                      <?php
                        }
                       }
                       else
                       {
                        ?>
                        <div class="alert alert-success">
                           Sorry no matching jobs available.
                        </div>
                        <?php
                       }
                      ?>
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