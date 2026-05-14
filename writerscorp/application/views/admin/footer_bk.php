 <!-- <style>
.buttons-print {
  background-color: red;
  color: white;
}
.buttons-excel {
  background-color: blue;
  color: white;
}
</style> -->
<!-- Main Footer -->
<footer class="main-footer">
            <!-- To the right -->
            <div class="pull-right hidden-xs">
              
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2020 <a href="#">Avid Essay Writers </a>.</strong> All rights reserved.
        </footer>

      
    </div>
    <!-- ./wrapper -->



    <!-- REQUIRED JS SCRIPTS -->

    <!-- jQuery 3 -->
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript" src="<?php echo base_url('bower_components/jquery/dist/jquery.validate.js') ?> "></script>  
    <!-- Bootstrap 3.3.7 -->
    <script src="<?php echo base_url('bower_components/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
  
    <script src="<?php echo base_url('bower_components/select2/dist/js/select2.full.min.js'); ?>"></script>
<script src="<?php echo base_url('plugins1/input-mask/jquery.inputmask.js') ?>"></script>
<script src="<?php echo base_url('plugins1/input-mask/jquery.inputmask.date.extensions.js') ?>"></script>
<script src="<?php echo base_url('plugins1/input-mask/jquery.inputmask.extensions.js') ?>"></script>
    <!-- AdminLTE App -->

    <!-- date-range-picker -->
<script src="<?php echo base_url('bower_components/moment/min/moment.min.js') ?>"></script>
<script src="<?php echo base_url('bower_components/bootstrap-daterangepicker/daterangepicker.js') ?>"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo base_url('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') ?>"></script>
<!-- bootstrap color picker -->
<script src="<?php echo base_url('bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') ?>"></script>
<!-- bootstrap time picker -->
<script src="<?php echo base_url('plugins/timepicker/bootstrap-timepicker.min.js') ?>"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url('bower_components/jquery-slimscroll/jquery.slimscroll.min.js') ?>"></script>
<!-- iCheck 1.0.1 -->
<script src="<?php echo base_url('plugins/iCheck/icheck.min.js') ?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url('bower_components/fastclick/lib/fastclick.js') ?>"></script>

<!-- <script src="<?php echo base_url('dist/js/buttons.flash.min.js'); ?>"></script> -->
<script src="<?php echo base_url('dist/js/jszip.min.js'); ?>"></script>
<script src="<?php echo base_url('dist/js/vfs_fonts.js'); ?>"></script>
<!-- <script src="<?php echo base_url('dist/js/buttons.html5.min.js'); ?>"></script> -->


<script src="<?php echo base_url('dist/js/dataTables.buttons.min.js'); ?>"></script>
<script src="<?php echo base_url('dist/js/buttons.print.min.js'); ?>"></script>

    <script src="<?php echo base_url('dist/js/adminlte.min.js') ?>"></script>

    
       <script type="text/javascript">

       function popup() {
        $('#myModal').modal('show');
        }

        function addLocation() {
        $('#addLocation').modal('show');
        }

         function addProduct() {
        $('#addProduct').modal('show');
        }
        function modifySettings() {
        $('#modifySettings').modal('show');
        }
        $(document).ready(function()
        {
               $('#js-contacts').select2({
                placeholder: 'Select an Phone Number',
                 allowClear: true,
                 tags: true
                });
                 $('#js-grouplist').select2({
                placeholder: 'Select an Group List',
                 allowClear: true,
                 tags: true
                });
                $('#js-contacts2').select2({
                placeholder: 'Select Phone number',
                 allowClear: true,
                 tags: true
                });
                $('#reportrange').daterangepicker(
                    {
                        ranges   : {
                        'Today'       : [moment(), moment()],
                        'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month'  : [moment().startOf('month'), moment().endOf('month')],
                        'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                        },
                        startDate: moment().subtract(29, 'days'),
                        endDate  : moment()
                    },
                    function(start, end) {
                        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                             $('#date_start').val(start.format('YYYY-MM-DD'));
                             $('#date_end').val(end.format('YYYY-MM-DD'));
                       }
          
                    )

                    
        });
        $('#reportrange span').html(moment().format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));

    </script>

