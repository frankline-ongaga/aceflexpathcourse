 <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                2020 &copy;  <a href="#">EssayLoop</a>
                            </div>
                            <div class="col-md-6">
                                <div class="text-md-right footer-links d-none d-sm-block">
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

        </div>
        <!-- END wrapper -->

                <!-- Right Sidebar -->
                <div class="right-bar">
                    <div class="rightbar-title">
                        <a href="javascript:void(0);" class="right-bar-toggle float-right">
                            <i class="mdi mdi-close"></i>
                        </a>
                        <h5 class="m-0 text-white">Theme Customizer</h5>
                    </div>
                    <div class="slimscroll-menu">
        
                        <div class="p-3">
                            <div class="alert alert-warning" role="alert">
                                <strong>Customize </strong> the overall color scheme, layout, etc.
                            </div>
                            <div class="mb-2">
                                <img src="assets/images/layouts/light.png" class="img-fluid img-thumbnail" alt="">
                            </div>
                            <div class="custom-control custom-switch mb-3">
                                <input type="checkbox" class="custom-control-input theme-choice" id="light-mode-switch" checked />
                                <label class="custom-control-label" for="light-mode-switch">Light Mode</label>
                            </div>
            
                            <div class="mb-2">
                                <img src="assets/images/layouts/dark.png" class="img-fluid img-thumbnail" alt="">
                            </div>
                            <div class="custom-control custom-switch mb-3">
                                <input type="checkbox" class="custom-control-input theme-choice" id="dark-mode-switch" data-bsStyle="assets/css/bootstrap-dark.min.css" 
                                    data-appStyle="assets/css/app-dark.min.css" />
                                <label class="custom-control-label" for="dark-mode-switch">Dark Mode</label>
                            </div>
            
                            <div class="mb-2">
                                <img src="assets/images/layouts/rtl.png" class="img-fluid img-thumbnail" alt="">
                            </div>
                            <div class="custom-control custom-switch mb-3">
                                <input type="checkbox" class="custom-control-input theme-choice" id="rtl-mode-switch" data-appStyle="assets/css/app-rtl.min.css" />
                                <label class="custom-control-label" for="rtl-mode-switch">RTL Mode</label>
                            </div>

                            <div class="mb-2">
                                <img src="assets/images/layouts/dark-rtl.png" class="img-fluid img-thumbnail" alt="">
                            </div>
                            <div class="custom-control custom-switch mb-5">
                                <input type="checkbox" class="custom-control-input theme-choice" id="dark-rtl-mode-switch" data-bsStyle="assets/css/bootstrap-dark.min.css" 
                                    data-appStyle="assets/css/app-dark-rtl.min.css" />
                                <label class="custom-control-label" for="dark-rtl-mode-switch">Dark RTL Mode</label>
                            </div>

                            <a href="https://wrapbootstrap.com/theme/codefox-admin-dashboard-template-WB0X27670?ref=coderthemes" class="btn btn-danger btn-block mt-3" target="_blank"><i class="mdi mdi-download mr-1"></i> Download Now</a>
                        </div>
                    </div> <!-- end slimscroll-menu-->
                </div>
                <!-- /Right-bar -->

                <!-- Right bar overlay-->
                <div class="rightbar-overlay"></div>

              

        <!-- Vendor js -->
        <script src="<?php echo base_url('corpadmin/js/vendor.min.js') ?>"></script>

        <!-- Bootstrap select plugin -->
        <script src="<?php echo base_url('corpadmin/libs/bootstrap-select/bootstrap-select.min.js') ?>"></script>

        <!-- plugins -->
        <script src="<?php echo base_url('corpadmin/libs/c3/c3.min.js') ?>"></script>
        <script src="<?php echo base_url('corpadmin/libs/d3/d3.min.js') ?>"></script>

        <!-- dashboard init -->
        <script src="<?php echo base_url('corpadmin/js/pages/dashboard.init.js') ?>"></script>

        <script src="<?php echo base_url('bower_components/select2/dist/js/select2.full.min.js'); ?>"></script>


        <!-- App js -->
        <script src="<?php echo base_url('corpadmin/js/app.min.js') ?>"></script>
        
    </body>

</html>

<script type="text/javascript">
    
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

</script>