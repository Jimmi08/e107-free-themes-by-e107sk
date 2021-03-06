<?php
/*
* e107 website system
*
* Copyright (C) 2008-2013 e107 Inc (e107.org)
* Released under the terms and conditions of the
* GNU General Public License (http://www.gnu.org/licenses/gpl.txt)
*
* e107 Solid theme
*
* #######################################
* #     e107 website system theme       #
* #     by Jimako                    	 #
* #     https://www.e107sk.com          #
* #######################################
*/

if (!defined('e107_INIT'))
{
	exit;}

class theme implements e_theme_render
{
	public function __construct()
	{

		////// Your own css fixes ////////////////////////////////////////////////////
		define("CORE_CSS", false);
		e107::css('theme', 'e107.css');

		////// Multilanguages/ /////////////////////////////////////////////////////////
		e107::lan('theme');

		////// Theme meta tags /////////////////////////////////////////////////////////
		e107::meta('viewport', 'width=device-width, initial-scale=1.0');
        
        ////////////////////////////////////////////////////////////////////////////////
		e107::css('theme', 'assets/css/style.css');

		e107::js('url', 'https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js', '', '2', '<!--[if lt IE 9]>', '');
		e107::js('url', 'https://oss.maxcdn.com/respond/1.4.2/respond.min.js', '', '2', '', '<![endif]-->');
		e107::js('theme', 'assets/js/modernizr.js');

		e107::js("theme", "assets/js/jquery.hoverdir.js");
		e107::js("theme", "assets/js/jquery.hoverex.min.js");

		if (THEME_LAYOUT == 'homepage')
		{
			e107::js("theme", "assets/js/jquery.isotope.min.js");
			e107::js("theme", "assets/js/jquery.prettyPhoto.js");
			e107::js("theme", "assets/js/custom.js");
			e107::js("theme", "assets/js/portfolio-home.js");
		}
		if (THEME_LAYOUT == 'solid_project')
		{
			e107::js("theme", "assets/js/jquery.isotope.min.js");
			e107::js("theme", "assets/js/jquery.prettyPhoto.js");
			e107::js("theme", "assets/js/custom.js");
			e107::js("theme", "assets/js/portfolio-home.js");
		}

		if (THEME_LAYOUT == 'portfolio')
		{
			e107::js("theme", "assets/js/imagesloaded.pkgd.min.js");
			e107::js("theme", "assets/js/isotope.pkgd.min.js");
			e107::js("theme", "assets/js/jquery.prettyPhoto.js");
			e107::js("theme", "assets/js/custom.js");
			e107::js("theme", "assets/js/portfolio-page.js");
		}

		$this->getInlineCodes();

        //login page settings		
		if (e_PAGE == "login.php")
		{
			$login_iframe 	 = e107::pref('theme', 'login_iframe', false);
			$loginbox_width  = e107::pref('theme', 'loginbox_width', false);
			$loginform_width = e107::pref('theme', 'loginform_width', $loginbox_width);

			if($login_iframe) {
				define('e_IFRAME', '0');
			}
			if($loginbox_width) {
				$inlinecss = " #login-template { min-width:".$loginbox_width."   } ";
				e107::css("inline", $inlinecss);
			}
			 
			if($loginform_width) {
				$inlinecss = " #login-page { width:".$loginform_width."   } ";
				e107::css("inline", $inlinecss);
			}

		}
		//forgotten password
		if (e_PAGE == "fpw.php")
		{   
			$fpw_iframe 	 = e107::pref('theme', 'fpw_iframe', true);

			if($fpw_iframe) {
				//define('e_IFRAME', '0');
			}
			else {
				define('e_IFRAME', '1');
			}
			
		}

	}

	public function getInlineCodes()
	{
		$inlinecss = e107::pref('theme', 'custom_css', FALSE);
		if ($inlinecss)
		{
			e107::css("inline", $inlinecss);
		}
		$inlinejs = e107::pref('theme', 'inlinejs');
		if ($inlinejs)
		{
			e107::js("footer-inline", $inlinejs);
		}
	}

	/**
	 * @param string $caption
	 * @example  []Heading 1
	 * @example  [Heading2]
	 * @return empty string if correct syntax is used
	 */
	public function checkcaption($caption)
	{
		// get rid of any leading and trailing spaces
		$title = trim($caption);
		// check the first and last character, if [ and ] set the title to empty  - this always doesn't work because admin stuff in captions
		if ($title[0] == '[' && $title[strlen($title) - 1] == ']')
		{
			$title = '';
		}

		// so just put [] at the beginning of menu title
		if ($title[0] == '[' && $title[1] == ']')
		{
			$title = '';
		}

		return $title;
	}

