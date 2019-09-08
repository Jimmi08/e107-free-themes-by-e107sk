<?php
	/**
	 * e107 website system
	 *
	 * Copyright (C) 2008-2017 e107 Inc (e107.org)
	 * Released under the terms and conditions of the
	 * GNU General Public License (http://www.gnu.org/licenses/gpl.txt)
	 *
	 */




$NEWS_VIEW_INFO = array(

	'default' 	=> array('title' => LAN_DEFAULT, 							'description' => 'unused'),
	'videos' 	=> array('title' => "Videos (experimental)", 							'description' => 'unused'),
);


// Default
$NEWS_VIEW_WRAPPER['default']['item']['NEWSIMAGE: item=2&class=none'] = '<div class="no-padding col-md-4">{---}</div>';
$NEWS_VIEW_WRAPPER['default']['item']['NEWSIMAGE: item=3&class=none'] = '<div class="no-padding col-md-4">{---}</div>';
$NEWS_VIEW_WRAPPER['default']['item']['NEWSIMAGE: item=4&class=none'] = '<div class="no-padding col-md-4">{---}</div>';

$NEWS_VIEW_TEMPLATE['default']['item'] = '
{SETIMAGE: w=1488&h=702}
<div class="blog-post single-post">
	<div class="post-cover">
		{NEWSIMAGE: item=1&class=none}
	</div>
	<div class="post-content">
		<div class="post-header">
			<h4 class="customdate">{NEWSDATE=short}<span><i class="fa fa-clock-o"></i> 5 min to read</span></h4>
			<h2><a href="{NEWS_URL}">{NEWSTITLE}</a></h2>
			<h5><span>' . LAN_CATEGORY . '</span> : {NEWSCATEGORY}</h5>
		</div>
		<p class="lead">{NEWS_SUMMARY}</p>
		{NEWS_BODY=body} 
		<div class="small-gallery row no-margin"> 
			{SETIMAGE: w=0&h=0}                      
			{NEWSIMAGE: item=2&class=none}    
			{NEWSIMAGE: item=3&class=none}
			{NEWSIMAGE: item=4&class=none}
		</div>
		<div class="news-videos-1">
			{NEWSVIDEO: item=1}
			{NEWSVIDEO: item=2}
			{NEWSVIDEO: item=3}
		</div>
		{NEWS_BODY=extended}        
		<div class="options hidden-print ">
			<div class="btn-group">
				{NEWSCOMMENTLINK: glyph=comments&class=btn btn-primary}
				{PRINTICON: class=btn btn-primary}
				{ADMINOPTIONS: class=btn btn-primary}  
			</div>
		</div>
		<div class="post-footer">
			{NEWSSHARE}
		</div>
		{NEWSRELATED: limit=4}
	</div>
</div>
';


// @todo add more templates. eg. 'videos' , 'slideshow images', 'full width image'  - help and ideas always appreciated.


// Videos
$NEWS_VIEW_TEMPLATE['videos']['item'] = '<div class="view-item"><div class="alert alert-warning">Empty news_view_template.php (videos) - have ideas? let us know.</div></div>';



