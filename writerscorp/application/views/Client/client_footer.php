<footer id="footer" style="margin-top: 30px;">

        <!-- .footer start -->
        <!-- ================ -->
       
        <!-- .footer end -->

        <!-- .subfooter start -->
        <!-- ================ -->
        <div class="subfooter">
         <div class="kevvy">
          <div class="container">
            <div class="row">
              <div class="col-md-6">
                <p>Copyright © 2018 Writers Corp. All Rights Reserved</p>
              </div>
              <div class="col-md-6">
                <nav class="navbar navbar-default" role="navigation">
                  <!-- Toggle get grouped for better mobile display -->
                  <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-2">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                    </button>
                  </div>   
                  <div class="collapse navbar-collapse" id="navbar-collapse-2">
                   
                  </div>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
        <!-- .subfooter end -->

      </footer>
      <!-- footer end -->

    </div>
    <!-- page-wrapper end -->

    <!-- JavaScript files placed at the end of the document so the pages load faster
    ================================================== -->
    <!-- Jquery and Bootstap core js files -->
    
    <script type="text/javascript" src="<?php echo base_url('bootstrap/js/bootstrap.min.js') ?>"></script>

    <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap-formhelpers.min.js') ?>"></script>

    <!-- Modernizr javascript -->
    <script type="text/javascript" src="<?php echo base_url('plugins/modernizr.js') ?>"></script>

    <!-- jQuery REVOLUTION Slider  -->
    <script type="text/javascript" src="<?php echo base_url('plugins/rs-plugin/js/jquery.themepunch.tools.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('plugins/rs-plugin/js/jquery.themepunch.revolution.min.js') ?>"></script>

    
    <!-- Isotope javascript -->
    <script type="text/javascript" src="<?php echo base_url('plugins/isotope/isotope.pkgd.min.js') ?>"></script>

    <!-- Owl carousel javascript -->
    <script type="text/javascript" src="<?php echo base_url('plugins/owl-carousel/owl.carousel.js') ?>"></script>

    <!-- Magnific Popup javascript -->
    <script type="text/javascript" src="<?php echo base_url('plugins/magnific-popup/jquery.magnific-popup.min.js') ?>"></script>

    <!-- Appear javascript -->
    <script type="text/javascript" src="<?php echo base_url('plugins/jquery.appear.js') ?>"></script>

    <!-- Count To javascript -->
    <script type="text/javascript" src="<?php echo base_url('plugins/jquery.countTo.js') ?>"></script>

    <!-- Parallax javascript -->
    <script src="<?php echo base_url('plugins/jquery.parallax-1.1.3.js') ?>"></script>

    <!-- Contact form -->
   <!--  <script src="<?php //echo base_url('plugins/jquery.validate.js') ?>"></script> -->

    <!-- SmoothScroll javascript -->
    <script type="text/javascript" src="<?php echo base_url('plugins/jquery.browser.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('plugins/SmoothScroll.js') ?>"></script>

    <!-- Initialization of Plugins -->
    <script type="text/javascript" src="<?php echo base_url('js/template.js') ?>"></script>

    <!-- Custom Scripts -->
    <script type="text/javascript" src="<?php echo base_url('js/custom.js') ?>"></script>
    <!-- Color Switcher (Remove these lines) -->
   
   
    <!-- Color Switcher End -->
    <script type="text/javascript">
    $(document).ready(function() {
    $(".pure-menu-list a").click(function(event) {
        event.preventDefault();
        $(this).parent().addClass("current");
        $(this).parent().siblings().removeClass("current");
        var tab = $(this).attr("href");
        $(".tab-content").not(tab).css("display", "none");
         
        $(tab).fadeIn();
    });
});
 </script>
 <script>
 
 $(document).ready(function() {
    $(".tabby-menu a").click(function(event) {
        event.preventDefault();
        $(this).parent().addClass("current");
        $(this).parent().siblings().removeClass("current");
        var tab = $(this).attr("href");
        $(".tabby-content").not(tab).css("display", "none");
        $(tab).fadeIn();
    });
});
 </script>
    <script>
