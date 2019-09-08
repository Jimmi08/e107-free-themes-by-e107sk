<?php
// $Id$

if (!defined('e107_INIT')) { exit; }
 
 
// Starter for v2. - Bootstrap 
$LOGIN_TEMPLATE['page']['header'] = ' 
		<div id="login-template">  <div class="center">
	 
		</div>
           <div   class="center-block logig-form">
                <div class="panel panel-default">
                  <div class="panel-heading">'.LAN_LOGIN_4.'</div>
                   <div class="panel-body">';
	if ($pref['password_CHAP'] == 2)
	{
		$LOGIN_TEMPLATE['page']['body'] .= "
    	<div style='text-align: center' id='nologinmenuchap'>"."Javascript must be enabled in your browser if you wish to log into this site"."
		</div>
    	<span style='display:none' id='loginmenuchap'>";
	}
	else
	{
	  $LOGIN_TEMPLATE['page']['body'] .= "<span>";
	}

$LOGIN_WRAPPER['page']['LOGIN_TABLE_USERNAME'] = '<div class="input-group login-input">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    {---}</div><br>';
$LOGIN_WRAPPER['page']['LOGIN_TABLE_PASSWORD'] = '<div class="input-group login-input">
                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
{---}</div><br>';
$LOGIN_WRAPPER['page']['LOGIN_TABLE_SECIMG_SECIMG'] = "<div class='form-group'>{---}</div>";
$LOGIN_WRAPPER['page']['LOGIN_TABLE_SECIMG_TEXTBOC'] = "<div class='form-group'>{---}</div>";
$LOGIN_WRAPPER['page']['LOGIN_TABLE_REMEMBERME'] = "<div class='input-group  checkbox'>{---}</div>";
$LOGIN_WRAPPER['page']['LOGIN_TABLE_SUBMIT'] = " {---} ";
$LOGIN_WRAPPER['page']['LOGIN_TABLE_FOOTER_USERREG'] = "<div class='form-group'>{---}</div>";

$LOGIN_TEMPLATE['page']['body'] .= '
<div class="form-group">
 
        {LOGIN_TABLE_USERNAME}
        {LOGIN_TABLE_PASSWORD}
        
	    	{LOGIN_TABLE_SECIMG_SECIMG} {LOGIN_TABLE_SECIMG_TEXTBOC}
        {LOGIN_TABLE_REMEMBERME}
 
         
        {LOGIN_TABLE_SUBMIT}
  <div class="clearfix"></div>
</div>
 ';
                       
$LOGIN_TEMPLATE['page']['footer'] =  " 
	<div style='text-align:center'>
				<div class='login-page-signup-link'><p>{LOGIN_TABLE_SIGNUP_LINK}</p></div>
				<div class='login-page-fpw-link'><p>{LOGIN_TABLE_FPW_LINK}</p></div>
  </div>
</div></div>
</div>";
	
 
?>