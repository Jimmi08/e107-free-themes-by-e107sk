<?php
if(!defined('e107_INIT')){ exit; }

// [multilanguage]
e107::lan('theme');

define("BOOTSTRAP", 	3);
define("FONTAWESOME", 	4);
define('VIEWPORT', 		"width=device-width, initial-scale=1.0");
 
define('IMODE', 'lite');
define('STANDARDS_MODE', TRUE);
define('USER_WIDTH','width: 100%');
define("NEXTPREV_NOSTYLE", TRUE);
define("FS_LINK_SEPARATOR",'<div class="fs-linkSep"><!-- --></div>');
define("FS_START_SEPARATOR", FALSE);
define("FS_END_SEPARATOR", FALSE);
define("ADLINK_COLS",5);
$register_sc[]='FS_SITELINKS';


e107::css('url', 'https://cdn.jsdelivr.net/bootstrap/3.3.6/css/bootstrap.min.css');
e107::css('url',    'https://cdn.jsdelivr.net/fontawesome/4.5.0/css/font-awesome.min.css');

e107::css("theme", "assets/css/gaia.css");
e107::js("footer", 			"https://cdn.jsdelivr.net/bootstrap/3.3.6/js/bootstrap.min.js", 'jquery', 2);
/*
function theme_head() {
	return '
		<!--[if lte IE 7]>
		<script type="text/javascript" src="'.THEME_ABS.'js/menu.js"></script>
		<![endif]-->
		<script src="https://ajax.googleapis.com/ajax/libs/prototype/1.7.0.0/prototype.js" type="text/javascript"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/scriptaculous/1.9.0/scriptaculous.js?load=effects" type="text/javascript"></script>
	';
}       */
/* [layout]
  custompages = homepage    $CUSTOMHEADER['HOME'] $CUSTOMFOOTER['HOME'] $CUSTOMHEADER['FULL']
                = forum - full with page   $CUSTOMFOOTER['FULL']  $CUSTOMFOOTER['FULL']
    default     = $HEADER   $FOOTER
*/	

/* reason: login page has no header */
$LAYOUT['_header_'] = '';
$LAYOUT['_footer_'] = '';
$header = ' 
<div class="wrapper container">
	<div class="headerbg row">
		<div class="headertop ">
			<div class="sitelogo col-md-4 col-sm-5 col-xs-12 text-center">
			  <div class="ml20">
	      	<a href="{SITEURL}" title="{SITENAME}">{LOGO}</a>
	      </div>
			</div>
			<div class="banner col-md-8  col-xs-12  col-sm-7">
			  <div class="mr20">
					{SETIMAGE: w=450}
					{BANNER=e107promo}			 
				</div>
			</div>
		</div>
		<div class="headerbottom ">
			<div class="fs_login col-md-8 col-sm-7 col-xs-12 col-xxs-12">
				{FS_LOGIN}
			</div>
			<div class="sitesearch col-md-4 col-sm-5 col-xs-12 col-xxs-12">
				{SEARCH}
			</div>
		</div>
	</div>
 
		<div class="navbar" role="navigation">  
			<div class="navbar-header">      
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation
					</span>
					<span class="icon-bar">
					</span>
					<span class="icon-bar">
					</span>
					<span class="icon-bar">
					</span>
				</button>
			</div>
			<div class="collapse navbar-collapse" >{NAVIGATION=main}
			</div>    
	   
 </div>
 
';

$footer = '
	<div class="footer row">
		<div class="col-md-4 col-xs-4 col-xxs-12 text-center">
			<div class="fmenul">
				<a href="http://validator.w3.org/check?uri=referer" title="">
					<img class="img-responsive" src="'.THEME_ABS.'images/bottom_xhtml.png" alt="validator"  /></a>
			</div>
		</div>
		<div class="col-md-4 col-xs-4 col-xxs-12 text-center">
		  <div class="fmenum">
			<a href="http://www.e107.org" title="e107"><img class="img-responsive" src="'.THEME_ABS.'images/e_logo_small.png" alt="e107" /></a>
			<br />{SITENAME}
			</div>
		</div>
		<div class="col-md-4 col-xs-4 col-xxs-12 text-center">
		  <div class="fmenur smalltext">
			{SITEDISCLAIMER}
			</div>
		</div>

	</div>
	<div class="footerlinks row">
	  <div class="col-xs-12">
	  {NAVIGATION=footer}
	  </div>
	</div>
