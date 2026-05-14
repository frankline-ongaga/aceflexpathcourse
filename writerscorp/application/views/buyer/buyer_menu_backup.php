


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
                <!-- Sidebar Menu -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="<?php if($this->uri->segment(2)=="index"){echo "active";}?>"> <a href="<?php echo base_url('client/index')?>"><i class="fa fa-th"></i> <span>Dashboard</span> <span class="label label-important"></span></a>
                    </li>
                     <li class="<?php if($this->uri->segment(2)=="order"){echo "active";}?>"> <a href="<?php echo base_url('client/order'); ?>"><i class="fa fa-plus"></i> <span>Order your paper</span> <span class="label label-important"></span></a>
                    </li>
                    <li class="treeview <?php if($this->uri->segment(2)=="get_all" or $this->uri->segment(2)=="get_revision" or $this->uri->segment(2)=="get_awaiting" or $this->uri->segment(2)=="get_completed" or $this->uri->segment(2)=="get_pending"  or $this->uri->segment(2)=="to_be_revised" ){echo "active menu-open";}?>">
                      <a href="#"><i class="fa fa-sticky-note-o"></i> <span>Orders</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                        <ul class="treeview-menu">
                          <li class="<?php if($this->uri->segment(2)=="get_all"){echo "active";}?>"> <a href="<?php echo base_url('client/get_all')?>"><i class="fa fa-list"></i> <span>All Orders</span> <span class="pull-right-container">
				              <span class="label label-primary pull-right"><?php if(isset($all_count)){ echo $all_count;  } else { echo "0"; } ?></span>
				            </span></a></li>

                          <li class="<?php if($this->uri->segment(2)=="get_completed"){echo "active";}?>"> <a href="<?php echo base_url('client/get_completed')?>"><i class="fa fa-dot-circle-o"></i> <span>Completed</span> <span class="pull-right-container">
				              <span class="label label-primary pull-right"><?php if(isset($completed_count)){ echo $completed_count;  } else { echo "0"; } ?></span>
				            </span></a></li>

                           <li class="<?php if($this->uri->segment(2)=="get_pending"){echo "active";}?>"> <a href="<?php echo base_url('client/get_pending')?>"><i class="fa fa-clock-o"></i> <span>In Progress</span> <span class="pull-right-container">
				              <span class="label label-primary pull-right"><?php if(isset($pending_count)){ echo $pending_count;  } else { echo "0"; }?></span>
				            </span></a></li>

                            <li class="<?php if($this->uri->segment(2)=="get_revision"){echo "active";}?>"> <a href="<?php echo base_url('client/get_revision')?>"><i class="fa fa-undo"></i> <span>Revision</span> <span class="pull-right-container">
				              <span class="label label-primary pull-right"><?php if(isset($revision_count)){ echo $revision_count;  } else { echo "0"; }?></span>
				            </span></a></li>

                             <li class="<?php if($this->uri->segment(2)=="get_awaiting"){echo "active";}?>"> <a href="<?php echo base_url('client/get_awaiting')?>"><i class="fa fa-warning"></i> <span>Awaiting Payments</span> <span class="pull-right-container">
				              <span class="label label-primary pull-right"><?php if(isset($awaiting_count)){ echo $awaiting_count;  } else { echo "0"; } ?></span>
				            </span></a></li>

                    <li class="<?php if($this->uri->segment(2)=="to_be_revised"){echo "active";}?>"> <a href="<?php echo base_url('client/to_be_revised')?>"><i class="fa fa-dot-circle-o"></i> <span>Request a Revision</span> <span class="pull-right-container">
                      <span class="label label-primary pull-right"><?php if(isset($revision_count)){ echo $revision_count;  } else { echo "0"; }?></span>
                    </span></a></li>



                          
                        
                      </ul>
                  </li>

               
                  <li class="<?php if($this->uri->segment(2)=="payment_history"){echo "active";}?>"> <a href="<?php echo base_url('client/payment_history')?>"><i class="fa fa-money"></i> <span>Payment History</span> <span class="label label-important"></span></a>
                   </li>

                  
                    <!--   <li class="<?php// if($this->uri->segment(2)=="add_previous" OR $this->uri->segment(2)=="add_previous_process"){echo "active";}?>"> <a href="<?php //echo base_url('admin/add_previous')?>"><i class="fa fa-plus"></i> <span>Add Previous Papers</span> <span class="label label-important"></span></a>
                    </li>

                     <li class="<?php //if($this->uri->segment(2)=="add_sample" OR $this->uri->segment(2)=="add_sample_process"){echo "active";}?>"> <a href="<?php//echo base_url('admin/add_sample')?>"><i class="fa fa-plus"></i> <span>Add Samples</span> <span class="label label-important"></span></a>
                    </li> -->

                  <li class="treeview <?php if($this->uri->segment(2)=="message_index" or $this->uri->segment(2)=="inbox" or $this->uri->segment(2)=="registration_fees" ){echo "active menu-open";}?>">
                      <a href="#"><i class="fa fa-envelope"></i> <span>Messages</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
                        <ul class="treeview-menu">
                          <li class="<?php if($this->uri->segment(2)=="message_index"){echo "active";}?>"> <a href="<?php echo base_url('client/message_index'); ?>"><i class="fa fa-plus"></i> <span>Send Message (support)</span> <span class="label label-important"></span></a></li>
                          <li class="<?php if($this->uri->segment(2)=="inbox"){echo "active";}?>"> <a href="<?php echo base_url('client/inbox'); ?>"><i class="fa fa-envelope"></i> <span>Inbox</span><span class="pull-right-container">
				              <span class="label label-warning pull-right"><?php if(isset($message_count)){ echo $message_count;  } else { echo "0"; }?></span>
				            </span></a></li>
                          
                        
                      </ul>
                  </li>




             
                 
              
                    
                </ul>
                <!-- /.sidebar-menu -->
            </section>
            <!-- /.sidebar -->
        </aside>