/*
This source is shared under the terms of LGPL 3
www.gnu.org/licenses/lgpl.html

You are free to use the code in Commercial or non-commercial projects
*/

 //Set up an associative array
 //The keys represent the size of the cake
 //The values represent the cost of the cake i.e A 10" cake cost's $35
           var cake_prices = new Array();
             <?php 
            
           foreach ($hi->result() as $row) 
           {
              
            ?>       
           cake_prices["<?php echo $row->level_deadline;  ?>"]=<?php echo $row->level_highschool;  ?>;
           <?php } ?>
           
           
           var under_grad = new Array();
           <?php 
            
           foreach ($undergrad_lo->result() as $row) 
           {
              
            ?>       
           under_grad["<?php echo $row->level_deadline;  ?>"]=<?php echo $row->level_undergradlower;  ?>;
           <?php } ?>
           
           var upper_grad = new Array();
           <?php 
            
           foreach ($undergrad_hi->result() as $row) 
           {
              
            ?>      
           upper_grad["<?php echo $row->level_deadline;  ?>"]=<?php echo $row->level_undergradupper;  ?>;
           <?php } ?>
           
           
           var masters_grad = new Array();
           <?php 
            
           foreach ($mast->result() as $row) 
           {
              
            ?>      
           masters_grad["<?php echo $row->level_deadline;  ?>"]=<?php echo $row->level_masters;  ?>;
           <?php } ?>
           
           
           var doctoral_grad = new Array();
           <?php 
            
           foreach ($doct->result() as $row) 
           {
              
            ?>      
          doctoral_grad["<?php echo $row->level_deadline;  ?>"]=<?php echo $row->level_doctoral;  ?>;
           <?php } ?>
           
           //Set up an associative array 
           //The keys represent the filling type
           //The value represents the cost of the filling i.e. Lemon filling is $5,Dobash filling is $9
           //We use this this array when the user selects a filling from the form
           
           
             
             
          // getCakeSizePrice() finds the price based on the size of the cake.
          // Here, we need to take user's the selection from radio button selection
          function getCakeSizePrice()
          {  
              var rates = document.getElementsByName('price');
          var rate_value;
          for(var i = 0; i < rates.length; i++){
              if(rates[i].checked){
                  rate_value = cake_prices[rates[i].value];
              }
          }
            return rate_value;
          }

          function getundergradPrice()
          {  
              var rates = document.getElementsByName('see');
          var rate_value;
          for(var i = 0; i < rates.length; i++){
              if(rates[i].checked){
                  rate_value = under_grad[rates[i].value];
              }
          }
            return rate_value;
          }

          function getundergradUpper()
          {  
               var rates = document.getElementsByName('upper');
          var rate_value;
          for(var i = 0; i < rates.length; i++){
              if(rates[i].checked){
                  rate_value = upper_grad[rates[i].value];
              }
          }
            return rate_value;
          }

          function getMasters()
          {  
             var rates = document.getElementsByName('masters');
          var rate_value;
          for(var i = 0; i < rates.length; i++){
              if(rates[i].checked){
                  rate_value = masters_grad[rates[i].value];
              }
          }
            return rate_value;
          }
          function getDoctoral()
          {  
             var rates = document.getElementsByName('doctoral');
          var rate_value;
          for(var i = 0; i < rates.length; i++){
              if(rates[i].checked){
                  rate_value = doctoral_grad[rates[i].value];
              }
          }
            return rate_value;
          }
          //This function finds the filling price based on the 
          //drop down selection


          //candlesPrice() finds the candles price based on a check box selection


          function pages()
          {
              //This local variable will be used to decide whether or not to charge for the inscription
              //If the user checked the box this value will be 20
              //otherwise it will remain at 0
              
              //Get a refernce to the form id="cakeform"
               var x = document.getElementById("pages").value;
              //If they checked the box set inscriptionPrice to 20
              
              //finally we return the inscriptionPrice
              return x;
          }

          function calculateWords()
          {
              //Here we get the total price by calling our function
              //Each function returns a number so by calling them we add the values they return together
              var cakePrice = 275 * pages();
              
              //display the result
              var divobj = document.getElementById('words');
              divobj.style.display='inline';
               divobj.style.left='40px';
              divobj.innerHTML = cakePrice+' '+"words";

          }
               

          function calculateUnder()
          {
              //Here we get the total price by calling our function
              //Each function returns a number so by calling them we add the values they return together
              var cakePrice = getundergradPrice() * pages();
              
              //display the result
              var divobj = document.getElementById('totalundergrad');
              divobj.style.display='block';
              divobj.innerHTML = "<span class='kivutha'>Total Price:</span> <span id='dollar'>"+"$"+"<input type='hidden' name='amountunder' value='"+cakePrice+ "'  >"+cakePrice+"</span>";

          }
          function calculateUpper()
          {
              //Here we get the total price by calling our function
              //Each function returns a number so by calling them we add the values they return together
              var cakePrice = getundergradUpper() * pages();
              
              //display the result
              var divobj = document.getElementById('upper');
              divobj.style.display='block';
              divobj.innerHTML = "<span class='kivutha'>Total Price:</span> <span id='dollar'>"+"$"+"<input type='hidden' name='amountupper' value='"+cakePrice+ "'  >"+cakePrice+"</span>";
          }
          function calculateMasters()
          {
              //Here we get the total price by calling our function
              //Each function returns a number so by calling them we add the values they return together
              var cakePrice = getMasters() * pages();
              
              //display the result
              var divobj = document.getElementById('mastersid');
              divobj.style.display='block';
             divobj.innerHTML = "<span class='kivutha'>Total Price:</span> <span id='dollar'>"+"$"+"<input type='hidden' name='amountmasters' value='"+cakePrice+ "'  >"+cakePrice+"</span>";

          }

          function calculateDoctoral()
          {
              //Here we get the total price by calling our function
              //Each function returns a number so by calling them we add the values they return together
              var cakePrice = getDoctoral() * pages();
              
              //display the result
              var divobj = document.getElementById('doctoralid');
              divobj.style.display='block';
              
              divobj.innerHTML = "<span class='kivutha'>Total Price:</span> <span id='dollar'>"+"$"+"<input type='hidden' name='amountdoctoral' value='"+cakePrice+ "'  >"+cakePrice+"</span>";

          }

          function calculateTotal()
          {
              //Here we get the total price by calling our function
              //Each function returns a number so by calling them we add the values they return together
              var cakePrice = getCakeSizePrice() * pages();
              
              //display the result
              var divobj = document.getElementById('totalPrice');
              divobj.style.display='block';
               divobj.style.display='visible';
              divobj.innerHTML = "<span class='kivutha'>Total Price:</span> <span id='dollar'>"+"$"+"<input type='hidden' name='amounthigh' value='"+cakePrice+ "'  >"+cakePrice+"</span>";
               
               

          }


        </script>

        <script>
$(document).ready(function(){
    $(".select").change(function(){
         var _curr_tab = $(".select option:selected").html().toLowerCase();
         $(".tab_class").removeClass("active"); // Will remove .active from all "a"
         $("#"+_curr_tab).addClass("active"); // Will add .active to a having id _curr_tab
        showProduct(_curr_tab , document.getElementById(_curr_tab));

     });


    $(".tab_class").click(function(){
      var id=$(this).attr("id");
        showProduct(id, document.getElementById(id));
    });

});

function showProduct(a,b)
{
$(".tab_class").removeClass("active");
$("#"+a).addClass("active");
}
</script>






        
  

  </body>


</html>
