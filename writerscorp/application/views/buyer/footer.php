<div class="overlay toggle-icon"></div>
        <!--end overlay-->
        <!--Start Back To Top Button-->
          <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->
        <footer class="page-footer">
            <p class="mb-0">Copyright © <?= Date("Y") ?>. All right reserved.</p>
        </footer>
    </div>
    <!--end wrapper-->
    <!--start switcher-->
    <div class="switcher-wrapper">
        <div class="switcher-btn"> <i class='bx bx-cog bx-spin'></i>
        </div>
        <div class="switcher-body">
            <div class="d-flex align-items-center">
                <h5 class="mb-0 text-uppercase">Theme Customizer</h5>
                <button type="button" class="btn-close ms-auto close-switcher" aria-label="Close"></button>
            </div>
            <hr/>
            <h6 class="mb-0">Theme Styles</h6>
            <hr/>
            <div class="d-flex align-items-center justify-content-between">
                <div class="form-check">
                    <input class="form-check-input" value="1" onclick="get_val()" type="radio" name="flexRadioDefault" id="lightmode" <?php if($mode_name=="light-theme"){  echo "checked"; } ?>>
                    <label class="form-check-label" for="lightmode">Light</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" value="3" onclick="get_val()" type="radio" name="flexRadioDefault" id="darkmode" <?php if($mode_name=="dark-theme"){  echo "checked"; } ?>>
                    <label class="form-check-label" for="darkmode">Dark</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" value="2" onclick="get_val()" type="radio" name="flexRadioDefault" id="semidark"  <?php if($mode_name=="semi-dark"){  echo "checked"; } ?>>
                    <label class="form-check-label" for="semidark">Semi Dark</label>
                </div>
            </div>
            <hr/>
            
            
           
            
        </div>
    </div>
    

     <script src="<?= base_url('adminassets/js/bootstrap.bundle.min.js'); ?>"></script>

    <script src="<?= base_url('adminassets/js/jquery.min.js'); ?>"></script>

   


    <script src="<?= base_url('adminassets/js/dropzone.min.js'); ?>"></script>

    <!--plugins-->
    <script src="<?= base_url('adminassets/plugins/simplebar/js/simplebar.min.js'); ?>"></script>
    <script src="<?= base_url('adminassets/plugins/metismenu/js/metisMenu.min.js'); ?>"></script>
    <script src="<?= base_url('adminassets/plugins/perfect-scrollbar/js/perfect-scrollbar.js'); ?>"></script>
    <script src="<?= base_url('adminassets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js'); ?>"></script>
    <script src="<?= base_url('adminassets/plugins/vectormap/jquery-jvectormap-world-mill-en.js'); ?>"></script>
    <script src="<?= base_url('adminassets/plugins/chartjs/js/Chart.min.js'); ?>"></script>
    <script src="<?= base_url('adminassets/plugins/chartjs/js/Chart.extension.js'); ?>"></script>
    <script src="<?= base_url('adminassets/js/index.js'); ?>"></script>
   
    <!--app JS-->
    <script src="<?= base_url('adminassets/js/app.js'); ?>"></script>
    <script src="<?php echo base_url('adminassets/js/pace.min.js'); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js" integrity="sha512-AIOTidJAcHBH2G/oZv9viEGXRqDNmfdPVPYOYKGy3fti0xIplnlgMHUGfuNRzC6FkzIo0iIxgFnr9RikFxK+sw==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js" integrity="sha512-37T7leoNS06R80c8Ulq7cdCDU5MNQBwlYoy1TX/WUsLFC2eYNqtKlV0QjH7r8JpG/S0GUMZwebnVFLPd6SU5yg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="<?= base_url('adminassets/plugins/datatable/js/jquery.dataTables.min.js'); ?>"></script>
    <script src="<?= base_url('adminassets/plugins/datatable/js/dataTables.bootstrap5.min.js'); ?>"></script>

     

    <script>
      var base_url = '<?php echo base_url();?>';
    </script>

     <script type="text/javascript">
          //clear forms
           $("form :input").attr("autocomplete", "off");           
        </script>

     <script>
        $(document).ready(function() {
            $('#example').DataTable({"order": [[ 0, "desc" ]]});
          } );
    </script>
    <script type="text/javascript">
           function get_val(){


                  
                    var mode=$('input[name=flexRadioDefault]:checked').val();
                   
                    $.ajax({
                            url:'<?php echo base_url() ?>client/change_mode',
                            type:'POST',
                            data:{ mode:mode },
                            success:function(result){

                            


                                  
                            }

                    });
                // });
            }

    </script>
    <script type="text/javascript">
         function myFunction() {
            /* Get the text field */
            var copyText = document.getElementById("myInput");

            /* Select the text field */
            copyText.select();
            copyText.setSelectionRange(0, 99999); /*For mobile devices*/

            /* Copy the text inside the text field */
            document.execCommand("copy");

            /* Alert the copied text */
            alert("Copied the text: " + copyText.value);
          } 
       </script>

     <script type="text/javascript">

            
      
        function get_words(){

          var pages=$("#pages").val();
          var words=pages*275;
          $("#words").val(words+" words");


        }

      
 


      function get_other() {
            
              
                  
                  // get the value of the select statement
                   var id =  $("#discipline").val();
                   //console.log(id);
                  
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
                    var user_id=<?php if(isset($user_id)){  echo $user_id; } ?>;

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
                            data:{ deadline:deadline, level : level,coupon : coupon,pages:pages,service:service,timezone:timezone,user_id:user_id },
                            success:function(result){

                             // console.log('pages'+pages);
                              //console.log('result'+result);
                                
                              var tot=parseFloat(result).toFixed(2);

                              // alert(result);

                               if(tot>0){
                                  
                               $("#total").val((tot));
                              // $("#total").css('border','2px solid #74a125');


                               }
                               else
                               {
                                 $("#total").val(8.5);
                                 //("#total").css('border','2px solid #c8c9c9');
                               }


                                  
                            }

                    });
                // });
            }





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

        <script type="text/javascript">
                        
                        Dropzone.options.myDropzone= {
                              url: '<?php echo base_url() ?>client/process_order_login_new',
                              autoProcessQueue: false,
                              uploadMultiple: true,
                              parallelUploads: 5,
                              maxFiles: 7,
                              maxFilesize: 90000,
                              acceptedFiles: '.jpg,.jpeg,.png,.gif,.pdf,.docx,.xml,.xlsx,.csv,.doc,.xls,.ppt,.pptx,.pub,.zip',
                              addRemoveLinks: true,
                              init: function() {
                                  dzClosure = this; // Makes sure that 'this' is understood inside the functions below.

                                  // for Dropzone to process the queue (instead of default form behavior):
                                  document.getElementById("submit-all").addEventListener("click", function(e) {
                                      // Make sure that the form isn't actually being sent.
                                      e.preventDefault();
                                      e.stopPropagation();
                                      // dzClosure.processQueue();
                                        if($("#zombie").valid()){
                                          

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
                                            //$('#loader').removeClass('hidden')
                                            dzClosure.processQueue(); // upload files and submit the form
                                        } else {
                                            $('#zombie').submit(); // just submit the form
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
                                      formData.append("order_format_id", jQuery("#order_format_id").val());
                                      formData.append("order_level_id", jQuery("#level").val());
                                      formData.append("order_deadline_id", jQuery("#deadline").val());
                                      formData.append("coupon", jQuery("#coupon").val());
                                      formData.append("order_amount", jQuery("#total").val());
                                      formData.append("order_tz", jQuery("#tz").val());
                                  });

                                  this.on("success", function(file, responseText) {
                                        var res = $.parseJSON(responseText);
                                        //redirect with amount & order ID.
                                       // redirect('client/psy');
                                        var order_id=res.order_id;
                                        var amount=res.amount;
                                        window.location.href = '<?php echo base_url('client/paypal/')?>'+order_id+'/'+amount;

                                    });


                              }
                          }
    </script>


      <script type="text/javascript">
                        
                        Dropzone.options.updateDropzone= {
                              url: '<?php echo base_url() ?>client/update_order',
                              autoProcessQueue: false,
                              uploadMultiple: true,
                              parallelUploads: 5,
                              maxFiles: 7,
                              maxFilesize: 90000,
                              acceptedFiles: '.jpg,.jpeg,.png,.gif,.pdf,.docx,.xml,.xlsx,.csv,.doc,.xls,.ppt,.pptx,.pub,.zip',
                              addRemoveLinks: true,
                              init: function() {
                                  dzClosure = this; // Makes sure that 'this' is understood inside the functions below.

                                  // for Dropzone to process the queue (instead of default form behavior):
                                  document.getElementById("edit_order").addEventListener("click", function(e) {
                                      // Make sure that the form isn't actually being sent.
                                      e.preventDefault();
                                      e.stopPropagation();
                                      // dzClosure.processQueue();
                                        if($("#zombie").valid()){
                                          

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
                                            //$('#loader').removeClass('hidden')
                                            dzClosure.processQueue(); // upload files and submit the form
                                        } else {
                                            $('#zombie').submit(); // just submit the form
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
                                      formData.append("order_format_id", jQuery("#order_format_id").val());
                                      formData.append("order_level_id", jQuery("#level").val());
                                      formData.append("order_deadline_id", jQuery("#deadline").val());
                                      formData.append("coupon", jQuery("#coupon").val());
                                      formData.append("order_amount", jQuery("#total").val());
                                      formData.append("order_tz", jQuery("#tz").val());
                                      formData.append("order_id", jQuery("#order_id").val());
                                  });

                                  this.on("success", function(file, responseText) {
                                        var res = $.parseJSON(responseText);
                                        //redirect with amount & order ID.
                                       // redirect('client/psy');
                                        var order_id=res.order_id;
                                      //  var amount=res.amount;
                                        window.location.href = '<?php echo base_url('client/get_paper_details/')?>'+order_id+'/77';

                                    });


                              }
                          }
    </script>



     <script type="text/javascript">
                        
                        Dropzone.options.myDropzonespecial= {
                              url: '<?php echo base_url() ?>client/special',
                              autoProcessQueue: false,
                              uploadMultiple: true,
                              parallelUploads: 5,
                              maxFiles: 7,
                              maxFilesize: 90000,
                              acceptedFiles: '.jpg,.jpeg,.png,.gif,.pdf,.docx,.xml,.xlsx,.csv,.doc,.xls,.ppt,.pptx,.pub,.zip',
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
                                      formData.append("order_deadline_id", jQuery("#deadline").val());
                                      formData.append("order_tz", jQuery("#tz").val());

                                     
                                  });


    // Show image container
   
  

                                  this.on("success", function(file, responseText) {
                                     
                                        window.location.href = '<?php echo base_url('client/get_technical')?>';

                                    });
                              }
                          }
    </script>

     <script type="text/javascript">
                        
                        Dropzone.options.myDropzonerevision= {
                              url: '<?php echo base_url() ?>client/request_revision_process_new',
                              autoProcessQueue: false,
                              uploadMultiple: true,
                              parallelUploads: 5,
                              maxFiles: 7,
                              maxFilesize: 90000,
                              acceptedFiles: '.jpg,.jpeg,.png,.gif,.pdf,.docx,.xml,.xlsx,.csv,.doc,.xls,.ppt,.pptx,.pub,.zip',
                              addRemoveLinks: true,
                              init: function() {
                                  dzClosure = this; // Makes sure that 'this' is understood inside the functions below.

                                  // for Dropzone to process the queue (instead of default form behavior):
                                  document.getElementById("submit-all").addEventListener("click", function(e) {
                                      // Make sure that the form isn't actually being sent.
                                      e.preventDefault();
                                      e.stopPropagation();
                                      // dzClosure.processQueue();

                                        $("#revision").valid();

                                       if (dzClosure.files.length) {
                                            dzClosure.processQueue(); // upload files and submit the form
                                        } else {

                                            $('#revision').submit(); // just submit the form
                                        }



                                      
    
                                     // 

                                  });





                                  //send all the form data along with the files:
                                  this.on("sendingmultiple", function(data, xhr, formData) {

                                      formData.append("order_revision_details", jQuery("#order_revision_details").val());
                                      formData.append("order_id", jQuery("#order_id").val());
                                    
                                     
                                  });


                                  this.on("success", function(file, responseText) {

                                     
                                        window.location.href = '<?php echo base_url('client/get_notification/')?>';
                                     

                                    });
                              }
                          }
    </script>



    <script type="text/javascript">

      
        //validate form

         jQuery().ready(function() {

            // validate form on keyup and submit
            
            var v = jQuery("#msform").validate({
              rules: {
                 order_title: {
                    required: true,
                    
                },
                order_format_id: {
                    required: true,
                },
                deadline:{
                   required: true, 
                },
              
              },
              
              messages: {
                    
                    order_title: {
                        required: "Order title is required",
                    },
                    order_format_id: {
                        required: "Specify your paper format",
                    },
                     deadline: {
                        required: "Specify your deadline",
                    },
                   
                },
              errorElement: "span",
              errorClass: "help-block",
            });

           

           

          });



    </script>

</body>





</html>