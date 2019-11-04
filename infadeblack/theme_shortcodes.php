<?php
/*
 * e107 website system
 *
 * Copyright (C) 2008-2013 e107 Inc (e107.org)
 * Released under the terms and conditions of the
 * GNU General Public License (http://www.gnu.org/licenses/gpl.txt)
 *
 * e107 Bootstrap Theme Shortcodes. 
 *
*/


class theme_shortcodes extends e_shortcode
{
	var $override = true;
  public $sitetheme = '';
  public $customlayout = array();
  
	function __construct()
	{

    $this->sitetheme = e107::getPref('sitetheme');
		if(e107::isInstalled('jmtheme')) {
		$where = 'layout_theme = "'.$this->sitetheme.'" AND layout_mode = "'.THEME_LAYOUT.'" LIMIT 1 ';
		$this->customlayout = e107::getDb()->retrieve('jmlayout', '*', $where ); 
		}

	}

	function sc_header($parm)
	{
		$header = varset( $this->customlayout['layout_header'] , "header_default");
		$headerpath = THEME.'headers/'.$header.'.html';
		if(file_exists($headerpath)) {
			$text = file_get_contents($headerpath);
    	} 
		$text = e107::getParser()->parseTemplate($text);
		return $text;
  	}		
  
	function sc_footer($parm)
	{
		$footer = varset( $this->customlayout['layout_footer'] , "footer_default");
		$footerpath = THEME.'footers/'.$footer.'.html';

		if(file_exists($footerpath)) {
		$text = file_get_contents($footerpath);     
		} 
		$text = e107::getParser()->parseTemplate($text);
		return $text;
  }		
  
  /* {UL} ul.sc*/
  function sc_ul() {
  
     $text = '{NAVIGATION=main}';
		 $text = e107::getParser()->parseTemplate($text);
		 return $text;
  }
  
  /* {VERTICAL_MENU} */
  function sc_vertical_menu() {
  
     $text = '{NAVIGATION: type=side&layout=side}';
		 $text = e107::getParser()->parseTemplate($text);
     $text = e107::getRender()->tablerender('Menu', $text);
		 return $text;
  }  
  
  /* {DREAMDISCLAIMER} */
  function sc_dreamdisclaimer() {
 
		 $text = defset(DREAMDISCLAIMER,'');
		 return $text;
  }  
  
 
}





?>
