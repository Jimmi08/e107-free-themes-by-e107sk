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
);

 

$NEWS_TEMPLATE['default']['caption'] = '{NEWSCATEGORY}{SETSTYLE=none}'; // add a value to user tablerender()
$NEWS_TEMPLATE['default']['start']	= '<!-- Default News Template -->';
$NEWS_TEMPLATE['default']['item'] = '
		{SETIMAGE: w=500&h=360}
		<div class="blog-post">
			<h2 class="page-header">{NEWS_TITLE: link=1}</h2>  
			<img src="{NEWSIMAGE: type=src&placeholder=true}" class="img-sm img-bordered blog-featured">
      {NEWS_SUMMARY}
      {NEWS_BODY=body}
		</div>
		<div class="post-meta">
			<i class="fa fa-clock-o"></i> {NEWSDATE=short}
			<i class="fa fa-user"></i> {NEWSAUTHOR} 
			<i class="fa fa-folder"></i> {NEWSTAGS}
			<a class="pull-right" href="{NEWSURL}">'.LAN_READ_MORE.'. &rarr;</a>
		</div>
';

$NEWS_TEMPLATE['default']['end']	= '';

$NEWS_TEMPLATE['list']              = $NEWS_TEMPLATE['list'];
$NEWS_TEMPLATE['list']['start']	= '<!-- List News Template -->';
$NEWS_TEMPLATE['category']          = $NEWS_TEMPLATE['default'];
$NEWS_TEMPLATE['category']['start']	= '<!-- Category News Template -->';

 

### Related 'start' - Options: Core 'single' shortcodes including {SETIMAGE}
### Related 'item' - Options: {RELATED_URL} {RELATED_IMAGE} {RELATED_TITLE} {RELATED_SUMMARY}
### Related 'end' - Options:  Options: Core 'single' shortcodes including {SETIMAGE}
/*
$NEWS_TEMPLATE['related']['start'] = "<hr><h4>".defset('LAN_RELATED', 'Related')."</h4><ul class='e-related'>";
$NEWS_TEMPLATE['related']['item'] = "<li><a href='{RELATED_URL}'>{RELATED_TITLE}</a></li>";
$NEWS_TEMPLATE['related']['end'] = "</ul>";*/

$NEWS_TEMPLATE['related']['start'] = '{SETIMAGE: w=350&h=350&crop=1}<h2 class="caption">You Might Also Like</h2><div class="row">';
$NEWS_TEMPLATE['related']['item'] = '<div class="col-md-4">
					<div class="block block-light block-center block-image block-border">
          <a href="{RELATED_URL}">{RELATED_IMAGE}</a><h3><a href="{RELATED_URL}">{RELATED_TITLE}</a></h3></div></div>';
$NEWS_TEMPLATE['related']['end'] = '</div>';