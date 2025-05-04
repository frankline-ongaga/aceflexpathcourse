<div class="page-wrapper">
      <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
          <div class="breadcrumb-title pe-3">Refer & Earn</div>
          <div class="ps-3">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Refer & Earn</li>
              </ol>
            </nav>
          </div>
         
        </div>
        <!--end breadcrumb-->
         <div class="card">
         <div class="card-body">
        <div class="row">
       
          <div class="col-xl-6 mx-auto">

             <img src="<?= base_url('img/collegefriends.jpg'); ?>">

          </div>
          <div class="col-xl-6 mx-auto">
            <h2 class="mb-0">Give 20%-Get 50%</h2>
            <hr/>
            
                                           
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
                                        <h5 class="header-title">Get 50% off your next order when your friend places an order.</h5> <br>
                                       
                                        <div class="row">
                                            <div class="col-xl-9">
                                             <?php if(!empty($error)){ ?>

                                                 <div class="alert alert-warning">
                                                   <?php echo $error; ?>
                                                  </div>

                                               <?php     } ?>
                                            

             <div class="box-body">
                                 
                                

                                                    
                            <!-- Tab panes -->

                                 
                                  

                                 <a  data-bs-toggle="modal" data-bs-target="#exampleModal" style="color:#fff;" class="btn btn-primary btn-md"><i class="fas fa-envelope"></i>Invite via email</a>

                                
                                
                                   <br>
                                   <br>

                                  <div> --OR-- </div>

                                  <br>

                                


                                  <div class="form-group">
                                   
                                      
                                        
                                        <label for="inputEmail" class="col-xl-8 form-control-label">Share the link below</label>
                                        <div class="col-xl-10">
                                            <input class="form-control" value="<?= $link ?>" name="subject" id="myInput"  type="text" required>
                                            <br>
                                            <button  onclick="myFunction()" style="color:#fff;" class="btn btn-primary btn-md"><i class="fas fa-link"></i>

                                                  Copy link to clipboard</button>
                                        </div>
                                        
                                        
                                  </div>
                                   

                               
                                



                            </div>
                               

                              
                                 
                          
                                            </div>
    
                                           
                                        </div>
                                        <!-- end row -->
    
                                    </div>

                                </div>


                          </div>
                           
                          
                        </div>
                        <!--- end row -->

                       
                        <!-- end row -->

                       
                        <!-- end row -->

                       
                        <!-- end row -->

                      
                        <!-- end row -->


                       
                        <!-- end row -->  
                        
                    </div> <!-- end container-fluid -->

</div> <!-- end content -->


                

                <!-- Footer Start -->
               
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Invite Friend Via Email</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <form method="post" action="<?= base_url('client/invite_friend');  ?>">


              <label>Friend's Name</label>
              <input type="text" name="fname" class="form-control">

              <br> 

               <label>Friend's Email</label>
               <input type="email" name="email" class="form-control">


               <input type="hidden" name="msg" value="<?= $link; ?>">

               <br>


               <button type="submit" class="btn btn-success">Invite</button>



            


          </form>
        
      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>