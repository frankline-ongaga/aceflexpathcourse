 <?php include 'header.php'; ?>
<div class="page light">
<div class="content-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 offset-lg-2 bg-white">
                      
                        <legend class="text-center" style="width:83%; padding-top: 20px;">My Profile <br>

                          <small style="font-size: 12px;">Kindly Keep your profile updated at all times </small>

                        </legend>
                       
                           <?php
                              if(!empty($this->session->flashdata('message'))) { ?>
                             <div class="alert alert-success">
                                <?php echo $this->session->flashdata('message');  ?>
                                 
                             </div>
                            <?php
                             }

                           ?>
                            <form action="<?php echo base_url('writer/update_profile') ?>" method="post" style="padding-bottom: 30px;">
                                 
                                  

                                                    
                            <!-- Tab panes -->
                            <?php
                                foreach ($p->result() as $row)
                                {   
                                     $country=$row->iso;
                                    ?>
                                    
                                   
                                    <div class="form-group">
                                        <input type="hidden" name="user_id" value="<?php if(isset($user_id)){ echo $user_id;  } ?>">
                                        <label for="inputEmail" class="col-xl-12 form-control-label">First Name</label>
                                        <div class="col-xl-10">
                                            <input class="form-control" value="<?php if(isset($row->user_fname)) { echo $row->user_fname;  }   ?>" name="user_fname" id="title"  type="text" required>
                                        </div>
                                    </div>
                                       <div class="form-group">
                                       
                                        <label for="inputEmail" class="col-xl-12 form-control-label">Surname</label>
                                        <div class="col-xl-10">
                                            <input class="form-control" value="<?php if(isset($row->user_lname)) { echo $row->user_lname;  }   ?>" name="user_lname" id="title"  type="text" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail" class="col-xl-12 form-control-label">Email</label>
                                        <div class="col-xl-10">
                                            <input class="form-control" value="<?php if(isset($row->user_email)) { echo $row->user_email;  }   ?>" name="user_email" id="amount"  type="text" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="select"  class="col-xl-12 form-control-label">Country</label>
                                        <div class="col-xl-10">
                                            <select name="user_location_id" class="form-control" id="countrylist" >
                                            <option></option>
                                            <?php
                                             foreach ($c->result() as $row)
                                              {  ?>
                                                <option value="<?php echo $row->iso; ?>"><?php echo $row->printable_name; ?></option>
                                              <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail" class="col-xl-12 form-control-label">Phone</label>
                                        <div class="col-xl-10">
                                            <input class="form-control" value="<?php if(isset($row->user_phone)) { echo $row->user_phone;  }   ?>" name="user_phone"   type="text">
                                        </div>
                                    </div>
                                       
                                   
                                  
                                  
                                    <?php 
                                      }
                                    ?>
                                            <!--<button id="fao" class="btn btn-primary">Make Payment</button> -->
                                   
                                  
                                
                                 
                                
                                  
                                        
                             
                              

                             

                                              
                                  

                               
                                 <div class="form-group">
                                   <div class="col-xl-10">
                                <input type="submit" style="color:#fff;" name="submit" class="submit btn btn-primary btn-md" value="Update Profile" /><br>
                                  </div>
                                </div>
                               

                              
                                 
                            </form>
                         

                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
     <?php include 'footer.php'; ?>
     <script type="text/javascript">

      $("#countrylist option[value=<?php echo $country; ?>]").prop("selected", "selected");

      </script>
    