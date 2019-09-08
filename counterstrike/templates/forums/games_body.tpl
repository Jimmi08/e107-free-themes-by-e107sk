<script language="JavaScript">
function resize_avatar(image)
{
  if ({MAXSIZE_AVATAR}>0)
  {
	if (image.width > {MAXSIZE_AVATAR} ) image.width={MAXSIZE_AVATAR} ;
  }
}
</script>
<div align="center"><table width="100%" cellspacing="0" cellpadding="2" border="0" align="center" id="table4">

  <tr> 

	<td align="left" valign="bottom">
    <p align="center"><table width="100%" cellspacing="2" cellpadding="2" border="0">
    <tr>
	  <td align="left" valign="middle" width="100%">
		<span class="nav">
			<a href="{U_INDEX}" class="nav">{L_INDEX}</a>&nbsp;>&nbsp;{NAV_DESC}&nbsp;>&nbsp;{CAT_TITLE}&nbsp;>
		</span>
		<span class="nav">{L_GAME}</span>
	  </td>
    </tr>
  </table>
<table width="100%" cellpadding="2" cellspacing="1" border="0" class="bodyline">
  <tr> 
	<th class="th" height="28" align="center">{L_GAME}</th>
  </tr>
  <tr>
 	<td class="row1" align="center">
		<table width="100%">
			<tr>
							<td align="center" valign="top" rowspan="2">
				&nbsp;<td class="bodyline" align="center"> 
            <!-- BEGIN game_type_V5 -->
		 <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" width="{GAME_WIDTH}" height="{GAME_HEIGHT}">
			<param name="movie" value="modules/Forums/games/{SWF_GAME}?arcade_hash={GAMEHASH}">
			<param name="quality" value="high">
			<embed src="modules/Forums/games/{SWF_GAME}?arcade_hash={GAMEHASH}" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="{GAME_WIDTH}" height="{GAME_HEIGHT}">
			</embed>
		</object>
            <!-- END game_type_V5 -->
            <!-- BEGIN game_type_V2 -->
		 <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" width="{GAME_WIDTH}" height="{GAME_HEIGHT}">
			<param name="movie" value="modules/Forums/games/{SWF_GAME}">
			<param name="quality" value="high">
			<param name="menu" value="false">
			<embed src="modules/Forums/games/{SWF_GAME}"  pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="{GAME_WIDTH}" height="{GAME_HEIGHT}">
			</embed>
		</object>
            <!-- END game_type_V2 -->
				</td>
			</tr>
		</table>
	 </td>
 </tr>
</table>
	 	    <table border="0" cellpadding="0" style="border-collapse: collapse" width="100%" id="table5" height="28">
      <tr>
        <td class="rowpic1">
        <p align="center"><span class="copyright">
        [{URL_ARCADE}]&nbsp;-&nbsp;[{URL_BESTSCORES}]&nbsp;-&nbsp;[{URL_SCOREBOARD}]&nbsp;-&nbsp;[&nbsp;{MANAGE_COMMENTS}]</span></td>
      </tr>
    </table>
{WHOISPLAYING}
  <table width="100%" cellpadding="5" cellspacing="1" border="0">
   <tr>
	<td align="center">
    </td>
   </tr>
  </table>
  
</td>

  </tr>

</table>
</div>