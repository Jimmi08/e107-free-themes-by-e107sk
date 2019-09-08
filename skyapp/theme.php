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
 
class skyapp_theme
{
   
   
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
            echo   '<p class="lead">'.$this->remove_ptags($text)."</p>" ; 
    return;
  	}  
 
  	if($style == 'none')
  	{          
  		echo  $this->remove_ptags($text) ;
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
    
    
}

 
$NEWSCAT = "\n\n\n\n<!-- News Category -->\n\n\n\n
	<div style='padding:2px;padding-bottom:12px'>
	<div class='newscat_caption'>
	{NEWSCATEGORY}
	</div>
	<div style='width:100%;text-align:left'>
	{NEWSCAT_ITEM}
	</div>
	</div>
";


$NEWSCAT_ITEM = "\n\n\n\n<!-- News Category Item -->\n\n\n\n
		<div style='width:100%;display:block'>
		<table style='width:100%'>
		<tr><td style='width:2px;vertical-align:middle'>&#8226;&nbsp;</td>
		<td style='text-align:left;height:10px'>
		{NEWSTITLELINK}
		</td></tr></table></div>
";

?>                                  