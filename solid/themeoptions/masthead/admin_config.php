<?php
/*
 * e107 website system
 *
 * Copyright (C) 2008-2017 e107 Inc (e107.org)
 * Released under the terms and conditions of the
 * GNU General Public License (http://www.gnu.org/licenses/gpl.txt)
 *
 *
 * #######################################
 * #     e107 masthead plugin    		 #
 * #     by Jimako                       #
 * #     https://www.e107sk.com          #
 * #######################################
 */
define('e_ADMIN_AREA', true);

require_once "../../../../class2.php";


if (!getperms("P"))
{
    e107::redirect('admin');
    exit;
}

 
class masthead_admin extends e_admin_dispatcher
{
    protected $modes = array(
        'main' => array(
            'controller' => 'masthead_ui',
            'path' => null,
            'ui' => 'masthead_form_ui',
            'uipath' => null,
        ),
    );
    protected $adminMenu = array(
        'main/list' 	=> array('caption' => LAN_MANAGE, 'perm' => 'P'),
        'main/create'	=> array('caption' => LAN_CREATE, 'perm' => 'P'),
		'main/prefs'    => array('caption'=> LAN_PREFS, 'perm' => 'P'),
		'main/demo'     => array('caption'=> "Import Demo", 'perm' => 'P'),
        'main/main'	    => array('caption'=> 'Back to Theme Manager', 'perm' => '0', 
		'url' => e_ADMIN.'theme.php', 'action' => 'edit'),
    );
    protected $adminMenuAliases = array(
        'main/edit' => 'main/list',
    );
    protected $menuTitle = 'Master Header ';

}

class masthead_ui extends e_admin_ui
{
    protected $pluginTitle = 'Master Header ';
    protected $pluginName = 'masthead';
    protected $table = 'masthead';
    protected $pid = 'element_id';
    protected $perPage = 10;
    protected $batchDelete = true;
    protected $batchCopy = true;
    protected $batchExport = true;
    protected $tabs = array('Settings', 'Headings', 'Buttons', 'Images');  
    protected $listOrder = 'element_id DESC';

    protected $fields = array(
        'checkboxes' => array('title' => '', 'type' => null, 'data' => null, 'width' => '5%', 'thclass' => 'center', 'forced' => '1', 'class' => 'center', 'toggle' => 'e-multiselect'),
        'element_id' => array('title' => LAN_ID, 'data' => 'int',  'forced'=> TRUE, 'readonly'=>TRUE),
        'element_preview' => array(
            'title' => LAN_PREVIEW,
            'type' => 'image',
            'data' => 'str',
            'width' => '110px',
            'filter' => false,
            'inline' => false,
            'validate' => false,
            'help' => '',
            'readParms' => 'thumb=200&thumb_urlraw=0&thumb_aw=200',
            'writeParms' => array(),
            'class' => 'left',
            'thclass' => 'left',
        ),
        'element_mode' => array(
            'title' => 'Unique mode code',
            'type' => 'text',
            'data' => 'str',
            'width' => 'auto',
            'filter' => true,
            'inline' => true,
            'help' => 'Used for mode parameter',
            'readParms' => array(),
            'writeParms' => array('pattern' => '^[a-z0-9]*', 'required' => true),
            'class' => 'left',
            'thclass' => 'left',
        ),
        'element_template' => array(
            'title' => LAN_TEMPLATE,
            'type' => 'dropdown',
            'data' => 'str',
            'width' => 'auto',
            'filter' => true,
            'inline' => true,
            'validate' => false,
            'help' => '',
            'readParms' => array(),
            'writeParms' => array('size' => 'xlarge'),
            'class' => 'left',
            'thclass' => 'left',
        ),

		'element_title' => array('title' => LAN_TITLE, 'type' => 'text', 'data' => 'safestr', 'width' => 'auto', 'inline' => true, 'help' => '', 'readParms' => '', 
			'writeParms' => 'size=xxlarge', 'class' => 'left', 'thclass' => 'left'),
			'element_visibility' => array('title' => LAN_VISIBILITY, 'type' => 'userclass', 'data' => 'int', 'inline' => true, 'batch' => true, 'filter' => true, 'width' => 'auto', 'help' => '', 'readParms' => '', 'writeParms' => '', 'class' => 'left', 'thclass' => 'left'),

        'element_headings' => array('title' => '', 'tab' => 1, 'type' => 'method', 'data' => false,
            'width' => '38%', 'help' => '', 'readParms' => '', 'writeParms' => array("nolabel" => 1),
            'class' => 'left', 'thclass' => 'left'),

        'element_buttons' => array('title' => '', 'tab' => 2, 'type' => 'method', 'data' => false,
            'width' => '38%', 'help' => '', 'readParms' => '', 'writeParms' => array("nolabel" => 1),
            'class' => 'left', 'thclass' => 'left'),

        'element_options' => array('title' => '', 'tab' => 3, 'type' => 'method', 'data' => 'json',
            'width' => '38%', 'help' => '', 'readParms' => '', 'writeParms' => array("nolabel" => 1),
            'class' => 'left', 'thclass' => 'left'),

        'options' => array('title' => LAN_OPTIONS, 'type' => null, 'data' => null, 'width' => '10%', 'thclass' => 'center last', 'class' => 'center last', 'forced' => '1'),
    );

