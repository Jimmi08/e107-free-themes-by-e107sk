<script language="JavaScript" src="modules/Forums/bbcode_box/add_bbcode.js" type="text/javascript"></script>

<body bgcolor="{T_BODY_BGCOLOR}" text="{T_BODY_TEXT}" link="{T_BODY_LINK}" vlink="{T_BODY_VLINK}">

<form action="{S_POST_ACTION}" method="post" name="post" onSubmit="return checkForm(this)" {S_FORM_ENCTYPE}>



{POST_PREVIEW_BOX}

{ERROR_BOX}



<table border="0" cellpadding="3" cellspacing="1" width="100%" class="forumline" id="table5">

	<tr> 

		<th class="thHead" colspan="2" height="25"><b>{L_POST_A}</b></th>

	</tr>

	<!-- BEGIN switch_username_select -->

	<tr> 

		<td class="row1"><span class="gen"><b>{L_USERNAME}</b></span></td>

		<td class="row1"><span class="genmed">
        <input type="text" class="post" tabindex="1" name="username1" size="25" maxlength="25" value="{USERNAME}" /></span></td>

	</tr>

	<!-- END switch_username_select -->

	<!-- BEGIN switch_privmsg -->

	<tr> 

		<td class="row1"><span class="gen"><b>{L_USERNAME}</b></span></td>

		<td class="row1"><span class="genmed"><input type="text"  class="post" name="username" maxlength="25" size="25" tabindex="1" value="{USERNAME}" />&nbsp;<input type="submit" name="usersubmit" value="{L_FIND_USERNAME}" class="liteoption" onClick="window.open('{U_SEARCH_USER}', '_phpbbsearch', 'HEIGHT=250,resizable=yes,WIDTH=400');return false;" /></span></td>

	</tr>

	<!-- END switch_privmsg -->

	<tr> 

	  <td class="row1" width="15%"><span class="gen"><b>{L_SUBJECT}</b></span></td>

	  <td class="row1" width="85%"> <span class="gen"> 

		<input type="text" name="subject" size="45" maxlength="60" style="width:100%" tabindex="2" class="post" value="{SUBJECT}" />

		</span> </td>

	</tr>

	<tr> 

	  <td class="row1" valign="top"> 

		<table width="100%" border="0" cellspacing="0" cellpadding="1" id="table6">

		  <tr> 

			<td><span class="gen"><b>{L_MESSAGE_BODY}</b></span> </td>

		  </tr>

		  <tr> 

			<td valign="middle" align="center"> <br />

			  <table width="100" border="0" cellspacing="0" cellpadding="5" id="table7">

				<tr align="center"> 

				  <td colspan="{S_SMILIES_COLSPAN}" class="gensmall"><b>{L_EMOTICONS}</b></td>

				</tr>

				<!-- BEGIN smilies_row -->

				<tr align="center" valign="middle"> 

				  <!-- BEGIN smilies_col -->

				  <td><img src="{smilies_row.smilies_col.SMILEY_IMG}" border="0" onMouseOver="this.style.cursor='hand';" onClick="emoticon('{smilies_row.smilies_col.SMILEY_CODE}');" alt="{smilies_row.smilies_col.SMILEY_DESC}" title="{smilies_row.smilies_col.SMILEY_DESC}" /></a></td>

				  <!-- END smilies_col -->

				</tr>

				<!-- END smilies_row -->

				<!-- BEGIN switch_smilies_extra -->

				<tr align="center"> 

				  <td colspan="{S_SMILIES_COLSPAN}"><span  class="nav"><a href="{U_MORE_SMILIES}" onClick="window.open('{U_MORE_SMILIES}', '_phpbbsmilies', 'HEIGHT=300,resizable=yes,scrollbars=yes,WIDTH=250');return false;" target="_phpbbsmilies" class="nav">{L_MORE_SMILIES}</a></span></td>

				</tr>

				<!-- END switch_smilies_extra -->

			  </table>

			</td>

		  </tr>

		</table>

	  </td>

	  <td class="row1" valign="top"><span class="gen"> <span class="genmed"> </span> 

		<table width="100%" border="0" cellspacing="0" cellpadding="2" id="table8">

		  <tr align="right" valign="middle"> 
			<td>
			  <p dir="rtl" style="margin-top: 0; margin-bottom: 0" align="left"><span class="gen"> 
			  <span class="genmed"> 
			  &nbsp;<select name="fc" onChange="BBCfc()" onMouseOver="helpline('fc')" 	
					  <option style="color:darkred; background-color: {T_TD_COLOR1}" value="darkred" class="genmed" dir="ltr">
              <option selected>Font Color</option>
              <option style="color:black;" value="{T_FONTCOLOR1}" value="{T_FONTCOLOR1}">{L_COLOR_DEFAULT}</option>
              <option value="darkred">{L_COLOR_DARK_RED}</option>
					  <option style="color:red; background-color: {T_TD_COLOR1}" value="red" class="genmed">{L_COLOR_RED}</option>
					  <option style="color:orange; background-color: {T_TD_COLOR1}" value="orange" class="genmed">{L_COLOR_ORANGE}</option>
					  <option style="color:brown; background-color: {T_TD_COLOR1}" value="brown" class="genmed">{L_COLOR_BROWN}</option>
					  <option style="color:yellow; background-color: {T_TD_COLOR1}" value="yellow" class="genmed">{L_COLOR_YELLOW}</option>
					  <option style="color:green; background-color: {T_TD_COLOR1}" value="green" class="genmed">{L_COLOR_GREEN}</option>
					  <option style="color:olive; background-color: {T_TD_COLOR1}" value="olive" class="genmed">{L_COLOR_OLIVE}</option>
					  <option style="color:cyan; background-color: {T_TD_COLOR1}" value="cyan" class="genmed">{L_COLOR_CYAN}</option>
					  <option style="color:blue; background-color: {T_TD_COLOR1}" value="blue" class="genmed">{L_COLOR_BLUE}</option>
					  <option style="color:darkblue; background-color: {T_TD_COLOR1}" value="darkblue" class="genmed">{L_COLOR_DARK_BLUE}</option>
					  <option style="color:indigo; background-color: {T_TD_COLOR1}" value="indigo" class="genmed">{L_COLOR_INDIGO}</option>
					  <option style="color:violet; background-color: {T_TD_COLOR1}" value="violet" class="genmed">{L_COLOR_VIOLET}</option>
					  <option style="color:white; background-color: {T_TD_COLOR1}" value="white" class="genmed">{L_COLOR_WHITE}</option>
					  <option style="color:black; background-color: {T_TD_COLOR1}" value="black" class="genmed">{L_COLOR_BLACK}</option>
			  </select>&nbsp;&nbsp; <select name="fs" onChange="BBCfs()" onMouseOver="helpline('fs')" 
			  		  <option value="7" class="genmed" dir="ltr">
              <option selected>Font Size</option>
              {L_FONT_TINY}</option>
					  <option value="9" class="genmed">{L_FONT_SMALL}</option>
					  <option value="12" class="genmed">{L_FONT_NORMAL}</option>
					  <option value="18" class="genmed">{L_FONT_LARGE}</option>
					  <option  value="24" class="genmed">{L_FONT_HUGE}</option>
					</select> <span lang="ar-sy">&nbsp;</span><select name="ft" onChange="BBCft()" onMouseOver="helpline('ft')" 
        <option style="color:black; background-color: #FFFFFF " value="{L_ARIAL}" class="genmed" dir="ltr">
                                          <option selected>Font type</option>
                                          <option value="Arial">Default font
                                          </option>
