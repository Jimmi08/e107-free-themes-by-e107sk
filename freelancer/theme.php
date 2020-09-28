<?php
/**
 * Bootstrap 4 Theme for e107 v2.3.0+
 */
 
if (!defined('e107_INIT')) { exit; }


// doesn't work in construct, tested
e107::lan('theme'); 

 

////////////////////////////////////////////////////////////////////////////////
class theme implements e_theme_render
{

	function __construct() {


        e107::meta('viewport', 'width=device-width, initial-scale=1, shrink-to-fit=no');
        
        // it can't be in construct, because nexprev doesn't work then  
        define("BOOTSTRAP", 4);   
        
        
        // $no_core_css doesn't work       
        define("CORE_CSS", false);
        
        e107::css('url', 	'https://fonts.googleapis.com/css?family=Montserrat:400,700');
        e107::css('url', 	'https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic');
        e107::css('theme', 	'css/styles.css');

		e107::js("theme", 	'js/bootstrap.bundle.min.js', 'jquery');
		e107::js("theme", 	'js/jquery.easing.min.js', 'jquery');

		/*
		e107::js('url','https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js','','2','<!--[if lt IE 9]>','');
		e107::js('url','https://oss.maxcdn.com/respond/1.4.2/respond.min.js','','2','','<![endif]-->'); 
		*/

		e107::js("theme", 	'js/scripts.js', 'jquery'); 
		e107::js("theme", 	'custom.js', 'jquery'); 

		$this->getInlineCodes();

		/*
		if(e_PAGE == 'login.php') {
		
			define('e_IFRAME','0');  
		
		}
		*/

	}

	function getInlineCodes() 
	{
		$inlinecss = e107::pref('theme', 'inlinecss', FALSE);
		if($inlinecss) { 
			e107::css("inline", $inlinecss);
		}
		$inlinejs = e107::pref('theme', 'inlinejs');
		if($inlinejs) { 
			e107::js("footer-inline", $inlinejs);
		}

	}

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

 
	function tablestyle($caption, $text, $mode = '', $data = array())
	{
		
		$style = $data['setStyle'];
		
		echo "<!-- tablestyle: style=".$style." id=".$mode." -->\n\n";
		
		$type = $style;
		if(empty($caption))
		{
			$type = 'box';
		}
		
		/* FIX more than one tablerender on page reason: correct h* tags */
		if (strpos($mode, 'comment') !== false) 
		{
			 $style = 'default'; 
		}
		
		/* in case standard menu is used with listgroup area */
		/* this will be upgraded in version 2.2.2 */
		if($style == 'listgroup') 
		{
			if (strpos($mode, 'search') !== false) { $style = 'cardmenu'; }
			if (strpos($mode, 'contact-menu') !== false) { $style = 'cardmenu'; }  
			if (strpos($mode, 'clock') !== false) { $style = 'cardmenu'; }
			if (strpos($mode, 'other_news2') !== false) { $style = 'cardmenu'; }  
			if (strpos($mode, 'news_categories_menu') !== false) { $style = 'cardmenu'; } 
			if (strpos($mode, 'lastseen') !== false) { $style = 'cardmenu'; }   
			if (strpos($mode, 'online_extended') !== false) { $style = 'cardmenu'; }      
		}

		/* FIX for card without body for some menus */
		if(!e107::pref('theme', 'cardmenu_look')) 
		{
			if($style == 'cardmenu')  { $style = 'menu'; }
		}
	  
  		echo "<!-- tablestyle final: style=".$style." id=".$mode." -->\n\n";
  
   
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
				echo '<h4 class="text-uppercase mb-4">'.$this->checkcaption($caption).'</h4>';
			}	
			echo $text;	
			return;
		}
	
		if($style == 'singlesignup')
		{   
			if(!empty($caption))
			{
				echo '<h5 class="card-title text-center">'.$this->checkcaption($caption).'</h5>';
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
			echo '</div></div>';
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
			echo  $this->remove_ptags($text) ;
			return;
		}

		if($style == 'default') {
			if(!empty($caption))
			{
				echo '<h3 class="text-heading">' . $caption . '</h3>';
			}
			echo $text;
		}

		if($mode == 'wm') // Example - If rendered from 'welcome message' 
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
			<p class="masthead-subheading font-weight-light mb-0">'.$this->remove_ptags($text).'</p> ';
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
	
}
