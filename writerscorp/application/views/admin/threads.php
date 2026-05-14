<?php include 'header.php' ?>
<div class="content-page">
                <div class="content">
                    
                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                   
                                    <h4 class="page-title">Inbox</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">

                         <div class="col-md-9 offset-md-1">

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


                          <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Inbox</h4>
                                       
    
                                        <div class="table-responsive">
                                            <table class="table table-striped mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Subject</th>
                                                        <th>Messages</th>
                                                       
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    foreach ($threads as $thread)
                                                    {   ?>
                                                    <tr>

                                                      <td><?php if(isset($thread['thread_id'])) { echo $thread['thread_id'];  }   ?></td>

                                                      <td><?php  echo $thread['messages'][0]['subject'];   ?></td> 
                                                      <td><?php 
                                                           $num=0;
                                                           $mainthread= $thread['thread_id'];
                                                           foreach ($thread['messages'] as $msg) {
                                                                # code...
                                                           
                                                            if($mainthread== $msg['thread_id'])
                                                               
                                                                 if($msg['status']==0)
                                                                   {
                                                                        $num=$num+1;
                                                                       
                                                                    }



                                                            }  
                                                              echo $num;  

                                                       ?></td> 
                                   
                                    <td><a href="<?php echo base_url('admin/view_thread/').$thread['thread_id']?>"><button class="btn btn-success btn-sm">View Conversation</button></a></td>

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