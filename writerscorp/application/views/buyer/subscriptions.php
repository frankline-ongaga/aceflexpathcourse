<?php include 'header.php'; ?>       
        <div class="page light">
            <div class="content-wrapper animatedParent animateOnce">
                <div class="container">
                  <div class="row">
                  <div class="col-md-3">
                    <section class="">
                        <?php include 'buyer_menu.php' ?>
                      </section>
                  </div>
                  <div class="col-md-9">

                 
                    <section class="me">
                    <div class="row">
                       <div class="col-md-12">
                     

                          
           
                          
             <div class="container">
                 <h2 class="text-center" style="padding-bottom: 2px; padding-top: 3px;">Select your Plan</h2>
                    <div class="row">
                       
                        <div class="col-md-12">
                               <div class="content-wrapper">
       
                        <section class="pricing" style="padding: 5px 2px;">
                            <h6 class="text-center" style="color: #1874CD;"><a href="#" id="sup">View Subscriptions</a></h6>
                <div class="container"  id="subs" style="display: none;">
                <h4 class="fadeInUpShort animated text-center">Monthly Subscription Service Tiers</h4>
                <br> <br>
                <div class="row">
                    <div class="col-md-6">
                        <div class="pricebox">
                            <h4 class="title">Basic</h4>
                            <span class="price">249</span>
                            <span class="dollar">$</span>
                            <span class="slash">/</span>
                            <span class="month">month</span>
                            <ul>
                                <li>2 Pro-level pieces of content per week(900-word limit)</li>
                                <li>Guaranteed deadlines</li>
                               
                                <li><b id="jehovah">Ideal For:</b></li>
                                <li>New online businesses looking to boost their digital presence</li>
                                <li>Individual with sample, but recurrent content needs</li>
                                
                            </ul>
                           
                        </div>
                    </div>
                 
                    <div class="col-md-6">
                        <div class="pricebox">
                            <h4 class="title">Elite</h4>
                            <span class="price">499</span>
                            <span class="dollar">$</span>
                            <span class="slash">/</span>
                            <span class="month">month</span>
                            <ul>
                                <li>3 Expert-level pieces of content per week(900-word limit)</li>
                                <li>Content calendar and topic ideation for the month</li>
                                <li>Social share for content on request</li>
                                <li><b  id="jehovah">Ideal For:</b></li>
                                <li>Small marketing agencies</li>
                                <li>Most ecommerce sites</li>
                            </ul>
                           
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="pricebox">
                            <h4 class="title">Enterprise</h4>
                            
                            <ul>
                                <li>Special/custom content requests</li>
                                <li>Individual account manager</li>
                                <li>Unlimited content revisions</li>
                                <li>CMS intergration on request</li>
                                <li><b  id="jehovah">Ideal For:</b></li>
                                <li>Large marketing agencies</li>
                                <li>PR agencies</li>
                                <li>Business with large or special content needs on a recurrent basis.</li>
                            </ul>
                            <a href="#" id="rapha" class="btn btn-default btn-lg">Contact for Custom Quote</a>
                        </div>
                    </div>
                </div>
            </div>
         </section>
       

                <br>
                         <form method="post" id="subform" action="<?php echo base_url('buyer/process_order_subscription') ?>">
                           <div class="form-group">
                                        <label for="select"  class="col-xl-12 form-control-label">Choose Plan</label>
                                        <div class="col-xl-12">
                                            <select   name="package_id" onchange="get_total()" class="form-control" id="package" required>
                                              
                                                <?php
                                             foreach ($t->result() as $row)
                                              {  ?>

                                                <option  pesa="<?php echo $row->subscription_price; ?>" value="<?php echo $row->subscription_package_id; ?>"><?php echo $row->subscription_package_name; ?></option>
                                              <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                  <div class="form-group">
                                        <label for="select"  class="col-xl-12 form-control-label">Months</label>
                                        <div class="col-xl-12">
                                            <input   name="months" onkeyup="get_total()" onchange="get_total()" class="form-control" id="words" type="number" min="1" step="1" required>
                                              
                                               
                                        </div>
                                  </div>

                                  <div class="form-group">
                                        <label for="select"  class="col-xl-12 form-control-label">Total (USD)</label>
                                        <div class="col-xl-12">
                                            <input   name="amount" onchange="get_total()" class="form-control amount" id="amount" type="number" readonly>
                                              
                                               
                                        </div>
                                  </div>
                                   <div class="form-group">
                                    <label class="col-xl-12 form-control-label"><b>Summary</b></label>
                                    <div class="row col-xl-12">
                                       <div class="col-6">
                                        <label>Amount (USD)</label>

                                           <input  name="amount" onchange="get_total()" class="form-control amount" id="amount"  readonly>
                                         
                                       </div>

                                       <div class="col-6">
                                         <label>Coupon</label>
                                           <input   name="coupon"  class="form-control" type="text"  placeholder="Coupon Optional">
                                         
                                       </div>


                                    </div>

                                   </div>

                                  <div class="form-group">

                                        <div class="col-xl-12">
                                          
                                           <button class="btn btn-success" style="height: 50px; width: 100%;">Submit</button>
                                              
                                               
                                        </div>
                                  </div>





                          </form>
            </div>


       
                     </div>

                  

                  
                </div>
                    
            </section>

                      
                     </div>
                    </div>
                   </section>
                 </div> <!-- end of tab-->
                 </div>
                </div>
            </div>
        </div>
<?php include 'footer.php'; ?>    

 <script type="text/javascript">
        function get_total() {
            $(document).ready(function() {        
              
                   var total = 0;
                   var unit_price = $("#package option:selected").attr("pesa");
                   console.log(unit_price);
                   var words=$("#words").val();

                   var total = unit_price*words;
                   
                  
                    if (total == 0) {
                        $('.amount').val('');
                    } else {                
                        $('.amount').val(total);
                    }
               
            }); 
         
        }

         function get_due() {
            $(document).ready(function() {        
              
                   var days = 0;
                 
                   var words=$("#words").val();

                   var day = words/750;
                   //round up

                   days=Math.ceil(day);
                   
                  
                    if (days == 0) {
                        $('#due').val('');
                    } else {                
                        $('#due').val(days+' day(s)');
                    }
               
            }); 
         
        }

       
     </script>   



              <div class="modal fade" id="modalContactUs" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content no-r "><a href="#" data-dismiss="modal" aria-label="Close" class="paper-nav-toggle active"><i></i></a>
                    <div class="modal-body no-p">
                        <div class="row">
                            <div class="col-lg-2 grid">
                                
                            </div>
                            <div class="col-lg-9">
                                <div class="light p-t-b-40">
                                    <div class="p-40">
                                        <h5 class="p-b-20 text-center">Get a custom quote.</h5>
                                         <h6 class="text-center">Kindly complete this form</h6>
                                       
                                           <form id="contactform" action="#" method="post">
                                    <div class="row">
                                        <div class="col-12 col-xl-6">
                                            <label for="name" class="required">Name</label>
                                            <input class="form-control form-control-lg" type="text" name="name" id="name">
                                        </div>
                                        <div class="col-12 col-xl-6">
                                            <label for="subject" class="required">Subject</label>
                                            <input class="form-control form-control-lg" type="text" name="subject" id="subject">
                                        </div>
                                        <div class="col-12">
                                            <label for="company" class="required">Company Name</label>
                                            <input class="form-control form-control-lg" type="text" name="company" id="company">
                                        </div>
                                        <div class="col-12 col-xl-6">
                                            <label for="email" class="required">Email Address</label>
                                            <input class="form-control form-control-lg" type="text" name="email" id="email">
                                        </div>
                                        <div class="col-12 col-xl-6">
                                            <label for="phone" class="required">Tel/Mob</label>
                                            <input class="form-control form-control-lg" type="text" name="phone" id="phone">
                                        </div>
                                    </div>
                                    <label for="message" class="required">Tell us more ... </label>
                                    <textarea placeholder="Message" name="message" id="message" class="form-control-lg"></textarea required>
                                    <div class="text-center p-t-20">
                                        <button class="btn btn-primary btn-lg"><i class="icon icon-envelope-o"></i> Send Message</button>
                                    </div>
                                </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>