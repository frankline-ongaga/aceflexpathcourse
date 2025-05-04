<div class="page-wrapper">
      <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
          <div class="breadcrumb-title pe-3">My Coupons</div>
          <div class="ps-3">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">My Coupons</li>
              </ol>
            </nav>
          </div>
         
        </div>
        <!--end breadcrumb-->
        <div class="row">
          <div class="col-xl-9 mx-auto">
            <h6 class="mb-0 text-uppercase">My Coupons</h6>
            <hr/>
              <div class="card">
                 <div class="card-body">
                                      
                                       
    
                                      <div class="table-responsive">  
                                            <table class="table table-striped mb-0" id="example">
                                                <thead>
                                                      <tr>
                                                            <th>#</th>
                                                            <th>Coupon Code</th>
                                                            <th>Coupon Discount %</th>
                                                            <th>Coupon Status</th>
                                                            <th>Generated</th>
                                                            
                                                        </tr>
                                                </thead>
                                                <tbody>
                                                   
                                                     <?php
                                                          foreach ($earnings->result() as $row)
                                                          {   ?>
                                                          <tr>
                                                              <td><?php if(isset($row->coupon_id)) { echo $row->coupon_id;  }   ?></td>

                                                               <td><?php if(isset($row->coupon_code)) { echo $row->coupon_code;  }   ?></td>

                                                               <td><?php if(isset($row->coupon_discount)) { echo $row->coupon_discount;  }   ?></td>
                                                            
                                                          




                                                              
                                                              <td><?php if($row->coupon_status==0) { echo "Active";  } else {echo "Used"; }   ?></td>

                                                              <td><?php if(isset($row->coupon_date)) { date_output($row->coupon_date);  }   ?></td>
                                                            
                                                           
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
                      