<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from xvelopers.com/demos/html/paper-1.8.2/login-4.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 23 Aug 2019 09:26:01 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo base_url('assets/img/basic/favicon.ico') ?>" type="image/x-icon">
    <title>99 Content</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/app.css') ?>">
   
</head>

<body>
   
    <div id="app" class="">
       
        <main>
            <div id="primary" class="p-t-b-100 height-full">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 mx-md-auto paper-card">

                            <div class="text-center">
                               <?php if(isset($message_display)){
                                 ?>
                                 <div class="alert alert-success">
                                 <?php echo $message_display; ?>
                                 </div>
                             <?php
                               } 

                              if(isset($error_message)) { ?>
                             <div class="alert alert-warning">
                                <?php echo $error_message;  ?>
                                 
                             </div>
                            <?php
                             }

                           ?>

                                <h2>Admin Login</h2>
                              
                            </div>
                            <br>
                           
                            <br>
                            <form action="<?php echo base_url('admin/user_login_process') ?>" method="post">
                                <div class="form-group has-icon"><i class="icon-envelope-o"></i>
                                    <input type="email" name="admin_email" class="form-control form-control-lg" placeholder="Email Address" required>
                                </div>
                                <div class="form-group has-icon"><i class="icon-user-secret"></i>
                                    <input type="password" name="admin_password" class="form-control form-control-lg" placeholder="Password" required>
                                </div>
                                <input type="submit" class="btn btn-primary btn-lg btn-block" value="Log In">
                            </form>
                               
                        </div>
                    </div>
                </div>
            </div>
            <!-- #primary -->
        </main>
        <div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog width-400" role="document">
                <div class="modal-content no-r "><a href="#" data-dismiss="modal" aria-label="Close" class="paper-nav-toggle active"><i></i></a>
                    <div class="modal-body no-p">
                        <div class="text-center p-40 p-b-0"> <img src="assets/img/dummy/u4.png" alt="">
                            <h3>Welcome Back</h3>
                            <p class="p-t-b-20">Hey Soldier welcome back signin now there is lot of new stuff waiting for you</p>
                        </div>
                        <div class="light p-40 b-t-b">
                            <form action="https://xvelopers.com/demos/html/paper-1.8.2/dashboard2.html">
                                <div class="form-group has-icon"><i class="icon-envelope-o"></i>
                                    <input type="text" class="form-control form-control-lg" placeholder="Email Address">
                                </div>
                                <div class="form-group has-icon"><i class="icon-user-secret"></i>
                                    <input type="text" class="form-control form-control-lg" placeholder="Password">
                                </div>
                                <input type="submit" class="btn btn-primary btn-lg btn-block" value="Log In"> <small class="forget-pass">Have you forgot your username or password ?</small></form>
                        </div>
                        <div class="p-40"><a href="#" class="btn btn-lg btn-block btn-social facebook"><i class="icon-facebook"></i> Login with Facebook</a><a href="#" class="btn btn-lg btn-block btn-social twitter"><i class="icon-twitter"></i> Login with Twitter</a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modalSignUp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content no-r "><a href="#" data-dismiss="modal" aria-label="Close" class="paper-nav-toggle active"><i></i></a>
                    <div class="modal-body no-p">
                        <div class="row">
                            <div class="col-lg-5 grid">
                                <div class="p-40">
                                    <h5 class="p-t-40">Sign Up Using Social Account</h5>
                                    <a href="#" class="btn btn-lg btn-block btn-social facebook"><i class="icon-facebook"></i> Login with Facebook</a><a href="#" class="btn btn-lg btn-block btn-social twitter"><i class="icon-twitter"></i> Login with Twitter</a></div>
                            </div>
                            <div class="col-lg-7">
                                <div class="light p-t-b-40">
                                    <div class="p-40">
                                        <h5 class="p-b-20">Create New User Account</h5>
                                        <form action="https://xvelopers.com/demos/html/paper-1.8.2/dashboard2.html">
                                            <div class="form-group has-icon"><i class="icon-user-circle"></i>
                                                <input type="text" class="form-control form-control-lg" placeholder="Your Name">
                                            </div>
                                            <div class="form-group has-icon"><i class="icon-envelope-o"></i>
                                                <input type="text" class="form-control form-control-lg" placeholder="Email Address">
                                            </div>
                                            <div class="form-group has-icon"><i class="icon-user-secret"></i>
                                                <input type="text" class="form-control form-control-lg" placeholder="Password">
                                            </div>
                                            <div class="form-group has-icon"><i class="icon-repeat"></i>
                                                <input type="text" class="form-control form-control-lg" placeholder="Confirm Password">
                                            </div>
                                            <input type="submit" class="btn btn-primary btn-lg btn-block" value="Sign Up Now">
                                            <p class="forget-pass">A verification email wil be sent to you</p>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo base_url('assets/js/app.js') ?>"></script>
</body>
<!-- Mirrored from xvelopers.com/demos/html/paper-1.8.2/login-4.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 23 Aug 2019 09:26:01 GMT -->

</html>