</div>
';
/* first div is inside {CORE_MESSAGE} */
$LAYOUT['homepage'] 				 = $header.'
	<div class="maincontent row">
	  <div class="topcontent clearfix ">
	    <div class="topcontent_entry clearfix">
	    {SETSTYLE=wm}
	    {CORE_WMESSAGE}			
			{WMESSAGE}</div>
			</div>
	    {---}
		</div>
	</div>
	<div class="clear"></div>
	<div class="bottmomenus row">
		<div class="bmenul col-md-4 col-xs-4 col-xxs-12">
		  {SETSTYLE=bottmomenus}
			{MENU=2}
		</div>
		<div class="bmenur col-md-4 col-xs-4 col-xxs-12">
			{MENU=4}
		</div>
		<div class="bmenum col-md-4 col-xs-4 col-xxs-12">
			{MENU=3}
		</div>
	</div>
'.$footer;
	
$LAYOUT['full']     				 = $header.'
	<div class="maincontent row">
		<div class="fullside col-md-12">
		  {SETSTYLE=full}
			{---}
		</div>
	</div>
	<div class="clear"></div>
	<div class="footerborfull"></div>
'.$footer;

$LAYOUT['sidebar_right']     = $header.'
	<div class="maincontentall row">
	  <div class="topcontentall clearfix">
	    <div class="leftcol col-md-9 col-xxs-12">
			  {MENU=5}
			  {---}	
			</div>	
			<div class="rightcolall col-md-3 col-xxs-12">
			  {NAVIGATION=side}
				{SETSTYLE=bottmomenus}
			  {MENU=1}
			</div>

		</div>
	</div>
	<div class="clear"></div>
	<div class="bottmomenus row">
		<div class="bmenul col-md-4 col-xs-4 col-xxs-12">
		  {SETSTYLE=bottmomenus}
			{MENU=2}
		</div>
		<div class="bmenur col-md-4 col-xs-4 col-xxs-12">
			{MENU=4}
		</div>
		<div class="bmenum col-md-4 col-xs-4 col-xxs-12">
			{MENU=3}
		</div>
	</div>
	<div class="clear"></div>
	<div class="footerbor"></div>'
	.$footer;

 						  

// for future using 
$LAYOUT['sidebar_left'] =  $LAYOUT['sidebar_right']; 
 
 //	[tablestyle]
