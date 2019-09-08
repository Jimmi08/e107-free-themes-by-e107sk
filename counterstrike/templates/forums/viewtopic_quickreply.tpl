<script language="JavaScript" src="modules/Forums/bbcode_box/add_bbcode.js" type="text/javascript"></script>

<body bgcolor="{T_BODY_BGCOLOR}" text="{T_BODY_TEXT}" link="{T_BODY_LINK}" vlink="{T_BODY_VLINK}">
<div align="center">

<table id="table1" width="100%" border="0" cellpadding="0" cellspacing="0">
	<tr>
        <td valign="top" >





<form action="{S_POST_ACTION}" method="post" name="post" onSubmit="return checkForm(this)" {S_FORM_ENCTYPE}>



<p align="center"><b>{L_QUICK_REPLY}</b></p>



<table border="0" cellpadding="3" cellspacing="1" width="100%" class="forumline" id="table5">

	<!-- BEGIN switch_username_select -->

	<tr> 

		<td class="row1"><span class="gen"><b>{L_USERNAME}</b></span></td>

		<td class="row1"><span class="genmed">
        <input type="text" class="post" tabindex="1" name="username1" size="25" maxlength="25" value="{USERNAME}" /></span></td>

	</tr>

	<!-- END switch_username_select -->

	<!-- BEGIN switch_privmsg -->

	<!-- END switch_privmsg -->

	<tr> 

	  <td class="row1" width="10%"><span class="gen"><b>{L_SUBJECT}</b></span></td>

	  <td class="row1" width="90%"> <span class="gen"> 

		<input type="text" name="subject" size="45" maxlength="60" style="width:250" tabindex="2" class="post" value="{SUBJECT}" />

		</span> </td>

	</tr>

	<tr> 

	  <td class="row1" valign="top"> 

		{L_MESSAGE_BODY}</td>

	  <td class="row1" valign="top"><span class="gen"> <span class="genmed"> </span> 

		<table width="100%" border="0" cellspacing="0" cellpadding="2" id="table8">

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
			                      <span lang="ar-sy">&nbsp;</span><img src="modules/Forums/bbcode_box/images/bold.gif" alt="bold" name="bold" width="30" height="27" border="0" style="border-style: outset; border-width: 1" onClick="BBCbold()" onMouseOver="helpline('b')" type="image"> <img src="modules/Forums/bbcode_box/images/code.gif" alt="Code" name="code" width="30" height="27" border="0" style="border-style: outset; border-width: 1" onClick="BBCcode()" onMouseOver="helpline('code')" type="image"> <img src="modules/Forums/bbcode_box/images/quote.gif" alt="Quote" name="quote" width="30" height="27" border="0" style="border-style: outset; border-width: 1" onClick="BBCquote()" onMouseOver="helpline('quote')" type="image"> <img src="modules/Forums/bbcode_box/images/url.gif" alt="URL" name="url" width="30" height="27" border="0" style="border-style: outset; border-width: 1" onClick="BBCurl()" onMouseOver="helpline('url')" type="image"> <img src="modules/Forums/bbcode_box/images/img.gif" alt="Image" name="img" width="30" height="27" border="0" style="border-style: outset; border-width: 1" onClick="BBCimg()" onMouseOver="helpline('img')" type="image"></span></span><span class="gen"></td> 
                                </tr> 
                                </table> 
                        </td> 
                  </tr> 

			  </table>
			</td>
		  </tr>

		  <tr> 

			<td> <span class="gensmall"> 

			  <input type="text" name="helpbox" size="45" maxlength="100" style="width:250; font-size:10px" class="helpline" value="{L_STYLES_TIP}" />

			  </span></td>

		  </tr>

		  <tr> 

			<td><span class="gen"> 

			  <textarea name="message" rows="15" cols="35" wrap="virtual" style="width:250; height:118" tabindex="3" class="text" onSelect="storeCaret(this);" onClick="storeCaret(this);" onKeyUp="storeCaret(this);">{MESSAGE}</textarea>

			  </span>
		    </td>

		  </tr>

		</table>

		</td>

	</tr>

	{ATTACHBOX} {POLLBOX} 

	<tr>
	  <td class="row1" valign="top">&nbsp;</td>
	  <td class="row1"><span class="gen"> </span>
		<table cellspacing="0" cellpadding="1" border="0" id="table12">
		  <!-- BEGIN switch_html_checkbox -->
		  <!-- END switch_html_checkbox -->
		  <!-- BEGIN switch_bbcode_checkbox -->
		  <!-- END switch_bbcode_checkbox -->
		  <!-- BEGIN switch_smilies_checkbox -->
		  <!-- END switch_smilies_checkbox -->
		  <!-- BEGIN switch_signature_checkbox -->
		  <tr>
			<td>
			  <input type="checkbox" name="attach_sig0" {S_SIGNATURE_CHECKED} />
			</td>
			<td><span class="gen">{L_ATTACH_SIGNATURE}</span></td>
		  </tr>
		  <!-- END switch_signature_checkbox -->
		  <!-- BEGIN switch_notify_checkbox -->
		  <tr>
			<td>
			  <input type="checkbox" name="notify0" {S_NOTIFY_CHECKED} />
			</td>
			<td><span class="gen">{L_NOTIFY_ON_REPLY}</span></td>
		  </tr>
		  <!-- END switch_notify_checkbox -->
		</table>
	  </td>
	</tr>

	<tr> 

	  <td class="row2" colspan="2" align="center" height="28"> 
      {S_HIDDEN_FORM_FIELDS}<input type="submit" tabindex="5" name="preview" class="mainoption" value="{L_PREVIEW}" />&nbsp;<input type="submit" accesskey="s" tabindex="6" name="post" class="mainoption" value="{L_SUBMIT}" /></td>

	</tr>

  </table>



</form>



    </tr>
  </table>
</div>