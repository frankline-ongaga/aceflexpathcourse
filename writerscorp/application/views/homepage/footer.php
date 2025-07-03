 <!-- footer-area-start -->
             <style>
        /* Simple Logo Grid */
        .logos-section {
            padding: 60px 0;
            background: #f8f9fa;
        }

        .logos-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .logo-item {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .logo-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            border-color: #667eea;
        }

        .logo-item img {
         //   max-width: 120px;
         //   max-height: 80px;
            width: auto;
            height: auto;
            object-fit: contain;
            transition: transform 0.3s ease;
        }

        .logo-item:hover img {
            transform: scale(1.05);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .logos-grid {
                grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
                gap: 1.5rem;
            }
            
            .logo-item {
                padding: 1.5rem;
            }
            
            .logo-item img {
             //   max-width: 100px;
             //   max-height: 70px;
            }
        }

        @media (max-width: 480px) {
            .logos-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 1rem;
            }
            
            .logo-item {
                padding: 1rem;
            }
            
            .logo-item img {
             //   max-width: 80px;
             //   max-height: 60px;
            }
        }
    </style>

    <!-- University Logos Section -->
    <section class="logos-section">
        <div class="container">
            <div class="logos-grid">
                <div class="logo-item">
                    <img src="<?= base_url('universitieslogo/capella.webp'); ?>" alt="Capella University flexpath course help">
                </div>
                
                <div class="logo-item">
                    <img src="<?= base_url('universitieslogo/westerngovernors.webp'); ?>" alt="Western Governors University flexpath course help">
                </div>
                
                <div class="logo-item">
                    <img src="<?= base_url('universitieslogo/purdue.webp'); ?>" alt="Purdue University Global flexpath course help">
                </div>
                
                <div class="logo-item">
                    <img src="<?= base_url('universitieslogo/snhu.webp'); ?>" alt="Southern New Hampshire University flexpath course help">
                </div>
                
                <div class="logo-item">
                    <img src="<?= base_url('universitieslogo/walden.webp'); ?>" alt="Walden University flexpath course help">
                </div>
                
                <div class="logo-item">
                    <img src="<?= base_url('universitieslogo/universityofwisconsin.webp'); ?>" alt="University of Wisconsin flexpath course help">
                </div>
                
                <div class="logo-item">
                    <img src="<?= base_url('universitieslogo/nau.webp'); ?>" alt="Northern Arizona University flexpath course help">
                </div>
                
                <div class="logo-item">
                    <img src="<?= base_url('universitieslogo/umass.webp'); ?>" alt="UMass Global flexpath course help">
                </div>
            </div>
        </div>
    </section>
            <footer>
                <div class="mesh-footer py-5" style="background: radial-gradient(60.63% 60.63% at 57.15% 51.07%, rgb(0 110 145) 0px, rgb(4, 32, 51) 100%); color: white;">
                    <div class="container">
                        <div class="row mb-4">
                            <div class="col-xl-5 col-lg-5 col-md-5">
                                <a class="navbar-brand d-flex justify-content-start align-items-between gap-2" href="<?= base_url(); ?>">
                                    <img src="<?= base_url('images/aceflexpathcourse.png'); ?>" alt="AceFlexPathCourse help" class="img-fluid mb-1" style="width: 70%;" />
                                </a>
                                <br>
                                <div class="">
                                    <div class="text-sm mb-30">
                                        <span class="mt-3">We are a specialized academic support platform that helps students excel in self-paced FlexPath programs such as RN to BSN, RN to MSN, MHA, DNP, MBA, DBA, Psychology, Business, and IT. </span><br />
                                        <br>
                                        <span><b>Email Address:</b>support@aceflexpathcourse.com</span><br />
                                        <span><b>Whatsapp: </b><a href="https://wa.me/12063504565">+1 (206) 350-4565</a></span>                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1 col-lg-1 col-md-1"></div>
                            <div class="col-6 col-xl-3 col-lg-3 col-md-3">
                                <div class="">
                                    <div class="tp-- pb-15">
                                        <h4 class="text-white">Quick Links</h4>
                                    </div>
                                    <br>
                                    <div class="--">
                                        <ul class="ps-0">
                                            <li><a href="<?php echo base_url('order_now'); ?>">Order Now</a></li>
                                            <li><a href="<?php echo base_url('reviews'); ?>">Reviews</a></li>

                                            <li><a href="<?php echo base_url('how_it_works'); ?>">How It Works</a></li>
                                            <li><a href="<?php echo base_url('pricing'); ?>">Pricing</a></li>
                                            <li><a href="<?php echo base_url('privacy'); ?>">Privacy</a></li>
                                            <li><a href="<?php echo base_url('blog'); ?>">Blog</a></li>
                                            <li><a href="<?php echo base_url('client'); ?>">Sign Up</a></li>
                                            <li><a href="<?php echo base_url('terms'); ?>">Terms and Conditions</a></li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-xl-3 col-lg-3 col-md-3">
                                <div class="pl-20">
                                    <div class="pb-15">
                                        <h4 class="footer-title text-white">Payment</h4>
                                    </div>
                                    <div class="">
                                         <a class="navbar-brand d-flex justify-content-start align-items-between gap-2" >
                                    <img src="<?php echo base_url('assets/images/paypal.webp'); ?>" alt="AceFlexPathCourse NCLEX" class="img-fluid mb-1" style="height: 35px;" />
                                    <span class="mesh-nav-link"></span>
                                </a>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="w-100 d-flex justify-content-center gap-2 gap-lg-5 my-5">
                                <div>
                            <a class="mesh-button ms-3 my-2 dropdown-toggle text-white" href="<?= base_url('order_now'); ?>">
                                 Order Now 
                            </a>
                            
                        </div>
                        <div>
                            <a class="mesh-button-border-red ms-3 my-2 dropdown-toggle text-white"  href="<?= base_url('client'); ?>">
                                Log In 
                            </a>
                            
                        </div>
                        </div>
                            </div>
                        </div>
                        <div class="row text-center">
                            <div class="col-xl-12 wow tpfadeUp" data-wow-duration=".1s" data-wow-delay=".1s">
                                <p class="right-receved text-white">
                                    ©
                                    2025 Aceflexpathcourse.com <span class="ms-3 me-3">
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- footer-area-end -->
            
            <!--<div class="alert alert-warning alert-dismissible fade show mb-0 pb-0 text-center w-100" role="alert" style="position:fixed; bottom:0">-->
            <!--    <h6 class="h4">Scheduled Website Migration for Enhanced Services Access</h6> -->
            <!--    <p class="mx-md-5">The website may be temporarily inaccessible during this time. We are working to complete this transition as swiftly as possible to minimize any inconvenience.</p>-->
            <!--    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>-->
            <!--</div>-->

            
        </div>
    <script data-cfasync="false" src="cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script></body>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.js" integrity="sha512-Rd5Gf5A6chsunOJte+gKWyECMqkG8MgBYD1u80LOOJBfl6ka9CtatRrD4P0P5Q5V/z/ecvOCSYC8tLoWNrCpPg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src=" <?php echo base_url('assets/js/mesh1.js'); ?>"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
    
