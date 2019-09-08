<?php
/*
 * e107 website system
 *
 * Copyright (C) 2008-2016 e107 Inc (e107.org)
 * Released under the terms and conditions of the
 * GNU General Public License (http://www.gnu.org/licenses/gpl.txt)
 *
 * Contact Template
 */
 // $Id$

if (!defined('e107_INIT')) { exit; }

/*
if(!isset($CONTACT_INFO))
{
	$CONTACT_INFO = "
	<table style='".USER_WIDTH."' cellpadding='1' cellspacing='7'>
	<tr>
		<td>
		{SITECONTACTINFO}
		<br />
		</td>
	</tr>
	</table>";
}
*/

$CONTACT_TEMPLATE['info'] = "

	<div id='contactInfo' >
		<address>{SITECONTACTINFO}</address>
	</div>

";
$CONTACT_TEMPLATE['info'] = '';

$CONTACT_TEMPLATE['menu'] =  '
	<div class="contactMenuForm">
		<div class="control-group form-group">
			<label for="contactName">'.LANCONTACT_03.'</label>
				{CONTACT_NAME}
		 </div>
		 
		<div class="control-group form-group">
			<label class="control-label" for="contactEmail">'.LANCONTACT_04.'</label>
				{CONTACT_EMAIL}
		</div>
		<div class="control-group form-group">
			<label for="contactBody" >'.LANCONTACT_06.'</label>
				{CONTACT_BODY=rows=5&cols=30}
		</div>
		{CONTACT_SUBMIT_BUTTON}
	</div>       
 ';
 
 
	// Option I - new sc style variable and format, global available per shortcode (mode also applied)
	// sc_style is renamed to sc_wrapper and uppercased now - distinguished from the legacy $sc_style variable and compatible with the new template standards, we deprecate $sc_style soon
 
	// $SC_WRAPPER['CONTACT_EMAIL_COPY'] 		= "<tr><td>{---}".LANCONTACT_07."</td></tr>";
	// $SC_WRAPPER['CONTACT_PERSON'] 			= "<tr><td>".LANCONTACT_14."<br />{---}</td></tr>";
	// $SC_WRAPPER['CONTACT_IMAGECODE'] 			= "<tr><td>".LANCONTACT_16."<br />{---}";
	// $SC_WRAPPER['CONTACT_IMAGECODE_INPUT'] 	= "{---}</td></tr>";
 
 	
	// Option II - Wrappers, used ONLY with batch objects, requires explicit wrapper registration
	// In this case (see contact.php) e107::getScBatch('contact')->wrapper('contact/form')
	// Only one Option is used - WRAPPER > SC_STYLE

	$CONTACT_WRAPPER['form']['CONTACT_IMAGECODE'] 			= "<label for='code-verify'>{CONTACT_IMAGECODE_LABEL}</label> {---}";
	$CONTACT_WRAPPER['form']['CONTACT_IMAGECODE_INPUT'] 	= "{---} ";
	$CONTACT_WRAPPER['form']['CONTACT_EMAIL_COPY'] 			= "<fieldset class='form-group col-md-7'>{---}".LANCONTACT_07."</fieldset>";
	$CONTACT_WRAPPER['form']['CONTACT_PERSON']				= "<div class='control-group form-group'><label for='contactPerson'>".LANCONTACT_14."</label>{---}</div>";

	$CONTACT_TEMPLATE['form'] = "
	<form class='contact-form row' action='".e_SELF."' method='post' id='contactForm' >

	{CONTACT_PERSON}
	<fieldset class='form-group col-md-7'>
	  <input type='text'   id='contactName' placeholder='Name' name='author_name' required='required' value=\"".varset($_POST['author_name'],$userName)."\" /> 
		<label for='name'></label> 
	</fieldset>
	<fieldset class='form-group col-md-7'>
<input type='email'   id='contactEmail' placeholder='Email' name='email_send' required='required'   value='".(vartrue($_POST['email_send']) ? $_POST['email_send'] : USEREMAIL)."' /> 
		<label for='name'></label> 
	</fieldset>
	<fieldset class='form-group col-md-12'>
  <input type='text' id='contactSubject' placeholder='Subject' name='subject' required='required'  value=\"".varset($_POST['subject'])."\" /> 
		<label for='name'></label> 
	</fieldset>
 
  
	{CONTACT_EMAIL_COPY}

	<fieldset class='form-group col-md-12'><label for='contactBody'>".LANCONTACT_06."</label>
		<textarea  id='contactBody' placeholder='Message' name='body'   required='required' >".stripslashes(varset($_POST['body']))."</textarea>
 
	{CONTACT_IMAGECODE}
	{CONTACT_IMAGECODE_INPUT}
 
	<input type='submit' name='send-contactus' value=\"".LANCONTACT_08."\" class='btn btn-normal btn-md' /></fieldset> 
 
<div class='text-center spinner col-md-12 hidden'><i class='fa fa-spinner fa-pulse'></i></div>
<div class='info col-md-12'></div>
	</form>";

	// Customize the email subject
	// Variables:  CONTACT_SUBJECT and CONTACT_PERSON as well as any custom fields set in the form. )
	$CONTACT_TEMPLATE['email']['subject'] = "{CONTACT_SUBJECT}";

	

?>
