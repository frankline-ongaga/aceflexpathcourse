<!DOCTYPE html>
<html class="no-js" lang="en">
    <head>
        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-JH8Y4MPXMK"></script>
      
        <meta charset="utf-8" />
        <meta http-equiv="x-ua-compatible" content="ie=edge" />
        <title><?php if(isset($title)){ echo $title; } ?></title>
                <meta name="description" content="<?php if(isset($description)){ echo $description; } ?>" />
        
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
      
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/wowjs@1.1.3/css/libs/animate.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.css" integrity="sha512-f0tzWhCwVFS3WeYaofoLWkTP62ObhewQ1EZn65oSYDZUg1+CyywGKkWzm8BxaJj5HGKI72PnMH9jYyIFz+GH7g==" crossorigin="anonymous" />
    <script   src='https://www.google.com/recaptcha/api.js' async defer></script>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/Wruczek/Bootstrap-Cookie-Alert@gh-pages/cookiealert.css">

        <link rel="stylesheet" href="<?php echo base_url('css/main_style.css'); ?>" />
        <link rel="stylesheet" href="<?php echo base_url('css/style.css'); ?>" />
            <link rel="stylesheet" href="<?php echo base_url('static/css/mystyle.css'); ?>">
                <link rel="stylesheet" href="<?php echo base_url('css/dropzone.min.css') ?>">



        <!-- Google tag (gtag.js) -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

      
        
        <style>
             body {
             font-size:17px;
            }
            .navbar-brand {
                padding-top: 1.3125rem;
            }

            .clock-item .inner {
                height: 0px;
                padding-bottom: 100%;
                position: relative;
                width: 100%;
            }

            .clock-canvas {
                background-color: rgba(255, 255, 255, 0.1);
                border-radius: 50%;
                height: 0px;
                padding-bottom: 100%;
            }

            .text {
                color: #fff;
                font-size: 30px;
                font-weight: bold;
                margin-top: -50px;
                position: absolute;
                top: 50%;
                text-align: center;
                text-shadow: 1px 1px 1px rgba(0, 0, 0, 1);
                width: 100%;
            }

            @media (max-width: 767px) {
                .text .val {
                    font-size: 16px;
                    line-height: 23px;
                }

                .text .type-time {
                    font-size: 11px;
                }
            }

            @media (min-width: 768px) {
                .text .val {
                    font-size: 24px;
                }

                .text .type-time {
                    font-size: 20px;
                }
            }

            a {
                text-decoration: none !important;
            }
       

        </style>
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5c95e820101df77a8be41012/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
    </head>



    <body onload="get_tols();">
      
        <div id="app">
            <!-- Navbar -->
            <nav class="navbar mesh-nav-controls navbar-expand-lg w-100 ">
                <div class="container-fluid container-lg d-flex justify-content-between">
                    <a class="navbar-brand d-flex justify-content-center align-items-between gap-2" href="<?= base_url(); ?>">
                         <img src="<?= base_url('images/aceflexpathcourse.png'); ?>" alt="AceFlexPathCourse now" class="mb-1" style="height: 30px;margin-top:-10px;z-index:-1" />         
                        <!-- <span class="mesh-nav-link" style="margin-top:-7px">Naxlex</span> -->
                    </a>
                    <a
                        class="d-lg-none cursor-pointer rounded-circle d-flex shadow justify-content-center justify-items-center"
                        style="width: 40px; height: 40px; background-color: transparent;"
                        data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent"
                        aria-expanded="false"
                        aria-label="Toggle navigation"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-white" style="width: 32px;">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12H12m-8.25 5.25h16.5" />
                        </svg>
                    </a>
                    <div class="collapse mesh-navbar-collapse bg-white rounded-1 shadow p-3" id="navbarSupportedContent">
                        
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0 gap-3">
                            <li class="mesh-nav-link ">
                                <a class=" " href="<?php echo base_url(); ?>">Home</a>
                            </li>
                            <li class="mesh-nav-link">
                                <a class="" href="<?php echo base_url('services'); ?>">Services</a>
                            </li>
                            <li class="mesh-nav-link">
                                <a class="" href="<?php echo base_url('universities'); ?>">Universities</a>
                            </li>
                            <li class="mesh-nav-link">
                                <a class="" href="<?php echo base_url('how_it_works'); ?>">  How It Works</a>
                            </li>
                            <li class="mesh-nav-link">
                                <a class="" href="<?php echo base_url('samples'); ?>">Samples</a>
                            </li>
                            
                            
                        </ul>
                        <div class="">
                              <div>
                            <a class="mesh-button-border-red ms-3 my-2 dropdown-toggle" type="button"
                                href="<?= base_url('order_now'); ?>" aria-expanded="false">
                                Order Now
                            </a>
                           
                        </div>
                        <div>
                            <a class="mesh-button ms-3 my-2" type="button" href="<?= base_url('client'); ?>" aria-expanded="false">
                                Log In 
                            </a>
                          
                        </div>
                        </div>
                    </div>
                    
                    <div class="d-none d-lg-block">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex justify-content-between gap-4 mt-1">
                            <li class="mesh-nav-link">
                                <a id='home' class="" href="<?php echo base_url(); ?>">Home</a>
                            </li>
                            <li class="mesh-nav-link">
                                <a id='teas' class="" href="<?php echo base_url('services'); ?>">Services</a>
                            </li>
                            <li class="mesh-nav-link">
                                <a id="nclex" class="" href="<?php echo base_url('universities'); ?>">Universities</a>
                            </li>
                            <li class="mesh-nav-link">
                                <a id=hesi class="" href="<?php echo base_url('how_it_works'); ?>">How It Works</a>
                            </li>
                            <li class="mesh-nav-link">
                                <a id='nursing' class="" href="<?php echo base_url('samples'); ?>">Samples</a>
                            </li>
                           
                        </ul>
                    </div>
                    
   <form class="d-none d-lg-flex">
    <a href="<?php echo base_url('order_now'); ?>" 
       class="mesh-button-border-red ms-3 my-2 dropdown-toggle text-white wow animate__slideRightSlightly"
       data-wow-duration="1.5s" data-wow-delay=".0s">
       Order Now
    </a>
    
    <a href="<?php echo base_url('client'); ?>" 
       class="mesh-button ms-3 my-2 dropdown-toggle text-white wow animate__slideLeftSlightly"
       data-wow-duration="1.5s" data-wow-delay=".0s">
       Log In
    </a>