function tablestyle($caption, $text, $id='', $info=array())
{
//	global $style; // no longer needed. .
	$style = $info['setStyle'];
	
	echo "<!-- tablestyle: style=".$style." id=".$id." -->\n\n";
	
	$type = $style;

	if($id == 'login_page') // Example - If rendered from 'welcome message' 
	{
		echo $text;
		return;	
	}
	
	if($mode == 'admin_update')
	{
		echo '
		<span class="admin_update">
			'.$caption.'
		</span>
		<span class="hover" style="display:none">
			'.$text.'
		</span>
		';
		return;	
	}
		
switch ($style) {

	case 'wm':
	echo '<h2 class="title_clean">'.$caption.'</h2><div>'.$text.'</div>';
	break;
	case 'full':
	echo '
	<div class="fullcontent clearfix">
		<div class="fullcontent_title">
			'.$caption.'
		</div>
		<div class="fullcontent_entry">
			'.$text.'
		</div>
	</div>
        ';
	break;
	case 'rightcol':
	echo '
	<div class="rightbox">
		<div class="rightbox_title">
			'.$caption.'
		</div>
		<div class="rightbox_text">
			'.$text.'
		</div>
	</div>
        ';
	break;
	case 'leftcol':
	echo '
	<div class="leftbox">
		<div class="leftbox_title_bg">
			<div class="leftbox_title">
				'.$caption.'
			</div>
		</div>
		<div class="leftbox_text">
			'.$text.'
		</div>
	</div>
        ';
	break;
	case 'bottmomenus':
	echo '
	<div class="bottmomenusbox">
		<div class="bottmomenus_title">
			'.$caption.'
		</div>
		<div class="bottmomenus_text">
			'.$text.'
		</div>
	</div>
        ';
	break;
	default:
	echo '
	<div class="bottmomenusbox">
		<div class="title_clean">
			'.$caption.'
		</div>
		<div class="bottmomenus_text">
			'.$text.'
		</div>
	</div>
    ';
	break;
 }
}
define('THEME_DISCLAIMER', '<br /><i>'.LAN_THEME_1.'</i>');
define('ICONSTYLE', 'float: left; border:0');
define('COMMENTLINK', LAN_THEME_2);
define('COMMENTOFFSTRING', LAN_THEME_3);
define('PRE_EXTENDEDSTRING', '<div class="readmore">');
define('EXTENDEDSTRING', LAN_THEME_4);
define('POST_EXTENDEDSTRING', '</div>');
define('TRACKBACKSTRING', LAN_THEME_5);
define('TRACKBACKBEFORESTRING', ' :: ');
define('ICONMAIL', 'mail.png');
define('ICONPRINT', 'print.png');
define('ICONPRINTPDF', 'pdf.png');
define("NEWSCAT_AMOUNT",10);
$sc_style["NEWSIMAGE"]["pre"] = '<div class="news_image">';
$sc_style["NEWSIMAGE"]["post"] = '</div>';
$sc_style["NEWSCOMMENTS"]["pre"] = '<div class="news_comments">';
$sc_style["NEWSCOMMENTS"]["post"] = '</div>';
//[newsstlyle]
$NEWSSTYLE = '
<div class="newsbox">
	<div class="leftbox">
		<div class="leftbox_title_bg">
			<div class="leftbox_title">
				{NEWSTITLE}
			</div>
		</div>
		<div class="meta">
			<div class="author mediumtext">
				{NEWSDATE=short}&nbsp;&nbsp;'.LAN_THEME_9.'&nbsp;{NEWSAUTHOR}
			</div>
		</div>
	  <div class="fsnewsbbody">
			{NEWSIMAGE}
			{NEWSBODY} {EXTENDED}
		</div>
		<div class="clear"></div>
		<div class="metabottom v-middle">
			<div class="metaicons">
    		{EMAILICON} {PRINTICON} {PDFICON} {ADMINOPTIONS}
			</div>
   		{NEWSCOMMENTS}
	  </div>
	</div>
</div>
	';
$NEWSLISTSTYLE = '
<div class="newsbox">
	<div class="leftbox">
		<div class="leftbox_title_bg">
			<div class="leftbox_title">
				{NEWSTITLE}
			</div>
		</div>
		<div class="meta">
			<div class="author mediumtext">
				{NEWSDATE=short}&nbsp;&nbsp;'.LAN_THEME_9.'&nbsp;{NEWSAUTHOR}
			</div>
		</div>
	  <div class="fsnewsbbody">
			{NEWSIMAGE}
			{NEWSBODY} {EXTENDED}
		</div>
		<div class="clear"></div>
		<div class="metabottom v-middle">
			<div class="metaicons">
    		{EMAILICON} {PRINTICON} {PDFICON} {ADMINOPTIONS}
			</div>
			{NEWSCOMMENTS}
	  </div>
	</div>
</div>
';
$NEWSARCHIVE ='
		<div>
			<table style="width:98%;">
				<tr>
					<td>
						<div class="mediumtext">{ARCHIVE_BULLET}&nbsp;{ARCHIVE_LINK}&nbsp;'.LAN_THEME_9.'&nbsp;{ARCHIVE_AUTHOR}&nbsp;-&nbsp;{ARCHIVE_DATESTAMP}&nbsp;'.LAN_THEME_8.'&nbsp;{ARCHIVE_CATEGORY}</div>
					</td>
				</tr>
			</table>
		</div>
';
//Render news categories on the bottom of the page
$NEWSCAT = '
		<table cellpadding="0" cellspacing="0" style="width: 95%">
			<tr>
				<td>
					<div class="news_title_cat">
						{NEWSCATEGORY}
					</div>
				</td>
			</tr>
			<tr>
				<td colspan="2" style="padding-top: 10px;">
					<table style="width: 100%" cellpadding="0" cellspacing="0">
						<tr>
							<td class="catlink left v-middle" style="padding-bottom: 5px; padding-left: 10px;">
								{NEWSCAT_ITEM}
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
';
//Loop for news items in category
$NEWSCAT_ITEM = '
	<div class="news_item_cat">
		<img src="'.THEME_ABS.'images/bullet.png" alt="" />&nbsp;&nbsp;{NEWSTITLELINK}
	</div>
