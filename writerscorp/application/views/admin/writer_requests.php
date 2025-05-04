<?php include 'header.php' ?>
<div class="content-page">
                <div class="content">
                    
                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                   
                                    <h4 class="page-title">Writer Applications</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">

                         <div class="col-md-9 offset-md-1">


                          <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Writer Applications</h4>
                      <table class="table table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Writer</th>
                                                    <th>Status</th>
                                                    <th>View Request</th>
                                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach ($r->result() as $row)
                                    {   ?>

                                <tr>

                                    <td>#<?php if(isset($row->user_id)) { echo $row->user_id;  }   ?></td>
                                    <td><?php if(isset($row->user_fname)) { echo $row->user_fname . ' '.$row->user_lname ;  }   ?></td>
                                  
                                    <td><span class="badge badge-success">Unconfirmed</span></td>
                                    <td><a href="<?php echo base_url('admin/writer_application/').$row->user_id; ?>"><button class="btn-sm btn btn-warning">View Application</button></a></td>
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