<?php
defined('BASEPATH') OR exit('No direct script access allowed');


	function json_output($response,$error)
	{
		$ci =& get_instance();
		$ci->output->set_content_type('application/json');
		// $ci->output->set_status_header($statusHeader);
		$ci->output->set_output(json_encode(array("data"=>$response,"error_status"=>$error)));
	}
	function json_err($error)
	{
		$ci =& get_instance();
		$ci->output->set_content_type('application/json');
		// $ci->output->set_status_header($statusHeader);
		$ci->output->set_output(json_encode(array("error_status"=>$error)));
	}
	function json_trans_output($response)
	{
		$ci =& get_instance();
		$ci->output->set_content_type('application/json');
		// $ci->output->set_status_header($statusHeader);
		$ci->output->set_output(json_encode(array("transactions"=>$response)));
	}

	function json_login_output($response)
	{
		$ci =& get_instance();
		$ci->output->set_content_type('application/json');
		// $ci->output->set_status_header($statusHeader);
		$ci->output->set_output(json_encode(array("login"=>$response)));
	}
	function cleanphone($str){
		if (substr($str, 0, 1) == '0' ) { // check if the number starts with 07.....
			$str_ = substr($str,1 );
	    	$new_str = '254'.$str_;
		}elseif (substr($str, 0, 1) == '+') { // check if it has +254
			$str_ = substr($str,1);
	    	$new_str = $str_;
		} else{
			$new_str = $str;
		}
		return $new_str;
	}