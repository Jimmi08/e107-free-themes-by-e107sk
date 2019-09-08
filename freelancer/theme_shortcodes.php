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
	function __construct()
	{
		
	}

  // standard contact menu could be used too. It left it here for future improvement of validation - custom solution could be possible
	function sc_freelancer_contactform($parm='')
	{    
			e107::lan('core','contact');
			//$head = '<form name="sentMessage" id="contactForm" novalidate="novalidate">'; 
      $head = '<form id="contact-menu" action="/e107-freelancer/contact.php" method="post">'; 
		  $template = e107::getCoreTemplate('contact','menu');
			$contact_shortcodes = e107::getScBatch('contact');   
			$foot = '</form>';             
			$text = e107::getParser()->parseTemplate($head. $template . $foot, true, $contact_shortcodes);   
      return e107::getRender()->tablerender(LANCONTACT_00, $text, 'home-contact-menu');
 	}                         
	

	function sc_freelancer_contact_name($parm='')
	{ 
    return "<input type='text' class='form-control' id='name' 
							name='author_name'      
							placeholder='".LAN_FL_THEME_00."' 															  
							required='required'
							data-validation-required-message='".LAN_FL_THEME_01."'>";
	}                         
	
	
	function sc_freelancer_contact_email($parm='')
	{                                 
		return "<input type='email' class='form-control' id='email' title='".LANCONTACT_18."' 
		      name='email_send'  	 				 
					placeholder='".LAN_FL_THEME_02."'
					required='required' 
					data-validation-required-message='".LAN_FL_THEME_03."'>";
	}
	
	function sc_freelancer_contact_phone($parm='')
	{
    return "<input type='tel' class='form-control' id='phone' 
						name='author_phone'      
						placeholder='".LAN_FL_THEME_08."' 															  
						required='required' 
						data-validation-required-message='".LAN_FL_THEME_09."'>";
	}
 
	
	function sc_freelancer_contact_body($parm='')
	{
		parse_str($parm, $parm);
		$rows = vartrue($parm['rows'],10);
		$cols = vartrue($parm['cols'],70);
		
		if($cols > 60)
		{
			$size = 'input-xxlarge';	
		}
		   
		return '
		<textarea rows="5" class="form-control" placeholder="'.LAN_FL_THEME_06.'" id="contactBody" name="body" 
		required="" data-validation-required-message="'.LAN_FL_THEME_07.'"  ></textarea>';
	}
	
	function sc_freelancer_contact_submit_button($parm='')
	{
		return "<input type='submit' name='send-contactus' value=\"".LANCONTACT_08."\" class='btn btn-primary button' />";	
	}	
	
	 
	
 function sc_xurl_icons()  {
     $social = array(
						'rss'           => array('href'=> (e107::isInstalled('rss_menu') ? e107::url('rss_menu', 'index', array('rss_url'=>'news')) : ''), 
						'title'=>'RSS/Atom Feed', 'icon'=>'fas fa-fw fa-rss' ),
						'facebook'      => array('href'=> deftrue('XURL_FACEBOOK'), 'title'=>'Facebook', 
						'icon'=>'fab fa-fw fa-facebook-f'),
						'twitter'       => array('href'=> deftrue('XURL_TWITTER'), 'title'=>'Twitter',
						'icon'=>'fab fa-fw fa-twitter'),
						'vk'       => array('href'=> deftrue('XURL_GOOGLE'), 'title'=>'VKontakte',
						'icon'=>'fab fa-fw fa-vk'),
						'linkedin'      => array('href'=> deftrue('XURL_LINKEDIN'),'title'=>'LinkedIn',
						'icon'=>'fab fa-fw fa-linkedin-in'),
						'github'        => array('href'=> deftrue('XURL_GITHUB'), 'title'=>'Github',
						'icon'=>'fab fa-fw fa-github'),
						'pinterest'     => array('href'=> deftrue('XURL_PINTEREST'),'title'=>'Pinterest',
					  'icon'=>'fab fa-fw fa-pinterest'),
						'flickr'        => array('href'=> deftrue('XURL_FLICKR'), 'title'=>'Flickr',
						'icon'=>'fab fa-fw fa-flickr'),
						'instagram'     => array('href'=> deftrue('XURL_INSTAGRAM'), 'title'=>'Instagram',
						'icon'=>'fab fa-fw fa-instagram'),
						'youtube'       => array('href'=> deftrue('XURL_YOUTUBE'),'title'=>'YouTube',
						'icon'=>'fab fa-fw fa-youtube') 
        );
        
        

    $text =  '';   
    $textstart ='';
    $textend   = '';
    foreach($social as $id => $data)
    {
        if($data['href'] != '')
        {              
						 $text .= '
						 	<a class="btn btn-outline-light btn-social mx-1" href="'.$data['href'].'">
							 <i class="'.$data['icon'].'"></i>
							</a>
						 ';      
        }
    }   
    if($text !='')
    {
        return  $textstart.$text.$textend;
    }
  } 
 

	function sc_bootstrap_usernav($parm='')
	{

		$placement = e107::pref('theme', 'usernav_placement', 'top');

		if($parm['placement'] != $placement)
		{
			return '';
		}

		include_lan(e_PLUGIN."login_menu/languages/".e_LANGUAGE.".php");
		
		$tp = e107::getParser();		   
		require(e_PLUGIN."login_menu/login_menu_shortcodes.php"); // don't use 'require_once'.

		$direction = vartrue($parm['dir']) == 'up' ? ' dropup' : '';
		
		$userReg = defset('USER_REGISTRATION');
				   
		if(!USERID) // Logged Out. 
		{		
			$text = '
			<ul class="navbar-nav navbar-right'.$direction.'">';
			
			if($userReg==1)
			{
				$text .= '
				<li class="nav-item"><a class="nav-link" href="'.e_SIGNUP.'">'.LAN_LOGINMENU_3.'</a></li>
				'; // Signup
			}


			$socialActive = e107::pref('core', 'social_login_active');

			if(!empty($userReg) || !empty($socialActive)) // e107 or social login is active.
			{
				$text .= '
				<li class="nav-item divider-vertical"></li>
				<li class="nav-item dropdown">
			
				<a class="nav-link  dropdown-toggle" href="#" data-toggle="dropdown">'.LAN_LOGINMENU_51.' <strong class="caret"></strong></a>
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
				
				<a href="{LM_FPW_LINK=href}" class="btn btn-success btn-sm  btn-block">'.LAN_LOGINMENU_4.'</a>
				<a href="{LM_RESEND_LINK=href}" class="btn btn-success btn-sm  btn-block">'.LAN_LOGINMENU_40.'</a>
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
			
			
			
			return $tp->parseTemplate($text, true, $login_menu_shortcodes);
		}  

		
		// Logged in. 
		//TODO Generic LANS. (not theme LANs) 	
		
		$text = '
		
		<ul class="navbar-nav navbar-right'.$direction.'">
		<li class="nav-item dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">{SETIMAGE: w=20} {USER_AVATAR: shape=circle} '. USERNAME.' <b class="caret"></b></a>
		<div class="dropdown-menu">
			<a class="dropdown-item" href="{LM_USERSETTINGS_HREF}"><i class="fas fa-cog"></i> '.LAN_SETTINGS.'</a>
			<a class="dropdown-item no-block" role="button" href="{LM_PROFILE_HREF}"><i class="fas fa-user"></i> '.LAN_LOGINMENU_13.'</a>';
		
		if(ADMIN) 
		{
			$text .= '<a class="dropdown-item" href="'.e_ADMIN_ABS.'"><i class="fas fa-cogs"></i> '.LAN_LOGINMENU_11.'</a>';	
		}
		
		$text .= '<a class="dropdown-item" href="'.e_HTTP.'index.php?logout"><i class="fas fa-sign-out-alt"></i> '.LAN_LOGOUT.'</a>
		</div>
		</li>
		</ul>
		
		';


		return $tp->parseTemplate($text,true,$login_menu_shortcodes);
	}	
	
	/* {PROFILEIMAGE} */
	function sc_profileimage($parm=null) 
	{
	  
		if($profileimage = e107::pref('theme', 'headerimage', false))
		{
		$profileimage = e107::getParser() -> replaceConstants($profileimage,'full');
		$profileimage = "<img class='masthead-avatar mb-5' src='{$profileimage}' alt='".SITEURL."'>";      
		}
		else
		{
		$profileimage = SITEURLBASE.THEME_ABS."install/avataaars.svg";
    $profileimage = "<img class='masthead-avatar mb-5' src='{$profileimage}' alt='".SITEURL."'>";   
		}
	  return   $profileimage;
	}
	
	
}





?>
