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
	function __construct()
	{
		
	}
 
 
  /* {CAROUSEL} */
  function sc_carousel() {
	
		$ret = "";
		
		$ret .= "
		    <div id='carousel'>
		      <a class='buttons prev' href='#'>&nbsp;</a>
		        <div class='viewport'>
		          <ul class='overview'>
		            <li><img src='".THEME_ABS."images/carousel/img1.jpg' alt='' /></li>
		            <li><img src='".THEME_ABS."images/carousel/img2.jpg' alt='' /></li>
		            <li><img src='".THEME_ABS."images/carousel/img3.jpg' alt='' /></li>
		            <li><img src='".THEME_ABS."images/carousel/img4.jpg' alt='' /></li>
		            <li><img src='".THEME_ABS."images/carousel/img5.jpg' alt='' /></li>
		            <li><img src='".THEME_ABS."images/carousel/img6.jpg' alt='' /></li>
		            <li><img src='".THEME_ABS."images/carousel/img7.jpg' alt='' /></li>
		            <li><img src='".THEME_ABS."images/carousel/img8.jpg' alt='' /></li>
		          </ul>
		        </div>
		      <a class='buttons next' href='#'>&nbsp;</a>
		    </div>";
		  
		return $ret;
	}
}





?>
