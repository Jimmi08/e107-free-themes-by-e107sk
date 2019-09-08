<?php


#### Panel Template - Used by menu_class.php  for Custom Menu Content. 


	$MENU_TEMPLATE['default']['start'] 					= ''; 
	$MENU_TEMPLATE['default']['body'] 					= '{CMENUBODY}'; 
	$MENU_TEMPLATE['default']['end'] 					= ''; 

	$MENU_TEMPLATE['button']['start'] 					= '<div class="cpage-menu">'; 
	$MENU_TEMPLATE['button']['body'] 					= '<div>{CMENUBODY}</div>{CPAGEBUTTON}';
	$MENU_TEMPLATE['button']['end'] 					= '</div>'; 

	### Additional control over image thumbnailing is possible via SETIMAGE e.g. {SETIMAGE: w=200&h=150&crop=1}
	$MENU_TEMPLATE['buttom-image']['start'] 			= '<div class="cpage-menu">'; 
	$MENU_TEMPLATE['buttom-image']['body'] 				= ' <div class="about-cover">{CMENUIMAGE}</div><div> {CPAGEBUTTON}</div>';
	$MENU_TEMPLATE['buttom-image']['end'] 				= '</div>'; 

  /*
  <a href="{CPAGEBUTTON=href}" class="load-more-link "  ><i class="fa fa-chevron-down"></i>'.LAN_READ_MORE.'</a>  {CMENU_BUTTON_TEXT}  {CMENUURL}
  */
	$MENU_TEMPLATE['button-text']['start'] 					= '<div class="align-center">'; 
	$MENU_TEMPLATE['button-text']['body'] 					= '<a href="{CMENUURL}" class="load-more-link "><i class="fa fa-chevron-down"></i>{CMENU_BUTTON_TEXT}</a>';
	$MENU_TEMPLATE['button-text']['end'] 					= '</div>'; 

	$MENU_TEMPLATE['image-text-button']['start'] 		= '<div class="cpage-menu {CMENUNAME}">';
	$MENU_TEMPLATE['image-text-button']['body'] 		= '{SETIMAGE: w=400&h=400&crop=1}<div class="about-cover">
  {CMENUIMAGE}
  </div>
 
  {CMENUBODY}{CPAGEBUTTON}';
	$MENU_TEMPLATE['image-text-button']['end'] 			= '</div>';  
 
 
 
       
         
	
	
?>