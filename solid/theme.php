<?php
/**
 * Bootstrap 3 Theme for e107 v2.x
 */
if (!defined('e107_INIT')) { exit; }

define("BOOTSTRAP", 	3);
define("FONTAWESOME", 	4);
define('VIEWPORT', 		"width=device-width, initial-scale=1.0");
 
e107::lan('theme');

e107::library('load', 'bootstrap');
e107::library('load', 'fontawesome');

e107::css('theme','assets/css/style.css');       

e107::js('url','https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js','','2','<!--[if lt IE 9]>','');
e107::js('url','https://oss.maxcdn.com/respond/1.4.2/respond.min.js','','2','','<![endif]-->');
e107::js('theme','assets/js/modernizr.js');

 
e107::js("theme", "assets/js/jquery.hoverdir.js");
e107::js("theme", "assets/js/jquery.hoverex.min.js");

if(THEME_LAYOUT == 'homepage'  )
{
  e107::js("theme", "assets/js/jquery.isotope.min.js");
  e107::js("theme", "assets/js/jquery.prettyPhoto.js");
	e107::js("theme", "assets/js/custom.js"); 
	e107::js("theme", "assets/js/portfolio-home.js");  
}
if(THEME_LAYOUT == 'solid_project'  )
{
  e107::js("theme", "assets/js/jquery.isotope.min.js");
  e107::js("theme", "assets/js/jquery.prettyPhoto.js");
	e107::js("theme", "assets/js/custom.js"); 
	e107::js("theme", "assets/js/portfolio-home.js");  
}

if(THEME_LAYOUT == 'portfolio'  )
{
  e107::js("theme", "assets/js/imagesloaded.pkgd.min.js");
	e107::js("theme", "assets/js/isotope.pkgd.min.js");
  e107::js("theme", "assets/js/jquery.prettyPhoto.js");
	e107::js("theme", "assets/js/custom.js"); 
	e107::js("theme", "assets/js/portfolio-page.js");  
}

e107::js("footer-inline", 	"$('.e-tip').tooltip({container: 'body'})"); // activate bootstrap tooltips. 

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
	
	if($id == 'wm') // Example - If rendered from 'welcome message' 
	{
		echo '<div class="col-lg-8 col-lg-offset-2">';
		if(!empty($caption))  {   
		echo '<h3>'.$caption.'</h3>';  }
		echo '	'.$text.'</div>';
		return;		
	}
	
	if($style == 'none')
	{
	 echo $text; 
	 return;
  }
  
	if($style == 'footer-menu' )
	{
		echo '<h4>'.$caption.'</h4> 
		 <div class="hline-w"></div>
	   <p>'.$text.'</p>';
		return;		
	}	
	if($style == 'middlemenu' )
	{
		echo '<h4>'.$caption.'</h4> 
		 <div class="hline"></div>
	   <p>'.$text.'</p>';
		return;		
	}		
	if($style == 'portfolio' )
	{
		echo '<h3>'.$caption.'</h3>'.$text;
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
		echo '<h4>'.$caption.'</h4>
		 		<div class="hline"></div>
		 			<p>
		 			'.$text.'
		 			</p>
		 			
		 		<div class="spacing"></div>';
		return;		
	}	
	
	if($style == 'services')
	{
		echo ' <div class="col-md-4">'.$text.'</div>';
		return;		
	}		
	
	// formatting caption is done in template
	if($style == 'caption')
	{
		if(!empty($caption))
		{
			echo $caption;
		}
		echo $text;
		return;
		
	} 

	// default.

	if(!empty($caption))
	{
			echo '<h4>'.$caption.'</h4>';
	}

	echo $text;


					
	return;
	
	
	
}

// applied before every layout.
$LAYOUT['_header_'] = '<div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{SITEURL}">{BOOTSTRAP_BRANDING}</a>
        </div>
        <div class="navbar-collapse collapse navbar-right">
          <ul class="nav navbar-nav navbar-right">
						 {NAVIGATION=main}
						 {BOOTSTRAP_USERNAV}
					</ul>
        </div><!--/.navbar-collapse -->
      </div>
    </div>
	<!-- *****************************************************************************************************************
	 '.THEME_LAYOUT.'
	 ***************************************************************************************************************** -->
';

//      {CMENU=about}
//      {CMENU=social-links}
// 			{CMENU=contact}
$LAYOUT['_footer_'] = '
<div id="footerwrap">
	<div class="container">
		<div class="row">
		  {SETSTYLE=footer-menu}
			<div class="col-lg-4">
			{MENU=100} 
			</div>
			<div class="col-lg-4">
			{MENU=101}
			</div>
			<div class="col-lg-4">
			{MENU=102}
			</div>
		</div><! --/row -->
	</div><! --/container -->
</div><! --/footerwrap -->
';



// $LAYOUT is a combined $HEADER and $FOOTER, automatically split at the point of "{---}"

$LAYOUT['homepage'] =  '
<div id="headerwrap">
    <div class="container">
			<div class="row">
		    {SETSTYLE=wmhome}
			  {WMESSAGE=force} 
			  {SETSTYLE=none}
			  {FEATUREBOX}
			</div><!-- /row -->
    </div> <!-- /container -->
