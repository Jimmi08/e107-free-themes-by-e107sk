<?php

if (!defined('e107_INIT')) { exit; }

// Dummy Theme Configuration File.
class theme_config implements e_theme_config
{
	var $help_links = array();

	function __construct()
	{
		$this->help_links = 
		array( 
			'support'		=> array('url' => 'https://www.e107sk.com/forum/themes-in-active-mode/', 
							'label' => LAN_JM_ADMIN_HELP_02,
							'name' => LAN_JM_ADMIN_HELP_03),
			'documentation'	=> array('url' => 'https://www.e107sk.com/documentation/e107-bootstrap4-free-theme/?cat.201', 
							'label' => LAN_JM_ADMIN_HELP_04,
							'name' => LAN_JM_ADMIN_HELP_05),
			'demo'	=> array('url' => 'https://www.e107sk.com/bootstrap/freelancer/', 
							'label' => LAN_JM_ADMIN_HELP_06,
							'name' => LAN_JM_ADMIN_HELP_07),
			'github'	=> array('url' => 'https://github.com/Jimmi08/e107-free-themes-by-e107sk/tree/master/freelancer', 
							'label' => LAN_JM_ADMIN_HELP_08,
							'name' => LAN_JM_ADMIN_HELP_09),
			'download'	=> array('url' => 'https://www.e107sk.com/download/40/e107-bootstrap-4-freelancer-theme', 
							'label' => LAN_JM_ADMIN_HELP_10,
							'name' => LAN_JM_ADMIN_HELP_11),														
		);			 

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
		$content .= '<h2 class="text-center">' . LAN_JM_ADMIN_HELP_01 . '</h2>';
		foreach($this->help_links AS $helplink) {
			if($helplink['url'] != '') {
				$content .= '<p class="text-center">' .$helplink['label'] . '</p>';
				$content .= '<p class="text-center">';
				$content .= '<a href="' .$helplink['url'] . '" target="_blank">' .$helplink['name'] . '</a>';
				$content .= '</p>';
			}
		}
     return $content;   
      
	}
	
	function process()
	{
	 	return '';
	}
}

?>