<?php

if (!defined('e107_INIT')) { exit; }

// Dummy Theme Configuration File.
class theme_config implements e_theme_config
{

	function __construct()
	{
		e107::themeLan('admin','solid', true);
	}


	function config()
	{
		// v2.1.4 format.

		$fields = array(
			'teammemberclass'       => array('title' => LAN_LZ_THEMEPREF_00, 'type'=>'userclass', 'help'=>''),
 		);

		return $fields;
 
	}

	function help()
	{
	 	return '';
	}
	
	function process()
	{
	 	return '';
	}
}


?>