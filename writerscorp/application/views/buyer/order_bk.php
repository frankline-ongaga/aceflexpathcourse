<?php include 'header.php' ?>
<div class="content-wrapper">
  <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></li>
            <li class="active">Order Paper</li>
        </ol>    
  </section>
 

   <br>
    <br>
    
  
  <div class="container-fluid">
    <div class="col-md-7 col-md-offset-2">
   
    
     
            <div class="box box-success">
                    

                     <?php 
             if(isset($success))
             {
              ?>
              <div class="alert alert-success">
               <?php
                echo $success;
                ?>
               </div>
               <?php
             }

           ?>

           <div class="box-header with-border">
              <h3 class="box-title">Order your paper</h3>
            </div>

          

                      <!--No Label Form-->

                      <!--===================================================-->

                      
          

             <div class="box-body">
                                 
                                

                                                    
                            <!-- Tab panes -->

                                 
                                  

                               <div class="container kevvy">
       
         
                     <br>
        

                <div class="col-md-7 offset-md-2 mt-3 mb-3 right-area animated fadeInRight second">
                      <div class="custom-form">
                        <div class="form-wrapper">
                            <?php if(!empty($error)){ ?>
                                         <div class="alert alert-warning">
                                           <?php echo $error; ?>
                                          </div>

                                 <?php     } ?>
                           <form method="post" action="<?php echo base_url() ?>client/process_order_login" enctype="multipart/form-data">
                            
                            <div class="spacer">&nbsp;</div>
                            <div class="row">

                              <div class="form-group">
                               
                                    <input type="text" class="form-control mb-3" id="event" name="order_title" placeholder="Title" required>
                               
                              </div>
                               <div class="form-group">
                                
                                    <textarea rows="8" class="form-control mb-3" name="order_description" placeholder="Describe your paper"></textarea>
                                </div>
                             <div class="row">
                                <div class="col-md-6">
                               <div class="form-group">
                               
                                    <select id="discipline" class="form-control selector mb-3" name="order_discipline_id" onchange="get_other()" required>
                                         <option value="" disabled selected hidden>Discipline</option>
                                       
                                         <?php

                                          foreach ($discipline->result_array() as $row)         

                                            { ?>

                                            <option  value="<?php echo $row['discipline_id']; ?>"><?php echo $row['discipline_name']; ?></option>

                                       <?php } ?>
                                    </select>
                                    
                                </div><!-- / sub-col -->
                               </div>


                                <div class="col-md-6">
                               <div class="form-group">
                               
                                    <input type="number" class="form-control mb-3" name="order_sources" placeholder="Sources">
                                </div><!-- / sub-col -->
                              </div>
                              
                              
                             </div>
                             <div class="form-group" id="other">
                               
                                    <input type="text" id="thatinput" class="form-control mb-3" name="other" placeholder="input discipline">
                               
                              </div>
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <input type="number" onkeyup="get_tols()" onclick="get_tols()" class="form-control mb-3" id="pages" name="order_pages" placeholder="Number of pages" required>
                                </div><!-- / sub-col -->
                               </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <select class="form-control selector mb-3" name="order_format_id" onchange="get_tols()" required>
                                         <option value="" disabled selected hidden>Paper Format</option>
                                       
                                        <?php

                                                          foreach ($format->result_array() as $row)

                         

                                                            { ?>

                                                            <option  value="<?php echo $row['format_id']; ?>"><?php echo $row['format_name']; ?></option>

                                                       <?php } ?>
                                    </select>
                                </div>
                              </div>
                             </div>

                              <div class="form-group">
                                <label for="fileupload"> Select a file to upload (Optional)</label>
                                    <input type="file" name="userfile">
                                    
                                </div><!-- / sub-col -->

                                <div class="form-group">
                                    <select class="form-control selector mb-3" name="order_level_id" id="level" onchange="get_tols()" required>
                                         <option value="" disabled selected hidden>Academic Level</option>

                                      
                                      
                                         <?php

                                          foreach ($level->result_array() as $row)

         

                                            { ?>

                                            <option  value="<?php echo $row['level_id']; ?>"><?php echo $row['level_name']; ?></option>

                                       <?php } ?>
                                    </select>
                                    
                                </div><!-- / sub-col -->

                                <div class="form-group">
                                    <select class="form-control selector mb-3" name="order_deadline_id" id="deadline" onchange="get_tols()" required>
                                         <option value="" disabled selected hidden>Deadline</option>
                                       
                                        <?php

                                                          foreach ($deadline->result_array() as $row)

                         

                                                            { ?>

                                                            <option  value="<?php echo $row['deadline_id']; ?>"><?php echo $row['name']; ?></option>

                                                       <?php } ?>
                                    </select>
                                    
                                </div><!-- / sub-col -->

                                <div class="form-group">
                                    <input type="text" min="0" name="order_amount" class="form-control mb-3" id="total" placeholder="Total (USD)" readonly>
                                </div>
                               
                                   
                                

                                




                            </div><!-- / row -->

                                

                            <div class="spacer">&nbsp;</div>

                            <div class="text-center">
                                <button class="btn btn-primary ml-auto mr-auto" type="submit"><i class="fa fa-plus"></i> <span class="va-middle">ORDER NOW</span></button>
                            </div>
                           </form>

                            <!-- / text-center
                         
                        </div><!-- / form-wrapper -->
                    </div><!-- / custom-form -->
                    
                </div><!-- / column -->
             </div>
            


        
                  </div>
                                    
                                 
                                 
                                    
                                   

                                  
                                    
                                                                       
                               

                              



                            </div>
                               

                              
                                 
                           

                      <!--===================================================-->

                      <!--End No Label Form-->

          

                  </div>




            

            <!--===================================================-->

            <!--END MAIN NAVIGATION-->


       </div>
    </div>

</div>

        



        <!-- FOOTER -->

        <!--===================================================-->

       <?php include 'footer.php'; ?>
         <script type="text/javascript">

       
       $(document).ready(function() {
          $('.js-example-basic-multiple').select2();
        });

     // $("#countrylist option[value=<?php //echo $country; ?>]").prop("selected", "selected");

      </script>
       <script type="text/javascript">

      $("#countrylist option[value=<?php echo $country; ?>]").prop("selected", "selected");

      </script>


      <script type="text/javascript">




        //get other 
         function get_other() {
            $(document).ready(function() {        
              
                  
                  // get the value of the select statement
                   var id =  $("#discipline").val();
                   console.log(id);
                  
                    if (id == 69) {
                        $('#other').show(500);
                        $("#thatinput").prop('required',true);
                    } else {    

                        $('#other').hide(500);
                    }


               
            }); 
         
        }
        
                           
        function get_tols(){
                    var factor;
                    <?php 
                         if($res=='first'){ ?>
                            factor=0.8;

                       <?php  } 
                         else
                         { ?>
                            factor=1;

                    <?php    }

                    ?>

                    var pages=$("#pages").val();
                    var level=$("#level").val();
                    var deadline=$("#deadline").val();
                
                    $.ajax({
                            url:'<?php echo base_url() ?>home/get_price',
                            type:'POST',
                            data:{ deadline:deadline, level : level },
                            success:function(result){

                              console.log('pages'+pages);
                              console.log('result'+result);
                                
                               var tot=result*pages;

                               //alert(tot);

                               if(tot>0){
                                  
                               $("#total").val((tot*factor).toFixed(2));
                               $("#total").css('border','2px solid #74a125');


                               }
                               else
                               {
                                 $("#total").val(0);
                                 ("#total").css('border','2px solid #c8c9c9');
                               }


                                  
                            }

                    });
                // });
            }

      </script>

