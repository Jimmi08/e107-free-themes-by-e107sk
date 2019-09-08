<?php

if(!defined('e107_INIT')){ exit; }

// [multilanguage]
e107::lan('theme');

define("BOOTSTRAP", 	3);
define("FONTAWESOME", 	4);
define('VIEWPORT', 		"width=device-width, initial-scale=1.0");
 
e107::library('load', 'bootstrap');
e107::library('load', 'fontawesome');

e107::css("theme", "css/style.css");

/* override with theme prefs */
$inlinecss = e107::pref('theme', 'inlinecss', FALSE);
if($inlinecss) { 
	e107::css("inline", $inlinecss);
}
$inlinejs = e107::pref('theme', 'inlinejs');
if($inlinejs) { 
	e107::js("footer-inline", $inlinejs);
}
 
$LAYOUT['_footer_'] = '
</div>
  <div id="fmenubar" class="container-fluid">
    <div id="fmenucont" class="row text-center">
    {NAVIGATION=footer}
    </div>
  </div> 
<div id="footbar" class="container-fluid">
    <div id="footcont">
    &copy; 2007 - ' . date('Y') . ' {SITENAME} &nbsp;&nbsp; {SITEDISCLAIMER} &nbsp;&nbsp;&nbsp;<a href="#container">'.LAN_THEME_12.'</a>
      <div class="copy">'.LAN_THEME_6.'</div>
      <!-- Please dont remove my credits! I worked hard to create this theme and distribute it freely. Thanks! -->
      </div>
    </div>
  </div>
';

$LAYOUT['_header_'] = '
<div id="container" >
  <div id="headbar" class="container-fluid">
    <div id="headcont" class="row">
      <div class="headcontlogo col-md-6">
      <h1 class="dtitle"><a href="{SITEURL}" title="{SITENAME}">{SITENAME}</a></h1>
      <h2 class="dtitle">{SITETAG}</h2>
      </div>
      <div class="headcontbanner  col-md-6"> 
      {SETIMAGE: w=450}
      {BANNER=e107promo}
      </div>
    </div>
  </div>
  <div id="menubar" class="navbar navbar-inverse container-fluid" role="navigation">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="navbar-collapse collapse ">
        	{NAVIGATION=main}
        </div><!--/.navbar-collapse -->     
    </div>
';

$LAYOUT['3columns'] = '
  <div id="bodybar" class="container-fluid">
    <div id="bodycont" class="row">
        <div id="leftsidecont"  class="col-md-3 col-sm-6 col-xs-6 col-xxs-12" >
          <div class="innerside">
	          {SETSTYLE=sidebar}
	          {NAVIGATION=side}
	          {SETSTYLE=sidebar}
	          {MENU=1}
          </div>
        </div>
      <div id="sidecont" class="col-md-3 col-sm-6  col-md-push-6 col-xs-6 col-xxs-12">
        <div class="innerside">
	        {SETSTYLE=sidebar}
	        {NAVIGATION=alt}
	        {SETSTYLE=sidebar}
	        {MENU=2}        
        </div>
      </div>
        <div id="maincont"  class="col-md-6 col-sm-12  col-md-pull-3 col-xs-12 col-xxs-12"  >					
          <div class="padmaincont">
          {SETSTYLE=topmenu}
					{WMESSAGE}         
        	{MENU=3}
					 {---}
          {MENU=4}
          </div>
        </div>
    </div>
';
 

$LAYOUT['sidebar_right']  = '
  <div  class="container-fluid"> 
      <div  class="row" >
        <div id="leftsidecont"  class="col-md-3 col-sm-6 col-xs-12 col-xxs-12" >
          <div class="innerside">
    				{SETSTYLE=sidebar}
	          {NAVIGATION=side}
	          {MENU=1}
          </div>
        </div>              
        <div id="maincont" class="col-md-9 col-sm-6 col-xs-12 col-xxs-12">
          <div class="padmaincont"> 
					{---} 
					</div> 
        </div> 
    </div>
';

$LAYOUT['sidebar_left']  = '
  <div  class="container-fluid">
    <div id="bodycont">
      <div id="onewrap">
        <div id="leftsidecontone">
          <div class="innerside">
   					{SETSTYLE=sidebar}
	          {NAVIGATION=side}
            {MENU=1}
          </div>
        </div>
        <div id="maincontone">
          <div class="padmaincont">
					{---} 
          </div>
        </div>
      </div>
    </div>
';
 
$LAYOUT['full']  = '  <div id="bodybar" class="container-fluid">
    <div id="fbodycont">   {---} 
    </div>

';
//$CUSTOMPAGES["FULL"] = ' forum/ ';

