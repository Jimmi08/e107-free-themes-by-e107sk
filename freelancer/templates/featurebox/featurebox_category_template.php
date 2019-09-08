<?php
/*
* Copyright (c) e107 Inc 2013 - e107.org, Licensed under GNU GPL (http://www.gnu.org/licenses/gpl.txt)
*
* Featurebox core category templates
*/

// TODO - list of all available shortcodes & schortcode parameters
$FEATUREBOX_CATEGORY_TEMPLATE = array();

// Bootstrap 3


$FEATUREBOX_CATEGORY_TEMPLATE['bootstrap_carousel']['list_start'] = '
<div id="e107bootstrapcarousel" class="carousel slide" data-ride="carousel">
{FEATUREBOX_NAVIGATION|bootstrap_carousel=loop&uselimit=1}
  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    
';

$FEATUREBOX_CATEGORY_TEMPLATE['bootstrap_carousel']['list_end'] = '
	  </div>

	<!-- Controls -->
  <a class="carousel-control-prev" href="#e107bootstrapcarousel" role="button" data-slide="prev">
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		<span class="sr-only">'.LAN_PREVIOUS.'</span>
  </a>
	<a class="carousel-control-next" href="#e107bootstrapcarousel" role="button" data-slide="next">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
		<span class="sr-only">'.LAN_NEXT.'</span>
  </a>
                    

	</div><!-- end row -->

<!-- end carousel -->
';

$FEATUREBOX_CATEGORY_TEMPLATE['bootstrap_carousel']['nav_start'] = '<ol class="carousel-indicators">';
$FEATUREBOX_CATEGORY_TEMPLATE['bootstrap_carousel']['nav_item'] = '<li data-target="#e107bootstrapcarousel" data-slide-to="{FEATUREBOX_COUNTER=0}" class="{FEATUREBOX_ACTIVE}"></li>';
$FEATUREBOX_CATEGORY_TEMPLATE['bootstrap_carousel']['nav_end'] = '</ol>';
$FEATUREBOX_CATEGORY_TEMPLATE['bootstrap_carousel']['nav_separator'] = '';


$FEATUREBOX_CATEGORY_TEMPLATE['bootstrap_carousel']['col_start'] = '';
$FEATUREBOX_CATEGORY_TEMPLATE['bootstrap_carousel']['col_end'] = '';
$FEATUREBOX_CATEGORY_TEMPLATE['bootstrap_carousel']['item_start'] = '';
$FEATUREBOX_CATEGORY_TEMPLATE['bootstrap_carousel']['item_end'] = '';
$FEATUREBOX_CATEGORY_TEMPLATE['bootstrap_carousel']['item_separator'] = '';
$FEATUREBOX_CATEGORY_TEMPLATE['bootstrap_carousel']['item_empty'] = '';

/* this doesn't work, it's just example what to put in style.css for other theme */
$FEATUREBOX_CATEGORY_TEMPLATE['bootstrap_carousel']['css_inline'] = '
.carousel-item {
  height: 65vh;
  min-height: 300px;
  background: no-repeat center center scroll;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
';




 
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
	'bootstrap_carousel' 	=> array('title' => 'Bootstrap Carousel', 		'description' => "Bootstrap's Hero slider"),
	'bootstrap3_carousel' 	=> array('title' => '---', 		'description' => "Bootstrap's Hero slider"),
	'bootstrap_tabs'		=> array('title' => '---'	,	 	'description' => 'Tabbed Feature box items'),
//	'camera' 				=> array('title' => 'Image-Slider (jquery)'	, 	'description' => 'Image transitions using the "Camera" jquery plugin'),
  'accordion' 			=> array('title' => '---'	, 	'description' => 'Accordion utilizing jQuery UI'),
	'default' 				=> array('title' => '---', 					'description' => 'Flat - show by category limit'),
  'dynamic' 				=> array('title' => '---', 	'description' => 'Load items on click (AJAX)'),
// DEPRECATED	'tabs-proto' 			=> array('title' => 'Tabs (prototype.js)'	, 	'description' => 'Tabbed Feature box items')
);
?>