    protected $fieldpref = array('element_id', 'element_preview', 'element_mode', 'element_title', 'element_visibility', 'element_template');

    protected $prefs = array(
		'wm_default' => array('title' => 'Default Set', 'type' => 'dropdown', 'data' => 'str' ),
		'wm_cache'   => array('title' => 'Cache Header?', 'type' => 'boolean', 'data' => 'int', 
		'help'=> 'it writes cache even when disabled in admin prefs' ),
    ); 

    public function init()
    {
		$mes = e107::getMessage();
		
		if(!e107::isInstalled('masthead') ) { 
			$mes->addError("MastHead plugin is not installed. Go to Theme Manager, check Suggested Plugins and install it directly from this theme");
			echo $mes->render();
		}
		if (isset($_POST['importThemeDemo']))
		{
			$sitetheme = e107::getPref('sitetheme');
			$mes = e107::getMessage();

			$xmlArray = array();
			e107::getDebug()->log("Retrieving demo data from xml file");
			$themepath = e_THEME . $sitetheme . "/install/masthead/".$sitetheme.".xml";
			$xmlArray = e107::getSingleton('xmlClass')->loadXMLfile($themepath );
			$ret = e107::getSingleton('xmlClass')->e107Import($xmlArray);
			
			if ($ret['success'])
			{    
				$mes->addSuccess("Imported Default Data for MastHead plugin");
				echo $mes->render();
			}
 
		}


        $templates = e107::getLayouts('masthead', 'masthead', 'front', null, false, false);
		$this->fields['element_template']['writeParms']['optArray'] = $templates;

		$mastheaders = $settings = e107::getDb()->retrieve('masthead', 'element_id, element_mode, element_title', false, true);
		 
		$data[0] = "Not Set";
		foreach($mastheaders AS $mastheader) {
			$code = $mastheader['element_mode'];
			$data[$code] = $mastheader['element_mode'] . ' - ' . $mastheader['element_title'];

		}
 
		$this->prefs['wm_default']['writeParms']['optArray'] = $data;
    }

    public function beforeCreate($new_data, $old_data)
    {
	   
        $new_data['element_options']['fields'] = $new_data['element_headings']['fields'] + $new_data['element_buttons']['fields'] + $new_data['element_options']['fields'];
		return $new_data;
    }

    public function afterCreate($new_data, $old_data, $id)
    {
        // do something
    }

    public function beforeUpdate($new_data, $old_data, $id)
    {

        $new_data['element_options']['fields'] = $new_data['element_headings']['fields'] + $new_data['element_buttons']['fields'] + $new_data['element_options']['fields'];
        return $new_data;
    }

    public function afterUpdate($new_data, $old_data, $id)
    {

    }

    public function onCreateError($new_data, $old_data)
    {
        // do something
    }

    public function onUpdateError($new_data, $old_data, $id)
    {
        // do something
    }

    // left-panel help menu area.
    public function renderHelp()
    {
        $caption = LAN_HELP;
        $text = 'This plugin is the free version (part) of the Elements plugin. It was initially intended only to replace the Welcome message, but you can use it for any other element. Just not for repeating items.';

        return array('caption' => $caption, 'text' => $text);

	}
	
	public function demoPage()
	{
		$ns = e107::getRender();
		$text = '';
        $sitetheme = e107::getPref('sitetheme');
        $link = e_THEME . $sitetheme  . "/install/masthead/".$sitetheme.".xml";
        if(file_exists($link)) {   
    		$text = "<div class='panel-body'>
    		         <form method='post' action='" . e_SELF . "?" . e_QUERY . "' id='core-db-import-form'>";
    		$text .= e107::getForm()->admin_button('importThemeDemo', 'Import Demo Headers', 'other');
    		$text .= '</form></div>';
        }
        else {
     		$text = "<div class='panel-body'> There are not demo data</div>";       
        }
		$text .= "<div class='panel-body'>You can manually import demo content from ".$link."</div>";

		$ns->tablerender("",$text);	
		
	}	

}

class masthead_form_ui extends e_admin_form_ui
{

    public function element_options($curVal, $mode)
    {
        $value = array();
        //    $curVal = e107::pref('jmtheme', JM_THEME_PREF_SECTION, false);
        $text = '';

        if (!empty($curVal))
        {
            $value = e107::unserialize($curVal);
        }

        switch ($mode)
        {
        case 'read':  
            $text = "";
            return $text;
            break;

        case 'write': // Edit Page

            $text = $this->getFields('options', $value);
            return $text;
            break;
        }

        return null;
    }