//	[tablestyle]
function tablestyle($caption, $text, $id='', $info=array())
{
	global $style;
	
	echo "<!-- tablestyle: style=".$style." id=".$id." -->\n\n";
	
		if($id == 'login_page') // Example - If rendered from 'welcome message' 
	{
		echo $text;
		return;	
	}
	
	
switch ($style) {
	case 'sidebar':
	echo '
      <div class="headerbox"><h2>'.$caption.'</h2></div>
      <div class="insidebox">
      '.$text.'
      </div>
        ';
	break;
	case 'footerbar':
	echo '
<h3>'.$caption.'</h3>
<div class="footerbar">'.$text.'</div>
        ';
	break;
	case 'topmenu':
	echo '
  <table class="toppost" style="width: 100%; padding: 8px 0;" cellpadding="0" cellspacing="0">
    <tr>
      <td style="vertical-align: top;">
      <h3 class="hometoptitle">
      '.$caption.'
      </h3>
      </td>
    </tr>
    <tr>
      <td style="vertical-align: top;">
      <div class="padmaincont">
      '.$text.'
      </div>
      </td>
    </tr>
  </table>
        ';
	break;	

	case 'bottommenu':
	echo '
  <table class="toppost" style="width: 100%; padding: 8px 0;" cellpadding="0" cellspacing="0">
    <tr>
      <td style="vertical-align: top;">
      <h3 class="hometoptitle">
      '.$caption.'
      </h3>
      </td>
    </tr>
    <tr>
      <td style="vertical-align: top;">
      <div class="padmaincont">
      '.$text.'
      </div>
      </td>
    </tr>
  </table>
        ';
	break;	
	case 'full':
	echo '
  <table class="toppost" style="width: 100%; padding: 8px 0;" cellpadding="0" cellspacing="0">
    <tr>
      <td style="vertical-align: top;">
      <h3 class="hometoptitle">
      '.$caption.'
      </h3>
      </td>
    </tr>
    <tr>
      <td style="vertical-align: top;">
      <div class="padmaincont">
      '.$text.'
      </div>
      </td>
    </tr>
  </table>
        ';
	break;	

	default:
	echo '

  <table class="toppost" style="width: 100%; padding: 8px 0;" cellpadding="0" cellspacing="0">
    <tr>
      <td style="vertical-align: top;">
      <h3 class="hometoptitle">
      '.$caption.'
      </h3>
      </td>
    </tr>
    <tr>
      <td style="vertical-align: top;">
      <div class="padmaincont">
      '.$text.'
      </div>
      </td>
    </tr>
  </table>

    ';
	break;
 }
}


define('THEME_DISCLAIMER', '<br /><i>'.LAN_THEME_1.'</i>');
define('ICONSTYLE', 'float: left; border:0');
define('COMMENTLINK', LAN_THEME_2);
define('COMMENTOFFSTRING', LAN_THEME_3);
define('PRE_EXTENDEDSTRING', '<div style="padding: 5px 15px; font-weight: bold;">');
define('EXTENDEDSTRING', LAN_THEME_4);
define('POST_EXTENDEDSTRING', '</div>');
define('TRACKBACKSTRING', LAN_THEME_5);
define('TRACKBACKBEFORESTRING', ' :: ');
define('ICONPDF', 'pdf.png');

//[newsstlyle]
$NEWSSTYLE = '

<table style="width: 100%;" cellpadding="0" cellspacing="0">
  <tr>
    <td style="vertical-align: top;">
      <h3>{NEWSTITLELINK=extend}</h3>
      <span class="hpnote">'.LAN_THEME_8.'&nbsp;{NEWSDATE=short}&nbsp;&nbsp;'.LAN_THEME_9.'&nbsp;{NEWSAUTHOR}&nbsp;&nbsp;'.LAN_THEME_11.'&nbsp;{NEWSCATEGORY}&nbsp;&nbsp;{NEWSCOMMENTS}</span>
    </td>
  </tr>
  <tr>
    <td style="vertical-align: top;">
		<div class="newscont">
		{NEWSIMAGE}{NEWSBODY}
		{EXTENDED}
		</div>				
    </td>
  </tr>
  <tr>
    <td style="vertical-align: top;">
{EMAILICON}
{PRINTICON}
{PDFICON}
{ADMINOPTIONS}				
    </td>
  </tr>  
</table>

';
 
  define('BULLET', 'bullet1.gif');
  
// Search shortcode style
$SEARCH_SHORTCODE = '
<div id="searchform_top">
<input type="text" value="" name="q" id="searchform_top_text" />
<input type="image" name="s" src="'.THEME_ABS.'images/button_go.gif" id="gosearch" />
</div>
';

// Comment post style
$sc_style["REPLY"]["pre"] = '<tr><td class="forumheader">';
$sc_style["REPLY"]["post"] = '</td>';

$sc_style["SUBJECT"]["pre"] = '<td class="forumheader">';
$sc_style["SUBJECT"]["post"] = '</td></tr>';

$sc_style["COMMENTEDIT"]["pre"] = '<tr><td class="forumheader" colspan="2" style="text-align: right">';
$sc_style["COMMENTEDIT"]["post"] = '</td></tr>';

$sc_style["JOINED"]["post"] = '<br />';

$sc_style["LOCATION"]["post"] = '<br />';

$sc_style["RATING"]["post"] = '<br /><br />';

$sc_style["COMMENT"]["post"] = "<br />";

$COMMENTSTYLE = '
<div class="spacer" style="text-align:center; background:#eadcc2;">
<table class="fborder" style="width: 95%; border: 0px none #faf0d7;">
  <tr>
    <td class="fcaption" colspan="2" style="border: 1px solid #faf0d7;">
    '.LAN_THEME_9.' {USERNAME} '.LAN_THEME_8.' {TIMEDATE}
    </td>
  </tr>
  {REPLY}{SUBJECT}
  <tr>
    <td style="width: 20%; vertical-align: top; border: 1px solid #faf0d7;" class="forumheader3">
    <div style="text-align: center">
    {AVATAR}
    {LEVEL}
    </div>
    <span class="smalltext">{JOINED}{COMMENTS}{LOCATION}{IPADDRESS}</span>
    </td>
    
    <td style="width: 80%; vertical-align: top; border: 1px solid #faf0d7;" class="forumheader3">
    {COMMENT}
    </td>
  </tr>
{COMMENTEDIT}
</table>
</div>';

// Chatbox post style
$CHATBOXSTYLE = "<br /><img src='".e_IMAGE_ABS."admin_images/chatbox_16.png' alt='' style='width: 16px; height: 16px; vertical-align: bottom' />
<b>{USERNAME}</b><br />{TIMEDATE}<br />{MESSAGE}<br />";

?> 