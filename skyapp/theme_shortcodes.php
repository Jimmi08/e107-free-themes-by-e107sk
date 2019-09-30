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
	// public $override = true;

	function __construct()
	{
		
	}

  function sc_theme_pagetitle($parm='')
	{   
   if(defined('e_PAGETITLE') )  { return e_PAGETITLE; }
   if(defined('PAGE_NAME') )  { return PAGE_NAME; }
 
   return ucfirst(e_CURRENT_PLUGIN);
 
  }

	function sc_bootstrap_branding()
	{
		$pref = e107::pref('theme', 'branding');

		switch($pref)
		{
			case 'logo':

				return e107::getParser()->parseTemplate('{SITELOGO: h=30}',true);

			break;

			case 'sitenamelogo':

				return "<span class='pull-left'>".e107::getParser()->parseTemplate('{SITELOGO: h=30}',true)."</span>".SITENAME;

			break;

			case 'sitename':
			default:

				return SITENAME;

			break;
		}

	}



	function sc_bootstrap_nav_align()
	{
		$pref = e107::pref('theme', 'nav_alignment');

		if($pref == 'right')
		{
			return "navbar-right";
		}
		else
		{
			return "";
		}
	}


	/*---------------------- user box  ********************************************/
  // {USERBOX}
  function sc_userbox($parm = null) {
    //return nothing for log in user
    if(!USERID) {
      return "";
    }
    
    if(!empty($parm['layout']))
		{
			$tmpl= $parm['layout'];
		}
    
    e107::includeLan(e_PLUGIN."login_menu/languages/".e_LANGUAGE.".php");
    require(e_PLUGIN."login_menu/login_menu_shortcodes.php"); // don't use 'require_once'.
    $userReg = defset('USER_REGISTRATION');
 
  	if($userReg==1)
  	{
      $userNameLabel = !empty($parm['username']) ? USERNAME : '';
       
       $link1 = e107::getParser()->parseTemplate('{LM_USERSETTINGS_HREF}',true,$login_menu_shortcodes);
       $link2 = e107::getParser()->parseTemplate('{LM_PROFILE_HREF}',true,$login_menu_shortcodes);
       
       
       $links[1] = array( 
  			'link_name'			=> '{USER_AVATAR: w=30&h=30&crop=1&shape=circle}',
  			'link_url'			=> '#', // 'news.php?extend.'.$row['news_id'],
  			'link_description'	=> LAN_LOGINMENU_51,
  			'link_button'		=> '',
  			'link_category'		=> '',
  			'link_order'		=> '',
  			'link_parent'		=> 0,
  			'link_open'			=> '',
  			'link_class'		=> 253,
        'link_sub'      => array()
    		);
        
       	$links[1]['link_sub'][0] = array(
  			'link_name'			=> LAN_SETTINGS,
  			'link_url'			=> $link1, // 'news.php?extend.'.$row['news_id'],
  			'link_description'	=>  LAN_SETTINGS,
  			'link_button'		=> 'fa-cog.glyph',
  			'link_category'		=> '',
  			'link_order'		=> '',
  			'link_parent'		=> 1,
  			'link_open'			=> '',
  			'link_class'		=> 253
    		);
        
       	$links[1]['link_sub'][1] = array(
  			'link_name'			=>   LAN_LOGINMENU_13,
  			'link_url'			=> $link2, // 'news.php?extend.'.$row['news_id'],
  			'link_description'	=>  LAN_LOGINMENU_13,
  			'link_button'		=> 'fa-user.glyph',
  			'link_category'		=> '',
  			'link_order'		=> '',
  			'link_parent'		=> 1,
  			'link_open'			=> '',
  			'link_class'		=> 253
    		);        
        
  		if(ADMIN) 
  		{
       		/* $links[1]['link_sub'][2] = array(
  			'link_name'			=>   '<div class="dropdown-divider"></div>',
    		);  */
      
      
      $links[1]['link_sub'][3] = array(
  			'link_name'			=>   LAN_LOGINMENU_11,
  			'link_url'			=> e_ADMIN_ABS,  
  			'link_description'	=>  LAN_LOGINMENU_11,
  			'link_button'		=> 'fa-cogs.glyph',
  			'link_category'		=> '',
  			'link_order'		=> '',
  			'link_parent'		=> 1,
  			'link_open'			=> '',
  			'link_class'		=> 253
    		); 	
  		} 
      
      
       $links[1]['link_sub'][4] = array(
  			'link_name'			=>   LAN_LOGOUT,
  			'link_url'			=> "index.php?logout", // 'news.php?extend.'.$row['news_id'],
  			'link_description'	=>  LAN_LOGOUT,
  			'link_button'		=> 'fa-sign-out.glyph',
  			'link_category'		=> '',
  			'link_order'		=> '',
  			'link_parent'		=> 1,
  			'link_open'			=> '',
  			'link_class'		=> 253
    		);        
           
    }
 
    
    $tmpl 			= vartrue($tmpl, 'main');
    $template		= e107::getCoreTemplate('navigation', $tmpl);	
    
    $text =  e107::getNav()->render($links, $template);
 
    return e107::getParser()->parseTemplate($text,true,$login_menu_shortcodes);
 
    
  }

  /*---------------------- member login ********************************************/
  // {MEMBER_LOGIN}
  function sc_member_login($parm = null) {
    //return nothing for log in user
    if(USERID) {
      return "";
    }
    
    if(!empty($parm['layout']))
		{
			$tmpl= $parm['layout'];
		}
    
    e107::includeLan(e_PLUGIN."login_menu/languages/".e_LANGUAGE.".php");
    //require(e_PLUGIN."login_menu/login_menu_shortcodes.php"); // don't use 'require_once'.
    $userReg = defset('USER_REGISTRATION');
 
  	if($userReg==1)
  	{    
  
    		$links[] = array(
  			'link_name'			=> LAN_LOGINMENU_3,
  			'link_url'			=> e_SIGNUP, // 'news.php?extend.'.$row['news_id'],
  			'link_description'	=> LAN_LOGINMENU_3,
  			'link_button'		=> '',
  			'link_category'		=> '',
  			'link_order'		=> '',
  			'link_parent'		=> 0,
  			'link_open'			=> '',
  			'link_class'		=> 252
    		);
   
  		}
      
      //delete link_function if you don't want dropdown login box   
  		if(!empty($userReg)) // value of 1 or 2 = login okay. 
  		{ 
    		$links[] = array(
  			'link_name'			=> LAN_LOGINMENU_51,
  			'link_url'			=> e_LOGIN, // 'news.php?extend.'.$row['news_id'],
  			'link_description'	=> LAN_LOGINMENU_51,
  			'link_button'		=> '',
  			'link_category'		=> 1,
  			'link_order'		=> '',
  			'link_parent'		=> 0,
  			'link_open'			=> '',
  			'link_class'		=> 25,
        'link_function'		=> 'theme::sc_bootstrap_usernav',
  			'link_sefurl'			=> '',
  			'link_owner'		=> ''         
    		);
  		} 
      
    $tmpl 			= vartrue($tmpl, 'main');
    $template		= e107::getCoreTemplate('navigation', $tmpl);   
    $outArray 	= array();
    $newArray   =  e107::getNav()->compile($links, $outArray);
    $text       =  e107::getNav()->render($newArray, $template);
    return  e107::getParser()->parseTemplate($text, true, $login_menu_shortcodes);
 
  }
  
  
  //todo: replace this theme menu to allow different template
	function sc_bootstrap_usernav($parm=null)
	{
    $tp = e107::getParser();
    
    $text = '{MENU: path=login_menu/login}';
    $start = "<div class='loginmenutop' style='min-width:250px; padding: 15px; padding-bottom: 0px;'>";
    //$start = "<div class='loginmenutop'>";
    $form = $tp->parseTemplate($text, true);
    $end = "</div>";
    return $start.$form.$end;
	}	
	

	/*
	 * @example shortcode to render news.
	 */
	function sc_bootstrap_news_example($parm=null)
	{
		$news   = e107::getObject('e_news_tree');  // get news class.
		$sc     = e107::getScBatch('news'); // get news shortcodes.
		$tp     = e107::getParser(); // get parser.

		$newsCategory = 1; // null, number or array(1,3,4);

		$opts = array(
			'db_order'  =>'n.news_sticky DESC, n.news_datestamp DESC', //default is n.news_datestamp DESC
			'db_where'  => "FIND_IN_SET(0, n.news_render_type)", // optional
			'db_limit'  => '6', // default is 10
		);

		// load active news items. ie. the correct userclass, start/end time etc.
		$data = $news->loadJoinActive($newsCategory, false, $opts)->toArray();  // false to utilize the built-in cache.
		$TEMPLATE = "{NEWS_TITLE} : {NEWS_CATEGORY_NAME}<br />";

		$text = '';

		foreach($data as $row)
		{

			$sc->setScVar('news_item', $row); // send $row values to shortcodes.
			$text .= $tp->parseTemplate($TEMPLATE, true, $sc); // parse news shortcodes.
		}

		return $text;


	}


	/**
	 * Mega-Menu Shortcode Example.
	 * @usage Select "bootstrap_megamenu_example" in Admin > Sitelinks > Create/Edit > Function
	 * @notes Changing the method name will require changing .theme-sc-bootstrap-megamenu-example in style.css
	 * @param null $data Link data.
	 * @return string
	 */
	function sc_bootstrap_megamenu_example($data)
	{
		// include a plugin, custom code, whatever you wish.

		// return print_a($data,true);

		$parm= array();
		$parm['caption']        = '';
		$parm['titleLimit']     = 25; //    number of chars fo news title
		$parm['summaryLimit']   = 50; //   number of chars for new summary
		$parm['source']         = 'latest'; //      latest (latest news items) | sticky (news items) | template (assigned to news-grid layout)
		$parm['order']          = 'DESC'; //       n.news_datestamp DESC
		$parm['limit']          = '6'; //     10
		$parm['layout']         = 'media-list'; //    default | or any key as defined in news_grid_template.php
		$parm['featured']       = 0;


		return "<div class='container'>". e107::getObject('news')->render_newsgrid($parm) ."</div>";


	}
 
   /*
   <form class="search">
						<div>
							<input type="search" placeholder="Search Our Website & Products">
							<button type="submit" value=""><img src="img/search.png" alt="Search"></button>
						</div>
					</form>
          */
   //{SITESEARCH}
	 function sc_sitesearch() { 
		$text = '
			<form class="search" method="get"   action="'.e_HTTP.'search.php"  >'; 
		$text .= "<input type='hidden' name='r' value='0' data-original-title='' /> ";
		$text .='  
			<input type="search" class="search" placeholder="'.LAN_SEARCH.'" id="q" name="q">
      <button type="submit" value=""><img src="'.THEME_ABS.'img/search.png" alt="'.LAN_SEARCH.'"></button>
			</form>';
		return $text;
	}
}
 
?>
