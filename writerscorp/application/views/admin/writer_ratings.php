<?php include 'header.php' ?>
<div class="content-page">
                <div class="content">
                    
                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                   
                                    <h4 class="page-title">Writer Ratings</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">

                         <div class="col-md-9 offset-md-1">


                          <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Writer Ratings</h4>
                                       
    
                                        <div class="table-responsive">
                                            <table class="table table-striped mb-0">
                                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                   
                                    <th>Ratings(%)</th>
                                    <th>Individual Ratings</th>
                                 
                                   
                                </tr>
                            </thead>
                            <tbody>
                              <?php
                                foreach ($h->result() as $row)
                                {   ?>
                                <tr>
                                    <td><?php if(isset($row->user_id)) { echo $row->user_id;  }   ?></td>
                                    <td><?php if(isset($row->user_fname )) { echo $row->user_fname.' '.$row->user_lname;  }   ?></td>
                                    <td><?php if(isset($row->user_email)) { echo $row->user_email;  }   ?></td>
                                   
                                     <td><?php if(isset($row->rato)) {     

                                        $njuguna= round($row->rato * 2) / 2;
                                        echo $njuguna.' /5';

                                        } else { echo "_";  }  ?></td>
                                      <td><a href="<?php echo base_url('admin/user_details/').$row->user_id.'/2'; ?>"><button class="btn btn-warning btn-sm">Individual Ratingd</button></a></td>
                                  
                                   
                                </tr>
                               <?php } ?>
                            </tbody>
                                        </table>
                                    </div>
                                  
                                </div>
                                
                            </div>
                           
                        </div>
                       
                    </section>
            
    </div>
   
</body>

<?php include 'footer.php'; ?>