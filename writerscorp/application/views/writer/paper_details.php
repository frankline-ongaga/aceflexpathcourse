<?php include 'header.php'; ?>


<div class="content-wrapper">
<section class="content-header">
      <h1>
       
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Paper Details</li>
      </ol>
    </section>
  <section class="content">

           <div class="row">

              <div class="col-md-7 col-md-offset-2">

                <div class="box box-primary">
                      <div class="box-header with-border">
                        <h3 class="box-title">Paper Details</h3>
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body">
                        <?php 


                          foreach ($d->result() as $row) {
                            $order_id=$row->order_id;
                            # code...
                         

                        ?>
                        <strong><i class="fa fa-book margin-r-5"></i> Title</strong>

                        <p class="text-muted">
                           <?php if(isset($row->order_title)){ echo $row->order_title;  } else { echo '__'; } ?>
                        </p>

                        <hr>

                        <strong><i class="fa fa-edit margin-r-5"></i> Description</strong>

                        <p class="text-muted">
                           <?php if(isset($row->order_description)){ echo $row->order_description;  } else { echo '__'; } ?>
                        </p>

                         <hr>
                           <strong><i class="fa fa-th margin-r-5"></i> Order Type</strong>

                        <p class="text-muted">
                           <?php if(isset($row->order_type_name)){ echo $row->order_type_name;  } else { echo '__'; } ?>
                        </p>

                         <hr>

                         

                        <strong><i class="fa fa-search margin-r-5"></i> Discipline</strong>

                        <p class="text-muted">

                             <?php 

                                   if($row->discipline_id!=69){

                                    if(isset($row->discipline_name)){ echo $row->discipline_name;  } else { echo '__'; } 

                                  }
                                  else
                                  {

                                    echo $row->other;
                                  }




                                    ?>
                          
                        </p>

                         <hr>

                        <strong><i class="fa fa-bars margin-r-5"></i> Academic Level</strong>

                        <p class="text-muted">

                          <?php if(isset($row->level_name)){ echo $row->level_name;  } else { echo '__'; } ?>
                          
                        </p>

                       <hr>


                        <strong><i class="fa fa-ellipsis-h margin-r-5"></i> Paper Format</strong>

                        <p class="text-muted">
                           <?php if(isset($row->format_name)){ echo $row->format_name;  } else { echo '__'; } ?>
                        </p>

                             

                       <hr>


                        <strong><i class="fa fa-file-text-o margin-r-5"></i> Pages</strong>

                        <p class="text-muted">
                          <?php if(isset($row->order_pages)){ echo $row->order_pages;  } else { echo '__'; } ?>
                        </p>


                       <hr>


                        <strong><i class="fa fa-plus margin-r-5"></i> Sources</strong>

                        <p class="text-muted">
                           <?php if(isset($row->order_sources)){ echo $row->order_sources;  } else { echo '__'; } ?>
                        </p>

                          <hr>
                            <strong><i class="fa fa-search margin-r-5"></i> Plagiarism Report</strong>

                        <p class="text-muted">
                           <?php if($row->order_plagiarism_report>0){ echo $row->order_plagiarism_report. '% unique';  } else { echo '__'; } ?>
                        </p>

                          <hr>


                        <strong><i class="fa fa-upload margin-r-5"></i> Upload(s)</strong>

                        <p class="text-muted">

                          <?php  
                                 foreach ($uploads as $up) 
                                    { 
                                       if(isset($up->file_name)){  ?>

                                           <a href="<?php echo base_url().'userfile/'.$up->file_name;?>"><?= $up->file_name; ?> </a> <br>

                           <?php  } else { echo '__'; } }  ?>
                        </p>

                        <hr>

                         <strong><i class="fa fa-upload margin-r-5"></i> Revision Notes</strong>

                        <p class="text-muted">

                         <?php if(isset($row->order_revision_details)){ echo $row->order_revision_details;  } else { echo '__'; } ?>
                        </p>

                        <hr>



                         <strong><i class="fa fa-upload margin-r-5"></i> Revision Files</strong>

                        <p class="text-muted">

                          <?php  
                                 foreach ($rev as $re) 
                                    { 
                                       if(isset($re->file_name)){  ?>

                                           <a href="<?php echo base_url().'userfile/'.$re->file_name;?>"><?= $re->file_name; ?> </a> <br>

                           <?php  } else { echo '__'; } }  ?>
                        </p>

                        <hr>

                         <strong><i class="fa fa-upload margin-r-5"></i> Plagiarism Reports</strong>

                        <p class="text-muted">

                          <?php  
                                 foreach ($plag as $pl) 
                                    { 
                                       if(isset($pl->file_name)){  ?>

                                           <a href="<?php echo base_url().'userfile/'.$pl->file_name;?>"><?= $pl->file_name; ?> </a> <br>

                           <?php  } else { echo '__'; } }  ?>
                        </p>

                        <hr>


                        <strong><i class="fa fa-check margin-r-5"></i> Amount</strong>

                        <p class="text-muted">
                          
                           <?php if($row->order_type==3) {

                                        echo $row->order_amount.' KES'; 


                                    }   
                                    else
                                    {
                                     // $perc=100-$row->order_commission;
                                      $pesa=($row->order_commission/100)*$row->order_amount;

                                      echo $pesa.' USD'; 




                                    }

                              ?>
                        </p>

                         <hr>


                        <strong><i class="fa fa-upload margin-r-5"></i> Payment Status</strong>

                        <p class="text-muted">
                             <?php if(isset($row->transaction_status)){ echo $row->transaction_status;  } else { echo '__'; } ?>
                        </p>


                        <hr>


                        <strong><i class="fa fa-credit-card margin-r-5"></i> Transaction Code</strong>

                        <p class="text-muted">
                             <?php if(isset($row->transaction_code)){ echo $row->transaction_code;  } else { echo '__'; } ?>
                        </p>

                        <hr>

                         <strong><i class="fa fa-upload margin-r-5"></i> Delivery Notes</strong>

                        <p class="text-muted">

                         <?php if(isset($row->order_delivery_note)){ echo $row->order_delivery_note;  } else { echo '__'; } ?>
                        </p>

                        <hr>

                          <strong><i class="fa fa-download margin-r-5"></i> Completed</strong>

                        <p class="text-muted">
                               <?php  
                                 foreach ($submission as $sub) 
                                    { 
                                       if(isset($sub->file_name)){  ?>

                                           <a href="<?php echo base_url().'submission/'.$sub->file_name;?>"><?= $sub->file_name; ?> </a> <br>

                           <?php  } else { echo '__'; } }  ?> 
                        </p>

                        <hr>
                       

                        <strong><i class="fa fa-upload margin-r-5"></i> Due in</strong>

                        <p class="text-muted"><?php include 'time.php';   ?></p>




                       
                       <?php
                         

                         } ?>






                        


                        


                       

                      
                      </div>
                      <!-- /.box-body -->
                    </div>

                  </div>

                </div>

                



              

        




    


             

             
  </section>
</div>





       


        



        <!-- FOOTER -->

        <!--===================================================-->

       <?php include 'footer.php'; ?>

       <script type="text/javascript">
  
  $(".ratey").click(function(e){

  

  var ra=$(this).val();
  var order_id=<?php echo $order_id;  ?> ;
  $.ajax({

    url: "<?php echo base_url('client/rate_writer') ?>", 
    data:{ rating: ra,order_id: order_id}, 
    type:'POST', 

    success: function(result){
    $("#tot").hide();
    $("#hymn").show();
  }});

});
</script>

<script type="text/javascript">
  
  $("#ham").click(function(e){

     e.preventDefault();

  

  var com=$("#naliaka").val();
  var order_id=<?php echo $order_id;  ?> ;
  $.ajax({

    url: "<?php echo base_url('client/comment_writer') ?>", 
    data:{ comment: com,order_id: order_id}, 
    type:'POST', 

    success: function(result){
    $("#lynn").hide();
    $("#letisha").show();
  }});

});
</script>
     