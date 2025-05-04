<?php include 'header.php' ?>
<div class="content-page">
                <div class="content">
                    
                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                   
                                    <h4 class="page-title">Assign level to writer</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">

                         <div class="col-md-9 offset-md-1">


                          <div class="card">
                                    <div class="card-body">
                                        
                                 

                               <form method="post" action="<?php echo base_url('admin/approve_writer'); ?>">
                                <input type="hidden" name="writer_id" value="<?php if(isset($writerid)) { echo $writerid; }?>">
                               <div class="form-group">
                                        <label for="select"  class="col-xl-12 form-control-label">Select Level</label>
                                        <div class="col-xl-10">
                                            <select name="writer_level" class="form-control" id="countrylist" required>
                                            
                                            <?php
                                             foreach ($p->result() as $row)
                                              {  ?>
                                                <option value="<?php echo $row->level_id; ?>"><?php echo $row->level_name; ?></option>
                                              <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                <br>
                                 <div class="form-group">
                                        <label for="select"  class="col-xl-12 form-control-label">Writer Type</label>
                                        <div class="col-xl-10">
                                            <select name="writer_type" class="form-control" id="countrylist" required>
                                            
                                            <?php
                                             foreach ($t->result() as $row)
                                              {  ?>
                                                <option value="<?php echo $row->writer_type_id; ?>"><?php echo $row->writer_type_name; ?></option>
                                              <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                <br>
                                <div class="form-group">
                                    <div class="col-xl-10">
                                      <button class="btn btn-primary" type="submit">Assign</button>
                                    </div>
                                 </div>
                               </form>
                             
                         

                              </div>
                             
                              
                             
                            </div>
                          </div>

                       
                      </div>
                      
                  
                      
                       </div>
                    </div>
                </div>
            </div>
        </main>
<?php include 'footer.php'; ?>