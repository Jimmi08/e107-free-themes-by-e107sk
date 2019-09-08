<?php
/*
+ ----------------------------------------------------------------------------+
|     e107 website system
|
|     Copyright (C) 2001-2002 Steve Dunstan (jalist@e107.org)
|     Copyright (C) 2008-2010 e107 Inc (e107.org)
|
|
|     Released under the terms and conditions of the
|     GNU General Public License (http://gnu.org).
|
|     $URL: https://e107.svn.sourceforge.net/svnroot/e107/trunk/e107_0.7/e107_themes/khatru/forum_template.php $
|     $Revision: 11678 $
|     $Id: forum_template.php 11678 2010-08-22 00:43:45Z e107coders $
|     $Author: e107coders $
+----------------------------------------------------------------------------+
*/
if (!defined('e107_INIT')) { exit; }

$FORUM_TEMPLATE['main']['start'] = "<div class='hidden'><div>".BOXOPEN."<div><table>"; // ex $FORUM_MAIN_START

$FORUM_TEMPLATE['main']['parent'] = "</table>".BOXCLOSE.BOXOPEN."<b>{PARENTNAME} {PARENTSTATUS}</b>".BOXMAIN."<table style='width:100%' class='nforumholder' cellpadding='0' cellspacing='0'>
<tr>
<td colspan='2' style='width:60%; text-align:center' class='nforumcaption2'>{FORUMTITLE}</td>
<td style='width:10%; text-align:center' class='nforumcaption2'>{THREADTITLE}</td>
<td style='width:10%; text-align:center' class='nforumcaption2'>{REPLYTITLE}</td>
<td style='width:20%; text-align:center' class='nforumcaption2'>{LASTPOSTITLE}</td>
</tr>"; // ex $FORUM_MAIN_PARENT
/*
$FORUM_TEMPLATE['main']['parent']			= 	"<tr class='forum-parent'>
											<th colspan='2'>{PARENTNAME} {PARENTSTATUS}</th>
											<th class='hidden-xs text-center'>".LAN_FORUM_0003."</th>
											<th class='text-center'>".LAN_FORUM_0002."</th>
											<th class='hidden-xs text-center'>".LAN_FORUM_0004."</th>
											</tr>";
*/

$FORUM_MAIN_PARENT_END = "</table>".BOXCLOSE;

$FORUM_TEMPLATE['main']['forum'] = "<tr>\n<td style='width:5%; text-align:center' class='nforumcaption3'>{NEWFLAG}</td>\n<td style='width:55%' class='nforumcaption3'>{FORUMNAME}<br /><span class='smallblacktext'>{FORUMDESCRIPTION}</span>{FORUMSUBFORUMS}</td>\n<td style='width:10%; text-align:center' class='nforumthread'>{THREADS}</td>\n<td style='width:10%; text-align:center' class='nforumthread'>{REPLIES}</td>\n<td style='width:20%; text-align:center' class='nforumthread'><span class='smallblacktext'>{LASTPOST}</span></td>\n</tr>"; // ex $FORUM_MAIN_FORUM


$FORUM_TEMPLATE['main']['end'] = "
</table>".BOXCLOSE.
BOXOPEN."<b>{INFOTITLE}</b>".BOXMAIN."

<table style='width:100%' class='nforumholder' cellpadding='0' cellspacing='0'>\n<tr>\n<td rowspan='4' style='width:5%; text-align:center' class='nforumthread'>{LOGO}</td>\n<td style='width:auto' class='nforumthread'>{USERINFO}</td>\n</tr>\n<tr>\n<td style='width:95%' class='nforumthread'>{INFO}</td>\n</tr><tr>\n<td style='width:95%' class='nforumthread'>{FORUMINFO}</td>\n</tr>\n<tr>\n<td style='width:95%' class='nforumthread'>{USERLIST}<br />{STATLINK}</td>\n</tr>\n</table>\n</div>\n<div class='spacer'>\n<table class='nforumholder' style='width:98%' cellpadding='0' cellspacing='0'>\n<tr>\n<td class='nforumthread' style='text-align:center; width:33%'>{ICONKEY}</td>\n<td style='text-align:center; width:33%' class='nforumthread'>{SEARCH}</td>\n<td style='width:33%; text-align:center; vertical-align:middle' class='nforumthread'><span class='smallblacktext'>{PERMS}</span>\n</td>\n</tr>\n</table><div class='nforumdisclaimer' style='text-align:center'>Powered by <b>e107 Forum System</b></div>".BOXCLOSE; // ex $FORUM_MAIN_END


$FORUM_NEWPOSTS_START = "<div style='text-align:center'>\n<div class='spacer'>\n<table style='width:95%' class='fborder'>\n<tr>\n<td style='width:3%' class='fcaption'>&nbsp;</td>\n<td style='width:60%' class='fcaption'>{NEWTHREADTITLE}</td>\n<td style='width:27%; text-align:center' class='fcaption'>{POSTEDTITLE}</td>\n</tr>";



$FORUM_NEWPOSTS_MAIN .= "<tr>\n<td style='width:3%' class='forumheader3'>{NEWIMAGE}</td>\n<td style='width:60%' class='forumheader3'>{NEWSPOSTNAME}</td>\n<td style='width:27%; text-align:center' class='forumheader3'>{STARTERTITLE}</td>\n</tr>";
 


$FORUM_NEWPOSTS_END .= "</table></div></div>";
 


$FORUM_TRACK_START = "<div style='text-align:center'>\n<div class='spacer'>\n<table style='width:95%' class='fborder'>\n<tr>\n<td colspan='3' style='width:60%' class='fcaption'>{TRACKTITLE}</td>\n</tr>\n";


$FORUM_TRACK_MAIN = "<tr>
<td style='text-align:center; vertical-align:middle; width:6%'  class='forumheader3'>{NEWIMAGE}</td>
<td style='vertical-align:middle; text-align:left; width:70%'  class='forumheader3'><span class='mediumtext'>{TRACKPOSTNAME}</span></td>
<td style='vertical-align:middle; text-align:center; width:24%'  class='forumheader3'><span class='mediumtext'>{UNTRACK}</td>
</tr>";
                


$FORUM_TRACK_END = "</table>\n</div>\n</div>";



?>