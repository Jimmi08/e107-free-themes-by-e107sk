
<table width="{GLANCE_TABLE_WIDTH}" cellpadding="0" cellspacing="0" border="0"  height="100%">
	<!-- BEGIN switch_glance_news -->
    <tr>
		<td class="row1" height="28" align="center" width="30">
	<!--	<span class="newsbutton" onClick="rollup_contract(this, 'phpbbGlance_news');">-->
    <!-- BEGIN switch_news_on -->
			-
    <!-- END switch_news_on -->
    <!-- BEGIN switch_news_off -->
			+
    <!-- END switch_news_off -->
		</span>
		</td>
		<td  height="28" align="left">
            <table width="100%" cellpadding="0" cellspacing="0" border="0">
            <tr><td align="left">
                <p style="margin-left: 5px">{NEWS_HEADING}
                </td>
        		<td class="row1">
                    {switch_glance_news.PREV_URL}&nbsp;&nbsp;{switch_glance_news.NEXT_URL}&nbsp;&nbsp;
                </td>
            </tr>
            </table>
        </td>
        <td  class="row1" width="100" align="center" nowrap="nowrap">&nbsp;{L_FORUM}&nbsp;</td>
        <td  class="row1" width="100" align="center" nowrap="nowrap">&nbsp;{L_AUTHOR}&nbsp;</td>
        <td  class="row1" width="50" align="center" nowrap="nowrap">&nbsp;{L_REPLIES}&nbsp;</td>
        <td  class="row1" align="center" nowrap="nowrap">&nbsp;{L_LASTPOST}&nbsp;</td>
    </tr>

    <!-- BEGIN switch_news_on -->
    <tbody id="phpbbGlance_news" >
    <!-- END switch_news_on -->
    <!-- BEGIN switch_news_off -->
    <tbody id="phpbbGlance_news" >
    <!-- END switch_news_off -->  

	<!-- END switch_glance_news -->
    <!-- BEGIN news -->
	<tr class="row1">
		<td class="row1" nowrap="nowrap" valign="middle" align="center" width="30"><a href="{news.TOPIC_LINK}">{news.BULLET}</a></td>
		<td class="row1" valign="middle" width="100%" >
        <p style="margin-left: 5px"><span class="genmed"><a href="{news.TOPIC_LINK}" class="row1">{news.TOPIC_TITLE}</a></span></td>
		<td class="row1" valign="middle"  nowrap="nowrap" align="center"><span class="genmed"><a href="{news.FORUM_LINK}" class="genmed">{news.FORUM_TITLE}</a></span></td>
		<td class="row1" valign="middle"  nowrap="nowrap" align="center"><span class="genmed">{news.TOPIC_POSTER}</span></td>
		<td class="row1" valign="middle"  nowrap="nowrap" align="center"><span class="genmed">{news.TOPIC_REPLIES}</span></td>
		<td class="row1" valign="middle"  nowrap="nowrap" align="center"><span class="genmed">{news.TOPIC_TIME}<br />{news.LAST_POSTER}</span></td>
	</tr>
	<!-- END news -->
    </tbody>

	<!-- BEGIN switch_glance_recent -->
    <tr>
		<th class="row1" height="28" align="center" width="30">
	<!--	<span class="newsbutton" onClick="rollup_contract(this, 'phpbbGlance_recent');">-->
    <!-- BEGIN switch_recent_on -->
			-
    <!-- END switch_recent_on -->
    <!-- BEGIN switch_recent_off -->
			+
    <!-- END switch_recent_off -->
		</span>
		</th>
		<th class="row1" height="28" align="left">
            <table width="100%" cellpadding="0" cellspacing="0" border="0">
            <tr><th align="left">
                <p style="margin-left: 5px">{RECENT_HEADING}
                </th>
        		<th align="right">
                    {switch_glance_recent.PREV_URL}&nbsp;&nbsp;{switch_glance_recent.NEXT_URL}&nbsp;&nbsp;
                </th>
            </tr>
            </table>
        </th>
        <th class="row1" width="100" align="center" nowrap="nowrap">&nbsp;{L_FORUM}&nbsp;</th>
        <th class="row1" width="100" align="center" nowrap="nowrap">&nbsp;{L_AUTHOR}&nbsp;</th>
        <th class="row1" width="50" align="center" nowrap="nowrap">&nbsp;{L_REPLIES}&nbsp;</th>
        <th class="row1" align="center" nowrap="nowrap">&nbsp;{L_LASTPOST}&nbsp;</th>
    </tr>

    <!-- BEGIN switch_recent_on -->
    <tbody id="phpbbGlance_recent" style="display: ;">
    <!-- END switch_recent_on -->
    <!-- BEGIN switch_recent_off -->
    <tbody id="phpbbGlance_recent" style="display: none;">
    <!-- END switch_recent_off -->  

	<!-- END switch_glance_recent -->

    
   
<!-- BEGIN recent -->
	<tr>
		<td nowrap="nowrap" valign="middle" class="row1" align="center" width="30"><a href="{recent.TOPIC_LINK}">{recent.BULLET}</a></td>
		<td valign="middle" width="100%" class="row1"  onclick="window.location.href='{recent.TOPIC_LINK}'"> 
        <p style="margin-left: 5px"> <span class="genmed"><a href="{recent.TOPIC_LINK}" class="forumlink">{recent.TOPIC_TITLE}</a></span></td>
		<td valign="middle" class="row1" nowrap="nowrap" align="center"><span class="genmed"><a href="{recent.FORUM_LINK}" class="genmed">{recent.FORUM_TITLE}</a></span></td>
		<td valign="middle" class="row1" nowrap="nowrap" align="center"><span class="genmed">{recent.TOPIC_POSTER}</span></td>
		<td valign="middle" class="row1" nowrap="nowrap" align="center"><span class="genmed">{recent.TOPIC_REPLIES}</span></td>
		<td valign="middle" class="row1" nowrap="nowrap" align="center"><span class="genmed">{recent.LAST_POST_TIME}<br />{recent.LAST_POSTER}</span></td>
	</tr>
    <!-- END recent -->
    </tbody>
</table>


