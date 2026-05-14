


 <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">   
                <div class="user-panel">
                  <div class="pull-left image">
                    <i class="fa fa-user-circle-o fa-3x" style="color: white;"></i>
                  </div>
                  <div class="pull-left info">
                    <p>Hi <?php if(isset($user_fname)){ echo $user_fname;  } ?></p>
                    <a href="#"><i class="fa fa-circle text-success" ></i> Online</a>
                  </div>



                 

                </div> 
                 <form action="#" method="get" class="sidebar-form">
                      <?php if(!empty($level)){ ?>
                                <?php if($level==1) { ?>
                                <span class="badge badge-success">Starter</span>
                                <?php }  elseif($level==2) {?>
                                <span class="badge badge-primary">Pro</span>
                                <?php }  elseif($level==3) {?>
                                 <span class="badge badge-danger">Expert</span>
                                  <?php }  else {?>
                                  <span class="badge badge-secondary">Awaiting Approval</span>
                                  <?php } ?>

                                  <?php } ?>
                                  
                     <h5 style="color:#ffffff"><?php if($rating>0){ echo 'Rating '.$rating.'%'; } else { echo 'Rating 0%'; } ?></h5>
                    
                 
                  </form>           
                <!-- Sidebar Menu -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="<?php if($this->uri->segment(2)=="index"){echo "active";}?>"> <a href="<?php echo base_url('writer/index')?>"><i class="fa fa-th"></i> <span>Dashboard</span> <span class="label label-important"></span></a>
                    </li>
                    <!-- <li class="<?php // if($this->uri->segment(2)=="jobs"){echo "active";}?>"> <a href="<?php // echo base_url('writer/jobs')?>"><i class="fa fa-list"></i> <span>Jobs</span> <span class="label label-important"></span></a>
                    </li> -->
                    
                    <li class="treeview <?php if($this->uri->segment(2)=="get_all" or $this->uri->segment(2)=="jobs" or $this->uri->segment(2)=="get_feedback" or $this->uri->segment(2)=="get_revision" or $this->uri->segment(2)=="get_awaiting" or $this->uri->segment(2)=="get_completed" or $this->uri->segment(2)=="get_pending" or $this->uri->segment(2)=="get_cancelled" ){echo "active menu-open";}?>">
                      <a href="#"><i class="fa fa-sticky-note-o"></i> <span>Orders</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                        <ul class="treeview-menu">

                        <?php  


                   if($user_status!=7){
                      ?>

                           <li class="<?php if($this->uri->segment(2)=="jobs"){echo "active";}?>"> <a href="<?php echo base_url('writer/jobs')?>"><i class="fa fa-list"></i> <span>Available Orders</span> <span class="label label-important"></span> <span class="label label-primary pull-right"><?php if(isset($jobs_count)){ echo $jobs_count;  } else { echo "0"; }?></span></a>
                           </li>
                    <?php } ?>

                           <li class="<?php if($this->uri->segment(2)=="get_pending"){echo "active";}?>"> <a href="<?php echo base_url('writer/get_pending')?>"><i class="fa fa-clock-o"></i> <span>In Progress</span> <span class="pull-right-container">
                      <span class="label label-primary pull-right"><?php if(isset($pending_count)){ echo $pending_count;  } else { echo "0"; }?></span>
                    </span></a></li>

                    <li class="<?php if($this->uri->segment(2)=="get_feedback"){echo "active";}?>"> <a href="<?php echo base_url('writer/get_feedback')?>"><i class="fa fa-undo"></i> <span>Awaiting Feedback</span> <span class="pull-right-container">
                      <span class="label label-primary pull-right"><?php if(isset($feedback_count)){ echo $feedback_count;  } else { echo "0"; }?></span>
                    </span></a></li>

                      <li class="<?php if($this->uri->segment(2)=="get_cancelled"){echo "active";}?>"> <a href="<?php echo base_url('writer/get_cancelled')?>"><i class="fa fa-ban"></i> <span>Get Cancelled</span> <span class="pull-right-container">
                      <span class="label label-primary pull-right"><?php if(isset($cancelled_count)){ echo $cancelled_count;  } else { echo "0"; }?></span>
                    </span></a></li>


                           <!-- <li class="<?php // if($this->uri->segment(2)=="get_revision"){echo "active";}?>"> <a href="<?php //echo base_url('writer/get_revision')?>"><i class="fa fa-undo"></i> <span>Revision</span> <span class="pull-right-container">
                      <span class="label label-primary pull-right"><?php //if(isset($revision_count)){ echo $revision_count;  } else { echo "0"; }?></span>
                    </span></a></li>
 -->
                         

                         <!--  <li class="<?php // if($this->uri->segment(2)=="get_all"){echo "active";}?>"> <a href="<?php // echo base_url('writer/get_all')?>"><i class="fa fa-list"></i> <span>All Orders</span> <span class="pull-right-container">
                      <span class="label label-primary pull-right"><?php // if(isset($all_count)){ echo $all_count;  } else { echo "0"; } ?></span>
                    </span></a></li> -->

                          <li class="<?php if($this->uri->segment(2)=="get_completed"){echo "active";}?>"> <a href="<?php echo base_url('writer/get_completed')?>"><i class="fa fa-dot-circle-o"></i> <span>Completed</span> <span class="pull-right-container">
                      <span class="label label-primary pull-right"><?php if(isset($completed_count)){ echo $completed_count;  } else { echo "0"; } ?></span>
                    </span></a></li>

                         


                    


                          
                        
                      </ul>
                  </li>

               
                  <li class="treeview <?php if($this->uri->segment(2)=="my_earnings" or $this->uri->segment(2)=="get_payment_options" or $this->uri->segment(2)=="registration_fees" ){echo "active menu-open";}?>">
                      <a href="#"><i class="fa fa-money"></i> <span>Payments</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                        <ul class="treeview-menu">
                      
                           <li class="<?php if($this->uri->segment(2)=="my_earnings"){echo "active";}?>"> <a href="<?php echo base_url('writer/my_earnings'); ?>"><i class="fa fa-plus"></i> <span>Request Payouts</span> <span class="label label-important"></span></a></li>
                          <li class="<?php if($this->uri->segment(2)=="get_payment_options"){echo "active";}?>"> <a href="<?php echo base_url('writer/get_payment_options'); ?>"><i class="fa fa-envelope"></i> <span>Add Payment Option</span><span class="pull-right-container">
                      <span class="label label-warning pull-right"><?php if(isset($message_count)){ echo $message_count;  } else { echo "0"; }?></span>
                    </span></a></li>
                          
                        
                      </ul>
                  </li>


                  <li class="treeview <?php if($this->uri->segment(2)=="message_index" or $this->uri->segment(2)=="inbox" or $this->uri->segment(2)=="registration_fees" ){echo "active menu-open";}?>">
                      <a href="#"><i class="fa fa-envelope"></i> <span>Messages</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                        <ul class="treeview-menu">
                          <li class="<?php if($this->uri->segment(2)=="message_index"){echo "active";}?>"> <a href="<?php echo base_url('writer/message_index'); ?>"><i class="fa fa-plus"></i> <span>Send Message (support)</span> <span class="label label-important"></span></a></li>
                          <li class="<?php if($this->uri->segment(2)=="inbox"){echo "active";}?>"> <a href="<?php echo base_url('writer/inbox'); ?>"><i class="fa fa-envelope"></i> <span>Inbox</span><span class="pull-right-container">
                      <span class="label label-warning pull-right"><?php if(isset($message_count)){ echo $message_count;  } else { echo "0"; }?></span>
                    </span></a></li>
                          
                        
                      </ul>
                  </li>




             
                 
              
                    
                </ul>
                <!-- /.sidebar-menu -->
            </section>
            <!-- /.sidebar -->
        </aside>