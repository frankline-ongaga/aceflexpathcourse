<?php include 'header.php'; ?>


<div class="content-wrapper">
<section class="content-header">
      <h1>
        Dashboard
        <small>Version 2.0</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
  <section class="content">

  <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
           
             <span class="info-box-icon bg-green"><i class="fa fa-dot-circle-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Completed</span>
              <span class="info-box-number"> <?php if(isset($completed_count)){ echo $completed_count;  } else { echo "0"; } ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
             <span class="info-box-icon bg-aqua"><i class="fa fa-clock-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">In Progress</span>
              <span class="info-box-number"><?php if(isset($pending_count)){ echo $pending_count;  } else { echo "0"; }?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
           
             <span class="info-box-icon bg-orange"><i class="fa fa-undo"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Revision</span>
              <span class="info-box-number"><?php if(isset($revision_count)){ echo $revision_count;  } else { echo "0"; }?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>

         <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-warning"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Awaiting Payment</span>
              <span class="info-box-number"><?php if(isset($awaiting_count)){ echo $awaiting_count;  } else { echo "0"; } ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>

        



    <hr>

        <!--===================================================-->

    


             <div class="col-md-12 col-sm-8">


      
             

                <div class="col-md-12">

                 
                  <div class="panel">

                  <div class="panel-heading">

                                          <h3 class="panel-title">Recent Orders</h3>

                                      </div>

                      <div class="panel-body">

                                          <div class="table-responsive">

                                                <table class="table table-hover table-striped" id="mpesa_repayments">
                                              <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Order Title</th>
                                                    <th>Amount</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                                 <?php  
                                                  
                                                    
                                                       foreach ($o->result() as $row) 
                                                   {
                                                                                             
                                                                                                  
                                                                                               
                                                                                      
                                            ?>
                                                            
                                                  <tr>
                                         
                                    <td><?php if(isset($row->order_id)) { echo $row->order_id;  }   ?></td>
                                    <td><?php if(isset($row->order_title)) { echo $row->order_title;  }   ?></td>
                                    <td><?php if(isset($row->order_amount)) { echo $row->order_amount;  }   ?></td>
                                    <td><?php if(isset($row->status_name)) { echo $row->status_name;  }   ?></td>
                                    <td><a href="<?php echo base_url('client/get_paper_details/').$row->order_id; ?>"><button class="btn btn-primary btn-sm">See More</button></a></td>

                                   
                                                        
                                                                     
                                                                       
                                                              </tr>
                                                       
                                                    <?php } ?>
                                              </tbody>
                                            </table>

                                          </div>

                                      </div>

                      <!--===================================================-->

                      <!--End No Label Form-->

          

                  </div>

              </div>

     


             


      

            

                         

          

                      

            






                    </div>

                  </div>

                </div>
            

             
         

            <!--===================================================-->

            <!--END MAIN NAVIGATION-->



       


        



        <!-- FOOTER -->

        <!--===================================================-->

       <?php include 'footer.php'; ?>

     