<script async defer  src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
<script src="<?= base_url('assets/js/jquery.counterup.min.js') ?>"></script>

<script src="<?= base_url('assets/js/custom.js') ?>"></script>

<script src="<?= base_url('assets/js/dropzone.min.js') ?>"></script>

<script src="<?= base_url('asset/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script><!-- headroom JS -->
<script src="<?php echo base_url('asset/vendor/headroom/headroom.min.js'); ?>"></script><!-- swiper JS -->
<script src="<?php echo base_url('asset/vendor/swiper/swiper-bundle.min.js'); ?>"></script><!-- purecounter JS -->
<script src="<?php echo base_url('asset/vendor/purecounter/purecounter_vanilla.js'); ?>"></script>
<script src="<?php echo base_url('asset/js/theme.js'); ?>"></script>
<script src="<?php echo base_url('asset/js/jquery-3.5.1.min.js'); ?>">
  
</script>
<script src="<?php echo base_url('asset/vendor/magnific/jquery.magnific-popup.min.js'); ?>"></script>
<script src="asset/vendor/isotope/isotope.pkgd.min.js"></script>
<script src="<?php echo base_url('asset/js/theme-jquery.js'); ?>"></script><!-- End script start -->


<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js" integrity="sha512-37T7leoNS06R80c8Ulq7cdCDU5MNQBwlYoy1TX/WUsLFC2eYNqtKlV0QjH7r8JpG/S0GUMZwebnVFLPd6SU5yg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdn.jsdelivr.net/gh/Wruczek/Bootstrap-Cookie-Alert@gh-pages/cookiealert.js"></script>


 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js" integrity="sha512-AIOTidJAcHBH2G/oZv9viEGXRqDNmfdPVPYOYKGy3fti0xIplnlgMHUGfuNRzC6FkzIo0iIxgFnr9RikFxK+sw==" crossorigin="anonymous"></script>


 <script type="text/javascript">
    (function () {
        var options = {
            whatsapp: "+1 (206) 350-4565", // WhatsApp number
            call: "+1 (206) 350-4565", // Call phone number
            call_to_action: "Message us", // Call to action
            button_color: "#FF318E", // Color of button
            position: "left", // Position may be 'right' or 'left'
            order: "whatsapp,call", // Order of buttons
        };
        var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    })();
