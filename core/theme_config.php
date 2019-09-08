<?php

if (!defined('e107_INIT')) { exit; }

// Dummy Theme Configuration File.
class theme_config implements e_theme_config
{

	function config()
	{
		// v2.1.4 format.

		$fields = array(
			'wmimage'           => array('title' => 'Image for welcome message', 'type'=>'image', 'help'=>''),
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