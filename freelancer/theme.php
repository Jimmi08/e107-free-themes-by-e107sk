<?php
/**
 * Bootstrap 4 Theme for e107 v2.2.1
 */

if (!defined('e107_INIT')) { exit; }

define("BOOTSTRAP", 	4);
define("FONTAWESOME", 	5);
define('VIEWPORT', 		"width=device-width, initial-scale=1.0");
 
e107::lan('theme');
 
e107::css('url', 	'https://fonts.googleapis.com/css?family=Montserrat:400,700');
e107::css('url', 	'https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic');
e107::css('theme', 	'css/freelancer.min.css');

e107::js("theme", 	'js/jquery.easing.min.js', 'jquery');
e107::js("theme", 	'js/freelancer.min.js', 'jquery'); 
e107::js("theme", 	'custom.js', 'jquery'); 

e107::js('url','https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js','','2','<!--[if lt IE 9]>','');
e107::js('url','https://oss.maxcdn.com/respond/1.4.2/respond.min.js','','2','','<![endif]-->'); 

 
$inlinecss = e107::pref('theme', 'inlinecss', FALSE);
if($inlinecss) { 
	e107::css("inline", $inlinecss);
}
$inlinejs = e107::pref('theme', 'inlinejs');
if($inlinejs) { 
	e107::js("footer-inline", $inlinejs);
}

define('BODYTAG', '<body id="page-top" class="index layout-'.THEME_LAYOUT.'" />');
 

//e107::js("footer-inline", 	"$('.e-tip').tooltip({container: 'body'})"); // activate bootstrap tooltips. 

// Legacy Stuff.
define('OTHERNEWS_COLS',false); // no tables, only divs. 
define('OTHERNEWS_LIMIT', 3); // Limit to 3. 
define('OTHERNEWS2_COLS',false); // no tables, only divs. 
define('OTHERNEWS2_LIMIT', 3); // Limit to 3. 
define('COMMENTLINK', 	e107::getParser()->toGlyph('fa-comment'));
define('COMMENTOFFSTRING', '');

define('PRE_EXTENDEDSTRING', '<br />');


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

