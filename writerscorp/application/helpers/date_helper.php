<?php
defined('BASEPATH') OR exit('No direct script access allowed');


	function date_output($date)
	{
		$newDate = date("d-m-Y H:i:s", strtotime($date));

		echo $newDate;
	}
	