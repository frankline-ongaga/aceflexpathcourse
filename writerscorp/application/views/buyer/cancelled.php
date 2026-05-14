<div class="page-wrapper">
      <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
          <div class="breadcrumb-title pe-3">Cancelled Orders</div>
          <div class="ps-3">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Cancelled Orders</li>
              </ol>
            </nav>
          </div>
         
        </div>
        <!--end breadcrumb-->
        <div class="row">
          <div class="col-xl-9 mx-auto">
            <h6 class="mb-0 text-uppercase">Cancelled Orders</h6>
            <hr/>
              <div class="card">
                 <div class="card-body">
                    <div class="table-responsive">
                                            <table class="table table-striped mb-0" id="example">
                                                <thead>
                                                      <tr>
                                                            <th>#</th>
                                                            <th>Paper Title</th>
                                                            <th>Discipline</th>
                                                            <th>Order Amount</th>
                                                            <th>Refund Amount</th>
                                                            <th>Status</th>
                                                            <!-- <th>Process</th> -->
                                                           
                                                            <th>Action</th>
                                                        </tr>
                                                </thead>
                                                <tbody>
                                                   
                                                      <?php
                                                          foreach ($cancelled->result() as $row)
                                                          {   ?>
                                                          <tr>
                                                              <td><?php if(isset($row->order_id)) { echo $row->order_id;  }   ?></td>
                                                              <td><?php if(isset($row->order_title)) { echo $row->order_title;  }   ?></td>
                                                              <td><?php 

                                                             if($row->discipline_id!=69){

                                                              if(isset($row->discipline_name)){ echo $row->discipline_name;  } else { echo '__'; } 

                                                            }
                                                            else
                                                            {

                                                              echo $row->other;
                                                            }




                                                              ?></td>
                                                              <td><?php if(isset($row->order_amount)) { echo $row->order_amount;  }   ?></td>
                                                              <td><?php if(isset($row->refund_amount)) { echo $row->refund_amount;  }   ?></td>
                                                              <td><?php if(isset($row->status_name)) { echo $row->status_name;  }   ?></td>
                                                              

                                                              
                                                              
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
                           
                          
                        </div>
                      