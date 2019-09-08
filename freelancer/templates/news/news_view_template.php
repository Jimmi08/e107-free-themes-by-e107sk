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
$NEWS_VIEW_WRAPPER['default']['item']['NEWSIMAGE: item=1'] = '<span class="news-images-main pull-left col-xs-12 col-sm-6 col-md-6">{---}</span>';
$NEWS_VIEW_WRAPPER['default']['item']['NEWSRELATED'] = '<hr>{---} ';
$NEWS_VIEW_WRAPPER['default']['item']['NEWSNAVLINK'] = '<hr>{---} ';
 
$NEWS_VIEW_TEMPLATE['default']['item'] = '
{SETIMAGE: w=900&h=300}
        <!-- Title -->
        <h1 class="mt-4">{NEWS_TITLE: link=1}</h1>
 
        <!-- Author -->
        <p class="lead">
          '.LAN_FL_THEME_16.'
          {NEWSAUTHOR}
        </p>
        <hr>

        <!-- Date/Time -->
        <p>'.LAN_FL_THEME_15.' J{NEWSDATE=long}</p>
        
        <hr>

        <!-- Preview Image -->
        {NEWSIMAGE: item=1}

        <hr>               
        <p class="lead">{NEWS_SUMMARY}</p>
 
  			<div class="body">
  			{NEWS_BODY=body}
  			</div>
  			<div class="news-videos-1">
  			{NEWSVIDEO: item=1}
  		 	{NEWSVIDEO: item=2}
  		 	{NEWSVIDEO: item=3}
  			</div>


			<br />
			{SETIMAGE: w=400&h=400}
			
			<div class="row  news-images-1">
        		<div class="col-md-6">{NEWSIMAGE: item=2}</div>
        		<div class="col-md-6">{NEWSIMAGE: item=3}</div>
        	</div>
        	<div class="row news-images-2">
        		<div class="col-md-6">{NEWSIMAGE: item=4}</div>
        		<div class="col-md-6">{NEWSIMAGE: item=5}</div>
            </div>
            
            {NEWSVIDEO: item=4}
			{NEWSVIDEO: item=5}
			
           <div class="body-extended ">
				{NEWS_BODY=extended}
			</div>
 
		<div class="options hidden-print ">
			<div class="btn-group">{NEWSCOMMENTLINK: glyph=comments&class=btn btn-secondary}
      {PRINTICON: class=btn btn-secondary}{ADMINOPTIONS: class=btn btn-secondary}
      {SOCIALSHARE}</div>
		</div>
  
	{NEWSRELATED}
 
	{NEWSNAVLINK}

';


// @todo add more templates. eg. 'videos' , 'slideshow images', 'full width image'  - help and ideas always appreciated.


// Videos
$NEWS_VIEW_TEMPLATE['videos']['item'] = '<div class="view-item"><div class="alert alert-warning">Empty news_view_template.php (videos) - have ideas? let us know.</div></div>';



