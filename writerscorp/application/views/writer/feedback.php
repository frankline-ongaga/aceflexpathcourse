<?php include 'header.php' ?>
<div class="content-wrapper">
  <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></li>
            <li class="active">Awaiting Feedback</li>
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
   
     <div class="box box-default">
                     <div class="box-header with-border">
                      <h3 class="box-title">Awaiting Feedback</h3>
                    </div>
           <div class="box-body table-responsive no-padding">
                       <table class="table table-striped" style="font-size: 12px;">
                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Paper Title</th>
                                    <th>Discipline</th>
                                    <th>Revision Details</th>
                                   <!--  <th>Revision File</th> -->
                                    <th>Amount</th>
                                    <th>Submit Work</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php
                                foreach ($feedback->result() as $row)
                                {   ?>
                                <tr>
                                    <td><?php if(isset($row->order_id)) { echo $row->order_id;  }   ?></td>
                                    <td><?php if(isset($row->order_title)) { echo $row->order_title;  }   ?></td>
                                    <td><?php 

                                   if($row->discipline_id!=69){

                                    if(isset($row->discipline_name)){ echo $row->discipline_name;  } else { echo '__'; } 

                                  }
                                  else
                                  {

                                    echo $row->other;
                                  }




                                    ?></td>
                                    <td><?php if(isset($row->order_revision_details)) { echo $row->order_revision_details;  }   ?></td>
                                   
                                    <td><?php if($row->order_type==3) {

                                        echo $row->order_amount.' KES'; 


                                    }   
                                    else
                                    {
                                     // $perc=100-$row->order_commission;
                                      $pesa=($row->order_commission/100)*$row->order_amount;

                                      echo $pesa.' USD'; 




                                    }

                                         ?>
                                        </td>
                                      <td><a href="<?php echo base_url('writer/submit_paper/').$row->order_id; ?>"><button class="btn btn-warning btn-sm">Submit Work</button></a></td>
                                    <td><a href="<?php echo base_url('writer/get_paper_details/').$row->order_id; ?>"><button class="btn btn-primary btn-sm">Revision Details</button></a></td>
                                 
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

  

          
      


        



        <!-- FOOTER -->

        <!--===================================================-->

       <?php include 'footer.php'; ?>