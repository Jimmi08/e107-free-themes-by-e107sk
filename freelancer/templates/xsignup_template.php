<?php
/*
 * e107 website system
 *
 * Copyright (C) 2008-2016 e107 Inc (e107.org)
 * Released under the terms and conditions of the
 * GNU General Public License (http://www.gnu.org/licenses/gpl.txt)
 *
 *
 *
 * $Source: /cvs_backup/e107_0.8/e107_themes/templates/signup_template.php,v $
 * $Revision: 12837 $
 * $Date: 2012-06-19 11:08:41 +0200 (di, 19 jun 2012) $
 * $Author: e107coders $
 */

if (!defined('e107_INIT')) { exit; }
if (!defined("USER_WIDTH")){ define("USER_WIDTH", "width:100%"); }

define("REQUIRED_FIELD_MARKER", "<span class='required'> *</span>");

 

if(!isset($USERCLASS_SUBSCRIBE_START))
{
	$USERCLASS_SUBSCRIBE_START = "
	<tr>
		<td class='forumheader3' style='width:30%;vertical-align:top'>"
			.LAN_USER_76." ".req($pref['signup_option_class'])."<br />
			<span class='smalltext'>".LAN_USER_73."</span>
		</td>
		<td class='forumheader3' style='width:70%;margin-left:0px'>
			<table style='".USER_WIDTH."'>";
}
 

if(!isset($USERCLASS_SUBSCRIBE_END))
{
	$USERCLASS_SUBSCRIBE_END = "
			</table>
		</td>
	</tr>";
}

if(!isset($SIGNUP_PASSWORD_LEN))
{
	$SIGNUP_PASSWORD_LEN = "
	<span class='smalltext'> (".LAN_SIGNUP_1." {$pref['signup_pass_len']} ".LAN_SIGNUP_2.")</span>";
}

if(!isset($SIGNUP_EXTENDED_USER_FIELDS))
{
	$SIGNUP_EXTENDED_USER_FIELDS	= "
	<tr>
		<td style='width:40%' class='forumheader3'>
			<label>{EXTENDED_USER_FIELD_TEXT}
			{EXTENDED_USER_FIELD_REQUIRED}</label>
		</td>
		<td style='width:60%' class='forumheader3'>
			{EXTENDED_USER_FIELD_EDIT}
		</td>
	</tr>";
}

if(!isset($EXTENDED_USER_FIELD_REQUIRED))
{
	$EXTENDED_USER_FIELD_REQUIRED	= "<span class='required'> *</span>";
}

 
if(!isset($COPPA_TEMPLATE))
{

	$COPPA_TEMPLATE  = "<div class=' text-center'>".
	LAN_SIGNUP_77." <a target='_blank' href='http://www.ftc.gov/privacy/coppafaqs.shtm'>".LAN_SIGNUP_14."</a>. "
	.LAN_SIGNUP_15." ".$tp->emailObfuscate(SITEADMINEMAIL,LAN_SIGNUP_14)." ".LAN_SIGNUP_16."<br />
	<br />
	<div style='text-align:center'><b>".LAN_SIGNUP_17."</b>
		{SIGNUP_COPPA_FORM: class=btn btn-fill btn-primary}
	</div></div>";    
}

if(!isset($COPPA_FAIL))
{
	$COPPA_FAIL = "<div class='text-center'>".LAN_SIGNUP_9."</div>";
}

        //{SIGNUP_ADMINOPTIONS} 
if(!isset($SIGNUP_BEGIN))
{
$SIGNUP_BEGIN = '              
 {SIGNUP_FORM_OPEN}   
';
} 

if(!isset($SIGNUP_END))
{
	$SIGNUP_END = '            
	      
    </div>';
}


if(!isset($SIGNUP_BODY))
{
	$SIGNUP_BODY = '
	{SIGNUP_XUP} 
		  {SIGNUP_XUP_ACTION}
 
			{SIGNUP_LOGINNAME: class=form-control rounded-0&placeholder=LAN_LOGINNAME}
      {SIGNUP_EMAIL: class=form-control rounded-0&placeholder=LAN_USER_60}
			{SIGNUP_EMAIL_CONFIRM: class=form-control rounded-0&placeholder=LAN_SIGNUP_39}
			{SIGNUP_PASSWORD1: class=form-control rounded-0&placeholder=LAN_PASSWORD}
			{SIGNUP_PASSWORD2: class=form-control rounded-0&placeholder=LAN_SIGNUP_84}
			{SIGNUP_HIDE_EMAIL}
			{SIGNUP_IMAGES: class=avatar-danger}
			{SIGNUP_IMAGECODE}        
			<p> {SIGNUP_SIGNUP_TEXT: class=custom}</p>'. 
			"<div class='button-signin'>
			  <input class='btn btn-success btn-lg float-right' type='submit' name='register' value=\"".LAN_SIGNUP_79."\" />                      
      </div>
			<p>Or use an existing <a href='".e_LOGIN."' class='text-danger'>account</a>.</p>			
 
	{SIGNUP_FORM_CLOSE}";
}

if(!isset($SIGNUP_EXTENDED_CAT))
{
	$SIGNUP_EXTENDED_CAT ='{EXTENDED_CAT_TEXT}';
}

 
$sc_style['SIGNUP_LOGINNAME']['pre'] = ' <div class="control-group"><div class="form-group floating-label-form-group controls mb-0 pb-2"> <label for="loginname">'.LAN_LOGINNAME.'</label>';
$sc_style['SIGNUP_LOGINNAME']['post'] = '</div></div>';

$sc_style['SIGNUP_EMAIL']['pre'] = ' <div class="control-group">
<div class="form-group floating-label-form-group controls mb-0 pb-2"><label for="email">'.LAN_USER_60.'</label>';
$sc_style['SIGNUP_EMAIL']['post'] = "</div></div>";

$sc_style['SIGNUP_PASSWORD1']['pre'] = ' <div class="control-group">
<div class="form-group floating-label-form-group controls mb-0 pb-2"><label for="password1">'.LAN_PASSWORD.'</label>';
$sc_style['SIGNUP_PASSWORD1']['post'] = "</div></div>";

$sc_style['SIGNUP_PASSWORD2']['pre'] = ' <div class="control-group">
<div class="form-group floating-label-form-group controls mb-0 pb-2"><label for="password2">'.LAN_SIGNUP_84.'</label>';
$sc_style['SIGNUP_PASSWORD2']['post'] = "</div></div>";

$sc_style['SIGNUP_HIDE_EMAIL']['pre'] = "<div class='control-group'><div class='form-group'><label> ".LAN_USER_83."  </label>";
$sc_style['SIGNUP_HIDE_EMAIL']['post'] = "</div></div>";

$sc_style['SIGNUP_IMAGECODE']['pre'] = "<br><div class='control-group'><div class='form-group'>"; 
$sc_style['SIGNUP_IMAGECODE']['post'] = "</div></div>";
?>
