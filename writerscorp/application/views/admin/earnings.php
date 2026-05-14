<?php include 'header.php'; ?>
         <div class="content-wrapper">
  <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></li>
            <li class="active">Earnings</li>
        </ol>    
  </section>
 

   <br>
    <br>
    
  
  <div class="container-fluid">
   
        <div class="box box-danger">
                    <div class="box-header with-border">
                      <h3 class="box-title">Earnings</h3>
                    </div>
          <div class="box-body table-responsive no-padding">
                      <table class="table table-hover table-striped">
                                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Paper Title</th>
                                   
                                    <th>Words</th>
                                    <th>Amount($)</th>
                                    <th>Commission(%)</th>
                                    <th>Earnings($)</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php
                                $total=0;
                                foreach ($e->result() as $row)
                                {   ?>
                                <tr>
                                    <td><?php if(isset($row->order_id)) { echo $row->order_id;  }   ?></td>
                                    <td><?php if(isset($row->order_title)) { echo $row->order_title;  }   ?></td>
                                    
                                    <td><?php if(isset($row->order_word_count)) { echo $row->order_word_count;  }   ?></td>
                                     <td><?php if(isset($row->order_amount)) { echo $row->order_amount;  }   ?></td>
                                      <td><?php if(isset($row->order_commission)) { echo $row->order_commission;  }   ?></td>
                                     <td><?php $comm= ($row->order_commission/100)*$row->order_amount; 
                                               echo $comm;  
                                               $total=$total+$comm; 

                                               ?></td>
                                   
                                </tr>
                               <?php } ?>
                               </tbody>
                            </table>
                  
                                    </div>
                                  
                                </div>
                                
                           
                           
                        </div>
                       
                    </section>
                
    </div>
   
</body>

<?php include 'footer.php'; ?>