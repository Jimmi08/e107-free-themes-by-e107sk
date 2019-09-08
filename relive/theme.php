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
//define('BODYTAG', '<body class="body-class '.THEME_LAYOUT.'">');


if(!defined('e_SEARCH')) {  
  define('e_SEARCH', e_HTTP.'search.php');
}

if(THEME_LAYOUT == 'contact')  {
 define('BODYTAG', '<body class="contact-page '.THEME_LAYOUT.'">');
}

// load libraries 
e107::library('load', 'bootstrap');
e107::library('load', 'fontawesome');

e107::css("theme", "css/screen.css");
e107::css("theme", "css/swipebox.css");

 
e107::js("theme", "js/masonry.pkgd.js", 'jquery');
e107::js("theme", "js/imagesloaded.js", 'jquery');
e107::js("theme", "js/plugins.js", 'jquery');    
e107::js("theme", "js/jquery.swipebox.min.js", 'jquery'); 
e107::js("theme", "js/instagram.js", 'jquery');
e107::js("theme", "js/options.js", 'jquery'); 
   
                                                          
e107::js('url','http://html5shim.googlecode.com/svn/trunk/html5.js','','2','<!--[if lt IE 9]>','<![endif]-->');
 

e107::js("footer-inline", 	"$('.e-tip').tooltip({container: 'body'})"); // activate bootstrap tooltips. 

// Legacy Stuff.
define('OTHERNEWS_COLS',false); // no tables, only divs. 
define('OTHERNEWS_LIMIT', 3); // Limit to 3. 
define('OTHERNEWS2_COLS',false); // no tables, only divs. 
define('OTHERNEWS2_LIMIT', 3); // Limit to 3. 
define('COMMENTLINK', 	e107::getParser()->toGlyph('fa-comment'));
define('COMMENTOFFSTRING', '');
define('PRE_EXTENDEDSTRING', '<br />');
//define('NEWSLIST_THUMB', '');
                        
// load translated strings
e107::lan('theme');

// applied before every layout.
 
// header tag is ending in layout!!!! 
$LAYOUT['_header_'] = '
    <header>
        {HEADERSEARCH}
        <nav class="main-nav">
            <div class="responsive-menu"><i class="fa fa-bars"></i></div>
            <ul>
                {NAVIGATION=main}
                <li><a href="#" class="open-search"><i class="fa fa-search"></i></a></li>
            </ul>
        </nav>
        <div class="container">
            <div class="logo">
                <a href="{SITEURL}">{SITELOGO}</a>
            </div>
        </div>

';    

// applied after every layout. 
$LAYOUT['_footer_'] = '
    <div class="container">
            {SETSTYLE=newsletter}
            {THEME_SUBSCRIBE}
    </div>

    <footer>
        <div class="go-to-top"><i class="fa fa-chevron-up"></i>On top</div>
        <div class="container">
            {SETSTYLE=footer}
            {MENU=4}
            {NAVIGATION=footer}
            {XURL_ICONS: template=footer}
            <div class="copyright">
                <p>{SITEDISCLAIMER}</p>
            </div>
        </div>
    </footer>
';



// $LAYOUT is a combined $HEADER and $FOOTER, automatically split at the point of "{---}"

$LAYOUT['homepage'] ='
  <div class="container">
  	{MENU=5}                      
  </div>
</header>           
{MENU=1}             
<div class="container">
	<div class="row">	
		{ALERTS}     
		{---}         
	</div>
</div>
<div class="container">
	<div class="row">        
		{MENU=2}          
	</div>
</div>
<div class="container"> 
	{SETSTYLE=none}       
	{MENU=3}      
</div>
';
 

$LAYOUT['full'] = '
</header>  
<div class="main-full">
	{ALERTS}  
	{---} 
</div>
<div class="container"> 
 {SETSTYLE=menu}
 {MENU=3} 
</div>
';

//todo add pagetitle
$LAYOUT['sidebar_right'] =   ' 
</header> 
<h1 class="site-title">{THEME_PAGETITLE}</h1>
<div class="row no-margin main-bg">
	<div class="no-padding col-lg-9">
		<div class="blog-post single-post">
			<div class="post-content">                 
				{SETSTYLE=none}
				{ALERTS}
				{---}  
			</div>
		</div>
	</div>
	<div class="no-padding col-lg-3">
		<div class="main-sidebar">
			{SETSTYLE=menu}       
			{MENU=10}
			{SETSTYLE=search}       
			{MENU=11} 
			{SETSTYLE=categories}       
			{MENU=12}
			{SETSTYLE=menu}       
			{MENU=13} 
			{SETSTYLE=twitter}       
			{MENU=14}
		</div>
	</div>
</div>
 ';

$LAYOUT['page'] =  '
</header>
{SETSTYLE=none}     
<div class="page">
	<div class="container">
 
			{ALERTS}
      {SETSTYLE=sidebar}
			{MENU=1} 
			{---}
			{MENU=2}
 
	</div>
</div>
';

$LAYOUT['contact'] ='   
<div class="container">
	{SETSTYLE=none} 
	{ALERTS}
	<div class="contact-form">
		<h4>Contact</h4>
		{---} 
	</div>
</div>
</header>
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
  
  if($id == 'news_categories_menu')  {
    $style = 'categories';
  } 
  elseif($id == 'news_latest_menu')  {
    $style = 'recent-posts';
  } 
  elseif($id == 'comment')  {
    $style = 'none';
  }  
  
  
  
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
 
	if($style == 'footer') 
	{
		echo ' <div class="tags-widget">';
		
		if(!empty($caption))
		{
            echo '<h5>'.$caption.'</h5>';
		}

		echo '
          '.$text.'
        </div>';
		return;	
		
	}
  
	if($style == 'newsletter') 
	{
		echo ' <div class="widget-newsletter mg-top">';
		
		if(!empty($caption))
		{
            echo '<h4>'.$caption.'</h4>';
		}

		echo '
          '.$text.'
        </div>';
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
		echo '<div class="widget widget-about">
	  <h3 class="widget-title">'.$caption.'</h3>
	  <div class="widget-bg">
	   '.$text.'
	  </div>
	</div>';
		return;	
	}	
  
	if($style == 'categories')
	{
		echo '<div class="widget widget-categories">
	  <h3 class="widget-title">'.$caption.'</h3>	  
	   '.$text.'	   
	 </div>';
		return;	
	}	
  
	if($style == 'recent-posts')
	{
		echo '<div class="widget widget-recent-posts">
	  <h3 class="widget-title">'.$caption.'</h3>	  
	   '.$text.'   
	</div>';
		return;	
	}	

 	if($style == 'search')
	{
		echo '<div class="widget widget-search">
	  <h3 class="widget-title">'.$caption.'</h3>
	  
	   '.$text.'   
	</div>';
		return;	
	}	

 	if($style == 'twitter')
	{
		echo '<div class="widget widget-twitter">
	  <h3 class="widget-title">'.$caption.'</h3>
	   '.$text.'   
	</div>';
		return;	
	}	
  
 	if($style == 'sidebar')
	{
  	
    
    if(!empty($caption))
  	{
  		echo '<h2 class="caption">'.$caption.'</h2>';
  	}
    echo  '<div class="blog-post single-post"> <div class="post-content">
                
                   '.$text.'</div> </div>';
		return;	
	}	
  
	// default.

	if(!empty($caption))
	{
		echo '<h2 class="caption">'.$caption.'</h2>';
	}

	echo  $text;


					
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