</script>




<script>

    grecaptcha.ready(function() {
    // do request for recaptcha token
    // response is promise with passed token
    setInterval(function(){
        grecaptcha.execute('6LcGLIwlAAAAAJQM5mXmuuQNNDxZz0vu39LR4sgQ', {action:'validate_captcha'})
                  .then(function(token) {
            // add token value to form
            document.getElementById('g-recaptcha-response').value = token;
        });
      }, 50000);

    });





  

</script>



</body>
</html>


<!-- end body -->




<script type="text/javascript">
     $(document).ready(function(){
          $('.car').slick({

          slidesToShow: 2,
         // dots:true,
          infinite: true,
          speed: 300,
         
          arrows: true,
         // centerMode: true,
          //centerPadding: '60px',
           prevArrow: $(".pp2"),
          nextArrow: $(".nn2"),

           responsive: [
            {
              breakpoint: 768,
              settings: {
              slidesToShow: 1,
              centerMode: false, /* set centerMode to false to show complete slide instead of 3 */
              slidesToScroll: 1
              }
            }
           ]


          });
        });
</script>

<script type="text/javascript">
          //clear forms
           $("form :input").attr("autocomplete", "off");           
  </script>

  <script type="text/javascript">
  $(document).ready(function () {
    //if cookie hasn't been set...
    if (document.cookie.indexOf("ModalShown=true")<0) {

         setTimeout(function(){
            $("#leadbanner").modal("show");
          }, 4000);


       // $("#leadbanner").modal("show");
        //Modal has been shown, now set a cookie so it never comes back
        $("#myModalClose").click(function () {
            $("#leadbanner").modal("hide");
        });
        document.cookie = "ModalShown=true; expires=Fri, 31 Dec 9999 23:59:59 GMT; path=/";
    }
});
</script>

<script>
    $(".readonly").keydown(function(e){
        e.preventDefault();
    });
</script>

