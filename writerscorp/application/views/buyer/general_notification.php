<div class="page-wrapper">
      <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
          <div class="breadcrumb-title pe-3">Notification</div>
          <div class="ps-3">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Notification</li>
              </ol>
            </nav>
          </div>
         
        </div>
        <!--end breadcrumb-->
        <div class="row">
          <div class="col-xl-9 mx-auto">
            <h6 class="mb-0 text-uppercase">Notification</h6>
            <hr/>
              <div class="card">
                 <div class="card-body">
                         <div class="alert alert-success border-0 bg-success fade show py-2">
                                    <div class="d-flex align-items-center">
                                        <div class="font-35 text-white"><i class="bx bxs-check-circle"></i>
                                        </div>
                                        <div class="ms-3">
                                            <h6 class="mb-0 text-white"><?php if(isset($notification_title)){echo $notification_title;}  ?></h6>
                                            <div class="text-white"> <?php if(isset($notification_content)){ echo $notification_content; }?></div>
                                            <?php
                                              if(isset($button)){ ?>
                                                     <br> 

                                                      <a href="<?= $url; ?>" class="btn btn-warning"><?= $button; ?></a>
                                            <?php   }

                                            ?>
                                        </div>
                                    </div>
                                   
                            </div>
                        
                       
                          
                        </div>
                       </div>
                     </div> 
                        
                    </div> <!-- end container-fluid -->

                </div> <!-- end content -->
</div>

                

                <!-- Footer Start -->
              