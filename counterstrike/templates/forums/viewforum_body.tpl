<form method="post" action="{S_POST_DAYS_ACTION}">
  <table width="100%" cellspacing="2" cellpadding="2" border="0" align="center">
	<tr> 
	  <td align="left" valign="bottom" colspan="2"><a class="maintitle" href="{U_VIEW_FORUM}">{FORUM_NAME}</a><br /><span class="gensmall"><b>{L_MODERATOR}: {MODERATORS}<br /><br />{LOGGED_IN_USER_LIST}</b></span></td>
	  <td align="right" valign="bottom" nowrap="nowrap"><span class="gensmall"><b>{PAGINATION}</b></span></td>
	</tr>
	<tr> 
	  <td align="left" valign="middle" width="50"><a href="{U_POST_NEW_TOPIC}"><img src="{POST_IMG}" border="0" alt="{L_POST_NEW_TOPIC}" /></a></td>
	  <td align="left" valign="middle" class="nav" width="100%"><span class="nav">&nbsp;&nbsp;&nbsp;<a href="{U_INDEX}" class="nav">{L_INDEX}</a> </span>&raquo;<span class="nav"> <a class="nav" href="{U_VIEW_FORUM}">{FORUM_NAME}</a></span></td>
	  <td align="right" valign="bottom" class="nav" nowrap="nowrap"><span class="gensmall"><a href="{U_MARK_READ}" class="gensmall">{L_MARK_TOPICS_READ}</a></span></td>
	</tr>
  </table>

	<table border=0 cellpadding="2" cellspacing="2" width="100%" id="table1">
	<tr> 
		<td align="left" valign="top">
        
				
                
  <table border="0" cellpadding="0" cellspacing="0" width="100%" id="table7">
	<tr> 
	  <th colspan="2" height="29" class="rowpic1">&nbsp;{L_TOPICS}&nbsp;</th>
	  <th width="50" class="rowpic1" height="29">&nbsp;{L_REPLIES}&nbsp;</th>
	  <th width="100" class="rowpic1" height="29">&nbsp;{L_AUTHOR}&nbsp;</th>
	  <th width="50" class="rowpic1" height="29">&nbsp;{L_VIEWS}&nbsp;</th>
	  <th class="rowpic1" height="29">&nbsp;{L_LASTPOST}&nbsp;</th>
	</tr>
	
	<!-- BEGIN topicrow -->
	<!-- mod : split topic type -->
	<!-- BEGIN topictype -->
	<tr>
	  <td colspan="6" align="left" class="row2"><span class="cattitle">{topicrow.topictype.TITLE}</span></td>
	</tr>
	<!-- END topictype -->
<!-- fin mod : split topic type -->
	<tr> 
	  <td class="row1" align="center" width="30" height="30"><img src="{topicrow.TOPIC_FOLDER_IMG}"  alt="{topicrow.L_TOPIC_FOLDER_ALT}" title="{topicrow.L_TOPIC_FOLDER_ALT}" /></td>
	  <td class="row1" width="100%"  onclick="window.location.href='{topicrow.U_VIEW_TOPIC}'">
      <p style="margin-left: 5px; margin-right: 5px"><span class="nav">{topicrow.NEWEST_POST_IMG}{topicrow.TOPIC_TYPE}<a href="{topicrow.U_VIEW_TOPIC}" class="forumlink">{topicrow.TOPIC_TITLE}</a></span><span class="gensmall"><br />
		{topicrow.GOTO_PAGE}</span></td>
	  <td class="row1" align="center" valign="middle"><span class="gensmall">{topicrow.REPLIES}</span></td>
	  <td class="row2" align="center" valign="middle"><span class="gensmall">{topicrow.TOPIC_AUTHOR}</span></td>
	  <td class="row1" align="center" valign="middle"><span class="gensmall">{topicrow.VIEWS}</span></td>
	  <td class="row2" align="center" valign="middle" nowrap="nowrap">
      <p style="margin-left: 5px; margin-right: 5px"><span class="gensmall">{topicrow.LAST_POST_TIME}<br />{topicrow.LAST_POST_AUTHOR} {topicrow.LAST_POST_IMG}</span></td>
	</tr>
	<!-- END topicrow -->
	<!-- BEGIN switch_no_topics -->
	<tr> 
	  <td class="row1" colspan="6" height="30" align="center" valign="middle"><span class="gen">
      {L_NO_TOPICS}</span></td>
	</tr>
	<!-- END switch_no_topics -->
	<tr> 
	  <td class="row1" align="center" valign="middle" colspan="6" height="28"><span class="genmed">
      {L_DISPLAY_TOPICS}:&nbsp;{S_SELECT_TOPIC_DAYS}&nbsp; 
		<input type="submit" class="liteoption" value="{L_GO}" name="submit" />
		</span></td>
	</tr>
  </table>

        </td>
	</tr>
	</table>

  <table width="100%" cellspacing="2" border="0" align="center" cellpadding="2">
	<tr> 
	  <td align="left" valign="middle" width="50"><a href="{U_POST_NEW_TOPIC}"><img src="{POST_IMG}" border="0" alt="{L_POST_NEW_TOPIC}" /></a></td>
	  <td align="left" valign="middle" width="100%"><span class="nav">&nbsp;&nbsp;&nbsp;<a href="{U_INDEX}" class="nav">{L_INDEX}</a> </span>&raquo;<span class="nav"> <a class="nav" href="{U_VIEW_FORUM}">{FORUM_NAME}</a></span></td>
	  <td align="right" valign="middle" nowrap="nowrap"><span class="gensmall">{S_TIMEZONE}</span><br /><span class="nav">{PAGINATION}</span> 
		</td>
	</tr>
	<tr>
	  <td align="left" colspan="3"><span class="nav">{PAGE_NUMBER}</span></td>
	</tr>
  </table>
