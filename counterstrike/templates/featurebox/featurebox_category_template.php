<?php
/*
* Copyright (c) e107 Inc 2013 - e107.org, Licensed under GNU GPL (http://www.gnu.org/licenses/gpl.txt)
*
* Featurebox core category templates
*/

// TODO - list of all available shortcodes & schortcode parameters
$FEATUREBOX_CATEGORY_TEMPLATE = array();

// Bootstrap 3


$FEATUREBOX_CATEGORY_TEMPLATE['bootstrap3_carousel']['list_start'] = '
<div id="carousel-example-generic" class="featurebox carousel slide" data-ride="carousel">  
{FEATUREBOX_NAVIGATION|bootstrap3_carousel=loop&uselimit=1}
  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    
';

$FEATUREBOX_CATEGORY_TEMPLATE['bootstrap3_carousel']['list_end'] = '
	  </div>
	   <div id="mainPitch" style="position:absolute; top:5px;">
      <div class="container">
        <div class="row">
        <img id="cover" src="'.e_THEME_ABS.'counterstrike/header/29.png" alt="{SITENAME}" >
 

        </div>
      </div>
</div>
	</div><!-- end row -->

<!-- end carousel -->
';

$FEATUREBOX_CATEGORY_TEMPLATE['bootstrap3_carousel']['nav_start'] = '<!-- Indicators --> ';
$FEATUREBOX_CATEGORY_TEMPLATE['bootstrap3_carousel']['nav_item'] = ' ';
$FEATUREBOX_CATEGORY_TEMPLATE['bootstrap3_carousel']['nav_end'] = ' ';
$FEATUREBOX_CATEGORY_TEMPLATE['bootstrap3_carousel']['nav_separator'] = '';


$FEATUREBOX_CATEGORY_TEMPLATE['bootstrap3_carousel']['col_start'] = '';
$FEATUREBOX_CATEGORY_TEMPLATE['bootstrap3_carousel']['col_end'] = '';
$FEATUREBOX_CATEGORY_TEMPLATE['bootstrap3_carousel']['item_start'] = '';
$FEATUREBOX_CATEGORY_TEMPLATE['bootstrap3_carousel']['item_end'] = '';
$FEATUREBOX_CATEGORY_TEMPLATE['bootstrap3_carousel']['item_separator'] = '';
$FEATUREBOX_CATEGORY_TEMPLATE['bootstrap3_carousel']['item_empty'] = '';



 
 


/**
 * Template information.
 * Allowed keys:
 * - title: Dropdown title (language constants are accepted e.g. 'MY_LAN')
 * - [optional] description: Template description (language constants are accepted e.g. 'MY_LAN') - UNDER CONSTRUCTION
 * - [optional] image: Template image preview (path constants are accepted e.g. '{e_PLUGIN}myplug/images/mytemplate_preview.png') - UNDER CONSTRUCTION
 *
 * @var array
 */
$FEATUREBOX_CATEGORY_INFO = array(
	'bootstrap_carousel' 	=> array('title' => 'Bootstrap v2 Carousel', 		'description' => "Bootstrap's Hero slider"),
	'bootstrap3_carousel' 	=> array('title' => 'Bootstrap v3 Carousel', 		'description' => "Bootstrap's Hero slider"),
	'bootstrap_tabs'		=> array('title' => 'Bootstrap Tabs'	,	 	'description' => 'Tabbed Feature box items'),
//	'camera' 				=> array('title' => 'Image-Slider (jquery)'	, 	'description' => 'Image transitions using the "Camera" jquery plugin'),
//	'accordion' 			=> array('title' => 'Accordion (jquery)'	, 	'description' => 'Accordion utilizing jQuery UI'),
	'default' 				=> array('title' => 'Default', 					'description' => 'Flat - show by category limit'),
//  DEPRECATED	'dynamic' 				=> array('title' => 'Dynamic (prototype.js)', 	'description' => 'Load items on click (AJAX)'),
// DEPRECATED	'tabs-proto' 			=> array('title' => 'Tabs (prototype.js)'	, 	'description' => 'Tabbed Feature box items')
);
?>