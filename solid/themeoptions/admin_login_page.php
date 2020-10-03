<?php

// Generated e107 Plugin Admin Area

define('e_ADMIN_AREA', true);

require_once '../../../class2.php';
if (!getperms('P'))
{
	e107::redirect('admin');
	exit;
}

$sitetheme = e107::getPref('sitetheme');

e107::themeLan('admin', $sitetheme, true);

//it is done this way because multiple prefs action
require_once "admin_leftmenu.php";

class themeoptions_adminArea extends leftmenu_adminArea
{
	public function init()
	{
		$this->defaultMode = 'login_page';
		$this->setAction = "edit";
	}
}

$code = '$(document).ready(function(){
	   $("#etrigger-submit").html("Save Settings");
	   $("h4.caption").html("' . LAN_JM_THEMEOPTIONS_03 . '");
	});';

e107::js('inline', $code);

class themeoptions_ui extends e_admin_ui
{

	protected $pluginName = 'themeoptions';
	protected $listOrder = ' DESC';

	protected $table = NULL;
	protected $fieldpref = array();
	protected $prefs = array();

	protected $fields = array(

		'pref_login_iframe' => array('title' => "<b>" . LAN_JM_THEMEOPTIONS_03_01 . '</b><br /><small>' . LAN_JM_THEMEOPTIONS_03_01_HELP . '</small>',
			'tab' => 0, 'type' => 'method', 'data' => false, 'help' => '', 'writeParms' => array('size' => 'block-level'),
		),
		'pref_hide_logo' => array('title' => "<b>" . LAN_JM_THEMEOPTIONS_03_02 . '</b><br /><small>' . LAN_JM_THEMEOPTIONS_03_02_HELP . '</small>',
			'tab' => 0, 'type' => 'method', 'data' => false, 'help' => '', 'writeParms' => array('size' => 'block-level'),
		),
		'pref_hide_sitename' => array('title' => "<b>" . LAN_JM_THEMEOPTIONS_03_03 . '</b><br /><small>' . LAN_JM_THEMEOPTIONS_03_03_HELP . '</small>',
			'tab' => 0, 'type' => 'method', 'data' => false, 'help' => '', 'writeParms' => array('size' => 'block-level'),
		),
		'pref_loginbox_width' => array('title' => "<b>" . LAN_JM_THEMEOPTIONS_03_04  . '</b><br /><small>' . LAN_JM_THEMEOPTIONS_03_04_HELP . '</small>',
			'tab' => 0, 'type' => 'method', 'data' => false, 'help' => '', 'writeParms' => array('size' => 'block-level'),
		),

	);

	protected $afterSubmitOptions = array('edit');

	public function init()
	{
		$this->setDefaultAction('edit');

	}

	public function beforeCreate($new_data, $old_data)
	{
		$this->beforeUpdate($new_data, $old_data, NULL);
	}

	// ------- Customize Update --------

	public function beforeUpdate($new_data, $old_data, $id)
	{
		$pref = e107::getThemeConfig();
		$theme_pref = array();

		$theme_pref['login_iframe'] = $new_data['login_iframe'];
		$theme_pref['login_hide_logo'] = $new_data['login_hide_logo'];
		$theme_pref['login_hide_sitename'] = $new_data['login_hide_sitename'];
		$theme_pref['loginbox_width'] = $new_data['loginbox_width'];

		$pref->setPref($theme_pref)->save(true, true, false);

		$new_data['login_iframe'] = '';
		return false;
	}

}

class themeoptions_form_ui extends e_admin_form_ui
{

	public function pref_login_iframe($curVal, $mode)
	{

		$custom_theme_prefs = e107::pref('theme');
		$text = '';

		switch ($mode)
		{
		case 'read': // Edit Page
			$text = "Are you cheating?";
			return $text;
			break;

		case 'write': // Edit Page
			$name = 'login_iframe';
			$value = $custom_theme_prefs[$name];
			$attributes = array('type' => 'boolean', 'data' => 'int', 'width' => 'auto');
			$text = $this->renderElement($name, $value, $attributes);
			return $text;
			break;
		}
	}

	public function pref_hide_logo($curVal, $mode)
	{

		$custom_theme_prefs = e107::pref('theme');

		switch ($mode)
		{
		case 'read': // Edit Page
			$text = "Are you cheating?";
			return $text;
			break;

		case 'write': // Edit Page
			$name = 'login_hide_logo';
			$value = $custom_theme_prefs[$name];
			$attributes = array('type' => 'boolean', 'data' => 'int', 'width' => 'auto');
			$text = $this->renderElement($name, $value, $attributes);
			return $text;
			break;
		}
	}

	public function pref_hide_sitename($curVal, $mode)
	{

		$custom_theme_prefs = e107::pref('theme');

		switch ($mode)
		{
		case 'read': // Edit Page
			$text = "Are you cheating?";
			return $text;
			break;

		case 'write': // Edit Page
			$name = 'login_hide_sitename';
			$value = $custom_theme_prefs[$name];
			$attributes = array('type' => 'boolean', 'data' => 'int', 'width' => 'auto');
			$text = $this->renderElement($name, $value, $attributes);
			return $text;
			break;
		}
	}

	public function pref_loginbox_width($curVal, $mode)
	{

		$custom_theme_prefs = e107::pref('theme');

		switch ($mode)
		{
		case 'read': // Edit Page
			$text = "Are you cheating?";
			return $text;
			break;

		case 'write': // Edit Page
			$name = 'loginbox_width';
			$value = $custom_theme_prefs[$name];
			$attributes = array('type' => 'text', 'data' => 'str', 'width' => 'auto');
			$text = $this->renderElement($name, $value, $attributes);
			return $text;
			break;
		}
	}

}

require_once "admin_leftmenu.php";

new themeoptions_adminArea();

require_once e_ADMIN . "auth.php";
e107::getAdminUI()->runPage();
require_once e_ADMIN . "footer.php";
exit;
