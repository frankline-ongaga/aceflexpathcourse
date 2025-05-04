<div class="page-wrapper">
      <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
          <div class="breadcrumb-title pe-3">Inbox</div>
          <div class="ps-3">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Inbox</li>
              </ol>
            </nav>
          </div>
         
        </div>
        <!--end breadcrumb-->
        <div class="row">
          <div class="col-xl-9 mx-auto">
            <h6 class="mb-0 text-uppercase">Inbox</h6>
            <hr/>
             <?php
                 if(isset($success)){
                 ?>
                 <div class="alert alert-success">

                    <?php  echo $success; ?>
                  </div>
               <?php   }
               ?>




              <div class="card">
                 <div class="card-body">

                 
                    <div class="list-group list-group-flush">
                      <?php
                          foreach ($threads as $thread)
                          {   ?>

                      <a href="<?php echo base_url('client/view_thread/').$thread['thread_id']?>" class="list-group-item">
                        <div class="d-flex">
                          <div class="chat-user-online">
                            <img src="<?php echo base_url('adminassets/images/avatar.png') ?>" class="rounded-circle" alt="" width="50" height="50">
                          </div>
                          <div class="flex-grow-1 ms-2">
                            <h6 class="mb-0 chat-title"></h6>
                            <p class="mb-0 chat-msg"><?php  echo $thread['messages'][0]['subject'];   ?></p>
                          </div>
                          <div class="chat-time"> <?php 
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

                                                       ?></div>
                        </div>
                      </a>

                    <?php } ?>
                     
                    </div>
                 
                                        
                                        </div>
                                    </div>
                                </div>
                              </div>
                           
                          
                        </div>
                       