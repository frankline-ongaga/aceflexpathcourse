<div class="page-wrapper">
      <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
          <div class="breadcrumb-title pe-3">Pending Payments</div>
          <div class="ps-3">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Pending Payments</li>
              </ol>
            </nav>
          </div>
         
        </div>
        <!--end breadcrumb-->
        <div class="row">
          <div class="col-xl-9 mx-auto">
            <h6 class="mb-0 text-uppercase">Pending Payments</h6>
            <hr/>
              <div class="card">
                 <div class="card-body">
                     <div class="table-responsive">
                                            <table class="table table-striped mb-0"  id="example">
                                                <thead>
                                                      <tr>
                                                            <th>#</th>
                                                            <th>Paper Title</th>
                                                           
                                                            <th>Amount</th>
                                                            <th>Pay Now</th>
                                                            <th>Action</th>
                                                            <th>Edit</th>
                                                            
                                                            <th>Delete</th>
                                                        </tr>
                                                </thead>
                                                <tbody>
                                                   
                                                      <?php
                                                          foreach ($awaiting->result() as $row)
                                                          {   ?>
                                                          <tr>
                                                              <td><?php if(isset($row->order_id)) { echo $row->order_id;  }   ?></td>
                                                              <td><?php if(isset($row->order_title)) { echo $row->order_title;  }   ?></td>
                                                             
                                                              <td><?php if(isset($row->order_amount)) { echo $row->order_amount;  }   ?></td>
                                                             

                                                               <td><a href="<?php echo base_url('client/complete_pending_new/').$row->order_id.'/'.$row->order_amount; ?>"><button class="btn btn-success btn-sm">Pay Now</button></a></td>
                                                              
                                                              <td><a href="<?php echo base_url('client/get_paper_details/').$row->order_id; ?>"><button class="btn btn-primary btn-sm">Paper Details</button></a></td>

                                                                <td><a href="<?php echo base_url('client/edit_order/').$row->order_id; ?>"><button class="btn btn-warning btn-sm">Edit Order</button></a></td>
                                                             

                                                              
                                                              <td><a onclick="javascript:return confirm('Are you sure you want to delete this order?')" href="<?php echo base_url('client/delete_order/').$row->order_id; ?>"><button class="btn btn-danger btn-sm">Delete</button></a></td>
                                                          </tr>
                                                         <?php } ?>
                                                  
                                                </tbody>
                                            </table>
                                          </div>
                                        </div>
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
                        
                  