</div><!-- /headerwrap -->
{ALERTS} 
{---}
 <div id="service">
 	<div class="container">
		<div class="row centered"
		 {SETSTYLE=services}
		 {MENU=1} 
 		</div>
 	</div><! --/container -->
 </div><! --/service --> 
<div id="portfoliowrap"> 
 {SETSTYLE=portfolio}
 {MENU=2} 
</div>
{SETSTYLE=caption} 
<div class="container mtb">
	<div class="row">
		<div class="col-lg-4 col-lg-offset-1">
	 		 {SETSTYLE=default}	
			 {MENU=201}
		</div>	 		
		<div class="col-lg-3">
		  {SETSTYLE=middlemenu}		  
	    {MENU=202}
		</div>	 		
		<div class="col-lg-3">
		  {SETSTYLE=middlemenu}
	    {MENU=203}
		</div>	 		
	</div><! --/row -->
</div><! --/container -->
<div id="twrap">  <! --testimonials -->
	<div class="container centered">
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2">
			{SETSTYLE=none}
			{MENU=3} 
			</div>
		</div><! --/row -->
	</div><! --/container -->
</div><! --/twrap -->
<div id="cwrap">  <! --clients -->
		<div class="container">
			<div class="row centered">
			{SETSTYLE=portfolio}
			{MENU=4}
		</div><! --/row -->
	</div><! --/container -->
</div><! --/twrap -->
';

$LAYOUT['portfolio'] = '
<!-- *****************************************************************************************************************
 BLUE WRAP
 ***************************************************************************************************************** -->
<div id="blue">
    <div class="container">
		<div class="row">
			<h3>'.LAN_TH_PORTFOLIO.'</h3>
		</div><!-- /row -->
    </div> <!-- /container -->
</div><!-- /blue -->
{ALERTS} 
{---}  
{PORTFOLIOITEMS} 
</div>';

$LAYOUT['solid_project'] = '
<!-- *****************************************************************************************************************
 BLUE WRAP
 ***************************************************************************************************************** -->
<div id="blue">
    <div class="container">
		<div class="row">
			<h3>'.LAN_TH_SINGLEPROJECT.'{THEME_PAGETITLE}</h3>
			{ALERTS} 
		</div><!-- /row -->
    </div> <!-- /container -->
</div><!-- /blue -->
 {SETSTYLE=none}
		{---}  
</div>';


$LAYOUT['full'] = '
<div id="blue">
	<div class="container">
	<div class="row">
		<h3>{THEME_PAGETITLE}</h3>
		{ALERTS} 
		</div><!-- /row -->
	</div> <!-- /container -->
</div><!-- /blue -->
{SETSTYLE=none}
<div class="container mtb">
	<div class="row">  
		{SETSTYLE=none} 
		{---}
	</div><! --/row -->
</div><! --/container -->
<div class="container mtb">
	<div class="row centered">
	{MENU=1}
	 	</div><! --/row -->
</div><! --/container -->
<div id="twrap">  <! --testimonials -->
	<div class="container centered">
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2">
			{SETSTYLE=none}
			{MENU=3} 
			</div>
		</div><! --/row -->
	</div><! --/container -->
</div><! --/twrap -->
<div id="cwrap">  <! --clients -->
		<div class="container">
			<div class="row centered">
			{SETSTYLE=portfolio}
			{MENU=4}
		</div><! --/row -->
	</div><! --/container -->
</div><! --/twrap -->
';

$LAYOUT['sidebar_right'] =' 

	<!-- *****************************************************************************************************************
	 BLUE WRAP
	 ***************************************************************************************************************** -->
	<div id="blue">
	    <div class="container">
			<div class="row">
				<h3>{THEME_PAGETITLE}</h3>
			</div><!-- /row -->
	    </div> <!-- /container -->
	</div><!-- /blue -->
	{SETSTYLE=default}
  {ALERTS}
	<!-- *****************************************************************************************************************
	 BLOG CONTENT
	 ***************************************************************************************************************** -->
	 <div class="container mtb">
	 	<div class="row">  
	 		<! -- BLOG POSTS LIST -->
	 		<div class="col-lg-8">        
      {---}
      </div><! --/col-lg-8 -->
    <! -- SIDEBAR -->
    <div class="col-lg-4">
      {SETSTYLE=menu}
      {MENU=1}    
    </div>
  </div><! --/row -->
</div><! --/container -->
';

 
 
$LAYOUT['solid_contact'] =' 
	<!-- *****************************************************************************************************************
	 BLUE WRAP
	 ***************************************************************************************************************** -->
	<div id="blue">
	    <div class="container">
			<div class="row">
				<h3>{THEME_PAGETITLE}</h3>
			</div><!-- /row -->
	    </div> <!-- /container -->
	</div><!-- /blue -->
	<!-- *****************************************************************************************************************
	 CONTACT WRAP
	 ***************************************************************************************************************** -->

	 <div id="contactwrap"></div>
	 
	<!-- *****************************************************************************************************************
	 CONTACT FORMS
	 ***************************************************************************************************************** -->

<div class="container mtb">
  <div class="row">
    {SETSTYLE=none}
  {---}
  </div><! --/row -->
</div><! --/container -->  
';

 
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
