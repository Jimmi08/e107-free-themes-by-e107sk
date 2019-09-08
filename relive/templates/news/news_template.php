<?php
/**
 * Copyright (C) e107 Inc (e107.org), Licensed under GNU GPL (http://www.gnu.org/licenses/gpl.txt)
 * $Id$
 * 
 * News default templates
 */

if (!defined('e107_INIT'))  exit;

global $sc_style;



$NEWS_TEMPLATE = array();


$NEWS_MENU_TEMPLATE['list']['start']       = '<div class="thumbnails">';
$NEWS_MENU_TEMPLATE['list']['end']         = '</div>';


$NEWS_INFO = array(
	'default' 	=> array('title' => LAN_DEFAULT, 	'description' => 'unused'),
	'list' 	    => array('title' => LAN_LIST, 		'description' => 'unused'),
	'2-column'  => array('title' => "2 Column (experimental)",     'description' => 'unused'), //@todo more default listing options.
);


// XXX The ListStyle template offers a listed summary of items with a minimum of 10 items per page. 
// As displayed by news.php?cat.1 OR news.php?all 
// {NEWSBODY} should not appear in the LISTSTYLE as it is NOT the same as what would appear on news.php (no query) 

// Template/CSS to be reviewed for best bootstrap implementation 
$NEWS_TEMPLATE['list']['caption']	= '<h3 class="site-title">{NEWSCATEGORY}</h3>';
$NEWS_TEMPLATE['list']['start']	= '';
$NEWS_TEMPLATE['list']['end']	= '';
$NEWS_TEMPLATE['list']['item']	= '
{SETIMAGE: w=800&h=800&crop=1}
<div class="blog-post wide-post">
	<div class="post-cover">
		<a href="{NEWS_URL}"><img src="{NEWSIMAGE: type=src&placeholder=true}" alt="{NEWSTITLE}" /></a>
	</div>
	<div class="post-content">
		<div class="post-header">
			<h4 class="customdate">{NEWSDATE=short}<span><i class="fa fa-tags"></i>  {NEWSTAGS}</span></h4>
			<h2><a href="{NEWS_URL}">{NEWSTITLE}</a></h2>
			<h5><span>' . LAN_CATEGORY . '</span> : {NEWSCATEGORY}</h5>
		</div>
		<p>{NEWS_SUMMARY}</p>
		<div class="post-footer">
			<a href="{NEWS_URL}">' . LAN_READ_MORE . '</a>
		</div>
	</div>
</div>
';

$NEWS_TEMPLATE['default'] = $NEWS_TEMPLATE['list'];
 

$NEWS_TEMPLATE['category']          = $NEWS_TEMPLATE['default'];
$NEWS_TEMPLATE['category']['start']	= '<!-- Category News Template -->';

/**
 * @todo (experimental)
 */
$NEWS_TEMPLATE['2-column']['caption']  = '{NEWS_CATEGORY_NAME}';
$NEWS_TEMPLATE['2-column']['start']    = '<div class="row">';
$NEWS_TEMPLATE['2-column']['item']     = '
<div class="item col-md-6">
	{SETIMAGE: w=400&h=400&crop=1}
	{NEWSTHUMBNAIL=placeholder}
	<h3>{NEWS_TITLE}</h3>
	<p>{NEWS_SUMMARY}</p>
	<p class="text-right"><a class="btn btn-primary btn-othernews" href="{NEWSURL}">' . LAN_READ_MORE . '</a></p>
</div>
                            ';
$NEWS_TEMPLATE['2-column']['end']      = '</div>';

$NEWS_TEMPLATE['related']['start'] = '{SETIMAGE: w=110&h=110&crop=1}<div class="row also-like">
<div class="col-md-12"><h3 class="mini-title">You Might Also Like</h3>
';
$NEWS_TEMPLATE['related']['item'] = '
<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
	<div class="also-like-box">
		<a href="{RELATED_URL}">{RELATED_IMAGE}</a>
		<h4><a href="{RELATED_URL}">{RELATED_TITLE}</a></h4>
	</div>
</div>
';
$NEWS_TEMPLATE['related']['end'] = '</div></div>';