<!DOCTYPE html>
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if gt IE 9]> <html lang="en" class="ie"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
  
<head>
    <meta charset="utf-8">
    <title>Writers Corp | Home of custom written papers</title>
    <meta name="description" content="<?php if(isset($description)){ echo $description; } ?>">
    <meta name="author" content="kevinkirui2@gmail.com">

    <!-- Mobile Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo base_url('assets/images/writerscorpfav.png'); ?>">

    <!-- Web Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700,300&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=PT+Serif' rel='stylesheet' type='text/css'>



    <!-- Bootstrap core CSS -->
     <link href="<?php echo base_url('bootstrap/css/bootstrap.css') ?>" rel="stylesheet"> 

    <!-- Font Awesome CSS -->
    <link href="<?php echo base_url('fonts/font-awesome/css/font-awesome.css') ?>" rel="stylesheet">

    <!-- Fontello CSS -->
    <link href="<?php echo base_url('fonts/fontello/css/fontello.css') ?>" rel="stylesheet">

    <!-- Plugins -->
    <link href="<?php echo base_url('plugins/rs-plugin/css/settings.css') ?>" media="screen" rel="stylesheet">
    <link href="<?php echo base_url('plugins/rs-plugin/css/extralayers.css') ?>" media="screen" rel="stylesheet">
    <link href="<?php echo base_url('plugins/magnific-popup/magnific-popup.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('css/animations.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('plugins/owl-carousel/owl.carousel.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/bootstrap-formhelpers.css') ?>" rel="stylesheet">

    <!-- iDea core CSS file -->
    <link href="<?php echo base_url('css/style.css') ?>" rel="stylesheet">
     
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script type="text/javascript" src="<?php echo base_url('plugins/jquery.min.js') ?>"></script>
  
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.js " type="text/javascript"></script>

   <script src="<?php echo base_url('assets/js/jquery.ccpicker.min.js') ?>"></script>

  <link rel="stylesheet" href="<?php echo base_url('assets/css/jquery.ccpicker.css') ?>">
                     <script>
                          $( document ).ready(function() {
                            $("#phoneField1").CcPicker();
                            $("#phoneField1").CcPicker("setCountryByCode","es");
                            $("#phoneField3").CcPicker({"countryCode":"us"});
                            $("#phoneField5").CcPicker();
                            $("#phoneField1").on("countrySelect", function(e, i){
                                                alert(i.countryName + " " + i.phoneCode);
                                              });
                          });
                        </script>
      <!-- Style Switcher Styles (Remove these two lines) -->
      
  
      <!-- Custom css -->
      <link href="css/custom.css" rel="stylesheet">
    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <!-- body classes: 
      "boxed": boxed layout mode e.g. <body class="boxed">
      "pattern-1 ... pattern-9": background patterns for boxed layout mode e.g. <body class="boxed pattern-1"> 
  -->
  <body class="front no-trans" onload="calculateTotal(),calculateWords(),calculateUpper(),calculateUnder(),calculateMasters(),calculateDoctoral()">
    <!-- scrollToTop -->
    <!-- ================ -->
    <div class="scrollToTop"><i class="icon-up-open-big"></i></div>

    <!-- page wrapper start -->
    <!-- ================ -->
    <div class="page-wrapper">

      <!-- header-top start (Add "dark" class to .header-top in order to enable dark header-top e.g <div class="header-top dark">) -->
      <!-- ================ -->
      <div class="header-top">
        <div class="container">
          <div class="row">
            <div class="col-xs-2 col-sm-6">

              <!-- header-top-first start -->
              <!-- ================ -->
              <div class="header-top-first clearfix">
                
              </div>
              <!-- header-top-first end -->

            </div>

            <div class="col-xs-10 col-sm-6">

              <!-- header-top-second start -->
              <!-- ================ -->
              <div id="header-top-second"  class="clearfix">

                <!-- header top dropdowns start -->
                <!-- ================ -->
                <div class="header-top-dropdown">
                  
                  <div class="btn-group dropdown">
                   
                    <button type="button" class="<?php if($this->uri->segment(2)=='my_orders' or $this->uri->segment(2)=='user_login_process'){ echo 'admin-active'; } ?>" onclick="location.href='<?php echo base_url('Client/my_orders') ?>'" ><i class="fa fa-list"></i>  MY ORDERS </button>

                    
                  </div>

                  <div class="btn-group dropdown">
                   
                    <button type="button" class="<?php if($this->uri->segment(2)=='makeorder'){ echo 'admin-active'; } ?>" onclick="location.href='<?php echo base_url('Client/makeorder') ?>'" ><i class="fa fa-plus"></i>  MAKE AN ORDER </button>

                    
                  </div>

                  <div class="btn-group dropdown">
                   
                    <button type="button" class="<?php if($this->uri->segment(2)=='profile' or $this->uri->segment(2)=='change_password' or $this->uri->segment(2)=='change_password_process'){ echo 'admin-active'; } ?>" onclick="location.href='<?php echo base_url('Client/profile') ?>'" ><i class="fa fa-user"></i>  MY PROFILE </button>

                    
                  </div>

                  <div class="btn-group dropdown">
                   
                    <button type="button" class="" onclick="location.href='<?php echo base_url('Client/logout') ?>'" ><i class="fa fa-arrow-right"></i>  LOGOUT </button>

                    
                  </div>

                 

                </div>
                <!--  header top dropdowns end -->

              </div>
              <!-- header-top-second end -->

            </div>
          </div>
        </div>
      </div>
      <!-- header-top end -->

      <!-- header start classes:
        fixed: fixed navigation mode (sticky menu) e.g. <header class="header fixed clearfix">
         dark: dark header version e.g. <header class="header dark clearfix">
      ================ -->
     