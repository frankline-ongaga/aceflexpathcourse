<?php include 'header.php' ?>
<div class="content-page">
                <div class="content">
                    
                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                   
                                    <h4 class="page-title">Process Payouts</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">

                         <div class="col-md-9 offset-md-1">


                          <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Process Payouts</h4>
                                       
    
                                        <div class="table-responsive">
                      <table class="table table-hover table-striped">
                                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>User</th>
                                    <th>Designation</th>
                                   
                                    <th>Request Amount</th>
                                   
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php
                                foreach ($h->result() as $row)
                                {   ?>
                                <tr>
                                    <td><?php if(isset($row->id)) { echo $row->id;  }   ?></td>
                                    <td><?php if(isset($row->user_fname )) { echo $row->user_fname.' '.$row->user_lname;  }   ?></td>
                                    <td><?php if($row->request_designation==1) { echo "Writing Payments";  } elseif($row->request_designation==3) { echo "Local Payments";  } else { echo "Affiliate Payments"; }   ?></td>
                                    <?php if($row->request_designation==3) { ?>
                                    <td><?php if(isset($row->request_amount)) { echo $row->request_amount.' KES';  }   ?></td>
                                  <?php }else{ ?>
                                     <td><?php if(isset($row->request_amount)) { echo $row->request_amount.' USD';  }   ?></td>
                                 <?php } ?>


                                   
                                    <td><a href="<?php echo base_url('admin/payout_details/').$row->id; ?>"><button class="btn btn-warning btn-sm">Make Payments</button></a></td>
                                    
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