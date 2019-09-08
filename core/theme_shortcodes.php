<?php
/*
 * e107 website system
 *
 * Copyright (C) 2008-2013 e107 Inc (e107.org)
 * Released under the terms and conditions of the
 * GNU General Public License (http://www.gnu.org/licenses/gpl.txt)
 *
 * e107 Bootstrap Theme Shortcodes. 
 *
*/


class theme_shortcodes extends e_shortcode
{
	
	var $override = false;
		
	function __construct()
	{
		
	}

function sc_fs_login($parm = '')
{
	global $pref;
	if (!USER)
	{
		$loginsc = '
	<div class="fs_c_login col-xs-offset-2 col-sm-offset-2 col-md-offset-0">
    <div class="singin">
			<a href="' . e_HTTP . 'login.php">' . LAN_THEME_SING . '</a>
		</div>
    <div class="register">
			<div class="regl"></div>
			<div class="regr"></div>
			<div class="regm">
				<div class="register_text">
					<a href="' . e_HTTP . 'signup.php">' . LAN_THEME_REG . '</a>
				</div>
			</div>
    </div>
  </div>
  ';
		return $loginsc;
	}

	if (USER == TRUE || ADMIN == TRUE)
	{
		$loginsc = '
			<div class="fs_c_login2">
				<span class="fs_welcome">
					' . LAN_THEME_23 . '&nbsp;&nbsp;' . USERNAME . '
				</span>
  ';
		$loginsc.= '
	';
		if (ADMIN == TRUE)
		{
			$loginsc.= '
				<span class="fs_login_links_b">
												<a href="' . e_ADMIN_ABS . 'admin.php">' . LAN_THEME_24 . '</a>&nbsp;&nbsp;
							';
		}

		$loginsc.= '
											<a href="' . e_HTTP . 'user.php?id.' . USERID . '">' . LAN_THEME_27 . '</a>&nbsp;&nbsp;
											<a href="' . e_HTTP . 'usersettings.php">' . LAN_THEME_26 . '</a>&nbsp;&nbsp;
										 	' . (isset($pref['plug_installed']['list_new']) ? '<a href="' . e_PLUGIN_ABS . 'list_new/list.php?new">' . LAN_THEME_29 . '</a>' : '') . '
				</span>
				<span class="logout">
					<span class="logm">
						<span class="register_text">
							<a href="' . e_HTTP . 'news.php?logout">' . LAN_THEME_28 . '</a>
						</span>
					</span>
				</span>
			</div>
	';
		$loginsc.= '
  ';
		return $loginsc;
	}
}

	function sc_menu_button_url($parm='') {
		$sc   = e107::getScBatch('page', null, 'cpage');
  	$data = $sc->getVars(); 
  	return e107::getParser()->replaceConstants($data['menu_button_url']);
	}

