<?php
/**
 * Bootstrap 3 Theme for e107 v2.x
 */
if (!defined('e107_INIT')) { exit; }

define("BOOTSTRAP", 	3);
define("FONTAWESOME", 	4);
define('VIEWPORT', 		"width=device-width, initial-scale=1.0");

e107::library('load', 'bootstrap');
e107::library('load', 'fontawesome');

e107::css('url', 		'https://fonts.googleapis.com/css?family=Montserrat%3A400italic%2C400%2C600%2C700%2C300&#038;subset=latin%2Clatin-ext&#038;ver=4.6.1');
e107::css('url', 		'https://fonts.googleapis.com/css?family=PT+Sans%3A400italic%2C400%2C600%2C700%2C300&#038;subset=latin%2Clatin-ext&#038;ver=4.6.1');

                   
//e107::css('url','https://cdn.jsdelivr.net/bootstrap/3.3.7/css/bootstrap.min.css');                  
 				 
e107::css('theme','js/owlcarousel/assets/owl.carousel.css');
e107::css('theme','css/core.css');
e107::css('theme','css/components.css');
e107::css('theme','css/components/button.css');
e107::css('theme','css/swipebox.css');
e107::css('theme','css/wordpress.css');
e107::css('theme','css/colors.css'); 

define('e_IFRAME',false);
 
e107::js("theme", "js/modernizr.js");
e107::js("theme", "js/countto.js");
e107::js("theme", "js/moment.js");
if(THEME_LAYOUT == 'contact'  )    {
  $googlemapsapikey = e107::pref('contactpage', 'googlemapsapikey');
	e107::js("url", "https://maps.google.com/maps/api/js?key={$googlemapsapikey}", 'jquery', 2);
	e107::js("theme", "js/gmap3.min.js", 'jquery', 2);
}
e107::js("theme", "js/pikaday.js");
e107::js("theme", "js/jquery.swipebox.js");
//e107::js("footer", "https://cdn.jsdelivr.net/bootstrap/3.3.7/js/bootstrap.min.js");
e107::js("theme", "js/isotope.min.js");
e107::js("theme", "js/doubletaptogo.js");
 
e107::js("theme", "js/owlcarousel/owl.carousel.min.js");
e107::js("theme", "js/waypoints/jquery.waypoints.min.js");
e107::js("theme", "js/functions.js");         
 

e107::js("footer-inline", 	"$('.e-tip').tooltip({container: 'body'})"); // activate bootstrap tooltips. 

// Legacy Stuff.
define('OTHERNEWS_COLS',false); // no tables, only divs. 
define('OTHERNEWS_LIMIT', 3); // Limit to 3. 
define('OTHERNEWS2_COLS',false); // no tables, only divs. 
define('OTHERNEWS2_LIMIT', 3); // Limit to 3. 
define('COMMENTLINK', 	e107::getParser()->toGlyph('fa-comment'));
define('COMMENTOFFSTRING', '');

define('PRE_EXTENDEDSTRING', '<br />');

define('BODYTAG', '<body class="stickyheader sticky-mobile anps-shadows footer-spacing-off '.THEME_LAYOUT.'">');

/*  VIDEO BACKGROUND FUNCTIONALITY -  doesn't work in theme_shortcodes */

/* detect if you are on mobile device */
function isMobile()
{
      return preg_match("/\b(?:a(?:ndroid|vantgo)|b(?:lackberry|olt|o?ost)|cricket|do‌​como|hiptop|i(?:emob‌​ile|p[ao]d)|kitkat|m‌​(?:ini|obi)|palm|(?:‌​i|smart|windows )phone|symbian|up\.(?:browser|link)|tablet(?: browser| pc)|(?:hp-|rim |sony )tablet|w(?:ebos|indows ce|os))/i", $_SERVER["HTTP_USER_AGENT"]);
}
	
if(isMobile()  )  
{
	/* image on mobile */ 
	if($mobileposter = e107::pref('theme', 'videomobilebackground', false))
	{
		$mobileposter = e107::getParser()->thumbURL($mobileposter);
	}
	else
	{
		$mobileposter = SITEURLBASE.THEME_ABS."images/videomobilebackground.jpg";
	}  
	$poster = $mobileposter;
}
else {
	/* first frame */ 
	if($videoposter = e107::pref('theme', 'videoposter', false))
	{
		$videoposter = e107::getParser()->thumbURL($videoposter);
	}
	else
	{
	 	$videoposter = SITEURLBASE.THEME_ABS."images/videoposter.jpg";
	}
  $poster = $videoposter;
}

