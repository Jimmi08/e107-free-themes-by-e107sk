<?php

if (!defined('e107_INIT')) { exit; }

// Dummy Theme Configuration File.
class theme_config implements e_theme_config
{

	function __construct()
	{
		e107::themeLan('admin','freelancer', true);
	}


	function config()
	{
		// v2.1.4 format.

		$fields = array(
		  'headerimage' => array('title' => LAN_THEMEPREF_05, 'type'=>'image', 'help'=>''),
			'inlinecss'  	=> array('title' => LAN_THEMEPREF_01, 'type'=>'textarea', 'writeParms'=>array('size'=>'block-level'),'help'=>''),
			'inlinejs'  	=> array('title' => LAN_THEMEPREF_02, 'type'=>'textarea', 'writeParms'=>array('size'=>'block-level'),'help'=>''),			
  		'cardmenu_look' => array('title' => LAN_THEMEPREF_04, 'type'=>'boolean', 'writeParms'=>array('default'=>1),'help'=>''), 
		);

		return $fields;

	}

	function help()
	{  
     include('e_help.php');
     return $helptext;   
      
	}
	
	function process()
	{
	 	return '';
	}
}

?>