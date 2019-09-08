<!-- BEGIN switch_preview_sig -->
<form method="post" action="{SIG_PREVIEW_LINK}" name="preview">
<div align="center">
<table border="0" cellpadding="3" cellspacing="1" width="660" class="forumline">
	<tr> 
		<th class="thHead" colspan="2" height="25" valign="middle">{SIG_PREVIEW}</th>
	</tr>
	<tr> 
		<td class="row1" width="140" height="140"><span class="gen">{L_SIGNATURE}:</span></td>
		<td class="row2" width="520" valign="bottom"><span class="gen">{REAL_PREVIEW}</span></td>
	</tr>
	<tr> 
		<td class="row1" width="140" height="20"><span class="gen"></span></td>
		<td class="row2" width="520" valign="middle" nowrap="nowrap">&nbsp;</td>
	</tr>
</table>

</div>

<br />

<div align="center">

<table border="0" cellpadding="3" cellspacing="1" width="660" class="forumline">
	<tr> 
		<th class="thHead" colspan="2" height="25" valign="middle">{SIG_EDIT}</th>
	</tr>
	<tr>
		<td class="row1" width="130" height="20">&nbsp;</td>
		<td class="row2" width="530" align="middle">
		<INPUT TYPE="button" value=" B " style="font-weight:bold; width: 30px" onClick="document.preview.signature.value=document.preview.signature.value + '[b][/b]';">
		<INPUT TYPE="button" value=" i " style="font-style:italic; width: 30px" onClick="document.preview.signature.value=document.preview.signature.value + '[i][/i]';">
		<INPUT TYPE="button" value=" u " style="text-decoration: underline; width: 30px" onClick="document.preview.signature.value=document.preview.signature.value + '[u][/u]';">
		<INPUT TYPE="button" value="URL" style="text-decoration: underline; width: 40px" onClick="document.preview.signature.value=document.preview.signature.value + '[url][/url]';">
		<INPUT TYPE="button" value="Img" style="width: 40px" onClick="document.preview.signature.value=document.preview.signature.value + '[img][/img]';">
		</td>
	</tr>
	<tr> 
		<td class="row1" width="130" height="150"><span class="gen">{L_SIGNATURE}:</span><br /><span class="gensmall">{L_SIGNATURE_EXPLAIN}<br /><br />{HTML_STATUS}<br />{BBCODE_STATUS}<br />{SMILIES_STATUS}</span></td>
		<td class="row2" width="530" align="middle"><textarea name="signature" style="width: 450px" rows="8" cols="70" class="post">{PREVIEW}</textarea></td>
	</tr>
	<tr> 
		<td class="row1" width="130" height="20">&nbsp;</td>
		<td class="row2" width="530" align="middle">
		<INPUT TYPE="button" VALUE="{SIG_CURRENT}" onClick="location='{SIG_CURRENT_LINK}'">
		<INPUT TYPE="submit" VALUE="{SIG_PREVIEW}" name="preview">
		<INPUT TYPE="submit" VALUE="{SIG_SAVE}" name="save">
		</td>
	</tr>
</table>
</div>
</form>
<!-- END switch_preview_sig -->

<!-- BEGIN switch_current_sig -->
<form method="post" action="{SIG_PREVIEW_LINK}" name="preview">
<div align="center">
<table border="0" cellpadding="3" cellspacing="1" width="660" class="forumline">
	<tr> 
		<th class="thHead" colspan="2" height="25" valign="middle">{SIG_CURRENT}</th>
	</tr>
	<tr> 
		<td class="row1" width="140" height="140"><span class="gen">{L_SIGNATURE}:</span></td>
		<td class="row2" width="520" valign="bottom"><span class="gen">{CURRENT_PREVIEW}</span></td>
	</tr>
	<tr> 
		<td class="row1" width="140" height="20"><span class="gen"></span></td>
		<td class="row2" width="520" valign="middle" nowrap="nowrap">&nbsp;</td>
	</tr>
</table>

</div>

<br />

<div align="center">

<table border="0" cellpadding="3" cellspacing="1" width="660" class="forumline">
	<tr> 
		<th class="thHead" colspan="2" height="25" valign="middle">{SIG_EDIT}</th>
	</tr>
	<tr>
		<td class="row1" width="130" height="20">&nbsp;</td>
		<td class="row2" width="530" align="middle">
		<INPUT TYPE="button" value=" B " style="font-weight:bold; width: 30px" onClick="document.preview.signature.value=document.preview.signature.value + '[b][/b]';">
		<INPUT TYPE="button" value=" i " style="font-style:italic; width: 30px" onClick="document.preview.signature.value=document.preview.signature.value + '[i][/i]';">
		<INPUT TYPE="button" value=" u " style="text-decoration: underline; width: 30px" onClick="document.preview.signature.value=document.preview.signature.value + '[u][/u]';">
		<INPUT TYPE="button" value="URL" style="text-decoration: underline; width: 40px" onClick="document.preview.signature.value=document.preview.signature.value + '[url][/url]';">
		<INPUT TYPE="button" value="Img" style="width: 40px" onClick="document.preview.signature.value=document.preview.signature.value + '[img][/img]';">
		</td>
	</tr>
	<tr> 
		<td class="row1" width="130" height="150"><span class="gen">{L_SIGNATURE}:</span><br /><span class="gensmall">{L_SIGNATURE_EXPLAIN}<br /><br />{HTML_STATUS}<br />{BBCODE_STATUS}<br />{SMILIES_STATUS}</span></td>
		<td class="row2" width="530" align="middle"><textarea name="signature" style="width: 450px" rows="8" cols="70" class="post">{SIGNATURE}</textarea></td>
	</tr>
	<tr> 
		<td class="row1" width="130" height="20">&nbsp;</td>
		<td class="row2" width="530" align="middle">
		<INPUT TYPE="button" VALUE="{SIG_CURRENT}" onClick="location='{SIG_CURRENT_LINK}'">
		<INPUT TYPE="submit" VALUE="{SIG_PREVIEW}" name="preview">
		<INPUT TYPE="submit" VALUE="{SIG_SAVE}" name="save">
		</td>
	</tr>
</table>
</div>
</form>
<!-- END switch_current_sig -->

<!-- BEGIN switch_save_sig -->
<table border="0" cellpadding="3" cellspacing="1" width="100%" class="forumline">
	<tr> 
		<th class="thHead" height="25" valign="middle">{SIG_SAVE}</th>
	</tr>
	<tr> 
		<td class="row1" valign="middle" align="middle" height="140"><span class="gen">{SAVE_MESSAGE}</span></td>
	</tr>
	<tr> 
		<td class="row2" align="middle">
		<INPUT TYPE="button" VALUE="{SIG_CURRENT}" onClick="location='{SIG_CURRENT_LINK}'">
		</td>
	</tr>
</table>
<!-- END switch_save_sig -->

</center>