$inlinecss = ' 
	#video-landing {
		background: url('.$poster .') no-repeat center center fixed;
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		background-size: cover;
}					';
e107::css("inline", $inlinecss);
 
// print_a(e107::pref('contactpage'));
// print_a(e107::pref('contactpage', 'contact_address'));
 
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
	
	if($id == "wm")  {
 
	  if($text <> '') {
		echo '		
        <section class="jumbotron jumbotron-light" style="background-image: url('.SITEURLBASE.THEME_ABS.'img/statement.jpg);">
          <div class="container">
              <div class="row">
                  <div class="col-md-8">
                      <h2 class="text-uppercase">'.$caption.'</h2>
                      '.$text.'
									</div>
              </div>
          </div>
      </section>
		';
 
		}
		return;
	}
	
	if($style == 'navdoc' || $style == 'none')
	{
		echo $text;
		return;
	}
	
	if($id == 'login_page' )
	{
		echo ' 
		 '.$text.' ';
		return;
	}	
	
	if($style == 'jumbotron')
	{
		echo '<div class="jumbotron">
      	<div class="container">';
        	if(!empty($caption))
	        {
	            echo '<h1>'.$caption.'</h1>';
	        }
        echo '
        	'.$text.'
      	</div>
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
	
		
	if($style == 'footer')
	{
		echo '<h3 class="widget-title">'.$caption.'</h3>
	   '.$text;
		return;
		
	}	
		
	if($style == 'menu')
	{
 
	
  echo '<div class="widget widget_recent_entries">
                            <h3 class="widget-title">'.$caption.'</h3>
 '.$text.'
                        </div>';
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

	if($style == 'contact')
	{
		 echo '<h3 class="title margin-bottom-small text-uppercase">'.$caption.'</h3>
		 <p">
            '.$text.'
		</p>';	
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
$headerversion = 1;
 
 /* textarea fiels */
 
$textworkinghours =  e107::pref('contactpage', 'text_business_hours');
$textworkinghours =  e107::getParser()->toHTML($textworkinghours,'','TITLE');

$workinghours =  e107::pref('contactpage', 'business_hours');
$workinghours =  e107::getParser()->toHTML($workinghours,'','TITLE');
 

$topbar = '
<!-- Top bar -->
<div class="top-bar top-bar-style-1 clearfix classic visible-lg-block">
    <div class="container">
        <div class="col-md-6">
            <div id="anpstext-7" class="widget widget_anpstext text-left">
                <div class="row">
                    <ul class="contact-info">
                        <li><i class="fa fa-map-marker" '.$topbarcolor.'></i>'.e107::pref('contactpage', 'contact_address').'</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div id="anpssocial-2" class="widget widget_anpssocial text-right">
                <div class="row">
                   <ul class="social"> {XURL_ICONS} </ul>
                </div>
            </div>
        </div>
    </div>
</div>
';
			  
 
$header1 = ' <header class="site-header full-width logo-background">
                <div class="container preheader-wrap">
                    <div class="logo">
                         <a href="{SITEURL}">{SITELOGO_EXTENDED}</a>                
                    </div>
                    <div class="large-above-menu">
                        <div id="anpstext-8" class="widget widget_anpstext">
                            <ul class="contact-info">
                                <li> <i class="fa fa-home"></i><span class="important">'.e107::pref('contactpage', 'contact_address').'<br>&nbsp;</li>
                                <li> <i class="fa fa-envelope"></i><span class="important">Send us a mail</span><br>'.e107::pref('contactpage', 'contact_email').'</li>
                            </ul>
                        </div>
                        <div id="anpscontactnumber-2" class="widget widget_anpscontactnumber">
                            <div class="contact-number" style="background-color: #69cd72"> <span class="contact-number-text" style=" color: #2d7f35">CALL TOLL FREE</span> <span class="contact-number-number" style="color: #ffffff">'.e107::pref('contactpage', 'contact_mobile').'</span> </div>
                        </div>
                    </div>
                </div>
                <div class="header-wrap clearfix">
                    <div class="container">
                        <nav class="site-navigation">
                            <div class="mobile-wrap"> <button class="burger">
                                <span class="burger-top"></span>
                                <span class="burger-middle"></span>
                                <span class="burger-bottom"></span>
                            </button>
                                <div class="site-search hidden-lg">
                                    {SITESEARCH_MOBILE}
                                </div>
                                <ul id="main-menu" class="main-menu">
                                    {NAVIGATION=main}                                   
                                    <li class="menu-search"> <button class="menu-search-toggle"><i class="fa fa-search"></i></button>
                                        <div class="menu-search-form hide">
                                        {SITESEARCH}
                                        </div>
                                    </li>
                                </ul>
                            </div> 
														<button class="burger pull-right"><span class="burger-top"></span><span class="burger-middle"></span><span class="burger-bottom"></span></button> <a href="'.SITEURL.'contact.php" target="_self"
                                class="menu-button"><i class="fa fa-globe"></i> Get a quote</a></nav>
                    </div>
                </div>
            </header>';

// applied before every layout.
$LAYOUT['_header_'] = 
'<div class="site">'
.$topbar.$header1;
 

// applied after every layout. 
$LAYOUT['_footer_'] = ' 
{SETSTYLE=default}
<!-- Site Footer -->
<footer class="site-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-xs-6">
                <div class="widget widget_anpsimages"> {SITELOGO_FOOTER}</div>
                <div class="widget widget_anpsspacings">
                    <div class="empty-space block" style="height:2px;"></div>
                </div>
                <div class="widget widget_text">
                    <div class="textwidget">
                        <p>'.e107::pref('contactpage', 'contact_address').'</p>
                    </div>
                </div>
                <div class="widget widget_anpstext">
                    <ul class="contact-info">
                        <li><i class="fa fa-map-marker"></i>'.e107::pref('contactpage', 'contact_address').'</li>
                        <li><i class="fa fa-phone"></i><span class="important">'.e107::pref('contactpage', 'contact_phone').'</span></li>
                        <li><i class="fa fa-fax"></i>'.e107::pref('contactpage', 'contact_fax').'</li>
                        <li><i class="fa fa-envelope"></i>'.e107::pref('contactpage', 'contact_email').'</li>
                    </ul>
                </div>
            </div>
	          <div class="col-md-3 col-xs-6">
	              <div class="widget anps_menu_widget">
	                  <h3 class="widget-title">Navigation</h3>
	                  {NAVIGATION=footer}
	              </div>
	              <div class="widget widget_text">
	                  <h3 class="widget-title">Socialise with us</h3>
	                  <div class="textwidget">Contact us via social networks</div>
	              </div>
	              <div class="widget widget_anpssocial">
	                  <ul class="social social-minimal">                                 
	                     {XURL_ICONS}
	                  </ul>
	              </div>
	          </div>
     
            <div class="col-md-3 col-xs-6">
                <div class="widget widget_text">
                   '.$textworkinghours.'
                </div>
                <div class="widget widget_anpsopeningtime">
                   '.$workinghours.'                      
                </div>
            </div>
            <div class="col-md-3 col-xs-6">
                {SETSTYLE=footer}                            
                <div class="widget widget_recent_entries"> 
										{MENU: path=news/news_grid&limit=2&layout=footerlatest&caption=Latest News}                             
                </div>
                <div class="widget widget_newsletterwidget">
                    
                    
                     {THEME_SUBSCRIBE}   
 
                </div>
            </div>             
        </div>
    </div>
    <div class="copyright-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="widget widget_text">
                        <div class="textwidget">{SITEDISCLAIMER} Copyright © 2016 Industrial HTML Theme - Theme by <a href="http://www.anpsthemes.com/" target="_blank">Anpsthemes.com</a></div>
                    </div>
                </div>
                <div class="col-md-6 text-right">
                    <div class="widget widget_anpssocial">
                         <ul class="social "> {XURL_ICONS} </ul>
                    </div>
                </div>
            </div> 
            {MENU=99}
        </div>
    </div>
</footer>
{JM_GOOGLE_AD: id=1}
</div>
';
 

$LAYOUT['homepage'] =  '
<main class="site-main">
{SETSTYLE=none}
{FEATUREBOX}      
{ALERTS} 
{CHAPTER_MENUS: name=home-what-we-do}
		
{WMESSAGE=force} 
 
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="recent-news" data-owlcolumns="3">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="title">Recent news</h2>
                        </div>
                    </div>
                    <div class="owl-carousel">
                        {MENU: path=news/news_grid&limit=20&layout=recentnews}
                    </div>
                    <div class="owl-nav text-right"> <button class="owlprev"><i class="fa fa-angle-left"></i></button> <button class="owlnext"><i class="fa fa-angle-right"></i></button> </div>
                </div>
            </div>
        </div>
    </div>
</div>
 
	<div class="section bg-white">                     	
		<div class="container">                         		
			<div class="row">                             			
				<div class="col-md-12">                                 				
					<div class="testimonials testimonials-style-1">                                     					
						<div class="testimonials-header">                                         						
							<h3 class="title">Testimonials</h3>                                     					
						</div>                                     					
						<div class="testimonials-outer-wrap">                                         						
							<ul class="testimonial-wrap owl-carousel">							
							  {CHAPTER_MENUS: name=home-testimonials}                                             						
							</ul>                                          						
							<div class="owl-nav">  	 							
								<button class="owlprev">		 								
									<i class="fa fa-angle-left"></i>	 							
								</button>  	 							
								<button class="owlnext">		 								
									<i class="fa fa-angle-right"></i>	 							
								</button>   						
							</div>                                      					
						</div>                                  				
					</div>                              			
				</div>                          		
			</div>                      	
		</div>                  
	</div>                                                                           
	{---}
</main> 
';

 


$LAYOUT['full'] = '  
  
<!-- Page header -->     
<div class="page-header page-header-sm">         	
	<h1 class="text-uppercase page-title">{THEME_PAGETITLE}</h1>     
</div>     
<!-- /Page header -->      
<!-- Breadcrumbs -->      
<div class="breadcrumb">         	
	<div class="container">             		
		<ol>                 			
			<li>			
			<a href="index.html">Home</a>			
			</li>                 			
			<li class="active">{THEME_PAGETITLE} 			
			</li>             		
		</ol>         	
	</div>     
</div>     
<!-- /Breadcrumbs -->   {ALERTS}   {MENU=1}                
<!-- Main Content -->               
<main class="site-mainx">                {SETSTYLE=none}                   	
	<div class="section no-bottom-padding">                     		
		<div class="container">                         			
			<div class="row">                             				
				<div class="col-md-12">                                 					
					<h3 class="title text-uppercase margin-bottom-small">{THEME_PAGETITLE}</h3>                                                               				
				</div>                         			
			</div>                     		
		</div>                 	
	</div>                 	
	<div class="section padding-top-small padding-bottom-big">                     		
		<div class="container">                         			
			<div class="row">                             				
				<div class="col-md-12">                   {---}                                    					
				</div>				
			</div>                         			
		</div>                     		
	</div>                 	  
</main>

';

$LAYOUT['full-no-title'] = '   
<!-- Page header -->    
<div class="page-header page-header-sm">        
	<h1 class="text-uppercase page-title">{THEME_PAGETITLE}</h1>    
</div>    
<!-- /Page header -->    
<!-- Breadcrumbs -->    
<div class="breadcrumb">        
	<div class="container">            
		<ol>                
			<li>
			<a href="index.html">Home</a>
			</li>                
			<li class="active">{THEME_PAGETITLE}
			</li>            
		</ol>        
	</div>    
</div>    
<!-- /Breadcrumbs -->  {ALERTS}   {MENU=1}               
<!-- Main Content -->             
<main class="site-mainx">                {SETSTYLE=none}                 
	<div class="section padding-top-small padding-bottom-big">                    
		<div class="container">                        
			<div class="row">                            
				<div class="col-md-12">                  
				  {---}                                   
				</div>                        
			</div>                    
		</div>                
	</div> 
</main>
';

$contactadress = e107::pref('contactpage', 'contact_address', FALSE);
$mapmarker 		 = e107::pref('contactpage', 'mapmarker', FALSE);
if($mapmarker)  	{  $mapmarker = e107::getParser()->replaceConstants($mapmarker);    }
else { $mapmarker 		 =  THEME.'images/marker.png' ;
}
             
             
$LAYOUT['contact'] =  '
            <main class="site-main">
                <!-- Page header -->
                <div class="page-header page-header-sm">
                    <h1 class="text-uppercase page-title">{THEME_PAGETITLE}</h1>
                </div>
                <!-- /Page header -->
                <!-- Breadcrumbs -->
                <div class="breadcrumb">
                    <div class="container">
                        <ol>
                            <li><a href="index.html">Home</a></li>
                            <li class="active">{THEME_PAGETITLE}</li>
                        </ol>
                    </div>
                </div>
                <!-- /Breadcrumbs -->
                <!-- Google Maps -->
                <section class="section no-top-padding">
                    <div class="row">
                        <div class="col-sm-12">
                            <!-- Google Maps Element -->
                            <div data-styles=\'[{"featureType":"landscape","stylers":[{"saturation":-100},{"lightness":65},{"visibility":"on"}]},{"featureType":"poi","stylers":[{"saturation":-100},{"lightness":51},{"visibility":"simplified"}]},{"featureType":"road.highway","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"road.arterial","stylers":[{"saturation":-100},{"lightness":30},{"visibility":"on"}]},{"featureType":"road.local","stylers":[{"saturation":-100},{"lightness":40},{"visibility":"on"}]},{"featureType":"transit","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"administrative.province","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"labels","stylers":[{"visibility":"on"},{"lightness":-25},{"saturation":-100}]},{"featureType":"water","elementType":"geometry","stylers":[{"hue":"#ffff00"},{"lightness":-25},{"saturation":-97}]}]\'
                                class="map" id="map1" style="height: 450px;" data-type="ROADMAP" data-zoom="14" data-scroll="false" data-markers=\'{
                        "address": "'.$contactadress.'",
                        "center": "true",
                        "data": "",
                        "options": {
                            "icon": "'.$mapmarker.'"
                        }
                    }
                  \'></div>
                        </div>
                </section>
                <!-- /Google Maps -->
                <!-- Contact info -->
                <section class="section no-top-padding">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h3 class="title margin-bottom-small text-uppercase">'.e107::pref('contactpage', 'text_contact_title').'</h3>
                                <p>'.e107::pref('contactpage', 'text_contact_subtitle').'</p>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 40px;">
                            <div class="col-md-5">
                                <!-- Info Table Element -->
                                <table class="info-table">
                                    <tbody>
                                        <tr class="info-table-row">
                                            <th class="info-table-icon"><i class="fa fa-long-arrow-right"></i></th>
                                            <td class="info-table-content">'.e107::pref('contactpage', 'contact_name').'</td>
                                        </tr>
                                        <tr class="info-table-row">
                                            <th class="info-table-icon"><i class="fa fa-map-marker"></i></th>
                                            <td class="info-table-content">'.e107::pref('contactpage', 'contact_address').'</td>
                                        </tr>
                                        <tr class="info-table-row">
                                            <th class="info-table-icon"><i class="fa fa-phone"></i></th>
                                            <td class="info-table-content">'.e107::pref('contactpage', 'contact_phone').'</td>
                                        </tr>
                                        <tr class="info-table-row">
                                            <th class="info-table-icon"><i class="fa fa-fax"></i></th>
                                            <td class="info-table-content">'.e107::pref('contactpage', 'contact_fax').'</td>
                                        </tr>
                                        <tr class="info-table-row">
                                            <th class="info-table-icon"><i class="fa fa-mobile-phone"></i></th>
                                            <td class="info-table-content">'.e107::pref('contactpage', 'contact_mobile').'</td>
                                        </tr>
                                        <tr class="info-table-row">
                                            <th class="info-table-icon"><i class="fa fa-envelope"></i></th>
                                            <td class="info-table-content">'.e107::pref('contactpage', 'contact_email').'</td>
                                        </tr>
                                        <tr class="info-table-row">
                                            <th class="info-table-icon"><i class="fa fa-globe"></i></th>
                                            <td class="info-table-content"><strong><a href="{SITEURL}" target="_blank">{SITEURL}</a></strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!-- /Info Table Element -->
                            </div>
                            <div class="col-md-7">
                               {SETSTYLE=none}
                               {---}
                            </div>
                        </div>
                    </div>
                </section>
</main>                
 ';
            

$LAYOUT['sidebar_right'] = '  
<!-- Page header --> 
<div class="page-header page-header-sm">    
	<h1 class="text-uppercase page-title">{THEME_PAGETITLE}</h1>
</div>
<!-- /Page header -->
<!-- Breadcrumbs -->
<div class="breadcrumb">           
	<div class="container">        
		{THEME_BREADCRUMBS}        
	</div>
</div>
<!-- /Breadcrumbs -->   
{SETSTYLE=default} 
<div class="container">    
	<div class="row">        
		<main class="page-content col-md-9 padding-bottom-xl">  
		{ALERTS}  	     
		{---}                     
		</main>                    
		<aside class="sidebar sidebar-right col-md-3">      
			<div class="widget widget-search">
			{SIDEBAR_SEARCH} 
			</div>       			
			{SETSTYLE=menu}       
			{MENU=1}                       
		</aside>                
	</div>            
</div>';


 
 
 
 
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
