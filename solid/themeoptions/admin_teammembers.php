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
	   $("h4.caption").html("' . LAN_JM_THEMEOPTIONS_04 . '");
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

		'pref_teammemberclass' => array('title' => "<b>" . LAN_JM_THEMEOPTIONS_04_01 . '</b><br /><small>' . LAN_JM_THEMEOPTIONS_04_01_HELP . '</small>',
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

		$theme_pref['teammemberclass'] = $new_data['teammemberclass'];

		$pref->setPref($theme_pref)->save(true, true, false);

		$new_data['teammemberclass'] = '';
		return false;
	}

}

class themeoptions_form_ui extends e_admin_form_ui
{

	public function pref_teammemberclass($curVal, $mode)
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
			$name = 'teammemberclass';
			$value = $custom_theme_prefs[$name];
			$attributes = array('type' => 'userclass', 'data' => 'int', 'width' => 'auto');
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
