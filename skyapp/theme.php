<?php

/**
 * e107 website system
 *
 * Copyright (C) 2008-2017 e107 Inc (e107.org)
 * Released under the terms and conditions of the
 * GNU General Public License (http://www.gnu.org/licenses/gpl.txt)
 *
 * @file
 * Bootstrap 3 Theme for e107 v2.x.
 */

if(!defined('e107_INIT'))
{
	exit;
}

define("BOOTSTRAP", 3);
define("FONTAWESOME", 4);
define('VIEWPORT', "width=device-width, initial-scale=1.0");

// CDN provider for Bootswatch.
$cndPref = e107::pref('theme', 'cdn', 'cdnjs');
$bootswatch = e107::pref('theme', 'bootswatch', false);

switch($cndPref)
{
	case "jsdelivr":
		if($bootswatch)
		{
			e107::css('url', 'https://cdn.jsdelivr.net/bootswatch/3.3.7/' . $bootswatch . '/bootstrap.min.css');
		}
		break;

	case "cdnjs":
	default:
		if($bootswatch)
		{
			e107::css('url', 'https://cdnjs.cloudflare.com/ajax/libs/bootswatch/3.3.7/' . $bootswatch . '/bootstrap.min.css');
		}
		break;
}

/* @example prefetch  */
//e107::link(array('rel'=>'prefetch', 'href'=>THEME.'images/browsers.png'));


//// HTML assests //////////////////////////////////////////////////////////////

e107::css('url', 	'https://fonts.googleapis.com/css?family=Montserrat:400,700,200|Open+Sans+Condensed:700');
//e107::css('url', 	'');
 
e107::css('theme', 	'css/main.css');
 
//e107::js("theme", 	'', 'jquery');
//e107::js("theme", 	'', 'jquery');  

e107::js("footer-inline", 	"$('.e-tip').tooltip({container: 'body'});"); // activate bootstrap tooltips.

// Legacy Stuff.
define('OTHERNEWS_COLS',false); // no tables, only divs. 
define('OTHERNEWS_LIMIT', 3); // Limit to 3. 
define('OTHERNEWS2_COLS',false); // no tables, only divs. 
define('OTHERNEWS2_LIMIT', 3); // Limit to 3. 
// define('COMMENTLINK', 	e107::getParser()->toGlyph('fa-comment'));
define('COMMENTOFFSTRING', '');

define('PRE_EXTENDEDSTRING', '<br />');
 
   
		/**
		 * @param string $text
		 * @return string without p tags added always with bbcodes
		 * note: this solves W3C validation issue and CSS style problems
		 * use this carefully, mainly for custom menus, let decision on theme developers
		 */

		function remove_ptags($text = '') // FIXME this is a bug in e107 if this is required.
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
 
  function tablestyle($caption, $text, $id='', $info=array()) 
  {
  //	global $style; // no longer needed. 
  	
  	$style = $info['setStyle'];
  	
  	echo "<!-- tablestyle: style=".$style." id=".$id." -->\n\n";
  	
  	$type = $style;
  	if(empty($caption))
  	{
  		$type = 'box';
  	}
    
    
    if($id=="wm") { $style = "wm"; }
    if($id=="news") {$style = "nocaption"; }
    
    
    
  	if($style == 'wm') // Example - If rendered from 'welcome message' 
  	{
        	if(!empty($caption))
  	        {
  	            echo '<h1>'.$caption.'</h1>';
  	        }
            echo   '<p class="lead">'.remove_ptags($text)."</p>" ; 
    return;
  	}  
 
  	if($style == 'none')
  	{          
  		echo  remove_ptags($text) ;
  		return;
  	}
  	
  	if($style == 'nocaption')
  	{
  		echo $text;
  		return;
  	} 
  	
  	if($style == 'col-md-4' || $style == 'col-md-6' || $style == 'col-md-8')
  	{
  		echo ' <div class="col-xs-12 '.$style.'">';
  		
  		if(!empty($caption))
  		{
              echo '<h2>'.$caption.'</h2>';
  		}
  
  		echo '
            '.$text.'
          </div>';
  		return;	
  		
  	}
  		
  	if($style == 'menu')
  	{
  		echo '<div class="block block-primary-head no-pad">
  	  <h3>'.$caption.'</h3>
  	  <div class="block-content">
  	   '.$text.'
  	  </div></div>';
  		return;
  		
  	}	
 
	if($style == 'footer')
  	{
		if(!empty($caption))
		{
			echo '<h4 class="caption">'.$caption.'</h4>';
		}
	
		echo $text;
  		return;
  		
  	}   
      
  	// default.
   
  	if(!empty($caption))
  	{
  		echo '<h2 class="caption">'.$caption.'</h2>';
  	}
  
  	echo $text;
  
  
  					
  	return;
  	
  	
  	
  }
 
$LAYOUT['_header_'] = '	
<header class="header-main">
		<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		  <div class="container">
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			  </button>
			  <a class="navbar-brand" href="{SITEURL}">{BOOTSTRAP_BRANDING}</a>
			</div>
			<div class="collapse navbar-collapse">
			  <ul class="nav navbar-nav">
        {NAVIGATION: type=main&layout=main}
			  </ul>
			  <ul class="nav navbar-nav navbar-sub pull-right">
        {MEMBER_LOGIN: layout=main}
        {USERBOX: layout=main}
			  </ul>
			</div><!--/.nav-collapse -->
		  </div>
		</div>
	</header>
<!-- Page Content -->';


$LAYOUT['_footer_'] = '
{SETSTYLE=footer} 
	<footer class="footer-main">
		<div class="container">
			<div class="row">
				<div class="col-md-4">   
          {MENU=105}
          <h4>Footer links</h4>
					{NAVIGATION: type=main&layout=footer}
				</div>
				<div class="col-md-4">
					{MENU=106}
				</div>
				<div class="col-md-4">
					{MENU=107}
				</div>
			</div>
		</div>
  <div id="footer-rights">
		<div class="container">
				<small >{SITEDISCLAIMER}</small>
		</div>
	</div>
</footer>';

$LAYOUT['jumbotron_home'] = '{MENU=10}{MENU=11}{MENU=12}{MENU=20}{MENU=21}{MENU=22}{MENU=23}{---}';
$LAYOUT['full'] = '{MENU=5}{MENU=20}{MENU=21}{MENU=22}{MENU=23}{---}';
$LAYOUT['contact'] = '{MENU=20}{MENU=21}{MENU=22}{MENU=23}{---}';
$LAYOUT['blog'] = '{MENU=1}{MENU=5}{MENU=20}{MENU=21}{MENU=22}{MENU=23}{---}';

/* ALL settings for header and footer are in layout options in admin area, 
for new header or footer just add file and it to list of available headers and 
footers in options_XXX.php  file in layouts folder */
  
/*  NOW ARE CORRECT LAYOUTS SETS.  THEY ARE DISPLAYED IN MENU MANAGER TOO */
if(is_dir($path."layouts")) {
   $layouts_folder = "layouts"; 
}
else {
   $layouts_folder = "jmlayouts"; 
}  
 
include($layouts_folder.'/'.THEME_LAYOUT.'_layout.php');

?>                                  