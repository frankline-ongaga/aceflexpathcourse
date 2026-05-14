  <div class="box-style-1  object-non-visible animated object-visible fadeInUpSmall sample-left" data-animation-effect="fadeInUpSmall" data-effect-delay="0">
								  	<legend>Get a Price</legend>

									<form role="form">
										<div class="form-group">
											<label for="exampleInputPassword1">Discipline</label>
											<select class="form-control">
											        <?php

						                                  foreach ($discipline->result_array() as $row)

						 

						                                    { ?>

						                                    <option  value="<?php echo $row['discipline_id']; ?>"><?php echo $row['discipline_name']; ?></option>

						                               <?php } ?>

                                           
												
											</select>
										</div>
										<div class="form-group">
											<label for="exampleInputEmail1">No of Pages</label>
											<input type="number" class="form-control" id="pages" value="1" min="1" onkeyup="get_tols()" onclick="get_tols()">
										</div>
										<div class="form-group">
											<label for="exampleInputPassword1">Academic Level</label>
											<select class="form-control" id="level"  onchange="get_tols()">
											  <?php 

									             foreach ($level->result() as $row) {

									            ?>
												
											   <option value="<?php echo $row->level_id; ?>"> <?php echo $row->level_name; ?></option>
											   <?php } ?>

                                           
												
											</select>
										</div>

										<div class="form-group">
											<label for="exampleInputPassword1">Deadline</label>
											<select class="form-control" id="deadline" onchange="get_tols()">
												<?php 

									             foreach ($deadline->result() as $row) {

									            ?>
												
											   <option value="<?php echo $row->deadline_id; ?>"> <?php echo $row->name; ?></option>
											   <?php } ?>
												
											</select>
										</div>

										<div class="form-group">
											<label for="exampleInputPassword1">Total ($)</label>
											<input type="text" id="total" value="8" class="form-control">
										</div>
										
									   <a style="width:100%;" href="<?php echo base_url() ?>professionalwriting/order_now" class="btn btn-default">
										  Order Now
									   </a>
									</form>
								 </div>