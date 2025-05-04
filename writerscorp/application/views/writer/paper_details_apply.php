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


                          foreach ($de->result() as $row) {
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

                        <strong><i class="fa fa-search margin-r-5"></i> Discipline</strong>

                        <p class="text-muted">

                             <?php if(isset($row->discipline_name)){ echo $row->discipline_name;  } else { echo '__'; } ?>
                          
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


                        <strong><i class="fa fa-upload margin-r-5"></i> Upload(s)</strong>

                        <p class="text-muted">
                           <?php if(isset($row->order_files)){  ?>

                                           <a href="<?php echo base_url().'userfile/'.$row->order_files;?>">View File </a>

                           <?php   } else { echo '__'; } ?>
                        </p>

                        <hr>


                        <strong><i class="fa fa-money margin-r-5"></i> Amount</strong>

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
                          
                           <!-- <?php // if(isset($row->order_amount)){ echo $row->order_amount;  } else { echo '__'; } ?> -->
                        </p>

                         <hr>


                        <strong><i class="fa fa-upload margin-r-5"></i> Payment Status</strong>

                        <p class="text-muted">
                             <?php if(isset($row->transaction_status)){ echo $row->transaction_status;  } else { echo '__'; } ?>
                        </p>


                        <hr>


                        <strong><i class="fa fa-upload margin-r-5"></i> Transaction Code</strong>

                        <p class="text-muted">
                             <?php if(isset($row->transaction_code)){ echo $row->transaction_code;  } else { echo '__'; } ?>
                        </p>

                        <hr>


                        <strong><i class="fa fa-upload margin-r-5"></i> Due in</strong>

                        <p class="text-muted"><?php include 'time.php';   ?></p>

                         <a href="<?php echo base_url('writer/get_job/').$row->order_id ?>" class="btn btn-primary">Take up order</a>

                         <?php 

                         
                           }

                        ?>



                        


                        


                       

                      
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

     







