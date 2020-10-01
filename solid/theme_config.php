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
				'name' => LAN_JM_ADMIN_HELP_03),
			'documentation' => array('url' => 'https://www.e107sk.com/e107-themes/e107-free-themes-for-bootstrap-3-e107-solid-theme/?cat.359',
				'label' => LAN_JM_ADMIN_HELP_04,
				'name' => LAN_JM_ADMIN_HELP_05),
			'demo' => array('url' => 'https://www.e107sk.com/bootstrap/solid/',
				'label' => LAN_JM_ADMIN_HELP_06,
				'name' => LAN_JM_ADMIN_HELP_07),
			'github' => array('url' => 'https://github.com/Jimmi08/e107-free-themes-by-e107sk/tree/master/solid',
				'label' => LAN_JM_ADMIN_HELP_08,
				'name' => LAN_JM_ADMIN_HELP_09),
			'download' => array('url' => '',
				'label' => LAN_JM_ADMIN_HELP_10,
				'name' => LAN_JM_ADMIN_HELP_11),
		);

		$fields = array(
			'teammemberclass' => array('title' => LAN_THEMEPREF_00, 'type' => 'userclass', 'help' => ''),
			'custom_css' => array('title' => LAN_JM_THEMEOPTIONS_LAN_02, 'type' => 'method', 'data' => 'str', 'help' => ''),
			'inlinejs' => array('title' => LAN_THEMEPREF_02, 'type' => 'textarea', 'writeParms' => array('size' => 'block-level'), 'help' => ''),
		);

		return $fields;

	}

	public function help()
	{
		$content = '<h2 class="text-center">' . LAN_JM_ADMIN_HELP_01 . '</h2>';
		foreach ($this->helpLinks AS $helpLink)
		{
			if (!empty($helpLink['url']))
			{
				$content .= '<p class="text-center">' . $helpLink['label'] . '</p>';
				$content .= '<p class="text-center">';
				$content .= '<a href="' . $helpLink['url'] . '" target="_blank">' . $helpLink['name'] . '</a>';
				$content .= '</p>';
			}
		}
		return $content;
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
}
