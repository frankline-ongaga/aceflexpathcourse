<?php include 'header.php' ?>
<div class="content-page">
                <div class="content">
                    
                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                   
                                    <h4 class="page-title">Past Payouts</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">

                         <div class="col-md-9 offset-md-1">


                          <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Past Payouts</h4>
                      <table class="table table-hover table-striped">
                                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>User</th>
                                   
                                    <th>Request Amount</th>
                                   
                                   
                                </tr>
                            </thead>
                            <tbody>
                              <?php
                                foreach ($h->result() as $row)
                                {   ?>
                                <tr>
                                    <td><?php if(isset($row->id)) { echo $row->id;  }   ?></td>
                                    <td><?php if(isset($row->user_fname )) { echo $row->user_fname.' '.$row->user_lname;  }   ?></td>
                                    <td><?php if(isset($row->request_amount)) { echo $row->request_amount;  }   ?></td>
                                   
                                   
                                    
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