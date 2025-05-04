<div class="page-wrapper">
            <div class="page-content">
                <div class="row">
                   <div class="col-6">
                     <div class="card radius-10 border-start border-0 border-3 border-info">
                        <div class="card-body text-center">
                          <a href="<?= base_url('client/order') ?>">
                           <button type="button" class="btn btn-primary">Order a custom paper</button>
                          </a>
                        </div>
                      </div>
                    </div>
                     <div class="col-6">
                     <div class="card radius-10 border-start border-0 border-3 border-warning">
                        <div class="card-body text-center">
                          <a href="<?= base_url('client/make_technical') ?>">
                           <button type="button" class="btn btn-warning">Order a technical paper</button>
                          </a>
                        </div>
                      </div>
                    </div>
                 </div>
                   <div class="row">
                   <div class="col-12">
                     <div class="card radius-10 border-start border-0 border-3 border-info">
                        <div class="card-body text-center">
                           <a href="<?= base_url('client/my_link'); ?>">
                            <img src="<?= base_url('img/referral.png'); ?>" style="width: 60%;">
                           </a>



                         </div>
                      </div>
                    </div>
                  </div>
                <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
                   <div class="col">
                     <div class="card radius-10 border-start border-0 border-3 border-success">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <p class="mb-0 text-success">Completed</p>
                                    <h4 class="my-1 text-success"><?php if(isset($completed_count)){ echo $completed_count;  } else { echo "0"; } ?></h4>
                                   
                                </div>
                                <div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto"><i class='bx bx-check'></i>
                                </div>
                            </div>
                        </div>
                     </div>
                   </div>
                   <div class="col">
                    <div class="card radius-10 border-start border-0 border-3 border-info">
                       <div class="card-body">
                           <div class="d-flex align-items-center">
                               <div>
                                   <p class="mb-0 text-secondary">In Progress</p>
                                   <h4 class="my-1 text-info"><?php if(isset($pending_count)){ echo $pending_count;  } else { echo "0"; }?></h4>
                                   
                               </div>
                               <div class="widgets-icons-2 rounded-circle bg-gradient-scooter  text-white ms-auto"><i class='bx bx-loader'></i>
                               </div>
                           </div>
                       </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="card radius-10 border-start border-0 border-3 border-danger">
                       <div class="card-body">
                           <div class="d-flex align-items-center">
                               <div>
                                   <p class="mb-0 text-danger">Revision</p>
                                   <h4 class="my-1 text-danger"><?php if(isset($revision_count)){ echo $revision_count;  } else { echo "0"; }?></h4>
                               </div>
                               <div class="widgets-icons-2 rounded-circle bg-gradient-bloody text-white ms-auto"><i class='bx bx-x' ></i>
                               </div>
                           </div>
                       </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="card radius-10 border-start border-0 border-3 border-warning">
                       <div class="card-body">
                           <div class="d-flex align-items-center">
                               <div>
                                   <p class="mb-0 text-warning">Awaiting Payments</p>
                                   <h4 class="my-1 text-warning"><?php if(isset($awaiting_count)){ echo $awaiting_count;  } else { echo "0"; } ?></h4>
                               </div>
                               <div class="widgets-icons-2 rounded-circle bg-gradient-blooker text-white ms-auto"><i class='bx bx-question-mark'></i>
                               </div>
                           </div>
                       </div>
                    </div>
                  </div> 
                </div><!--end row-->

               

                 <div class="card radius-10">
                         <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <h6 class="mb-0">Recent Orders</h6>
                                </div>
                                
                            </div>
                         <div class="table-responsive">
                           <table class="table align-middle mb-0">
                            <thead class="table-light">
                             <tr>
                                <th>#</th>
                                <th>Order Title</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Action</th>
                             </tr>
                             </thead>
                             <tbody>
          
                              <?php  
                                foreach ($o->result() as $row) 
                                        {
                                                                        
                                            ?>
                                                            
                                            <tr>
                                                  <td><?php if(isset($row->order_id)) { echo $row->order_id;  }   ?></td>
                                                  <td><?php if(isset($row->order_title)) { echo $row->order_title;  }   ?></td>
                                                  <td><?php if(isset($row->order_amount)) { echo $row->order_amount;  }   ?></td>
                                                  <td><?php if(isset($row->status_name)) { echo $row->status_name;  }   ?></td>
                                                  <td><a href="<?php echo base_url('client/get_paper_details/').$row->order_id; ?>"><button class="btn btn-primary btn-sm">See More</button></a></td>
                                            </tr>
                                                       
                                     <?php } ?>
          
                           
                            </tbody>
                          </table>
                          </div>
                         </div>
                    </div>


            </div>
        </div>