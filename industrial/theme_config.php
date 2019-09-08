<?php

if (!defined('e107_INIT')) { exit; }

// Dummy Theme Configuration File.
class theme_config implements e_theme_config
{

	function config()
	{
		// v2.1.4 format.

		$fields = array(
			'sitelogomain'  	 => array('title' => 'Main site logo', 'type'=>'image', 'help'=>''),
			'sitelogosticky'   => array('title' => 'Sticky site logo', 'type'=>'image', 'help'=>''),	
			'sitelogomobile'   => array('title' => 'Mobile site logo', 'type'=>'image', 'help'=>''),		
			'sitelogomfooter'  	 => array('title' => 'Footer Site logo', 'type'=>'image', 'help'=>''),		
 		);

		return $fields;
 
	}

	function help()
	{
	 	return '';
	}
}

?>