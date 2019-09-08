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
 
// load libraries 
e107::library('load', 'bootstrap');
e107::library('load', 'fontawesome');


e107::css("theme", "css/default.css");
e107::css("theme", "assets/nightvision-bootstrap.css");
 
e107::js("footer-inline", 	"$('.e-tip').tooltip({container: 'body'})"); // activate bootstrap tooltips. 

// Legacy Stuff.
define('OTHERNEWS_COLS',false); // no tables, only divs. 
define('OTHERNEWS_LIMIT', 3); // Limit to 3. 
define('OTHERNEWS2_COLS',false); // no tables, only divs. 
define('OTHERNEWS2_LIMIT', 3); // Limit to 3. 
define('COMMENTLINK', 	e107::getParser()->toGlyph('fa-comment'));
define('COMMENTOFFSTRING', '');
define('PRE_EXTENDEDSTRING', '<br />');

// load translated strings
e107::lan('theme');

// applied before every layout.
$LAYOUT['_header_'] = '
<!-- start header -->
<div id="wrapper" class="container">
<div id="header" >
	<div id="logo">
		<h1><a href="{SITEURL}">{SITENAME}</a></h1>
		<p><span>{SITETAG}</span></p>
	</div>
	<div id="rss"><a href="'.e_PLUGIN.'rss_menu/rss.php">'.LAN_THEME_9.'</a></div>
	<div id="search" class="search">
	  {CUSTOM=search+".THEME_ABS."images/search.png+20+20}
 
	</div>
</div>
<!-- end header -->

 
<div id="menu" class="navbar navbar-inverse " role="navigation">
      
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
           
        </div>
        <div class="navbar-collapse collapse ">  
				  <ul class="nav navbar-nav">
        	{NAVIGATION=main}
         	</ul>
        </div><!--/.navbar-collapse -->
       
    </div>
 
  
	
';

// applied after every layout. 
$LAYOUT['_footer_'] = '
<div id="footer">
	<p class="legal"> {SITEDISCLAIMER}
	 </p>
	<p class="links">
	  '.LAN_THEME_6.'
	</p>
</div>
</div>
<!-- end footer -->
';



// $LAYOUT is a combined $HEADER and $FOOTER, automatically split at the point of "{---}"

$LAYOUT['standard'] =  '
{WMESSAGE=hide}
<!-- start page -->
<div id="page" >
	<div class="row">
	{ALERTS} 
	<!-- start ads -->
	<!-- start sidebar -->
	<div id="sidebar1" class="sidebar col-md-3">
	   <ul>
	   {SETSTYLE=rightmenu}
		 {MENU=1}
		 </ul>
	</div>
	<!-- end sidebar -->
	<!-- end ads -->
	<!-- start content -->
	<div id="contentx" class="col-md-6">
	  {SETSTYLE=default}
    {---} 
    {SETSTYLE=default}
    {MENU=3}
	</div>
	<!-- end content -->
	<!-- start sidebar -->
	<div id="sidebar2" class="sidebar col-md-3">
	   <ul>
	   {SETSTYLE=leftmenu}
		 {MENU=2}
		 </ul> 
	</div>
	<!-- end sidebar -->
</div>
<!-- end page --> 
';
 

$LAYOUT['fullwidth'] =  '
{WMESSAGE=hide}
<!-- start page -->
<div id="page" >
	<div class="row">
	{ALERTS} 
	<!-- start content -->
	<div id="contentx" class="col-md-12">
	  {SETSTYLE=default}
    {---} 
    {SETSTYLE=default}
    {MENU=3}
	</div>
	<!-- end content -->
</div>
<!-- end page --> 
';


/**
 * @param string $caption
 * @example  []Heading 1
 * @example  [Heading2] 
 * @return empty string if correct syntax is used
 */
function checkcaption( $caption ) 
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

	if($style == 'leftmenu')
	{
		echo "<li><h2>
			 ".$caption."
       </h2>
        <div class='text'>
        ".$text."
        </div></li>
       ";
		return;
	}	
 
	if($style == 'rightmenu')
	{
		echo "<li><h2>
			 ".$caption."
       </h2>
        <div class='text'>
        ".$text."
        </div></li>
       ";
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
		
 


	// default.

	if(!empty($caption))
	{
		echo '<h2 class="caption">'.$caption.'</h2>';
	}

	echo $text;


					
	return;
	
	
	
} 
 
 

define("OTHERNEWS2_COLS",1);
define("OTHERNEWS2_LIMIT",4);
 
?>
