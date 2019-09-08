<?php
	/**
	 * e107 website system
	 *
	 * Copyright (C) 2008-2017 e107 Inc (e107.org)
	 * Released under the terms and conditions of the
	 * GNU General Public License (http://www.gnu.org/licenses/gpl.txt)
	 *
	 */


	$NEWS_GRID_TEMPLATE['col-md-6']['start'] = '<div class="row news-grid-default news-menu-grid">';

	$NEWS_GRID_TEMPLATE['col-md-6']['featured'] = '
<div class="row featured">
	<div class="col-sm-12">
		<div class="item col-sm-6" >
			{SETIMAGE: w=600&h=400&crop=1}
			{NEWSTHUMBNAIL=placeholder}
		</div>
		<div class="item col-sm-6">
			<h3>{NEWSTITLE}</h3>
			<p>{NEWSMETADIZ: limit=100}</p>
			<p class="text-right"><a class="btn btn-primary btn-othernews" href="{NEWSURL}">' . LAN_READ_MORE . '</a></p>
		</div>
	</div>
</div>
            							          ';

	$NEWS_GRID_TEMPLATE['col-md-6']['item'] = '
<div class="item col-md-6">
	{SETIMAGE: w=400&h=400&crop=1}
	{NEWSTHUMBNAIL=placeholder}
	<h3>{NEWS_TITLE}</h3>
	<p>{NEWS_SUMMARY}</p>
	<p class="text-right"><a class="btn btn-primary btn-othernews" href="{NEWSURL}">' . LAN_READ_MORE . '</a></p>
</div>
                             ';

	$NEWS_GRID_TEMPLATE['col-md-6']['end'] = '</div>';


// ------------------ col-md-4 -----------------

	$NEWS_GRID_TEMPLATE['col-md-4']['start']    = $NEWS_GRID_TEMPLATE['col-md-6']['start'];
	$NEWS_GRID_TEMPLATE['col-md-4']['featured'] = $NEWS_GRID_TEMPLATE['col-md-6']['featured'];
    $NEWS_GRID_TEMPLATE['col-md-4']['item']     = '<div class="item col-md-4">
													{SETIMAGE: w=400&h=400&crop=1}
													{NEWSTHUMBNAIL=placeholder}
	                                                <h3>{NEWS_TITLE}</h3>
	                                                <p>{NEWS_SUMMARY}</p>
	                                                <p class="text-right"><a class="btn btn-primary btn-othernews" href="{NEWSURL}">' . LAN_READ_MORE . '</a></p>
            							        </div>';
	$NEWS_GRID_TEMPLATE['col-md-4']['end']      = $NEWS_GRID_TEMPLATE['col-md-6']['end'];



// ------------------ col-md-3 -----------------


	$NEWS_GRID_TEMPLATE['col-md-3']['start']    = $NEWS_GRID_TEMPLATE['col-md-6']['start'];
	$NEWS_GRID_TEMPLATE['col-md-3']['featured'] = $NEWS_GRID_TEMPLATE['col-md-6']['featured'];
  $NEWS_GRID_TEMPLATE['col-md-3']['item']     = '
  <div class="item col-md-3">
  	{SETIMAGE: w=400&h=400&crop=1}
  	{NEWSTHUMBNAIL=placeholder}
  	<h3>{NEWS_TITLE}</h3>
  	<p>{NEWS_SUMMARY}</p>
  	<p class="text-right"><a class="btn btn-primary btn-othernews" href="{NEWSURL}">' . LAN_READ_MORE . '</a></p>
  </div>
                                  ';
	$NEWS_GRID_TEMPLATE['col-md-3']['end']      = $NEWS_GRID_TEMPLATE['col-md-6']['end'];




