<?php include 'header.php' ?>
<div class="content-page">
                <div class="content">
                    
                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                   
                                    <h4 class="page-title">Writer Application Details</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">

                         <div class="col-md-9 offset-md-1">


                          <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Writer Details</h4>
                                       
                        <?php
                        foreach ($d->result() as $row)
                        {   ?>
                         <div class="card" style="margin-bottom: 25px;">
                    
                     
                          <div class="col-md-12 px-3">
                            <div class="card-block px-3">
                            <br>
                             

                              <div class="card-body" style="position: relative; text-align: left;">
                              <h6 class="babu">Name  </h6>
                              <div class="kirui">
                              <pre>
                              <?php if(isset($row->user_fname)) { echo $row->user_fname.' '.$row->user_lname;  } else { echo '___'; }  ?> 
                              </pre>
                             </div>
                              <h6 class="babu">Email  </h6>
                               <div class="kirui">
                                 <pre>
                              <?php if(isset($row->user_email)) { echo $row->user_email;  } else { echo '___'; }  ?> 
                                </pre>
                              </div>
                              
                               <h6 class="babu">Country  </h6>
                                <div class="kirui">
                                 <pre>
                              <?php if(isset($row->printable_name)) { echo $row->printable_name;  } else { echo '___'; }  ?> 
                               </pre>
                              </div>
                             
                              
                                <?php if(!empty($row->user_more_writer)) { ?>

                               <h6 class="babu">More information </h6>
                                <div class="kirui">
                                 <pre>
                              <?php if(isset($row->user_more_writer)) { echo $row->user_more_writer;  } else { echo '___'; }  ?> 
                               </pre>
                              </div>

                                <?php } ?>

                                <h6 class="babu">More Files  </h6>
                               <div class="kirui">
                               <pre>
                              <?php 
                                 $link=base_url('userfile/').$row->user_more_file;
                                // $uploadpath = $_SERVER['DOCUMENT_ROOT'].'/experience/'.$row->user_experience;

                               //  $uploadpath =              APPPATH.'/experience/'.$row->user_experience;

                               // echo  $uploadpath;
                                // $uploadpat = str_replace('/localhost', '', $uploadpath);
                                //$image_path = realpath(APPPATH . '../experience');
                                if(isset($row->user_experience)) {  ?> <a target="_blank" href="<?php echo  $link;  ?>">More Files </a> <?php } else { echo '___'; }  ?> 
                              </pre> 
                              <h6 class="babu">Experience  </h6>
                               <div class="kirui">
                               <pre>
                              <?php 
                                 $link=base_url('experience/').$row->user_experience;
                                // $uploadpath = $_SERVER['DOCUMENT_ROOT'].'/experience/'.$row->user_experience;

                               //  $uploadpath =              APPPATH.'/experience/'.$row->user_experience;

                               // echo  $uploadpath;
                                // $uploadpat = str_replace('/localhost', '', $uploadpath);
                                //$image_path = realpath(APPPATH . '../experience');
                                if(isset($row->user_experience)) {  ?> <a target="_blank" href="<?php echo  $link;  ?>">Experience Doc </a> <?php } else { echo '___'; }  ?> 
                              </pre> 
                              </div>
                                <h6 class="babu">Industry</h6>
                               <div class="kirui">
                               <pre>
                              <?php if(!empty($i)) { 

                                    foreach ($i as $industry) {

                                       echo $industry.'<br>'; 
                                    }

                                   

                                 } else { echo '___'; }  ?> 
                              </pre>
                              </div>
                              <h6 class="babu">Portfolio Link  </h6>
                               <div class="kirui">
                               <pre>
                              <?php if(isset($row->user_portfolio_link)) { ?> <a target="_blank" href="#"><?php echo $row->user_portfolio_link;  ?></a> <?php }  else { echo '___'; }  ?> 
                              </pre>
                              </div>
                              <div>
                              <br>
                                <a href="<?php echo base_url('admin/approve_step_one/').$row->user_id ?>" class="btn btn-primary">Approve</a> &nbsp;
                                <a href="<?php echo base_url('admin/request_more_info_view/').$row->user_id ?>" class="btn btn-warning">Request more information</a> &nbsp;
                                <a href="<?php echo base_url('admin/reject/').$row->user_id ?>" class="btn btn-danger">Reject</a>
                              </div>

                              </div>
                             
                              
                             
                            </div>
                          </div>

                       
                      </div>
                      <?php
                        }
                      ?>
                  
                         
                       
                    </div>
                </div>
            </div>
              
                    </div>
                </div>
           
        </body>
<?php include 'footer.php'; ?>