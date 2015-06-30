<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');



function is_logged_in()
{
	$CI =& get_instance();
	$is_logged_in = $CI->session->userdata('is_logged_in');
	if(!isset($is_logged_in) || $is_logged_in != true)
	{		
		redirect("index.php/login/not_logged_in");
	}
	else {
		return true;
	}		
}

function is_administrator()
{
	$CI =& get_instance();
	$is_administrator = $CI->session->userdata('access_level');
	if(!isset($is_administrator) || $is_administrator == "0")
	{		
		return false;
	}
	elseif ($is_administrator == "0") {
		return true;
	}		
}