<script type="text/javascript">
      //console.log(Intl.DateTimeFormat().resolvedOptions().timeZone)
        
          function get_words(){

            var pages=$("#pages").val();
            var words=pages*275;
            $("#words").val(words+" words");


          }


       function get_other() {
              
                
                    
                    // get the value of the select statement
                     var id =  $("#discipline").val();
                     console.log(id);
                    
                      if (id == 69) {
                          $('#other').show(500);
                          $("#thatinput").prop('required',true);
                      } else {    

                          $('#other').hide(500);
                      }


                 
             
           
          }

         
                             
       function get_tols(){


                      var timezone=Intl.DateTimeFormat().resolvedOptions().timeZone;
                      $("#tz").val(timezone);
                      var pages=$("#pages").val();
                      var level=$("#level").val();
                      var deadline=$("#deadline").val();
                      var coupon=$("#coupon").val();
                      var service=$('input[name=service]:checked').val();


                        if(deadline)
                        {
                          deadline=deadline;
                        }
                        else
                        {
                           deadline="2040/7/7 11:11"
                        }
                   
                     

                      
                      

                   
                      
                  
                      $.ajax({
                              url:'<?php echo base_url() ?>home/get_price',
                              type:'POST',
                              data:{ deadline:deadline, level : level,coupon : coupon,pages:pages,service:service,timezone:timezone },
                              beforeSend: function(){
                                 $("#submit-all").attr("disabled", true);
                               },
                               complete: function(){
                                
                                  $("#submit-all").removeAttr("disabled");
                               },
                              success:function(result){

                               // console.log('pages'+pages);
                                //console.log('result'+result);
                                  
                                var tot=parseFloat(result).toFixed(2);

                                // alert(result);

                                 if(tot>0){
                                    
                                 $("#total").val((tot));
                                


                                 }
                                 else
                                 {
                                   $("#total").val(8.5);
                                  
                                 }


                                    
                              }

                      });
                  // });
              }

      </script>

       <script type="text/javascript">
                        
                        Dropzone.options.myDropzone= {
                              url: '<?php echo base_url() ?>client/process_order_first',
                              autoProcessQueue: false,
                              uploadMultiple: true,
                              parallelUploads: 5,
                              maxFiles: 7,
                              maxFilesize: 90000,
                              acceptedFiles: '.jpg,.jpeg,.png,.gif,.pdf,.docx,.xml,.xlsx,.csv,.doc,.xls,.ppt,.pptx,.pub',
                              addRemoveLinks: true,
                              init: function() {
                                  dzClosure = this; // Makes sure that 'this' is understood inside the functions below.

                                  // for Dropzone to process the queue (instead of default form behavior):
                                  document.getElementById("submit-all").addEventListener("click", function(e) {
                                      // Make sure that the form isn't actually being sent.
                                      e.preventDefault();
                                      e.stopPropagation();
                                      // dzClosure.processQueue();

                                     if($("#msform").valid()){
                                          

                                            $(this).prop("disabled", true);
                                            // add spinner to button
                                            $(this).html(
                                              `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Processing...`
                                            );

                                        }
                                        else
                                        {
                                              return false;
                                               
                                        }
                                       if (dzClosure.files.length) {
                                          
                                            dzClosure.processQueue(); // upload files and submit the form
                                        } else {
                                            $('#msform').submit(); // just submit the form
                                        }



                                      
    
                                     // 

                                  });

                                  //send all the form data along with the files:
                                  this.on("sendingmultiple", function(data, xhr, formData) {
                                      formData.append("service", jQuery(".stv-radio-button").val());
                                      formData.append("order_title", jQuery("#order_title").val());
                                      formData.append("order_description", jQuery("#order_description").val());
                                      formData.append("order_discipline_id", jQuery("#discipline").val());
                                      formData.append("other", jQuery("#other").val());
                                      formData.append("order_sources", jQuery("#order_sources").val());
                                      formData.append("order_pages", jQuery("#pages").val());
                                      formData.append("affiliate", jQuery("#affiliate").val());
                                      formData.append("order_format_id", jQuery("#order_format_id").val());
                                      formData.append("order_level_id", jQuery("#level").val());
                                      formData.append("order_deadline_id", jQuery("#deadline").val());
                                      formData.append("coupon", jQuery("#coupon").val());
                                      formData.append("order_amount", jQuery("#total").val());
                                      formData.append("order_tz", jQuery("#tz").val());
                                      formData.append("g-recaptcha-response", jQuery("#g-recaptcha-response").val());
                                      formData.append("user_fname", jQuery("#user_fname").val());
                                      formData.append("user_lname", jQuery("#user_lname").val());
                                      formData.append("user_phone", jQuery("#user_phone").val());
                                      formData.append("user_email", jQuery("#user_email").val());
                                      formData.append("password", jQuery("#confirm_password").val());
                                  });

                               


                                  this.on("success", function(file, responseText) {

                                       if(responseText=='registered'){

                                          window.location.href = '<?php echo base_url('client/registered')?>';

                                       }
                                       else
                                       {

                                        var res = JSON.parse(responseText);

                                       


                                        
                                        var order_id=res.order_id;
                                        var amount=res.amount;
                                        window.location.href = '<?php echo base_url('client/paypal/')?>'+order_id+'/'+amount;


                                      }

                                    });

                              }
                          }
    </script>


    <script type="text/javascript">
                        
                        Dropzone.options.myDropzonespecial= {
                              url: '<?php echo base_url() ?>client/special_first',
                              autoProcessQueue: false,
                              uploadMultiple: true,
                              parallelUploads: 5,
                              maxFiles: 7,
                              maxFilesize: 900000,
                              acceptedFiles: '.jpg,.jpeg,.png,.gif,.pdf,.docx,.xml,.xlsx,.csv,.doc,.xls,.ppt,.pptx,.pub',
                              addRemoveLinks: true,
                              init: function() {
                                  dzClosure = this; // Makes sure that 'this' is understood inside the functions below.

                                  // for Dropzone to process the queue (instead of default form behavior):
                                  document.getElementById("submit-all").addEventListener("click", function(e) {
                                      // Make sure that the form isn't actually being sent.
                                      e.preventDefault();
                                      e.stopPropagation();
                                      // dzClosure.processQueue();

                                         if($("#zoney").valid()){
                                          

                                            $(this).prop("disabled", true);
                                            // add spinner to button
                                            $(this).html(
                                              `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Processing...`
                                            );

                                        }
                                        else
                                        {
                                              return false;
                                               
                                        }

                                       if (dzClosure.files.length) {
                                            dzClosure.processQueue(); // upload files and submit the form
                                        } else {
                                            $('#zoney').submit(); // just submit the form
                                        }



                                      
    
                                     // 

                                  });

                                  //send all the form data along with the files:
                                  this.on("sendingmultiple", function(data, xhr, formData) {
                                      formData.append("order_title", jQuery("#order_title").val());
                                      formData.append("order_description", jQuery("#order_description").val());
                                      formData.append("user_fname", jQuery("#user_fname").val());
                                      formData.append("affiliate", jQuery("#affiliate").val());
                                      formData.append("g-recaptcha-response", jQuery("#g-recaptcha-response").val());

                                      formData.append("user_lname", jQuery("#user_lname").val());
                                      formData.append("user_phone", jQuery("#user_phone").val());
                                      formData.append("user_email", jQuery("#user_email").val());
                                      formData.append("password", jQuery("#confirm_password").val());
                                      formData.append("order_deadline_id", jQuery("#deadline").val());
                                      formData.append("order_tz", jQuery("#tz").val());
                                     
                                  });

                                  this.on("success", function(file, responseText) {
                                      if(responseText=='registered'){

                                          window.location.href = '<?php echo base_url('client/registered')?>';

                                       }
                                       else
                                       {
                                     
                                        window.location.href = '<?php echo base_url('client/get_technical')?>';

                                      }

                                    });
                              }
                          }
    </script>

    <script type="text/javascript">
    //change password script don't get it twisted
           jQuery().ready(function() {

            // validate form on keyup and submit
            
            var v = jQuery("#signupform, #msform, #zoney").validate({
              rules: {
                 new_password: {
                    required: true,
                    
                },
                confirm_password: {
                    required: true,
                   
                    equalTo: "#new_password"
                }
              },
              
              messages: {
                    
                    confirm_password: {
                        equalTo: "Passwords must match",
                    }
                   
                },
              errorElement: "span",
              errorClass: "help-block",
            });

           

           

          });
