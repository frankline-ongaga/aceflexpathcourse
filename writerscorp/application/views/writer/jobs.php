 <?php include 'header.php'; ?>
<div class="page light">
<div class="content-wrapper">
                <div class="container">
                     <div class="row">
                         <div class="col-md-1">
                         
                         </div>
                 
                       <div class="col-md-9 p-t-50 ">
                        <br>
                        <?php
                        if($h->num_rows()>0) {
                        foreach ($h->result() as $row)
                        {   ?>
                      
                       <div class="box box-warning">
                        <div class="box-header with-border">
                          <h3 class="box-title"><?php if(isset($row->order_title)) { echo $row->order_title;  }   ?></h3>

                          <div class="box-tools pull-right">
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



                           <?php if(isset($row->industry_name)) { echo $row->industry_name;  }   ?>
                          </div>
                          <!-- /.box-tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body" style="">
                          <?php if(isset($row->order_description)) { echo $row->order_description;  }   ?>
                          <br>  <br>
                              <a href="<?php echo base_url('writer/get_job_details/').$row->order_id ?>" class="btn btn-primary">Apply</a>
                        </div>
                        <!-- /.box-body -->
                      </div>
                      <?php
                        }
                       }
                       else
                       {
                        ?>
                        <div class="alert alert-success">
                           Sorry no matching jobs available.
                        </div>
                        <?php
                       }
                      ?>
                  
                      
                       </div>
                    </div>
                </div>
            </div>
          </div>
        </main>
<?php include 'footer.php'; ?>