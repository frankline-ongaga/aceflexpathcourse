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
                       <div class="col-md-12">
                       <h3>Under Review</h3>
                        <table class="table bg-white">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Paper Title</th>
                                    <th>Content Type</th>
                                    <th>Words</th>
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
                                    <td><?php if(isset($row->order_id)) { echo $row->content_name;  }   ?></td>
                                    <td><?php if(isset($row->order_word_count)) { echo $row->order_word_count;  }   ?></td>
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