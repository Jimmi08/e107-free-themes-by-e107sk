<?php

if (!defined('e107_INIT'))
{
	exit;
}

// Dummy Theme Configuration File.
class theme_config implements e_theme_config
{
          
	public function config()
	{
		e107::themeLan('admin', 'solid', true);

		$this->helpLinks =
		array(
			'support' => array('url' => 'https://www.e107sk.com/forum/themes-in-active-mode/',
				'label' => LAN_JM_ADMIN_HELP_02,
				'name' => LAN_JM_ADMIN_HELP_03,
				'icon' => '<i class="S32 e-comments-32"></i>'),
			'documentation' => array('url' => 'https://www.e107sk.com/e107-themes/e107-free-themes-for-bootstrap-3-e107-solid-theme/?cat.359',
				'label' => LAN_JM_ADMIN_HELP_04,
				'name' => LAN_JM_ADMIN_HELP_05,
				'icon' => '<i class="S32 e-info-32"></i>'),
			'demo' => array('url' => 'https://www.e107sk.com/bootstrap/solid/',
				'label' => LAN_JM_ADMIN_HELP_06,
				'name' => LAN_JM_ADMIN_HELP_07,
				'icon' => '<i class="S32 e-fileinspector-32"></i>'),

			'github' => array('url' => 'https://github.com/Jimmi08/e107-free-themes-by-e107sk/tree/master/solid',
				'label' => LAN_JM_ADMIN_HELP_08,
				'name' => LAN_JM_ADMIN_HELP_09,
                'icon' => '<i class="fa fa-3x fa-github"></i>'),

			'download' => array('url' => 'https://www.e107sk.com/easystore/e107-solid-theme/',
				'label' => LAN_JM_ADMIN_HELP_10,
				'name' => LAN_JM_ADMIN_HELP_11,
				'icon' => '<i class="S32 e-downloads-32"></i>'),
		);

		$fields = array(
			//'teammemberclass' => array('title' => LAN_THEMEPREF_00, 'type' => 'userclass', 'help' => ''),
			//'custom_css' => array('title' => LAN_JM_THEMEOPTIONS_LAN_02, 'type' => 'method', 'data' => false, 'help' => ''),
			'inlinejs' => array('title' => LAN_THEMEPREF_02, 'type' => 'textarea', 'writeParms' => array('size' => 'block-level'), 'help' => ''),
			//'login_page' => array('title' => LAN_JM_THEMEOPTIONS_LAN_05, 'type' => 'method', 'data' => false, 'help' => ''),
		);

	   //return $fields;
 
	}        

	public function help()
	{
 
        $themeoptions['custom_css'] = e_THEME . e107::getPref('sitetheme') . "/themeoptions/admin_" . "custom_css" . ".php";
        
        $buttons  = e107::getNav()->renderAdminButton($themeoptions['custom_css'], "<b>" . LAN_JM_THEMEOPTIONS_01 . "</b><br>" , LAN_JM_THEMEOPTIONS_01_HELP,  "P" , '<i class="S32 e-themes-32"></i>',  "div");
         
        //$ns->setStyle('flexpanel');
        $mainPanel  = "<div class='panel panel-default' >";
        $mainPanel .= "<div class='panel-body'>";
        $mainPanel .=  $buttons;
        $mainPanel .= "</div> ";
        
        $mainPanel  .= " ";
        $mainPanel .= "<div class='panel-body'>";
               
		//$content = '<h2 class="text-center">' . LAN_JM_ADMIN_HELP_01 . '</h2>';
		foreach ($this->helpLinks AS $helpLink)
		{
			if (!empty($helpLink['url']))
			{
		 
				$mainPanel .= '<p class="text-center">';
				//$content .= '<a href="' . $helpLink['url'] . '" target="_blank">' . $helpLink['name'] . '</a>';
				$mainPanel .=  e107::getNav()->renderAdminButton($helpLink['url'], "<b>" . $helpLink['name'] . "</b><br>" , $helpLink['label'],  "P" , $helpLink['icon'],  "div");

				$mainPanel .= '</p>';
			}
		}
        $mainPanel .= "</div></div>";
                          
		return $mainPanel ;   
	}

	public function process()
	{
		return '';
	}
}

class theme_config_form extends e_form
{

	public function custom_css()
	{

		$themeoptions['custom_css'] = e_THEME . e107::getPref('sitetheme') . "/themeoptions/admin_" . "custom_css" . ".php";

		$text = '<a class="btn btn-primary" href="' . $themeoptions['custom_css'] . '">' . LAN_JM_THEMEOPTIONS_LAN_02 . '</a>';
		 
		return $text;
		 

	}

	public function login_page()
	{

		$themeoptions['login_page'] = e_THEME . e107::getPref('sitetheme') . "/themeoptions/admin_" . "login_page" . ".php";

		$text = '<a class="btn btn-primary" href="' . $themeoptions['login_page'] . '">' . LAN_JM_THEMEOPTIONS_LAN_05 . '</a>';
		 
		return $text;
		

	}
}
                         