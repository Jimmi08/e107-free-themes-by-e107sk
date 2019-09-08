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
 
	
		function sc_sitedisclaimer($copyYear = null)
		{
			$default = "Proudly powered by <a href='http://e107.org'>e107</a> which is released under the terms of the GNU GPL License.";
			$sitedisclaimer = deftrue('SITEDISCLAIMER', $default);

			$copyYear = vartrue($copyYear, '2013');
			$curYear = date('Y');
			$text = '&copy; ' . $copyYear . (($copyYear != $curYear) ? ' - ' . $curYear : '');

			$text .= ' ' . $sitedisclaimer;

			return e107::getParser()->toHtml($text, true, 'SUMMARY');
		}
		
	 function sc_sitesearch() { 
	 
		$text = '
						  <a id="search-menu" href="#"><span id="search-icon" class="ion-ios-search-strong"></span></a>
							<div id="search-form" class="search-form">
								<form role="search" method="get" id="searchformnav" action="'.e_HTTP.'search.php">
									<input type="search" placeholder="'.LAN_SEARCH.'" required id="q" name="q">
									<button type="submit"><span class="ion-ios-search-strong"></span></button>
								</form>				
							</div>';
		return $text;
	}
	
}





?>
