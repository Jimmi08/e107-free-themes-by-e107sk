<?php

if (!defined('e107_INIT')) { exit; }

e107::lan('theme', 'admin', true);

class theme_config implements e_theme_config
{

	function __construct()
	{
		e107::themeLan('admin','RideBlue2', true);
	}
	
	function config()
	{
		// v2.1.4 format.

		$fields = array(
			'inlinecss'  				=> array('title' => LAN_RB_THEMEPREF_06, 'type'=>'textarea', 'writeParms'=>array('size'=>'block-level'),'help'=>''),
			'inlinejs'   				=> array('title' => LAN_RB_THEMEPREF_07, 'type'=>'textarea', 'writeParms'=>array('size'=>'block-level'),'help'=>''),			
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