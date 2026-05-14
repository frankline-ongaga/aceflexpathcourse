<?php include 'header.php' ?>
<div class="content-page">
                <div class="content">
                    
                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                   
                                    <h4 class="page-title">Request a revision</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">

                         <div class="col-md-9 offset-md-1">


                          <div class="card">
                                    <div class="card-body">
                                         <div class="alert alert-info">
                                              You can can only request revision on completed orders, to make changes on orders in progress send message to support <a href="<?php echo base_url('client/message_index'); ?>">here</a>
                                          
                                       </div>

                                       <?php 
                                             if(isset($success))
                                             {
                                              ?>
                                              <div class="alert alert-success">
                                               <?php
                                                echo $success;
                                                ?>
                                               </div>
                                               <?php
                                             }

                                           ?>
                                        <h4 class="header-title">Request a revision</h4>
                                       
    
                                        <div class="table-responsive">
                                            <table class="table table-striped mb-0">
                                                <thead>
                                                       <tr>
                                                            <th>#</th>
                                                            <th>Paper Title</th>
                                                            <th>Discipline</th>
                                                            <th>Amount</th>
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
                                                          
                                                          <td><a href="<?php echo base_url('client/request_revision/').$row->order_id; ?>"><button class="btn btn-primary btn-sm">Request a Revision</button></a></td>
                                                      
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