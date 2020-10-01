<?php
if (!defined('e107_INIT')) { exit; }

require_once("../../../class2.php");
 
 
class leftmenu_adminArea extends e_admin_dispatcher
{
 
	protected $modes = array( 	

		'custom_css'	=> array(
			'controller' 	=> 'themeoptions_ui',
			'path' 			=> null,
			'ui' 			=> 'themeoptions_form_ui',
			'uipath' 		=> null
		),
		'main'	=> array(
			'controller' 	=> 'adminconfig_ui',
			'path' 			=> null,
			'ui' 			=> 'adminconfig_form_ui',
			'uipath' 		=> null
		)			
 
	);
  	protected $adminMenu = array(
    /*	'main/prefs'			=> array('caption'=> LAN_PREFS, 'perm' => '0', 'url'=>'admin_config.php'),       */
    	'custom_css/prefs'	    => array('caption'=> LAN_JM_THEMEOPTIONS_LAN_02, 'perm' => '0', 'url'=>'admin_custom_css.php'),
    );
    
    protected $adminMenuAliases = array( 			
	);	
	
	protected $menuTitle = LAN_JM_THEME_OPTIONS;
    
     
}