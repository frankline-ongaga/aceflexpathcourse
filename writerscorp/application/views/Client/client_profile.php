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
			<div class="container" style="margin-top: 20px; min-height: 440px;">
					<div class="row">
		
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >

          <?php  
             if(isset($message))
             {
             	?>
             	<div class="alert alert-success" style="text-align: center;">
             	<?php 
             	  echo  $message;
             	 ?>
             	 </div>
             <?php
             }
									  
								       foreach ($profile->result() as $row)  
								        {  
								    ?>
   
          <div class="panel panel-info">
            <div class="panel-heading" style="background-color: teal; color: white;">
              <h3 class="panel-title" ><?php echo $row->cust_name; ?></h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <i class="fa fa-user-circle fa-3x"> </i></div>
                
               
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Country:</td>
                        <td><?php echo $row->cust_country; ?></td>
                      </tr>
                      <tr>
                        <td>Reg. date:</td>
                        <td>
                          <?php  echo date("d-m-Y H:i:s", strtotime($row->cust_dateregistered));?>
                       </td>
                      </tr>
                      <tr>
                        <td>Email</td>
                        <td><?php echo $row->cust_email; ?></td>
                      </tr>
                   
                         <tr>
                             <tr>
                        <td>Phone</td>
                        <td><?php echo $row->cust_phone; ?></td>
                      </tr>

                    
                       
                     
                    </tbody>
                  </table>
                  
                  
                </div>
              </div>
            </div>
                 <div class="panel-footer" style="text-align: center;">
                       
                        <span class="center">
                            <a href="#" data-original-title="Edit this user" data-toggle="modal" type="button" class="btn btn-sm btn-warning"  data-target="#myModal"><i class="glyphicon glyphicon-edit">Edit Profile</i></a>
                             <a href="<?php echo base_url('client/change_password') ?>" data-original-title="Edit this user"  type="button" class="btn btn-sm btn-primary" ><i class="glyphicon glyphicon-edit">Change Password</i></a>
                           
                        </span>




                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
											<h4 class="modal-title" id="myModalLabel">Edit Profile</h4>
										</div>
										<div class="modal-body">
											 <form class="form-horizontal" role="form" method="post" action="<?php echo base_url('Client/edit_profile'); ?>">
											         <div class="form-group">
								                      <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
								                      <div class="col-sm-10">
								                        <input type="text" value="<?php echo $row->cust_name; ?>" name="cust_name" class="form-control" id="inputEmail3" placeholder="Name">
								                      </div>
								                    </div>
								                     <div class="form-group">
								                      <label for="inputEmail3" class="col-sm-2 control-label">Country</label>
								                      <div class="col-sm-10">
								                        <input type="text" value="<?php echo $row->cust_country; ?>" name="cust_country" class="form-control" id="inputEmail3" placeholder="Country">
								                      </div>
								                    </div>
								                     <div class="form-group">
								                      <label for="inputEmail3" class="col-sm-2 control-label">Phone</label>
								                      <div class="col-sm-10">
								                        <input type="text" value="<?php echo $row->cust_phone; ?>" name="cust_phone" class="form-control" id="inputEmail3" placeholder="Phone">
								                      </div>
								                    </div>
								                    <div class="form-group">
								                      <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
								                      <div class="col-sm-10">
								                        <input type="email" value="<?php echo $row->cust_email; ?>" name="cust_email" class="form-control" id="inputEmail3" placeholder="Email">
								                      </div>
								                    </div>
								                   <input type="hidden" name="cust_id" value="<?php echo $row->cust_id; ?>">
								                   
								                    <div class="form-group">
								                      <div class="col-sm-offset-2 col-sm-10">
								                        <button type="submit" class="btn btn-default">Update Profile</button>
								                      </div>
								                    </div>
                                               </form>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-sm btn-dark" data-dismiss="modal">Close</button>
											
										</div>
									</div>
								</div>
							</div>
                    </div>
                      <?php 
                       }
                       ?>
            
				</div>
			</div>
		</div>
	   </div>








<?php include 'client_footer.php' ?>
 <script type="text/javascript">
    //change password script don't get it twisted
   jQuery().ready(function() {

    // validate form on keyup and submit
    
    var v = jQuery("#passwordform").validate({
      rules: {
         new_password: {
            required: true,
            
        },
        confirm_password: {
            required: true,
           
            equalTo: "#new_password"
        }
      },
      
      messages: {
            
            confirm_password: {
                equalTo: "New and confirm passwords must match",
            }
           
        },
      errorElement: "span",
      errorClass: "help-block",
    });

   

   

  });
</script>
 ?>