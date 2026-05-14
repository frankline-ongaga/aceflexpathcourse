<?php include 'header.php' ?>
<div class="content-wrapper">
  <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></li>
            <li class="active">Inbox</li>
        </ol>    
  </section>
 

   <br>
    <br>
    
  
  <div class="container-fluid">

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
   
     <div class="box">
                <div class="box box-info">
                    <div class="box-header with-border">
                         <h3 class="box-title">Inbox</h3>
                          <div class="box-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                             
                            </div>
                          </div>
                    </div>
           <div class="box-body table-responsive no-padding">
                       <table class="table table-striped" style="font-size: 12px;">
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
                                   
                                    <td><a href="<?php echo base_url('writer/view_thread/').$thread['thread_id']?>"><button class="btn btn-success btn-sm">View Conversation</button></a></td>

                                </tr>
                               <?php } ?>
                            </tbody>
              </table>
              </div>

                                      </div>

                      <!--===================================================-->

                      <!--End No Label Form-->

          

                  </div>

              </div>

          </div>

  

          
      


        



        <!-- FOOTER -->

        <!--===================================================-->

       <?php include 'footer.php'; ?>