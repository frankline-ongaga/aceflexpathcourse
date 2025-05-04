<?php include 'admin_header.php' ?>
<div class="content-wrapper">
  <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></li>
            <li class="active">Complete Orders</li>
        </ol>    
  </section>
 

   <br>
    <br>
    
  
  <div class="container-fluid">

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
   
     <div class="box">
                <div class="box box-info">
                    <div class="box-header with-border">
                         <h3 class="box-title">Completed Orders</h3>
                          <div class="box-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                             
                            </div>
                          </div>
                    </div>
           <div class="box-body table-responsive no-padding">
                       <table class="table table-striped" style="font-size: 12px;">
                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Paper Title</th>
                                    <th>Discipline</th>
                                    <th>Amount</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php
                                foreach ($completed->result() as $row)
                                {   ?>
                                <tr>
                                    <td><?php if(isset($row->order_id)) { echo $row->order_id;  }   ?></td>
                                    <td><?php if(isset($row->order_title)) { echo $row->order_title;  }   ?></td>
                                    <td><?php if(isset($row->discipline_name)) { echo $row->discipline_name;  }   ?></td>
                                    <td><?php if(isset($row->order_amount)) { echo $row->order_amount;  }   ?></td>
                                    
                                    <td><a href="<?php echo base_url('client/get_paper_details/').$row->order_id; ?>"><button class="btn btn-primary btn-sm">Paper Details</button></a></td>
                                
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

  

          
      


        



        <!-- FOOTER -->

        <!--===================================================-->

       <?php include 'admin_footer.php'; ?>