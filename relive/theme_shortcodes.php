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
     /*
             <form class='search-form'>
            <div class='container'>
                <input type='text' class='search-line' placeholder='Search...' />
                <input type='submit' value='' />
                <a class='close-search'>x</a>
            </div>
        </form>*/
        

	// {HEADERSEARCH}
   function sc_headersearch() { 
   $text = "<form class='search-form' method='get' action='".e_SEARCH."'>
            <div class='container'>               
                    <input type='hidden' name='r' value='0' data-original-title=''>
                    <input  id='q' name='q' type='text' class='search-line'  placeholder='Search...'>
                    <input type='submit' value='' />
                    <a class='close-search'>x</a>
            </div>
        </form>";
		return $text;
	}
  
  /*            <h4>Newsletter subscribe</h4>
            <form>
                <input type="text" placeholder="e-email address" name="subscribe" />
                <input type="submit" value="" />
                <i style="display: none;" class="fa fa-check"></i> <!-- display: block if input text is correct -->
            </form> */
  
  	function sc_theme_subscribe()
	{
		$pref = e107::pref('core');
		$ns = e107::getRender();

		if(empty($pref['signup_option_class']))
		{
			return false;
		}

		$frm = e107::getForm();
		$text = $frm->open('lz-subscribe','post', e_SIGNUP);

		$text .= $frm->text('email','', null, array('placeholder'=>'email address', 'class'=>'empty' ));
    $text .= '<input type="submit" value="" />';
		$text .= '<i style="display: none;" class="fa fa-check"></i>';
		$text .= $frm->close();

		$caption = 'Newsletter subscribe';

		return $ns->tablerender($caption,$text,'theme_subscribe', true);
	}  	


  /*  NEWS SHARE START */
	public function getProviders()
	{

		$emailMessage = LAN_SOCIAL_005;

		$tp = e107::getParser();

			
		$providers = array( 
			'email'				=> array('icon'	=> 'envelope',			'title'=> LAN_SOCIAL_002,	                            'url' => "mailto:EMAIL_RECIPIENT?subject=[t]&body=".rawurlencode($emailMessage)."[u]"),
			'facebook-like'		=> array('icon' => 'thumbs-up',	'title'=> $tp->lanVars(LAN_SOCIAL_001, "Facebook"),	    'url' => "http://www.facebook.com/plugins/like.php?href=[u]"),
			'facebook-share'	=> array('icon' => 'facebook',		'title'=> $tp->lanVars(LAN_SOCIAL_000, "Facebook"),	    'url' => "http://www.facebook.com/sharer.php?u=[u]&t=[t]"),
			'twitter'			=> array('icon' => 'twitter',		'title'=> $tp->lanVars(LAN_SOCIAL_000, "Twitter"),	    'url' => "http://twitter.com/share?url=[u]&text=[t]"),
			'google-plus1'		=> array('icon' => 'google-plus',		'title'=> LAN_SOCIAL_003,		                        'url' => "https://apis.google.com/_/+1/fastbutton?usegapi=1&size=large&hl=en&url=[u]"),

			//	'google-plus'		=> array('icon' => 'fa-google-plus',		'title'=>"On Google Plus",		'url' => "https://plusone.google.com/_/+1/confirm?hl=en&url=[u]"),
			'linkedin'			=> array('icon' => 'linkedin',		'title'=> $tp->lanVars(LAN_SOCIAL_000, "LinkedIn"),	    'url' => "http://www.linkedin.com/shareArticle?mini=true&url=[u]"),
			'pinterest'			=> array('icon'	=> 'pinterest',	'title'=> $tp->lanVars(LAN_SOCIAL_000, "Pinterest"),	'url' => "http://www.pinterest.com/pin/create/button/?url=[u]&description=[t]&media=[m]"),
			'stumbleupon'		=> array('icon'	=> 'stumbleupon',	'title'=> $tp->lanVars(LAN_SOCIAL_000, "StumbleUpon"),  'url' => "http://www.stumbleupon.com/submit?url=[u]&title=[t]"),
 
			'digg'				=> array('icon'	=> 'digg',			'title'=> $tp->lanVars(LAN_SOCIAL_000, "Digg"),		    'url' => "http://www.digg.com/submit?url=[u]"),

			'tumblr'			=> array('icon'	=> 'tumblr',		'title'=> $tp->lanVars(LAN_SOCIAL_000, "Tumblr"),		'url' => "http://www.tumblr.com/share?v=3&u=[u]&t=[t]&s="),
			'pocket'            => array('icon' => 'get-pocket',       'title'=> $tp->lanVars(LAN_SOCIAL_004, "Pocket"),       'url' => "https://getpocket.com/save?url=[u]&title=[t]"),
			'wordpress'         => array('icon' => 'wordpress',    'title'=> $tp->lanVars(LAN_SOCIAL_000, "Wordpress"),    'url' => "http://wordpress.com/press-this.php?u=[u]&t=[t]&s=[t]"),
			'pinboard'          => array('icon' => 'pinboard',     'title'=> $tp->lanVars(LAN_SOCIAL_004, "Pinboard"),     'url' => "https://pinboard.in/popup_login/?url=[u]&title=[t]&description=[t]"),

		//	'whatsapp'          =>array('icon'  => 'e-social-whatsapp',    'mobile'=>true,  'title'=> $tp->lanVars(LAN_SOCIAL_000, "WhatsApp"),	    'url'=> "whatsapp://send?text=[u]", 'data-action' =>"share/whatsapp/share"),
		//	'sms'               => array('icon' => 'e-social-sms',         'mobile'=>true,  'title'=>'sms', 'url'=> "sms://&body=[u]"),
		//	'viber'             => array('icon' => 'e-social-viber',       'mobile'=>true,  'title'=>'viber',   'url'=>"viber://forward?text=[u]")
		);

		return $providers;
	}
  
	private function getHashtags($extraTags='')
	{
		$hashtags = e107::pref('social','sharing_hashtags','');

		$hashtags = str_replace(array(" ",'#'),"", $hashtags);

		$ret = explode(',',$hashtags);

		if(!empty($extraTags))
		{
			$extraTags = str_replace(array(" ",'#'),"", $extraTags);
			$tmp = explode(',',$extraTags);
			foreach($tmp as $v)
			{
				$ret[] = $v;
			}
		}

		if(!empty($ret))
		{
			return implode(',',$ret);
		}

	}
  
	/**
	 * {SOCIALSHARE: url=x&title=y}
	 * @example {SOCIALSHARE: type=basic} - Show only Email, Facebook, Twitter and Google. 
	 * @example {SOCIALSHARE: dropdown=1&type=basic} - Show only Email, Facebook, Twitter and Google in a drop-down button
	 * @example {SOCIALSHARE: providers=twitter,pinterest&tip=false} - override provider preferences and disable tooltips.
	 * @example for plugin developers:  send 'var' values for use by the social shortcode. (useful for loops where the value must change regularly) 
	 * 	$socialArray = array('url'=>'your-url-here', 'title'=>'your-title-here');
		e107::getScBatch('social')->setVars($socialArray);
	 */
	function sc_newsshare($parm=array()) // Designed so that no additional JS required.
	{
		$pref = e107::pref('social');

		if(varset($pref['sharing_mode']) == 'off')
		{
			return '';
		}
		$defaultUrl 	= vartrue($this->var['url'], e_REQUEST_URL);
		$defaultTitle	= vartrue($this->var['title'], deftrue('e_PAGETITLE'). " | ". SITENAME);
	//	$defaultDiz		= vartrue($this->var['description'], e107::getUrl()->response()->getMetaDescription());
		$defaultDiz		= vartrue($this->var['description'], e107::getSingleton('eResponse')->getMetaDescription());
		$defaultTags    = vartrue($this->var['tags'],'');
		
		$tp 			= e107::getParser();

		$providers = $this->getProviders();

		if(empty($parm['providers'])) // No parms so use prefs instead.
		{
			$defaultProviders = array('email' ,'facebook',  'twitter',  'google-plus',  'pinterest' ,  'linkedin'    );
			$parm['providers']  = !empty($pref['sharing_providers']) ? array_keys($pref['sharing_providers']) : $defaultProviders;
		}
		else
		{
			$parm['providers']  = explode(",",$parm['providers']);
		}
    
    
		$url 			= varset($parm['url'], 		$defaultUrl);
		$title 			= varset($parm['title'], 	$defaultTitle) ;
		$description 	= varset($parm['title'], 	$defaultDiz);
		$tags           = varset($parm['tags'],     $defaultTags);
		$media 			= "";
		$label 			= varset($parm['label'], 	$tp->toGlyph('e-social-spread'));
		
		$size			= varset($parm['size'],		'md');


		$data = array('u'=> rawurlencode($url), 't'=> rawurlencode($title), 'd'	=> rawurlencode($description), 'm' => rawurlencode($media));
		
 

		$opt = array();
 

		$hashtags = $this->getHashtags($tags);
 
		$twitterAccount = basename(XURL_TWITTER);
 
 
	//	return print_a($hashtags,true);
		foreach($providers as $k=>$val)
		{
      
			if(!in_array($k,$parm['providers']))
			{ 
				continue;
			}
 
			$pUrl = str_replace("&","&amp;",$val['url']);

			$shareUrl = $tp->lanVars($pUrl,$data);

			if($k == 'twitter')
			{
				if(!empty($hashtags))
				{
					$shareUrl .= "&amp;hashtags=".rawurlencode($hashtags);
				}

				if(!empty($twitterAccount))
				{
					$shareUrl .= "&amp;via=".$twitterAccount;
				}

			}

			           //<li><a href="#"><i class="fa fa-facebook"></i></a></li>
      $opt[$k] = "<li><a href='".$shareUrl."' target='_blank' title='".$val["title"]."'><i class='fa fa-".$val["icon"]."'></i></a></li>";          
                 
		//	$opt[$k] = "<a class='social-link branding-".$k."'  target='_blank' title='".$val["title"]."' href='".$shareUrl."'><i class='fa fa-".$k."-square'></i></a>";
		}
		
		// Show only Email, Facebook, Twitter and Google. 
		if(varset($parm['type']) == 'basic')
		{
			$remove = array('linkedi','pinterest', 'stumbleupon', 'digg', 'reddit', 'linkedin', 'tumblr','pocket','wordpress','pinboard');
			foreach($remove as $v)
			{
				unset($opt[$v]);	
			}	
		}
		elseif(!empty($parm['type']))
		{
			$newlist = array();
			$tmp = explode(",",$parm['type']);
			foreach($tmp as $v)
			{
				$newlist[$v] = $opt[$v];
			}
 
		}		
    //<a href="#" class="social-link branding-twitter"><i class="fa fa-twitter-square"></i></a>	
		$class = varset($parm['class'],'text-center btn-group social-share'); 
 
		return '<ul class="socials-post">'.implode("\n",$opt)."</ul>";
 	
	 }
  /*  NEWS SHARE END */
  
  /* SEARCHMENU */
  /*<form>
                        <i class='fa fa-arrow-right'></i>
                        <input type='text' placeholder='Search ...' name='search' />
                        <input type='submit' value='' />
                    </form> */ 
   /* {SIDEBAR_SEARCH} */                
   function sc_sidebar_search($parm = NULL)
	{															
    // todo fix languages call new way
    include_lan(e_PLUGIN."search_menu/languages/".e_LANGUAGE.".php");
    $text = "";
  	$text .= " 
               <form method='get' action='".e_SEARCH."'>
               <i class='fa fa-arrow-right'></i>
               
               ";
  	$text .= "<input type='hidden' name='t' value='all' />\n";
  	$text .= "<input type='hidden' name='r' value='0' />\n";
  	$text .=  	'   <input type="text"  name="q" placeholder="'.LAN_SEARCH.'"   />
                 
                 ';
  	$text .="</form> 	";	
  	return $text;	
	}
  /* SEARCHMENU END */
  
  /* {THEME_PAGETITLE} */ 
  function sc_theme_pagetitle($parm='')
    	{   
       if((strpos(e_REQUEST_URI, 'login') !== false)) {return LAN_TO_LOGINPAGENAME;}
       if((strpos(e_REQUEST_URI, 'download') !== false)) {return LAN_PLUGIN_DOWNLOAD_NAME;}
       
       if(defined('e_PAGETITLE') )  { return e_PAGETITLE; }
       
      // fix for news.php without e_QUERY
       if(!defined('e_PAGETITLE') && defined('PAGE_NAME'))
				{
					define('e_PAGETITLE', PAGE_NAME);
					e107::meta('og:title', PAGE_NAME);
					 return e_PAGETITLE; 
				}                     
      // fix for user.php
      if(e_PAGE == "user.php") {
        if(e_QUERY != '')  { return LAN_USER_50 ;  }
			  else { return LAN_USER_52 ; }
      }
      elseif(e_PAGE == "archive.php") {
        return BLOGCAL_L2 ; 
      }
	 }
  
}

?>
