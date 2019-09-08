<?php
if (!defined('e107_INIT')) { exit; }

#### Panel Template - Used by menu_class.php  for Custom Menu Content.
#### Additional control over image thumbnailing is possible via SETIMAGE e.g. {SETIMAGE: w=200&h=150&crop=1}

	$MENU_TEMPLATE['default']['start'] 					= '<div class="cpage-menu {CMENUNAME}">';
	$MENU_TEMPLATE['default']['body'] 					= '{CMENUBODY}'; 
	$MENU_TEMPLATE['default']['end'] 					= '</div>';

	$MENU_TEMPLATE['button']['start'] 					= '<div class="cpage-menu {CMENUNAME}">';
	$MENU_TEMPLATE['button']['body'] 					= '<div>{CMENUBODY}</div>{CPAGEBUTTON}';
	$MENU_TEMPLATE['button']['end'] 					= '</div>'; 

	$MENU_TEMPLATE['buttom-image']['start'] 			= '<div class="cpage-menu {CMENUNAME}">{SETIMAGE: w=360}';
	$MENU_TEMPLATE['buttom-image']['body'] 				= '<div>{CMENUIMAGE}</div>{CPAGEBUTTON}';
	$MENU_TEMPLATE['buttom-image']['end'] 				= '</div>';

	$MENU_TEMPLATE['image-only']['start'] 				= '<div class="cpage-menu {CMENUNAME}">{SETIMAGE: w=360}';
	$MENU_TEMPLATE['image-only']['body'] 				= '{CMENUIMAGE}';
	$MENU_TEMPLATE['image-only']['end'] 				= '</div>';

	$MENU_TEMPLATE['image-text-button']['start'] 		= '<div class="cpage-menu {CMENUNAME}">{SETIMAGE: w=360}';
	$MENU_TEMPLATE['image-text-button']['body'] 		= '{CMENUIMAGE}{CMENUBODY}{CPAGEBUTTON}';
	$MENU_TEMPLATE['image-text-button']['end'] 			= '</div>';
  
  
$MENU_TEMPLATE['portfolio']['start'] = '
<!-- Portfolio Section -->
  <section id="portfolio">
    <div class="container-fluid p-0">
      <div class="row no-gutters">{SETIMAGE: w=650&h=350}';

$MENU_TEMPLATE['portfolio']['body'] = '
        <div class="col-lg-4 col-sm-6">
          <a class="portfolio-box" href="{CMENUIMAGE=url}">
            <img class="img-fluid" src="{CMENUIMAGE=url}" alt="">
            <div class="portfolio-box-caption p-3">
              <div class="project-category text-white-50">
                {CMENUTITLE}
              </div>
              <div class="project-name">
                {CPAGETITLE}
              </div>
            </div>
          </a>
        </div>
';

$MENU_TEMPLATE['portfolio']['end'] = '
      </div>
    </div>
  </section>';  
?>