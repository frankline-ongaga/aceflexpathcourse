          //prevents backdating
         
    
      
       
    
      //validation plugin
           jQuery().ready(function() {

            // validate form on keyup and submit
            
            var v = jQuery("#signupform").validate({
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

          //timepicker initialization

          $('#deadline').datetimepicker({
          inline:false,
         // minDate: -0,
          validateOnBlur : true,
         
          minDateTime: true,
          });


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

       




