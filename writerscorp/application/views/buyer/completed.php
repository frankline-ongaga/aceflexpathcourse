<div class="page-wrapper">
      <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
          <div class="breadcrumb-title pe-3">Completed Orders</div>
          <div class="ps-3">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Completed Orders</li>
              </ol>
            </nav>
          </div>
         
        </div>
        <!--end breadcrumb-->
        <div class="row">
          <div class="col-xl-9 mx-auto">
            <h6 class="mb-0 text-uppercase">Completed Orders</h6>
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
                                                            <th>Tip Writer</th>
                                                          
                                                            <th>Rate Writer</th>
                                                            <th>Paper Details</th>
                                                            <th>Action</th>
                                                        </tr>
                                                </thead>
                                                <tbody>
                                                  
                                                     <?php
                                                          foreach ($completed->result() as $row)
                                                          {   ?>
                                                          <tr>
                                                              <td><?php if(isset($row->order_id)) { echo $row->order_id;  }   ?></td>
                                                              <td><?php if(isset($row->order_title)) { echo $row->order_title;  }   ?></td>
                                                             
                                                              <td><?php if(isset($row->order_amount)) { echo $row->order_amount;  }   ?></td>

                                                               <td><a href="#myModal<?php echo $row->order_id ?>" data-bs-toggle="modal" data-bs-target="#myModal<?php echo $row->order_id ?>"><button class="btn btn-warning">Tip Writer</button></a></td>


                                                              <div class="modal" id="myModal<?php echo $row->order_id ?>">
                                                                <div class="modal-dialog">
                                                                  <div class="modal-content">

                                                                    <!-- Modal Header -->
                                                                    <div class="modal-header">
                                                                      <h4 class="modal-title">Tip Writer</h4>
                                                                      <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                                                                    </div>

                                                                    <!-- Modal body -->
                                                                    <div class="modal-body">

                                                                     <form method="post" action="<?= base_url('client/tip_writer') ?>">
                                                                     <input type="hidden" name="order_id" value="<?= $row->order_id; ?>">

                                                                     <label>Amount (USD)</label>
                                                                     <input min="0" type="number" name="amount" class="form-control">
                                                                     <br>
                                                                     <input type="submit" value="Tip Writer" class="btn btn-primary">

                                                                     </form>

                                                                       
                                                                        
                                                                       
                                                                     

                                                                      

                                                                       
                                                                    </div>

                                                                    <!-- Modal footer -->
                                                                    <div class="modal-footer">
                                                                      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                                    </div>

                                                                  </div>



                                                               <!-- <td><?php// if(isset($row->order_writer_id)) {?> <a href="<?php // echo base_url('client/get_writer_ratings/').$row->order_writer_id;?>">  <?php //echo $row->order_writer_id;  }   ?></a></td> -->
                                                              <?php 
                                                                if($row->order_rating==NULL){

                                                               ?>
                                                              <td><a href="<?php echo base_url('client/rate_paper/').$row->order_id; ?>"><button class="btn btn-success btn-sm">Rate this writer</button></a></td>
                                                              <?php } else { 

                                                                 echo "<td> Rated </td>";
                                                              } ?>
                                                              
                                                              <td><a href="<?php echo base_url('client/get_paper_details/').$row->order_id; ?>"><button class="btn btn-primary btn-sm">Paper Details</button></a></td>
                                                               <td><a href="#myModaly<?php echo $row->order_id ?>" data-bs-toggle="modal" data-bs-target="#myModaly<?php echo $row->order_id ?>"><i class="fas fa-ellipsis-v"></i></a></td>


                                                              <div class="modal" id="myModaly<?php echo $row->order_id ?>">
                                                                <div class="modal-dialog">
                                                                  <div class="modal-content">

                                                                    <!-- Modal Header -->
                                                                    <div class="modal-header">
                                                                      <h4 class="modal-title">Action</h4>
                                                                      <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                                                                    </div>

                                                                    <!-- Modal body -->
                                                                    <div class="modal-body">

                                                                       
                                                                        
                                                                       
                                                                     

                                                                        <h5><a href="<?php echo base_url('client/request_revision/').$row->order_id; ?>">Revise</a></h5>

                                                                       
                                                                    </div>

                                                                    <!-- Modal footer -->
                                                                    <div class="modal-footer">
                                                                      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                                    </div>

                                                                  </div>
                                                                </div>
                                                              </div>
                                                           
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
                       