<?php
/*
+---------------------------------------------------------------+
|	e107 website system
|
|	©William Moffett 2001-2005
|	http://e107.net
|	que@e107.net
|
|	Released under the terms and conditions of the
|	GNU General Public License (http://gnu.org).
+---------------------------------------------------------------+
*/

if(!defined("e_THEME")){ exit; }
// [multilanguage]
// load translated strings
e107::lan('theme');

define(THEME_LEGACY,false); 

e107::library('load', 'fontawesome');
define("FONTAWESOME", 4);
 
e107::js("theme", "js/alert.js", 'jquery');
e107::js("theme", "js/transition.js", 'jquery');
e107::js("theme", "js/collapse.js", 'jquery');

//used in side layout in navigation_template.php 
define("PRELINK", "");
define("POSTLINK", "");
define("LINKSTART", "<img src='".THEME."images/bullet2.gif' alt='' />&nbsp;");
define("LINKEND", "<br />");

define("DREAMDISCLAIMER", "<i>BLACKv2</i> copyright Infade.net 2006 &nbsp;");
 
class infadeblack_theme
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
 
  	// default.echo "<h3>{$caption}</h3><div class='bodytable'>{$text}</div>";
  
  	if(!empty($caption))
  	{
  		echo '<h3 class="caption">'.$caption.'</h3>';
  	}
  
  	echo "<div class='bodytable'>{$text}</div>";		
  	return;

  }	
} 


// [newsstyle]

$NEWSSTYLE = "<h3>
{STICKY_ICON}
{NEWSICON}&nbsp;
{NEWSTITLE}
</h3>
<div class='bodytable' style='text-align:left'>
{NEWSBODY}
{EXTENDED}
</div>
<div style='text-align:right' class='smalltext'>
{NEWSAUTHOR}
on
{NEWSDATE}
<br />
<img src='".e_IMAGE_ABS."admin_images/userclass_16.png' alt='' style='vertical-align: middle;' />
{NEWSCOMMENTS} {TRACKBACK}
</div>
<br />
";

define("ICONSTYLE", "float: left; border:0");
define("COMMENTOFFSTRING", "Comments" ) ;
define("COMMENTLINK", "Comments" ) ;
define("PRE_EXTENDEDSTRING", "<br /><br />[ ");
define("EXTENDEDSTRING", LAN_THEME_4);
define("POST_EXTENDEDSTRING", " ]<br />");
define("TRACKBACKSTRING", "TrackBacks" ) ;
define("TRACKBACKBEFORESTRING", " | ");

// [linkstyle]
define("PRELINK", "");
define("POSTLINK", "");
define("LINKSTART", "<img src='".THEME."images/bullet2.gif' alt='' />&nbsp;");
define("LINKEND", "<br />");
define("LINKALIGN", "left");
define("LINKDISPLAY", 2);

 

// [commentstyle]
/*
$COMMENTSTYLE = "{USERNAME} @ <span class='smalltext'>{TIMEDATE}</span><br />
{AVATAR}<span class='smalltext'>{REPLY}</span><br />
{COMMENT}
<div style='text-align: right;' class='smallext'>{IPADDRESS}</div>"; 
*/
// [chatboxstyle]

$CHATBOXSTYLE = "
<div class='spacer'>
<div class='indentchat'>
<img src='".THEME."images/bullet.gif' />
<b>{USERNAME}</b><div style='text-align:left; padding:0px;'><span class='small' >{TIMEDATE}</span></div>
<span class='smalltext'><br />{MESSAGE}
</span><br><br />
</div>
</div>";

 ?>