<option style="color:black; background-color: #FFFFFF " value="Andalus" class="genmed">
Andalus</option> 
<option style="color:black; background-color: #FFFFFF " value="Arial" class="genmed">
Arial</option> 
<option style="color:black; background-color: #FFFFFF " value="Comic Sans MS" class="genmed">
Comic Sans MS</option> 
<option style="color:black; background-color: #FFFFFF " value="Courier New" class="genmed">
Courier New</option> 
                                          <option value="Lucida Console">Lucida Console
                                          </option>
<option style="color:black; background-color: #FFFFFF " value="Microsoft Sans Serif" class="genmed">
Microsoft Sans Serif</option> 
<option style="color:black; background-color: #FFFFFF " value="Symbol" class="genmed">
Symbol</option> 
<option style="color:black; background-color: #FFFFFF " value="Tahoma" class="genmed">
Tahoma</option> 
<option style="color:black; background-color: #FFFFFF " value="Times New Roman" class="genmed">
Times New Roman</option> 
<option style="color:black; background-color: #FFFFFF " value="Traditional Arabic" class="genmed">
Traditional Arabic</option> 
<option style="color:black; background-color: #FFFFFF " value="Verdana" class="genmed">
Verdana</option> 
<option style="color:black; background-color: #FFFFFF " value="Webdings" class="genmed">
Webdings</option> 
<option style="color:black; background-color: #FFFFFF " value="Wingdings" class="genmed">
Wingdings</option> 
                                  </select></span></span></span><p dir="rtl" style="margin-top: 0; margin-bottom: 0">
              <span class="genmed"><span style="font-size: 5pt">&nbsp;</span></span></td>
		  </tr>
		  <tr> 
			<td width="100%"> 
			  <table width="100%" border="0" cellspacing="0" cellpadding="0" id="table9">
				<tr> 
                        <td> 
                          <table width="100%" border="0" cellspacing="0" cellpadding="0" id="table10"> 
                                <tr> 
                                  <td>
                                  <p dir="ltr" align="left"><span class="gen">  
			  <span class="genmed"> 
			                      <span lang="ar-sy">&nbsp;</span><img src="modules/Forums/bbcode_box/images/justify.gif" alt="justify" name="justify" width="30" height="27" border="0" style="border-style: outset; border-width: 1" onClick="BBCjustify()" onMouseOver="helpline('justify')" type="image"><img src="modules/Forums/bbcode_box/images/right.gif" alt="right" name="right" width="30" height="27" border="0" style="border-style: outset; border-width: 1" onClick="BBCright()" onMouseOver="helpline('right')" type="image"><img src="modules/Forums/bbcode_box/images/center.gif" alt="center" name="center" width="30" height="27" border="0" style="border-style: outset; border-width: 1" onClick="BBCcenter()" onMouseOver="helpline('center')" type="image"><img src="modules/Forums/bbcode_box/images/left.gif" alt="left" name="left" width="30" height="27" border="0" style="border-style: outset; border-width: 1" onClick="BBCleft()" onMouseOver="helpline('left')" type="image">&nbsp;&nbsp; 
                                  <img src="modules/Forums/bbcode_box/images/bold.gif" alt="bold" name="bold" width="30" height="27" border="0" style="border-style: outset; border-width: 1" onClick="BBCbold()" onMouseOver="helpline('b')" type="image"><img src="modules/Forums/bbcode_box/images/italic.gif" alt="italic" name="italic" width="30" height="27" border="0" style="border-style: outset; border-width: 1" onClick="BBCitalic()" onMouseOver="helpline('i')" type="image"><img src="modules/Forums/bbcode_box/images/under.gif" alt="under line" name="under" width="30" height="27" border="0" style="border-style: outset; border-width: 1" onClick="BBCunder()" onMouseOver="helpline('u')" type="image">&nbsp;&nbsp; 
                                  <img src="modules/Forums/bbcode_box/images/fade.gif" alt="fade" name="fade" width="30" height="27" border="0" style="border-style: outset; border-width: 1" onClick="BBCfade()" onMouseOver="helpline('fade')" type="image"><img src="modules/Forums/bbcode_box/images/grad.gif" alt="gradient" name="grad" width="30" height="27" border="0" style="border-style: outset; border-width: 1" onClick="BBCgrad()" onMouseOver="helpline('grad')" type="image">&nbsp;&nbsp; 
                                  <img src="modules/Forums/bbcode_box/images/rtl.gif" alt="Right to Left" name="dirrtl" width="30" height="27" border="0" style="border-style: outset; border-width: 1" onClick="BBCdir('rtl')" onMouseOver="helpline('rtl')" type="image"><img src="modules/Forums/bbcode_box/images/ltr.gif" alt="Left to Right" name="dirltr" width="30" height="27" border="0" style="border-style: outset; border-width: 1" onClick="BBCdir('ltr')" onMouseOver="helpline('ltr')" type="image">&nbsp;<img src="modules/Forums/bbcode_box/images/marqd.gif" alt="Marque to down" name="marqd" width="30" height="27" border="0" style="border-style: outset; border-width: 1" onClick="BBCmarqd()" onMouseOver="helpline('marqd')" type="image"><img src="modules/Forums/bbcode_box/images/marqu.gif" alt="Marque to up" name="marqu" width="30" height="27" border="0" style="border-style: outset; border-width: 1" onClick="BBCmarqu()" onMouseOver="helpline('marqu')" type="image"><img src="modules/Forums/bbcode_box/images/marql.gif" alt="Marque to left" name="marql" width="30" height="27" border="0" style="border-style: outset; border-width: 1" onClick="BBCmarql()" onMouseOver="helpline('marql')" type="image"><img src="modules/Forums/bbcode_box/images/marqr.gif" alt="Marque to right" name="marqr" width="30" height="27" border="0" style="border-style: outset; border-width: 1" onClick="BBCmarqr()" onMouseOver="helpline('marqr')" type="image"></span></span></td> 
                                </tr> 
                                <tr> 
                                  <td dir="rtl">
                                  <p align="right" dir="rtl" style="margin-top: 0; margin-bottom: 0">
                                  <span style="font-size: 5pt">&nbsp;</span><p align="left" dir="ltr" style="margin-top: 0; margin-bottom: 0"><span class="gen"> 
			  <span class="genmed"> 
			                      &nbsp;<img src="modules/Forums/bbcode_box/images/code.gif" alt="Code" name="code" width="30" height="27" border="0" style="border-style: outset; border-width: 1" onClick="BBCcode()" onMouseOver="helpline('code')" type="image"><img src="modules/Forums/bbcode_box/images/quote.gif" alt="Quote" name="quote" width="30" height="27" border="0" style="border-style: outset; border-width: 1" onClick="BBCquote()" onMouseOver="helpline('quote')" type="image"><img src="modules/Forums/bbcode_box/images/url.gif" alt="URL" name="url" width="30" height="27" border="0" style="border-style: outset; border-width: 1" onClick="BBCurl()" onMouseOver="helpline('url')" type="image">&nbsp;&nbsp; <img src="modules/Forums/bbcode_box/images/email.gif" alt="Email" name="email" width="30" height="27" border="0" style="border-style: outset; border-width: 1" onClick="BBCmail()" onMouseOver="helpline('mail')" type="image"><img src="modules/Forums/bbcode_box/images/web.gif" alt="Wep Page" name="web" width="30" height="27" border="0" style="border-style: outset; border-width: 1" onClick="BBCweb()" onMouseOver="helpline('web')" type="image"><img src="modules/Forums/bbcode_box/images/img.gif" alt="Image" name="img" width="30" height="27" border="0" style="border-style: outset; border-width: 1" onClick="BBCimg()" onMouseOver="helpline('img')" type="image">&nbsp;&nbsp; <img src="modules/Forums/bbcode_box/images/flash.gif" alt="Flash" name="flash" width="30" height="27" border="0" style="border-style: outset; border-width: 1" onClick="BBCflash()" onMouseOver="helpline('flash')" type="image"><img src="modules/Forums/bbcode_box/images/video.gif" alt="Video" name="video" width="30" height="27" border="0" style="border-style: outset; border-width: 1" onClick="BBCvideo()" onMouseOver="helpline('video')" type="image">&nbsp;&nbsp; <img src="modules/Forums/bbcode_box/images/sound.gif" alt="Stream" name="stream" width="30" height="27" border="0" style="border-style: outset; border-width: 1" onClick="BBCstream()" onMouseOver="helpline('stream')" type="image"><img src="modules/Forums/bbcode_box/images/ram.gif" alt="Real Media" name="ram" width="30" height="27" border="0" style="border-style: outset; border-width: 1" onClick="BBCram()" onMouseOver="helpline('ram')" type="image"><img src="modules/Forums/bbcode_box/images/hr.gif" alt="H-Line" name="hr" width="30" height="27" border="0" style="border-style: outset; border-width: 1" onClick="BBChr()" onMouseOver="helpline('hr')" type="image"></span></td> 
                                </tr> 
                          </table> 
                        </td> 
                  </tr> 

			  </table>
			</td>
		  </tr>

		  <tr> 

			<td> <span class="gensmall"> 

			  <input type="text" name="helpbox" size="45" maxlength="100" style="width:100%; font-size:10px" class="helpline" value="{L_STYLES_TIP}" />

			  </span></td>

		  </tr>

		  <tr> 

			<td><span class="gen"> 

			  <textarea name="message" rows="15" cols="35" wrap="virtual" style="width:100%" tabindex="3" class="text" onSelect="storeCaret(this);" onClick="storeCaret(this);" onKeyUp="storeCaret(this);">{MESSAGE}</textarea>

			  </span></td>

		  </tr>

		</table>

		</td>

	</tr>

	<tr> 

	  <td class="row1" valign="top"><span class="gen"><b>{L_OPTIONS}</b></span><br /><span class="gensmall">{HTML_STATUS}<br />{BBCODE_STATUS}<br />{SMILIES_STATUS}</span></td>

	  <td class="row1"><span class="gen"> </span> 

		<table cellspacing="0" cellpadding="1" border="0" id="table11">

		  <!-- BEGIN switch_html_checkbox -->

		  <tr> 

			<td> 

			  <input type="checkbox" name="disable_html" {S_HTML_CHECKED} />

			</td>

			<td><span class="gen">{L_DISABLE_HTML}</span></td>

		  </tr>

		  <!-- END switch_html_checkbox -->

		  <!-- BEGIN switch_bbcode_checkbox -->

		  <tr> 

			<td> 

			  <input type="checkbox" name="disable_bbcode" {S_BBCODE_CHECKED} />

			</td>

			<td><span class="gen">{L_DISABLE_BBCODE}</span></td>

		  </tr>

		  <!-- END switch_bbcode_checkbox -->

		  <!-- BEGIN switch_smilies_checkbox -->

		  <tr> 

			<td> 

			  <input type="checkbox" name="disable_smilies" {S_SMILIES_CHECKED} />

			</td>

			<td><span class="gen">{L_DISABLE_SMILIES}</span></td>

		  </tr>

		  <!-- END switch_smilies_checkbox -->

		  <!-- BEGIN switch_signature_checkbox -->

		  <tr> 

			<td> 

			  <input type="checkbox" name="attach_sig" {S_SIGNATURE_CHECKED} />

			</td>

			<td><span class="gen">{L_ATTACH_SIGNATURE}</span></td>

		  </tr>

		  <!-- END switch_signature_checkbox -->

		  <!-- BEGIN switch_notify_checkbox -->

		  <tr> 

			<td> 

			  <input type="checkbox" name="notify" {S_NOTIFY_CHECKED} />

			</td>

			<td><span class="gen">{L_NOTIFY_ON_REPLY}</span></td>

		  </tr>

		  <!-- END switch_notify_checkbox -->

		  <!-- BEGIN switch_delete_checkbox -->

		  <tr> 

			<td> 

			  <input type="checkbox" name="delete" />

			</td>

			<td><span class="gen">{L_DELETE_POST}</span></td>

		  </tr>

		  <!-- END switch_delete_checkbox -->

		  <!-- BEGIN switch_lock_topic -->
		  <tr> 
			<td> 
			  <input type="checkbox" name="lock" {S_LOCK_CHECKED} />
			</td>
			<td><span class="gen">{L_LOCK_TOPIC}</span></td>
		  </tr>
		  <!-- END switch_lock_topic -->
		  <!-- BEGIN switch_unlock_topic -->
		  <tr> 
			<td> 
			  <input type="checkbox" name="unlock" {S_UNLOCK_CHECKED} />
			</td>
			<td><span class="gen">{L_UNLOCK_TOPIC}</span></td>
		  </tr>
		  <!-- END switch_unlock_topic -->

		  <!-- BEGIN switch_type_toggle -->

		  <tr> 

			<td></td>

			<td><span class="gen">{S_TYPE_TOGGLE}</span></td>

		  </tr>

		  <!-- END switch_type_toggle -->

		</table>

	  </td>

	</tr>
	{ATTACHBOX}
	{POLLBOX} 

	<tr> 

	  <td class="row2" colspan="2" align="center" height="28"> {S_HIDDEN_FORM_FIELDS}<input type="submit" tabindex="5" name="preview" class="mainoption" value="{L_PREVIEW}" />&nbsp;<input type="submit" accesskey="s" tabindex="6" name="post" class="mainoption" value="{L_SUBMIT}" /></td>

	</tr>

  </table>



</form>
<p>{TOPIC_REVIEW_BOX}
