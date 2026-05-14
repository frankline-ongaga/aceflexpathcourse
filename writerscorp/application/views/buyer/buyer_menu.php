            <div class="left-side-menu">

                <div class="slimscroll-menu">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">

                        <ul class="metismenu" id="side-menu">

                            <li class="menu-title">CLIENT ID:#<?php if(isset($user_id)){ echo $user_id;  } ?></li>

                            <li>
                                <a href="<?php echo base_url('client/index')?>">
                                    <i class="fe-airplay"></i>
                                   
                                    <span> Dashboard </span>
                                </a>
                            </li>
                             <li>
                                <a href="<?php echo base_url('client/order'); ?>">
                                    <i class="fas fa-plus"></i>
                                   
                                    <span> Place Order </span>
                                </a>
                            </li>

                         

                         

                         

                            <li class="menu-title mt-2">Orders</li>
                             <li>
                                <a href="<?php echo base_url('client/get_awaiting')?>">
                                    <i class="fas fa-exclamation"></i>
                                    <span class="badge badge-primary badge-pill float-right"><?php if(isset($awaiting_count)){ echo $awaiting_count;  } else { echo "0"; } ?></span>

                                    <span> Awaiting Payments </span>
                                </a>
                            </li>

                             <li>
                                <a href="<?php echo base_url('client/get_pending')?>">
                                    <i class="fas fa-clock"></i>
                                    <span class="badge badge-primary badge-pill float-right"><?php if(isset($pending_count)){ echo $pending_count;  } else { echo "0"; } ?></span>

                                    <span> In Progress </span>
                                </a>
                            </li>

                             <li>
                                <a href="<?php echo base_url('client/get_completed')?>">
                                    <i class="fas fa-check"></i>
                                    <span class="badge badge-primary badge-pill float-right"><?php if(isset($completed_count)){ echo $completed_count;  } else { echo "0"; } ?></span>

                                    <span> Completed </span>
                                </a>
                            </li>
                             <li>
                                <a href="<?php echo base_url('client/get_cancelled')?>">
                                    <i class="fas fa-ban"></i>
                                    <span class="badge badge-primary badge-pill float-right"><?php if(isset($cancel_count)){ echo $cancel_count;  } else { echo "0"; } ?></span>

                                    <span> Cancelled </span>
                                </a>
                            </li>

                            <!--  <li>
                                <a href="<?php// echo base_url('client/get_revision')?>">
                                    <i class="fas fa-undo"></i>
                                     <span class="badge badge-primary badge-pill float-right"><?php //if(isset($revision_count)){ echo $revision_count;  } else { echo "0"; } ?></span>
                                    <span> Revision </span>
                                </a>
                            </li> -->

                           
                           
                            
                          <!--   <li>
                                <a href="<?php // echo base_url('client/get_all')?>">
                                    <i class="fe-calendar"></i>
                                    <span class="badge badge-primary badge-pill float-right"><?php //if(isset($all_count)){ echo $all_count;  } else { echo "0"; } ?></span>
                                    <span> All Orders </span>
                                </a>
                            </li> -->


                             <li>
                                <a href="<?php echo base_url('client/get_technical')?>">
                                    <i class="fas fa-th"></i>
                                    <span class="badge badge-primary badge-pill float-right"><?php if(isset($technical_count)){ echo $technical_count;  } else { echo "0"; } ?></span>
                                    <span> Technical Orders </span>
                                </a>
                            </li>
                           
                           
                           
                             <!-- <li>
                                <a href="<?php // echo base_url('client/to_be_revised')?>">
                                    <i class="fas fa-arrow-right"></i>
                                    <span class="badge badge-primary badge-pill float-right"></span>

                                    <span>Request a revision</span>
                                </a>
                            </li> -->
                            <li class="menu-title mt-2">Payments</li>

                           

                            <li>
                                <a href="<?php echo base_url('client/payment_history')?>">
                                    <i class="fas fa-money-bill"></i>
                                    <span class="badge badge-primary badge-pill float-right"></span>
                                    <span> Payment History </span>
                                </a>
                            </li>

                             <li class="menu-title mt-2">Messages</li>

                           

                            <li>
                                <a href="<?php echo base_url('client/message_index')?>">
                                    <i class="fas fa-edit"></i>
                                    <span class="badge badge-primary badge-pill float-right"></span>
                                    <span> Create Message</span>
                                </a>
                            </li>
                              <li>
                                <a href="<?php echo base_url('client/inbox')?>">
                                    <i class="fas fa-envelope"></i>
                                    <span class="badge badge-primary badge-pill float-right"></span>
                                    <span>Inbox </span>
                                </a>
                            </li>

                             <li class="menu-title mt-2">Affiliate Links</li>

                           

                            <li>
                                <a href="<?php echo base_url('client/my_link')?>">
                                    <i class="fas fa-edit"></i>
                                    <span class="badge badge-primary badge-pill float-right"></span>
                                    <span>My Affiliate Link</span>
                                </a>
                            </li>

                            <li>
                                <a href="<?php echo base_url('client/my_earnings')?>">
                                    <i class="fas fa-edit"></i>
                                    <span class="badge badge-primary badge-pill float-right"></span>
                                    <span>Affiliate Earnings</span>
                                </a>
                            </li>
                              

                        </ul>

                    </div>
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>