</script> 

<script type="text/javascript">
       
          //plugin bootstrap minus and plus
  //http://jsfiddle.net/laelitenetwork/puJ6G/
  $('.btn-number').click(function(e){
      e.preventDefault();
      
      fieldName = $(this).attr('data-field');
      type      = $(this).attr('data-type');
      var input = $("input[name='"+fieldName+"']");
      var currentVal = parseInt(input.val());
      if (!isNaN(currentVal)) {
          if(type == 'minus') {
              
              if(currentVal > input.attr('min')) {
                  input.val(currentVal - 1).change();
              } 
              if(parseInt(input.val()) == input.attr('min')) {
                  $(this).attr('disabled', true);
              }

          } else if(type == 'plus') {

              if(currentVal < input.attr('max')) {
                  input.val(currentVal + 1).change();
              }
              if(parseInt(input.val()) == input.attr('max')) {
                  $(this).attr('disabled', true);
              }

          }
      } else {
          input.val(0);
      }
  });
  $('.input-number').focusin(function(){
     $(this).data('oldValue', $(this).val());
  });
  $('.input-number').change(function() {
                                                                                                                                                                                                                            
      minValue =  parseInt($(this).attr('min'));
      maxValue =  parseInt($(this).attr('max'));
      valueCurrent = parseInt($(this).val());
      
      name = $(this).attr('name');
      if(valueCurrent >= minValue) {
          $(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
      } else {
          alert('Sorry, the minimum value was reached');
          $(this).val($(this).data('oldValue'));
      }
      if(valueCurrent <= maxValue) {
          $(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
      } else {
          alert('Sorry, the maximum value was reached');
          $(this).val($(this).data('oldValue'));
      }
      
      
  });
  $(".input-number").keydown(function (e) {
          // Allow: backspace, delete, tab, escape, enter and .
          if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
               // Allow: Ctrl+A
              (e.keyCode == 65 && e.ctrlKey === true) || 
               // Allow: home, end, left, right
              (e.keyCode >= 35 && e.keyCode <= 39)) {
                   // let it happen, don't do anything
                   return;
          }
          // Ensure that it is a number and stop the keypress
          if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
              e.preventDefault();
          }
      });
    </script>

    <script>


                    $('#deadline').datetimepicker({
                    inline:false,
                   // minDate: -0,
                    validateOnBlur : true,
                   
                    minDateTime: true,
                    });

       </script>




</html>
