<?php
/*
 * e107 website system
 *
 * Copyright (C) 2008-2013 e107 Inc (e107.org)
 * Released under the terms and conditions of the
 * GNU General Public License (http://www.gnu.org/licenses/gpl.txt)
 *
 */
if (!defined('e107_INIT')) { exit; }
if(!defined("USER_WIDTH")){ define("USER_WIDTH","width:95%"); }

$FORUM_TEMPLATE['main']['start']			= "{FORUM_BREADCRUMB}
											<div class=''>

												<div class='form-group right'>
													{SEARCH}
												</div>
											</div>
											<div id='forum' >
											<table class='table table-striped table-bordered table-hover'>
											<colgroup>
											<col style='width:3%' />
											<col />
											<col class='hidden-xs' style='width:10%' />
											<col style='width:10%' />
											<col class='hidden-xs' style='width:20%' />
											</colgroup>
											<tr>
											<th colspan='5'>{FORUMTITLE}</th>
											</tr>";

$FORUM_TEMPLATE['main']['parent']			= 	"<tr>
											<th class='rowpicleft' colspan='2'><span class='cattitle'>&nbsp;»&nbsp;{PARENTNAME}</span> {PARENTSTATUS}</th>
											<th class='rowpicright hidden-xs text-center'>".LAN_FORUM_0003."</th>
											<th class='rowpicright text-center'>".LAN_FORUM_0002."</th>
											<th class='rowpicright hidden-xs text-center'>".LAN_FORUM_0004."</th>
											</tr>";



$FORUM_TEMPLATE['main']['forum']			= 	"<tr class='gradient'>
											<td class='row1 newflag'>{NEWFLAG}</td>
											<td class='row1'>{FORUMNAME}<br /><small>{FORUMDESCRIPTION}</small>{FORUMSUBFORUMS}</td>
											<td class='row2 hidden-xs text-center'>{REPLIESX}</td>
											<td class='row1 text-center'>{THREADSX}</td>
											<td class='row2 hidden-xs text-center'><small>{LASTPOST:type=username} {LASTPOST:type=datelink}</small></td>
											</tr>";

//{LASTPOST:type=username} + {LASTPOST:type=datelink} can also be replaced by the legacy shortcodes {LASTPOST} or {LASTPOSTUSER} + {LASTPOSTDATE}

$FORUM_TEMPLATE['main']['end']				= "</table><div class='forum-footer center'><small>{USERINFOX}</small></div></div>";

// $FORUM_WRAPPER['main']['forum']['USERINFOX'] = "{FORUM_BREADCRUMB}(html before){---}(html after)";

// Tracking
$FORUM_TEMPLATE['track']['start']       = "{FORUM_BREADCRUMB}<div id='forum-track'>
											<table class='table table-striped table-bordered table-hover'>
											<colgroup>
											<col style='width:5%' />
											<col />
											<col style='width:15%' />
											<col style='width:5%' />
											</colgroup>
											<thead>
											<tr>

												<th colspan='2'>".LAN_FORUM_1003."</th>
												<th class='hidden-xs text-center'>".LAN_FORUM_0004."</th>
												<th class='text-center'>".LAN_FORUM_1020."</th>
												</tr>
											</thead>
											";

$FORUM_TEMPLATE['track']['item']        = "<tr>
											<td class='text-center'>{NEWIMAGE}</td>
											<td>{TRACKPOSTNAME}</td>
											<td class='hidden-xs text-center'><small>{LASTPOSTUSER} {LASTPOSTDATE}</small></td>
											<td class='text-center'>{UNTRACK}</td>
											</tr>";


$FORUM_TEMPLATE['track']['end']         = "</table>\n</div>";




/*
$FORUM_TEMPLATE['main-end']				.= "

<div class='center'>
	<small class='muted'>{PERMS}</small>
	</div>
<table style='".USER_WIDTH."' class='fborder table'>\n<tr>
<td colspan='2' style='width:60%' class='fcaption'>{INFOTITLE}</td>\n</tr>\n<tr>
<td rowspan='4' style='width:5%; text-align:center' class='forumheader3'>{LOGO}</td>
<td style='width:auto' class='forumheader3'>{USERINFO}</td>\n</tr>
<tr>\n<td style='width:95%' class='forumheader3'>{INFO}</td>\n</tr>
<tr>\n<td style='width:95%' class='forumheader3'>{FORUMINFO}</td>\n</tr>
<tr>\n<td style='width:95%' class='forumheader3'>{USERLIST}<br />{STATLINK}</td>\n</tr>\n</table>
";
*/
?>