// ------------------ media-list -----------------



	$NEWS_GRID_TEMPLATE['media-list']['start'] = '<div class="row news-grid-default">';

  $NEWS_GRID_TEMPLATE['media-list']['featured'] = '
  <div class="featured item col-sm-6" >
  	{SETIMAGE: w=600&h=400&crop=1}
  	{NEWSTHUMBNAIL=placeholder}
  	<h3><a href="{NEWS_URL}">{NEWS_TITLE}</a></h3>
  	<p>{NEWS_SUMMARY: limit=60}</p>
  </div>
  ';


  $NEWS_GRID_TEMPLATE['media-list']['item'] = '
  <div class="item col-sm-6">
  	{SETIMAGE: w=120&h=120&crop=1}
  	<ul class="media-list">
  		<li class="media">
  			<div class="media-left media-top">
  				<a href="{NEWS_URL}">
  				{NEWS_IMAGE: type=tag&class=media-object img-rounded&placeholder=1}
  				</a>
  			</div>
  			<div class="media-body">
  				<h4 class="media-heading"><a href="{NEWS_URL}">{NEWS_TITLE}</a></h4>
  				<p>{NEWS_SUMMARY: limit=60}</p>
  			</div>
  		</li>
  	</ul>
  </div>
  ';


	$NEWS_GRID_TEMPLATE['media-list']['end'] = '</div>';


   /* {NEWSTITLE} {NEWS_IMAGE: type=src} */
  /* NEWS GRID ON HOMEPAGE */
	$NEWS_GRID_TEMPLATE['homepage']['start'] = '<div class="row no-margin" data-tesla-plugin="masonry">{SETIMAGE: w=800&h=800}';
  $NEWS_GRID_TEMPLATE['homepage']['item'] = '        
  <div class="no-padding col-lg-3 col-md-4 col-sm-6 col-xs-12">
  	<div class="blog-post">
  		<div class="post-cover">
  			<a href="{NEWS_URL}"><img src="{NEWSIMAGE: type=src&placeholder=true} " alt="{NEWSTITLE}" /></a>
  		</div>
  		<div class="post-content">
  			<div class="post-header">
  				<h4 class="customdate">{NEWSDATE=short}<span><i class="fa fa-clock-o"></i> 5 min to read</span></h4>
  				<h2><a href="{NEWS_URL}">{NEWSTITLE}</a></h2>
  				<h5><span>' . LAN_CATEGORY . '</span> : {NEWSCATEGORY}</h5>
  			</div>
  			<p>{NEWS_SUMMARY}</p>
  			<div class="post-footer">
  				<a href="{NEWS_URL}">' . LAN_READ_MORE . '</a>
  			</div>
  		</div>
  	</div>
  </div>
  ';
	$NEWS_GRID_TEMPLATE['homepage']['end'] = '</div>';


  /* NEWS GRID ON HOMEPAGE  -  CAROUSEL REPLACEMENT */
	$NEWS_GRID_TEMPLATE['carousel']['start'] = '                            
  <div class="home-blog-posts" 
            data-tesla-plugin="carousel"
            data-tesla-container=".tesla-carousel-items" 
            data-tesla-item=">div" 
            data-tesla-rotate="false" 
            data-tesla-autoplay="false" 
            data-tesla-hide-effect="false">
                <ul class="homeposts-arrows">
                    <li class="next"><i class="fa fa-chevron-right"></i></li>
                    <li class="prev disabled"><i class="fa fa-chevron-left"></i></li>
                </ul><div class="row tesla-carousel-items">{SETIMAGE: w=600&h=720&crop=1}';
  $NEWS_GRID_TEMPLATE['carousel']['item'] = '                    
  
<div class="col-md-6 col-sm-6 col-xs-12 col-lg-4">                        
  <div class="blog-post">                            
    <div class="post-content">                                
      <div class="post-header">                                   
       <h4 class="customdate">{NEWSDATE=short}</h4>                                    
         <h2>
          <a href="{NEWS_URL}">{NEWSTITLE}</a></h2>                                    
          <h5><span>' . LAN_CATEGORY . '</span> : {NEWSCATEGORY}</h5>                             
      </div>                                
      <div class="post-footer">                                    <h4>
          <span>
            <i class="fa fa-clock-o"></i> 5 min to read
          </span></h4>                                    
        <a href="{NEWS_URL}">' . LAN_READ_MORE . '</a>                                
      </div>                            
    </div>                            
    <img src="{NEWSIMAGE: type=src&placeholder=true}" alt="{NEWSTITLE}" />                        
  </div>                    
</div>
                    ';
	$NEWS_GRID_TEMPLATE['carousel']['end'] = ' </div>
                </div>';