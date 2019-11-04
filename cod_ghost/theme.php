<?php

/*
+------------------------------------------------+
|	e107 Theme - FREE THEME - CALL OF DUTY GHOSTS
|
|	CsaSzy Themes
|	http://csaszy.hu/
|	varcsa77@gmail.com
|
+------------------------------------------------+
*/

if (!defined('e107_INIT')) { exit; }

// [multilanguage]
include_lan(e_THEME."cod_ghost/languages/".e_LANGUAGE.".php");
 
// [theme]
 
define("IMODE", "lite");
define("THEME_DISCLAIMER", "<br /><i>".LAN_THEME_6."</i>");

//$no_core_css = TRUE;
define("CORE_CSS", false);

e107::css("theme", "js/e107fix.css" ); 

e107::js("theme", "js/alert.js", 'jquery');
e107::js("theme", "js/transition.js", 'jquery');
e107::js("theme", "js/collapse.js", 'jquery');
					
e107::js('theme', 'jquery/scroll.js', 'jquery');
e107::js('theme', 'jquery/mousewheel.js', 'jquery');
e107::js('theme', 'jquery/jquery.tinycarousel.js', 'jquery');
           
$code1 = "$('#carousel').tinycarousel({
            start: 2,
            display: 2,
            interval: true,
            rewind: true
						});
						";   
e107::js("footer-inline", $code1);  

           
$code2 = "$('a[href=#top]').click(function(){
             jQuery('html, body').animate({scrollTop:0}, 'slow');
             return false;
            }); 
						";   
e107::js("footer-inline", $code2);   
 

$register_sc[]= 'NEXTPREV';
$register_sc[] = 'SLIDER'; 
$register_sc[]= 'TB_LOGIN';

// [layout]
$layout = "_default";

$LOGIN = 
'
   <div class="panel panel-info" >     
     <div style="padding-top:30px" class="panel-body" >
         <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
           {SETSTYLE=login}
           {MENU=8}
    </div>
  </div>
';

 

function rand_tag(){
        $tags = file(e_BASE."files/taglines.txt");
        return stripslashes(htmlspecialchars($tags[rand(0, count($tags))]));
}

// [newsstyle]
$NEWSSTYLE = "
<div class='post'>
  <div class='post-options-bg'>{EMAILICON}{PRINTICON}{PDFICON}{ADMINOPTIONS}</div>
    <div class='post-title'>{NEWSTITLELINK=extend}</div>
      <div class='post-info'>
        <span class='post-author'>".LAN_THEME_4." {NEWSAUTHOR}</span>
        <span class='post-date'>{NEWSDATE}</span>
        <span class='post-comments'>{NEWSCOMMENTS}</span>
</div>
  <div class='clear'></div>
    <div class='post-body'>
      {NEWSIMAGE}
      {NEWSBODY}
      {EXTENDED}
    </div>
  <div class='post-bottom'></div>
</div>
";
     
//  [list of news category]
$NEWSLISTSTYLE = "
<div class='post'>
  <div class='post-options-bg'>{EMAILICON}{PRINTICON}{PDFICON}{ADMINOPTIONS}</div>
    <div class='post-title'>{NEWSTITLELINK=extend}</div>
      <div class='post-info'>
        <span class='post-author'>".LAN_THEME_4." {NEWSAUTHOR}</span>
        <span class='post-date'>{NEWSDATE}</span>
        <span class='post-comments'>{NEWSCOMMENTS}</span>
      </div>
  <div class='clear'></div>
    <div class='post-bottom'></div>
</div>
";


define('ICONPRINTPDF', 'pdf.png');
define('ICONMAIL', 'email.png');
define('ICONPRINT', 'printer.png');
define('ICONSTYLE', 'float: left; border:0');
define('COMMENTLINK', LAN_THEME_1);
define('COMMENTOFFSTRING', LAN_THEME_2);
define('PRE_EXTENDEDSTRING', '<br /><br /><div class="morebutton"><span>');
define('EXTENDEDSTRING', LAN_THEME_3);
define('POST_EXTENDEDSTRING', '</span></div><br />');
define('TRACKBACKSTRING', LAN_THEME_7);
define('TRACKBACKBEFORESTRING', '&nbsp;|&nbsp;');