<script>
               

    $('#from').datepicker({
      autoclose: true
    })
    //Date picker
    $('#to').datepicker({
      autoclose: true
    })

     $('#backdate').datepicker({
      autoclose: true
    })


    </script>

    <script>
    function printInfo(ele) {
         var prtContent = document.getElementById("print_div");
                var htmlToPrint = '' +
                    '<style type="text/css">' +
                    'table th, table td {' +
                    'border:1px #000;' +
                    '}' +
                    '</style>';
                htmlToPrint += prtContent.innerHTML;
                var WinPrint = window.open('', '', 'left=0,top=0,toolbar=0,scrollbars=0,status=0');
                WinPrint.document.write(htmlToPrint);
                WinPrint.document.close();
                WinPrint.focus();
                WinPrint.print();
                WinPrint.close();
            }
            </script>

    <script type="text/javascript">
    $(document).ready(function() {
      function getDate() {
        var currentDate = new Date();
        var date = currentDate.getDate();
        var month = currentDate.getMonth(); //Be careful! January is 0 not 1
        var year = currentDate.getFullYear();
        return dateString = date + "-" +(month + 1) + "-" + year;
      }
    //   var total = document.getElementById("total_received").outerHTML;
    // $('#export-fee').append('<tr colspan="5" > <td>'+total+' </td> <tr>');
    $('#export-fee').append('<caption style="caption-side: bottom">Report created on '+getDate()+'</caption>');
    $('#export-rejected').append('<caption style="caption-side: bottom">Report created on '+getDate()+'</caption>');
    $('#export-cancelled').append('<caption style="caption-side: bottom">Report created on '+getDate()+'</caption>');
    $('#staff-status').append('<caption style="caption-side: bottom">Report created on '+getDate()+'</caption>');
    $('#due').append('<caption style="caption-side: bottom">Report created on '+getDate()+'</caption>');

      $('#no-pagination').DataTable({
        "paging":   false,
        "info":     false,
      });
      $('#no-pagination-ordering').DataTable({
        "paging":   false,
        "info":     false,
        "ordering": false,
      });
      $('#no-ordering').DataTable({
        "ordering": false,
      });
      $('#export-fee').DataTable( {
          "paging":   true,
          "info":     false,
          "ordering": false,
          "searching": false,
          dom: 'Bfrtip',
        //   buttons: [
        //     'copy', 'csv', 'excel', 'pdf', 'print'
        // ]
          buttons: [
           {
                extend: 'excel',
                filename: 'Registration Fees Report',
                title: ''
            },{
                extend: 'print',
                filename: 'Registration Fees Report',
                title: ''
            }
          ]
      } );
      $('#export-rejected').DataTable( {
          "paging":   true,
          "ordering": false,
          "info":     false,
          dom: 'Bfrtip',
          buttons: [
           {
                extend: 'excel',
                filename: 'Loans Rejected Report',
                title: ''
            },
            {
                extend: 'print',
                filename: 'Loans Rejected Report',
                title: ''
            }
          ]
      });
      $('#export-cancelled').DataTable( {
          "paging":   true,
          "ordering": false,
          "info":     false,
          dom: 'Bfrtip',
          buttons: [
           {
                extend: 'excel',
                filename: 'Loans Cancelled Report',
                title: ''
            },
            {
                extend: 'print',
                filename: 'Loans Cancelled Report',
                title: ''
            }
          ]
      });
      $('#due').DataTable( {
          "paging":   true,
          "ordering": false,
          "info":     false,
          dom: 'Bfrtip',
          buttons: [
           {
                extend: 'excel',
                filename: 'Loans Due Today Report',
                title: ''
            },
            {
                extend: 'print',
                filename: 'Loans  Due Today Report',
                title: ''
            }
          ]
      });
      $('#mpesa_received').DataTable( {
          "paging":   true,
          "ordering": false,
          "info":     false,
          dom: 'Bfrtip',
          buttons: [
           {
                extend: 'excel',
                filename: 'Mpesa Received Report',
                title: ''
            },
            {
                extend: 'print',
                filename: 'Mpesa Received Report',
                title: ''
            }
          ]
      });
      $('#mpesa_repayments').DataTable( {
          "paging":   true,
          "ordering": false,
          "info":     false,
          dom: 'Bfrtip',
        //   buttons: [
        //         'print', 'excel', 'pdf'
        //     ]
     
          buttons: [
           {
                extend: 'excel',
                filename: 'Mpesa RePayments Report',
                title: 'Mpesa RePayments Report'
            },
            {
                extend: 'pdf',
                filename: 'Mpesa RePayments Report',
                title: 'Mpesa RePayments Report'
            },
            {
                extend: 'print',
                filename: 'Mpesa Repayments Report',
                title: 'Mpesa RePayments Report'
                // customize: function ( win ) {
                //     $(win.document.body)
                //         .css( 'font-size', '10pt' )
                //         .prepend(
                //             '<img src="http://datatables.net/media/images/logo-fade.png" style="position:absolute; top:0; left:0;" />'
                //         );
 
                //     $(win.document.body).find( 'table' )
                //         .addClass( 'compact' )
                //         .css( 'font-size', 'inherit' );
                // }
            }
          ]
      });

    //   var table = $('#mpesa_repayments').DataTable();
 
    //     new $.fn.dataTable.Buttons( table, {
    //         dom: 'Bfrtip',
    //         buttons: [
    //             'copy', 'excel', 'pdf'
    //         ]
    //     } );
        
        // table.buttons().container()
        //     .appendTo( $('.exprt:eq(0)', table.table().container() ) );


    //   table_mpesa_repayments.buttons().container()
    //     .appendTo( $('.exprt', table.table().container() ) );

      $('#all_gurantors').DataTable( {
          "paging":   true,
          "ordering": false,
          "info":     false,
          dom: 'Bfrtip',
            "responsive" : true,
            "select": true,
           
        buttons: [
               'excel', 'print', 'csv'
         ]
       
      });

       $('#all_customers').DataTable( {
          "paging":   true,
          "ordering": false,
          "info":     false,
        //   dom: 'Bfrtip',
            "responsive" : true,
            "select": true,
           
        buttons: [
               'excel', 'print', 'csv'
         ]
       
      });

      $('#staff-status').DataTable( {
          "paging":   true,
          "ordering": false,
          "info":     true,
          dom: 'Bfrtip',
        // dom: '<"right-sidebar"B><"top"if>rt<"bottom"lp><"clear">',
            "responsive" : true,
            "select": true,
           
        buttons: [
               'excel', 'print', 'csv'
         ]
       
      });
      $('#admin_arrears').DataTable( {
          "paging":   true,
          "ordering": false,
          "info":     false,
        //   dom: 'Bfrtip',
        dom: '<"right-sidebar"B><"top"if>rt<"bottom"lp><"clear">',
            "responsive" : true,
            "select": true,
           
        buttons: [
               'excel', 'print', 'csv'
         ]
       
      });
      $('#all_disbursed').DataTable( {
          "paging":   true,
          "ordering": false,
          "info":     false,
        //   dom: 'Bfrtip',
        dom: '<"right-sidebar"B><"top"if>rt<"bottom"lp><"clear">',
            "responsive" : true,
            "select": true,
           
        buttons: [
               'excel', 'print', 'csv'
         ]
       
      });
      $('#admin_transfer').DataTable( {
          "paging":   true,
          "ordering": false,
          "info":     false,
        //   dom: 'Bfrtip',
        dom: '<"right-sidebar"B><"top"if>rt<"bottom"lp><"clear">',
            "responsive" : true,
            "select": true,
           
        buttons: [
               'excel', 'print', 'csv'
         ]
       
      });


 $('#admin_balance').DataTable( {
          "paging":   true,
          "ordering": false,
          "info":     false,
        //   dom: 'Bfrtip',
        dom: '<"right-sidebar"B><"top"if>rt<"bottom"lp><"clear">',
            "responsive" : true,
            "select": true,
           
        buttons: [
               'excel', 'print', 'csv'
         ]
       
      });
      $('#admin_awaiting').DataTable( {
          "paging":   true,
          "ordering": false,
          "info":     false,
        //   dom: 'Bfrtip',
        dom: '<"right-sidebar"B><"top"if>rt<"bottom"lp><"clear">',
            "responsive" : true,
            "select": true,
           
        buttons: [
               'excel', 'print', 'csv'
         ]
       
      });


        
    });
	
	function PleaseWaitDialog() {
		var dialog = bootbox.dialog({ message: '<p class="text-center">Please wait as we submit your data...</p>', closeButton: false });
		dialog.on("shown.bs.modal", function() {
			dialog.attr("id", "PleaseWaitDialog");
		});
	}
