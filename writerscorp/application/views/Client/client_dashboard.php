<?php include 'client_header.php' ?>

<div class="page-intro">

				<div class="container">

					<div class="row">

						<div class="col-md-12">

							<ol class="breadcrumb">

								<li>Welcome <?php if(isset($cust_name) ){ echo $cust_name; } ?></li>

								

							</ol>

						</div>

					</div>

				</div>

			</div>

			<div class="container" style="margin-top: 20px;min-height: 450px;" >

					<div class="row">

						<div class="col-md-10 col-md-offset-1">

			     <div class="table-responsive">

                   <table class="table table-striped" style="font-size: 12px;">

								<thead>

									<tr>

										<th>ORDER ID</th>

							             <th>TOPIC</th>

							            <th>AMOUNT($) PAID</th>

							           

							            <th>LEVEL</th>

							            <th>DISCIPLINE</th>

							             <th>PAPER TYPE</th>

									</tr>

								</thead>

								<tbody>

									 <?php  

									  

								       foreach ($check->result() as $row)  

								        {  

								    ?>

								       <tr>

							            <td><?php echo $row->order_id;?></td>

							          

							            <td><?php echo $row->order_topic;?></td>

							            <td><?php echo $row->order_payeramount;?></td>

							           

							             

							             <td><?php echo $row->level_name;?></td>

							             <td><?php echo $row->discipline_name;?></td>

							             <td><?php echo $row->essaytype_name;?></td>

							        

							        

							        </tr>

							         <?php }  

                                      ?>  

								</tbody>

							</table>

						  </div>

						

					</div>

				</div>

			</div>



<?php include 'client_footer.php'

 ?>