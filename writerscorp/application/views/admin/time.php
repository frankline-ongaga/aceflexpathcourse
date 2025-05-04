<?php




// Declare and define two dates
$date2raw = date($row->order_due);
//$date2 = strtotime($row->order_due);



//get current date

if(!empty($row->order_tz)){

date_default_timezone_set($row->order_tz);

}
else
{

   date_default_timezone_set("America/New_York");

}

$dateraw = date("Y-m-d H:i:s");

//$date1 = strtotime($dateraw);





//echo $dateraw; die();





// Formulate the Difference between two dates

//$diff = abs($date2 - $date1);

// $datetime1 = new DateTime($date2raw);

// $datetime2 = new DateTime( $dateraw);

// $interval = $datetime1->diff($datetime2);

// $days=$interval->format('%d');

// $masaa=$days*24;

// $masaa=$masaa+$interval->format('%h');

// $minutes=$masaa*60;

// $min=$interval->format('%i');

// $minutes=$minutes+$min;





// 	if($minutes>=1440)

// 	{

// 	echo '<span style="color:green">'. $days." Days".'</span>';

// 	}
// 	elseif($minutes>60)
//     {
    
//       echo '<span style="color:green">'. $masaa." Hours".'</span>';

//     }

//     elseif($minutes>0.9)
//     {
    
//       echo '<span style="color:green">'. $minutes." minutes".'</span>';

//     }

// 	else

// 	{

// 	echo '<span style="color:green">'." Few seconds".'</span>';



// 	}




function format_interval(DateInterval $interval) {
    $result = "";
    if ($interval->y) { $result .= $interval->format("%y years "); }
    if ($interval->m) { $result .= $interval->format("%m months "); }
    if ($interval->d) { $result .= $interval->format("%d days "); }
    if ($interval->h) { $result .= $interval->format("%h hours "); }
    if ($interval->i) { $result .= $interval->format("%i minutes "); }
    if ($interval->s) { $result .= $interval->format("%s seconds "); }

    return $result;
}

$first_date = new DateTime($dateraw);
$second_date = new DateTime($date2raw);

$difference = $first_date->diff($second_date);

echo format_interval($difference);








