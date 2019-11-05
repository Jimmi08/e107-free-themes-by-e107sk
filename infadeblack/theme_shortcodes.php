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
