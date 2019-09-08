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

 define("BOOTSTRAP", 	3);
define("FONTAWESOME", 	4);
define('VIEWPORT', 		"width=device-width, initial-scale=1.0");
/* example for set specific body class  */

if(THEME_LAYOUT == "contact") {
 define('BODYTAG', '<body id="page" class="body-class '.THEME_LAYOUT.'">');
}

if(THEME_LAYOUT == "about") {
 define('BODYTAG', '<body id="page" class="body-class '.THEME_LAYOUT.'">');
}

if(THEME_LAYOUT == "single") {
 define('BODYTAG', '<body  id="single" class="body-class '.THEME_LAYOUT.'">');
}


//define('BODYTAG', '<body class="body-class '.THEME_LAYOUT.'">');

// load libraries 
 e107::library('load', 'bootstrap');
 e107::library('load', 'fontawesome');
 
e107::css("theme", "css/bootstrap.min.css");
e107::css("theme", "css/ionicons.min.css");
e107::css("theme", "css/pace.css");
e107::css("theme", "css/custom.css");

//e107::js("theme", "js/bootstrap.min.js", 'jquery');
e107::js("theme", "js/pace.min.js", 'jquery');
e107::js("theme", "js/modernizr.custom.js", 'jquery');
e107::js("theme", "js/script.js", 'jquery');
e107::js("theme", "js/script.js", 'jquery');

 
/* example you need this if your login page has header and footer */
// if((strpos(e_REQUEST_URI, 'login') !== false)) {define('e_IFRAME','0');}

//e107::js("footer", 	    'https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js', 'jquery' );
//e107::js("theme", "js/bootstrap.min.js", 'jquery');
//e107::js("theme", "js/jquery.easing.min.js", 'jquery');
//e107::js("theme", "js/wow.js", 'jquery');
//e107::js("theme", "js/scripts.js", 'jquery');

/* example for IE fix
e107::js('url','https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js','','2','<!--[if lt IE 9]>','');
e107::js('url','https://oss.maxcdn.com/respond/1.4.2/respond.min.js','','2','','<![endif]-->');
*/

e107::js("footer-inline", 	"$('.e-tip').tooltip({container: 'body'})"); // activate bootstrap tooltips. 

// load translated strings
e107::lan('theme');

// Legacy Stuff.
define('OTHERNEWS_COLS',false); // no tables, only divs. 
define('OTHERNEWS_LIMIT', 3); // Limit to 3. 
define('OTHERNEWS2_COLS',false); // no tables, only divs. 
define('OTHERNEWS2_LIMIT', 3); // Limit to 3. 
define('COMMENTLINK', 	e107::getParser()->toGlyph('fa-comment'));
define('COMMENTOFFSTRING', '');
define('PRE_EXTENDEDSTRING', '<br />');
define("THEME_DISCLAIMER",  LAN_THEME_1 );


// applied before every layout.
$LAYOUT['_header_'] = '
		<div class="container">	
			<header id="site-header">
				<div class="row">
					<div class="col-md-4 col-sm-5 col-xs-8">
						<div class="logo">
							<h1><a href="{SITEURL}"><b>Black</b> &amp; White</a></h1>
						</div>
					</div><!-- col-md-4 -->
					<div class="col-md-8 col-sm-7 col-xs-4">
						<nav class="main-nav" role="navigation">
							<div class="navbar-header">
  								<button type="button" id="trigger-overlay" class="navbar-toggle">
    								<span class="ion-navicon"></span>
  								</button>
							</div>
							<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
								<ul class="nav navbar-nav navbar-right">
  								  {NAVIGATION=main}
  								</ul>
							</div><!-- /.navbar-collapse -->
						</nav>
						<div id="header-search-box">
							 {SITESEARCH}
						</div>
					</div><!-- col-md-8 -->
				</div>
			</header>
		</div>
	
';

// applied after every layout. 
$LAYOUT['_footer_'] = '		
<footer id="site-footer">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<p class="copyright">'.THEME_DISCLAIMER.' {SITEDISCLAIMER=2017}</p>
			</div>
		</div>
	</div>
</footer>

<!-- Mobile Menu -->
<div class="overlay overlay-hugeinc">
	<button type="button" class="overlay-close"><span class="ion-ios-close-empty"></span></button>
	<nav>
		<ul>
			{NAVIGATION=main}
		</ul>
	</nav>
</div>
';



// $LAYOUT is a combined $HEADER and $FOOTER, automatically split at the point of "{---}"

$LAYOUT['homepage'] =  '
		
<div class="content-body">			
	<div class="container">				
		<div class="row">					
			<main class="col-md-8">	
			{---}  					
			</main>					
			<aside class="col-md-4">  
			{SETSTYLE=widget}  		
			{MENU=2} 
			</aside>    
		</div>			
	</div>		
</div>
';
 

$LAYOUT['full'] = '  		
<div class="content-body">			
	<div class="container">				
		<div class="row">					
			<main class="col-md-12">  
			{---} 
			</main>				
		</div>			
	</div>		
</div>';

$LAYOUT['contact'] = '  		
<div class="content-body">			
	<div class="container">				
		<div class="row">					
			<main class="col-md-12">  
			 {SETSTYLE=contact}
			 {---} 
			</main>				
		</div>			
	</div>		
</div>';


$LAYOUT['about'] = '  		
<div class="content-body">			
	<div class="container">				
		<div class="row">					
			<main class="col-md-12">  
			 {SETSTYLE=contact}
			 {---} 
			 <div class="height-40px"></div>
			 {SETSTYLE=default}
			 {XURL_ICONS}
			</main>	
		</div>			
	</div>		
</div>';

 
 
$LAYOUT['single'] =  $LAYOUT['homepage'] ;


/**
 * @param string $caption
 * @example  []Heading 1
 * @example  [Heading2] 
 * @return empty string if correct syntax is used
 */
function checkcaption($caption ) 
{
	// get rid of any leading and trailing spaces
	$title = trim( $caption );
	// check the first and last character, if [ and ] set the title to empty  - this always doesn't work because admin stuff in captions
	if ( $title[0]== '[' && $title[strlen($title) - 1] == ']' ) $title = '';   
	// so just put [] at the beginning of menu title
	if ( $title[0]== '[' && $title[1] == ']' ) $title = '';  
	return $title;
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
	
  /* if no content, no display of html tags */
	if(empty($text))
	{
		return '';
	}
  
  /* displays only content */  
	if($style == 'none')
	{
		echo $text;
		return;
	}
 
 
		
	if($id ==  "news_categories_menu")  { $widgetclass=' widget-category';}		
	elseif($id == "news_latest_menu")  { $widgetclass='widget-recent-posts';}
	elseif($id == "news_archive_menu")  { $widgetclass='widget-archives';}
	else $widgetclass=' widget-category'; /* default ? */
	
	if($style == 'widget')
	{
		echo '<div class="widget '.$widgetclass.'">		
							<h3 class="widget-title">'.$caption.'</h3>		
							 '.$text.'
						</div>';
		return;
		
	}	

	if($style == 'contact')
	{
		echo ' 
		<h1 class="page-title">' . $caption . '</h1>						 
		<article class="post">							 	
			<div class="entry-content clearfix">' . $text . ' 							 	
			</div>						 
		</article>';
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
