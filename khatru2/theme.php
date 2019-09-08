<?php
/*
+---------------------------------------------------------------+
|	e107 website system
|
|	(C)Steve Dunstan 2001-2005
|	http://e107.org
|	jalist@e107.org
|
|	Released under the terms and conditions of the
|	GNU General Public License (http://gnu.org).
+---------------------------------------------------------------+
*/
if (!defined('e107_INIT')) { exit; }

// [multilanguage]
e107::lan('theme');
         
 
//define("FONTAWESOME", 	4);
define('VIEWPORT', 		"width=device-width, initial-scale=1.0");
/* example for set specific body class  */
//define('BODYTAG', '<body class="body-class '.THEME_LAYOUT.'">');

// set local or CDN version in Settings/Libraries 
e107::library('load', 'bootstrap');

e107::css("theme", "assets/khatru.css"); 
e107::library('load', 'fontawesome');

define("STANDARDS_MODE", TRUE);
$xhtmlcompliant = TRUE;
$csscompliant = TRUE;
define("IMODE", "lite");
define("THEME_DISCLAIMER", "<br /><i>".LAN_THEME_1."</i>");

// [layout]

$layout = "_default";

 

define("BOXOPEN", "
<div class='spacer'>
<div class='dcaption'>
<div class='left'></div>
<div class='right'></div>
<div class='center'>");

define("BOXMAIN", "
</div>
</div>
<div class='dbody'>
<div class='leftwrapper'>
<div class='rightwrapper'>
<div class='leftcontent'></div>
<div class='rightcontent'></div>
<div class='dcenter'><div class='dinner'>
");

define("BOXCLOSE", "
</div></div>
</div>
</div>
</div>
<div class='dbottom'>
<div class='left'></div>
<div class='right'></div>
<div class='center'></div>
</div>
</div>");

define("BOXOPEN2", "
<div class='spacer'>
<div class='dntop'></div>
<div class='dbody'>
<div class='leftwrapper'>
<div class='rightwrapper'>
<div class='leftcontent'></div>
<div class='rightcontent'></div>
<div class='dcenter'><div class='dinner'>
");

define("BOXCLOSE2", "
</div></div>
</div>
</div>
</div>
<div class='dbottom'>
<div class='left'></div>
<div class='right'></div>
<div class='center'></div>
</div>
</div>
");



$LAYOUT['_header_'] = '
<div class="container-fluid">  
  <div id="header" class="row">  
    <div id="logo"  class="col-md-6 col-sm-6 col-xs-12 col-xxs-12 text-center">              
      {SETIMAGE: w=200} {SITELOGO}   
    </div>  
    <div id="banner" class="col-md-6 col-sm-6 col-xs-12 col-xxs-12 text-center">              
      {SETIMAGE: w=450} {BANNER=e107promo}   
    </div>  
  </div>
</div>
 

';


$LAYOUT['_footer_'] = '

<div class="container-fluid">
	<div id="footer">
		{SITEDISCLAIMER}<br />{THEME_DISCLAIMER}
	</div>
</div>
</div>
';

$LAYOUT['standard'] =  
'<div class="container-fluid">
 <div class="row">
 <div id="mainbox" class="row">
 
  	<div id="leftcontent" class="col-md-2">
			{SITELINKS}
			{MENU=1}
		</div>
      <div id="centercontent" class="col-md-8">
   	{---} 
      	</div>
    	<div id="rightcontent" class="col-md-2">
			{MENU=2}
		</div>
    </div>
  </div>
</div>';
 


function tablestyle($caption, $text)
{
	echo "
<div class='dcaption'>
<div class='left'></div>
<div class='right'></div>
<div class='center'>$caption</div>
</div>
<div class='dbody'>
<div class='leftwrapper'>
<div class='rightwrapper'>
<div class='leftcontent'></div>
<div class='rightcontent'></div>
<div class='dcenter'><div class='dinner'>$text</div></div>
</div>
</div>
</div>
<div class='dbottom'>
<div class='left'></div>
<div class='right'></div>
<div class='center'></div>
</div>
";
}

// [linkstyle]

define('PRELINK', "");
define('POSTLINK', "");
define('LINKSTART', "");
define("LINKSTART_HILITE", "");
define('LINKEND', "<br />");
define('LINKDISPLAY', 2);
define('LINKALIGN', "left");
define("BULLET", "bullet.png");
define("bullet", "bullet.png");

$NEWSSTYLE = "
<div class='news'>
<div class='row'>
<div class='col-md-12'>
<div class='newheadline'>
{NEWSTITLE}
</div>
<div class='newsinfo'>
{NEWSAUTHOR}
, 
{NEWSDATE}
 // 
{NEWSCOMMENTS}{TRACKBACK}
</div>
<br />
<div class='newstext'>
{NEWSBODY}
{EXTENDED}
</div>
</div>
</div>
</div>
<br /><br />";
define("ICONSTYLE", "float: left; border:0");
define("COMMENTLINK", LAN_THEME_3);
define("COMMENTOFFSTRING", LAN_THEME_2);
define("PRE_EXTENDEDSTRING", "<br /><br />[ ");
define("EXTENDEDSTRING", LAN_THEME_4);
define("POST_EXTENDEDSTRING", " ]<br />");
define("TRACKBACKSTRING", LAN_THEME_5);
define("TRACKBACKBEFORESTRING", ", ");

$CHATBOXSTYLE = "
<br />
<img src='".THEME_ABS."images/bullet.png' alt=''  />
<span class='chatb'>{USERNAME}</span>
<div class='smalltext'>
{TIMEDATE}<br />
</div>
{MESSAGE}
<br /><br />";

$COMMENTSTYLE = "
<table style='width:100%'>
<tr>
<td colspan='2' class='commentinfo'>
{SUBJECT}
<b>
{USERNAME}
</b>
 |
{TIMEDATE}
</td>
</tr>
<tr>
<td style='width:30%; vertical-align:top'>
<div class='spacer'>
{AVATAR}
</div>
<span class='smalltext'>
{COMMENTS}
<br />
{JOINED}
</span>
<br />
{REPLY}
</td>
<td style='width:70%; vertical-align:top'>
{COMMENT}
<div style='text-align: right;' class='smallext'>{IPADDRESS}</div>
</td>
</tr>
</table>
<br />";

?>