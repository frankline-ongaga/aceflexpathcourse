  <h5>Rating</h5> 


 <div class="progress">
  <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $rating; ?>"
  aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $rating; ?>%">
    <span class=""><?php if($rating>0){ echo $rating. '% Rating'; } else { echo '0'; } ?> </span>
  </div>
</div> 

<br>
  <h5>Orders</h5>
  <ul class="list-group">
		<li class="list-group-item"><a href="<?php echo base_url('writer/get_all'); ?>">All Orders&nbsp;<span style="color: white;" class="badge badge-info alig"><?php if(isset($all_count)){ echo $all_count;  } else { echo "0"; } ?></span></a></li>
		<li class="list-group-item"><a href="<?php echo base_url('writer/in_progress'); ?>">In Progress&nbsp;<span class="badge badge-primary alig"><?php if(isset($pending_count)){ echo $pending_count;  } else { echo "0"; }?></span></a></li>

       	<li class="list-group-item"><a href="<?php echo base_url('writer/under_review'); ?>">Under Review&nbsp;<span class="badge badge-danger alig"><?php if(isset($review_count)){ echo $review_count;  } else { echo "0"; } ?></span></a></li>
       	<li class="list-group-item"><a href="<?php echo base_url('writer/get_revision'); ?>">Revision&nbsp;<span class="badge badge-warning alig"><?php if(isset($revision_count)){ echo $revision_count;  } else { echo "0"; }?></span></a></li>

		<li class="list-group-item"><a href="<?php echo base_url('writer/get_completed'); ?>">Completed&nbsp;<span class="badge badge-success alig"><?php if(isset($completed_count)){ echo $completed_count;  } else { echo "0"; } ?></span></a></li>
		
		
	
   </ul>
   
     <br>
     <h5>Messaging</h5>

    <ul class="list-group">
		<li class="list-group-item"><a href="<?php echo base_url('writer/message_index'); ?>">Send Message (support) &nbsp;<span style="color: white;" class="badge badge-info alig"></span></a></li>

		<li class="list-group-item"><a href="<?php echo base_url('writer/inbox'); ?>">Inbox&nbsp;<span class="badge badge-success alig"><?php if(isset($message_count)){ echo $message_count;  } else { echo "0"; } ?></span></a></li>
		
   </ul>
   <br>
   <h5>Payments</h5>

    <ul class="list-group" style="margin-bottom: 50px;">
		<li class="list-group-item"><a href="<?php echo base_url('writer/request_funds'); ?>">Request Payout&nbsp;</span></a></li>
		<li class="list-group-item"><a href="<?php echo base_url('writer/get_payment_options'); ?>">Add Payment Option&nbsp;</span></a></li>

      
		
		
	
   </ul>