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

	function sc_custom_search($parm = NULL)
	{
		include_lan(e_PLUGIN . "search_menu/languages/" . e_LANGUAGE . ".php");
		$text = ' <br/>
			<form   method="get" action="' . e_HTTP . 'search.php">
				<input class="form-control" type="text" name="q"  ' . $value_text . ' placeholder="' . LAN_SEARCH . '"/>
				<input type="hidden" name="r" value="0" /> 
			</form>';
		$text = "<div style='text-align:center'>" . $text . "</div>";
		return $text;
	}


	function sc_faqs_latest($parm = NULL) {
		$query = " SELECT f.*,cat.* FROM #faqs ORDER BY faq_datestamp DESC LIMIT 0,5  ";
		
		if($allRows = e107::getDb()->retrieve('faqs', '*', 'ORDER BY faq_datestamp DESC LIMIT 0,5 ', true))  {
		  foreach($allRows as $row)
		  {
			$url        = e107::url('faqs','item', $row, 'full');
			$question   = e107::getParser()->toHTML($row['faq_question'],true,'TITLE');	
			$text .= '<p><a href="'.$url.'">'.$question.'</a></p>';
			 
		  }
		
		}
		else $text = 'No FAQs';
				return $text;	
	
	}
	
	
	function sc_latestworks($parm = NULL)
	{
		$template = e107::getCoreTemplate('chapter', 'portfolio');
		$sc = e107::getScBatch('page', null, 'cpage');
	
		// ONLY ONE BOOK WITH TEMPLATE PORTFOLIO
	
		$book = e107::getDb()->retrieve("SELECT chapter_id, chapter_name FROM #page_chapters WHERE chapter_visibility IN (" . USERCLASS_LIST . ") 
	  AND chapter_template = 'portfolio'  LIMIT 1", true );
		$page['book_id'] = $book[0]['chapter_id'];
		$page['book_name'] = $book[0]['chapter_name'];
	
		// TO GET ALL PAGES, WITH THEIR CHAPTERS WITH BOOK PORTFOLIO
	
		$query = "SELECT * FROM #page AS p LEFT JOIN #page_chapters as ch ON p.page_chapter=ch.chapter_id WHERE ch.chapter_parent = " . $page['book_id'] . " 
		ORDER BY p.page_order DESC LIMIT 10";
		$text.= e107::getParser()->parseTemplate($template['listPages']['start'], true, $sc);
		if ($pageArray = e107::getDb()->retrieve($query, TRUE))
		{
			foreach($pageArray as $page)
			{
				$sc->setVars($page);
				$text.= e107::getParser()->parseTemplate($template['listPages']['item'], true, $sc);
			}
		}
		else $text = 'No Portfolio items';
		$text.= e107::getParser()->parseTemplate($template['listPages']['end'], true, $sc);
		return $text;
	}

	function sc_recentnews($parm = NULL)
	{
		$cacheString = 'nq_news_latest_menu_' . md5(serialize($parm));
		$cached = e107::getCache()->retrieve($cacheString);
		if (false === $cached)
		{
			e107::plugLan('news');
			if (is_string($parm))
			{
				parse_str($parm, $parms);
			}
			else
			{
				$parms = $parm;
			}
	
			$ntree = e107::getObject('e_news_tree', null, e_HANDLER . 'news_class.php');
			if (empty($parms['tmpl']))
			{
				$parms['tmpl'] = 'news_menu';
			}
	
			if (empty($parms['tmpl_key']))
			{
				$parms['tmpl_key'] = 'recent';
			}
	
			$parms['caption'] = '';
			$template = e107::getTemplate('news', $parms['tmpl'], $parms['tmpl_key']);
			$treeparm = array();
			if (vartrue($parms['count'])) $treeparm['db_limit'] = '0, ' . intval($parms['count']);
			if (vartrue($parms['order'])) $treeparm['db_order'] = e107::getParser()->toDb($parms['order']);
			$parms['return'] = true;
			$cached = $ntree->loadJoinActive(vartrue($parms['category'], 0) , false, $treeparm)->render($template, $parms, false);
			e107::getCache()->set($cacheString, $cached);
		}
	
		return $cached;
	}

  function sc_teammembers()
	{ 
	if($userclass = e107::pref('theme', 'teammemberclass', false)) {
		$teammembers = e107::getDb()->retrieve('user', '*', ' WHERE FIND_IN_SET('.$userclass.',user_class) ', TRUE);
		
		$TM_TEMPLATE = e107::getCoreTemplate('user', 'teammember');
		
		$user_shortcodes = e107::getScBatch('user');
		 
		$text = '';
		
		if($teammembers)
		{
		foreach ($teammembers as $teammember)
		  { 
		      
			$user_shortcodes->setVars($teammember);  
		  $TEAMMEMBER_TEXT     = e107::getParser()->parseTemplate($TM_TEMPLATE , TRUE, $user_shortcodes);
		  $text .= $TEAMMEMBER_TEXT;
		  }
		}
		else
		{
		    $text = "
		    <div class='alert alert-info alert-block text-center'>No members</div>
		    ";
		}  
	 
		return $text ; 
	 
		}	
	else return '';
	}
	
function sc_portfolioitems()
	{
	$template = e107::getCoreTemplate('chapter', 'portfolio');
	$sc = e107::getScBatch('page', null, 'cpage');

	// ONLY ONE BOOK WITH TEMPLATE PORTFOLIO
  
	$book = e107::getDb()->retrieve("SELECT chapter_id, chapter_name, chapter_meta_description FROM #page_chapters WHERE chapter_visibility IN (" . USERCLASS_LIST . ") AND chapter_template = 'portfolio'  LIMIT 1", true); 
	$page['book_id'] = $book[0]['chapter_id'];
	$page['book_name'] = $book[0]['chapter_name'];
	$page['book_desc'] = $book[0]['chapter_meta_description'];

	// $page['book_sef'] = $bookSef;

	$var = array(
		'BOOK_NAME' => e107::getParser()->toHtml($page['book_name']) ,
		'BOOK_DESC' => e107::getParser()->toHtml($page['book_desc']) ,
	);
	$body = e107::getParser()->simpleParse($template['listItems']['caption'], $var);

	// NEW PORTFOLIO FILTERING

	$filter = $template['listItems']['filter-start'];
	$query = "SELECT * FROM #page_chapters as ch WHERE ch.chapter_parent = " . intval($page['book_id']) . " ORDER BY chapter_order DESC ";
	if (e107::getDb()->gen($query))
		{
		while ($row = e107::getDb()->fetch())
			{
			$var = array(
				'CHAPTER_NAME' => e107::getParser()->toHtml($row['chapter_name']) ,
				'CHAPTER_SEF' => e107::getParser()->toHtml($row['chapter_sef'])
			);
			$filter.= e107::getParser()->simpleParse($template['listItems']['filter-item'], $var);
			}
		}

	$filter.= $template['listItems']['filter-end'];

	// TO GET ALL PAGES, WITH THEIR CHAPTERS WITH BOOK PORTFOLIO

	$query = "SELECT * FROM #page AS p LEFT JOIN #page_chapters as ch ON p.page_chapter=ch.chapter_id WHERE ch.chapter_parent = " . $page['book_id'] . " ORDER BY p.page_order DESC ";
	$text.= e107::getParser()->parseTemplate($template['listItems']['start'], true, $sc);
	if ($pageArray = e107::getDb()->retrieve($query, TRUE))
		{
		foreach($pageArray as $page)
			{
			$sc->setVars($page);
			$text.= e107::getParser()->parseTemplate($template['listItems']['item'], true, $sc);
			}
		}
	  else $text = 'No Portfolio items';
	$text.= e107::getParser()->parseTemplate($template['listItems']['end'], true, $sc);
	return $body . $filter . $text;
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

		function sc_bootstrap_usernav($parm = '')
		{

			include_lan(e_PLUGIN . "login_menu/languages/" . e_LANGUAGE . ".php");

			$tp = e107::getParser();
		// $login_menu_shortcodes
			require(e_PLUGIN . "login_menu/login_menu_shortcodes.php"); // don't use 'require_once'.

			$userReg = defset('USER_REGISTRATION');

			if(!USERID) // Logged Out.
			{
				$text = '';

				if($userReg == 1)
				{
					$signuplink = '<li><a class="nav-link" href="' . e_SIGNUP . '">' . LAN_LOGINMENU_3 . '</a></li>';
				}

				$socialActive = e107::pref('core', 'social_login_active');

				if(!empty($userReg) || !empty($socialActive)) // e107 or social login is active.
				{
					$loginlink = '
			  	    <a class="dropdown-toggle" href="#" id="dropdownLoginLink" data-toggle="dropdown" aria-haspopup="true"
					   aria-expanded="true" title="' . LAN_LOGINMENU_51 . '"> ' . LAN_LOGINMENU_51 . '</a>';
					$sociallogin = '{SOCIAL_LOGIN: size=2x&label=1}';
				}
				else
				{
					return '';
				}


				if(!empty($userReg)) // value of 1 or 2 = login okay.
				{

					//	global $sc_style; // never use global - will impact signup/usersettings pages.
					//	$sc_style = array(); // remove any wrappers.

					$loginform = '
					<form method="post" onsubmit="hashLoginPassword(this);return true" action="' . e_REQUEST_HTTP . '" accept-charset="UTF-8">
					<p>{LM_USERNAME_INPUT}</p>
					<p>{LM_PASSWORD_INPUT}</p>
					<div class="form-group"></div>
					{LM_IMAGECODE_NUMBER}
					{LM_IMAGECODE_BOX}
					<div class="checkbox">
					<label class="string optional" for="autologin"><input style="margin-right: 10px;" type="checkbox" name="autologin" id="autologin" value="1">
					' . LAN_LOGINMENU_6 . '</label>
					</div>
					<input class="btn btn-primary btn-block" type="submit" name="userlogin" id="userlogin" value="' . LAN_LOGINMENU_51 . '">
					';

					$loginform .= '
					<a href="{LM_FPW_LINK=href}" class="btn btn-default btn-sm  btn-block">' . LAN_LOGINMENU_4 . '</a>
					<a href="{LM_RESEND_LINK=href}" class="btn btn-default btn-sm  btn-block">' . LAN_LOGINMENU_40 . '</a>
					';

					$loginform .= "<p></p>
					</form>
					";
				}

				$text = ' ' .
					$signuplink .
					'<li class="divider-vertical"></li>
					<li class="dropdown">
				     ' . $loginlink . $sociallogin . '
					   <div class="dropdown-menu" aria-labelledby="dropdownLoginLink" style="min-width:250px; padding: 15px; padding-bottom: 0px;">
						  ' . $loginform . '
					   </div>
				</li>';

				$text .= '';

				return $tp->parseTemplate($text, true, $login_menu_shortcodes);
			}


			// Logged in.
			//TODO Generic LANS. (not theme LANs)
			if(ADMIN)
			{
				$adminlink = '<li><a href="' . e_ADMIN_ABS . '"><span class="fa fa-cogs"></span> ' . LAN_LOGINMENU_11 . '</a></li>';
			}
			else
			{
				$adminlink = '';
			}


			$text = '
		     <li class="dropdown">{PM_NAV}</li>
				 <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">{SETIMAGE: w=20} {USER_AVATAR: shape=circle} ' . USERNAME . ' <b class="caret"></b></a>
			   <ul class="dropdown-menu">
				  <li><a href="{LM_USERSETTINGS_HREF}"><span class="fa fa-cog"></span> ' . LAN_SETTINGS . '</a></li>
				  <li><a href="{LM_PROFILE_HREF}"><span class="fa fa-user"></span> ' . LAN_LOGINMENU_13 . '</a></li>
				  ' . $adminlink . '
				  <li><a href="' . e_HTTP . 'index.php?logout"><span class="fa fa-sign-out"></span> ' . LAN_LOGOUT . '</a></li>
			   </ul>';

			return $tp->parseTemplate($text, true, $login_menu_shortcodes);
		}

	function sc_chaptersef()
	{
  		$sc   = e107::getScBatch('page', null, 'cpage');
  		$data = $sc->getVars();      
			return vartrue($data['chapter_sef'],'chapter-no-sef');
	}		
	
  /* general shortcode for any theme, on progress, just workaround for now */	
 	function sc_theme_pagetitle($parm='')
	{   
   if(defined('e_PAGETITLE') )  { return e_PAGETITLE; }
   if(defined('PAGE_NAME') )  { return PAGE_NAME; }
   if((strpos(e_REQUEST_URI, 'login') !== false)) {return LAN_TO_LOGINPAGENAME;}
  }
	
	function sc_user_twitter($parm='')
	{		 
 
   	$sc   = e107::getScBatch('user');
		$data = $sc->getVars();				
		$ue = new e107_user_extended;     	
		$text = $ue->user_extended_getvalue($data['user_id'] , 'user_twitter');   
		return $text; 
	}

	function sc_pagetags($parm='')
	{
		$sc   = e107::getScBatch('page', null, 'cpage');
  	$data = $sc->getVars(); 
		
		$tmp = explode(",",$data['page_metakeys']);
		$words = array();
		$class = (!empty($parm['class'])) ? $parm['class'] : 'news-tag';
		$separator = (isset($parm['separator'])) ? $parm['separator'] : ', ';
		
		if($parm == 'label')
		{
			$start = "<span class='label label-default'>";
			$end	= "</span>";	
			$sep = " ";
		}
		else
		{
			$start = "";
			$end = "";
			$sep = $separator;
		}
		
		foreach($tmp as $val)
		{
			if(trim($val))
			{
				$url = e107::getUrl()->create('news/list/tag',array('tag'=>$val)); // e_BASE."news.php?tag=".$val
				$words[] = "<a class='".$class."' href='".$url."'>".$start.$val.$end."</a>";
			}
		}


		if(count($words))
		{
			return implode($sep,$words);
		}
		else 
		{
			return LAN_NONE;
		}			
	}	
	
	
	function sc_menu_button_url($parm='') {
		$sc   = e107::getScBatch('page', null, 'cpage');
  	$data = $sc->getVars(); 
  	return e107::getParser()->replaceConstants($data['menu_button_url']);
	}
	
	/**
	 * @example {CPAGERELATED: types=news}
	 */	
	function sc_cpagerelated($array=array())
	{
		$sc   = e107::getScBatch('page', null, 'cpage');
  	$data = $sc->getVars(); 

		if(!varset($array['types']))
		{
			$array['types'] = 'page,news';
		}

		$templateID = vartrue($data['page_template'],'default');

		$template = e107::getCoreTemplate('page', $templateID, 'related');

    $tags = $data['page_metakeys'];
		$tags = str_replace(', ',',', $tags);
    e107::setRegistry('core/form/related',$tags); 
    
    $parm = array(
			'limit' => 5,   /* always + 1 */
			'types' => 'page');
 

		if(empty($template))
		{
			$TEMPLATE['start'] = "<hr><h4>".defset('LAN_RELATED', 'Related')."</h4><ul class='e-related'>";
			$TEMPLATE['item'] = "<li><a href='{RELATED_URL}'>{RELATED_TITLE}</a></li>";
			$TEMPLATE['end'] = "</ul>";

		}
		else
		{
			$TEMPLATE = $template['related'];
		}		
		
		$types = explode(',',$parm['types']);
		$list = array();   $tmp = array();
		
		$head = e107::getParser()->parseTemplate($TEMPLATE['start'],true);
    
		foreach($types as $plug)
		{
		
			if(!$obj = e107::getAddon($plug,'e_related'))
			{
				continue;
			}
			
			$parm['current'] = $data['page_id'];
 
		
			$tmp = $obj->compile($tags,$parm);	
		  
			if(count($tmp))
			{    
				foreach($tmp as $val)
				{
					$row = array(
						'RELATED_URL'       => e107::getParser()->replaceConstants($val['url'],'full'),
						'RELATED_TITLE'     => $val['title'],
						'RELATED_IMAGE'     => e107::getParser()->toImage($val['image']),
						'RELATED_IMAGE_SRC' => e107::getParser()->thumbUrl($val['image']),
						'RELATED_SUMMARY'   => e107::getParser()->toHtml($val['summary'],true,'BODY')
					);
             
					$list[] = e107::getParser()->simpleParse($TEMPLATE['item'], $row);
          
				}
			}		
		}
	   
		if(count($list))
		{
			return "<div class='e-related clearfix hidden-print'>".$head.implode("\n",$list).e107::getParser()->parseTemplate($TEMPLATE['end'], true)."</div>";

		//	return "<div class='e-related clearfix hidden-print'><hr><h4>".defset('LAN_RELATED', 'Related')."</h4><ul class='e-related'>".implode("\n",$list)."</div>"; //XXX Tablerender?
		}
	}
	
	
	function sc_cmenu_button_text()
  {
    $sc   = e107::getScBatch('page', null, 'cpage');
    $data = $sc->getVars();
    return vartrue($data['menu_button_text'],'');
  }
  
}





?>