</form>

	<table border=0 cellpadding="2" cellspacing="2" width="100%" id="table4">
	<tr> 
		<td align="left" valign="top">
                <p align="right"><b>
{JUMPBOX}</b></p>
<div align="center">

<table width="100%" cellspacing="1" border="0" cellpadding="3" id="table8">
	<tr>
		<td align="left" class="row1" valign="top">
        <table cellspacing="3" cellpadding="0" border="0" id="table9">
			<tr>
				<td width="20" align="left"><img src="{FOLDER_NEW_IMG}" alt="{L_NEW_POSTS}"  /></td>
				<td class="gensmall">{L_NEW_POSTS}</td>
				<td>&nbsp;&nbsp;</td>
				<td width="20" align="center"><img src="{FOLDER_IMG}" alt="{L_NO_NEW_POSTS}"  /></td>
				<td class="gensmall">{L_NO_NEW_POSTS}</td>
				
				
			</tr>
			<tr> 
				<td width="20" align="center"><img src="{FOLDER_HOT_NEW_IMG}" alt="{L_NEW_POSTS_HOT}"  /></td>
				<td class="gensmall">{L_NEW_POSTS_HOT}</td>
				<td>&nbsp;&nbsp;</td>
				<td width="20" align="center"><img src="{FOLDER_HOT_IMG}" alt="{L_NO_NEW_POSTS_HOT}"  /></td>
				<td class="gensmall">{L_NO_NEW_POSTS_HOT}</td>
				
				
			</tr>
			<tr>
				<td class="gensmall"><img src="{FOLDER_LOCKED_NEW_IMG}" alt="{L_NEW_POSTS_TOPIC_LOCKED}"  /></td>
				<td class="gensmall">{L_NEW_POSTS_LOCKED}</td>
				<td>&nbsp;&nbsp;</td>
				<td class="gensmall"><img src="{FOLDER_LOCKED_IMG}" alt="{L_NO_NEW_POSTS_TOPIC_LOCKED}"  /></td>
				<td class="gensmall">{L_NO_NEW_POSTS_LOCKED}</td>
			</tr>
			<tr>
				<td class="gensmall"><img src="{FOLDER_ANNOUNCE_IMG}" alt="{L_ANNOUNCEMENT}"  /></td>
				<td class="gensmall">{L_ANNOUNCEMENT}</td>
				<td>&nbsp;</td>
				<td class="gensmall"><img src="{FOLDER_STICKY_IMG}" alt="{L_STICKY}"  /></td>
				<td class="gensmall">{L_STICKY}</td>
			</tr>
		</table>
        <p></td>
		<td class="row1" align="right"><span class="gensmall">{S_AUTH_LIST}</span></td>
	</tr>
</table>
    </div>
        </td>
	</tr>
	</table>
