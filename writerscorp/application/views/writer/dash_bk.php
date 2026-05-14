<?php include 'header.php'; ?>       
        <div class="page light">
            <div class="content-wrapper animatedParent animateOnce">
                <div class="container">
                  <div class="row">
                  <div class="col-md-3">
                    <section class="p-t-20">
                        <?php include 'buyer_menu.php' ?>
                      </section>
                  </div>
                  <div class="col-md-9">

                    <section class="p-t-20">
                        <div class="row">
                      
                        <div class="col-md-3">
                            <div class="card text-white bg-success">
                                <div class="card-header">
                                    <h6 class="card-title">Completed </h6></div>
                                <div class="card-body"><div class="sc-counter"><?php if(isset($completed_count)){ echo $completed_count;  } else { echo "0"; } ?></div></div>
                            </div>
                        </div>
                           <div class="col-md-3">
                            <div class="card text-white bg-danger">
                                <div class="card-header">
                                    <h6 class="card-title">Under Review</h6></div>
                                <div class="card-body"><div class="sc-counter"><?php if(isset($review_count)){ echo $review_count;  } else { echo "0"; } ?></div></div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card text-white bg-info">
                                <div class="card-header">
                                    <h6 class="card-title">In Progress</h6></div>
                                <div class="card-body"><div class="sc-counter"><?php if(isset($pending_count)){ echo $pending_count;  } else { echo "0"; }?></div></div>
                            </div>
                        </div>
                         <div class="col-md-3">
                            <div class="card text-white bg-warning">
                                <div class="card-header">
                                    <h6 class="card-title">Revision</h6></div>
                                <div class="card-body"><div class="sc-counter"><?php if(isset($revision_count)){ echo $revision_count;  } else { echo "0"; }?></div></div>
                            </div>
                        </div>
                         
                            
                        </div>
                    </section>
                    <section class="p-t-20">
                    <div class="row p-t-20">
                       <div class="col-md-12">
                       <h3>Recent Papers</h3>
                        <table class="table bg-white">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Paper Title</th>
                                    <th>Content Type</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php
                                foreach ($o->result() as $row)
                                {   ?>
                                <tr>
                                    <td><?php if(isset($row->order_id)) { echo $row->order_id;  }   ?></td>
                                    <td><?php if(isset($row->order_title)) { echo $row->order_title;  }   ?></td>
                                    <td><?php if(isset($row->order_id)) { echo $row->content_name;  }   ?></td>
                                    <td><?php if(isset($row->status_name)) { echo $row->status_name;  }   ?></td>
                                    <td><a href="<?php echo base_url('writer/get_paper_details/').$row->order_id; ?>"><button class="btn btn-primary btn-sm">See More</button></a></td>
                                </tr>
                               <?php } ?>
                            </tbody>
                        </table>
                     </div>
                    </div>
                   </section>
                 </div> <!-- end of tab-->
                 </div>
                </div>
            </div>
        </div>
<?php include 'footer.php'; ?>       