</form>



                </div>
            </nav>
            <!-- Navbar -->
            <div class="tp-offcanvas-area">
                <div class="offcanvas offcanvas-start bg-white ps-3 pe-4" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasSidebar" style="width: inherit;" aria-modal="true" role="dialog">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title ps-4" id="offcanvasSidebar">AceFlexpathCourse</h5>
                        <button type="button" class="btn-close text-dark" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <div>
                            <!--menu 1-->

                            <a class="d-block p-3 mb-3 fs-15 fw-medium text-dark" href="https://www.naxlex.com/blog" target="_blank"> <i class="far fa-blog ps-1 pe-2 text-primary" style="font-size: 17px;"></i> <span>Blog</span> </a>
                            <li class="d-block ps-3 mb-3 fs-15 fw-medium text-dark">
                                <span></span>
                                <a class="me-2" href="https://youtube.com/@naxlexnursingprep-reviews?si=IyaRPiKx3d2oyXrt">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-youtube" viewBox="0 0 16 16">
                                        <path
                                            d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z"
                                        />
                                    </svg>
                                </a>
                                <span class="me-1">
                                    <a href="https://www.tiktok.com/@naxlex_nursing_prep?lang=en">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-tiktok" viewBox="0 0 16 16">
                                            <path d="M9 0h1.98c.144.715.54 1.617 1.235 2.512C12.895 3.389 13.797 4 15 4v2c-1.753 0-3.07-.814-4-1.829V11a5 5 0 1 1-5-5v2a3 3 0 1 0 3 3V0Z" />
                                        </svg>
                                    </a>
                                </span>
                                <span class="me-2">
                                    <a href="https://www.facebook.com/people/Naxlex-Nursing-Prep/6joi1557741969785/" target="_blank">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                            <path
                                                d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"
                                            />
                                        </svg>
                                    </a>
                                </span>
                                <span class="me-2">
                                    <a
                                        href="
                                https://www.instagram.com/naxlexnursingprep/?hl=en "
                                        target="_blank"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                                            <path
                                                d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"
                                            />
                                        </svg>
                                    </a>
                                </span>
                            </li>
                        </div>
                    </div>
                </div>
            </div>
            <!-- tp-hero-area-start -->
            <main>
                
