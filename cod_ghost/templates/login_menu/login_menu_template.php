<?php
/*
+ ----------------------------------------------------------------------------+
|     e107 website system
|
|     Steve Dunstan 2001-2002
|     Copyright (C) 2008-2010 e107 Inc (e107.org)
|
|
|     Released under the terms and conditions of the
|     GNU General Public License (http://gnu.org).
|
|     $URL: https://e107.svn.sourceforge.net/svnroot/e107/trunk/e107_0.7/e107_plugins/login_menu/login_menu_template.php $
|     $Revision: 11678 $
|     $Id: login_menu_template.php 11678 2010-08-22 00:43:45Z e107coders $
|     $Author: e107coders $
+----------------------------------------------------------------------------+
*/
$sc_style['LM_SIGNUP_LINK']['pre'] = "<br />[ ";
$sc_style['LM_SIGNUP_LINK']['post'] = " ]";

$sc_style['LM_FPW_LINK']['pre'] = "<br />[ ";
$sc_style['LM_FPW_LINK']['post'] = " ]";

$sc_style['LM_RESEND_LINK']['pre'] = "<br />[ ";
$sc_style['LM_RESEND_LINK']['post'] = " ]";

$sc_style['LM_REMEMBERME']['pre'] = "<br />";
$sc_style['LM_REMEMBERME']['post'] = "";

  
	$LOGIN_MENU_FORM = "
<div class='panel panel-info  col-sm-12' >
  <div class='panel-body' > 
    <div  class='col-sm-6'>
    <div class='input-group '>
      <span class='input-group-addon'><i class='glyphicon glyphicon-user'></i></span>
      {LM_USERNAME_INPUT}
    </div>
    <div class='input-group'>
      <span class='input-group-addon'><i class='glyphicon glyphicon-lock'></i></span>                                       
      {LM_PASSWORD_INPUT}
    </div> 
    <div class='form-group '>
      <div class='checkbox '>
        <label>
        {LM_REMEMBERME}
        </label>
      </div>
    </div></div>
    <div  class='form-group col-sm-6 '>                                                 
      <div class='controls'>
        <input class='button' type='submit' name='userlogin' value='".LAN_LOGINMENU_51."' />
      </div>
      <div class=' control'>
      {LM_SIGNUP_LINK}
      {LM_FPW_LINK}
      {LM_RESEND_LINK}
      </div>
    </div>
  </div> 
</div>
	";
  
if (!isset($LOGIN_MENU_LOGGED)){
    $sc_style['LM_ADMINLINK']['pre'] = "";
	$sc_style['LM_ADMINLINK']['post'] = "<br />";

	$LOGIN_MENU_LOGGED = "
  <div class='panel panel-info  col-sm-12' >
  <div class='panel-body' > 
		{LM_MAINTENANCE}
		{LM_ADMINLINK_BULLET} {LM_ADMINLINK}
		{LM_BULLET} {LM_USERSETTINGS}<br />
		{LM_BULLET}	{LM_PROFILE}<br />
		{LM_BULLET} {LM_LOGOUT}
  </div> 
</div>    
	";
}

if (!isset($LOGIN_MENU_MESSAGE)){
	$LOGIN_MENU_MESSAGE = '<div style="text-align: center;">{LM_MESSAGE}</div>';
}
?>