/* moved here from theme shortcodes 
it's needed because W3C validation
they are added by tinymce
*/ 
function remove_ptags($text='')
{
    $text =  str_replace(array("<!-- bbcode-html-start --><p>","</p><!-- bbcode-html-end -->"), "", $text);
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
	
  /* FIX more than one tablerender on page reason: correct h* tags */
  if (strpos($id, 'comment') !== false) { $style = 'default'; }
 
  /* in case standard menu is used with listgroup area */
  /* this will be upgraded in version 2.2.2 */
  if($style == 'listgroup') {
    if (strpos($id, 'search') !== false) { $style = 'cardmenu'; }
    if (strpos($id, 'contact-menu') !== false) { $style = 'cardmenu'; }  
    if (strpos($id, 'clock') !== false) { $style = 'cardmenu'; }
    if (strpos($id, 'other_news2') !== false) { $style = 'cardmenu'; }  
    if (strpos($id, 'news_categories_menu') !== false) { $style = 'cardmenu'; } 
    if (strpos($id, 'lastseen') !== false) { $style = 'cardmenu'; }   
    if (strpos($id, 'online_extended') !== false) { $style = 'cardmenu'; }      
  }

  /* FIX for card without body for some menus */
  if(!e107::pref('theme', 'cardmenu_look')) {
    if($style == 'cardmenu')  { $style = 'menu'; }
  }
	  
  echo "<!-- tablestyle final: style=".$style." id=".$id." -->\n\n";
  
   
	if($style == 'contact')
	{
		echo '
		<!-- Contact Section -->
		<section class="page-section" id="contact">
			<div class="container">
				<!-- Contact Section Heading -->
				<h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">'.$caption.'</h2>
				<!-- Icon Divider -->
				<div class="divider-custom">
					<div class="divider-custom-line"></div>
					<div class="divider-custom-icon">
						<i class="fas fa-star"></i>
					</div>
					<div class="divider-custom-line"></div>
				</div>
				<!-- Contact Section Form -->
				<div class="row">
					<div class="col-lg-8 mx-auto">'.$text.'</div>
				</div>
			</div>
		</section>';	
		return;
	}
	
	if($style == 'footer')
	{   
        if(!empty($caption))
        {
            echo '<h4 class="text-uppercase mb-4">'.checkcaption($caption).'</h4>';
        }	
        echo $text;	
		return;
	}
	
	if($style == 'singlesignup')
	{   
        if(!empty($caption))
        {
            echo '<h5 class="card-title text-center">'.checkcaption($caption).'</h5>';
        }	
        echo $text;	
		return;
	}
 
	// menus styling starts  
	// menus styling starts  
  if($style == 'menu')
	{  
    echo '<div class=" mb-4">';
	    if(!empty($caption))
	    {
	      echo '<h5 >'.$caption.'</h5>';
	    }
    echo $text;	
    echo '</div>';
    return;
  }

  /* used name cardmenu to have option to use other card styles */
  if($style == 'cardmenu')
	{
	  echo '<div class="card mb-4">';
	    if(!empty($caption))
	    {
	      echo '<h5 class="card-header">'.$caption.'</h5>';
	    }
    echo '<div class="card-body">';
    echo $text;	
    echo '</div>
		</div>';
    return;
  }	
 
 
  if($style == 'listgroup')
	{
	  echo '<div class="card mb-4">';
    if(!empty($caption))
    {
      echo '<h5 class="card-header">'.$caption.'</h5>';
    }
    echo $text;	
    echo '</div>';
    return;
  }	
  
	if($style == 'portfolio')
	{
		 echo '
		 <div class="col-lg-4 col-md-4 col-sm-6">
            '.$text.'
		</div>';	
		return;
	}

	if($style == 'bare')
	{
	  echo  remove_ptags($text) ;
		return;
	}

 if($id == 'wm') // Example - If rendered from 'welcome message' 
 {
 
    echo '
    <h1 class="masthead-heading text-uppercase mb-0">'.$caption.'</h1>

    <!-- Icon Divider -->
    <div class="divider-custom divider-light">
    <div class="divider-custom-line"></div>
    <div class="divider-custom-icon">
    <i class="fas fa-star"></i>
    </div>
    <div class="divider-custom-line"></div>
    </div>

    <!-- Masthead Subheading -->
    <p class="masthead-subheading font-weight-light mb-0">'.remove_ptags($text).'</p> ';
    return; 
 
 }
	// default.

	if(!empty($caption))
	{
		echo '<h1 class="my-4">'.$caption.'</h1>';
	}

	echo $text;
 			
	return;
	
	
	
}


/* Fix for Menu Manager *******************************************************/
/* Explanation:  List of available menuareas to add new menu is done by parsing code 
of theme.php file 
/*  using separate files causes not available menuareas dropdown in menu manager
 
/******************************************************************************/
/* BELLOW ARE FALSE $LAYOUTS JUST FOR MENU MANAGER, they are ignored later */
$LAYOUT['homepage'] =  '    
{MENU=1}{---}{MENU=2} 
{MENU=101}{MENU=102}{MENU=103} 
';

$LAYOUT['full'] =  '
{MENU=1}{---}
{MENU=101}{MENU=102}{MENU=103} 
'; 

$LAYOUT['sidebar_right'] =  '
{---}{MENU=1}{MENU=2}
{MENU=101}{MENU=102}{MENU=103}
'; 

$LAYOUT['singlesignup'] =  '
{---}
'; 

$LAYOUT['bare'] =  '
{---}
'; 

$LAYOUT['default'] = '
{MENU=1}{---}
{MENU=101}{MENU=102}{MENU=103} 
'; 

// applied before every layout.
$headerpath = THEME.'headers/header-default.php';
if(file_exists($headerpath)) {        
   include_once($headerpath);
} 
else {
 $LAYOUT['_header_'] = "";
}

// applied after every layout. 
$footerpath = THEME.'footers/footer-default.php';
if(file_exists($footerpath)) {        
   include_once($footerpath);
} 
else {
 $LAYOUT['_footer_'] = "";
}


$finallayout = THEME.'layouts/'.THEME_LAYOUT.'_layout.php';
 
if(file_exists($finallayout)) {        
    include_once($finallayout);
} 
 else {
    //do nothing, let possibility to use old layout
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
