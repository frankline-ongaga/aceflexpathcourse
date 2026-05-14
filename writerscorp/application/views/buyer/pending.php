<div class="page-wrapper">
      <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
          <div class="breadcrumb-title pe-3">Orders In Progress</div>
          <div class="ps-3">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Orders In Progress</li>
              </ol>
            </nav>
          </div>
         
        </div>
        <!--end breadcrumb-->
        <div class="row">
          <div class="col-xl-9 mx-auto">
            <h6 class="mb-0 text-uppercase">Orders In Progress</h6>
            <hr/>
              <div class="card">
                 <div class="card-body">
                     <div class="table-responsive">
                                            <table class="table table-striped mb-0" id="example">
                                                <thead>
                                                      <tr>
                                                            <th>#</th>
                                                            <th>Paper Title</th>
                                                            
                                                            <th>Amount</th>
                                                           <!--  <th>Writer ID</th> -->
                                                            <th>Send Message</th>
                                                            <th>Edit Order</th>
                                                           <!--  <th>Cancel Order</th> -->
                                                           
                                                            <th>Order Details</th>
                                                        </tr>
                                                </thead>
                                                <tbody>
                                                    
                                                     <?php
                                                          foreach ($pending->result() as $row)
                                                          {   ?>
                                                          <tr>
                                                              <td><a href="<?php echo base_url('client/get_paper_details/').$row->order_id; ?>"><?php if(isset($row->order_id)) { echo $row->order_id;  }   ?></a></td>
                                                              <td><?php if(isset($row->order_title)) { echo $row->order_title;  }   ?></td>
                                                             
                                                              <td><?php if(isset($row->order_amount)) { echo $row->order_amount;  }   ?></td>
                                                             <!--  <td><?php// if(isset($row->order_writer_id)) {?> <a href="<?php// echo base_url('client/get_writer_ratings/').$row->order_writer_id;?>">  <?php// echo $row->order_writer_id;  }   ?></a></td>
 -->


                                                              
                                                              <?php if(isset($row->order_writer_id)) { ?>
                                                               <td><a href="<?php echo base_url('client/message_writer/').$row->order_id.'/'.$row->order_writer_id; ?>"><button class="btn btn-success btn-sm">Message Writer</button></a></td>
                                                             <?php }
                                                                else
                                                                {
                                                              ?>
                                                               <td>Assigning writer...</td>
                                                             <?php } ?>
                                                               <!-- <td><a onclick="return confirm('Are you sure you want to cancel this order?');" href="<?php //echo base_url('client/cancel_order/').$row->order_id; ?>"><button class="btn btn-warning btn-sm">Cancel Order</button></a></td> -->

                                                             <td><a href="<?php echo base_url('client/edit_order/').$row->order_id; ?>"><button class="btn btn-primary btn-sm">Edit Order</button></a></td>
                                                             
                                                              
                                                              <td><a href="<?php echo base_url('client/get_paper_details/').$row->order_id; ?>"><button class="btn btn-primary btn-sm">Paper Details</button></a></td>
                                                            
                                                           
                                                          </tr>
                                                         <?php } ?>
                                                   
                                                </tbody>
                                            </table>
                                          </div>
                                       </div>
                                    </div>
                                  </div>
                                </div>
                                <!--end row-->
                              </div>
                            </div>