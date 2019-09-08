

      

<table width="100%" cellspacing="0" cellpadding="2" border="0" align="center" id="table33">

  <tr> 

	<td align="left" valign="bottom"><span class="nav1">

	<!-- BEGIN switch_user_logged_in -->

	{LAST_VISIT_DATE}<br />

	<!-- END switch_user_logged_in -->

	{CURRENT_TIME}<br /><a href="{U_INDEX}" class="nav1">{L_INDEX}</a></span></td>

	<td align="right" valign="bottom" class="nav1">

		<!-- BEGIN switch_user_logged_in -->

		<a href="{U_SEARCH_NEW}" class="nav1">{L_SEARCH_NEW}</a><br /><a href="{U_SEARCH_SELF}" class="nav1">{L_SEARCH_SELF}</a><br />

		<!-- END switch_user_logged_in -->

		<a href="{U_SEARCH_UNANSWERED}" class="nav1">{L_SEARCH_UNANSWERED}</a></td>

  </tr>

</table>

      <p>{GLANCE_OUTPUT}</p>
<table width="100%" cellpadding="0" cellspacing="0" border="0" id="table26">

  <tr> 

	<th colspan="2" class="rowpic1" height="27" nowrap="nowrap">&nbsp;{L_FORUM}&nbsp;</th>

	<th width="50" class="rowpic1" nowrap="nowrap" height="27">&nbsp;{L_TOPICS}&nbsp;</th>

	<th width="50" class="rowpic1" nowrap="nowrap" height="27">&nbsp;{L_POSTS}&nbsp;</th>

	<th class="rowpic1" height="27">{L_LASTPOST}&nbsp;</th>

  </tr>



  <!-- BEGIN catrow -->



  <tr> 



	<td class="rowpicleft" colspan="2" height="28"><span class="cattitle">&nbsp;»&nbsp;<a href="{catrow.U_VIEWCAT}" class="cattitle">{catrow.CAT_DESC}</a></span></td>



	<td class="rowpicright" colspan="3" align="right">&nbsp;</td>



  </tr>



  <!-- BEGIN forumrow -->
  <tr> 

	<td class="row1" align="center" valign="top" ><img src="{catrow.forumrow.FORUM_FOLDER_IMG}" alt="{catrow.forumrow.L_FORUM_FOLDER_ALT}" title="{catrow.forumrow.L_FORUM_FOLDER_ALT}" /></td>

	<td class="row1" width="100%"    onclick="window.location.href='{catrow.forumrow.U_VIEWFORUM}'">
    <p style="margin-left: 5px; margin-right: 5px"><span class="forumlink"> <a href="{catrow.forumrow.U_VIEWFORUM}" class="forumlink">{catrow.forumrow.FORUM_NAME}</a><br />

	  </span> <span class="genmed">{catrow.forumrow.FORUM_DESC}<br />

	  </span><span class="gensmall">{catrow.forumrow.L_MODERATOR} {catrow.forumrow.MODERATORS}</span></td>

	<td class="row2" align="center" valign="middle" ><span class="gensmall">{catrow.forumrow.TOPICS}</span></td>

	<td class="row1" align="center" valign="middle" ><span class="gensmall">{catrow.forumrow.POSTS}</span></td>

	<td class="row2" align="center" valign="middle" nowrap="nowrap"> 
    <p style="margin-left: 5px; margin-right: 5px"> <span class="gensmall">{catrow.forumrow.LAST_POST}</span></td>

  </tr>

  <!-- END forumrow -->

  <!-- END catrow -->

  <tr> 

	<td class="rowpicleft" align="center" valign="middle" colspan="5" >
    <table border="0" cellpadding="0" style="border-collapse: collapse" width="100%" id="table34">
      <tr>
        <td height="28">
        <p style="margin-left: 2px; margin-right: 2px"><span class="cattitle">&nbsp;»&nbsp;</span><a href="{U_VIEWONLINE}" class="cattitle">{L_WHO_IS_ONLINE}</a></td>
        <td>
        <p align="right" style="margin-left: 2px; margin-right: 2px">
        <span class="gensmall">
        &nbsp;</span></td>
      </tr>
    </table>

	</td>

  </tr>

  <tr> 

	<td class="row1" align="center" valign="middle" colspan="5" >
    <p align="left" style="margin-left: 5px; margin-right: 5px">
    <span class="gensmall">{TOTAL_POSTS}<br />{TOTAL_USERS}<br />
    {NEWEST_USER}</span>

	</td>

  </tr>

  <tr> 

	<td class="row1" colspan="5" >
    <p align="left" style="margin-left: 5px; margin-right: 5px"><table border="0" cellpadding="0" style="border-collapse: collapse" width="100%" id="table35">
      <tr>
        <td>{TOTAL_USERS_ONLINE}</td>
        <td>
        <p align="right">
    <span class="gensmall">
        {L_ONLINE_EXPLAIN}</span></td>
      </tr>
    </table>
    [ {L_WHOSONLINE_ADMIN} ]   [ {L_WHOSONLINE_MOD} ]
	<!-- BEGIN colors -->
	{colors.GROUPS}
	<!-- END colors -->
	<br />{RECORD_USERS}<br />{LOGGED_IN_USER_LIST}</td>

  </tr>

  </table>



<div align="center">



<table cellspacing="0" width=100% border="0" cellpadding="0" id="table32">

  <tr> 

	<td class="row1" width="33%" align="center"><img src="themes/CounterStrike/forums/images/folder_new_big.gif" alt="{L_NEW_POSTS}"/>&nbsp;<br>
    <span class="gensmall">{L_NEW_POSTS}&nbsp;</span></td>

	<td class="row1" width="33%" align="center"><img src="themes/CounterStrike/forums/images/folder_big.gif" alt="{L_NO_NEW_POSTS}" />&nbsp;<br>
    <span class="gensmall">{L_NO_NEW_POSTS}&nbsp;</span></td>

	<td class="row1" width="33%" align="center"><img src="themes/CounterStrike/forums/images/folder_locked_big.gif" alt="{L_FORUM_LOCKED}" />&nbsp;<br>
    <span class="gensmall">{L_FORUM_LOCKED}</span></td>

  </tr>

</table>
        </div>