<?php



// Declare and define two dates
$date2raw = date($row->order_due);

$date2 = strtotime($row->order_due);



//get current date

date_default_timezone_set('America/New_York');

$dateraw = date("Y-m-d H:i:s");

$date1 = strtotime($dateraw);





//echo $dateraw; die();





// Formulate the Difference between two dates

//$diff = abs($date2 - $date1);

$datetime1 = new DateTime($date2raw);

$datetime2 = new DateTime( $dateraw);

$interval = $datetime1->diff($datetime2);

$days=$interval->format('%d');

//$masaa=$days*24;

//$masaa=$masaa+$interval->format('%h');

if($dateraw<$row->order_due)
{

	
	echo '<span style="color:green">'. $days." Days".'</span>';



	
}
else
{

		echo '<span style="color:red">'.'-'. $days." Days ".'</span>';


}




