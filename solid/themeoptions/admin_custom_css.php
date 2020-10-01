<?php

// Generated e107 Plugin Admin Area
 
define('e_ADMIN_AREA', true);
  
require_once('../../../class2.php');
if (!getperms('P')) 
{
	e107::redirect('admin');
	exit;
}

$sitetheme = e107::getPref('sitetheme');

e107::themeLan('admin',$sitetheme, true);
 
e107::js('footer', e_THEME.$sitetheme.'/themeoptions/js/codemirror/lib/codemirror.js', 'jquery');
e107::css('url', e_THEME.$sitetheme.'/themeoptions/js/codemirror/lib/codemirror.css' );
e107::js('footer', e_THEME.$sitetheme.'/themeoptions/js/codemirror/mode/javascript/javascript.js', 'jquery');
e107::js('footer', e_THEME.$sitetheme.'/themeoptions/js/codemirror/mode/css/css.js', 'jquery');
e107::css('url', e_THEME.$sitetheme.'/themeoptions/js/codemirror/theme/xq-light.css' );
 


e107::js('footer', e_THEME.$sitetheme.'/themeoptions/js/codemirror/addon/hint/show-hint.js', 'jquery');
e107::js('footer', e_THEME.$sitetheme.'/themeoptions/js/codemirror/addon/hint/css-hint.js', 'jquery');

e107::js('footer', e_THEME.$sitetheme.'/themeoptions/js/codemirror/addon/lint/css-lint.js', 'jquery');
e107::css('url', e_THEME.$sitetheme.'/themeoptions/js/codemirror/addon/lint/lint.css' );
 
e107::js('footer', e_THEME.$sitetheme.'/themeoptions/js/codemirror/addon/edit/matchbrackets.js', 'jquery'); 

// mode: "text/html", edit/matchtags.js
$inline_code = ' 
    const codemirrorEditor = CodeMirror.fromTextArea(document.getElementById("custom-css"), {
	lineNumbers: true,
	mode: "text/css",
	theme: "xq-light",
	gutters: ["CodeMirror-lint-markers"],
	lint: false,
	indentUnit: 4,
	matchBrackets: true,
	autoCloseBrackets: true,
	csslint: {"errors":true,"box-model":true,"display-property-grouping":true,"duplicate-properties":true,"known-properties":true,"outline-none":true}
  }); ';

e107::js('footer-inline', $inline_code); 
 
$inline_css = '
    textarea, pre {
	box-shadow: none!important;
	transition: none!important;
 
}';

e107::css('inline', $inline_css); 
 
//it is done this way because multiple prefs action 
require_once("admin_leftmenu.php"); 

class themeoptions_adminArea extends leftmenu_adminArea
{ 
      function init()       {
       $this->defaultMode = 'custom_css';   
      } 
}

class themeoptions_ui extends e_admin_ui
{
	 
	protected $pluginName = NULL;
	protected $listOrder = ' DESC';
	protected $fields = NULL;
	protected $fieldpref = array();

 
	protected $prefs = array (
		'custom_css' => array('title' => "<b>" . LAN_JM_THEMEOPTIONS_LAN_03 . '</b><br /><small>' . LAN_JM_THEMEOPTIONS_LAN_04 . '</small>',
			'tab' => 0,
			'type' => 'textarea',
			'data' => 'str',
			'help' => '',
			'writeParms' => array('size'=>'block-level')
		),
	);

	public function init()
	{
 
	}
 
	public function beforePrefsSave($new_data, $old_data)
	{
	    $pref = e107::getThemeConfig();
        $theme_pref = $new_data;
        $pref->setPref($theme_pref)->save(true,true,false);
        unset($new_data);
		return $new_data;
	} 
}

class themeoptions_form_ui extends e_admin_form_ui
{
 
}

require_once "admin_leftmenu.php";

new themeoptions_adminArea();

require_once e_ADMIN . "auth.php";
e107::getAdminUI()->runPage();
require_once(e_ADMIN."footer.php");
exit; 