    public function element_headings($curVal, $mode)
    {
        $value = array();
        //    $curVal = e107::pref('jmtheme', JM_THEME_PREF_SECTION, false);
        $text = '';
        $curVal = $this->getController()->getFieldVar('element_options');
        if (!empty($curVal))
        {
            $value = e107::unserialize($curVal);
        }

        switch ($mode)
        {
        case 'read': 
            $text = "";
            return $text;
            break;

        case 'write': // Edit Page

            $text = $this->getFields('headings', $value);
            return $text;
            break;
        }

        return null;
    }

    public function element_buttons($curVal, $mode)
    {
        $value = array();
        //    $curVal = e107::pref('jmtheme', JM_THEME_PREF_SECTION, false);
        $text = '';
        $curVal = $this->getController()->getFieldVar('element_options');
        if (!empty($curVal))
        {
            $value = e107::unserialize($curVal);
        }

        switch ($mode)
        {
        case 'read': // Edit Page
            $text = "";
            return $text;
            break;

        case 'write': // Edit Page

            $text = $this->getFields('buttons', $value);
            return $text;
            break;
        }

        return null;
    }

    public function elements_config($type = '')
    {

        if ($type == 'headings')
        {
            $options = array(
                'fields' => array(
                    'masthead_heading' => array(
                        'title' => 'Main title {MASTHEAD_HEADING}',
                        'type' => 'text',
                        'writeParms' => array('size' => 'xxlarge')),
                    'masthead_subheading' => array(
                        'title' => 'Main Subtitle {MASTHEAD_SUBHEADING}',
                        'type' => 'text',
                        'writeParms' => array('size' => 'xxlarge')),

                    'masthead_subttitle' => array(
                        'title' => 'Subtitle {MASTHEAD_SUBTTITLE}',
                        'type' => 'textarea',
                        'writeParms' => array('size' => 'xxlarge'),
                    ),
                    'masthead_intro' => array(
                        'title' => 'Intro area {MASTHEAD_INTRO}',
                        'type' => 'textarea',
                        'writeParms' => array('size' => 'xxlarge'),
                    ),
                ),
            );
            return $options;
        }
        if ($type == 'buttons')
        {
            $options = array(
                'fields' => array(
                    'button_text' => array(
                        'title' => 'Button text {BUTTON_TEXT}',
                        'type' => 'text',
                        'writeParms' => array('size' => 'xxlarge'),
                    ),
                    'button_link' => array(
                        'title' => 'Button link {BUTTON_LINK}',
                        'type' => 'url',
                        'writeParms' => array('size' => 'xxlarge'),
                    ),
                    'button_text_left' => array(
                        'title' => 'Button text {BUTTON_TEXT_LEFT}',
                        'type' => 'text',
                        'writeParms' => array('size' => 'xxlarge'),
                    ),
                    'button_link_left' => array(
                        'title' => 'Button link {BUTTON_LINK_LEFT}',
                        'type' => 'url',
                        'writeParms' => array('size' => 'xxlarge'),
                    ),
                    'button_text_right' => array(
                        'title' => 'Button text {BUTTON_TEXT_RIGHT}',
                        'type' => 'text',
                        'writeParms' => array('size' => 'xxlarge'),
                    ),
                    'button_link_rigth' => array(
                        'title' => 'Button link {BUTTON_LINK_RIGHT}',
                        'type' => 'url',
                        'writeParms' => array('size' => 'xxlarge'),
                    ),
                ),
            );
            return $options;
        }

        if ($type == 'options')
        {
            $options = array(
                'fields' => array(
                    'image_bg' => array(
                        'title' => 'Background image {IMAGE_BG}',
                        'type' => 'image',
                        'writeParms' => array('size' => 'xxlarge'),
                    ),
                    'image_01' => array(
                        'title' => 'Small image {IMAGE_01}',
                        'type' => 'image',
                        'writeParms' => array('size' => 'xxlarge'),
					),
                    'image_02' => array(
                        'title' => 'Small image {IMAGE_02}',
                        'type' => 'image',
                        'writeParms' => array('size' => 'xxlarge'),
                    ),
                ),
            );

            return $options;
        }
    }

    public function getFields($name = '', $value = array())
    {
        if ($name == '')
        {
            return '';
        }
        $text = "<table class='table table-condensed table-bordered'  style='table-element: fixed;' ><tbody> ";
        //single fields, no repeated items
        $settings = $this->elements_config($name);
        if (!empty($settings['fields']))
        {
            $nameitem = 'element_' . $name . '[fields]';
            foreach ($settings['fields'] as $fieldkey => $field)
            {
                $text .= "<tr><td>" . $field['title'] . ": </td><td>";
                $text .= $this->renderElement($nameitem . '[' . $fieldkey . ']', $value['fields'][$fieldkey], $field);
                $text .= "</td></tr>";
            }
        }
        $text .= "</tbody></table>";
        return $text;
    }
}

new masthead_admin();

require_once e_ADMIN . "auth.php";
e107::getAdminUI()->runPage();
require_once(e_ADMIN."footer.php");
exit;