</script>
    
    <script type="text/javascript">
    //change password script don't get it twisted
   jQuery().ready(function() {

    // validate form on keyup and submit
    
    var v = jQuery("#passwordform").validate({
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
                equalTo: "New and confirm passwords must match",
            }
           
        },
      errorElement: "span",
      errorClass: "help-block",
    });

   

   

  });
</script>

<script>
function checkPassword() {

jQuery.ajax({
url: "<?php echo base_url()?>index.php/Bs/checkoldpassword",
data:'password='+$("#current_password").val(),
type: "POST",
success:function(data){
if(data=='OK')
{
data='';
$("#namo").html(data);
document.getElementById("mySubmit").disabled = false;
}

else
{
data='Sorry wrong current password';
$("#namo").html(data);
document.getElementById("mySubmit").disabled = true;

}

},
error:function (){}
});
}
    
</script>

<script type="text/javascript">
$(document).ready( function () {
    $('#allcustomers').DataTable();
   
} );


$(document).ready( function () {
  
    $('#truestatus').DataTable();
} );
$(document).ready( function () {
  
    $('#bal').DataTable();
} );
$(document).ready( function () {
  
    $('#activeloans').DataTable();
} );
<!--$(document).ready( function () {-->
  
<!--    $('#mpesareceived').DataTable();-->
<!--} );-->

