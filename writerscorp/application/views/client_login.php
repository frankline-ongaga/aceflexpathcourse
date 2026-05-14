<?php include 'header.php' ?>

<div class="page-intro">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <ol class="breadcrumb">
                <li><i class="fa fa-home pr-10"></i><a href="<?php echo base_url(); ?>">Home</a></li>
                <li class="active">Login</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <!-- page-intro end -->

      <!-- main-container start -->
      <!-- ================ -->
      <section class="main-container">

        <div class="container">
          <div class="row">

            <!-- main start -->
            <!-- ================ -->
            <div class="main col-md-12">

              <!-- page-title start -->
              <!-- ================ -->
              
              <!-- page-title end -->
              
              <div class="row">
               
                <div class="col-md-5 col-md-offset-3">
                 <div class="login-wrapper">
                       <h1 class="page-title" style="text-align: center; position: relative; bottom: 15px;">Login</h1>
                       <?php
                         if(isset($error_message))
                         { ?>
                          <div class="alert alert-warning">
                          <?php
                           echo $error_message;
                          ?>
                          </div>
                        <?php

                         }

                         if(isset($messo))
                         { ?>
                          <div class="alert alert-warning">
                          <?php
                           echo $messo;
                          ?>
                          </div>
                        <?php

                         }

                         if(isset($message_display))
                         { ?>
                          <div class="alert alert-success">
                          <?php
                           echo $message_display;
                          ?>
                          </div>
                        <?php

                         }


                       ?>
                        
                      
                  <form class="form-horizontal" role="form" method="post" action="<?php echo base_url('Client/user_login_process'); ?>">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                      <div class="col-sm-10">
                        <input type="email" name="client_email" class="form-control" id="inputEmail3" placeholder="Email">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                      <div class="col-sm-10">
                        <input type="password" name="client_password" class="form-control" id="inputPassword3" placeholder="Password">
                      </div>
                    </div>
                   
                    <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">Sign in</button>
                      </div>
                    </div>
                  </form>
                                     <br>
              
                  
                  
                </div>
               </div>
                <!-- sidebar start -->
               
                <!-- sidebar end -->
              </div>
              <hr>
            </div>
            <!-- main end -->

          </div>
        </div>
      </section>


<?php include 'footer.php' ?>
