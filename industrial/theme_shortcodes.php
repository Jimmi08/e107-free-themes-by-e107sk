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
  var $override = true;

	function __construct()
	{

	}
 
  function sc_sitelogo_footer() {
   $prefsitelogomain		= e107::pref('theme', 'sitelogomfooter', FALSE);
   if($prefsitelogomain)  	{  		$prefsitelogomain = e107::getParser()->replaceConstants($prefsitelogomain);    }
   
   $text = '<img alt="'.SITENAME.'" src="'.SITEURL.$prefsitelogomain.'">';
   	return $text;
 
  }

	function sc_sitelogo_extended() {
	  $prefsitelogomain		= e107::pref('theme', 'sitelogomain', FALSE);
	  $prefsitelogosticky = e107::pref('theme', 'sitelogosticky',  FALSE);	
	  $prefsitelogomobile = e107::pref('theme', 'sitelogomobile',  FALSE);
	  
	  if($prefsitelogomain)  	{  		$prefsitelogomain = e107::getParser()->replaceConstants($prefsitelogomain);    }
	  if($prefsitelogosticky)  	{  	$prefsitelogosticky = e107::getParser()->replaceConstants($prefsitelogosticky);    }
	  if($prefsitelogomobile)  	{  	$prefsitelogomobile = e107::getParser()->replaceConstants($prefsitelogomobile);    } 	

	  $text = 
	'<span class="logo-wrap">
		<img src="'.SITEURL.$prefsitelogomain.'" alt="'.SITENAME.'" class="logo-img">
	</span> 
	<span class="logo-sticky">
		<img src="'.SITEURL.$prefsitelogosticky.'" alt="'.SITENAME.'" class="logo-img">
	</span> 
	<span class="logo-mobile">
		<img src="'.SITEURL.$prefsitelogomobile.'" alt="'.SITENAME.'" class="logo-img">
	</span>';                            

	return $text;
	}
	
	
	function sc_sidebar_search() {
	
	
	global $sql,$sysprefs,$SEARCH_SHORTCODE;

e107::includeLan(e_PLUGIN."search_menu/languages/".e_LANGUAGE.".php");
$text = "";
if (!isset($SEARCH_SHORTCODE)) 
{
	if (file_exists(THEME."search_template.php")) 
	{
			include(THEME."search_template.php");
	} 
	else 
	{
	  		include(e_CORE."templates/search_template.php");
	}
}
	$ref['all'] = 'all';
	$ref['news'] = '0';
	$ref['comments'] = 1;
	$ref['users'] = 2;
	$ref['downloads'] = 3;
	$ref['pages'] = 4;

//	$search_prefs = $sysprefs -> getArray('search_prefs');
	
	$search_prefs = e107::getConfig('search')->getPref();


	if(is_array($search_prefs['plug_handlers']))  
	{
	    foreach ($search_prefs['plug_handlers'] as $plug_dir => $active) 
	    {
			if (is_readable(e_PLUGIN.$plug_dir."/e_search.php")) 
			{
				$ref[$plug_dir] = $plug_dir;
			}
		}
	}
	if($ref[$parm]!= ''){
        $page = $ref[$parm];
    }elseif($parm='all' && $ref[e_PAGE] != ''){
    	$page = $ref[e_PAGE];
	}else{
    	$page = 'all';
	}

	$text .= "  
	<form method='get' role='search' class='searchform' action='".e_HTTP."search.php' id='searchform' > \n";
	$text .= "<input type='hidden' name='t' value='$page' />\n";
	$text .= "<input type='hidden' name='r' value='0' />\n";

	if (defined('SEARCH_SHORTCODE_REF') && SEARCH_SHORTCODE_REF != '') {
	  	$text .= "<input type='hidden' name='ref' value=\"".SEARCH_SHORTCODE_REF."\" />\n";
	}

	$text .= $SEARCH_SHORTCODE;

	$text .="\n </form>";
 
 return $text;
 
	}
	
		/* custom shortcode for highland theme */
	 function sc_sitesearch() { 
		$text = '
			<form  method="get"   action="'.e_HTTP.'search.php"  >'; 
		$text .= "<input type='hidden' name='r' value='0' data-original-title='' /> ";
		$text .= "<input type='hidden' name='s' value='0' data-original-title='' /> ";
		$text .='  
			<input type="text" class="menu-search-field" placeholder="'.LAN_SEARCH.'" id="q1" name="q">
			</form>';
		return $text;
	}
	
	/* custom shortcode for highland theme */
	/*  <div class="site-search hidden-lg">
            <form method="get" id="searchform-header" class="searchform-header" action="http://anpsthemes.com/industrial/demo-8/">
                <input class="searchfield" name="s" type="text" placeholder="Search">
                <button type="submit" class="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
        */
	 function sc_sitesearch_mobile() { 
		$text = '
			<form  method="get"   id="searchform-header" class="searchform-header" action="'.e_HTTP.'search.php"  >'; 
		$text .= "<input type='hidden' name='r' value='0' data-original-title='' /> ";
		$text .='  
			<input type="text" class="searchfield" placeholder="'.LAN_SEARCH.'" id="q2" name="q">
			<button type="submit" class="submit" name="s"><i class="fa fa-search"></i></button>
			</form>';
		return $text;
	}
 
	function sc_cmenubody($parm='')
	{
    $sc   = e107::getScBatch('page', null, 'cpage');
    $data = $sc->getVars();                
		$text =  e107::getParser()->toHTML(vartrue($data['menu_text'],''), true, 'BODY');   
		$text =  str_replace(array("<!-- bbcode-html-start --><p>","</p><!-- bbcode-html-end -->"), "", $text);
		return 	$text; 
	}	   
	
	function sc_cpagebody($parm='')
	{
    $sc   = e107::getScBatch('page', null, 'cpage');
    $data = $sc->getVars();                
		$text =  e107::getParser()->toHTML(vartrue($data['page_text'],''), true, 'BODY');   
		$text =  str_replace(array("<!-- bbcode-html-start --><p>","</p><!-- bbcode-html-end -->"), "", $text);
		return 	$text; 
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
			
			
			
			return $tp->parseTemplate($text, true, $login_menu_shortcodes);
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


		return $tp->parseTemplate($text,true,$login_menu_shortcodes);
	}	
	
  /* general shortcode for any theme, on progress, just workaround for now */	
 	function sc_theme_pagetitle($parm='')
	{   
   if(defined('e_PAGETITLE') )  { return e_PAGETITLE; }
   if(defined('PAGE_NAME') )  { return PAGE_NAME; }
   if((strpos(e_REQUEST_URI, 'login') !== false)) {return 'Login';}
  }	    

