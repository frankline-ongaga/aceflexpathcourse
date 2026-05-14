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
            <span class="info-box-icon bg-aqua"><i class="fa fa-bars"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Pending Orders</span>
              <span class="info-box-number"> <?php if(isset($p)){ echo $p; } ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>

         <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-send"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Earnings</span>
              <span class="info-box-number"><?php if(isset($e)){ echo $e; } ?></span>
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
            <span class="info-box-icon bg-green"><i class="fa fa-image"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Buyers</span>
              <span class="info-box-number"><?php if(isset($b)){ echo $b; } ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>

          <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-user"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Writers</span>
              <span class="info-box-number"><?php if(isset($w)){ echo $w; } ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>


               
                     
                  
      <div class="col-md-12 col-sm-8">
               
              <div class="col-md-5">
                      <div class="panel">

                  <div class="panel-heading">
                    <h3 class="panel-title">Latest Orders</h3>
                  </div>

                  <div class="panel-body">
                       <div class="table-responsive">
                                            <table class="table table-hover earning-box">
                                                <thead class="bg-light">
                                                    <tr>
                                                        <th>Client Name</th>
                                                        <th>Paper</th>
                                                        <th>Price(USD)</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        foreach ($f->result() as $row)
                                                        {   ?>
                                                    <tr>
                                                       
                                                        <td>
                                                            <h6><?php if(isset($row->user_fname)) { echo $row->user_fname;  }   ?></h6></td>
                                                        <td><?php if(isset($row->order_title)) { echo $row->order_title;  }   ?></td>
                                                        <td><?php if(isset($row->order_amount)) { echo $row->order_amount;  }   ?></td>
                                                    </tr>
                                                    <?php
                                                        }
                                                    ?>
                                                   
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                       
                        <div class="col-md-7">
                           <div class="panel">

                  <div class="panel-heading">
                    <h3 class="panel-title">Writer Approval Requests</h3>
                  </div>

                  <div class="panel-body">
                       <div class="table-responsive">
                                            <table class="table table-hover earning-box">
                                            <table id="recent-orders" class="table table-hover mb-0 ps-container ps-theme-default">
                                                <thead class="bg-light">
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Customer Name</th>
                                                      
                                                        <th>Status</th>
                                                        <th>View Request</th>

                                                      
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                 <?php
                                                        foreach ($r->result() as $row)
                                                        {   ?>

                                                    <tr>

                                                        <td>#<?php if(isset($row->user_id)) { echo $row->user_id;  }   ?></td>
                                                        <td><?php if(isset($row->user_fname)) { echo $row->user_fname . ' '.$row->user_lname ;  }   ?></td>
                                                      
                                                        <td><span class="badge badge-success">Unconfirmed</span></td>
                                                        <td><a href="<?php echo base_url('admin/writer_application/').$row->user_id; ?>"><button class="btn-sm btn btn-warning">View Application</button></a></td>
                                                    </tr>
                                                    <?php } ?>
                                                   
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
          
   
</body>
<?php include 'footer.php'; ?>