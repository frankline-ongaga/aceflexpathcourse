 <?php include 'header.php'; ?>
<div class="page light">
<div class="content-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 offset-lg-2 bg-white">
                      
                        <legend class="text-center" style="width:83%; padding-top: 20px;">Apply to be a writer <br>

                          <small style="font-size: 12px;">Complete and submit the form below for assessment </small>

                        </legend>
                       
                           <?php
                              if(!empty($this->session->flashdata('message'))) { ?>
                             <div class="alert alert-success">
                                <?php echo $this->session->flashdata('message');  ?>
                                 
                             </div>
                            <?php
                             }

                           ?>
                            <form action="<?php echo base_url('writer/apply_process') ?>" method="post" style="padding-bottom: 30px;" enctype="multipart/form-data">
                                 
                                 <?php

                                foreach ($p->result() as $row)
                                {   
                                     $country=$row->iso;
                                    ?>   

                                                    
                            <!-- Tab panes -->
                                   <input type="hidden" name="user_id" value="<?php if(isset($user_id)){ echo $user_id;  } ?>">
                                   <div class="form-group">
                                    <div class="row">
                                       <div class="col-5">
                                        <label for="inputEmail" class="col-xl-12 form-control-label">First Name</label>
                                        <div class="col-xl-10">
                                            <input class="form-control" value="<?php if(isset($row->user_fname)) { echo $row->user_fname;  }   ?>" name="user_fname" id="title"  type="text" required>
                                        </div>
                                        </div>
                                    <div class="col-2">
                                         </div>
                                       
                                    <div class="col-5">
                                        <label for="inputEmail" class="col-xl-12 form-control-label">Surname</label>
                                        <div class="col-xl-10">
                                            <input class="form-control" value="<?php if(isset($row->user_lname)) { echo $row->user_lname;  }   ?>" name="user_lname" id="title"  type="text" required>
                                        </div>
                                        </div>
                                      </div>
                                    </div>

                                <div class="form-group">
                                    <div class="row">
                                       <div class="col-5">
                                        <label for="inputEmail" class="col-xl-12 form-control-label">Country</label>
                                        <div class="col-xl-12">
                                               <select name="user_location_id" class="form-control" id="countrylist" required>
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
                                    </div>


                                    <div class="form-group">
                                       <div class="row">
                                         <div class="col-12">
                                        <label for="textArea" class="col-xl-12 form-control-label">Why you should write for us</label>
                                        <div class="col-xl-12">
                                           <textarea name="why" rows="7" class="form-control"></textarea>
                                        </div>
                                       </div>
                                      </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="textArea" class="col-xl-12 form-control-label">Upload Cover Letter</label>
                                        <div class="col-xl-10">
                                           <input type="file" name="cover_letter" required>
                                        </div>
                                    </div>
                                  
                                    <div class="form-group">
                                        <label for="textArea" class="col-xl-12 form-control-label">Upload your work experience doc</label>
                                        <div class="col-xl-10">
                                           <input type="file" name="experience" required>
                                        </div>
                                    </div>
                                   <div class="form-group">
                                       
                                        <label for="inputEmail" class="col-xl-12 form-control-label">Link to your portfolio of past work</label>
                                        <div class="col-xl-10">
                                            <input class="form-control" value="<?php if(isset($row->user_lname)) { echo $row->user_lname;  }   ?>" name="user_portfolio_link" id="title"  type="text" required>
                                        </div>
                                    </div>
                                    
                                   

                                  
                                     <div class="form-group">
                                       
                                        <label for="inputEmail" class="col-xl-12 form-control-label">Select industries where you are most experienced in</label>
                                         <div class="col-xl-10">
                                    <select class="js-example-basic-multiple col-xl-10 form-control" name="industry[]" multiple="multiple">

                                          <?php
                                            
                                             foreach ($i->result() as $row)
                                              {  ?>
                                                <option value="<?php echo $row->industry_id; ?>"><?php echo $row->industry_name; ?></option>
                                              <?php } ?>
                                         

                                    </select>
                                    </div>
                                    </div>
                                     <?php 
                                       }
                                    ?>
                                                                       
                               

                                 <div class="form-group">
                                   <div class="col-xl-10">
                                <input type="submit" style="color:#fff;" name="submit" class="submit btn btn-primary btn-md" value="Send Application" /><br>
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

       
       $(document).ready(function() {
          $('.js-example-basic-multiple').select2();
        });

     // $("#countrylist option[value=<?php //echo $country; ?>]").prop("selected", "selected");

      </script>
       <script type="text/javascript">

      $("#countrylist option[value=<?php echo $country; ?>]").prop("selected", "selected");

      </script>


    