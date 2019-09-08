<table width="100%" cellspacing="2" cellpadding="2" border="0" align="center">
  <tr>
	<td align="left" valign="bottom"><span class="maintitle">{arcade_search.L_SEARCH_MATCHES}</span><br /></td>
  </tr>
</table>
    <!-- END arcade_search -->
{HEADINGARCADE}
{WHOISPLAYING}
<table width="100%" cellpadding="2" cellspacing="1" border="0" class="row2">
  <tr>
  </tr>
  <!-- BEGIN use_category_mod -->
  <tr> 
	<td class="cat" colspan="{ARCADE_COL}" nowrap="nowrap" align="center"><span class="cattitle">{CATTITLE}</span></td>
  </tr>
  <!-- END use_category_mod -->
  <tr> 
	<td class="rowpic1" height="27" align="center" colspan="2"><span class="cattitle">{L_GAME}</span></td>
	<td class="rowpic1" nowrap="nowrap" align="center"><span class="cattitle">{L_HIGHSCORE}</span></td>
	<td class="rowpic1" nowrap="nowrap" align="center"><span class="cattitle">{L_YOURSCORE}</span></td>
  </tr>
<!-- BEGIN favrow -->

<tr>
	<td class="cat" colspan="6"><span class="cattitle">{FAV}</span></td>
</tr>
	  
	  <!-- BEGIN fav_row -->
	  <tr>
			<td class="row1" width="35">{favrow.fav_row.GAMEPICF}</td>
			
			<td class="row1" width="100" align="center">
                        <span class='genmed'>{favrow.fav_row.GAMELINKF}</span><br />
                        <span class='genmed'>{favrow.fav_row.GAMEPOPUPLINKF}</span><br />
                        <span class='gensmall'>{favrow.fav_row.GAMESETF}</span>
			</td>
			
			<td class="row1" width="150" align="center" valign="center" >
				<span class='gen'>{favrow.fav_row.NORECORDF}
				<!-- BEGIN recordrow -->
				<b>{favrow.fav_row.HIGHSCOREF}</b></span><span class='gensmall'>   {favrow.fav_row.HIGHUSERF}<br/>{favrow.fav_row.DATEHIGHF}
				<!-- END recordrow -->
			 	</span>
			</td>
			
			<td class="row1" width="150" align="center" valign="center" >
				<span class='gen'>{favrow.fav_row.NOSCOREF}
				<!-- BEGIN yourrecordrow -->
				<b>{favrow.fav_row.YOURHIGHSCOREF}{favrow.fav_row.IMGFIRSTF}</b></span><span class='gensmall'><br/>{favrow.fav_row.YOURDATEHIGHF}
				<!-- END yourrecordrow -->
	<!-- BEGIN playrecordrow -->
	<b>{favrow.fav_row.CLICKPLAY}</b>
	   <!-- END playrecordrow -->
				</span>   
					</tr>
				</table>
			  </td>
</tr>		 
<!-- END fav_row -->
<br>
<tr>
	<td class="cat" colspan="6"><span class="cattitle">{L_GAME}</span></td>
</tr>
<!-- END favrow -->
  <!-- BEGIN gamerow -->
  <tr> 
	<td class="row1" height="25" width='35' align='center'>{gamerow.GAMEPIC}</td>
	<td class="row1" height="25">
	    <span class='genmed'>{gamerow.GAMELINK}</span><br />
	    <span class='genmed'>{gamerow.GAMEPOPUPLINK}</span><br />
		<span class='gensmall'>{gamerow.GAMESET}</span>
	</td>
	<td class="row1" align="center" valign="center" >
		<span class='gen'>
		{gamerow.NORECORD}
	  <!-- BEGIN recordrow -->
	<b>{gamerow.HIGHSCORE}</b></span><span class='gensmall'>&nbsp;&nbsp;{gamerow.HIGHUSER}<br/>{gamerow.DATEHIGH}
	   <!-- END recordrow -->
	    </span>
	   
	</td>
	<td class="row1" align="center" valign="center" >
	<span class='gen'>
		{gamerow.NOSCORE}
	  <!-- BEGIN yourrecordrow -->
	<b>{gamerow.YOURHIGHSCORE}{gamerow.IMGFIRST}</b></span><span class='gensmall'><br/>{gamerow.YOURDATEHIGH}
	   <!-- END yourrecordrow -->
	<!-- BEGIN playrecordrow -->
	<b>{gamerow.CLICKPLAY}</b>
	   <!-- END playrecordrow -->
	    </span>   
	</td>
  </tr>
  <!-- END gamerow -->
</table>