$(document).ready( function () {
  
    $('#fees').DataTable();
} );

$(document).ready( function () {
  
    $('#guarantors').DataTable();
} );


$(document).ready( function () {
  
    $('#myarrears').DataTable();
} );
$(document).ready( function () {
  
    $('#transfer').DataTable();
} );
$(document).ready( function () {
  
    $('#cancelled').DataTable();
} );
// $(document).ready( function () {
  
//     $('#due').DataTable();
// } );
$(document).ready( function () {
  
    $('#rep').DataTable();
} );
</script>


<style>
    .help-block
    {
        color:red;
        font-size:13px;
    }
</style>
<script type="text/javascript">
   jQuery().ready(function() {

    // validate form on keyup and submit
    var v;
    jQuery.validator.addMethod("lettersonly", function(value, element) {
  return this.optional(element) || /^[a-z]+$/i.test(value);
}, "Kindly enter letters only"); 
    var v = jQuery("#basicform").validate({
      rules: {
        customer_fname: {
          required: true,
          lettersonly: true,
         
        },
        customer_mname: {
          required: true,
           lettersonly: true,
         
        },
       
        customer_lname: {
          required: true,
           lettersonly: true,
         
        },
         guarantor_fname: {
          required: true,
          lettersonly: true,
         
        },
         guarantor_mname: {
          required: true,
          lettersonly: true,
         
        },
         guarantor_lname: {
          required: true,
          lettersonly: true,
         
        },
        customer_id_number: {
          
          number: true,
          required: true,
          
        },
        guarantor_id_number: {
          
          number: true,
          required: true,
          
        },
        guarantor_phone: {
          
          number: true,
          required: true,
          
        },
         customer_phone: {
          
          number: true,
          required: true,
          
        }
 
      },
      
      messages: {
            
            customer_id_number: {
                number: "Kindly enter number",
            },
            customer_phone: {
                number: "Kindly enter number",
            },
            guarantor_id_number: {
                number: "Kindly enter number",
            },
            guarantor_phone: {
                number: "Kindly enter number",
            }
        },
      errorElement: "span",
      errorClass: "help-inline",
    });

    $(".open1").click(function() {
      if (v.form()) {
        $(".frm").hide("fast");
        $("#sf2").show("slow");
      }
    });

    $(".open2").click(function() {
      if (v.form()) {
        $(".frm").hide("fast");
        $("#sf3").show("slow");
      }
    });
        
    
    $(".back2").click(function() {
      $(".frm").hide("fast");
      $("#sf1").show("slow");
    });

   

  });
</script>

    <!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>

</html>
