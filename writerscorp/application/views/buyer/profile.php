<div class="page-wrapper">
      <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
          <div class="breadcrumb-title pe-3">Profile</div>
          <div class="ps-3">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Profile</li>
              </ol>
            </nav>
          </div>
         
        </div>
        <!--end breadcrumb-->
        <div class="row">
          <div class="col-xl-9 mx-auto">
           
            
              <div class="card">
                 <div class="card-body">
                      
                        <legend class="text-center" style="width:83%; padding-top: 20px;">My Profile</legend>

                           <?php
                              if(!empty($this->session->flashdata('message'))) { ?>
                            
                              <div class="alert alert-success border-0 bg-success alert-dismissible fade show py-2">
                              <div class="d-flex align-items-center">
                                <div class="font-35 text-white"><i class="bx bxs-check-circle"></i>
                                </div>
                                <div class="ms-3">
                                  <h6 class="mb-0 text-white">Success</h6>
                                  <div class="text-white"> <?php echo $this->session->flashdata('message');  ?></div>
                                </div>
                              </div>
                              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            <?php
                             }

                           ?>

                           <?php
                              if(!empty($error)) { ?>
                             <div class="alert alert-warning">
                                <?php echo $error;  ?>
                                 
                             </div>
                            <?php
                             }

                           ?>
                            <form action="<?php echo base_url('client/update_profile') ?>" method="post">
                                 
                                  

                                                    
                            <!-- Tab panes -->
                            <?php

                                
                                foreach ($p->result() as $row)
                                {   
                                     $country=$row->iso;
                                    ?>
                                 

                                    
                                  <div class="row g-3">
                                    <div class="col-12">
                                        <input type="hidden" name="user_id" value="<?php if(isset($user_id)){ echo $user_id;  } ?>">
                                        <label for="inputEmail" class="col-xl-12 form-label">First Name</label>
                                        <div class="col-xl-10">
                                            <input class="form-control" value="<?php if(isset($row->user_fname)) { echo $row->user_fname;  }   ?>" name="user_fname" id="title"  type="text" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <input type="hidden" name="user_id" value="<?php if(isset($user_id)){ echo $user_id;  } ?>">
                                        <label for="inputEmail" class="col-xl-12 form-label">Surname</label>
                                        <div class="col-xl-10">
                                            <input class="form-control" value="<?php if(isset($row->user_lname)) { echo $row->user_lname;  }   ?>" name="user_lname" id="title"  type="text" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label for="inputEmail" class="col-xl-12 form-label">Email</label>
                                        <div class="col-xl-10">
                                            <input class="form-control" value="<?php if(isset($row->user_email)) { echo $row->user_email;  }   ?>" name="user_email" id="amount"  type="text" readonly>
                                        </div>
                                    </div>

                                     <div class="col-12">
                                        <label for="inputEmail" class="col-xl-12 form-label">Paypal Email</label>
                                        <div class="col-xl-10">
                                            <input class="form-control" value="<?php if(isset($row->user_paypal_email)) { echo $row->user_paypal_email;  }   ?>" name="user_paypal_email" id="amount"  type="text">
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="inputEmail" class="col-xl-12 form-label">Phone</label>
                                        <div class="col-xl-10">
                                            <input class="form-control" value="<?php if(isset($row->user_phone)) { echo $row->user_phone;  }   ?>" name="user_phone" id="amount"  type="number">
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="select"  class="col-xl-12 form-label">Country</label>
                                        <div class="col-xl-10">
                                            <select name="user_location_id" class="form-select" id="countrylist" >
                                            <option></option>
                                            <?php
                                             foreach ($c->result() as $row)
                                              {  ?>
                                                <option value="<?php echo $row->iso; ?>"><?php echo $row->printable_name; ?></option>
                                              <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                  </div>
                                       
                                   
                                  
                                  
                                    <?php 
                                      }
                                    ?>
                       
                                 <br>
                                 <div class="form-group">
                                   <div class="col-xl-10">
                                <input type="submit" style="color:#fff;" name="submit" class="btn btn-primary" value="Update Profile" /><br>
                                  </div>
                                </div>
                               

                              
                                 
                            </form>
                         

                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
      </div>

       <script>

      $("#countrylist option[value=<?php echo $country; ?>]").prop("selected", "selected");

      </script>
     
    