  // left for future using
	function sc_bootstrap_usernav($parm='')
	{

		$placement = e107::pref('theme', 'usernav_placement', 'top');

		if($parm['placement'] != $placement)
		{
			return '';
		}

		include_lan(e_PLUGIN."login_menu/languages/".e_LANGUAGE.".php");
				   
		require(e_PLUGIN."login_menu/login_menu_shortcodes.php"); // don't use 'require_once'.

		$direction = vartrue($parm['dir']) == 'up' ? ' dropup' : '';
		
		$userReg = defset('USER_REGISTRATION');
				   
		if(!USERID) // Logged Out. 
		{		
			$text = '
			<ul class="nav navbar-nav navbar-right'.$direction.'">';
			
			if($userReg==1)
			{
				$text .= '
				<li><a href="'.e_SIGNUP.'">'.LAN_LOGINMENU_3.'</a></li>
				'; // Signup
			}


			$socialActive = e107::pref('core', 'social_login_active');

			if(!empty($userReg) || !empty($socialActive)) // e107 or social login is active.
			{
				$text .= '
				<li class="divider-vertical"></li>
				<li class="dropdown">
			
				<a class="dropdown-toggle" href="#" data-toggle="dropdown">'.LAN_LOGINMENU_51.' <strong class="caret"></strong></a>
				<div class="dropdown-menu col-sm-12" style="min-width:250px; padding: 15px; padding-bottom: 0px;">
				
				{SOCIAL_LOGIN: size=2x&label=1}
				'; // Sign In
			}
			else
			{
				return '';
			}
			
			
			if(!empty($userReg)) // value of 1 or 2 = login okay. 
			{

			//	global $sc_style; // never use global - will impact signup/usersettings pages. 
			//	$sc_style = array(); // remove any wrappers.

				$text .='	
				
				<form method="post" onsubmit="hashLoginPassword(this);return true" action="'.e_REQUEST_HTTP.'" accept-charset="UTF-8">
				<p>{LM_USERNAME_INPUT}</p>
				<p>{LM_PASSWORD_INPUT}</p>


				<div class="form-group"></div>
				{LM_IMAGECODE_NUMBER}
				{LM_IMAGECODE_BOX}
				
				<div class="checkbox">
				
				<label class="string optional" for="autologin"><input style="margin-right: 10px;" type="checkbox" name="autologin" id="autologin" value="1">
				'.LAN_LOGINMENU_6.'</label>
				</div>
				<input class="btn btn-primary btn-block" type="submit" name="userlogin" id="userlogin" value="'.LAN_LOGINMENU_51.'">
				';
				
				$text .= '
				
				<a href="{LM_FPW_LINK=href}" class="btn btn-default btn-sm  btn-block">'.LAN_LOGINMENU_4.'</a>
				<a href="{LM_RESEND_LINK=href}" class="btn btn-default btn-sm  btn-block">'.LAN_LOGINMENU_40.'</a>
				';
				
				
				/*
				$text .= '
					<label style="text-align:center;margin-top:5px">or</label>
					<input class="btn btn-primary btn-block" type="button" id="sign-in-google" value="Sign In with Google">
					<input class="btn btn-primary btn-block" type="button" id="sign-in-twitter" value="Sign In with Twitter">
				';
				*/
				
				$text .= "<p></p>
				</form>
				</div>
				
				</li>
				";
			
			}

			$text .= "
			
			
			</ul>";	
			
			
			
			return e107::getParser()->parseTemplate($text, true, $login_menu_shortcodes);
		}  

		
		// Logged in. 
		//TODO Generic LANS. (not theme LANs) 	
		
		$text = '
		
		<ul class="nav navbar-nav navbar-right'.$direction.'">
		<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">{SETIMAGE: w=20} {USER_AVATAR: shape=circle} '. USERNAME.' <b class="caret"></b></a>
		<ul class="dropdown-menu">
		<li>
			<a href="{LM_USERSETTINGS_HREF}"><span class="glyphicon glyphicon-cog"></span> '.LAN_SETTINGS.'</a>
		</li>
		<li>
			<a class="dropdown-toggle no-block" role="button" href="{LM_PROFILE_HREF}"><span class="glyphicon glyphicon-user"></span> '.LAN_LOGINMENU_13.'</a>
		</li>
		<li class="divider"></li>';
		
		if(ADMIN) 
		{
			$text .= '<li><a href="'.e_ADMIN_ABS.'"><span class="fa fa-cogs"></span> '.LAN_LOGINMENU_11.'</a></li>';	
		}
		
		$text .= '
		<li><a href="'.e_HTTP.'index.php?logout"><span class="glyphicon glyphicon-off"></span> '.LAN_LOGOUT.'</a></li>
		</ul>
		</li>
		</ul>
		
		';


		return e107::getParser()->parseTemplate($text,true,$login_menu_shortcodes);
	}
	
	function sc_core_wmessage() {	
		if($wmimage = e107::pref('theme', 'wmimage', false))
		{
			$wmimage = e107::getParser()->toImage($wmimage);
			$text = '<div class="col-md-6 col-sm-6 col-xs-12 col-xxs-12">'.$wmimage.'</div>';
			$text .= '<div class="col-md-6 col-sm-6 col-xs-12 col-xxs-12">';
		}
		else $text .= '<div class="col-md-12 col-sm-12">';
		return $text;
  }
}





?>
