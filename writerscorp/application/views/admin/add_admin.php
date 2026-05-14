<?php include 'header.php' ?>
<div class="content-page">
                <div class="content">
                    
                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                   
                                    <h4 class="page-title">Add Admin</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">

                         <div class="col-md-9 offset-md-1">


                          <div class="card">
                                    <div class="card-body">

                              <div class="card-body">
                                  <h5>Add Admin</h5>

                               <form method="post" action="<?php echo base_url('admin/add_admin_process'); ?>">
                                <label>First Name</label>
                                <input type="text" class="form-control" name="user_fname" placeholder="First Name" required>
                                <label>Email</label>
                                <input type="email" class="form-control" name="user_email" placeholder="Email" required>
                                <label>Role</label>
                                <select name="user_role" class="form-control" required>
                                  <option value="">----</option>
                                   <option value="2">Client Support</option>
                                   <option value="3">Quality Department</option>
                                   <option value="4">Finance Department</option>
                                  
                                </select>
                                <label>Password</label>
                                <input type="password" class="form-control" name="user_password" placeholder="Password" required>
                               
                                <br>
                                <button class="btn btn-primary" type="submit">Add Admin</button>
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