/* 
<ol>
    <li><a href="index.html">Home</a></li>
    <li class="active">{THEME_PAGETITLE}</li>
</ol>
												*/	
	
	function sc_theme_breadcrumbs($parm = '')
	{

    //$homeIcon = e107::getParser()->toGlyph('icon-home.glyph',false);
    $homeIcon = 'Home';
    $breadcrumb = array();
		$breadcrumb[] = array('text' => 'Home' , 'url' => e_HTTP);   
		if ((strpos(e_REQUEST_URI, 'gallery') !== false))
		{
			$sc = e107::getScBatch('gallery');
			$data = $sc->getVars();
 

			$breadcrumb[] = array('text' => LAN_PLUGIN_GALLERY_TITLE, 'url' => e107::getUrl()->create('gallery'));
			     //media_cat_sef
			if(vartrue($data['media_id']))
			{
				$breadcrumb[] = array('text' => $data['media_cat_title'], 'url' => e107::getUrl()->create('gallery/index/list', $data));
			}			
		}

		$text = '<ol>
						<li>';
		foreach($breadcrumb as $val)
		{
			$ret = "";
			$ret.= vartrue($val['url']) ? "<a href='" . $val['url'] . "'>" : "";
			$ret.= vartrue($val['text'], '');
			$ret.= vartrue($val['url']) ? "</a>" : "";
			if ($ret != '')
			{
				$opt[] = $ret;
			}
		}
	
		$sep = (deftrue('BOOTSTRAP') === 3) ? "" : "<span class='divider'>/</span>";
		$text.= implode($sep . "</li><li>", $opt);
		$text.= "</li></ol>";
		return $text;
	}
                                               
/*
 <form method="post"> 
														<input type="hidden" name="nr" value="widget">
                            <p> <input class="newsletter-email" type="email" required="" name="ne" value="Email" placeholder=""> </p>
                            <p> <input class="newsletter-submit" type="submit" value="Subscribe"> </p>
                        </form>
												*/		
	function sc_theme_subscribe()
	{
		$pref = e107::pref('core');
		$ns = e107::getRender();
 
/*		if(empty($pref['signup_option_class']))
		{
			return false;
		}  */

		$frm = e107::getForm();
		$text = '<div class="newsletter newsletter-widget">';
		$text .= $frm->open('subscribe','post', e_SIGNUP);
                             
		$text .= "<p>";
		$text .= $frm->text('email','', null, array('placeholder'=>'', 'class'=>'newsletter-email'));
		$text .= "</p>";
		$text .= "<p>";
		$text .= " ".$frm->button('subscribe', 1, 'submit', LAN_LZ_THEME_16, array('class'=>'newsletter-submit'));
		$text .= "</p>";
		$text .= $frm->close();
		$text .= "</div>";
		$caption = 'Subscribe';

		return $ns->tablerender($caption,$text,'subscribe', true);
	}
	
		
}





?>
