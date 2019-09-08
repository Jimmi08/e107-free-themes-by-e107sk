<?php
/*
 * e107 website system
 *
 * Copyright (C) 2008-2013 e107 Inc (e107.org)
 * Released under the terms and conditions of the
 * GNU General Public License (http://www.gnu.org/licenses/gpl.txt)
 *
*/
 
if (!defined('e107_INIT')) { exit; }
$PAGE_WRAPPER = array();

global $sc_style;

$sc_style['CPAGEAUTHOR|default']['pre'] = '';
$sc_style['CPAGEAUTHOR|default']['post'] = ", ";

$sc_style['CPAGESUBTITLE|default']['pre'] = '<h2>';
$sc_style['CPAGESUBTITLE|default']['post'] = '</h2>';

$sc_style['CPAGEMESSAGE|default']['pre'] = '';
$sc_style['CPAGEMESSAGE|default']['post'] = '<div class="clear"><!-- --></div>';

$sc_style['CPAGENAV|default']['pre'] = '<div class="f-right pull-right col-md-3">';
$sc_style['CPAGENAV|default']['post'] = '</div>';

#### default template - BC ####
	// used only for parsing comment outside of the page tablerender-ed content
	// leave empty if you integrate page comments inside the main page template
	
	
	$PAGE_TEMPLATE['default']['page'] = '
	 <div class="mt">
	 	<div class="row">	
		{PAGE}
	 	</div><! --/row -->
	 </div><! --/container -->
	 <div id="portfoliowrap">
        <div class="portfolio-centered">
          {CPAGERELATED: types=page,news}
        </div><!-- portfolio container -->
	 </div><!--/Portfoliowrap -->		 
	';               
	
	// always used - it's inside the {PAGE} sc from 'page' template
	$PAGE_TEMPLATE['default']['start'] = '{SETIMAGE: w=1280&h=600&crop=1}
		 	<div class="col-lg-10 col-lg-offset-1 centered">
			 	 {CMENUIMAGE}
		 	</div>	
	 '; 
	
	// page body
	$PAGE_TEMPLATE['default']['body'] = '
		{CPAGEMESSAGE|default}
		 	<div class="col-lg-5 col-lg-offset-1">
			 	<div class="spacing"></div>
		 		<h4>{CPAGETITLE|default}</h4>
		 		<p> {CPAGEBODY|default}</p>
 		 	</div>		
		 	<div class="col-lg-4 col-lg-offset-1">
			 	<div class="spacing"></div>
		 		<h4>Project Details</h4>
		 		<div class="hline"></div>
		 		<p><b>Date:</b> April 18, 2014</p>
		 		<p><b>Author: </b>{CPAGEAUTHOR}</p>
		 		<p><b>Categories:</b> {PAGE_CHAPTER_NAME}</p>
		 		<p><b>Tagged:</b> {PAGETAGS}</p>
		 		<p><b>Client:</b> {CMENU_BUTTON_TEXT} </p>
		 		<p><b>Website:</b> <a href="{MENU_BUTTON_URL}">{MENU_BUTTON_URL}</a></p>
		 	</div>
		{CPAGEEDIT}
	'; 

	$PAGE_WRAPPER['default']['CPAGEEDIT'] = "<div class='text-right'>{---}</div>";

	// used only when password authorization is required
	$PAGE_TEMPLATE['default']['authorize'] = '
		<div class="cpage-restrict ">
			{message}
			{form_open}
			<div class="panel panel-default">
				<div class="panel-heading">{caption}</div>
					<div class="panel-body">
					    <div class="form-group">
				       		 <label class="col-sm-3 control-label">{label}</label>
					        <div class="col-sm-9">
					               {password} {submit} 
					        </div>
			     		</div>
					</div>
      			</div>
			{form_close}
		</div>
	';
	
	// used when access is denied (restriction by class)
	$PAGE_TEMPLATE['default']['restricted'] = '
		{text}
	';
	
	// used when page is not found
	$PAGE_TEMPLATE['default']['notfound'] = '
		{text}
	';
	
	// always used
	$PAGE_TEMPLATE['default']['end'] = '  '; 
	
	// options per template - disable table render
//	$PAGE_TEMPLATE['default']['noTableRender'] = false; //XXX Deprecated
	
	// define different tablerender mode here
	$PAGE_TEMPLATE['default']['tableRender'] = 'cpage';

	
#### No table render example template ####
	$PAGE_TEMPLATE['custom']['start'] 			= ''; 
	$PAGE_TEMPLATE['custom']['body'] 			= '{SETIMAGE: w=800&h=600&crop=1}
	<div class="col-lg-6">{CMENUIMAGE}</div>
	<div class="col-lg-6">{CPAGEBODY|default}</div>'; 
	$PAGE_TEMPLATE['custom']['authorize'] 		= '
	';
	
	$PAGE_TEMPLATE['custom']['restricted'] 		= '
	';
	
	$PAGE_TEMPLATE['custom']['end'] 			= ' '; 
	$PAGE_TEMPLATE['custom']['tableRender'] 	= '';
	
	
 										 								
	                             
$PAGE_TEMPLATE['default']['related']['start'] 				= '{SETIMAGE: w=750&h=530&crop=1} 
<div id="portfoliowrap">    
 <div class="portfolio-centered"><h3>{LAN=LAN_RELATED}</h3>
            <div class="recentitems portfolio">' ;   
$PAGE_TEMPLATE['default']['related']['item'] 				= 
'<div class="portfolio-item ">  
	<div class="he-wrap tpl6">
		<img src="{RELATED_IMAGE_SRC}" alt="{RELATED_TITLE}">
		<div class="he-view">
			<div class="bg a0" data-animate="fadeIn">
				<h3 class="a1" data-animate="fadeInDown">{RELATED_TITLE}</h3>
				<a data-rel="prettyPhoto" href="{RELATED_IMAGE_SRC}" class="dmbutton a2" data-animate="fadeInUp"><i class="fa fa-search"></i></a>
				<a href="{RELATED_URL}" class="dmbutton a2" data-animate="fadeInUp"><i class="fa fa-link"></i></a>
			</div><!-- he bg -->
		</div><!-- he view -->		
	</div><!-- he wrap -->
</div><!-- end col-12 -->'; 	 
$PAGE_TEMPLATE['default']['related']['end'] 					= "
</div>
	</div>
</div>";                       
	
	







	
	
	
?>