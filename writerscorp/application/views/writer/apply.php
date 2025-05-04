<?php include 'header.php' ?>
<div class="content-wrapper">
  <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></li>
            <li class="active">Apply to write for us</li>
        </ol>    
  </section>
 

   <br>
    <br>
    
  
  <div class="container-fluid">
    <div class="col-md-7 col-md-offset-2">
   
    
     
            <div class="box box-default">
                    

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


              <?php 
             if(isset($error))
             {
              ?>
              <div class="alert alert-warning">
               <?php
                echo $error;
                ?>
               </div>
               <?php
             }

           ?>

           <div class="box-header with-border">
              <h3 class="box-title">Apply to write for us</h3>
            </div>

          

                      <!--No Label Form-->

                      <!--===================================================-->

                      
             <form action="<?php echo base_url('writer/apply_process') ?>" method="post" style="padding-bottom: 30px;" enctype="multipart/form-data">
                <div class="box-body">
                                 
                                 <?php

                                foreach ($p->result() as $row)
                                {   
                                     $country=$row->iso;
                                    ?>   

                                                    
                            <!-- Tab panes -->
                                   <input type="hidden" name="user_id" value="<?php if(isset($user_id)){ echo $user_id;  } ?>">
                                   <div class="form-group">
                                    
                                     
                                        <label for="inputEmail" class="col-xl-12 form-control-label">First Name</label>
                                      
                                            <input class="form-control" value="<?php if(isset($row->user_fname)) { echo $row->user_fname;  }   ?>" name="user_fname" id="title"  type="text" required>
                                      
                                      </div>
                                  
                                       
                                     <div class="form-group">
                                        <label for="inputEmail" class="col-xl-12 form-control-label">Surname</label>
                                      
                                            <input class="form-control" value="<?php if(isset($row->user_lname)) { echo $row->user_lname;  }   ?>" name="user_lname" id="title"  type="text" required>
                                        
                                      </div>
                                      

                                  <div class="form-group">
                                   
                                        <label for="inputEmail" class="col-xl-12 form-control-label">Country</label>
                                       
                                          <select name="user_location_id" class="form-control" id="countrylist" required>
                                            <option></option>
                                            <?php
                                             foreach ($c->result() as $row)
                                              {  ?>
                                                <option value="<?php echo $row->iso; ?>"><?php echo $row->printable_name; ?></option>
                                              <?php } ?>
                                            </select>
                                        
                                       
                                     </div>


                                    <div class="form-group">
                                      
                                         <div class="col-12">
                                        <label for="textArea" class="col-xl-12 form-control-label">Why should you write for us</label>
                                       
                                           <textarea name="why" rows="7" class="form-control" required></textarea>
                                        
                                       </div>
                                      
                                    </div>
                                    
                                   
                                  
                                   <div class="form-group">
                                        <label for="textArea" class="col-xl-12 form-control-label">Upload your work experience document</label>
                                        <div class="col-xl-10">
                                           <input type="file" name="experience" required>
                                        </div>
                                    </div>
                                   <div class="form-group">
                                       
                                        <label for="inputEmail" class="col-xl-12 form-control-label">Link to your portfolio of past work(Optional)</label>
                                        <div class="col-xl-10">
                                            <input class="form-control" value="<?php if(isset($row->user_lname)) { echo $row->user_lname;  }   ?>" name="user_portfolio_link" id="title"  type="text">
                                        </div>
                                    </div>
                                    
                                   

                                  
                                     <div class="form-group">
                                       
                                        <label for="inputEmail" class="col-xl-12 form-control-label">Select disciplines where you are most experienced in</label>
                                         <div class="col-xl-10">
                                    <select class="js-example-basic-multiple col-xl-10 form-control" name="industry[]" multiple="multiple" required>

                                          <?php
                                            
                                             foreach ($i->result() as $row)
                                              {  ?>
                                                <option value="<?php echo $row->discipline_id; ?>"><?php echo $row->discipline_name; ?></option>
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
                               

                               </div>
                                 
                            </form>

                      <!--===================================================-->

                      <!--End No Label Form-->

          

                  </div>




            

            <!--===================================================-->

            <!--END MAIN NAVIGATION-->


       </div>
    </div>

</div>

        



        <!-- FOOTER -->

        <!--===================================================-->

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