function linkstyle($cod_linkstyle) {
  switch ($cod_linkstyle)
  {
  case 'sitelinks2':
  $linkstyleset['prelink'] =  "<ul class='flat2'>";  
  $linkstyleset['postlink'] =  "</ul>";  
  $linkstyleset['linkclass'] =  "";  
  $linkstyleset['linkclass_hilite'] =  ""; 
  $linkstyleset['linkstart'] =  "<li>";  
  $linkstyleset['linkend'] =  "</li>"; 
  $linkstyleset['linkdisplay'] = 1; 
  $linkstyleset['linkalign'] =  "left"; 
  $linkstyleset['linkseperator'] =  "";
  break;
  default: 
  define('PRELINK', ""); 
  define('POSTLINK', ""); 
  define('LINKSTART', ""); 
  define('LINKEND', ""); 
  define('LINKDISPLAY', 1); 
  define('LINKALIGN', "left"); 
  }
return $linkstyleset;
}

define('BULLET', "bullet.png");
define('bullet', "bullet.png");


////////////////////////////////////////////////////////////////////////////////
class cod_ghost_theme
{

//        [tablestyle]
function tablestyle($caption, $text, $mode, $options = array()) {
         
					  $style = varset($options['setStyle'], 'default');     
					  
					  echo "\n<!-- tablestyle initial:  style=" . $style . "  mode=" . $mode . "  UniqueId=" . varset($options['uniqueId']) . " -->\n\n";
					  
					  if($style == "wmessage"){                  
					  echo"
					  <div class='wmessage'>		                       		                                                      
					  <h2>{$caption}</h2>
					  <div class='body'>{$text}</div>                                                      
					  </div>                                                  
					  ";
					  }
					  else if($style == "sidecol"){                  
					  echo "
					  <div class='box'>		          
					  <div class='title'>             		                                                      
					  <h2>{$caption}</h2>
					  </div>
					  <div class='body'>{$text}</div>
					  </div>                                                                                                        
					  "; 
					  }
					  else if($style == "leftcol"){                  
					  echo "
					  <div class='box'>		          
					  <div class='title'>             		                                                      
					  <h2>{$caption}</h2>
					  </div>
					  <div class='body'>{$text}</div>
					  </div>                                                                                                        
					  ";                                               
					  }
					  else if($style == "footermenu"){                  
					  echo "
						<div class='spacer'>
					  <div class='footermenu-title'>{$caption}</div>
					  <div class='footermenu-body'>{$text}</div>                         
					  </div>
					  <div style='clear: both'>&nbsp;</div>                                                   
					  ";                                
					  }
					  else if($style == "login"){                  
					  echo "
					   {$text}                                                                       
					  ";                                
					  }
					  else{
					  echo "
					  <div class='spacer'>	        
						<div class='othermenu-box'>
						<div class='othermenu-title'>         
					  <h2>{$caption}</h2>                  
					  </div>		                                 
					  <div class='othermenu-body'>{$text}</div>                       
					  </div>
					  </div>            
					  ";        
					  } 
					}
}
// chatbox post style
$CHATBOXSTYLE = "<br />
<div style='text-align: left'>
<img src='".THEME_ABS."images/bullet3.png' alt='' style='width: 16px; height: 16px; vertical-align: middle' />
<b>{USERNAME}</b><br /><span class='smalltext'>{TIMEDATE}</span><br />{MESSAGE}</div>
";

// Image Version Example
$SEARCH_SHORTCODE = "
  <input class='search-box' type='text' name='q' size='20' value='".LAN_THEME_8."...' maxlength='50' onclick=\"this.value=''\" />
	<input class='search-button' type='image' name='s' src='".THEME_ABS."images/search-button.png'  value='".LAN_THEME_8."' style='width: 60px; height: 60px; border: 0px; vertical-align: middle'  />
  ";
?>
