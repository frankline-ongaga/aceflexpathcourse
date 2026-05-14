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
             if(isset($sucess))
             {
             	?>
             	<div class="alert alert-success" style="text-align: center;">
             	<?php 
             	  echo  $sucess;
             	 ?>
             	 </div>
             <?php
             }
              if(isset($fail))
             {
             	?>
             	<div class="alert alert-warning" style="text-align: center;">
             	<?php 
             	  echo  $fail;
             	 ?>
             	 </div>
             <?php
               }

               foreach ($profile->result() as $row)  
								        {  
								    ?>
						<div class="panel panel-info" style="background-color:#fafafa">
				            <div class="panel-heading" style="background-color: teal; color: white;">
				              <h3 class="panel-title" >Change Password</h3>
				            </div>
				            <div class="panel-body">
				              <div class="row">
				   
          
									  
								<form class="form-horizontal" role="form" id="passwordform" method="post" action="<?php echo base_url('Client/change_password_process'); ?>">
											         <div class="form-group">
								                      <label for="inputEmail3" class="col-sm-4 control-label">Current Password</label>
								                      <div class="col-sm-7">
								                        <input type="Password" name="current_password" class="form-control" id="current_password" placeholder="Current Password" required>
								                      </div>
								                    </div>
								                     <div class="form-group">
								                      <label for="inputEmail3" class="col-sm-4 control-label">New Password</label>
								                      <div class="col-sm-7">
								                        <input type="Password"  name="new_password" class="form-control" id="new_password" placeholder="New Password">
								                      </div>
								                    </div>
								                     <div class="form-group">
								                      <label for="inputEmail3" class="col-sm-4 control-label">Confirm  Password</label>
								                      <div class="col-sm-7">
								                        <input type="Password" name="confirm_password" class="form-control" id="confirm_password" placeholder="Confirm New Password">
								                      </div>
								                    </div>
								                   
								                   <input type="hidden" name="cust_id" value="<?php echo $row->cust_id; ?>">
								                   
								                    <div class="form-group">
								                      <div class="col-sm-offset-4 col-sm-8">
								                        <button type="submit" class="btn btn-default">Change Password</button>
								                      </div>
								                    </div>
                                               </form>

                                           <?php
                                             }
                                           ?>
                                       </div>
			</div>
		</div>
				</div>
			</div>
		</div>
	   </div>


<style type="text/css">
	.help-block{
		color:red;
	}
</style>


                       
							</div>
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


<?php include 'client_footer.php' ?>
 
 