<div class="page-wrapper">
      <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
          <div class="breadcrumb-title pe-3">Technical Order</div>
          <div class="ps-3">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Technical Order</li>
              </ol>
            </nav>
          </div>
         
        </div>
        <!--end breadcrumb-->
        <div class="row">
          <div class="col-xl-9 mx-auto">
            <h6 class="mb-0 text-uppercase">Place a technical order and get a quotation in minutes</h6>
            <hr/>
              <div class="card">
                 <div class="card-body">
                                             <?php if(!empty($error)){ ?>

                                                 <div class="alert alert-warning">
                                                   <?php echo $error; ?>
                                                  </div>

                                               <?php     } ?>
                                            <form id="zoney" class="form-horizontal" method="post" action="<?php echo base_url() ?>client/special" enctype="multipart/form-data">
                                                    <div class="row mb-3">
                                                        <label class="col-md-3 col-form-label" for="simpleinput">Title</label>
                                                        <div class="col-md-9">
                                                            <input type="text" id="order_title" class="form-control" name="order_title" placeholder="Title" required>
                                                        </div>
                                                    </div>
                                                     <div class="row mb-3">
                                                        <label class="col-md-3 col-form-label" for="example-textarea">Description</label>
                                                        <div class="col-md-9">
                                                            <textarea class="form-control" rows="5" id="order_description" name="order_description" placeholder="Describe your paper"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label class="col-sm-3 col-form-label" for="example-palaceholder">Deadline</label>
                                                        <div class="col-sm-9">
                                                           <div class="input-group mb-3">
                                                             <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="bx bx-calendar"></i></span>
                                                              </div>
                                                              <input class="form-control readonly" placeholder="Launch Calendar" onchange="get_tols()"  type="text" id="deadline" name="order_deadline_id" required />
                                                             </div>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="order_tz" value=""  id="tz">
                                                     <div class="row mb-3">
                                                      <label class="col-md-3 col-form-label" for="example-textarea">Upload Files</label>
                                                      <div class="col-md-9">
                                                         <div class="dropzone" id="myDropzonespecial"></div>
                                                       </div>
                                                     </div>

                                                 
                                                   

                                                      

                                                  
                                                   

                                                  
                                                     <div class="form-group row">
                                                      <div class="col-md-3">
                                                      </div>
                                                      <div class="col-md-9">

                                                         <button type="submit" id="submit-all" class="btn btn-warning" style="width:100%;">Get Quotation</button>

                                                        </div>


                                                     </div>



                                                </form>
                                            </div>
    
                                           
                                        </div>
                                        <!-- end row -->
    
                                    </div>

                                </div>


                          </div>
                           
                          
                        </div>
                       