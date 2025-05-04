<?php include 'header.php'; ?> 

<div class="content-wrapper">
  <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></li>
            <li class="active">Subscriptions</li>
        </ol>    
  </section>
 

   <br>
    <br>
    
  
  <div class="container-fluid">
   
     <div class="box">
                <div class="box box-info">
                    <div class="box-header with-border">
                         <h3 class="box-title">Subscriptions</h3>
                          <div class="box-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                             
                            </div>
                          </div>
                    </div>
          <div class="box-body table-responsive no-padding">
                      <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Package</th>
                                    <th>Client</th>
                                    <th>Status</th>
                                    <th>Expires In</th>
                                    <th>Submit Work</th>
                                 
                                   
                                </tr>
                            </thead>
                            <tbody>
                              <?php
                                foreach ($subs->result() as $row)
                                {   ?>
                                <tr>
                                    <td><?php if(isset($row->order_id)) { echo $row->order_id;  }   ?></td>
                                    <td><?php if(isset($row->order_title)) { echo $row->order_title;  }   ?></td>
                                    <td><?php if(isset($row->user_fname)) { echo $row->user_fname.' '. $row->user_lname ;  }   ?></td>
                                    <td><?php if($row->order_paid_status==1 and $leo<=$row->order_due) 
                                                { 
                                                    echo 'Active'; 

                                                 } 
                                                 elseif($row->order_paid_status==1 and $leo>$row->order_due) {
                                                    # code...
                                                      echo 'Expired';
                                                  } 
                                                  else
                                                  {

                                                      echo 'Pending Payments';

                                                  }


                                                  ?>
                                              </td>
                                    <td><?php  include 'date.php';  ?></td>
                                     <td><?php if($row->order_paid_status==1 and $leo<=$row->order_due) 
                                                {  ?>

                                                <a href="<?php echo base_url('admin/submit_work/'.$row->order_id);?>">Submit Work</a>

                                                <?php } ?>
                                       </td>
                                  
                                </tr>
                               <?php } ?>
                            </tbody>
                        </table>
                     </div>
                    </div>
                   </section>
                 </div> <!-- end of tab-->
                 </div>
                </div>
                

                
<?php include 'footer.php'; ?>       