';
// linkstyle
// http://wiki.e107.org/?title=Styling_Individual_Sitelink_Menus
function linkstyle($np_linkstyle) {
// Common to all styles (for this theme)
// Common sublink settings
// NOTE: *any* settings can be customized for sublinks by using
//       'sub' as a prefix for the setting name. Plus, there's 'subindent'
//  $linkstyleset['sublinkclass'] = 'mysublink2;
//  $linkstyleset['subindent']    = ' ';
// Now for some per-style setup
  switch ($np_linkstyle)
  {
  case 'toplinks':
  $linkstyleset['linkdisplay']      = 1;
	$linkstyleset['prelink'] = "<ul id='menu'>";
	$linkstyleset['postlink'] = "</ul>";
  $linkstyleset['linkstart'] = "<li>";
	$linkstyleset['linkend'] = "</li>";
  $linkstyleset['linkstart_hilite'] = "<li>";
	$linkstyleset['linkclass_hilite'] = "";
	$linkstyleset['linkseparator'] = "";
   break;
  default: // if no LINKSTYLE defined
  $linkstyleset['linkdisplay']      = 1;
  define('PRELINK', '');
  define('POSTLINK', '');
  define('LINKSTART', '<span> ');
  define('LINKSTART_HILITE', '<span> ');
  define('LINKEND', '</span><div style="padding-top: 1px;"></div>');
  define('LINKALIGN', 'left');
  }
return $linkstyleset;
}
  define('BULLET', 'bullet.png');
// Chatbox post style
$CHATBOXSTYLE = "<br /><b>{USERNAME}</b>&nbsp;{TIMEDATE}<br />{MESSAGE}<br />";
// Comment post style
$sc_style["REPLY"]["pre"] = '<tr><td class="smallblacktext" style="padding: 10px 20px;">';
$sc_style["REPLY"]["post"] = '</td></tr>';
$sc_style["COMMENTEDIT"]["pre"] = '<tr><td class="forumheader" colspan="2" style="text-align: right">';
$sc_style["COMMENTEDIT"]["post"] = '</td></tr>';
$sc_style["JOINED"]["post"] = '<br />';
$sc_style["LOCATION"]["post"] = '<br />';
$sc_style["RATING"]["post"] = '<br /><br />';
$sc_style["COMMENT"]["post"] = "<br />";
$COMMENTSTYLE = '
<div class="spacer" style="text-align:left; width: 100%; padding: 3px 0; margin: 5px 10px;">
<table class="fborder" style="width: 98%; border-bottom: 1px solid #EEEEEE; background: transparent;">
  <tr>
    <td class=" forumheader mediumtext" style="padding: 10px 10px;" colspan="2">
    	'.LAN_THEME_9.' {USERNAME} '.LAN_THEME_8.' {TIMEDATE}
    </td>
  </tr>
  {REPLY}
  <tr>
    <td class="forumheader3" style="width: 25%; vertical-align: top; border: 0 none">
	    <div style="text-align: center;">
	    	{AVATAR}
	    </div>
    	<span class="smalltext">
				{JOINED}{COMMENTS}{LOCATION}{IPADDRESS}
			</span>
    </td>
    <td class="forumheader3" style="width: 70%; vertical-align: top; border: 0 none;">
    	{COMMENT}
    </td>
  </tr>
{COMMENTEDIT}
</table>
</div>
';
// Chatbox post style
$CHATBOXSTYLE = "<br /><b>{USERNAME}</b>&nbsp;{TIMEDATE}<br />{MESSAGE}<br />";
$SEARCH_SHORTCODE = '
      <div>
          <input class="search-form" type="text" name="q" size="25" maxlength="50" value="'.LAN_SEARCH.'" onfocus="if (this.value == \''.LAN_SEARCH.'\') this.value = \'\';" onblur="if (this.value == \'\') this.value = \''.LAN_SEARCH.'\';"  />
          <input type="submit" value="" class="search-submit" />
      </div>
';
?>