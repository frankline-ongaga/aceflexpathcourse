<?php include 'header.php' ?>
<div class="content-page">
                <div class="content">
                    
                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                   
                                    <h4 class="page-title">Pending Review</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">

                         <div class="col-md-9 offset-md-1">


                          <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Pending Review</h4>
                      <table class="table table-hover table-striped">
                                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Paper Title</th>
                                    <th>Discipline</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php
                                foreach ($review->result() as $row)
                                {   ?>
                                <tr>
                                    <td><?php if(isset($row->order_id)) { echo $row->order_id;  }   ?></td>
                                    <td><?php if(isset($row->order_title)) { echo $row->order_title;  }   ?></td>
                                    <td><?php if(isset($row->discipline_name)) { echo $row->discipline_name;  }   ?></td>
                                    <td><?php if(isset($row->order_amount)) { echo $row->order_amount;  }   ?></td>
                                    <td><?php if(isset($row->status_name)) { echo $row->status_name;  }   ?></td>

                                    <td><a href="<?php echo base_url('admin/review_paper/').$row->order_id; ?>"><button class="btn btn-warning btn-sm">Review Paper</button></a></td>
                                </tr>
                               <?php } ?>
                            </tbody>
                                        </table>
                                    </div>
                                  
                                </div>
                                
                            </div>
                           
                       
                       
                    </section>
            
    </div>
   
</body>

<?php include 'footer.php'; ?>