	/**
	 * @param string $text
	 * @return string without p tags added always with bbcodes
	 * note: this solves W3C validation issue and CSS style problems
	 * use this carefully, mainly for custom menus, let decision on theme developers
	 */

	public function remove_ptags($text = '') // FIXME this is a bug in e107 if this is required.
	{

		$text = str_replace(array("<!-- bbcode-html-start --><p>", "</p><!-- bbcode-html-end -->"), "", $text);

		return $text;
	}

	/**
	 * @param string $caption
	 * @param string $text
	 * @param string $id : id of the current render
	 * @param array $info : current style and other menu data.
	 */
	public function tablestyle($caption, $text, $id = '', $info = array())
	{
		$style = $info['setStyle'];

		if(e_DEBUG || e_DEVELOPER )  {
			echo "<!-- tablestyle: style=".$style." id=".$id." -->\n\n";
		}

		//login page caption fix
		if (e_PAGE == "login.php")
		{
			$login_hide_sitename = e107::pref('theme', 'login_hide_sitename', false);
			if ($login_hide_sitename)
			{
				$caption = '';
			}
		}

		$type = $style;
		if (empty($caption))
		{
			$type = 'box';
		}

        //use only $style for tablerender
		switch ($id)
		{
			case "wm":  // Example - If rendered from 'welcome message' 
				$style = "wm";
				$class = " class=tablestyle-".$id;
				break;				
			case "login_page":
			case "coppa":
			case "signup":
			case "fpw":
				$style = "singleform";
				$class = " class=tablestyle-".$id;
				break;
		}
        
		if ($style == 'wm') // Example - If rendered from 'welcome message'
		{
			echo '<div class="col-lg-8 col-lg-offset-2">';
			if (!empty($caption))
			{
				echo '<h3>' . $caption . '</h3>';}
			echo '	' . $text . '</div>';
			return;
		}
 
 		if(e_DEBUG || e_DEVELOPER )  {      //after switch
			echo "<!-- tablestyle: style=".$style." id=".$id." -->\n\n";
		}
        
		switch ($style)
		{
		case "singleform":
			echo "<div style='display:table; height:100%; margin: 0 auto;'".$class .">
			<div style='display:table-cell; vertical-align:middle;'>";

			if (!empty($caption))
				{
				echo '<h1 class="display-5 singleform-heading">' . $caption . '</h1>';
			}
			echo '<div class="singleform-body"><div class="wrapper">' . $text . '</div></div>';
			echo '</div></div>';
			return;
		}

		if ($style == 'none')
		{
			echo $text;
			return;
		}

		if ($style == 'footer-menu')
		{
			echo '<h4>' . $caption . '</h4>
			 <div class="hline-w"></div>
		   <p>' . $text . '</p>';
			return;
		}
		if ($style == 'middlemenu')
		{
			echo '<h4>' . $caption . '</h4>
			 <div class="hline"></div>
		   <p>' . $text . '</p>';
			return;
		}
		if ($style == 'portfolio')
		{
			echo '<h3>' . $caption . '</h3>' . $text;
			return;
		}

		if ($style == 'col-md-4' || $style == 'col-md-6' || $style == 'col-md-8')
		{
			echo ' <div class="col-xs-12 ' . $style . '">';

			if (!empty($caption))
			{
				echo '<h2>' . $caption . '</h2>';
			}

			echo '
			  ' . $text . '
			</div>';
			return;

		}

		if ($style == 'menu')
		{
			echo '<h4>' . $caption . '</h4>
					 <div class="hline"></div>
						 <p>
						 ' . $text . '
						 </p>

					 <div class="spacing"></div>';
			return;
		}

		if ($style == 'services')
		{
			echo ' <div class="col-md-4">' . $text . '</div>';
			return;
		}

		// formatting caption is done in template
		if ($style == 'caption')
		{
			if (!empty($caption))
			{
				echo $caption;
			}
			echo $text;
			return;

		}

		// default.

		if (!empty($caption))
		{
			echo '<h4>' . $caption . '</h4>';
		}

		echo $text;

		return;
	}

}
 